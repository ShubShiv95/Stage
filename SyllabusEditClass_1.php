<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php'; 
require_once 'sequenceGenerator.php';

if (isset($_REQUEST["submit"])) 
{
  mysqli_autocommit($dbhandle, false);
   $assignment_class = $_REQUEST['assignment_class'];
   $assignment_subject = $_REQUEST['assignment_subject'];
    $query_search = "SELECT count(Class_Id) as totalrow FROM class_syllabus_table WHERE Subject_Id =? and Class_Id = ? ";
  $query_search_update = $dbhandle->prepare($query_search);
  $query_search_update->bind_param("si",$assignment_subject,$assignment_class);

  $query_search_update->execute();
  $result_set = $query_search_update->get_result();
  $row_routine= $result_set->fetch_assoc();

  if ($row_routine['totalrow']>0) 
  {
    echo 'Class has already alloted some other Syllabus.';
    //echo 'Class has already alloted some other Syllabus.<script>window.setTimeout(function(){window.location.href="./AddTeacherTimeTable.php"},3000)</script>';
  }
  else
  {   
      $update_query = "UPDATE class_syllabus_table SET Class_Id = ? and Subject_Id = ? WHERE Class_Syllabus_Id = ?";
      $update_query_prep = $dbhandle->prepare($update_query);
      $update_query_prep->bind_param("iii", $assignment_class,$assignment_subject,$_REQUEST['Class_Syllabus_Id']);
      
      
      if ($update_query_prep->execute()) 
      {
          echo 'updated success';
        //echo '<p class="text-success"><h1>Class Syllabus Has Been Updated Successfully.</h1> </p><script>window.setTimeout(function(){window.location.href="./AddteacherTimeTable.php"},2000)</script>';
      }
      else
      {
          $error_msg = $update_query_prep->error;
          $el = new LogMessage();
          $sql = $update_query;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Update Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
          //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
          mysqli_rollback($dbhandle);
          $statusMsg = 'Error: Teacher Routine Update Error.';
          die;
      }
      mysqli_commit($dbhandle);
  }

}

?>