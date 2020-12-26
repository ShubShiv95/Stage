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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="vehicle_doc_add_form">
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_vehicle_document">
                <input type="text" name="vehicle_doc_adder" class="d-none" autocomplete="off">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Select Vehhicle <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 load_vehicles" name="vehicle_name" id="search_by">
                    </select>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Document Type <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4" id="search_by" name="vehicle_document">
                      <option value="0">Select Document</option>
                      <option value="Insurance">Insurance</option>
                      <option value="RC">RC</option>
                      <option value="Fitness">Fitness</option>
                      <option value="Pollution">Pollution</option>
                      <option value="Permit">Permit</option>
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
              <div class="row assignment-list table-responsive">
                <table class="table table-striped table-inverse">
                  <thead class="thead-inverse">
                    <tr>
                      <th>Vehicle</th>
                      <th>Doc Name</th>
                      <th>Validity</th>
                    </tr>
                    </thead>
                    <tbody class="load_docs">
                      <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                </table>
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
    display_vehicles();

    function display_vehicles() {
      var vehicle_html = '<option value="0">Select Vehicle</option>';
      var stoppage_url = './Transport_1.php?get_vehicles=1';
      $.getJSON(stoppage_url, function(stoppage_resp) {
        $.each(stoppage_resp, function(key, value) {
          if (value.Enabled == 1) {
            vehicle_html += '<option value="' + value.Vehicle_Id + '">' + value.Vehicle_Reg_No + '</option>';
          }
        });
        $('.load_vehicles').html(vehicle_html);
      });
    }

    $(document).on('submit', '#vehicle_doc_add_form ', function(event) {
      event.preventDefault();
      post_data = $(this).serialize();
      $.post($(this).attr('action'), post_data, function(form_output) {
        $('.formoutput').html(form_output);
        display_routes_fee();
        window.setTimeout(function() {
          $('.formoutput').html('');
        }, 3000)
      });
    });  

    function load_veh_doc(){
      var doc_html = '<option value="0">Select Vehicle</option>';
      var doc_url = './Transport_1.php?get_vehicle_docs=1';
      $.getJSON(doc_url, function(doc_resp) {
        $.each(doc_resp, function(key, value) {
          if (value.Enabled == 1) {
            status = '<span class="text-success">A</span>';
          } else if (value.Enabled == 0) {
            status = '<span class="text-danger">D</span>';
          }
          doc_html += '<tr><td  scope="row">' + value.Vehicle_Reg_No + '</td><td>' + value.Staff_Name + '</td><td><button class="btn btn-warning btn_edit" id="' + value.TVDT_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="' + value.TVDT_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>' + status + '</td></tr>';          
        });
        $('.load_docs').html(doc_html);
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>