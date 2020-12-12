<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
/*
    controller page for online class
*/

/*********** creating new online class ***********/
if (isset($_REQUEST['online_class_sender'])) {
    $message_list = '';
    if (empty($_REQUEST['class_name'])) {
        $message_list .= '<p class="text-danger">Please Select Class</p>';
    }
    else if (empty($_REQUEST['class_section'])) {
        $message_list .= '<p class="text-danger">Please Select Section</p>';
    }
    else if (empty($_REQUEST['subject_list'])) {
        $message_list .= '<p class="text-danger">Please Select Subject</p>';
    }
    else if (empty($_REQUEST['staff_list'])) {
        $message_list .= '<p class="text-danger">Please Select Teacher Name</p>';
    }
    else if (empty($_REQUEST['tpoic'])) {
        $message_list .= '<p class="text-danger">Please Type Topic</p>';
    }
    else if (empty($_REQUEST['class_type'])) {
        $message_list .= '<p class="text-danger">Please Select Class Type</p>';
    }
    else if (empty($_REQUEST['url'])) {
        $message_list .= '<p class="text-danger">URL Of Class Required</p>';
    }
    else if (empty($_REQUEST['start_date'])) {
        $message_list .= '<p class="text-danger">Please Type Start Date</p>';
    }
    else if (empty($_REQUEST['start_time'])) {
        $message_list .= '<p class="text-danger">Please Type Start Time</p>';
    }
    else if (empty($_REQUEST['end_date'])) {
        $message_list .= '<p class="text-danger">Please Type End Date</p>';
    }
    else if (empty($_REQUEST['end_time'])) {
        $message_list .= '<p class="text-danger">Please Type End Time</p>';
    }
    else if (empty($_REQUEST['class_description'])) {
        $message_list .= '<p class="text-danger">Please Type Description</p>';
    } 
    else{
        $start_date =  $_REQUEST['start_date'].' '.$_REQUEST['start_time'];
        $end_date =  $_REQUEST['end_date'].' '.$_REQUEST['end_time'];
        // check existing online class
        $query_check = "SELECT COUNT(OLC_Id) as total_row FROM online_class_table WHERE `Class_Sec_Id` =? AND `Subject_Id` = ? AND `Start_date` = ? AND Enabled = 1";
        $query_check_prep = $dbhandle->prepare($query_check);
        $query_check_prep->bind_param("iis",$_REQUEST['class_section'],$_REQUEST['subject_list'],$start_date);
        $query_check_prep->execute();
        $result_set = $query_check_prep->get_result();
        $row_result = $result_set->fetch_assoc();
        if ($row_result['total_row']>0) {
            $message_list .= '<p class="text-danger">Class Existed For The Same Date, Time and Subject. Please Try Another!!! </p>';
        }
        else{
            mysqli_autocommit($dbhandle, false);
            // add new class
            if ($_REQUEST['action']=='add_new_record') {
               
                $insert_query = "INSERT INTO online_class_table(OLC_Id, Class_Topic, Class_Description, Class_Sec_Id, Subject_Id, Staff_Id, Class_Type, Start_date, End_Date, Class_Duration, URL, School_Id,Updated_By,Class_Id) VALUES (?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y %H:%i'), str_to_date(?,'%d/%m/%Y %H:%i'), ?,?,?,?,?)";
                $insert_query_perp = $dbhandle->prepare($insert_query);
                $total_loops =  count($_REQUEST['class_section']);
                for ($i=0; $i < $total_loops; $i++) { 
                  
                    $class_id = sequence_number('online_class_table',$dbhandle);
                   $bind_prep = $insert_query_perp->bind_param("issiiisssisisi",$class_id,$_REQUEST['tpoic'],$_REQUEST['class_description'],$_REQUEST['class_section'][$i],$_REQUEST['subject_list'],$_REQUEST['staff_list'],$_REQUEST['class_type'],$start_date,$end_date,$_REQUEST['duration'],$_REQUEST['url'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_REQUEST['class_name']); 
                   $exec_quyery = $insert_query_perp->execute();

                  // search students data by class and section
                  $query_students = "SELECT * FROM `student_master_table` WHERE `Class_Id` = ".$_REQUEST['class_name']." AND `Class_Sec_Id`= ".$_REQUEST['class_section'][$i]."";
                  $query_students_prep = $dbhandle->prepare($query_students);
                  $query_students_prep->execute();
                  $result_students = $query_students_prep->get_result();

                  // inserting students attendance as absent
                  $att_updt = "INSERT INTO `online_class_attendance`(`OLCA_Id`, `OLC_Id`, `Student_Id`, `Attendance_Status`, `School_Id`, `Updated_By`,`User_Type`) VALUES (?,?,?,?,?,?,?)";
                  $att_updt_prep = $dbhandle->prepare($att_updt);
                  $status = "ABSENT";
                  while ($students = $result_students->fetch_assoc()) {
                      $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                      $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                      $att_updt_prep->bind_param("iississ", $class_att_id,$class_id,$students["Student_Id"],$status,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_SESSION["LOGINID"]);
                      
                     $exec_stud_data = $att_updt_prep->execute();
                  }
                }
                // updating teacher details into attendance table
                $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                $att_updt = "INSERT INTO `online_class_attendance`(`OLCA_Id`, `OLC_Id`, `Student_Id`, `Attendance_Status`, `School_Id`, `Updated_By`,`User_Type`) VALUES (?,?,?,?,?,?,?)";
                $att_updt_prep = $dbhandle->prepare($att_updt);
                $att_updt_prep->bind_param("iississ", $class_att_id,$class_id,$_SESSION["USERID"],$status,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_SESSION["LOGINID"]);
                $att_updt_prep->execute();
                if ($exec_stud_data) {
                    $message_list .= '<p class="text-success">Online  Class Has Been Created For the Given Time!!!</p>';
                }else{
                    $error_msg = $insert_query_perp->error;
                    $el = new LogMessage();
                    $sql = $insert_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Online Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
            }
            // update existing class
            else if ($_REQUEST['action']=='update_existing_record') {
                
            }
            mysqli_commit($dbhandle);
        }
        echo $message_list;
    }   
}

/********* display online class data *********/
if (isset($_REQUEST['display_online_class'])) {
    if (empty($_SESSION["CLASSID"])) {
        $class_id = $_REQUEST['class'];
    }
    else{
        $class_id = $_SESSION["CLASSID"];
    }
    $query_search = "SELECT oct.*, cmt.Class_Name, smt.Subject_Name, cst.Section, smtt.Staff_Name FROM 
    online_class_table oct, 
    class_master_table cmt, 
    subject_master_table smt, 
    class_section_table cst, 
    staff_master_table smtt 
    WHERE oct.Enabled =1 AND DATE(oct.Start_date) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y') AND oct.Class_Id = ? AND oct.Subject_Id = ? 
    AND oct.Class_Id = cmt.Class_Id 
    AND oct.Class_Sec_Id = cst.Class_Sec_Id 
    AND oct.Staff_Id = smtt.Staff_Id
    AND oct.Subject_Id = smt.Subject_Id AND oct.School_Id=? ORDER BY oct.OLC_Id DESC";
    $query_search_prep = $dbhandle->prepare($query_search);
    $query_search_prep->bind_param("ssiii",$_REQUEST['start_date'],$_REQUEST['end_date'],$class_id,$_REQUEST['subject'],$_SESSION["SCHOOLID"]);
    $query_search_prep->execute();

    $result_set = $query_search_prep->get_result();
    while ($row = $result_set->fetch_assoc()) 
    {
        /*<button class="btn btn-warning btn_edit" id="'.$row['OLC_Id'].'"><i class="fas fa-pencil-alt"></i></button> */
        echo ' <div class="col-lg-12 col-md-12 mb-5 shadow" style="border: 1px solid orange;border-radius:10px;">
        <div class="container">
            <h4 class="mt-2">'.$row['Class_Topic'].'</h4>
            <p>'.$row['Class_Description'].'</p>
            <hr class="my-0">
            <div class="row">
                <div class="col-md-4">
                    <p>Class (Section) : '.$row['Class_Name'].' ('.$row['Section'].')</p>
                </div>
                <div class="col-md-4">
                    <p>Subject : '.$row['Subject_Name'].'</p>
                </div>
                <div class="col-md-4">
                    <p>By : '.$row['Staff_Name'].'</p>
                </div>
                <div class="col-md-4">
                    <p>Start Time : '.$row['Start_date'].'</p>
                </div>
                <div class="col-md-4">
                    <p>End Time : '.$row['End_Date'].'</p>
                </div>
                <div class="col-md-4">
                    <p>Duration : '.$row['Class_Duration'].' hr</p>
                </div>
                <div class="col-md-6 mb-2">';
                if ($row["End_Date"]>date('Y-m-d H:i:s')) {
                    echo '<a class="btn btn-primary btn-lg btn_redirect" res_id="'.$row['OLC_Id'].'" id="'.$row['URL'].'" href="#" role="button">Click To Join</a>';
                   }
                echo '</div><div class="col-md-6 text-right"><button class="btn btn-danger btn_delete" id="'.$row['OLC_Id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button></div>
            </div>
        </div>
    </div>';
    }
}

/********** delete online class *********/
if (isset($_REQUEST['delete_class'])) {
    $del_q = "UPDATE online_class_table SET Enabled =0 WHERE OLC_Id = ?";
    $del_q_prep = $dbhandle->prepare($del_q);
    $del_q_prep->bind_param("i",$_REQUEST['del_id']);
    $del_q_prep->execute();
}

/******* make attendance ******/
if (isset($_REQUEST['make_att'])) {
    $ocl_id = $_REQUEST['ocl_id']; $status = "PRESENT";
    $class_att_id = sequence_number('online_class_attendance',$dbhandle);
    $att_updt = "UPDATE online_class_attendance SET Attendance_Status = ?, Updated_By=? WHERE OLC_Id = ? AND Student_Id = ?";
    $att_updt_prep = $dbhandle->prepare($att_updt);
    $att_updt_prep->bind_param("ssi", $status,$_SESSION["USERID"],$ocl_id,$_SESSION["USERID"]);
    if ($att_updt_prep->execute()) {
        //echo '<script>window.open('.$_REQUEST['url'].');</script>';
    }
}
?>
