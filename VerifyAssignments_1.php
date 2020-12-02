<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['getAssignmentPages'])) {
  $currentPage = $_REQUEST['currentPage']-1;
  $studentId = $_REQUEST['studentId'];
  $assignmentId = $_REQUEST['assignmentId'];
  
  $query = "select tsft.* FROM task_submit_file_table tsft, task_submit_table tst WHERE tst.Task_Submit_Id = tsft.Task_Submit_Id and tst.Task_Id= ? AND tsft.Updated_By = ? ORDER BY TSF_Id LIMIT 1 OFFSET ?";
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
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> Image Saved.
  </div>';
  }

}

/**** save remarks ****/
if (isset($_REQUEST['save_remarks'])) {
 echo $image_name = $_REQUEST['image_name'];
 echo  $remarks = $_REQUEST['message'];
  $update_query = "UPDATE task_submit_file_table SET Task_Remarks = ? WHERE File_Name = ?";
  $update_query_prepare = $dbhandle->prepare($update_query);
  $update_query_prepare->bind_param("ss",$remarks,$image_name);
  if ($update_query_prepare->execute()) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> Remarks Saved.
  </div>';
  }
}

/* final submit */
if(isset($_REQUEST['finsal_submit_asignment'])){
  $assignmentId = $_REQUEST['assignmentId']; $user_id = $_REQUEST['user_id'];
  $final_qieru = "UPDATE task_submit_table SET Is_Verified = 'Yes' WHERE Updated_By = ? AND Task_Id = ?";
  $final_qieru_prepare = $dbhandle->prepare($final_qieru);
  $final_qieru_prepare->bind_param("si",$user_id,$assignmentId);
  if($final_qieru_prepare->execute()){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> Assignment Saved As Final Submit.
  </div>';
  }
}
?>
