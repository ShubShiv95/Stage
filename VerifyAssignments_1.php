<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['getAssignmentPages'])) {
  $currentPage = $_REQUEST['currentPage']-1;
  $studentId = $_REQUEST['studentId'];
  $assignmentId = $_REQUEST['assignmentId'];
  
  $query = "SELECT task_submit_file_table.* FROM task_submit_file_table INNER JOIN task_submit_table ON task_submit_table.Task_Submit_Id = task_submit_file_table.Task_Submit_Id WHERE task_submit_table.Task_Id = ? AND task_submit_table.Refference_Id = ? LIMIT 1 OFFSET ?";
  $queryPrepare = $dbhandle->prepare($query);
  $queryPrepare->bind_param("isi",$assignmentId,$studentId,$currentPage);
  $queryPrepare->execute();
  $result = $queryPrepare->get_result();
  $rowData = $result->fetch_assoc();
  echo json_encode($rowData);
}

/* over write image to existing image */
if(isset($_REQUEST['overWriteImage'])){
  $previousImage = $_REQUEST['imageName'];
  $studentId = $_REQUEST['studentId'];
  $assignmentId = $_REQUEST['assignmentId'];
  $newImage = $_REQUEST['newImage'];
  $imageexplode = explode(";",$newImage)[1];
  $imageexplode = explode(",",$imageexplode)[1];
  $decodeImage = base64_decode($imageexplode);

  $saveImage = file_put_contents('./app_images/student_assignment_uploads/'.$previousImage.'',$decodeImage);
  if($saveImage){
    echo json_encode("Done");
  }

}
?>
