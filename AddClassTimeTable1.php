
<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
if (isset($_REQUEST["submit"])) {
    mysqli_autocommit($dbhandle, false);
    $sec_id=$_REQUEST["secid"];
    $class_routine=$_FILES["class_routine"]["name"] ;
    $class_id=$_REQUEST["classid"];
    $query_search = "SELECT COUNT(Class_Routine_Id) as totalrow FROM class_time_table WHERE Session=? AND Class_Sec_Id=?";
    $query_search_update1 = $dbhandle->prepare($query_search);
    $query_search_update1->bind_param("si",$_SESSION["SESSION"],$sec_id);
    $query_search_update1->execute();
    $result_set = $query_search_update1->get_result();
    $row_routine= $result_set->fetch_assoc();
    if ($row_routine['totalrow']>0) {
      echo 'Class TimeTable existing with same session <script>window.setTimeout(function(){window.location.href="./AddClassTimeTable.php"},3000)</script>';
    }
    else 
    {
      $directory = './app_images/class_timetable';

    // checking and making directories
    if (!file_exists($directory)) 
    {
      mkdir($directory, 0777, true);
    }

    $dir_file_path = $directory;
    $allowedImageExtension = array("pdf");
    $fileExtension = strtolower(pathinfo($_FILES['class_routine']['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedImageExtension)) 
    {
      echo 'only PDF allowed<script>window.setTimeout(function(){window.location.href="./AddClassTimeTable.php"},3000)</script>';
    } else 
    {
      // moving file to directory
      $file_name = md5($_SESSION["LOGINID"] . date('YmdHis')) . '.' . $fileExtension;
      $target_path = $directory.'/'. $file_name;
      if (move_uploaded_file($_FILES['class_routine']['tmp_name'], $target_path)) 
      {
          $ins_query="INSERT INTO `class_time_table`(`Class_Routine_Id`, `Class_Sec_Id`, `filename`, `Session`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
          $Class_Routine_Id = sequence_number('class_time_table',$dbhandle);
          $ins_query_prep = $dbhandle->prepare($ins_query);
          $ins_query_prep->bind_param("iissis",$Class_Routine_Id,$_REQUEST['secid'],$file_name,$_SESSION["SESSION"],$_SESSION['SCHOOLID'],$_SESSION["LOGINID"]);
          if ($ins_query_prep->execute()) 
          {
              echo '<p class="text-success">New TimeTable Has Been Added </p><script>window.setTimeout(function(){window.location.href="./AddClassTimeTable.php"},3000)</script>';
          }
          else 
          {
              $error_msg = $ins_query_prep->error;
              $el = new LogMessage();
              $sql = $ins_query;
              //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
              $el->write_log_message('Add Class Time Table ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
              mysqli_rollback($dbhandle);
              $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
              die;
          }
          mysqli_commit($dbhandle);
          }
      } 
    }
}

?>
