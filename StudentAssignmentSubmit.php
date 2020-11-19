<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "View & Upload Assignment";
$bodyHeader = "Assignments List";
require_once './includes/header.php';
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';
$subjectDropdownValue = "";
$sqlSub = 'SELECT * FROM `subject_master_table` WHERE `School_Id` = ' . $_SESSION['SCHOOLID'] . ' AND `Enabled` = 1 ORDER BY `Subject_Name`';
$resultSub = mysqli_query($dbhandle, $sqlSub);
while ($rowSub = mysqli_fetch_assoc($resultSub)) {
  $subjectDropdownValue = '<option value="' . $rowSub["Subject_Id"] . '">' . $rowSub["Subject_Name"] . ' </option>' . $subjectDropdownValue;
}
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
              <div class="form-group aj-form-group">
                <label>Subject <span>*</span></label>
                <select class="select2" required="" id="subjectList">
                  <option value="">All </option>
                  <?php echo $subjectDropdownValue; ?>
                </select>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
              <div class="form-group aj-form-group monthgrp" style="display: none;">
                <label>Month</label>
                <select class="select2" required="" id="monthList">
                  <option value="">All </option>
                  <option value="">January </option>
                  <option value="">February </option>
                  <option value="">March </option>
                  <option value="">April </option>
                  <option value="">May </option>
                  <option value="">June </option>
                  <option value="">July </option>
                  <option value="">August </option>
                </select>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2 assignment-list">
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-wrap-layout1">
      <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
  </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.hide-cl', function() {

      $(this).addClass('chang-togel');
      $(this).html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
      var add = $(this).attr('add')
      $('.content').removeClass('active')


      var par = $('.' + add).addClass('active');
    });
    $(document).on('click', '.chang-togel', function() {
      $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
      $('.content').removeClass('active')
      $('.chang-togel').removeClass('chang-togel')
    });
    
    $('#subjectList').change(function() {
      $('.monthgrp').fadeIn('slow');
    });

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

    $(document).on('change', '#monthList', function() {
      const monthNumber = $(this).val();
      const subjectId = $('#subjectList').val();
      $.ajax({
        url: './StudentAssignmentSubmit_1.php',
        method: 'get',
        data: {
          'filterAssignment': 1,
          'monthNumber': monthNumber,
          'subjectId': subjectId
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