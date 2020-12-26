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

/**** get data from class master table DESC*****/
if (isset($_REQUEST['getAllClass_desc'])) {
  $queryClass = "SELECT * FROM class_master_table WHERE School_Id = ? ORDER BY Class_Id DESC";
  $queryClassPrepare = $dbhandle->prepare($queryClass);
  $queryClassPrepare->bind_param("i",$_SESSION['SCHOOLID']);
  $queryClassPrepare->execute();
  $resultSet = $queryClassPrepare->get_result(); $data = array();
  while($rows = $resultSet->fetch_assoc()){
    $data[] = $rows;
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
  $sec_query = "SELECT cst.*, cmt.Class_Name 
  FROM class_section_table cst, class_master_table cmt 
  WHERE cst.Class_Id = cmt.Class_Id AND cst.Enabled = 1 
  AND cst.School_Id=?
  AND cst.Class_Id=?
  ORDER BY cst.Section";
  $sec_query_prepare = $dbhandle->prepare($sec_query);
  $sec_query_prepare->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['class_id']);
  $sec_query_prepare->execute();
  $result_set = $sec_query_prepare->get_result(); $data = array();
  while ($sec_rows = $result_set->fetch_assoc()) {
    $data[] = $sec_rows;
  }
  echo json_encode($data);
}

/************** get section details by id ****************/
if (isset($_REQUEST['get_sec_details_by_id'])) {
  $sec_query = "SELECT cst.*, cmt.Class_Name 
  FROM class_section_table cst, class_master_table cmt 
  WHERE cst.Class_Id = cmt.Class_Id AND cst.Enabled = 1 
  AND cst.School_Id=?
  AND cst.Class_Sec_Id =?";
  $sec_query_prepare = $dbhandle->prepare($sec_query);
  $sec_query_prepare->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['sec_id']);
  $sec_query_prepare->execute();
  $result_set = $sec_query_prepare->get_result(); $data = array();
  while ($sec_rows = $result_set->fetch_assoc()) {
    $data[] = $sec_rows;
  }
  echo json_encode($data);
}

/**************** get students detail by student id *****************/
if (isset($_REQUEST['getStudentDetailsbyId'])) {
  $student_id = $_REQUEST['student_id'];
  $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section, scd.Roll_No from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.Student_Id = ? AND smt.School_Id=?";
  $student_query_prep = $dbhandle->prepare($student_query);
  $student_query_prep->bind_param("si",$student_id,$_SESSION["SCHOOLID"]);
  $student_query_prep->execute();
  $result_set = $student_query_prep->get_result(); $data =array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/**************** get all students data by class **************/
if (isset($_REQUEST['get_all_students_by_class'])) {
  $student_query = "SELECT * FROM `student_master_table` WHERE `Class_Id` =?";
  $student_query_prep = $dbhandle->prepare($student_query);
  $student_query_prep->bind_param("i",$_REQUEST["class_id"]);
  $student_query_prep->execute();
  $result_set = $student_query_prep->get_result(); $data =array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data); 
}

/**************** get all students data by id only student_master_table **************/
if (isset($_REQUEST['get_all_students_by_student_id'])) {
  $student_query = "SELECT * FROM `student_master_table` WHERE `Student_Id` =?";
  $student_query_prep = $dbhandle->prepare($student_query);
  $student_query_prep->bind_param("i",$_REQUEST["student_id"]);
  $student_query_prep->execute();
  $result_set = $student_query_prep->get_result(); $data =array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data); 
}

