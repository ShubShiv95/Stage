<?php
include './dbhandle.php';
include 'errorLog.php';
require_once './sequenceGenerator.php';
require_once './file_handler.php';
if (isset($_REQUEST['assignment'])) {
  /************ create new assignment ***********/
  if ($_REQUEST['assignment'] == 'create') {
    /*
    http://localhost/stage/TeacherAppAssignmentApi.php?assignment=create
    Request variables
    1. assignment_type = 'Assignment'|'Project'| 'Home Work'
    2. assignment_class = 1 (Class Ids)
    3. assignment_topic = Half Yearly Assignment (Any Text)
    4. reference_type = 'Teacher'| 'Student'| 'Others'
    5. section = class Sesctions Id(Array)
    6. description = assigment description (any text)
    7. assignment_subject = Subject Of Assignment (Subject Id)
    8. submissible = 'Yes'| 'No'
    9. date_of_submision = Last Date of Submission (Format : 'd/m/Y') eg. 15/02/2021
    10. login_id = Login id of person
    11. school_id = School id login person
    */
    mysqli_autocommit($dbhandle, false);
    /* generaing asssignment id */
    $tablename = 'task_master_table';
    $assignmentId = sequence_number($tablename, $dbhandle);

    $assignmentType = mysqli_real_escape_string($dbhandle, $_REQUEST['assignment_type']);
    $assignmentClass = mysqli_real_escape_string($dbhandle, $_REQUEST['assignment_class']);
    $taskTopic = mysqli_real_escape_string($dbhandle, $_REQUEST['assignment_topic']);
    $reference_type = $_REQUEST['reference_type'];
    $sections[] = $_POST['section'];
    $description = mysqli_real_escape_string($dbhandle, $_REQUEST['description']);
    $assignment_subject = mysqli_real_escape_string($dbhandle, $_REQUEST['assignment_subject']);
    $submissible = mysqli_real_escape_string($dbhandle, $_REQUEST['submissible']);
    $date_of_submision = $_REQUEST["date_of_submision"];
    $updatedBy = $_REQUEST["login_id"];
    $school_id = $_REQUEST["school_id"];
    $enabled = 1;
    $formErrors = array();
    // comment to check

    if (empty($assignmentType)) {
      $formErrors[] = 'Missing Assignment Type';
    }
    if (empty($taskTopic)) {
      $formErrors[] = 'Missing Type Topic';
    }
    if (empty($sections)) {
      $formErrors[] = 'Missing Section';
    }
    if (empty($description)) {
      $formErrors[] = 'Missing Description';
    }
    if (empty($assignment_subject)) {
      $formErrors[] = 'Missing Subject';
    }
    if (empty($submissible)) {
      $formErrors[] = 'Missing Is Submissible';
    }
    if (empty($date_of_submision)) {
      $formErrors[] = 'Missing Last Submission Date';
    }
    if (count($formErrors) > 0) {
      $data = array(
        "status"    =>  "500",
        "type"      =>  "Form Validation Error",
        "message"   =>  $formErrors
      );
    } else {
      /* inserting data into tyak master table str_to_date(?,'%d/%m/%Y')*/
      $assignmentQuery = "INSERT INTO task_master_table (Task_Id, Task_Name, Task_Type, Task_Desc, Is_Submmisable, Last_Submissable_Date, Subject_Id, Refference_Type, School_Id, Updated_By) VALUES (?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?)";
      $assignmentQueryPrepare = $dbhandle->prepare($assignmentQuery);
      $bindValues = $assignmentQueryPrepare->bind_param('isssssssss', $assignmentId, $taskTopic, $assignmentType, $description, $submissible, $date_of_submision, $assignment_subject, $reference_type, $_REQUEST["school_id"], $_REQUEST["login_id"]);
      if ($assignmentQueryPrepare->execute()) {
        /* insert into assignment task allocation list table */
        foreach ($sections as $section) {
          $tablenameSec = 'task_allocation_list_table';
          $assignmentSectionId = sequence_number($tablenameSec, $dbhandle);

          $sectionQuery = "INSERT INTO task_allocation_list_table(TAL_Id, Task_Id, Allocated_Reff_Id, School_Id, Updated_By) VALUES (?,?,?,?,?)";
          $sectionQueryPrepare = $dbhandle->prepare($sectionQuery);

          $bindSecVals = $sectionQueryPrepare->bind_param(
            'iiiss',
            $assignmentSectionId,
            $assignmentId,
            $section,
            $_REQUEST["school_id"],
            $_REQUEST["login_id"]
          );

          if (!$sectionQueryPrepare->execute()) {
            $error_msg = $sectionQueryPrepare->error;
            $el = new LogMessage();$statusMsg='';
            $sql = $sectionQuery;
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Student Create Assignment App', $error_msg, $sql, __FILE__, $_REQUEST['login_id']);
            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
            mysqli_rollback($dbhandle);
            $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
            $data = array(
              "status"    =>  "500",
              "type"      =>  "Database Error",
              "message"   =>  $statusMsg
            );
          } else {
            $assignmentId = '"'.$assignmentId.'"';
            $data = array(
              "status"    =>  "200",
              "type"      =>  "Data Saving",
              "message"   =>  "Assignment Created Succcessfully.",
              "assignment_id" =>  $assignmentId
            );
          }
        }
      } else {
        //var_dump($getStudentCount_result);
        $error_msg = $assignmentQueryPrepare->error;
        $el = new LogMessage();
        $sql = $assignmentQuery;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Student Create Assignment App', $error_msg, $sql, __FILE__, $_REQUEST['login_id']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
        $data = array(
          "status"    =>  "500",
          "type"      =>  "Database Error",
          "message"   =>  $statusMsg
        );
      }
      // must commit this to add data to database
      mysqli_commit($dbhandle);
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
  }


  /******** assignment file or Link Updation ********/
  if ($_REQUEST['assignment'] == 'file_upload') {
    /*
      http://stage.swiftcampus.com/TeacherAppAssignmentApi.php?assignment=file_upload
      variable needed
      1. File Name (Requested File name with extention)
          field name : task_file
      2. Task Id
          field name : task_id
      3. Upload Type Link| File
          field name : task_type
      4. School Id
          field name : school_id
      5. Updated By
          field name : login_id
    */
    //mysqli_autocommit($dbhandle, false);
    if ($_REQUEST['task_type'] == 'File') {
      //$blob_data = $_REQUEST['blob_data'];
      $directory = 'Assignments';
      $mainDirectory = "./app_images/Assignments/";
      if (!file_exists($mainDirectory)) {
        mkdir('./app_images/Assignments/', 0777, true);
      }
      $form_file = $_FILES['task_file']['name'];
      $fileExtension = strtolower(pathinfo($_FILES['task_file']['name'], PATHINFO_EXTENSION));
      $file_name = md5(uniqid()).'.'.$fileExtension;
      $target_path = $mainDirectory.'/'.$file_name;
      
      move_uploaded_file($_FILES['task_file']['tmp_name'], $target_path);
      $dbFilename = 'Assignments/'.$file_name;
    } 
    elseif ($_REQUEST['task_type'] == 'Link') 
    {
      $dbFilename = $_REQUEST['assignment'];
    }
    $task_id = $_REQUEST['task_id'];
    // insert data into assignment table 
    $assignmentFileId = sequence_number('task_file_upload', $dbhandle);

    $assignmentQuery = "INSERT INTO `task_file_upload`(`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
    $stmtPrepare = $dbhandle->prepare($assignmentQuery);
    $stmtPrepare->bind_param("iissss", $assignmentFileId, $task_id, $_REQUEST['task_type'], $dbFilename, $_REQUEST["school_id"], $_REQUEST["login_id"]);
    if ($stmtPrepare->execute()) {
      $data = array(
        "status"    =>  "200",
        "type"      =>  "Data Saving",
        "message"   =>  "Assignment Saved Successfully."
      );
    } else {
      $data = array(
        "status"    =>  "500",
        "type"      =>  "Data Saving Error",
        "message"   =>  "Failed To Save."
      );
      //var_dump($getStudentCount_result);
      $error_msg = $stmtPrepare->error;
      $el = new LogMessage();
      $sql = $assignmentQuery;
      //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
      $el->write_log_message('Student Create Assignment App', $error_msg, $sql, __FILE__, $_REQUEST['login_id']);
      //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
      mysqli_rollback($dbhandle);
      $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
      die;
    }
    mysqli_commit($dbhandle);
    echo json_encode($data, JSON_PRETTY_PRINT);
  }

  /****************** delete assignments *******************/
  if ($_REQUEST['assignment'] == 'delete_assginment') {
    /*
    variable needed
    1. assignment id (works both in get/post)
    http://stage.swiftcampus.com/TeacherAppAssignmentApi.php?assignment=delete_assginment
  */
    $delQuery = "UPDATE task_master_table SET Enabled = 0 WHERE Task_Id = ?";
    $delQueryPrepare = $dbhandle->prepare($delQuery);
    $delQueryPrepare->bind_param("i", $_REQUEST['assignment_id']);
    if ($delQueryPrepare->execute()) {
      $data = array(
        "status"    =>  "200",
        "type"      =>  "Success",
        "message"   =>  "Assignment Deleted Successfully."
      );
    } else {
      $data = array(
        "status"    =>  "500",
        "type"      =>  "Database Error",
        "message"   =>  "Failed To Delete."
      );
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
  }

  /*************** assignment for teacher *****************/
  if ($_REQUEST['assignment'] == 'teacher_view') {
    /*
    variable needed
    1. sectionId = section id
    2. subjectId = subject id
    3. monthNumber = number of month
    4. start_year = year of asignment
    http://stage.swiftcampus.com/TeacherAppAssignmentApi.php?assignment=teacher_view&&LOGINTYPE=Teacher&SECTIONID=3&STARTYEAR=2020&monthNumber=11 

    ///// response ////
    {
      "status": "200",
      "type": "Success",
      "message": "Assignment Fetched Successfully.",
      "assignment_data": [
          {
              "task_id": 8,
              "task_name": "Teacher APP Testing aPI",
              "updated_by": "Admin",
              "updated_on": "2021-01-06 12:23:25",
              "last_date": "2021-02-15",
              "file_type": null,
              "file_link": null,
              "verify_assignment_link": "StudentAssignmentSubmitted.php?assignmentId=8"
          },
          {
              "task_id": 5,
              "task_name": "Teacher APP Testing aPI",
              "updated_by": "Admin",
              "updated_on": "2021-01-06 12:07:19",
              "last_date": "2021-02-12",
              "file_type": null,
              "file_link": null,
              "verify_assignment_link": "StudentAssignmentSubmitted.php?assignmentId=5"
          }
      ]
    }
    */
    $sectionId = $_REQUEST['sectionId'];
    $subjectId = $_REQUEST['subjectId'];
    $monthNum = $_REQUEST['monthNumber'];
    $currYear = $_REQUEST["start_year"];

    $sqlQuery = "SELECT tmt.* FROM task_master_table tmt, task_allocation_list_table talt WHERE tmt.Task_Id = talt.Task_Id AND tmt.Enabled = 1 AND talt.Allocated_Reff_Id = ? AND tmt.Subject_Id = ? AND MONTH(tmt.Last_Submissable_Date) = ? AND YEAR(tmt.Last_Submissable_Date) = ? ORDER BY tmt.Task_Id DESC";
    $sqlQueryprepare = $dbhandle->prepare($sqlQuery);

    $sqlQueryprepare->bind_param("iiii", $sectionId, $subjectId, $monthNum, $currYear);

    $sqlQueryprepare->execute();

    $resultset = $sqlQueryprepare->get_result();

    if ($resultset->num_rows > 0) {
      $i = 1;
      $data = array(
        "status"    =>  "200",
        "type"      =>  "Success",
        "message"   =>  "Assignment Fetched Successfully.",
        "assignment_data" =>  array()
      ); $i=0;
      while ($row = $resultset->fetch_assoc()) {
        $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
        $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
        $queryAssignmnetFilePrepare->bind_param("i", $row['Task_Id']);
        $queryAssignmnetFilePrepare->execute();
        $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();
        $row_file = $queryAssignmnetFileResult->fetch_assoc();
        $data["assignment_data"][$i] = array(
          "task_id"     =>  $row['Task_Id'],
          "task_name"   =>  $row['Task_Name'],
          "updated_by"  =>  $row['Updated_By'],
          "updated_on"  =>  $row['Updated_On'],
          "last_date"   =>  $row['Last_Submissable_Date'],
          "file_type"   =>  $row_file['Upload_Type'],
          "file_link"   =>  $row_file['Upload_Name'],
          "verify_assignment_link"  =>  'StudentAssignmentSubmitted.php?assignmentId=' . $row['Task_Id'] . ''
        );
        $i++;
      }
    } else {
      $data = array(
        "status"    =>  "500",
        "type"      =>  "Database Error",
        "message"   =>  "No Record Found."
      );
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
  }
}
