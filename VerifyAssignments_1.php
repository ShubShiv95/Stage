<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['getAssignmentPages'])) {
  $currentPage = $_REQUEST['currentPage']-1;
  $studentId = $_REQUEST['studentId'];
  $assignmentId = $_REQUEST['assignmentId'];
  
  $query = "select tsft.* FROM task_submit_file_table tsft, task_submit_table tst WHERE tst.Task_Submit_Id = tsft.Task_Submit_Id and tst.Task_Id= ? AND tsft.Updated_By = ? LIMIT 1 OFFSET ?";
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
