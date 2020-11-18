<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
//include 'security.php';



$secid=$_REQUEST['secid'];


$query="select smt.student_id,concat(smt.first_name,' ' ,ifnull(smt.middle_name,''),' ', ifnull(smt.last_name,''))  as student_name,smt.sms_contact_no,smt.whatsapp_contact_no,smt.student_id from student_master_table smt,student_class_details scd where smt.student_id=scd.student_id and scd.class_sec_id=" . $secid . " and scd.session='" . $_SESSION["SESSION"] . "' and scd.enabled=1 and scd.school_id=" . $_SESSION["SCHOOLID"] . ' order by roll_no';


//echo $query;


$result=$dbhandle->query($query);
$x=array();
//$x=var_dump($result);
//echo $x;
$str='<div class="table-responsive">
<table class="table table-striped">
<thead>
    <tr>
        <th class="pt-3 pb-3"> 
            <div class="form-check">
                <input type="checkbox" class="form-check-input checkAll">
                <label class="form-check-label text-white">Select Individuals</label>
            </div>
        </th>
    </tr>
</thead>
<tbody class="top-position-ss2">';

$label_colour_flag=1;
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
        <input type="checkbox" class="form-check-input" name="groupsms" value="' . $row["sms_contact_no"] . ';' . $row["whatsapp_contact_no"] . ";" . $row["student_id"] . ';1;' . $row["student_name"] . '" label="' . $row["student_name"] . '">
            <label ' . (($label_colour_flag%2)==0 ? 'class="form-check-label">' : '>') . $row["student_name"] . '</label>
        </div>
    </td>
</tr>
<tr>';
$label_colour_flag++;

}	
/*    
$str=$str . ' <tr>
    <td>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="groupsms" value="static_value">
            <label class="form-check-label">Static Data</label>
        </div>
    </td>
</tr>
<tr>';
*/
	$str = $str . ' </tbody>
	</table></div>';
	//echo $query. ' '.$str;
	echo $str;


?>