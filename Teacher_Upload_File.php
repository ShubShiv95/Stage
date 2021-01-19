<?php
require_once './dbhandle.php';
include 'errorLog.php';
require_once './sequenceGenerator.php';
 if($_SERVER['REQUEST_METHOD']=='POST' ||$_SERVER['REQUEST_METHOD']=='GET')
 {
        $originalImgName= $_FILES['task_file']['name'];
        $tempName= $_FILES['task_file']['tmp_name'];
        $task_id = $_GET['task_id'];
        $task_id = (int)$task_id;
        // check task id
        $query = "SELECT COUNT(Task_Id) as total_rows FROM task_master_table WHERE Task_Id = ? AND Enabled =1";
        $query_prep = $dbhandle->prepare($query);
        $query_prep->bind_param("i",$task_id);  
        $query_prep->execute();
        $response_code = 0;
        $result_query = $query_prep->get_result();
        $row_check_result = $result_query->fetch_assoc();
        $assignmentFileId = sequence_number('task_file_upload', $dbhandle);
        if ($row_check_result['total_rows']>0) 
        {
          if (empty($_POST['task_type'])) 
          {
            $task_type = "File";
            // file hadling
            $folder="./app_images/Assignments/";
            $directory = 'Assignments';
            $mainDirectory = "./app_images/Assignments/";
            if (!file_exists($mainDirectory)) 
            {
              mkdir('./app_images/Assignments/', 0777, true);
            }
            if(move_uploaded_file($tempName,$folder.$originalImgName))
            {
                // rename existing file in folder and insert record into database
                $fileExtension = strtolower(pathinfo($_FILES['task_file']['name'], PATHINFO_EXTENSION));
                $file_name = md5(uniqid().date('His')).'.'.$fileExtension;
                //$rename_file = rename('./app_images/Assignments/'.$originalImgName, $file_name); 
                $db_filename = "Assignments/".$originalImgName;
                $assignmentQuery = "INSERT INTO `task_file_upload`(`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
                $stmtPrepare = $dbhandle->prepare($assignmentQuery);
                $stmtPrepare->bind_param("iissss", $assignmentFileId, $task_id, $task_type, $db_filename, $_REQUEST["school_id"], $_REQUEST["login_id"]);
                $actual_link = "http://$_SERVER[HTTP_HOST]";
                $url_file = './app_images/Assignments/'.$originalImgName;
                if ($stmtPrepare->execute()) {
                  echo json_encode(array( "status" => "true","message" => "Successfully File Added!","file_name"=> $url_file,"server_name"=> $actual_link));
                  http_response_code(200);  
                }  
                else{
                  $error_msg = $stmtPrepare->error;
                  $el = new LogMessage();
                  $sql = $assignmentQuery;
                  //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                  $el->write_log_message('Student Create Assignment App', $error_msg, $sql, __FILE__, $_REQUEST['login_id']);
                  //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                  mysqli_rollback($dbhandle);
                  $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                  http_response_code(500);
                }
                
            }
            else
            {
              echo json_encode(array( "status" => "false","message" => "Failed!") );
              http_response_code(500);
            }          
          }
          else if ($_REQUEST['task_type'] == 'Link') {
            // link handling
            $assignmentFileId = sequence_number('task_file_upload', $dbhandle);
            $assignmentQuery = "INSERT INTO `task_file_upload`(`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
            $stmtPrepare = $dbhandle->prepare($assignmentQuery);
            $stmtPrepare->bind_param("iissss", $assignmentFileId, $task_id, $_REQUEST['task_type'], $_REQUEST['task_file'], $_REQUEST["school_id"], $_REQUEST["login_id"]);
            if ($stmtPrepare->execute()) {
              echo json_encode(array( "status" => "true","message" => "Successfully Link Added!" ));  
              http_response_code(200);
            } 
            else{
              $error_msg = $stmtPrepare->error;
              $el = new LogMessage();
              $sql = $assignmentQuery;
              //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
              $el->write_log_message('Student Create Assignment App', $error_msg, $sql, __FILE__, $_REQUEST['login_id']);
              //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
              mysqli_rollback($dbhandle);
              $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
              http_response_code(500);
            } 
          }          
        }
        else
        {
          echo json_encode(array( "status" => "false","message" => "Invalid Task Id!") );
          http_response_code(500);
        }
 }
?>