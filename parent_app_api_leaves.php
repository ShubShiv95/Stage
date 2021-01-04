<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['get_student_leave'])) {
    $query_leave = "SELECT slm.*, sld.Leave_Details_Id, sld.Leave_Date FROM student_leave_master slm, student_leave_details sld WHERE slm.Leave_Id = sld.Leave_Id AND slm.Student_Id = ?";
    $query_leave_perp = $dbhandle->prepare($query_leave);
    $query_leave_perp->bind_param("i",$_REQUEST['student_id']);
    $query_leave_perp->execute();
    $result_set = $query_leave_perp->get_result();
    if ($result_set->num_rows>0) {
        $data = array(
            "status" => "200",
            "message" => "success",
            "details"=> array());
        while ($row_leave = $result_set->fetch_assoc()) {
            $data["details"] = $row_leave;
        }
    }else{
        $data = array(
            "status" => "500",
            "message" => "failed",
            "details"=> "No Record Found");
    }
    echo json_encode($data,JSON_PRETTY_PRINT);
}

?>