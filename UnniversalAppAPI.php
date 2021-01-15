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
  $resultSet = $queryClassPrepare->get_result(); 
  $data = array(
    "status"  =>  "200",
    "message" =>  "success",
    "data"    =>  array()
  );

  while($rows = $resultSet->fetch_assoc()){
    $data["data"][] = array(
      "class_id"  =>  $rows['Class_Id'],
      "class_name" =>  $rows['Class_Name'],
      "class_number" =>  $rows['Class_No'],
      "next_class_id" =>  $rows['Next_Class_Id']
    );
  }
  echo json_encode($data, JSON_PRETTY_PRINT);
}

/************* get all subjects ************/
if ($parameter=='getAllsubject') {
  $querySubject = 'SELECT * FROM subject_master_table WHERE School_Id = ? AND Enabled = 1 ORDER BY Subject_Name';
  $querySubjectPrepare = $dbhandle->prepare($querySubject);
  $querySubjectPrepare->bind_param("i",$_REQUEST['school_id']);
  $querySubjectPrepare->execute();
  $resultSet = $querySubjectPrepare->get_result(); 
  $data = array(
    "status"  =>  "200",
    "type"    =>  "success",
    "subjects"  =>  array()
  );
  while($rows = $resultSet->fetch_assoc()){
    $data["subjects"][] = array(
      "subject_id"  => $rows['Subject_Id'],
      "subject_name"  =>  $rows['Subject_Name']
    );
  }
  echo json_encode($data, JSON_PRETTY_PRINT);
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
  $result_set = $sec_query_prepare->get_result();
  $data = array(
    "status"  =>  "200",
    "type"    =>  "success",
    "sections"  =>  array()
  );
  while ($sec_rows = $result_set->fetch_assoc()) {
    $data["sections"][] = array(
      "section_id"  => $sec_rows['Class_Sec_Id'],
      "section"  =>  $sec_rows['Section'],
      "stream"  =>  $sec_rows['Stream']
    );
  }
  echo json_encode($data, JSON_PRETTY_PRINT);
}

}


?>