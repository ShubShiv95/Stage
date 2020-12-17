<?php
session_start();
//date_default_timezone_set('Asia/Kolkata');
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
/*
    controller page for online class
*/

/*********** creating new online class ***********/
if (isset($_REQUEST['online_class_sender'])) {
    if (empty($_REQUEST['online_class_sender'])) 
    {
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
        else if (empty($_REQUEST['class_description'])) {
            $message_list .= '<p class="text-danger">Please Type Description</p>';
        } 
        else{
            $start_date =  $_REQUEST['start_date'].' '.$_REQUEST['start_time'];
            $end_date =  $_REQUEST['start_date'].' '.$_REQUEST['end_time'];
            // generating set_id
            $query_set = "SELECT max(Set_Id) as setid From online_class_table WHERE School_Id = ".$_SESSION["SCHOOLID"]."";
            $query_set_prep = $dbhandle->prepare($query_set);
            $query_set_prep->execute();
            $result_set_q = $query_set_prep->get_result();
            $row_set_id = $result_set_q->fetch_assoc();
            $set_no = $row_set_id['setid']+1;
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
                    $insert_query = "INSERT INTO online_class_table(OLC_Id, Class_Topic, Class_Description, Class_Sec_Id, Subject_Id, Staff_Id, Class_Type, Start_date, End_Date, Class_Duration, URL, School_Id,Updated_By,Class_Id,Set_Id) VALUES (?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y %H:%i'), str_to_date(?,'%d/%m/%Y %H:%i'), ?,?,?,?,?,?)";
                    $insert_query_perp = $dbhandle->prepare($insert_query);
                    $total_loops =  count($_REQUEST['class_section']);
                    // inserting new record into online class table
                    for ($i=0; $i < $total_loops; $i++) { 
                    $olc_id = sequence_number('online_class_table',$dbhandle);
                    $bind_prep = $insert_query_perp->bind_param("issiiisssisisii",$olc_id,$_REQUEST['tpoic'],$_REQUEST['class_description'],$_REQUEST['class_section'][$i],$_REQUEST['subject_list'],$_REQUEST['staff_list'],$_REQUEST['class_type'],$start_date,$end_date,$_REQUEST['duration'],$_REQUEST['url'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_REQUEST['class_name'],$set_no); 

                    $exec_quyery = $insert_query_perp->execute();
                    if ($exec_quyery) 
                    {
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
                                $user_type = "STUDENT";
                                $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                                $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                                $att_updt_prep->bind_param("iississ", $class_att_id,$set_no,$students["Student_Id"],$status,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$user_type);
                                $exec_stud_data = $att_updt_prep->execute();
                            }   
                    }else{
                        $message_list .= '<p class="text-danger">Failed To Save Data. Try Again!!!</p>'; 
                    }
                    }

                    // updating teacher details into attendance table
                    $class_att_id = sequence_number('online_class_attendance',$dbhandle);
                    $att_updt = "INSERT INTO `online_class_attendance`(`OLCA_Id`, `OLC_Id`, `Student_Id`, `Attendance_Status`, `School_Id`, `Updated_By`,`User_Type`) VALUES (?,?,?,?,?,?,?)";
                    $att_updt_prep = $dbhandle->prepare($att_updt);
                    $att_updt_prep->bind_param("iississ", $class_att_id,$set_no,$_SESSION["USERID"],$status,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_SESSION["LOGINTYPE"]);
                    $att_updt_prep->execute();
                    if ($exec_stud_data) {
                        mysqli_commit($dbhandle);
                        $message_list .= '<p class="text-success">Online  Class Has Been Created For the Given Time!!!</p>';
                    }else{
                        $error_msg = $insert_query_perp->error;
                        $el = new LogMessage();
                        $sql = $insert_query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Online Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        mysqli_rollback($dbhandle);
                        $message_list .= 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                        $message_list .= '<p class="text-danger">Failed To Save Data. Try Again!!!</p>';
                        die;
                    }
                }
                // update existing class
                else if ($_REQUEST['action']=='update_existing_record') {
                    mysqli_autocommit($dbhandle, false);
                    
                    $update_query = "UPDATE online_class_table SET `Class_Topic` = ?, `Class_Description`=?,`Staff_Id`=?,`Start_date`=?,`End_Date`=?,`Class_Duration`=?,`URL`=?,`Subject_Id` = ?,`Class_Type`=? WHERE Set_Id = ?";
                    $update_query_prep = $dbhandle->prepare($update_query);
                    $update_query_prep->bind_param("ssissisisi",$_REQUEST['tpoic'],$_REQUEST['class_description'],$_REQUEST['staff_list'],$start_date,$end_date,$_REQUEST['duration'],$_REQUEST['url'],$_REQUEST['subject_list'],$_REQUEST['class_type'],$_REQUEST['set_id']);
                    if ($update_query_prep->execute()) {
                        $message_list.= '<p class="text-success">Data Updated Successfully!!!</p>';
                    }else{
                        $message_list .= '<p class="text-danger">Failed To Update Data. Try Again!!!</p>';
                    }
                    mysqli_commit($dbhandle);
                }
            }
            echo $message_list;
        } 
    }      
}

