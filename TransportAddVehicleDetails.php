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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="vehicle_add_form" >
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_vehicle">
                <input type="text" autofill="none" style="display: none;" name="vehicle_sender" autocomplete="off">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Vehicle No <span>*</span></label>
                    <input type="text" name="vehicle_no" id="pick_up_name" class="form-control" required>
                  </div>
                </div>  
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Vehicle Reg. No</label>
                    <input type="text" name="vehicle_reg_no" id="pick_up_name" class="form-control" required>
                  </div>
                </div>   
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Vehicle Type <span>*</span></label>
                    <input type="text" name="vehicle_type" id="pick_up_name" class="form-control" required>
                  </div>
                </div>  
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Vehicle Capacity</label>
                    <input type="number" name="vehicle_capaity" id="pick_up_name" class="form-control" required>
                  </div>
                </div>     
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Vehicle Route<span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 route_name" name="route_name" id="search_by" name="schoolSession">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div>                                                           
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>IMEI No</label>
                    <input type="number" name="vehicle_imei" id="pick_up_name" class="form-control" required>
                  </div>
                </div> 
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>SIM No</label>
                    <input type="number" name="vehicle_sim" id="pick_up_name" class="form-control" required>
                  </div>
                </div>                 
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Vehicle</button>
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
                            <th>Registration No`</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Route</th>
                            <th>IMEI</th>
                            <th>SIM</th>
                            <th>Action</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                          <tbody class="load_vehicles">
                          </tbody>
                          <tr>
                            <th colspan="2"><span class="text-success">A = Active</span></th>
                            <th colspan="3"><span class="text-danger">D = Deleted</span></th>
                          </tr>                          
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
    display_routes();

    function display_routes() {
      var route_html = '<option value="0">Select Route</option>';
      var route_url = './Transport_1.php?get_routes=1';
      $.getJSON(route_url, function(driver_resp) {
        $.each(driver_resp, function(key, value) {
          if (value.Enabled == 1) {
            route_html += '<option value="' + value.Route_Id + '">' + value.Route_Name + '</option>';
          }
        });
        $('.route_name').html(route_html);
      });
    }

    $(document).on('submit', '#vehicle_add_form ', function(event) {
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
      var stoppage_html = '';
      var stoppage_url = './Transport_1.php?get_vehicles=1';
      $.getJSON(stoppage_url, function(stoppage_resp) {
        $.each(stoppage_resp, function(key, value) {
          if (value.Enabled == 1) {
            status = '<span class="text-success">A</span>';
          } else if (value.Enabled == 0) {
            status = '<span class="text-danger">D</span>';
          }
          if (value.Is_Enabled == 1) {
            status_enb = '<span class="text-success">Enabled</span>';
          } else if (value.Is_Enabled == 0) {
            status_enb = '<span class="text-danger">Disabled</span>';
          }
          stoppage_html += '<tr><td  scope="row">' + value.Vehicle_Reg_No + '</td><td>' + value.Vehicle_Type + '</td><td>' + value.Vehicle_Capacity  + '</td><td>' + value.Route_Name + '</td><td>' + value.IMEI_No + '</td></td><td>' + value.SIM_No + '</td></td><td><button class="btn btn-warning btn_edit" id="' + value.TRCT_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="' + value.TRCT_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>' + status + '</td></tr>';
        });
        $('.load_vehicles').html(stoppage_html);
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>
