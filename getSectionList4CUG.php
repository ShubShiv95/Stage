<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
//include 'security.php';


$query="select class_sec_id,section from class_section_table where class_id=" . $_REQUEST["classid"] . " and enabled=1 and school_id=" . $_SESSION["SCHOOLID"];
$result=mysqli_query($dbhandle,$query);
//echo var_dump($result);
//$str= '<label>Section *</label><select class="select2" name="secid" id="secid"  onchange="showstudent(this.value)"><option value="0">Select Section</option>';
$str= '<option value="0">Select Section</option>';

//echo $str;


while($row=mysqli_fetch_assoc($result))
{
	$str= $str . '<option value="' . $row["class_sec_id"] . '">' . $row["section"] . '</option>';
	//echo $str;
}
echo $str;
//$str = '</select>';
//echo $str;
?>