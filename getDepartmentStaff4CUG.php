<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';


$department=NULL;
$deptid=$_REQUEST["deptid"];
if($deptid==0){
	$department='dept.dept_id in (select deptn.dept_id from department_master_table as deptn)';
}
if($deptid>0){
	$department='dept.dept_id=' . $deptid;
}


$query="select employee_name,employee_id,sms_contact_no,whatsapp_contact_no,dept_name from employee_master_table emp,department_master_table dept where " . $department . " and dept.dept_id=emp.dept_id and emp.enabled=1 and emp.school_id=" . $_SESSION["SCHOOLID"] . ' order by dept_name,employee_name';


//echo $query;


$result=mysqli_query($dbhandle,$query);

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
$prev_dept_name='';  
$next_dept_name='';  

while($row=mysqli_fetch_assoc($result))
{


	if($next_dept_name!=$row["dept_name"]){
		$prev_dept_name=$next_dept_name;
		$next_dept_name=$row["dept_name"];
		$str=$str . '<tr>    
		<td>
			<div>
			 
				<label class="form-check-label"><B>' . $row["dept_name"] .' Department</B></label>
			</div>
		</td>
		
  
	</tr>';
		
	}
	
/*
	$str= $str .  '<tr><td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="mobileno[]" value="' . $row["mob_number"] . '-' . $row["employee_id"] . ';SECTION" label="' . $row["employee_name"] . '">
							<label class="form-check-label">' . $row["employee_name"] . '</label>
                            </div>
                        </td></tr>';*/
    $str= $str .  ' <tr>
                        <td>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="groupsms" value="' . $row["sms_contact_no"] . ';' . $row["whatsapp_contact_no"] . ";" . $row["employee_id"] . ';2" label="' . $row["employee_name"] . '">
                                <label class="form-check-label">' . $row["employee_name"] . '</label>
                            </div>
                        </td>
                    </tr>
                    <tr>';

}	
	$str = $str . ' </tbody>
	</table></div>';
	echo $str;


?>