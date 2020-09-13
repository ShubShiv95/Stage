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

//echo "Welcome " . $_REQUEST["sname"]. " Your enquiry details has been saved successfully";

$sname=$_REQUEST["sname"];
$enqname=$_REQUEST["enqname"];
$enqrel=$_REQUEST["enqrel"];
$contactno=$_REQUEST["contactno"];
$email=$_REQUEST["email"];
$locality=$_REQUEST["locality"];
$classno=$_REQUEST["classno"];
$session=$_REQUEST["session"];
$lsource=$_REQUEST["lsource"];
//echo $_REQUEST["fdate"];
//$fdate="str_to_date('" . $_REQUEST["fdate"] . "','%d/%m/%Y')";
$fdate=$_REQUEST["fdate"];
//echo $fdate;
//$enqstatus=$_REQUEST["enqstatus"];
$remarks=$_REQUEST["remarks"];
if($_REQUEST["anysib"]=='YES')
{$sibid=$_REQUEST["sibid"];}
else
$sibid='';
$anysib=$_REQUEST["anysib"];
//$vmobno=$_REQUEST["vmobno"];
$vmobno='YES';
$votp=$_REQUEST["votp"];



$insertAdmissionEnquiry_sql="insert into admission_enquiry_table
    (STUDENT_NAME,
    ENQUIRER_NAME,
    ENQUIRER_RELATION,
    MOBILE_NO,
    EMAIL_ID,
    LOCALITY_ID,
    CLASS_ID,
    SESSION,
    LEAD_ID,
    FOLLOWUP_DATE,
    SIBLING, 
    REMARKS,
    ENQUIRY_STATUS,
    MOBILE_VERIFIED,
    CREATED_BY,
    SCHOOL_ID) values(?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,'PENDING',?,?,?)";
    $lid=$_SESSION["LOGINID"];
    $sid=$_SESSION["SCHOOLID"];

//echo $insertAdmissionEnquiry_sql;

$stmt=$dbhandle->prepare($insertAdmissionEnquiry_sql);
echo $dbhandle->error;	
$stmt->bind_param('sssssiisisssisi',
    $sname,
    $enqname,
    $enqrel,
    $contactno,
    $email,
    $locality,
    $classno,
    $session,
    $lsource,
    $fdate,
    $anysib,
    $remarks,
    $votp,
    $lid,
    $sid);


    $execResult=$stmt->execute();
    //echo $dbhandle->error;
    $stmt->close();

if(!$execResult)
{
    //var_dump($getStudentCount_result);
    $error_msg=mysqli_error($dbhandle);
    $sql="";
    $el=new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    $str_end='</div>';
    echo $str_start.$messsage.$str_end;
    die;
    //echo "";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
    
}

$str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
$messsage='Enquiry Saved.';
$str_end='</div>';
echo $str_start.$messsage.$str_end;


?>