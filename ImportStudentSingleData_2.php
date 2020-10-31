<?php  
  session_start();
  include 'dbobj.php';
  include 'AdmissionModel.php';
  include 'security.php';
  include 'errorLog.php';   

$selectedColName = $_REQUEST['colName'];
$query = "SELECT Student_Id, Admission_Id, First_Name, Last_Name, Gender, DOB from student_master_table";  
$result = $dbhandle -> query($query);

$columnHeader = "Student Id" . "\t" . "Admission Id" . "\t" . "First Name" . "\t" . "Last Name" . "\t" 
                ."Gender" . "\t" . "DOB" . "\t". $selectedColName . "\t";  
$setData = '';  
  while ($rec = $result -> fetch_assoc()) { 
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $rowData = $rowData . '';
    $setData .= trim($rowData) . "\n";  
}  

header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n";  

 ?> 