<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include_once './sequenceGenerator.php';

/***** filter assignment for student *****/
if (isset($_REQUEST['filterAssignment'])) {
  $studentSection = 18;
  $studentID = "STUD202001";
  $sqlQuery = "SELECT task_master_table.* FROM task_master_table INNER JOIN task_allocation_list_table ON task_allocation_list_table.Task_Id = task_master_table.Task_Id WHERE task_master_table.Enabled = 1 AND task_allocation_list_table.Allocation_Reference_Id = ? AND task_master_table.Subject_Id = ? AND date_format(task_master_table.Updated_On,'%m/%Y') = ?";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->bind_param("iis", $studentSection, $_REQUEST['subjectId'], $_REQUEST['monthNumber']);
  $sqlQueryprepare->execute();
  $resultset = $sqlQueryprepare->get_result();

  $i = 1;
  while ($row = $resultset->fetch_assoc()) {

    $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
    $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
    $queryAssignmnetFilePrepare->bind_param("i", $row['Task_Id']);
    $queryAssignmnetFilePrepare->execute();
    $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();

    echo '<div class="cart-box-row">
              <div class="box-row">
                  <div class="left-content">
                      <h6 class="text-uppercase"> ' . $row['Task_Name'] . '</h6>
                      <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by ' . $row['Updated_By'] . ' </span> | <span> Created on ' . $row['Updated_On'] . '</span></p>
                  </div>
                  <div class="right-content">
                      <ul>';
    while ($rowF = $queryAssignmnetFileResult->fetch_assoc()) {
      if ($rowF['Upload_Type'] == "Link") {
        echo '<li><a href="http://' . $rowF['Upload_Name'] . '" target="_blank" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>';
      } elseif ($rowF['Upload_Type'] == "File") {
        $fileType = explode('.', $rowF['Upload_Name']);
        if (strtolower($fileType[1]) == "ppt" || "pptx") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-1"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "doc" || "docx") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-2"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "jpg") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "jpeg") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "png") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "mp4") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-4"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>';
        } else {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-5"><i class="fa fa-file" aria-hidden="true"></i></a></li>';
        }
      }
    }
    echo '   </ul>
                  </div>
              </div>
              <div class="content-descr"> 
                  <a href="javascript:void(0);" add="addin' . $i . '" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                      <div class="content addin' . $i . '">
                      ' . $row['Task_Desc'] . '
                      <div class="text-right"><a class="btn btn-link btn-primary" href="./StudentAssignmentFileUpload.php?assignmentId=' . $row['Task_Id'] . '" target="_blank">Upload Files</a></div>
                      </div>
              </div>  
          </div>';
    $i = $i + 1;
  }
  /*}else{
    echo '<h4 class="text-danger">No Record Found. Window is Refreshing...Wait</h4><script>//window.setTimeout(function(){window.location.reload();},2000)</script>';
  }*/
}


