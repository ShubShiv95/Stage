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
    $class = $_REQUEST["class"];
    $session = $_REQUEST["session"];
    $is_admitted = 'NO';
    $admission_id = $_REQUEST['admission_id'];
    if (!empty($admission_id)) {
        $selectAdmissionSql = "Select Admission_Id, First_Name, Last_Name, Gender, date_format(DOB,'%d/%m/%Y') as DOB, Father_Name, Mother_Name, Guardian_Name From admission_master_table Where Admission_Id  = ? and Session = ? AND Is_Admited =? ";
        $stmt=$dbhandle->prepare($selectAdmissionSql);
        $stmt->bind_param("iis", $admission_id, $session,$is_admitted);
    }elseif (!empty($class)) {
        $selectAdmissionSql = "Select Admission_Id, First_Name, Last_Name, Gender, date_format(DOB,'%d/%m/%Y') as DOB, Father_Name, Mother_Name, Guardian_Name From admission_master_table Where Class_Id = ? and Session = ? AND Is_Admited =? ";
        $stmt=$dbhandle->prepare($selectAdmissionSql);
        $stmt->bind_param("iis", $class, $session,$is_admitted);
    }

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

$str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
$message='Resultset = ';
$execResult=$stmt->execute();
$result = $stmt->get_result();
//echo $result;

$htmlbody = '<div class="table-responsive"><table class="table table-bordered text-capitalize"><thead><tr><th>Admission Id</th><th>First Name</th><th>Last Name </th><th>Gender</th><th>DOB</th><th>Father Name </th><th>Mother Name</th><th>Guardian Name</th><th>Select Actions</th></tr></thead>';
$htmlbody = $htmlbody . '<tbody>';
while ($row = $result->fetch_assoc()) {
      $htmlbody = $htmlbody . '<tr>';
      $htmlbody = $htmlbody . '<td>' . $row['Admission_Id'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['First_Name'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['Last_Name'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['Gender'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['DOB'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['Father_Name'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['Mother_Name'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . $row['Guardian_Name'] . '</td>';
      $htmlbody = $htmlbody . '<td>' . '<a href="AdmissionView.php?admission_Id=' . $row['Admission_Id'] . '"> Edit </a>'  . '/' . '<a href="#" id=""> View </a> / <a href="./ConfirmAdmission.php?adminssion_id='.$row['Admission_Id'].'" id="" target="_new"> Enroll </a>'  . '</td>';
      $htmlbody = $htmlbody . '</tr>';
     //$message = $message . $row['First_Name'] ."<br>";
}
$htmlbody = $htmlbody . '</tbody></table></div>';
echo $htmlbody ;
$stmt->close();

?>
