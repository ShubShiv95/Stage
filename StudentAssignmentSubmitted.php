<?php
$pageTitle = "Submitted Assignment";
require_once './includes/header.php';
include 'dbobj.php';
error_reporting(0);
$subjectDropdownValue = "";
$sqlSub = 'SELECT * FROM `subject_master_table` WHERE `School_Id` = ' . $_SESSION['SCHOOLID'] . ' AND `Enabled` = 1 ORDER BY `Subject_Name`';

$resultSub = mysqli_query($dbhandle, $sqlSub);
while ($rowSub = mysqli_fetch_assoc($resultSub)) {
  $subjectDropdownValue = '<option value="' . $rowSub["Subject_Id"] . '">' . $rowSub["Subject_Name"] . ' </option>' . $subjectDropdownValue;
}
  require_once './includes/navbar.php'; ?>
<!-- start your UI here -->
<div class="col-md-12 loadSData">

</div>
<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">
  $(document).ready(function() {

    get_submited_assignment();
    function get_submited_assignment(){
      const assignmentId = "<?php echo $_GET['assignmentId']; ?>";
      $.ajax({
        url : './StudentAssignmentSubmit_1.php',
        type : 'get',
        data : {'getSubmittedAsignment':1,'assignmentId':assignmentId},
        dataType : 'json',
        success : function(response){
          submittedData = JSON.parse(JSON.stringify(response));
          var htmlTable = '<table class="table table-response"><tr><th>Name</th><th>Total Pages</th><th>Submitted On</th><th>View Pages</th></tr>';
          for (let i = 0; i < submittedData.length; i++) {
            const fetchedData = submittedData[i];
            htmlTable += '<tr><td>'+fetchedData.First_Name+' '+fetchedData.Last_Name+'</td><td>'+fetchedData.total_pages+'</td><td>'+fetchedData.Updated_On+'</td><td><a href="./StudentMarkAssignmentSubmitted.php?assignmentId='+fetchedData.Task_Id+'&userId='+fetchedData.Updated_By+'&totalPages='+fetchedData.total_pages+'" target="_blank" class="btn btn-link btn-primary text-primary"><i class="fas fa-eye"></i></a></td></tr>';
          }
          htmlTable += '</table>';
          $('.loadSData').html(htmlTable);
        }
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>
