<?php
session_start();
include 'dbobj.php';
//include 'errorLog.php';
//include 'security.php';
/*make a variable named $pageTitle */
$pageTitle = "Verify Assignment";
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
<div class="col-md-12">
  <div class="container row">
    <div class="col-md-3 aj-md-2">
      <div class="form-group aj-form-group">
        <label>Subject <span>*</span></label>
        <select class="select2" required="" id="subjectList">
          <option value="">All </option>
          <?php echo $subjectDropdownValue; ?>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group aj-form-group monthdiv" style="display: none;">
        <label>Month</label>
        <select class="select2" required="" id="monthList" >
          <option value="">All </option>
        </select>
      </div>
    </div>
    <div class="col-md-12 assignment-list mt-3"></div>
  </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">

  $(document).ready(function() {
    
    loadMOnths();
    function loadMOnths() {
      $.ajax({
        url: './CreateNewAssignments_1.php',
        method: 'get',
        data: {
          'getMonths': 1
        },
        success: function(data) {
          $('#monthList').html(data);
        }
      });
    }

    $('#subjectList').change(function(){
      $('.monthdiv').show();
    });

    $(document).on('change','#monthList',function(){
      var monthName = $(this).val();
      var subjectName = $('#subjectList').val();
      $.ajax({
        url: './StudentAssignmentSubmit_1.php',
        method: 'get',
        data: {
          'filterAssignmentSubmit': 1,
          'monthName': monthName,
          'subjectName': subjectName
        },
        success: function(data) {
          $('.assignment-list').html(data);
        }
      });
    });
  });
</script>
<?php
require_once './includes/closebody.php';
?>