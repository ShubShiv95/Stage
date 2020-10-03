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
    $admission_Id = $_REQUEST["admission_Id"];

    $selectAdmissionSql = "Select * From admission_master_table Where Admission_Id = ?";
    $stmt=$dbhandle->prepare($selectAdmissionSql);
    $stmt->bind_param("i", $admission_Id);

    //echo $admission_Id;

    $execResult=$stmt->execute();
    //echo $execResult . '<br>'; 
    echo $dbhandle->error;
    //

if(!$execResult)
{
    //var_dump($getStudentCount_result);
    $error_msg=mysqli_error($dbhandle);
    $sql="";
    //$el=new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    //$el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    $message='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    $str_end='</div>';
    echo $str_start.$message.$str_end;
    die;
    //echo "";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
    
}

$message='Resultset = ';
$execResult=$stmt->execute();
$result = $stmt->get_result();
//echo $result;
$rows = [];
$row = $result->fetch_assoc();
$rows[] = $row;

 //$row['First_Name']
 //$htmlbody  = $rows;
echo $row[0] ;
$stmt->close();

?>