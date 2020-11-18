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

    if(empty($_REQUEST['groupsmsact']))
        {
            echo "No contact list found to create the CUG Group.  Please select the contact list items.";
            die;

        }
    mysqli_autocommit($dbhandle,false);

    //Close_User_Group_Master table record entry. This means creating a Close user group name.
    $cugid=sequence_number('close_user_group_master',$dbhandle);
    $putCUGMasterRecord_sql="insert into close_user_group_master values($cugid,'$Group_Name',1," . $_SESSION["SCHOOLID"] . ",'" . $_SESSION["LOGINID"] . "',NOW())";
    //echo $putCUGMasterRecord_sql;
    $putCUGMasterRecord_result=$dbhandle->query($putCUGMasterRecord_sql);
    
    if(!$putCUGMasterRecord_result)
        {
            //Error:killing page;
            die;
            mysqli_rollback($dbhandle);

        }
    //echo 'abc';    
    //End of Close_User_Group_Master table record entry.
    
    //Close user group details table record entry.  This means inserting contact numbers for the close user group created.
        $cugdid=sequence_number('close_user_group_details',$dbhandle);
        $sms_number='';
        $whatsapp_number='';
        $userid='';
        $username='';
        $enabled=1;
    
        $insertCugDetails_sql="insert into close_user_group_details
        (cugd_id,
        cug_id,
        user_name,
        sms_contact_no,
        whatsapp_contact_no,
        user_type,
        user_id,
        enabled,
        school_id,
        updated_by) 
        values(?,?,?,?,?,?,?,?,?,?)";
    
        $insertMessageDetails_stmt=$dbhandle->prepare($insertCugDetails_sql);
        //echo $dbhandle->error;	
        $insertMessageDetails_stmt->bind_param('iisssisiis',
        $cugdid,
        $cugid, 
        $username, 
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
            $piece_value = explode(";", $value);
            $sms_number=$piece_value[0];
            $whatsapp_number=$piece_value[1];
            $userid=$piece_value[2];
            $usertypeid=$piece_value[3];
            $username=$piece_value[4];
            /*
            echo '<br>SMS No:' . $sms_number;
            echo '<br>Whatsapp No:' . $whatsapp_number;
            echo '<br>Reff Id:' . $userid;
            echo '<br>User Type Id:' . $usertypeid;
            */
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
    


?>