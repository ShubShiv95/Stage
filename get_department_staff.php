<?php
session_start();
include 'dbhandle.php';
include 'error_log.php';
include 'security.php';


$department=NULL;
$deptid=$_REQUEST["deptid"];
if($deptid==-1){
	$department='dept.department_id in (select deptn.department_id from department_master_table as deptn)';
}
if($deptid>0){
	$department='dept.department_id=' . $deptid;
}


$query="select employee_name,employee_id,mob_number,department_name from employee_master_table emp,department_master_table dept where " . $department . " and dept.department_id=emp.department_id and emp.enabled=1 and emp.school_id=" . $_SESSION["SCHOOLID"] . ' order by department_name,employee_name';


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
$prev_dept_name='';  
$next_dept_name='';  

while($row=mysqli_fetch_assoc($result))
{


	if($next_dept_name!=$row["department_name"]){
		$prev_dept_name=$next_dept_name;
		$next_dept_name=$row["department_name"];
		$str=$str . '<tr>    
		<td>
			<div>
			 
				<label><B>' . $row["department_name"] .' Department</B></label>
			</div>
		</td>
		
  
	</tr>';
		
	}
	

	$str= $str .  '<tr><td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="mobileno[]" value="' . $row["mob_number"] . '-' $row["employee_id"] .  '">
							<label class="form-check-label">' . $row["employee_name"] . '</label>
                            </div>
                        </td></tr>';


}	
	$str = $str . ' </tbody>
	</table></div>';
	echo $str;


?>