/* save student assignment to database  */
if (isset($_REQUEST['student_assignment_submitter'])) {

  if (empty($_REQUEST['student_assignment_submitter'])) {
    $document_name = $_FILES['document_name']['name'];
    $status = 'error';
    $data = array();
    // File upload path 
    $uploadPath = "app_images/student_assignment_uploads/";


    function compressImage($source, $destination, $quality)
    {
      // Get image info 
      $imgInfo = getimagesize($source);
      $mime = $imgInfo['mime'];


      // Create a new image from file 
      switch ($mime) {
        case 'image/jpeg':
          $image = imagecreatefromjpeg($source);
          break;
        case 'image/png':
          $image = imagecreatefrompng($source);
          break;
        default:
          $image = imagecreatefromjpeg($source);
      }

      // Save image 

      imagejpeg($image, $destination, $quality);

      // Return compressed image 
      return $destination;
    }

    if (!empty($_FILES['document_name']['name'])) {
      // File info 
      $fileName = basename($_FILES['document_name']['name']);
      $imageUploadPath = $uploadPath . $fileName;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

      // Allow certain file formats 
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        // Image temp source 
        $imageTemp = $_FILES["document_name"]["tmp_name"];
        
        // Compress size and upload image 
        $compressedImage = compressImage($imageTemp, $imageUploadPath, 25);

        $enc_Name = md5($_SESSION["EMPLOYEEID"] . 'A' . date('YmdHis')) . '.' . $fileType;
        rename($uploadPath . '/' . $fileName, $uploadPath . '/' . $enc_Name);

        mysqli_autocommit($dbhandle, false);
        /* save data to database */
        // submit to task submit id
        
        $Reference_Id = '2';
        $isverified = 'No';
        $enabled = 1;
        $task_id = $_REQUEST['assignmentId'];

        $searchTask = "SELECT * FROM `task_submit_table` WHERE `Task_Id` = ?";
        $searchTaskPrepare = $dbhandle->prepare($searchTask);
        $searchTaskPrepare->bind_param("i", $task_id);
        $searchTaskPrepare->execute();
        $raskResult = $searchTaskPrepare->get_result();
        $rowTask = $raskResult->fetch_assoc();
        if(empty($rowTask['Task_Id'])){
          $tablename = "task_submit_table";
          $Task_Submit_Id = sequence_number($tablename, $dbhandle);
          $queryTask = "INSERT INTO task_submit_table(Task_Submit_Id, Refference_Id, Task_Id, Is_Verified, School_Id, Updated_By, Enabled,Updated_On) VALUES (?,?,?,?,?,?,?,NOW())";

          $queryTaskPrepare = $dbhandle->prepare($queryTask);
          $queryTaskPrepare->bind_param(
            "isisisi",
            $Task_Submit_Id,
            $Reference_Id,
            $task_id,
            $isverified,
            $_SESSION["SCHOOLID"],
            $_SESSION["LOGINID"],
            $enabled
          );
          $exec_task = $queryTaskPrepare->execute();
          if (!$exec_task) {
            //var_dump($getStudentCount_result);
            $error_msg = $queryTaskPrepare->error;
            $el = new LogMessage();
            $sql = $queryTask;
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Student Assignment Upload ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
           
            mysqli_rollback($dbhandle);
            
            echo json_encode($statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.');
            die;
          }
          echo $queryTaskPrepare->error;        
        
        }else{
         
          $Task_Submit_Id = $rowTask['Task_Submit_Id'];
        }

        // save data to task submit file
        $file_path = './app_images/student_assignment_uploads/';
        $taskRemarks = '';
        $tablename = "task_submit_file_table";
        $TSF_Id = sequence_number($tablename, $dbhandle);

        $query = "INSERT INTO task_submit_file_table(TSF_Id, Task_Submit_Id, File_Path, Task_Note, Is_Verified, School_Id, Updated_By,Enabled,File_Name) VALUES (?,?,?,?,?,?,?,?,?)";
        $queryPrepare = $dbhandle->prepare($query);
        $queryPrepare->bind_param("iisssisis", $TSF_Id, $Task_Submit_Id, $file_path, $_REQUEST['task_remarks'], $isverified, $_SESSION["SCHOOLID"], $_SESSION["LOGINID"], $enabled, $enc_Name);
        $exec_task_file = $queryPrepare->execute();
        if (!$exec_task_file) {
          //var_dump($getStudentCount_result);
          $error_msg = $queryTaskPrepare->error;
          $el = new LogMessage();
          $sql = $query;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Student Assignment Upload ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
          //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
         
          mysqli_rollback($dbhandle);
          
          echo json_encode($statusMsg = 'Error: Assignment Task File Error.  Please consult application consultant.');
          die;
        }
        
        if ($exec_task_file) {
          mysqli_commit($dbhandle);
        } else {
        //  mysqli_rollback($dbhandle);
        }
        if ($compressedImage) {
          $status = 'success';
          $statusMsg = "Assignment Saved successfully.";
        } else {
          $status = 'error';
          $statusMsg = "Assignment Saving Failed!";
        }
      } else {
        $status = 'error';
        $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
      }
    } else {
      $status = 'error';
      $statusMsg = 'Please select an image file to upload.';
    }
  }

  $data['status'] = $status;
  $data['message'] = $statusMsg;
  echo json_encode($data);
}


