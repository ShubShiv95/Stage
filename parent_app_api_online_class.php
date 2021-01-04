<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['get_student_online_class_details'])) {
    $query_leave = "SELECT oct.*, cmt.Class_Name, smt.Subject_Name, cst.Section, smtt.Staff_Name FROM 
    online_class_table oct, 
    class_master_table cmt, 
    subject_master_table smt, 
    class_section_table cst, 
    staff_master_table smtt 
    WHERE oct.Class_Id = cmt.Class_Id 
    AND oct.Class_Sec_Id = cst.Class_Sec_Id 
    AND oct.Staff_Id = smtt.Staff_Id
    AND oct.Subject_Id = smt.Subject_Id AND DATE(oct.Start_date) = ? AND oct.Class_Id = ? AND oct.Class_Sec_Id=?";
    $today = date('Y-m-d');
    $query_leave_perp = $dbhandle->prepare($query_leave);
    $query_leave_perp->bind_param("iis",$today,$_REQUEST['class_id'],$_REQUEST['section_id']);
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