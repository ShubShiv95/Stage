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
   
    //$deptcat = $_REQUEST["deptcat"];
    $deptname = $_REQUEST["deptname"];
    $deptremark = $_REQUEST["deptremark"];
	
    $deptid=$_REQUEST["deptid"];
	

    
	
	$updateDeptTableSql = "UPDATE department_master_table SET Dept_Name=?, Remarks=? WHERE Dept_Id=?";
    
	$updateDeptTable_stmt=$dbhandle->prepare($updateDeptTableSql);
    echo $dbhandle->error;	
   
     
    $updateDeptTable_stmt->bind_param("ssi",   
	$deptname,
    $deptremark,
    $deptid
    );


   $updateDeptTable_stmt_result=$updateDeptTable_stmt->execute(); 
   //echo "Updated {$updateDeptTable_stmt->affected_rows} rows";
   
    echo $dbhandle->error;
    $updateDeptTable_stmt->close();

if(!$updateDeptTable_stmt_result)
{
    //var_dump($getStudentCount_result);
    //$error_msg=mysqli_error($dbhandle);
    $error_msg = $dbhandle->error;
    $sql="";
    $el=new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Department  Update Form',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    $messsage='Error: Separtment Not Saved.  Please consult application consultant.';
    $str_end='</div>';
    echo $str_start.$messsage.$str_end;
    die;
    //echo "";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
    
}

$str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
$messsage='Department Updated.';
$str_end='</div>';
$_SESSION["successmsg"] = $str_start.$messsage.$str_end;
header("Location: EditDepartment.php?deptid=".$deptid."");



?>