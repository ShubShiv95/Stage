<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

//$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]

if(isset($_REQUEST['section_sender'])){
    if(empty($_REQUEST['section_sender'])){
        if (empty($_REQUEST['class_id'])) {
            echo '<p class="text-danger">Please Select Class</p>';
        }elseif (empty($_REQUEST['stream'])) {
            echo '<p class="text-danger">Please Select Stream</p>';
        }elseif (empty($_REQUEST['max_roll_number'])) {
            echo '<p class="text-danger">Please Type Max Roll Number</p>';
        }
        else {
            // get last section
            $queri_ex_sec = "SELECT max(Section) as Section FROM class_section_table WHERE Class_Id = ".$_REQUEST['class_id']." AND School_Id = ".$_SESSION["SCHOOLID"]."";
            $queri_ex_sec_prep =$dbhandle->prepare($queri_ex_sec);
            $queri_ex_sec_prep->execute();
            $result_set = $queri_ex_sec_prep->get_result();
            $last_sec_row = $result_set->fetch_assoc();
            $last_sec = $last_sec_row['Section'];
                
            // add new record
            $new_sec_name = ++$last_sec;
            mysqli_autocommit($dbhandle, false);
            if ($_REQUEST['action']=='add_new_record') 
            {
                $sec_id = sequence_number('class_section_table',$dbhandle);
                $ins_query = "INSERT INTO `class_section_table`(`Class_Sec_Id`, `Class_Id`, `Section`, `Stream`, `Max_Rollno`, `School_Id`) VALUES (?,?,?,?,?,?)";
                $ins_query_prep = $dbhandle->prepare($ins_query);
                $ins_query_prep->bind_param("iissii", $sec_id,$_REQUEST['class_id'],$new_sec_name,$_REQUEST['stream'],$_REQUEST['max_roll_number'],$_SESSION["SCHOOLID"]);
                if ($ins_query_prep->execute()) {
                    echo '<p class="text-success">New Section ('.$new_sec_name.') Has Been Added </p>';
                }else{
                    $error_msg = $ins_query_prep->error;
                    $el = new LogMessage();
                    $sql = $ins_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Add Section ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
            }
            elseif ($_REQUEST['action']=='update_existing_record') 
            {
                // update record
                $update_query = "UPDATE `class_section_table` SET `Class_Id`=?,`Section`=?,`Stream`=?,`Max_Rollno`=? WHERE `Class_Sec_Id` = ?";
                $update_query_prep = $dbhandle->prepare($update_query);
                $update_query_prep->bind_param("issii",$_REQUEST['class_id'],$new_sec_name,$_REQUEST['stream'],$_REQUEST['max_roll_number'],$_REQUEST['section_id']);
                if ($update_query_prep->execute()) {
                    
                }else{
                    $error_msg = $update_query_prep->error;
                    $el = new LogMessage();
                    $sql = $update_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Update Section ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;                    
                }
            }
            mysqli_commit($dbhandle);
        }

    }
}

// delete section
if (isset($_REQUEST['delete_section'])) {
    //$_REQUEST['sec_id'];
    $del_query = "UPDATE class_section_table SET Enabled = ".$_REQUEST['del_type']." WHERE Class_Sec_Id = ".$_REQUEST['sec_id']."";
    $del_query_prep = $dbhandle->prepare($del_query);
    $del_query_prep->execute();
    if($_REQUEST['del_type']=='0'){
        echo '<p class="text-success">Section Deleted Successfully!!!</p>';
    }else{
        echo '<p class="text-primary">Section RestoredSuccessfully!!!</p>';
    }
}

// count trash classwise
if (isset($_REQUEST['count_trash'])) {
   $query = "SELECT COUNT(Class_Sec_Id) AS total_rows FROM class_section_table WHERE Enabled = 0 AND School_Id = ? AND Class_Id = ?" ;
   $query_prep = $dbhandle->prepare($query);
   $query_prep->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['class_id']);
   $query_prep->execute();
   $result_set = $query_prep->get_result();
   $row_count = $result_set->fetch_assoc();
   echo json_encode($row_count['total_rows']);
}

/************** get deleted sections from class section table **************/
if (isset($_REQUEST['getAllDeletedSections'])) {
    $sec_query = "SELECT cst.*, cmt.Class_Name 
    FROM class_section_table cst, class_master_table cmt 
    WHERE cst.Class_Id = cmt.Class_Id AND cst.Enabled = 0 
    AND cst.School_Id=?
    AND cst.Class_Id=?
    ORDER BY cst.Section";
    $sec_query_prepare = $dbhandle->prepare($sec_query);
    $sec_query_prepare->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['class_id']);
    $sec_query_prepare->execute();
    $result_set = $sec_query_prepare->get_result(); $data = array();
    while ($sec_rows = $result_set->fetch_assoc()) {
      $data[] = $sec_rows;
    }
    echo json_encode($data);
  }
?>