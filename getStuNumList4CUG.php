<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
//include 'security.php';



$secid=$_REQUEST['secid'];


$query="select smt.student_id,smt.student_name,smt.sms_number,smt.whatsapp_number,smt.student_id from student_master_table smt,student_class_details scd where smt.student_id=scd.student_id and scd.class_sec_id=" . $secid . " and scd.session='" . $_SESSION["SESSION"] . "' and scd.enabled=1 and scd.school_id=" . $_SESSION["SCHOOLID"] . ' order by rollno';


echo $query;


$result=$dbhandle->query($query);
$x=array();
$x=var_dump($result);
echo $x;
$str='<div class="table-responsive">
<table class="table display data-table text-nowrap">
    <thead>
        <tr>
            <th>
            <div class="form-check">
                    <input type="checkbox" class="form-check-input checkAll">
                    <label class="form-check-label">Select Individuals</label>
            </div>
            </th>
        </tr>
    </thead>
    <tbody>';


while($row=$result->fetch_assoc())
{


   /* $str= $str .  '<tr><td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="groupsms" value="' . $row["sms_number"] . ';' . $row["whatsapp_number"] . ";" . $row["student_id"] . ';SECTION">
                            <label class="form-check-label">' . $row["student_name"] . '</label>
                            </div>
                        </td></tr>';*/
    $str= $str .  ' <tr>
    <td>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="groupsms" value="' . $row["sms_number"] . ';' . $row["whatsapp_number"] . ";" . $row["student_id"] . ';SECTION" label="' . $row["student_name"] . '">
            <label class="form-check-label">' . $row["student_name"] . '</label>
        </div>
    </td>
</tr>
<tr>';


}	
    $str=$str . ' <tr>
    <td>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="groupsms" value="static_value">
            <label class="form-check-label">Static Data</label>
        </div>
    </td>
</tr>
<tr>';
	$str = $str . ' </tbody>
	</table></div>';
	//echo $query. ' '.$str;
	echo $str;


?>