<?php
session_start();
include 'dbhandle.php';
include 'error_log.php';
include 'security.php';

//$_SESSION["SCHOOLID"]

$query="select smt.student_name as student_name,smt.student_id as student_id,scd.rollno as rollno from student_class_details scd,student_master_table smt where scd.class_sec_id=" . $_GET["secid"] . "  and smt.student_id=scd.student_id and scd.enabled=1 and scd.school_id=" . $_SESSION["SCHOOLID"];


$result=mysqli_query($dbhandle,$query);

//$str= '<label>Student Name *</label><select class="select2" name="sid" id="sid" onchange="fillsid(this.value);"><option value="0">Select Student</option>';
$str= '<option value="0">Select Student</option>';
echo $str;


while($row=mysqli_fetch_assoc($result))
{
	$str= '<option value="' . $row["student_id"] . '">Roll No.' . $row["rollno"] . ' : '.  $row["student_name"] . '</option>';
	echo $str;
}

//$str = '</select>';
//echo $str;
?>