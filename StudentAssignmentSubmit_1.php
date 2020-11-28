<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include_once './sequenceGenerator.php';

/***** filter assignment for student *****/
if (isset($_REQUEST['filterAssignment'])) {
  $userType = $_SESSION["LOGINTYPE"];
  $studentSection = $_SESSION["SECTIONID"];
  $currentYear = $_SESSION["STARTYEAR"];
  $today = date('Y-m-d');
  $sqlQuery = "select tmt.* from task_master_table tmt, task_allocation_list_table tal WHERE tal.Allocated_Reff_Id=? AND tmt.Task_Id=tal.Task_Id AND month(tmt.Last_Submissable_Date)=? and year(tmt.Last_Submissable_Date)=? and tmt.Enabled=1 and tmt.Refference_type=? ";
  //echo $sqlQuery;
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->bind_param("iiis", $studentSection, $_REQUEST['monthNumber'], $currentYear, $userType);

  $sqlQueryprepare->execute();
  echo $sqlQueryprepare->error;
  $resultset = $sqlQueryprepare->get_result();
  if ($resultset->num_rows > 0) {
    $i = 1;
    while ($row = $resultset->fetch_assoc()) {

      $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
      $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
      $queryAssignmnetFilePrepare->bind_param("i", $row['Task_Id']);
      $queryAssignmnetFilePrepare->execute();
      $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();

      echo '<div class="cart-box-row mt-3">
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
                        <div class="text-right">';
                        if (date('Y-m-d',strtotime($row['Updated_On']))<date('Y-m-d')) {
                          echo '<a class="btn btn-link btn-primary disabled text-white" href="#">Submit Assignment</a>';
                        }
                        else{
                          echo '<a class="btn btn-link btn-primary" href="./StudentAssignmentFileUpload.php?assignmentId=' . $row['Task_Id'] . '" target="_blank">Submit Assignment</a>';
                        }
                        echo '</div>
                        </div>
                </div>
            </div>';
      $i = $i + 1;
    }
  } else {
    echo '<h4 class="text-danger mt-3">No Record Found.........Try Again</h4>';
  }
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
      $fileType = strtolower(pathinfo($imageUploadPath, PATHINFO_EXTENSION));

      // Allow certain file formats
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        // Image temp source
        $imageTemp = $_FILES["document_name"]["tmp_name"];

        // Compress size and upload image
        $compressedImage = compressImage($imageTemp, $imageUploadPath, 25);

        $enc_Name = md5($_SESSION["USERID"] . 'A' . date('YmdHis')) . '.' . $fileType;
        rename($uploadPath . '/' . $fileName, $uploadPath . '/' . $enc_Name);

        mysqli_autocommit($dbhandle, false);
        /* save data to database */
        // submit to task submit id

        /* resize image starts */
        function resize_image($file, $w, $h, $crop = false)
        {
          list($width, $height) = getimagesize($file);
          $r = $width / $height;
          if ($crop) {
            if ($width > $height) {
              $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
              $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
          } else {
            if ($w / $h > $r) {
              $newwidth = $h * $r;
              $newheight = $h;
            } else {
              $newheight = $w / $r;
              $newwidth = $w;
            }
          }

          //Get file extension
          $exploding = explode(".", $file);
          $ext = end($exploding);

          switch ($ext) {
            case "png":
              $src = imagecreatefrompng($file);
              break;
            case "jpeg":
            case "jpg":
              $src = imagecreatefromjpeg($file);
              break;
            case "gif":
              $src = imagecreatefromgif($file);
              break;
            default:
              $src = imagecreatefromjpeg($file);
              break;
          }

          $dst = imagecreatetruecolor($newwidth, $newheight);
          imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

          return $dst;
        }

        $filename = $uploadPath . '/' . $enc_Name;
        $resizedFilename = $uploadPath . '/' . $enc_Name;

        // resize the image with 300x300
        $imgData = resize_image($filename, 678, 1024);
        // save the image on the given filename
        imagepng($imgData, $resizedFilename);
        /* resize image end */
        $Reference_Id = '2';
        $isverified = 'No';
        $enabled = 1;
        $task_id = $_REQUEST['assignmentId'];

        // check duplicate entry of file submit table
        $searchTask = "SELECT * FROM `task_submit_table` WHERE `Task_Id` = ?";
        $searchTaskPrepare = $dbhandle->prepare($searchTask);
        $searchTaskPrepare->bind_param("i", $task_id);
        $searchTaskPrepare->execute();
        $raskResult = $searchTaskPrepare->get_result();
        $rowTask = $raskResult->fetch_assoc();

        if (empty($rowTask['Task_Id'])) {
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
            $_SESSION["USERID"],
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
        } else {

          $Task_Submit_Id = $rowTask['Task_Submit_Id'];
        }

        // save data to task submit file
        $file_path = './app_images/student_assignment_uploads/';
        $taskRemarks = '';
        $tablename = "task_submit_file_table";
        $TSF_Id = sequence_number($tablename, $dbhandle);

        $query = "INSERT INTO task_submit_file_table(TSF_Id, Task_Submit_Id, File_Path, Task_Note, Is_Verified, School_Id, Updated_By,Enabled,File_Name) VALUES (?,?,?,?,?,?,?,?,?)";
        $queryPrepare = $dbhandle->prepare($query);
        $queryPrepare->bind_param("iisssisis", $TSF_Id, $Task_Submit_Id, $file_path, $_REQUEST['task_remarks'], $isverified, $_SESSION["SCHOOLID"], $_SESSION["USERID"], $enabled, $enc_Name);
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
  $user = $_SESSION['USERID'];
  $data = array();
  $query_files = "SELECT tsft.*, tst.Is_Verified as tstverified from task_submit_file_table tsft, task_submit_table tst WHERE tsft.Task_Submit_Id = tst.Task_Submit_Id and tsft.Updated_By = ? AND tst.Task_Id = ? and tsft.Enabled = 1 AND tsft.School_Id = ? ORDER BY tsft.TSF_Id DESC";
  $query_files_prepare = $dbhandle->prepare($query_files);
  $query_files_prepare->bind_param("sii", $user, $assignment_id,$_SESSION["SCHOOLID"]);
  
  $query_files_prepare->execute();
  $resultQuery = $query_files_prepare->get_result();
  while ($rows = $resultQuery->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}


/***** filter assignment for teachers *****/
if (isset($_REQUEST['filterAssignmentSubmit'])) {
  $currentYear = $_SESSION["STARTYEAR"];
  $sqlQuery = "SELECT task_master_table.* FROM task_master_table WHERE task_master_table.Enabled = 1  AND task_master_table.Subject_Id = ? AND MONTH(task_master_table.Updated_On) = ? AND YEAR(task_master_table.Updated_On)=?";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->bind_param("iii", $_REQUEST['subjectName'], $_REQUEST['monthName'], $currentYear);
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
  $userId = $_SESSION["USERID"];
  // student Id $_SESSION["USERID"]
  $assignmentId = $_REQUEST['assignmentId'];
  $isverified = 'No';
  $querySubmitted = "SELECT tst.*, smt.First_Name, smt.Middle_Name, smt.Last_Name, COUNT(tsft.TSF_Id) as total_pages FROM task_submit_table tst, student_master_table smt, task_submit_file_table tsft WHERE tst.Updated_By = smt.Student_Id AND tst.Task_Submit_Id = tsft.Task_Submit_Id AND tst.Task_Id = ? and tst.Is_Verified = ?";
  $querySubmittedPrepare = $dbhandle->prepare($querySubmitted);
  $querySubmittedPrepare->bind_param("is", $assignmentId, $isverified);
  $querySubmittedPrepare->execute();
  echo $querySubmittedPrepare->error;
  $result = $querySubmittedPrepare->get_result();
  $data = array();
  while ($rows = $result->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}


/* delete student submitte assignment */
if (isset($_REQUEST['deleteAssiFile'])) {
  $del_query = "UPDATE task_submit_file_table SET Enabled = 0 WHERE TSF_Id = ? AND School_Id = ?";
  $del_query_prepare = $dbhandle->prepare($del_query);
  $del_query_prepare->bind_param("ii",$_REQUEST['tsf_id'],$_SESSION["SCHOOLID"]);
  if ($del_query_prepare->execute()) {
    echo json_encode("success");
  }

}