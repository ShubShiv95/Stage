
<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
if (isset($_REQUEST["submit"])) {
    mysqli_autocommit($dbhandle, false);
    $previous_file = $_REQUEST['previous_file'];
    $new_file = $_FILES['class_routine']['name'];
    $class_id=$_REQUEST["classid"];
    $routine_id=$_REQUEST["class_routine_id"];
    $sec_id=$_REQUEST["secid"];
    // checking existed data
    $query_check="SELECT COUNT(Class_Routine_Id) as total_row FROM class_time_table WHERE Class_Sec_Id = ? AND Session = ?";
    $query_check_prepare = $dbhandle->prepare($query_check);
    $query_check_prepare->bind_param('is',$sec_id,$_SESSION["SESSION"]);
    $query_check_prepare->execute();
    $result_set = $query_check_prepare->get_result();
    $row_result = $result_set->fetch_assoc();
    $routines = $row_result['total_row'];
    if ($routines>0 && empty($new_file)) {
        echo 'Routine Existed!';
    }
    else
    {
            //update class_time_table set Class_Sec_Id=15 where Class_Routine_Id=1  
            $query_search = "update class_time_table set Class_Sec_Id=? where Class_Routine_Id=?";
            $query_search_update = $dbhandle->prepare($query_search);
            $query_search_update->bind_param("ii",$_REQUEST["secid"],$_REQUEST["class_routine_id"]);
            $query_search_update->execute();
            if (!empty($new_file)) {
                $delete_file =unlink('./app_images/class_timetable/'.$previous_file);
                // upload new file
                $fileExtension = strtolower(pathinfo($_FILES['class_routine']['name'], PATHINFO_EXTENSION));
                if ($fileExtension != 'pdf') {
                  echo 'Only PDF Are Allowed';
                }
                else{
                  $target_path = './app_images/class_timetable/'.$previous_file;
                  $move_file = move_uploaded_file($_FILES['class_routine']['tmp_name'],$target_path);
                  if ($move_file) {
                    echo 'New File Has Been Updated';
                  }
                }
            }
            if ($ins_query_prep->execute()) {
                //echo '<p class="text-success">New TimeTable Has Been Added </p><script>window.setTimeout(function(){window.location.href="./AddClassTimeTable.php"},3000)</script>';
            }
            else
            {
                $error_msg = $query_search_update->error;
                $el = new LogMessage();
                $sql = $query_search;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Update Class Time Table ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                mysqli_rollback($dbhandle);
                $statusMsg = 'Error: Class Routine Update Error.';
                die;
            }
    }
    mysqli_commit($dbhandle);
}





?>