/** get stuednts file  **/
if (isset($_REQUEST['getStudentAssignment'])) {
  $assignment_id = $_REQUEST['assignment_id'];
  $user = $_SESSION['LOGINID'];
  $data = array();
  $query_files = "SELECT task_submit_file_table.* FROM task_submit_file_table INNER JOIN task_submit_table ON task_submit_table.Task_Submit_Id = task_submit_file_table.Task_Submit_Id WHERE task_submit_file_table.Updated_By = ? AND task_submit_table.Task_Id = ? ORDER BY TSF_Id DESC";
  $query_files_prepare = $dbhandle->prepare($query_files);
  $query_files_prepare->bind_param("ii", $user, $assignment_id);
  $query_files_prepare->execute();
  $resultQuery = $query_files_prepare->get_result();
  while ($rows = $resultQuery->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}


/***** filter assignment for teachers *****/
if (isset($_REQUEST['filterAssignmentSubmit'])) {
  $sqlQuery = "SELECT task_master_table.* FROM task_master_table WHERE task_master_table.Enabled = 1  AND task_master_table.Subject_Id = ? AND date_format(task_master_table.Updated_On,'%m/%Y') = ?";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->bind_param("is",$_REQUEST['subjectName'], $_REQUEST['monthName']);
  $sqlQueryprepare->execute();
  $resultset = $sqlQueryprepare->get_result();

  $i = 1;
  while ($row = $resultset->fetch_assoc()) {

    $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
    $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
    $queryAssignmnetFilePrepare->bind_param("i", $row['Task_Id']);
    $queryAssignmnetFilePrepare->execute();
    $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();

    echo '<div class="cart-box-row">
              <div class="box-row">
                  <div class="left-content">
                      <h6 class="text-uppercase"> ' . $row['Task_Name'] . '</h6>
                      <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by ' . $row['Updated_By'] . ' </span> | <span> Created on ' . $row['Updated_On'] . '</span></p>
                  </div>
                  <div class="right-content">
                      <ul>';
    while ($rowF = $queryAssignmnetFileResult->fetch_assoc()) {
      if ($rowF['Upload_Type'] == "Link") {
        echo '<li><a href="http://' . $rowF['Upload_Name'] . '" target="_blank" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>';
      } elseif ($rowF['Upload_Type'] == "File") {
        $fileType = explode('.', $rowF['Upload_Name']);
        if (strtolower($fileType[1]) == "ppt" || "pptx") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-1"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "doc" || "docx") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-2"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "jpg") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "jpeg") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "png") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
        } elseif (strtolower($fileType[1]) == "mp4") {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-4"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>';
        } else {
          echo '<li><a href="./app_images/' . $rowF['Upload_Name'] . '" target="_blank"  class="color-5"><i class="fa fa-file" aria-hidden="true"></i></a></li>';
        }
      }
    }
    echo '   </ul>
                  </div>
              </div>
              <div class="content-descr"> 
                      <div class="content addin' . $i . '">
                      ' . $row['Task_Desc'] . '
                      <div class="text-right"><a class="btn btn-link btn-warning" href="./StudentAssignmentSubmitted.php?assignmentId=' . $row['Task_Id'] . '" target="_blank">View Submitted Assignments</a></div>
                      </div>
              </div>  
          </div>';
    $i = $i + 1;
  }
}

/**** get student submitted assignment ****/
if (isset($_REQUEST['getSubmittedAsignment'])) {
  $userId = 2;
  $assignmentId = $_REQUEST['assignmentId']; $isverified = 'No';
  $querySubmitted = "SELECT task_submit_table.*, employee_master_table.Employee_Name, COUNT(task_submit_file_table.TSF_Id) AS Total_Pages FROM task_submit_table INNER JOIN employee_master_table ON employee_master_table.Employee_Id = task_submit_table.Refference_Id INNER JOIN task_submit_file_table ON task_submit_file_table.Task_Submit_Id = task_submit_table.Task_Submit_Id WHERE employee_master_table.Employee_Id = ? AND task_submit_table.Task_Id = ? AND task_submit_table.Is_Verified = ?";
  $querySubmittedPrepare = $dbhandle->prepare($querySubmitted);
  $querySubmittedPrepare->bind_param("iis",$userId,$assignmentId,$isverified);
  $querySubmittedPrepare->execute();
  $result = $querySubmittedPrepare->get_result();
  $data = array();
  while ($rows = $result->fetch_assoc()) 
  {
    $data[] = $rows;
  }
  echo json_encode($data);
}