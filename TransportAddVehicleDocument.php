<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Add Vehicle Document";
$bodyHeader = "Transport Add Vehicle Document";
require_once './includes/header.php';
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3 col-12">
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="driver_form">
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_vehicle_document">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Select Vehhicle <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4" name="search_by" id="search_by" name="schoolSession">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Document Type <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4" name="search_by" id="search_by" name="schoolSession">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Document</label>
                    <input type="file" name="license_no" id="route_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label class="mb-4">Is Validity Applicable</label>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group ml-4">
                    <input type="checkbox" name="license_no" id="route_name" class="float-center mb-4" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2">
                  <div class="form-group aj-form-group submission_field">
                    <label id="lab_sub">Valid Till <span>*</span></label>
                    <input type="text" name="date_of_submision" id="date_from" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                    <i class="far fa-calendar-alt"></i>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Vehicle Document</button>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3 formoutput">

                </div>
              </form>
            </div>

            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2">
              <div class="row assignment-list">

              </div>
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

  });
</script>
<?php
require_once './includes/closebody.php';
?>