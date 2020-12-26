<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Add Vehicle";
$bodyHeader = "Transport Add Vehicle";
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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="vehicle_driver_add_form" >
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_driver">
                <input type="text" autofill="none" style="display: none;" name="vehicle_route_adder" autocomplete="off">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Vehicle No <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 load_vehicles" name="vehicle_no" id="search_by" name="schoolSession">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div>  
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Vehicle Driver <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 driver_name" name="driver_name" id="search_by" name="schoolSession">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div> 
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Driver</button>
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
                            <th>Driver</th>
                            <th>Action</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                          <tbody class="load_drivers">
                            <tr>
                              <td scope="row"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                          <tr>
                            <th colspan="2"><span class="text-success">A = Active</span></th>
                            <th colspan="2"><span class="text-danger">D = Deleted</span></th>
                          </tr>
                      </table>
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
    display_driver();

    function display_driver() {
      var driver_html = '<option value="0">Select Driver</option>';
      var driver_url = './Transport_1.php?get_drivers=1';
      $.getJSON(driver_url, function(route_resp) {
        $.each(route_resp, function(key, value) {
          if (value.Enabled == 1) {
            driver_html += '<option value="' + value.Driver_Id + '">' + value.Staff_Name + '</option>';
          }
        });
        $('.driver_name').html(driver_html);
      });
    }

    $(document).on('submit', '#vehicle_driver_add_form ', function(event) {
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

    display_vehicles();

    function display_vehicles() {
      var vehicle_html = '<option value="0">Select Vehicle</option>';
      var stoppage_url = './Transport_1.php?get_vehicles=1';
      $.getJSON(stoppage_url, function(stoppage_resp) {
        $.each(stoppage_resp, function(key, value) {
          if (value.Enabled == 1) {
            vehicle_html += '<option value="'+value.Vehicle_Id +'">'+value.Vehicle_Reg_No +'</option>';
          }
        });
        $('.load_vehicles').html(vehicle_html);
      });
    }

    display_veh_drivers();
    function display_veh_drivers(){
      const driver_url = './Transport_1.php?get_vehicle_drivers=1';
      var driver_html = '';
      $.getJSON(driver_url, function(driver_resp) {
        $.each(driver_resp, function(key, value) {
          if (value.Enabled == 1) {
            status = '<span class="text-success">A</span>';
          } else if (value.Enabled == 0) {
            status = '<span class="text-danger">D</span>';
          }
          driver_html += '<tr><td  scope="row">' + value.Vehicle_Reg_No + '</td><td>' + value.Staff_Name + '</td><td><button class="btn btn-warning btn_edit" id="' + value.TVDT_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="' + value.TVDT_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>' + status + '</td></tr>';
        });
        $('.load_drivers').html(driver_html);
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>
