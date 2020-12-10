<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

//$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]

if (isset($_REQUEST['class_sender'])) {
    if (empty($_REQUEST['class_sender'])) {
            // add new record
            if (empty($_REQUEST['class_number'])) {
                echo '<p class="text-danger">Please Type Class Number</p>';
            }
            if (empty($_REQUEST['class_name'])) {
                echo '<p class="text-danger">Please Type Class Name</p>';
            }

            if (!empty($_REQUEST['class_number']) && !empty($_REQUEST['class_name'])) {
                // check existing values
                $query_search = "SELECT * FROM class_master_table WHERE `Class_No` = ? AND `Class_Name` = ? AND Enabled =1 AND School_Id = ?";
                $query_search_update = $dbhandle->prepare($query_search);
                $query_search_update->bind_param("iii",$_REQUEST['class_number'],$_REQUEST['class_name'],$_SESSION["SCHOOLID"]);
                $query_search_update->execute();
                $result_set = $query_search_update->get_result();

                if ($result_set->num_rows<0) {
                    echo '<p class="text-danger">Class Existed With Same Name & Number</p>';
                }else{
                    mysqli_autocommit($dbhandle, false);
                    // add new record
                    if ($_REQUEST['form_action']=='add_new_record') {
                        $class_id = sequence_number('class_master_table',$dbhandle);
                        $insert_query = "INSERT INTO `class_master_table`(`Class_Id`, `Class_No`, `Class_Name`, `School_Id`, `updated_by`) VALUES (?,?,?,?,?)";
                        $insert_query_prep = $dbhandle->prepare($insert_query);
                        $insert_query_prep->bind_param("iisis",$class_id,$_REQUEST['class_number'],$_REQUEST['class_name'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                        if (!$insert_query_prep->execute()) {
                            $error_msg = $insert_query_prep->error;
                            $el = new LogMessage();
                            $sql = $insert_query;
                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                            $el->write_log_message('Add Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                            mysqli_rollback($dbhandle);
                            $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                            die;
                        }
                        else
                        {
                            echo '<p class="text-success">Class Has Been Added Successfully!!!</p>';
                        }
                    }
                    elseif($_REQUEST['form_action']=='update_existing_record'){
                        echo $_REQUEST['class_name'];
                         // update record
                        $update_query = "UPDATE class_master_table SET Class_Name = ? AND Class_No =? AND updated_by=?  WHERE Class_Id = ?";
                        $sql_q = "UPDATE class_master_table SET Class_Name = ? AND Class_No =? AND updated_by=?  WHERE Class_Id = ?";
                        $update_query_prep = $dbhandle->prepare($update_query);
                        $update_query_prep->bind_param("sisi", $_REQUEST['class_name'], $_REQUEST['class_number'], $_SESSION["LOGINID"], $_REQUEST['class_id']);
                        if ($update_query_prep->execute()) {
                            echo '<p class="text-success">Class Has Been Updated Successfully</p>';
                        }else{
                            $error_msg = $update_query_prep->error;
                            $el = new LogMessage();
                            $sql = $update_query;
                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                            $el->write_log_message('Update Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                            mysqli_rollback($dbhandle);
                            $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                            die;
                        }
                    }
                    mysqli_commit($dbhandle);
                }
               
            }            
    }
    else
    {
        echo '<p class="text-danger">Security Error</p>';
    }
}
?>