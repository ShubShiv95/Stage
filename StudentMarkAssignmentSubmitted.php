<?php
session_start();
include 'dbobj.php';
//include 'errorLog.php';
//include 'security.php';
/*make a variable named $pageTitle */
$pageTitle = "Submitted Assignment";
error_reporting(0);
$subjectDropdownValue = "";
$sqlSub = 'SELECT * FROM `subject_master_table` WHERE `School_Id` = ' . $_SESSION['SCHOOLID'] . ' AND `Enabled` = 1 ORDER BY `Subject_Name`';

$resultSub = mysqli_query($dbhandle, $sqlSub);
while ($rowSub = mysqli_fetch_assoc($resultSub)) {
  $subjectDropdownValue = '<option value="' . $rowSub["Subject_Id"] . '">' . $rowSub["Subject_Name"] . ' </option>' . $subjectDropdownValue;
}
?>
<?php require_once './includes/header.php'; ?>
<!-- start your UI here -->
<div class="col-md-12 loadSData">
  <iframe src="./markVerifyAssignment.php?assignmentId=<?php echo $_GET['assignmentId'] ?>&userId=<?php echo $_GET['userId'] ?>&totalPages=<?php echo $_GET['totalPages']; ?>" width="70%" style="height: 100vh;" frameborder="0"></iframe>
</div>
<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->

<?php
require_once './includes/closebody.php';
?>
