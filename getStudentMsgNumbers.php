<?php
session_start();
include 'dbhandle.php';
include 'error_log.php';
//include 'security.php';



$secid=$_REQUEST['secid'];


$query="select student_name,sms_mob_no,smt.student_id from student_master_table smt,student_class_details scd where smt.student_id=scd.student_id and scd.class_sec_id=" . $secid . " and scd.session='" . $_SESSION["SESSION"] . "' and scd.enabled=1 and scd.school_id=" . $_SESSION["SCHOOLID"] . ' order by rollno';


//echo $query;


$result=mysqli_query($dbhandle,$query);

$str='<div class="table-responsive"><table class="table display data-table text-nowrap dataTable no-footer">
<thead>
	<tr>
		<th> <label>Select Individuals</label>
			<!--div class="form-check">
				<input type="checkbox" class="form-check-input checkAll">
				<label class="form-check-label">Select All</label>
			</div-->
		</th>	
	</tr>
</thead>
<tbody>';


while($row=mysqli_fetch_assoc($result))
{


    $str= $str .  '<tr><td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="mobileno[]" value="' . $row["sms_mob_no"] . '-' . $row["student_id"] . '">
                            <label class="form-check-label">' . $row["student_name"] . '</label>
                            </div>
                        </td></tr>';


}	
	$str = $str . ' </tbody>
	</table></div>';
	echo $str;


?>