<?php
    session_start();
    include 'dbobj.php';
    include 'security.php';
    include 'errorLog.php';   
    //include 'generate_sequence.php';


    // Turn on all error reporting
    // Report all PHP errors (see changelog)
    error_reporting(E_ALL);
    //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
    ini_set('display_errors', 1);

    //starts here
    $lid=$_SESSION["LOGINID"];
    $schoolId=$_SESSION["SCHOOLID"];
   
    $staf_name = $_REQUEST["staf_name"];
    $staf_Gender = $_REQUEST["staf_Gender"];
    $staf_phone = $_REQUEST["staf_phone"];
    $staf_email = $_REQUEST["staf_email"];
    $staf_category = $_REQUEST["staf_category"];
    $staf_department = $_REQUEST["staf_department"];
    $staf_designation = $_REQUEST["staf_designation"];
    $staf_alternate_con = $_REQUEST["staf_alternate_con"];
    $staf_address = $_REQUEST["staf_address"];
    $staf_city = $_REQUEST["staf_city"];
    $staf_state = $_REQUEST["staf_state"];
    $staf_district = $_REQUEST["staf_district"];
    $staf_father_name = $_REQUEST["staf_father_name"];
    $staf_dob = $_REQUEST["staf_dob"];
    $staf_blood_group = $_REQUEST["staf_blood_group"];
    $staf_qualification = $_REQUEST["staf_qualification"];
    $staf_experience = $_REQUEST["staf_experience"];
    $staf_doj = $_REQUEST["staf_doj"];
    $staf_job_ststus = $_REQUEST["staf_job_ststus"];
    $staf_bank_acc = $_REQUEST["staf_bank_acc"];
    $staf_bank_name = $_REQUEST["staf_bank_name"];
    $staf_bank_branch = $_REQUEST["staf_bank_branch"];
    $staf_ifsc = $_REQUEST["staf_ifsc"];
    $staf_pan_card = $_REQUEST["staf_pan_card"];
    $staf_aadhar_no = $_REQUEST["staf_aadhar_no"];
    $staf_uan_no = $_REQUEST["staf_uan_no"];
    $staf_pf_acc = $_REQUEST["staf_pf_acc"];
    $staf_esi = $_REQUEST["staf_esi"];
    $staf_login = $_REQUEST["staf_login"];
    
    $enabled = 1;
	
	$created_on =  date("Y-m-d H:i:s");
    
    $staffCountSql = "Select count(Staff_Id) as staffno from staff_master_table";
    $staffCountSqlResult = $dbhandle->query($staffCountSql);

    $temp[] = $staffCountSqlResult;

    if($staffCountSqlResult)
		{
            $getstaffCountRow = $staffCountSqlResult -> fetch_assoc();
            $staffId = ($getstaffCountRow["staffno"] + 1);
		   
			
		}    

    $insertStaffTableSql = "insert into staff_master_table
    (Staff_Id,
    Staff_Name,
    Gender,
    Contact_No,
    Category,
    Department,
	Designation_Id,
	Alt_Contact_No,
	Address,
	City,
	District,
	State,
	Fathers_Or_Husband_Name,
	DOB,
	Blood_Group,
	Qualification,
	Experience,
	DOJ,
	Job_Status,
	Bank_Account_No,
	Bank_Name,
	Bank_Branch,
	Bank_IFSC,
	PAN_No,
	Aadhar_No,
	UAN_No,
	PF_Acc_No,
	ESI_Acc_No) values(?,?,?,?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?,?,?)";
  
	

    $stmt=$dbhandle->prepare($insertStaffTableSql);
    echo $dbhandle->error;	
   
     
    $stmt->bind_param("issssiisssssssssssssssssssss",   
    $staffId,
    $staf_name,
	$staf_Gender,
    $staf_phone,
	$staf_category,
	$staf_department,
	$staf_designation,
	$staf_alternate_con,
	$staf_address,
	$staf_city,
	$staf_district,
	$staf_state,
	$staf_father_name,
	$staf_dob,
	$staf_blood_group,
	$staf_qualification,
	$staf_experience,
	$staf_doj,
	$staf_bank_acc,
	$staf_job_ststus,
	$staf_bank_name,
	$staf_bank_branch,
	$staf_ifsc,
	$staf_pan_card,
	$staf_aadhar_no,
	$staf_uan_no,
	$staf_pf_acc,
	$staf_esi);


   $execResult=$stmt->execute();
   
    echo $dbhandle->error;
    $stmt->close();

if(!$execResult)
{
    //var_dump($getStudentCount_result);
    //$error_msg=mysqli_error($dbhandle);
    $error_msg = $dbhandle->error;
    $sql="";
    $el=new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Staff Add Form',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    $messsage='Error: Staff Not Saved.  Please consult application consultant.';
    $str_end='</div>';
    echo $str_start.$messsage.$str_end;
    die;
    //echo "";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
    
}

$str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
$messsage='Staff Saved.';
$str_end='</div>';
$_SESSION["successmsg"] = $str_start.$messsage.$str_end;
header("Location: AddStaff.php");



?>