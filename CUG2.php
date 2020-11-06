<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include 'sequenceGenerator.php';


/*Server Side Validataion Process*/
$Group_Name='';
$usertypeid=0;

//echo $Group_Name . ' ';
//echo $User_Type;

if(!isset($_REQUEST['smsgroupname']))
    {
        echo "No Group Name provided.  Please provide Group Name.";
        die;
    }
else 
    {      
        $Group_Name=$_REQUEST['smsgroupname'];
    }

    mysqli_autocommit($dbhandle,false);

    //Close_User_Group_Master table record entry. This means creating a Close user group name.
    $cugid=sequence_number('close_user_group_master',$dbhandle);
    $putCUGMasterRecord_sql="insert into close_user_group_master values($cugid,'$Group_Name',1," . $_SESSION["SCHOOLID"] . ",'" . $_SESSION["LOGINID"] . "',NOW())";
    echo $putCUGMasterRecord_sql;
    $putCUGMasterRecord_result=$dbhandle->query($putCUGMasterRecord_sql);
    
    if(!$putCUGMasterRecord_result)
        {
            //Error:killing page;
            die;
            mysqli_rollback($dbhandle);

        }
    echo 'abc';    
    //End of Close_User_Group_Master table record entry.
    
    //Close user group details table record entry.  This means inserting contact numbers for the close user group created.
        $cugdid=sequence_number('close_user_group_details',$dbhandle);
        $sms_number='';'';
        $whatsapp_number='';
        $userid='';
        $enabled=1;
    
        $insertCugDetails_sql="insert into close_user_group_details
        (cugdid,
        cugid,
        sms_contact_no,
        whatsapp_contact_no,
        user_type,
        user_id,
        enabled,
        school_id,
        updated_by) 
        values(?,?,?,?,?,?,?,?,?)";
    
        $insertMessageDetails_stmt=$dbhandle->prepare($insertCugDetails_sql);
        //echo $dbhandle->error;	
        $insertMessageDetails_stmt->bind_param('iissisiis',
        $cugdid,
        $cugid,
        $sms_number,
        $whatsapp_number,
        $usertypeid,
        $userid,
        $enabled,
        $_SESSION["SCHOOLID"],
        $_SESSION["LOGINID"]);
        $total_count=0;  
        $success_count=0;

    foreach($_REQUEST['groupsmsact'] as $value)
        {
            //echo '[' . $key . ']=>'. $value  . '<br>';
            
            $sms_number=$value[0];
            $whatsapp_number=$value[1];
            $userid=$value[2];
            $usertypeid=$value[3];
            echo '<br>SMS No:' . $sms_number;
            echo '<br>Whatsapp No:' . $whatsapp_number;
            echo '<br>Reff Id:' . $userid;
            echo '<br>User Type Id:' . $usertypeid;

            if($insertMessageDetails_stmt->execute())
                {
                    $success_count++;
                    $cugdid++;
                } 
            $total_count++; 
        }
    
        if($success_count!=$total_count)
        {
            //var_dump($getStudentCount_result);
            $error_msg=mysqli_error($dbhandle);
            $sql="";
            $el=new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Create Close User Group',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to create close ueer group. Database Error.  Please try after some time or contact Application development team.</h1>";
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
            //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
            //$str_end='</div>';
            //echo $str_start.$messsage.$str_end;
            //die;
            echo "Error 02:The SMS has been failed to create.  Please consult Application Consultant.";
            //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
        }
        else
        {
            mysqli_commit($dbhandle);
            echo "The Close User Group " . $Group_Name . " has been created Successfully.";
            //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
        } 
    
    
