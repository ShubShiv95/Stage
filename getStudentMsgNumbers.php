<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
//include 'security.php';



$secid=$_REQUEST['secid'];


$query="select smt.student_id,smt.first_name,smt.middle_name,smt.last_name,smt.sms_contact_no,smt.whatsapp_contact_no,smt.student_id from student_master_table smt,student_class_details scd where smt.student_id=scd.student_id and scd.class_sec_id=" . $secid . " and scd.session='" . $_SESSION["SESSION"] . "' and scd.enabled=1 and scd.school_id=" . $_SESSION["SCHOOLID"] . ' order by rollno';


//echo $query;


$result=mysqli_query($dbhandle,$query);

$str=' <table class="table table-striped">
	<thead>
		<tr>
			<th class="pt-3 pb-3"> 
				<div class=""  style="text-align:center;">
					<label class="form-check-label text-white">Select Individuals</label>
				</div>
			</th>
		</tr>
	</thead>
	<tbody class="top-position-ss3">';


while($row=mysqli_fetch_assoc($result))
{

	$student_name=$row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"];
    $str= $str .  '<tr><td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="mobileno[]" value="' . $row["sms_contact_no"] . ';' . $row["whatsapp_contact_no"] . ";" . $row["student_id"] . '">
                            <label class="form-check-label">' . $student_name . '</label>
                            </div>
                        </td></tr>';


}	
	$str = $str . ' </tbody>
	</table>';
	echo $str;


?>