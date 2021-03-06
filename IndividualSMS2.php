<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include 'sequenceGenerator.php';


/*Server Side Validataion Process*/
$user_type='';

if(!isset($_REQUEST['user_type']))
    {
        echo "No receiver contact details provided.  Please provide receiving contacts.";
        die;
    }
else 
    {      
        $user_type=$_REQUEST['user_type'];
    }

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
        foreach($otherNumbers as $number)
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

if(isset($_REQUEST["message-type"]))
    {
        $messagetype=$_REQUEST["message-type"];
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
    $message_category='Communication';
    $putMessageMasterRow_sql="insert into message_master_table(message_id,message_category,message_title,message,message_date,message_type,school_id,created_by) values($mid,'$message_category','$messagetitle','$composemsg',$message_date_time,'$messagetype',$schoolid,'$loginid')";


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

    ////deciding corresponding index value as of type of contact number: 0 for sms and 1 for whatsapp type.
    $ContactNumberTypeIndex=0;  
    if($messagetype=='SMS')
        {
            $ContactNumberTypeIndex=0;
        }
    else if($messagetype=='Whatsapp')
    {
        $ContactNumberTypeIndex=1;
    }   
    //End of contact number type index value identification.

    foreach ($_REQUEST['mobileno'] as $selectedOption) 
        {

            $piece_value = explode(";", $selectedOption);
            
            $mobile_number=$piece_value[$ContactNumberTypeIndex]; //decides for contact number SMS or Whatsapp.
         
            $userid=$piece_value[2];

            $insertMessageDetails_sql="insert into message_details_table
            (message_id,
            mobile_number,
            delivery_status,
            view_status,
            user_type,
            user_id) 
            values(?,?,0,0,?,?)";
        
            $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
            //echo $dbhandle->error;	
            $insertMessageDetails_stmt->bind_param('isss',
            $mid,
            $mobile_number,
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

    ////deciding corresponding index value as of type of contact number: 0 for sms and 1 for whatsapp type.
    $ContactNumberTypeIndex=0;  
    if($messagetype=='SMS')
        {
            $ContactNumberTypeIndex=0;
        }
    else if($messagetype=='Whatsapp')
    {
        $ContactNumberTypeIndex=1;
    }   
    //End of contact number type index value identification.

    foreach($otherNumbers as $number)
        {

            $mobile_number=$piece_value[$ContactNumberTypeIndex]; //decides for contact number SMS or Whatsapp.
            $userid=$number;

            $insertMessageDetails_sql="insert into message_details_table
            (message_id,
            mobile_number,
            delivery_status,
            view_status,
            user_type,
            user_id) 
            values(?,?,0,0,?,?)";
        
            $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
            //echo $dbhandle->error;	
            $insertMessageDetails_stmt->bind_param('isss',
            $mid,
            $mobile_number,
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


   


?>