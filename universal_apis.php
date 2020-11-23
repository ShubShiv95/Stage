<?php

session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';


/**** get data from class master table *****/
if (isset($_REQUEST['getAllClass'])) {
  $queryClass = "SELECT * FROM class_master_table WHERE School_Id = ? ORDER BY class_id ASC";
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
?>