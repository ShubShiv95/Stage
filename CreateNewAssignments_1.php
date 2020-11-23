<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

if (isset($_REQUEST['assignment_sender'])){
  if (empty($_REQUEST['assignment_sender'])) {
    mysqli_autocommit($dbhandle, false);
    /* generaing asssignment id */
    $tablename = 'task_master_table';
    $assignmentId = sequence_number($tablename,$dbhandle);

    $assignmentType = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_type']);
    $assignmentClass = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_class']);
    $taskTopic = mysqli_real_escape_string($dbhandle,$_REQUEST['sname']);
    $reference_type = $_REQUEST['reference_type'];
    $sections = $_POST['Present'];
    $description = mysqli_real_escape_string($dbhandle,$_REQUEST['description']);
    $assignment_subject = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_subject']);
    $submissible = mysqli_real_escape_string($dbhandle,$_REQUEST['submissible']);
    $date_of_submision = $_REQUEST["date_of_submision"];
    $updatedBy = $_SESSION["LOGINID"];
    $schoolId = $_SESSION["SCHOOLID"];
    $enabled = 1;
    $formErrors = array();

    if (empty($assignmentType)) {
      $formErrors[] = 'Please Select Assignment Type!';
    }
    if (empty($taskTopic)) {
      $formErrors[] = 'Please Type Topic!';
    }
    if (empty($sections)) {
      $formErrors[] = 'Please Choose Section!';
    }
    if (empty($description)) {
      $formErrors[] = 'Please Type Description!';
    }
    if (empty($assignment_subject)) {
      $formErrors[] = 'Please Select Subject!';
    }
    if (empty($submissible)) {
      $formErrors[] = 'Please Select Is Submissible!';
    }
    if (empty($date_of_submision)) {
      $formErrors[] = 'Please Select Last Submission Date!';
    }
    if ($date_of_submision<=date('Y-m-d')) {
      $formErrors[] = 'Date of Submission Cannot be Less Than or Equal to Today!';
    }
  //  echo $submissible.'DOS'.$date_of_submision;
    if (count($formErrors)>0) {
      echo '<ul class="list-inline">';
      foreach ($formErrors as $error) {
        echo '<li class="list-inline-item text-danger">'.$error.'</li>';
      }
      echo '</ul>';
    }
    else{
      /* inserting data into table */
      $assignmentQuery = "INSERT INTO task_master_table (Task_Id, Task_Name, Task_Type, Task_Desc, Is_Submmisable, Last_Submissable_Date, Subject_Id, Refference_Type, School_Id, Updated_By) VALUES (?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?)";
      $assignmentQueryPrepare = $dbhandle->prepare($assignmentQuery);
      $bindValues = $assignmentQueryPrepare->bind_param('isssssssss', $assignmentId, $taskTopic, $assignmentType, $description, $submissible, $date_of_submision, $assignment_subject,$reference_type,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
      if ($assignmentQueryPrepare->execute()) {
        echo '<ul class="list-inline">
        <li class="list-inline-item text-success"><strong>Success! Wait For File Upload</strong> Assignment Created Succcessfully.</li>
      </ul><script>window.setTimeout(function(){window.location.href="UploadAssignments.php?Assignment_id='.$assignmentId.'&topic='.$taskTopic.'"},3000);</script>';
      }else{
        //var_dump($getStudentCount_result);
        $error_msg = $assignmentQueryPrepare->error;
        $el = new LogMessage();
        $sql = $assignmentQuery;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Student Create Assignment ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
        die;
      }

      /* insert into assignment section list */
      foreach ($sections as $section)
      {
        $tablenameSec = 'task_allocation_list_table';
        $assignmentSectionId = sequence_number($tablenameSec,$dbhandle);
        $_SESSION['Assignment_id'] = $assignmentId;
        $_SESSION['Assignment_Name'] = $taskTopic;

        $sectionQuery = "INSERT INTO task_allocation_list_table(TAL_Id, Task_Id, Allocated_Reff_Id, School_Id, Updated_By) VALUES (?,?,?,?,?)";
        $sectionQueryPrepare = $dbhandle->prepare($sectionQuery);

        $bindSecVals = $sectionQueryPrepare->bind_param('iiiss', $assignmentSectionId, $assignmentId,
        $section ,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);

        if(!$sectionQueryPrepare->execute()){
          $error_msg = $sectionQueryPrepare->error;
          $el = new LogMessage();
          $sql = $sectionQuery;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Student Create Assignment ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
          //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
          mysqli_rollback($dbhandle);
          $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
          die;
        }
        else{
          echo '<ul class="list-inline">
              <li class="list-inline-item text-success"><strong>Success! Added To Section</strong> Assignment Created Succcessfully.</li>
            </ul>';
        }
      }

      // must commit this to add data to database
      mysqli_commit($dbhandle);

    }
  }
}

/******** assignment file or Link Updation ********/
if (isset($_REQUEST['assignment_file_sender']))
{
  if (empty($_REQUEST['assignment_file_sender']))
  {
      if (empty($_REQUEST['assignment_type']))
      {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <strong>Warning !</strong> Please Select Upload Type.
        </div>';
      }
      elseif (empty($_FILES['assignment']['name']) && empty($_REQUEST['assignment'])) {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <strong>Warning !</strong> Please Fill Link or Select File.
        </div>';
      }
      else
      {
        if ($_REQUEST['assignment_type']=='File')
        {
          $mainDirectory = "./app_images/Assignments/";
          if (!file_exists($mainDirectory))
          {
            mkdir('./app_images/Assignments/', 0777, true);
          }
          $fileExplode = explode('.',$_FILES['assignment']['name']);
          $fileName = md5(date('YmdHis')).'.'.strtolower($fileExplode[1]);
          $targetPath = "./app_images/Assignments/".$fileName;
          $fileSave = move_uploaded_file($_FILES['assignment']['tmp_name'],$targetPath);
          $dbFilename = "Assignments/".$fileName;
        }
        elseif ($_REQUEST['assignment_type']=='Link')
        {
          $dbFilename = $_REQUEST['assignment'];
        }
        $Assignment_id = $_REQUEST['Assignment_id'];
        /* insert data into assignment table */
        $assignmentFileId = sequence_number('task_file_upload',$dbhandle);

        $assignmentQuery = "INSERT INTO `task_file_upload`(`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
        $stmtPrepare = $dbhandle->prepare($assignmentQuery);
        $stmtPrepare->bind_param("iissss", $assignmentFileId, $Assignment_id, $_REQUEST['assignment_type'], $dbFilename, $_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
        $execResult=$stmtPrepare->execute();
        if ($execResult == true) {
          echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              <strong>Success !</strong> Assignment Saved Successfully.
          </div>';
        }
      }
  }
}


/* load assignments data while updating files */
if (isset($_REQUEST['getAssigns'])) {
  $queryData = "SELECT * FROM `task_file_upload` WHERE `Task_Id` = ? AND `Enabled` = 1   ORDER BY `Task_File_Id` DESC";
  $queryDataPrepare = $dbhandle->prepare($queryData);
  $queryDataPrepare->bind_param("i",$_SESSION['Assignment_id']);
  $queryDataPrepare->execute();
  $resultSet = $queryDataPrepare->get_result();
  echo '<table class="table table-bordered attendence-msg">
  <thead>
    <tr class="bg-primary text-white">
      <th>Assignment Type</th>
      <th>Preview</th>
    </tr></thead>';
  while ($row = $resultSet->fetch_assoc())
  {
    echo '<tbody class="top-position-ss"><tr>
          <td>'.$row['Upload_Type'].'</td>';
          if ($row['Upload_Type'] == 'Link') {
            echo '<td><a href="http://'.$row['Upload_Name'].'" target="_blank">Click to View</a></td>';
          }
          else{
            echo '<td><a class="btn btn-success" target="_blank" href="./app_images/'.$row['Upload_Name'].'"><i class="fas fa-save"></i></a></td>';
          }
    echo '</tr></tbody>';
  }
    echo '</table>';
}

/* gat all assignments into view assignment file */
if (isset($_REQUEST['getAllAssignments'])) {

  /*

  user wise UI dependes on session $_SESSION["USER_TYPE"];

  */
  $queryAssignment = 'SELECT * FROM task_master_table WHERE Enabled = 1 AND School_Id = ?';
  $queryAssignmentPrepare = $dbhandle->prepare($queryAssignment);
  $queryAssignmentPrepare->bind_param("i",$_SESSION["SCHOOLID"]);
  $queryAssignmentPrepare->execute();
  $resultQuery = $queryAssignmentPrepare->get_result();
  $i=0;

  while ($row = $resultQuery->fetch_assoc()) {
    $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
    $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
    $queryAssignmnetFilePrepare->bind_param("i",$row['Task_Id']);
    $queryAssignmnetFilePrepare->execute();
    $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();

    echo '<div class="cart-box-row">
            <div class="box-row">
                <div class="left-content">
                    <h6 class="text-uppercase">'.$row['Task_Name'].'</h6>
                    <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by '.$row['Updated_By'].' </span> | <span> Created on '.$row['Updated_On'].'</span></p>
                </div>
                <div class="right-content">
                    <ul>';
                    while($rowF = $queryAssignmnetFileResult->fetch_assoc())
                    {
                      if ($rowF['Upload_Type']=="Link") {
                       echo '<li><a href="http://'.$rowF['Upload_Name'].'" target="_blank" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>';
                      }
                      elseif ($rowF['Upload_Type']=="File") {
                        $fileType = explode('.',$rowF['Upload_Name']);
                        if (strtolower($fileType[1])=="ppt"||"pptx") {
                          echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-1"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>';
                        }elseif (strtolower($fileType[1])=="doc"||"docx") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-2"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>';
                        }elseif (strtolower($fileType[1])=="pdf") {
                          echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-6"><i class="fa fa-file-pdf"></i></a></li>';
                        }elseif (strtolower($fileType[1])=="jpg"||"jpeg"||"png") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
                        }
                        elseif (strtolower($fileType[1])=="mp4") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-4"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>';
                        }
                        else{
                          echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-5"><i class="fa fa-file" aria-hidden="true"></i></a></li>';
                        }
                      }
                    }
                    echo '<li><a href="#" id="'.$row['Task_Id'].'" class="color-5 uploadAssign"><i class="fa fa-upload" aria-hidden="true"></i></a></li>';
                    echo '<li class="deleteAssign" id="'.$row['Task_Id'].'"><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>';
                 echo'   </ul>
                </div>
            </div>
            <div class="content-descr">
                <a href="javascript:void(0);" add="addin'.$i.'" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <div class="content addin'.$i.'">
                    '.$row['Task_Desc'].'
                    </div>
            </div>
        </div>';
        $i=$i+1;
  }
}

