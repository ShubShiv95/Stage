<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "View Submitted Assignment";
$bodyHeader = "Assignments List";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
              <div class="form-group aj-form-group">
                <label>Subject <span>*</span></label>
                <select class="select2 col-12" required="" id="subjectList">


                </select>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
              <div class="form-group aj-form-group monthgrp">
                <label>Month</label>
                <select class="select2 col-12" required="" id="monthList">
                  <option value="">Select Month </option>
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
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">

              <button class="btn btn-warning" id="searchBtn"><i class="fas fa-search"></i> Search</button>
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
      $('.content').removeClass('active');
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
    $(document).on('click', '#searchBtn', function() {
      const monthNumber = $('#monthList').val();
      const subjectId = $('#subjectList').val();
      if (subjectId == '') {
        alert("Please Select Subject");
      } else if (monthNumber == '') {
        alert("Please Select Month")
      } else {
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