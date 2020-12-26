<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Send Message to Parent";
$bodyHeader = "Transport Send Message to Parent";
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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="student_assign_form">
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_asignee">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Class <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="search_by" id="search_by" name="schoolSession">
                        <option value="0">Select Bus</option>
                        <option value="1">Class</option>
                        <option value="2">Admission Id</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Total Students <span>*</span></label>
                      <input type="text" class="form-control" value="0" readonly>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                    <div class="form-group aj-form-group">
                      <label>Message</label>
                      <textarea class="aj-form-control" rows="4" id="" name="driver_remarks"></textarea>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                    <div class="form-group aj-form-group">
                      <label>Character Count</label>
                      <input type="text" class="form-control" value="0" readonly>
                    </div>
                  </div>                                                                           
                </div>
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Send Message</button>
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
