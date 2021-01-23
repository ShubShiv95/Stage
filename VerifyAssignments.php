<?php
session_start();
$pageTitle = "Verify Assignment";
error_reporting(0);
?>
<?php require_once './includes/header.php'; require_once './includes/navbar.php'; ?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="container row new-added-form school-form aj-new-added-form">
    <div class="col-md-4 aj-mb-2">
      <div class="form-group aj-form-group">
        <label>Subject <span>*</span></label>
        <select class="select2 col-12" required="" id="subjectList">

        </select>
      </div>
    </div>
    <div class="col-md-4 aj-mb-2">
      <div class="form-group aj-form-group monthdiv">
        <label>Month</label>
        <select class="select2 col-12" required="" id="monthList">
          <option value="0">Select One </option>
          <option value="1">January </option>
          <option value="2">February </option>
          <option value="3">March </option>
          <option value="4">April </option>
          <option value="5">May </option>
          <option value="6">June </option>
          <option value="7">July </option>
          <option value="8">August </option>
          <option value="9">September </option>
          <option value="10">October </option>
          <option value="11">November </option>
          <option value="12">December </option>
        </select>
      </div>
    </div>
    <div class="col-md-4 aj-md-2">
        <button class="btn btn-warning mt-5" id="searchData"><i class="fas fa-search"></i> Search</button>
    </div>
    <div class="col-md-12 assignment-list mt-3"></div>
  </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">
  $(document).ready(function() {

    $(document).on('click','#searchData',function(){
      var monthName = $('#monthList').val();
      var subjectName = $('#subjectList').val();
      if (subjectName == '') {
        alert("Please Select Subject")
      }
      else if(monthName == ''){
        alert("Please Select Month");
      }
      else{
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
      }
    });

    /*
      1. to fetch data from subject table just copy code from below functions.
      2. keep object id as assignment_subject
    */
    getAllSubjects();

    function getAllSubjects() {
      $.ajax({
        url: './universal_apis.php',
        type: 'get',
        data: {
          'getAllSubjects': 1
        },
        dataType: 'json',
        success: function(data) {
          var subjectData = JSON.parse(JSON.stringify(data));
          var html = '<option value="">Select Subject</option>';
          for (let i = 0; i < subjectData.length; i++) {
            const subjectRow = subjectData[i];
            html += '<option value="' + subjectRow.Subject_Id + '">' + subjectRow.Subject_Name + '</option>';
          }
          $('#subjectList').html(html);
        }
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>