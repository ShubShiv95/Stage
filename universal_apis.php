<?php

session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';


/**** get data from class master table *****/
if (isset($_REQUEST['getAllClass'])) {
  $queryClass = "SELECT * FROM class_master_table WHERE School_Id = ? ORDER BY Class_No ASC";
  $queryClassPrepare = $dbhandle->prepare($queryClass);
  $queryClassPrepare->bind_param("i",$_SESSION['SCHOOLID']);
  $queryClassPrepare->execute();
  $resultSet = $queryClassPrepare->get_result(); $data = array();
  while($rows = $resultSet->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************* get all subjects ************/
if (isset($_REQUEST['getAllSubjects'])) {
  $querySubject = 'SELECT * FROM subject_master_table WHERE School_Id = ? AND Enabled = 1 ORDER BY Subject_Name';
  $querySubjectPrepare = $dbhandle->prepare($querySubject);
  $querySubjectPrepare->bind_param("i",$_SESSION['SCHOOLID']);
  $querySubjectPrepare->execute();
  $resultSet = $querySubjectPrepare->get_result(); $data = array();
  while($rows = $resultSet->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/******** get all departments *********/
if (isset($_REQUEST['getAllDepartments'])) {
  $data = array();
  $queryDepartment = 'SELECT * from department_master_table WHERE Enabled = 1 AND School_Id = ? ORDER BY Dept_Name';
  $queryDepartmentPrepare = $dbhandle->prepare($queryDepartment);
  $queryDepartmentPrepare->bind_param("s",$_SESSION["SCHOOLID"]);
  $queryDepartmentPrepare->execute();
  $resultSet = $queryDepartmentPrepare->get_result();
  while ($rows = $resultSet->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************** get sections from class section table **************/
if (isset($_REQUEST['getAllSections'])) {
  $sec_query = "SELECT * from class_section_table WHERE Enabled = 1 AND School_Id = ? AND Class_Id = ? ORDER BY Section";
  $sec_query_prepare = $dbhandle->prepare($sec_query);
  $sec_query_prepare->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['class_id']);
  $sec_query_prepare->execute();
  $result_set = $sec_query_prepare->get_result(); $data = array();
  while ($sec_rows = $result_set->fetch_assoc()) {
    $data[] = $sec_rows;
  }
  echo json_encode($data);
}

/*********** get class by id *************/
if (isset($_REQUEST['getClassbyId'])) {
  $curr_class_id = $_REQUEST['class_id'];
  $queryClass = "SELECT * FROM `class_master_table` WHERE `Class_Id` =? AND Enabled = 1 AND School_Id = ?";
  $queryClassPrepare=$dbhandle->prepare($queryClass);
  $queryClassPrepare->bind_param("ii",$curr_class_id,$_SESSION["SCHOOLID"]);
  $queryClassPrepare->execute();
  $resultSet = $queryClassPrepare->get_result();
  $row_class = $resultSet->fetch_assoc();
  echo json_encode($row_class);
}

/**************** get students detail by student id *****************/
if (isset($_REQUEST['getStudentDetailsbyId'])) {
  $student_id = $_REQUEST['student_id'];
  $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.Student_Id = ? AND smt.School_Id=?";
  $student_query_prep = $dbhandle->prepare($student_query);
  $student_query_prep->bind_param("si",$student_id,$_SESSION["SCHOOLID"]);
  $student_query_prep->execute();
  $result_set = $student_query_prep->get_result(); $data =array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/***************** get students details by their name *******************/
if (isset($_REQUEST['get_stud_details_by_name'])) {
  //echo $_REQUEST['search_type'].', '.$_REQUEST['stud_data'];
  if ($_REQUEST['search_type']=='1') {
    // search students by id
    $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.Student_Id = ? AND smt.School_Id=?";
    $student_query_prep = $dbhandle->prepare($student_query);
    $student_query_prep->bind_param("si",$_REQUEST['stud_data'],$_SESSION["SCHOOLID"]);
  }elseif ($_REQUEST['search_type']=='2') {
    // search students by name
    $name = explode(" ",$_REQUEST['stud_data']);
    $fname =  '%'.$name[0].'%';
    $lname =  '%'.$name[1].'%';
    $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.First_Name LIKE ? and smt.Last_Name LIKE ? AND smt.School_Id=?";
    $student_query_prep = $dbhandle->prepare($student_query);
    $student_query_prep->bind_param("ssi",$fname,$lname,$_SESSION["SCHOOLID"]);
  }elseif ($_REQUEST['search_type']=='3') {
    // search by class
    $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND scd.Class_Id = ? AND smt.School_Id=?";
    $student_query_prep = $dbhandle->prepare($student_query);
    $student_query_prep->bind_param("ii",$_REQUEST['stud_data'],$_SESSION["SCHOOLID"]);
  }
  
  $student_query_prep->execute();
  $result_set = $student_query_prep->get_result(); $data =array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);  
}

?>