/********* display online class data *********/
if (isset($_REQUEST['display_online_class'])) {
    if (empty($_SESSION["CLASSID"])) {
        $class_id = $_REQUEST['class'];
    }
    else{
        $class_id = $_SESSION["CLASSID"];
        // studen id : $_SESSION["USERID"] check blocked or not
        $student_details = "SELECT * FROM `student_master_table` WHERE `Student_Id` = ?";
        $student_details_prep = $dbhandle->prepare($student_details);
        $student_details_prep->bind_param('s',$_SESSION["USERID"]);
        $student_details_prep->execute();
        $stud_result_set = $student_details_prep->get_result();
        $student_details_chk = $stud_result_set->fetch_assoc();
    }

    // getting set ids
    $query_search = "SELECT DISTINCT oct.Set_Id FROM online_class_table oct WHERE oct.Subject_Id = ? AND oct.Class_Id = ? AND oct.School_Id = ? AND oct.Enabled = 1 AND DATE(oct.End_Date) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y') ORDER BY oct.Set_Id DESC";
    $query_search_prep = $dbhandle->prepare($query_search);
    $query_search_prep->bind_param("iiiss",$_REQUEST['subject'],$class_id,$_SESSION["SCHOOLID"],$_REQUEST['start_date'],$_REQUEST['end_date']);
    $query_search_prep->execute();
    $result_set = $query_search_prep->get_result();

    // getting details by set ids
    $query_search_details = "SELECT oct.*, cmt.Class_Name, smt.Subject_Name, cst.Section, smtt.Staff_Name FROM 
    online_class_table oct, 
    class_master_table cmt, 
    subject_master_table smt, 
    class_section_table cst, 
    staff_master_table smtt 
    WHERE oct.Class_Id = cmt.Class_Id 
    AND oct.Class_Sec_Id = cst.Class_Sec_Id 
    AND oct.Staff_Id = smtt.Staff_Id
    AND oct.Subject_Id = smt.Subject_Id AND oct.Set_Id=? ORDER BY oct.OLC_Id DESC";
    $query_search_details_prep = $dbhandle->prepare($query_search_details);

    // section query
    $sec_query = "SELECT cst.Section FROM class_section_table cst, online_class_table oct WHERE oct.Class_Sec_Id = cst.Class_Sec_Id AND oct.Set_Id = ? ";
    $sec_query_prep = $dbhandle->prepare($sec_query);

    // show students list
    $query_student = "SELECT Student_Id, First_Name, Middle_Name, Last_Name FROM student_master_table WHERE School_Id = ? AND Session = ? AND Class_Id = ? AND Enabled = 1";
    $query_student_prep = $dbhandle->prepare($query_student);
    while ($row = $result_set->fetch_assoc()) 
    {
        $query_search_details_prep->bind_param("i",$row['Set_Id']);
        $query_search_details_prep->execute();
        $result_set_det = $query_search_details_prep->get_result();
        $row_class = $result_set_det->fetch_assoc();
        echo ' <div class="col-lg-12 col-md-12 mb-5 shadow" style="border: 1px solid orange;border-radius:10px;">
        <div class="container">
            <h4 class="mt-2">'.$row_class['Class_Topic'].'</h4>
            <p>'.$row_class['Class_Description'].'</p>
            <hr class="my-0">
            <div class="row">
                <div class="col-md-4">
                    <p>Class (Section) : '.$row_class['Class_Name'].' (';
                    $sec_query_prep->bind_param("i",$row['Set_Id']);
                    $sec_query_prep->execute();
                    $result_section = $sec_query_prep->get_result();
                    while ($row_secs = $result_section->fetch_assoc()) {
                        echo $row_secs['Section'].', ';
                    }
                    echo ')</p>
                </div>
                <div class="col-md-4">
                    <p>Subject : '.$row_class['Subject_Name'].'</p>
                </div>
                <div class="col-md-4">
                    <p>By : '.$row_class['Staff_Name'].'</p>
                </div>
                <div class="col-md-4">
                    <p>Start Time : <span class="start_time">'.date('d-m-Y h:i a',strtotime($row_class['Start_date'])).'</span></p>
                </div>
                <div class="col-md-4">
                    <p>End Time : <span class="end_time">'.date('d-m-Y h:i a',strtotime($row_class['End_Date'])).'</span></p>
                </div>
                <div class="col-md-4">
                    <p>Duration : '.$row_class['Class_Duration'].' Mins</p>
                </div>
                <div class="col-md-3 mb-2">';

                if ($row_class["End_Date"]>date('Y-m-d H:i:s')) {
                    if ($_SESSION["LOGINTYPE"] =='STUDENT') {
                        if ($student_details_chk['Is_Blocked']=='1') {
                            echo '<p class="text-danger">Your Are Blocked</p>';
                        }else{
                            echo '<a class="btn btn-primary btn-lg btn_redirect res_'.$row_class['Set_Id'].'" res_id="'.$row_class['Set_Id'].'" style="display:none" id="'.$row_class['URL'].'" href="#" role="button">Click To Join</a>';
                        }                        
                    }else{
                        echo '<a class="btn btn-primary btn-lg btn_redirect res_'.$row_class['Set_Id'].'" res_id="'.$row_class['Set_Id'].'" style="display:none" id="'.$row_class['URL'].'" href="#" role="button">Click To Join</a>';
                    }

                    echo '</div>';
                   }
                   $query_student_prep->bind_param("isi",$_SESSION["SCHOOLID"],$_SESSION["SESSION"],$row_class['Class_Id']);
                   $query_student_prep->execute();
                   $result_set_studs = $query_student_prep->get_result();
                  
                if ($_SESSION["LOGINTYPE"] !='STUDENT') {
                    echo '
                <div class="col-md-7 row mb-2 clock_timer">                
                    <div class="col-md-7 text-right" id="student_list'.$row_class['Set_Id'].'">
                    </div>
                    <div class="col-md-5" id="student_btn'.$row_class['Set_Id'].'">                
                    </div>
                    <span class="res_pr_'.$row_class['Set_Id'].'" id="'.$row_class['Set_Id'].'"></span>
                </div>
                <div class="col-md-2 text-right del_div'.$row_class['Set_Id'].'">
                    <a class="btn btn-warning btn_edit" href="./OnlineClassEdit.php?set_id='.$row_class['Set_Id'].'" id="'.$row_class['Set_Id'].'"><i class="fas fa-pen"></i></a> 
                    <button class="btn btn-danger btn_delete" id="'.$row_class['Set_Id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>';
                }
            echo '</div>
        </div>
    </div><script>function check_tr_fl_'.$row_class['Set_Id'].'(set_id) {
        var data = {
            "set_id": set_id
        };
        $.get("./heart_bead.php", data, function(response) {
            // print into span
           // $(".res_pr_'.$row_class['Set_Id'].'").html(response);
            // show / hide button of click to join
            if(response=="true"){
                $(".res_'.$row_class['Set_Id'].'").show();
            }else{
                $(".res_'.$row_class['Set_Id'].'").remove();
                $("#student_list'.$row_class['Set_Id'].'").remove();
                $("#student_btn'.$row_class['Set_Id'].'").remove();
                $(".del_div'.$row_class['Set_Id'].'").remove();
            }
        });
    }
    window.setInterval(function() {
        check_tr_fl_'.$row_class['Set_Id'].'('.$row_class['Set_Id'].');
    }, 3000);
    </script>';
    }
}

/********** block students from online class ********/
if (isset($_REQUEST['block_student'])) {
    $block_query = "UPDATE student_master_table SET Is_Blocked = ? WHERE Student_Id = ? ";
    $block_query_prep = $dbhandle->prepare($block_query);
    $block_query_prep->bind_param("ii",$_REQUEST['status'],$_REQUEST['student_id']);
    if ($block_query_prep->execute()) {
        if ($_REQUEST['status']=='1') {
            $status = "Blocked";
        }else{
            $status = "Un-Blocked";
        }
        echo '<p class="text-success">Student '.$status.' Successfully</p>';
        mysqli_commit($dbhandle);
    }else{
        $error_msg = $block_query_prep->error;
        $el = new LogMessage();
        $sql = $block_query;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Online Class Block Students ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
    }

}

/********** delete online class *********/
if (isset($_REQUEST['delete_class'])) {
    mysqli_autocommit($dbhandle, false);
    $del_q = "UPDATE online_class_table SET Enabled =0 WHERE Set_Id = ?";
    $del_q_prep = $dbhandle->prepare($del_q);
    $del_q_prep->bind_param("i",$_REQUEST['del_id']);
    $del_q_prep->execute();
}

/******* make attendance ******/
if (isset($_REQUEST['make_att'])) {
    mysqli_autocommit($dbhandle, false);
    $ocl_id = $_REQUEST['ocl_id']; $status = "PRESENT";
    $class_att_id = sequence_number('online_class_attendance',$dbhandle);
    $att_updt = "UPDATE online_class_attendance SET Attendance_Status = ?, Updated_By=? WHERE Set_Id = ? AND Student_Id = ?";
    //echo $status.', '.$_SESSION["LOGINTYPE"].', '.$ocl_id.', '.$_SESSION["USERID"];
    $att_updt_prep = $dbhandle->prepare($att_updt);
    $att_updt_prep->bind_param("ssis", $status,$_SESSION["LOGINTYPE"],$ocl_id,$_SESSION["USERID"]);
    if ($att_updt_prep->execute()) {
        mysqli_commit($dbhandle);
        echo $_REQUEST['url'];
    }else{
       
        $error_msg = $insert_query_perp->error;
        $el = new LogMessage();
                    $sql = $insert_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Online Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
        echo json_encode("false");
        
    }
}

/***************** online class details by id ****************/
if (isset($_REQUEST['get_online_class_details'])) {
    $query_search = "SELECT * FROM `online_class_table` WHERE `Set_Id` = ? LIMIT 1";
    $query_search_prep = $dbhandle->prepare($query_search);
    $query_search_prep->bind_param("i",$_REQUEST['set_id']);
    $query_search_prep->execute();
    $result_set = $query_search_prep->get_result();
    $row_set = $result_set->fetch_assoc();
    echo json_encode($row_set);
}

/*************** block un-bloxck students *************/
if (isset($_REQUEST['block_online_class_sender'])) 
{
    mysqli_autocommit($dbhandle, false);
    $update_query = "UPDATE student_master_table SET Is_Blocked = ?, Block_Remarks = ? WHERE Student_Id = ?";
    $update_query_perp = $dbhandle->prepare($update_query);
    $update_query_perp->bind_param("isi",$_REQUEST['block_Status'],$_REQUEST['block_remarks'],$_REQUEST['student_list']);
    if ($update_query_perp->execute()) {
        mysqli_commit($dbhandle);
        $message = '<p class="text-success">Student Blocked Successfully!!!</p>';
    }else{
        $error_msg = $insert_query_perp->error;
        $el = new LogMessage();
        $sql = $insert_query;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Online Class ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        $message = '<p class="text-danger">Error: Assignment Task Creation Error.  Please consult application consultant.</p>';
    }
    echo $message;
}
?>