/***** remove assignment from display ****/
if (isset($_REQUEST['delAssign'])) {
  $delQuery = "UPDATE task_master_table SET Enabled = 0 WHERE Assignment_Id = ?";
  $delQueryPrepare = $dbhandle->prepare($delQuery);
  $delQueryPrepare->bind_param("i",$_REQUEST['assignment_id']);
  $delQueryPrepare->execute();
}

/**** get section in radio ****/
if (isset($_REQUEST['getSection'])) {
    //classId
    $querySection = "SELECT * FROM class_section_table WHERE Enabled = 1 AND Class_Id = ?";
    $querySectionPreapre = $dbhandle->prepare($querySection);
    $querySectionPreapre->bind_param('s',$_REQUEST['classId']);
    $querySectionPreapre->execute();
    $resultSet = $querySectionPreapre->get_result();

    while($row = $resultSet->fetch_assoc()){
      echo '<span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="'.$row['Class_Sec_Id'].'"> '.$row['Section'].'</span>';
    }
}

/**** get section in dropdown ****/
if (isset($_REQUEST['getSections'])) {
  //classId
  $querySection = "SELECT * FROM class_section_table WHERE Enabled = 1 AND Class_Id = ?";
  $querySectionPreapre = $dbhandle->prepare($querySection);
  $querySectionPreapre->bind_param('s',$_REQUEST['classId']);
  $querySectionPreapre->execute();
  $resultSet = $querySectionPreapre->get_result();
  echo '<option value="">All </option>';
  while($row = $resultSet->fetch_assoc()){
    echo '<option value="'.$row['Class_Sec_Id'].'">'.$row['Section'].'</option>';
  }
}