/***************** get students details by their name *******************/
if (isset($_REQUEST['get_stud_details_by_name'])) {
  if ($_REQUEST['search_type']=='1') {
    // search students by id
    $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section, scd.Stream from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.Student_Id = ? AND smt.School_Id=?";
    $student_query_prep = $dbhandle->prepare($student_query);
    $student_query_prep->bind_param("si",$_REQUEST['stud_data'],$_SESSION["SCHOOLID"]);
  }elseif ($_REQUEST['search_type']=='2') {
    // search students by name
    $fname =  '%'.$_REQUEST['stud_data'].'%';
 
    $student_query = "SELECT smt.*, cmt.Class_Name, cst.Section from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND scd.Promoted=0 and smt.Enabled = 1 AND CONCAT(First_Name,Middle_Name,Last_Name) LIKE ? AND smt.School_Id=?";
    $student_query_prep = $dbhandle->prepare($student_query);
    $student_query_prep->bind_param("si",$fname,$_SESSION["SCHOOLID"]);
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

/********** get all school names *********/
if (isset($_REQUEST['get_school_name'])) {
  $query_school = "SELECT * FROM `school_master_table` WHERE `enabled` = 1";
  $query_school_prep = $dbhandle->prepare($query_school);
  $query_school_prep->execute(); $data = array();
  $result_set = $query_school_prep->get_result();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows; 
  }
  echo json_encode($data);
}

/********** get all school names *********/
if (isset($_REQUEST['get_school_name_by_id'])) {
  $query_school = "SELECT * FROM `school_master_table` WHERE `enabled` = 1 AND `School_Id` = ?";
  $query_school_prep = $dbhandle->prepare($query_school);
  $query_school_prep->bind_param("i",$_SESSION["SCHOOLID"]);
  $query_school_prep->execute(); 
  $result_set = $query_school_prep->get_result();
  $rows = $result_set->fetch_assoc();
  echo json_encode($rows);
}

/********** get all clusters **********/
if (isset($_REQUEST['get_all_clusters'])) {
  $query = "SELECT * FROM `fee_group_table` WHERE `Enabled` = 1 AND `School_Id` = ".$_SESSION["SCHOOLID"]." AND Fee_Group_Type='Regular' ORDER BY FG_Name";$data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}

/***** get all fee heads *****/
if (isset($_REQUEST['get_all_fee_heads'])) {
  $query = "SELECT * FROM `fee_head_table` WHERE `Enabled` =1 AND `School_Id` =".$_SESSION["SCHOOLID"]." AND Fee_Type='Regular' ORDER BY `Fee_Head_Name`";$data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}

/********* get all installmonths *********/
if (isset($_REQUEST['get_all_months'])) {
  $query = "SELECT * FROM `installment_master_table` WHERE School_Id = ".$_SESSION["SCHOOLID"]." AND Enabled = 1 ORDER BY `Installment_Id`";$data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}


/*********** get all staff list from staff master table ***********/
if (isset($_REQUEST['get_all_staff_list'])) {
  $staff_query = "SELECT * FROM `staff_master_table` WHERE `School_Id` = ? AND Enabled = 1";
  $staff_query_prep = $dbhandle->prepare($staff_query);
  $staff_query_prep->bind_param("i",$_SESSION["SCHOOLID"]);
  $staff_query_prep->execute();
  $result_set = $staff_query_prep->get_result();$data=array();
  while ($staffs = $result_set->fetch_assoc()) {
   $data[] = $staffs;
  }
  echo json_encode($data);
}

/************** discount from concession table ****************/
if (isset($_REQUEST['get_all_discounts'])) {
  $query = "SELECT * FROM `concession_master_table` WHERE `Enabled` = 1 AND `School_Id` = ".$_SESSION["SCHOOLID"]." ";
  $data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}


/*************** admission details from admission master table ***************/
if (isset($_REQUEST['get_admission_details'])) {
  $query = "SELECT amt.*, cmt.Class_Name, conmt.Concession_Name FROM admission_master_table amt, class_master_table cmt, concession_master_table conmt WHERE amt.Class_Id = cmt.Class_Id AND conmt.Concession_Id = amt.Discount_Category AND amt.Admission_Id = ".$_REQUEST["admission_id"]." ";
  $data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************** get fee cluster id by class 22 ***************/
if (isset($_REQUEST['fee_cluster_id_by_class'])) {
  $query = "SELECT * FROM `fee_group_class_list` WHERE `Class_Id` = ? AND Enabled = 1 AND School_Id = ? AND `Stream` = ?";
  $data=array();
  $query_prep = $dbhandle->prepare($query);
  $query_prep->bind_param("iis",$_REQUEST['class_id'],$_SESSION["SCHOOLID"],$_REQUEST['stream']);
  $query_prep->execute();
  $result_set = $query_prep->get_result();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************** student data for admission form print *************/
if(isset($_REQUEST['admission_form_print'])){
  $student_query = "SELECT smt.*, cmt.Class_Name, scd.Stream from student_master_table smt, student_class_details scd, class_master_table cmt, class_section_table cst WHERE smt.Student_Id = scd.Student_Id AND cmt.Class_Id = scd.Class_Id AND scd.Promoted=0 and smt.Enabled = 1 AND smt.Student_Id = ? AND smt.School_Id=?";
  $student_query_prep = $dbhandle->prepare($student_query);
  $student_query_prep->bind_param("si",$_REQUEST['stud_data'],$_SESSION["SCHOOLID"]);
  $student_query_prep->execute(); $data = array();
  $result_set = $student_query_prep->get_result();
  while ($row_student = $result_set->fetch_assoc()) {
    $data[] = $row_student;
  }
  echo json_encode($data);
}
?>