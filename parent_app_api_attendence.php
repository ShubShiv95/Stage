<?php
session_start();
require_once './dbhandle.php';
$request_type = $_REQUEST["Parameter"];
if ($request_type == 'StudYearlyAttendance') {
    // student id check for login student or searched student
    if (empty($_REQUEST['student_id'])) {
        $studentid = $_SESSION["USERID"];
    } else {
        $studentid = $_REQUEST['student_id'];
    }
    // query for month number and name
    $query_month = 'SELECT DISTINCT MONTH(amt.DOA) as month_no, imt.Installment_Name FROM attendance_master_table amt, installment_master_table imt, attendance_details_table adt WHERE imt.Installment_Month = (MONTH(amt.DOA)) AND amt.Attendance_Id = adt.Attendance_Id AND adt.Student_Id = ?';
    $query_month_prep = $dbhandle->prepare($query_month);
    $query_month_prep->bind_param('s', $studentid);
    $query_month_prep->execute();
    $result_month = $query_month_prep->get_result();

    // query for attendence percentage
    $query_percentage = "SELECT (( (SELECT COUNT(adtt.Attendance_Details_Id) FROM attendance_master_table amtt, attendance_details_table adtt WHERE amtt.Attendance_Id = adtt.Attendance_Id AND adtt.Attendance_Status != 'ABSENT' AND adtt.Student_Id = ? AND MONTH(amtt.DOA) = ?) /COUNT(adt.Attendance_Details_Id))*100) AS att_percentage FROM attendance_master_table amt, attendance_details_table adt WHERE amt.Attendance_Id = adt.Attendance_Id AND adt.Student_Id = ? AND MONTH(amt.DOA) = ?";
    $query_percentage_prep = $dbhandle->prepare($query_percentage);

    $data = array(
        "status" => "200",
        "message" => "success",
        "month" => array()
    );
    while ($row_months = $result_month->fetch_assoc()) {
        $query_percentage_prep->bind_param("sisi", $studentid, $row_months['month_no'], $studentid, $row_months['month_no']);
        $query_percentage_prep->execute();
        $perc_result_set = $query_percentage_prep->get_result();
        $row_percentage = $perc_result_set->fetch_assoc();
        $data['month'] = [array(
            "month_no" => $row_months['month_no'],
            "month_name" => $row_months['Installment_Name'],
            "attendance_percent" => round($row_percentage['att_percentage'])
        )];
    }
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if ($request_type == 'ListOfLeaves') {
    $studentid = $_REQUEST["StudentId"];

    $data = array(
        "status" => "200",
        "message" => "success",
        "Leave" => array(
            array(
                "Leave_Reason" => "Personal",
                "From_Date" => "09/10/2020",
                "To_Date" => "09/10/2020",
                "Status" => "Declined"
            ),
            array(
                "Leave_Reason" => "Sick",
                "From_Date" => "11/11/2020",
                "To_Date" => "12/11/2020",
                "Status" => "Approved"
            ),
            array(
                "Leave_Reason" => "Other",
                "From_Date" => "30/11/2020",
                "To_Date" => "30/11/2020",
                "Status" => "Pending"
            )
        )
    );
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if ($request_type == 'LeaveReason') {
    $studentid = $_REQUEST["StudentId"];

    $data = array(
        "status" => "200",
        "message" => "success",
        "Leave_Reason" => array(
            "leave_reason_1" => "Sick",
            "leave_reason_2" => "Family Function",
            "leave_reason_3" => "Bereavement",
            "leave_reason_4" => "Other"
        )
    );
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if ($request_type == 'SubmitLeaves') {
    $studentid = $_REQUEST["StudentId"];

    $data = array(
        "status" => "200",
        "message" => "success"
    );
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if ($request_type == 'MeetingList') {
    $studentid = $_REQUEST["StudentId"];

    $data = array(
        "status" => "200",
        "message" => "success",
        "name" => "Ravi Kumar",
        "class" => "Class 5",
        "section" => "A",
        "roll_no" => "15",
        "Meetings" => array(
            array(
                "topic" => "Physics",
                "description" => "Some Description about Physics",
                "subject" => "About Gravitation",
                "teacher" => "Mr. Ashish Kumar",
                "class_start_date_time" => "29/12/2020 | 08:15 pm",
                "class_end_date_time" => "29/12/2020 | 08:55 pm",
                "Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz09"
            ),
            array(
                "topic" => "Chemistry",
                "description" => "Some Description about Chemistry",
                "subject" => "Chemical Reaction",
                "teacher" => "Mrs. Sanjana Kumar",
                "class_start_date_time" => "30/12/2020 | 03:00 pm",
                "class_end_date_time" => "30/12/2020 | 04:00 pm",
                "Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"
            ),
            array(
                "topic" => "Hindi",
                "description" => "Some Description about Hindi",
                "subject" => "Premchandra",
                "teacher" => "Mrs. Pooja Sinha",
                "class_start_date_time" => "30/12/2020 | 03:00 pm",
                "class_end_date_time" => "30/12/2020 | 04:00 pm",
                "Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"
            ),
            array(
                "topic" => "English",
                "description" => "Some Description about English",
                "subject" => "Chemical Reaction",
                "teacher" => "Mrs. Sanjana Kumar",
                "class_start_date_time" => "31/12/2020 | 03:00 pm",
                "class_end_date_time" => "31/12/2020 | 04:00 pm",
                "Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"
            ),
            array(
                "topic" => "Physics",
                "description" => "Some Description about Physics",
                "subject" => "About Gravitation",
                "teacher" => "Mr. Ashish Kumar",
                "class_start_date_time" => "31/12/2020 | 08:15 pm",
                "class_end_date_time" => "31/12/2020 | 08:55 pm",
                "Meeting_URL" => ""
            )
        )
    );
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if ($request_type == 'LoginAPI') {
    $userId = $_REQUEST["user_id"];
    $password = $_REQUEST["password"];

    $data = array(
        "status" => "200",
        "message" => "success",
        "student_Id" => "12345",
        "student_name" => "Riddhi Kumari",
        "class" => "5",
        "section" => "A",
        "roll_no" => "15",
        "image" => "http://stage.swiftcampus.com/app_images/profile/f70dec5e6f21734a156221c9db14ebec.jpg"
    );
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
}
