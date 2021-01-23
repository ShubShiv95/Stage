<?php
session_start();
include_once 'dbobj.php';
include_once 'errorLog.php';
/********** get all student list by class and session **********/
if (isset($_REQUEST['get_student_by_class_session'])) {
    $query = "SELECT smt.* FROM student_master_table smt, student_class_details scd WHERE scd.Student_Id = smt.Student_Id AND scd.Enabled = 1 AND scd.School_Id = ? AND scd.Session = ? AND scd.Class_Id = ?";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->bind_param("isi",$_REQUEST['school'],$_REQUEST['session'],$_REQUEST['class']);
    $query_prep->execute();
    $result_set = $query_prep->get_result();
    $data = array();
    while($row_studs = $result_set->fetch_assoc()){
        $name_stud = $row_studs['First_Name'].' '.$row_studs['Middle_Name'].' '.$row_studs['Last_Name'];
        $data[]  =array(
            'stud_name'  =>  $name_stud,
            'dob'        =>  date("d/M/Y",strtotime($row_studs['DOB'])),
            'stud_id'    =>   $row_studs['Student_Id']  
        );  
    }
    echo json_encode($data,JSON_PRETTY_PRINT);
}

?>