/**** get months for dropdown from assignment master ****/
if (isset($_REQUEST['getMonths'])) {
  $sqlQuery = "SELECT DISTINCT date_format(Updated_On,'%m/%Y') as MonthNo,date_format(Updated_On,'%M %Y') as Monthname FROM task_master_table";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->execute();
  $resultset = $sqlQueryprepare->get_result();
  echo '<option value="">All </option>';
  while($row = $resultset->fetch_assoc()){
    echo '<option value="'.$row['MonthNo'].'">'.$row['Monthname'].'</option>';
  }
}

/***** filter assignment for teachers *****/
if (isset($_REQUEST['filterAssignment'])) {
  $sectionId = $_REQUEST['sectionId']; $subjectId = $_REQUEST['subjectId']; $monthNum = $_REQUEST['monthNumber']; $currYear = $_SESSION["STARTYEAR"]; 

  $sqlQuery = "SELECT tmt.* FROM task_master_table tmt, task_allocation_list_table talt WHERE tmt.Task_Id = talt.Task_Id AND tmt.Enabled = 1 AND talt.Allocated_Reff_Id = ? AND tmt.Subject_Id = ? AND MONTH(tmt.Updated_On) = ? AND YEAR(tmt.Updated_On) = ?";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);

  $sqlQueryprepare->bind_param("iiii", $sectionId, $subjectId, $monthNum, $currYear);
 
  $sqlQueryprepare->execute();
  
  $resultset = $sqlQueryprepare->get_result();

  if ($sqlQueryprepare->num_rows()<=1) {
    $i=1;
    while($row = $resultset->fetch_assoc()){
      $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
      $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
      $queryAssignmnetFilePrepare->bind_param("i",$row['Task_Id']);
      $queryAssignmnetFilePrepare->execute();
      $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();

      echo '<div class="cart-box-row">
              <div class="box-row">
                  <div class="left-content">
                      <h6 class="text-uppercase">'.$row['Task_Name'].'</h6>
                      <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by '.$row['Updated_By'].' </span> | <span> Created on '.$row['Updated_On'].'</span></p>
                  </div>
                  <div class="right-content">
                      <ul>';
                      while($rowF = $queryAssignmnetFileResult->fetch_assoc())
                      {
                        if ($rowF['Upload_Type']=="Link") {
                         echo '<li><a href="http://'.$rowF['Upload_Name'].'" target="_blank" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>';
                        }
                        elseif ($rowF['Upload_Type']=="File") {
                          $fileType = explode('.',$rowF['Upload_Name']);
                          
                          if (strtolower($fileType[1])=="ppt"||strtolower($fileType[1])=="pptx") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-1"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>';
                          }elseif (strtolower($fileType[1])=="doc"||strtolower($fileType[1])=="docx") {
                              echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-2"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>';
                          }elseif (strtolower($fileType[1])=='jpg'||strtolower($fileType[1])=='jpeg'||strtolower($fileType[1])=='png') {
                              echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-3"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>';
                          }
                          elseif (strtolower($fileType[1])=="mp4") {
                              echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-4"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>';
                          }
                          elseif (strtolower($fileType[1])=="pdf") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-4"><i class="fas fa-file-pdf"></i></a></li>';
                        }
                          else{
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-5"><i class="fa fa-file" aria-hidden="true"></i></a></li>';
                          }
                        }
                      }

                      if (date('Y-m-d',strtotime($row['Updated_On']))<=date('Y-m-d')) {
                        echo '<li  class=" disabled"><a href="#" id="'.$row['Task_Id'].'" class="color-5 "><i class="fa fa-upload" aria-hidden="true"></i></a></li>';
                      echo '<li class=" disabled" id="'.$row['Task_Id'].'"><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>';
                      echo'   </ul>';
                      $btnView = '<a href="StudentAssignmentSubmitted.php?assignmentId='.$row['Task_Id'].'" class="btn btn-link">View Assignments</a>';
                      }
                      else{
                        echo '<li><a href="#" id="'.$row['Task_Id'].'" class="color-5 uploadAssign"><i class="fa fa-upload" aria-hidden="true"></i></a></li>';
                      echo '<li class="deleteAssign" id="'.$row['Task_Id'].'"><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>';
                      echo'   </ul>';
                      }
                      
                  echo '</div>
              </div>
              <div class="content-descr">
                  <a href="javascript:void(0);" add="addin'.$i.'" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                      <div class="content addin'.$i.'">';
                      echo $row['Task_Desc'];
                      if (date('Y-m-d',strtotime($row['Updated_On']))<=date('Y-m-d')) {
                        echo '<div class="text-right">'; echo  $btnView.'</div>'  ;
                      }
                      echo '</div>
              </div>
          </div>';
          $i=$i+1;

    }
  }else{
    
    echo '<h4 class="text-danger">No Record Found. Window is Refreshing...Wait</h4><script>window.setTimeout(function(){window.location.reload();},2000)</script>';
  }

}
?>
