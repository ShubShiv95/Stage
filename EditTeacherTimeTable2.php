<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php'; 
require_once 'sequenceGenerator.php';

if (isset($_REQUEST["submit"])) 
{
  mysqli_autocommit($dbhandle, false);
  $taecher_timetable = $_FILES['taecher_timetable']['name'];
  $teacher_id = $_REQUEST['teacher_id'];
  $previous_file = $_REQUEST['prev_file_name'];
  $query_search = "SELECT count(staff_id) as totalrow FROM teacher_time_table WHERE Session= ? and Staff_Id = ? ";
  $query_search_update = $dbhandle->prepare($query_search);
  $query_search_update->bind_param("si",$_SESSION["SESSION"],$teacher_id);

  $query_search_update->execute();
  $result_set = $query_search_update->get_result();
  $row_routine= $result_set->fetch_assoc();

  if ($row_routine['totalrow']>0 && empty($taecher_timetable)) 
  {
    
    echo 'Teacher has already alloted some other routine.<script>window.setTimeout(function(){window.location.href="./AddTeacherTimeTable.php"},3000)</script>';
  }
  else
  {   
      $update_query = "UPDATE teacher_time_table SET Staff_id = ? WHERE teacher_routine_Id = ?";
      $update_query_prep = $dbhandle->prepare($update_query);
      $update_query_prep->bind_param("ii", $teacherid,$_REQUEST['routine_id']);
      if (!empty($taecher_timetable)) {
        
        // uploading new file and deleting file
        $delete_file =unlink('./app_images/teacher_timetable/'.$previous_file);
        // upload new file
        $fileExtension = strtolower(pathinfo($_FILES['taecher_timetable']['name'], PATHINFO_EXTENSION));
        if ($fileExtension != 'pdf') {
          echo 'Only PDF Are Allowed';
        }
        else{
          $target_path = './app_images/teacher_timetable/'.$previous_file;
          $move_file = move_uploaded_file($_FILES['taecher_timetable']['tmp_name'],$target_path);
          if ($move_file) {
            echo 'New File Has Been Updated';
          }
        }
        
      }
      
      if ($update_query_prep->execute()) 
      {
        echo '<p class="text-success"><h1>Teacher Has Been Updated Successfully.</h1> </p><script>window.setTimeout(function(){window.location.href="./AddteacherTimeTable.php"},2000)</script>';
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