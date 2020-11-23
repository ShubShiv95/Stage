<?php
session_start();
include './dbobj.php';
include './security.php';
include './errorLog.php';
include './sequenceGenerator.php';

if (isset($_REQUEST['document_sender'])) {
  mysqli_autocommit($dbhandle, false);
  $staff_id = $_REQUEST['staff_id'];
  $document_name = $_REQUEST['document_name'];
  $document_file_name = $_FILES['document_file_name']['name'];
  if (!empty($staff_id)) {

    // main directory
    $directory = './app_images/staff_documents';

    // staff directory
    $staff_directory = $staff_id . '_documents';

    // checking and making directories
    if (!file_exists($directory)) {
      mkdir($directory, 0777, true);
    }
    if (!file_exists($directory.$staff_directory)) {
      mkdir($directory.'/'. $staff_directory, 0777, true);
    }
    $dir_file_path = $directory.'/'. $staff_directory;
    $allowedImageExtension = array("jpg", "jpeg", "pdf");
    $fileExtension = strtolower(pathinfo($_FILES['document_file_name']['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedImageExtension)) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>Alert!</strong> Only Image(jpg,jpeg) or Pdf allowed.
    </div>';
    } else {
      // moving file to directory
      $file_name = md5($_SESSION["EMPLOYEEID"] . date('YmdHis')) . '.' . $fileExtension;
      $target_path = $directory.'/'. $staff_directory.'/'. $file_name;
      if (move_uploaded_file($_FILES['document_file_name']['tmp_name'], $target_path)) {
        // saving data to database
        $document_id = sequence_number('staff_document_table', $dbhandle);
        $docquery = "INSERT INTO `staff_document_table`(`Document_Id`, `Document_Name`, `File_Name`, `File_Path`, `Staff_Id`, `School_Id`, `Updated_By`,`Enabled`) VALUES (?,?,?,?,?,?,?,1)";
        $docquery_prepare = $dbhandle->prepare($docquery);
        $docquery_prepare->bind_param("isssiis", $document_id,$document_name,$file_name,$dir_file_path,$staff_id,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);

        if (!$docquery_prepare->execute()) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> ' . $error_msg = $docquery_prepare->error . '.
          </div>';
          $el = new LogMessage();
          $sql = $docquery;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Staff Document Upload ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
          mysqli_rollback($dbhandle);
          $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
          die;
        }else{
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Success!</strong> Document Saved Successfully.
          </div>';
        }
      }
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>Alert!</strong> Staff Id Cannot Be Blank.
    </div>';
  }
  mysqli_commit($dbhandle);
}


/* get staff documents */
if (isset($_REQUEST['getStaffDocument'])) {
  //$_REQUEST['staff_id];
  $data = array();
  $doc_query = "SELECT * FROM `staff_document_table` WHERE `Staff_Id` = ? AND `Enabled`=1";
  $docquery_prepare = $dbhandle->prepare($doc_query);
  $docquery_prepare->bind_param('i',$_REQUEST['staff_id']);
  $docquery_prepare->execute();
  $result_set = $docquery_prepare->get_result();

  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}


/* delete document */
if (isset($_REQUEST['deleteStaffDocument'])) {
  
  $del_query = "UPDATE staff_document_table SET Enabled = 0 WHERE Document_Id = ?";
  $del_query_prepare = $dbhandle->prepare($del_query);
  $del_query_prepare->bind_param('i',$_REQUEST['document_id']);
  if ($del_query_prepare->execute()) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Success!</strong> Document Deleted.
  </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Alert!</strong> Failed To Delete.
  </div>';
  }
}