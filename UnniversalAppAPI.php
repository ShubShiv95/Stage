<?php
include 'dbhandle.php';
if (isset($_REQUEST['parameter'])) {
  $parameter= $_REQUEST['parameter'];
/**** get data from class master table *****/
if ($parameter=='getAllclass') {
  $queryClass = "SELECT * FROM class_master_table WHERE School_Id = ? ORDER BY Class_No ASC";
  $queryClassPrepare = $dbhandle->prepare($queryClass);
  $queryClassPrepare->bind_param("i",$_REQUEST['school_id']);
  $queryClassPrepare->execute();
  $resultSet = $queryClassPrepare->get_result(); $data = array();
  while($rows = $resultSet->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************* get all subjects ************/
if ($parameter=='getAllsubject') {
  $querySubject = 'SELECT * FROM subject_master_table WHERE School_Id = ? AND Enabled = 1 ORDER BY Subject_Name';
  $querySubjectPrepare = $dbhandle->prepare($querySubject);
  $querySubjectPrepare->bind_param("i",$_REQUEST['school_id']);
  $querySubjectPrepare->execute();
  $resultSet = $querySubjectPrepare->get_result(); $data = array();
  while($rows = $resultSet->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/************** get sections by class id **************/
if ($parameter=='getAllsectionbyClass') {
  $sec_query = "SELECT cst.*, cmt.Class_Name 
  FROM class_section_table cst, class_master_table cmt 
  WHERE cst.Class_Id = cmt.Class_Id AND cst.Enabled = 1 
  AND cst.School_Id=?
  AND cst.Class_Id=?
  ORDER BY cst.Section";
  $sec_query_prepare = $dbhandle->prepare($sec_query);
  $sec_query_prepare->bind_param("ii",$_REQUEST['school_id'],$_REQUEST['class_id']);
  $sec_query_prepare->execute();
  $result_set = $sec_query_prepare->get_result(); $data = array();
  while ($sec_rows = $result_set->fetch_assoc()) {
    $data[] = $sec_rows;
  }
  echo json_encode($data);
}

}


?>