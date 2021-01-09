<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php'; 
require_once 'sequenceGenerator.php';



if (isset($_REQUEST['submit'])) {
    mysqli_autocommit($dbhandle, false);
    $teacher_id=$_REQUEST['teacher_id'];
    $notice_attachment =$_FILES['notice_attachment']['name'];

    $query_search = "SELECT count(staff_id) as totalrow FROM teacher_time_table WHERE Session= ? and Staff_Id =? ";
    $query_search_update = $dbhandle->prepare($query_search);
    $query_search_update->bind_param("si",$_SESSION["SESSION"],$teacher_id);
    
    $query_search_update->execute();
    $result_set = $query_search_update->get_result();
    $row_routine= $result_set->fetch_assoc();
  
    if ($row_routine['totalrow']>0) {
      
       echo 'Teacher Existed With Same Name & Id.<script>window.setTimeout(function(){window.location.href="./AddTeacherTimeTable.php"},3000)</script>';
    }
    else
    {
      $directory = './app_images/teacher_timetable';

      // checking and making directories
      if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
      }
      
      $dir_file_path = $directory;
      $allowedImageExtension = array("pdf");
      $fileExtension = strtolower(pathinfo($_FILES['notice_attachment']['name'], PATHINFO_EXTENSION));
      if (!in_array($fileExtension, $allowedImageExtension)) {
        echo 'only PDF allowed<script>window.setTimeout(function(){window.location.href="./AddteacherTimeTable.php"},1000)</script>';
      } else {
        // moving file to directory
        $file_name = md5($_SESSION["LOGINID"] . date('YmdHis')) . '.' . $fileExtension;
        $target_path = $directory.'/'. $file_name;
        if (move_uploaded_file($_FILES['notice_attachment']['tmp_name'], $target_path)) 
      {
          $ins_query="INSERT INTO `teacher_time_table`(`Teacher_Routine_Id`, `Staff_Id`, `filename`, `Session`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
          $teacher_Routine_Id = sequence_number('teacher_time_table',$dbhandle);
          $ins_query_prep = $dbhandle->prepare($ins_query);
          $ins_query_prep->bind_param("iissis",$teacher_Routine_Id,$teacher_id,$file_name,$_SESSION["SESSION"],$_SESSION['SCHOOLID'],$_SESSION["LOGINID"]);
          if ($ins_query_prep->execute()) {
             echo '<p class="text-success">New Teacher TimeTable Has Been Added </p><script>window.setTimeout(function(){window.location.href="./AddteacherTimeTable.php"},3000)</script>';
          }
          else {
              echo $error_msg = $ins_query_prep->error;
              $el = new LogMessage();
              $sql = $ins_query;
              //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
              $el->write_log_message('Teacher Document Upload ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
              mysqli_rollback($dbhandle);
              echo $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
              die;
          }
          mysqli_commit($dbhandle);
          }
          
      } 
    }
  }
?>