/* reuse later.

if($user_type==1 or $user_type==2)  //Executing for Student and Staff user type.  
    {  
        if(!isset($_REQUEST['mobileno']))
            {
                echo "No receiver contact details provided.  Please provide receiving contacts.";
                die;

            }

        if(!isset($_REQUEST["messagetitle"]))

            {

                echo "Data Required :: Title cannot left blank.";
                die;
            }

        if(!isset($_REQUEST["composemsg"]))
            {

                echo "Data Required :: Compose message cannot left blank.";
                die;
            }


        if(!isset($_REQUEST["smsmessage"]) and !isset($_REQUEST["whatsappmessage"]))
            {

                echo "Selection Rquired :: Please provide at least any one message services from SMS and Whatsapp.";
                die;
            }
    }
else
    {
        if(preg_match("/^[0-9;]+$/", $_REQUEST["unknownno"]) === 0)
            {
                echo 'The other numbers is found with invalid characters.  Please check with the value of other numbers that should contain only digits and semicolon(;) characeter';
                die;
            }
        $otherNumbers=array();
        $otherNumbers=explode(';',$_REQUEST["unknownno"]);
        foreach($groupsmsact as $number)
            {
                if(strlen($number)!=10)
                    {
                        echo "Please check with invalid number provided.  The other mobile numbers provided must be ten digit mobile numbers only.";
                        die;
                    }
            }    
            
    }
            
        


//$mobileno=$_REQUEST["mobileno"];
$messagetitle=$_REQUEST["messagetitle"];
$composemsg=$_REQUEST["composemsg"];
$loginid=$_SESSION['LOGINID'];
$schoolid=$_SESSION['SCHOOLID'];
$whatsappmessage=0;
$smsmessage=0;

if(isset($_REQUEST["smsmessage"]))
    {
        $smsmessage=$_REQUEST["smsmessage"];
    }

if(isset($_REQUEST["whatsappmessage"]))
    {
        $smsmessage=$_REQUEST["whatsappmessage"];
    }


$messagedate=date("d/m/Y");
$messagetime=date('G:i');
//echo $messagedate . ' ' . $messagetime.'<br>';

if($_REQUEST["messagedate"]!=""){
    $messagedate=$_REQUEST["messagedate"];
}
//echo $messagedate . ' ' . $messagetime.'<br>';

if($_REQUEST["messagetime"]!=""){
    $messagetime=$_REQUEST["messagetime"];
}







//echo $messagedate . ' ' . $messagetime.'<br>';

$message_date_time="str_to_date('" . $messagedate . " " . $messagetime. "','%d/%m/%Y %H:%i')";


//echo $message_date_time. '<br>';


    $mid=sequence_number('message_master_table',$dbhandle);

    if($mid==false)
        {
                $el=new LogMessage();
                $sql='Please fix generate_sequence.php file.';
                $error_msg="<h1>Database Error: Not able to generate Message Unique Id. Please try after some time.</h1>";
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Individual Message',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]=$error_msg;    
        }
    


    mysqli_autocommit($dbhandle,FALSE);

    //Inserting Message master data into message_master_table.
    
    $putMessageMasterRow_sql="insert into message_master_table(mid,message_title,message,message_date,sms,whatsapp,school_id,created_by) values($mid,'$messagetitle','$composemsg',$message_date_time,$smsmessage,$whatsappmessage,$schoolid,'$loginid')";


    $putMessageMasterRow_result=$dbhandle->query($putMessageMasterRow_sql);
    //echo $dbhandle->error;
    //echo $putMessageMasterRow_sql;
    if($putMessageMasterRow_result==false)
        {
            $el=new LogMessage();
            $sql='Please fix generate_sequence.php file.';
            $error_msg="<h1>Database Error: Not able to insert into message_master_table . Please try after some time.</h1>";
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Individual Message',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]=$error_msg;    
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            echo "Error 01:The SMS has been failed to create.  Please consult Application Consultant.";
            die();
        }
    

    $success_count=0;
    $total_count=0;

if($user_type==1 or $user_type==2)  //Executing for Student and Staff user type.  
{      



    foreach ($_REQUEST['mobileno'] as $selectedOption) 
        {

            $piece_value = explode(";", $selectedOption);
            $sms_number=$piece_value[0];
            $whatsapp_number=$piece_value[1];
            $userid=$piece_value[2];

            $insertMessageDetails_sql="insert into message_details_table
            (mid,
            sms_number,
            whatsapp_number,
            delivery_status,
            whatsapp_view_status,
            user_type,
            user_id) 
            values(?,?,?,0,0,?,?)";
        
            $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
            //echo $dbhandle->error;	
            $insertMessageDetails_stmt->bind_param('issis',
            $mid,
            $sms_number,
            $whatsapp_number,
            $user_type,
            $userid);
            
            
            if($insertMessageDetails_stmt->execute())
                {
                    $success_count++;
                    
                    //echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";
                } 
            $total_count++;
            //echo $dbhandle->error;
        // echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";

        }

        if($success_count!=$total_count)
        {
            //var_dump($getStudentCount_result);
            $error_msg=mysqli_error($dbhandle);
            $sql="";
            $el=new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Individual Message ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to save all contact numbers to send message. Please try after some time.</h1>";
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
            //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
            //$str_end='</div>';
            //echo $str_start.$messsage.$str_end;
            //die;
            echo "Error 02:The SMS has been failed to create.  Please consult Application Consultant.";
            //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
        }
        else
        {
            mysqli_commit($dbhandle);
            echo "The SMS has been created Successfully.";
            //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
        } 


}

else        //Processing for Other Numbers.
{
    $otherNumbers=array();
    $otherNumbers=explode(';',$_REQUEST["unknownno"]);
    foreach($otherNumbers as $number)
        {

            $sms_number=$number;
            $whatsapp_number=$number;
            $userid=$number;

            $insertMessageDetails_sql="insert into message_details_table
            (mid,
            sms_number,
            whatsapp_number,
            delivery_status,
            whatsapp_view_status,
            user_type,
            user_id) 
            values(?,?,?,0,0,?,?)";
        
            $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
            //echo $dbhandle->error;	
            $insertMessageDetails_stmt->bind_param('issis',
            $mid,
            $sms_number,
            $whatsapp_number,
            $user_type,
            $userid);
            
            
            if($insertMessageDetails_stmt->execute())
                {
                    $success_count++;
                    
                    //echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";
                } 
            $total_count++;
            //echo $dbhandle->error;
        // echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";

        }


        if($success_count!=$total_count)
            {
                //var_dump($getStudentCount_result);
                $error_msg=mysqli_error($dbhandle);
                $sql="";
                $el=new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Individual Message -Other Numbers',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to save all contact numbers to send message. Please try after some time.</h1>";
                $dbhandle->query("unlock tables");
                mysqli_rollback($dbhandle);
                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                //$str_end='</div>';
                //echo $str_start.$messsage.$str_end;
                //die;
                echo "Error 02:The SMS has been failed to create.  Please consult Application Consultant.";
                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
            }
            else
            {
                mysqli_commit($dbhandle);
                echo "The SMS has been created Successfully.";
                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
            } 

}


   
*/

?>