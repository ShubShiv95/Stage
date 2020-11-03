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
   
    $deptcat = $_REQUEST["deptcat"];
    $deptname = $_REQUEST["deptname"];
    $deptremark = $_REQUEST["deptremark"];
    $enabled = 1;
	
	$created_on =  date("Y-m-d H:i:s");
    
    $deptCountSql = "Select count(Dept_Id) as deptno from department_master_table where school_id=" . $schoolId. "  and Enabled=1";
    $deptCountSqlResult = $dbhandle->query($deptCountSql);

    $temp[] = $deptCountSqlResult;

    if($deptCountSqlResult)
		{
            $getdeptCountRow = $deptCountSqlResult -> fetch_assoc();
            $deptId = ($getdeptCountRow["deptno"] + 1);
		   
			
		}    

    $insertDeptTableSql = "insert into department_master_table
    (Dept_Id,
    Dept_Cat,
    Dept_Name,
    Remarks,
    Enabled,
    School_Id,
	Created_On,
    CREATED_BY) values(?,?,?,?,?,?,?,?)";
     

    //echo $insertDeptTableSql;
	//exit;
	

    $stmt=$dbhandle->prepare($insertDeptTableSql);
    echo $dbhandle->error;	
   
     
    $stmt->bind_param("isssiiss",   
    $deptId,
    $deptcat,
	$deptname,
    $deptremark,
    $enabled,
    $schoolId,
	$created_on,
	$lid
    
    );


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
    $el->write_log_message('Department  Add Form',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
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
$messsage='Department Saved.';
$str_end='</div>';
$_SESSION["successmsg"] = $str_start.$messsage.$str_end;
header("Location: AddDepartment.php");



?>