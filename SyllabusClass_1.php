<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php'; 
require_once 'sequenceGenerator.php';



if (isset($_REQUEST['submit'])) {
    mysqli_autocommit($dbhandle, false);
    $assignment_class=$_REQUEST['assignment_class'];
    $assignment_subject=$_REQUEST['assignment_subject'];

    $class_routine_file =$_FILES['class_routine_file']['name'];

    $query_search = "SELECT count(class_id) as totalrow FROM class_syllabus_table WHERE Subject_Id= ? and class_id =? ";
    $query_search_update = $dbhandle->prepare($query_search);
    $query_search_update->bind_param("ii",$assignment_subject,$assignment_class);
    
    $query_search_update->execute();
    $result_set = $query_search_update->get_result();
    $row_routine= $result_set->fetch_assoc();
  
    if ($row_routine['totalrow']>0) {
      
       echo 'Class has been alloted with same subject.<script>window.setTimeout(function(){window.location.href="./Syllabusclass.php"},3000)</script>';
    }
    else
    {
      $directory = './app_images/Syllabus_class';

      // checking and making directories
      if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
      }
      
      $dir_file_path = $directory;
      $allowedImageExtension = array("pdf");
      $fileExtension = strtolower(pathinfo($_FILES['class_routine_file']['name'], PATHINFO_EXTENSION));
      if (!in_array($fileExtension, $allowedImageExtension)) {
        echo 'only PDF allowed<script>window.setTimeout(function(){window.location.href="./syllabusclass.php"},1000)</script>';
      } else {
        // moving file to directory
        $file_name = md5($_SESSION["LOGINID"] . date('YmdHis')) . '.' . $fileExtension;
        $target_path = $directory.'/'. $file_name;
        if (move_uploaded_file($_FILES['class_routine_file']['tmp_name'], $target_path)) 
      {
          $ins_query="INSERT INTO `class_syllabus_table`(`Class_Syllabus_Id`, `Class_Id`, `Subject_Id`, `filename`, `Session`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?)";
          $Class_Syllabus_Id = sequence_number('class_syllabus_table',$dbhandle);
          $ins_query_prep = $dbhandle->prepare($ins_query);
          $ins_query_prep->bind_param("iiissis",$Class_Syllabus_Id,$assignment_class,$assignment_subject,$file_name,$_SESSION["SESSION"],$_SESSION['SCHOOLID'],$_SESSION["LOGINID"]);
          if ($ins_query_prep->execute()) {
             echo '<p class="text-success">New Class Syllabus has been alloted.</p><script>window.setTimeout(function(){window.location.href="./syllabusclass.php"},3000)</script>';
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