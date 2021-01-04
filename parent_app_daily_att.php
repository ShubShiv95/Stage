<?php
session_start();
require_once './dbhandle.php';
$request_type = $_REQUEST["Parameter"];
if ($request_type == 'StudMAttendance') {
    
    // student id check for login student or searched student
    if (empty($_REQUEST['StudentId'])) {
        $studentid = $_SESSION["USERID"];
    } else {
        $studentid = $_REQUEST['StudentId'];
    }
    // query for month number and name
    $query_month = 'SELECT DISTINCT MONTH(amt.DOA) as month_no, YEAR(amt.DOA) as year_no, imt.Installment_Name FROM attendance_master_table amt, installment_master_table imt, attendance_details_table adt WHERE imt.Installment_Month = (MONTH(amt.DOA)) AND amt.Attendance_Id = adt.Attendance_Id AND adt.Student_Id = ?';
    $query_month_prep = $dbhandle->prepare($query_month);
    $query_month_prep->bind_param('s', $studentid);
    $query_month_prep->execute();
    $result_month = $query_month_prep->get_result();

    // query for attendence percentage
    $query_percentage = "SELECT COUNT(adt.Attendance_Details_Id) as total_attendence, 
    (( (SELECT COUNT(adtt.Attendance_Details_Id) FROM attendance_master_table amtt, attendance_details_table adtt WHERE amtt.Attendance_Id = adtt.Attendance_Id AND adtt.Attendance_Status = 'ABSENT' AND adtt.Student_Id = ? AND MONTH(amtt.DOA) = ?))) AS absent ,
    (( (SELECT COUNT(adtt.Attendance_Details_Id) FROM attendance_master_table amtt, attendance_details_table adtt WHERE amtt.Attendance_Id = adtt.Attendance_Id AND adtt.Attendance_Status = 'PRESENT' AND adtt.Student_Id = ? AND MONTH(amtt.DOA) = ?))) AS present ,
    (( (SELECT COUNT(adtt.Attendance_Details_Id) FROM attendance_master_table amtt, attendance_details_table adtt WHERE amtt.Attendance_Id = adtt.Attendance_Id AND adtt.Attendance_Status = 'HALFDAY' AND adtt.Student_Id = ? AND MONTH(amtt.DOA) = ?))) AS half_day ,
    (( (SELECT COUNT(adtt.Attendance_Details_Id) FROM attendance_master_table amtt, attendance_details_table adtt WHERE amtt.Attendance_Id = adtt.Attendance_Id AND adtt.Attendance_Status = 'LATE' AND adtt.Student_Id = ? AND MONTH(amtt.DOA) = ?))) AS late 
    FROM attendance_master_table amt, attendance_details_table adt WHERE amt.Attendance_Id = adt.Attendance_Id AND adt.Student_Id = ? AND MONTH(amt.DOA) = ?";
    $query_percentage_prep = $dbhandle->prepare($query_percentage);

    // daily attendance records
    $daily_att = "SELECT amt.DOA, adt.Attendance_Status FROM attendance_master_table amt, attendance_details_table adt WHERE adt.Attendance_Id = amt.Attendance_Id AND adt.Student_Id = ? AND MONTH(amt.DOA)=? AND amt.Session = ?";
    $daily_att_prep = $dbhandle->prepare($daily_att);
    $data = array(
        "status" => "200",
        "message" => "success",
        "months" => array()
    );
    while ($row_months = $result_month->fetch_assoc()) {
        $number = cal_days_in_month(CAL_GREGORIAN, $row_months['month_no'], $row_months['year_no']);
        // binding attandance summery
        $query_percentage_prep->bind_param("sisisisisi", $studentid, $row_months['month_no'], $studentid, $row_months['month_no'], $studentid, $row_months['month_no'], $studentid, $row_months['month_no'], $studentid, $row_months['month_no']);
        $query_percentage_prep->execute();
        $perc_result_set = $query_percentage_prep->get_result();
        $row_percentage = $perc_result_set->fetch_assoc();
        $data['months'] = array(
            "month_no" => $row_months['month_no'],
            "month_name" => $row_months['Installment_Name'],
            "attendance_percent" => round(($row_percentage['present']+$row_percentage['late']+$row_percentage['half_day'])/($number-8)),
            "days_count" => $number,
            "present_count" => $row_percentage['present'],
            "absent_count" => $row_percentage['absent'],
            "late_count" => $row_percentage['late'],
            "halfday_count" => $row_percentage['half_day'],
            "holiday_count" => "8"
        );
        
        // binding daily attendance
        $daily_att_prep->bind_param("sis",$studentid,$row_months['month_no'],$_SESSION["SESSION"]);
        $daily_att_prep->execute();
        $result_set_daily_att = $daily_att_prep->get_result();
        while ($row_daily_att = $result_set_daily_att->fetch_assoc()) {
            $data['months'][$row_daily_att['DOA']]['attendance'] = 
            array(
                "day"=>date('d',strtotime($row_daily_att['DOA'])),
                "status"=>$row_daily_att['Attendance_Status']
            );
        }
    }
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}


?>