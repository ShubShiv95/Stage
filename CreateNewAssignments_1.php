<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

if (isset($_REQUEST['assignment_sender'])){
  if (empty($_REQUEST['assignment_sender'])) {
    /* generaing asssignment id */
    $tablename = 'task_master_table';
    $assignmentId = sequence_number($tablename,$dbhandle);

    $assignmentType = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_type']);
    $assignmentClass = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_class']);
    $sname = mysqli_real_escape_string($dbhandle,$_REQUEST['sname']);
    $reference_type = $_REQUEST['reference_type'];
    $sections = $_POST['Present'];
    $description = mysqli_real_escape_string($dbhandle,$_REQUEST['description']);
    $assignment_subject = mysqli_real_escape_string($dbhandle,$_REQUEST['assignment_subject']);
    $submissible = mysqli_real_escape_string($dbhandle,$_REQUEST['submissible']);
    $date_of_submision =$_REQUEST["date_of_submision"];
    $updatedBy = $_SESSION["LOGINID"];
    $schoolId = $_SESSION["SCHOOLID"];
    $enabled = 1;
    $formErrors = array();

    if (empty($assignmentType)) {
      $formErrors[] = 'Please Select Assignment Type!';
    }
    if (empty($assignmentClass)) {
      $formErrors[] = 'Please Select Class!';
    }
    if (empty($sname)) {
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
    if ($submissible == 'Yes' && empty($date_of_submision)) {
      $formErrors[] = 'Please Select Last Submission Date!';
    }
    else{
      $submissible = $_REQUEST['submissible'];
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
      $assignmentQuery = "INSERT INTO task_master_table (Task_Id, Task_Name, Task_Type, Task_Desc, Is_Submmisable, Last_Submissable_Date, Subject_Id, Refference_Type,  School_Id, Updated_By) VALUES (?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?)";
      $assignmentQueryPrepare = $dbhandle->prepare($assignmentQuery);
      $bindValues = $assignmentQueryPrepare->bind_param('isssssssss', $assignmentId, $sname, $assignmentType, $description, $submissible, $date_of_submision, $assignment_subject,$reference_type,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
      $executeResult = $assignmentQueryPrepare->execute();

      /* insert into assignment section list */
      foreach ($sections as $section)
      {
        $tablenameSec = 'task_allocation_list_table';
        $assignmentSectionId = sequence_number($tablenameSec,$dbhandle);
        $_SESSION['Assignment_id'] = $assignmentId;
        $_SESSION['Assignment_Name'] = $sname;
        $sectionQuery = "INSERT INTO task_allocation_list_table(TAL_Id, Task_Id, Allocation_Reference_Id, School_Id, Updated_By) VALUES (?,?,?,?,?)";
        $sectionQueryPrepare = $dbhandle->prepare($sectionQuery);
        $bindSecVals = $sectionQueryPrepare->bind_param('iiiss', $assignmentSectionId, $assignmentId,$section ,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
        $secExecRes = $sectionQueryPrepare->execute();
      }

      if ($secExecRes == true) {
        echo '<ul class="list-inline">
              <li class="list-inline-item text-success"><strong>Success! Wait For File Upload</strong> Assignment Created Succcessfully.</li>
            </ul><script>window.setTimeout(function(){window.location.href="UploadAssignments.php?Assignment_id='.$assignmentId.'&topic='.$sname.'"},2000);</script>';
      }
      else{
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Alert </strong> Failed To Create.
        </div>';
      }
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

/***** filter assignment *****/
if (isset($_REQUEST['filterAssignment'])) {
  $sqlQuery = "SELECT task_master_table.* FROM task_master_table INNER JOIN task_allocation_list_table ON task_allocation_list_table.Task_Id = task_master_table.Task_Id WHERE task_master_table.Enabled = 1 AND task_allocation_list_table.Allocation_Reference_Id = ? AND task_master_table.Subject_Id = ? AND date_format(task_master_table.Updated_On,'%m/%Y') = ?";
  $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
  $sqlQueryprepare->bind_param("iis",$_REQUEST['sectionId'],$_REQUEST['subjectId'],$_REQUEST['monthNumber']);
  $sqlQueryprepare->execute();
  $resultset = $sqlQueryprepare->get_result();
  if ($sqlQueryprepare->num_rows()>0) {
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
                          if (strtolower($fileType[1])=="ppt"||"pptx") {
                            echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-1"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>';
                          }elseif (strtolower($fileType[1])=="doc"||"docx") {
                              echo '<li><a href="./app_images/'.$rowF['Upload_Name'].'" target="_blank"  class="color-2"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>';
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
  }else{
    echo '<h4 class="text-danger">No Record Found. Window is Refreshing...Wait</h4><script>window.setTimeout(function(){window.location.reload();},2000)</script>';
  }

}
?>
