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
   
    $desi_department = $_REQUEST["desi_department"];
    $desi_designation = $_REQUEST["desi_designation"];
    $desi_remarks = $_REQUEST["desi_remarks"];
    $enabled = 1;
	
	$created_on =  date("Y-m-d H:i:s");
    
    $desiCountSql = "Select count(Desig_Id) as desino from designation_master_table where School_Id=" . $schoolId. "  and Enabled=1";
    $desiCountSqlResult = $dbhandle->query($desiCountSql);

    $temp[] = $desiCountSqlResult;

    if($desiCountSqlResult)
		{
            $getdesiCountRow = $desiCountSqlResult -> fetch_assoc();
            $desiId = ($getdesiCountRow["desino"] + 1);
		   
			
		}    

    $insertDescTableSql = "insert into designation_master_table
    (Desig_Id,
    Designation,
    Remarks,
    Dept_Id,
    School_Id,
    Enabled,
	Created_By,
    Created_On) values(?,?,?,?,?,?,?,?)";
  
	

    $stmt=$dbhandle->prepare($insertDescTableSql);
    echo $dbhandle->error;	
   
     
    $stmt->bind_param("issiiiss",   
    $desiId,
    $desi_designation,
	$desi_remarks,
    $desi_department,
	$schoolId,
    $enabled,
    $lid,
	$created_on
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
    $el->write_log_message('Designation  Add Form',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
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
$messsage='Designation Saved.';
$str_end='</div>';
$_SESSION["successmsg"] = $str_start.$messsage.$str_end;
header("Location: AddDesignation.php");



?>