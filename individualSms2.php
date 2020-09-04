<?php
session_start();
include 'dbobj.php';
include 'error_log.php';
include 'security.php';
include 'sequence_generator.php';


$user_type=$_REQUEST["user_type"];
//$mobileno=$_REQUEST["mobileno"];
$messagetitle=$_REQUEST["messagetitle"];
$composemsg=$_REQUEST["composemsg"];
$messagedate=$_REQUEST["messagedate"];
$messagetime=$_REQUEST["messagetime"];
$smsmessage=$_REQUEST["smsmessage"];
$whatsappmessage=$_REQUEST["whatsappmessage"];
$loginid=$_SESSION['LOGINID'];
$schoolid=$_SESSION['SCHOOLID'];
$message_date_time="str_to_date('$messagedate $messagetime','%d/%m/%Y %H:%i')";




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
    echo $dbhandle->error;
    echo $putMessageMasterRow_sql;
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
            echo "<br>Unsecessful";
            die();
    }
    

    $success_count=0;
    $total_count=0;

    foreach ($_REQUEST['mobileno'] as $selectedOption) {
        $piece_value = explode("-", $selectedOption);
        $mob_no=$piece_value[0];
        $userid=$piece_value[1];

        $insertMessageDetails_sql="insert into message_details_table
        (mid,
        mobile_number,
        delivery_status,
        message_view_status,
        user_type,
        user_id) 
        values(?,?,1,1,?,?)";
     
        $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
        echo $dbhandle->error;	
        $insertMessageDetails_stmt->bind_param('isis',
        $mid,
        $mob_no,
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
    echo "<br>Unsecessful";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
}
else
{
    mysqli_commit($dbhandle);
    echo "<br>Success";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
}    


?>