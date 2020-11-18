<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include 'sequenceGenerator.php';


$aeid=$_REQUEST["aeid"];
$followupdate=$_REQUEST["followupdate"];
$enqstatus=$_REQUEST["enqstatus"];
$feedbacknote=$_REQUEST["feedbacknote"];
$noteid=sequence_number('admission_followup_note',$dbhandle);


mysqli_autocommit($dbhandle,FALSE);


$insertAdmissionFollowupNote_sql="insert into admission_followup_note
    (NOTEID,
    AEID,
    NOTE,
    NOTE_DATE,
    FOLLOWUP_DATE,
    CREATED_BY,
    SCHOOL_ID) values(?,?,?,NOW(),str_to_date(?,'%d/%m/%Y'),?,?)";
    $AdmissionFollowupNote_stmt=$dbhandle->prepare($insertAdmissionFollowupNote_sql);
    
    $AdmissionFollowupNote_stmt->bind_param('iisssi',
        $noteid,
        $aeid,
        $feedbacknote,
        $followupdate,
        $_SESSION["LOGINID"],
        $_SESSION["SCHOOLID"]
        );
    
    $AdmissionFollowupNote_stmt_result=$AdmissionFollowupNote_stmt->execute(); //Feedback note added to admission_followup_note Table.
    //echo $dbhandle->error;die;	
    //Updating Enquiry_Status on admission_enquiry_table 
    
    $updateEnqiryStatus_sql="update admission_enquiry_table set enquiry_status=? where aeid=?";
    
    $updateEnqiryStatus_stmt=$dbhandle->prepare($updateEnqiryStatus_sql);
   // echo $dbhandle->error;die;	
    
    $updateEnqiryStatus_stmt->bind_param('si',
        $enqstatus,
        $aeid
        );  
        
        $updateEnqiryStatus_stmt_result=$updateEnqiryStatus_stmt->execute();     
    
    if(!$AdmissionFollowupNote_stmt_result  or !$updateEnqiryStatus_stmt_result)
        {
            //var_dump($getStudentCount_result);
            $error_msg=mysqli_error($dbhandle);
            $sql="";
            $el=new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Add Feedback Note',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
            //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
            //$str_end='</div>';
            //echo $str_start.$messsage.$str_end;
            //die;
            //echo "unsecessful";
            echo '<meta HTTP-EQUIV="Refresh" content="0; URL=FollowupNote.php?aeid=' .$aeid . '">';
        }
    else
        {
            mysqli_commit($dbhandle);
            //echo "success";
            echo '<meta HTTP-EQUIV="Refresh" content="0; URL=FollowupNote.php?aeid=' .$aeid . '">';
        }    

?>