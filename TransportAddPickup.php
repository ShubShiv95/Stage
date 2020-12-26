<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Stoppages";
$bodyHeader = "Transport Add Stoppages";
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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="route_pick_form">
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_pickup">
                <input type="text" name="pickup_data_sender" class="d-none">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Route <span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 route_name" name="route_name" id="search_by">
                      <option value="0">Select Route</option>
                      <option value="1">Class</option>
                      <option value="2">Admission Id</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Stoppage Name</label>
                    <input type="text" name="pick_up_name" id="pick_up_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Stoppage No</label>
                    <input type="number" name="pick_up_no" id="pick_up_no" class="form-control" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Stoppage Address</label>
                    <input type="text" name="pick_up_address" id="pick_up_address" class="form-control" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Distance</label>
                    <input type="number" name="pick_up_distance" id="pick_up_distance" class="form-control" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 row">
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Pick Hour <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="pick_hour" id="pick_hour">
                        <option value="0">Select Hour</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Pick Minute <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="pick_minute" id="pick_minute">
                        <option value="0">Select Minute</option>
                        <option value="00">00</option>
                        <option value="05">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Pick Medridian <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="pick_meridian" id="pick_meridian">
                        <option value="0">Select Medridian</option>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 row">
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Drop Hour <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_hour" id="pick_hour">
                        <option value="0">Select Hour</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Drop Minute <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_minute" id="pick_minute">
                        <option value="0">Select Minute</option>
                        <option value="00">00</option>
                        <option value="05">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group aj-form-group">
                      <label>Drop Medridian <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_meridian" id="pick_meridian">
                        <option value="0">Select Medridian</option>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Charge</label>
                    <input type="number" name="pick_up_charge" id="pick_up_charge" class="form-control" required>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Stoppage</button>
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
                      <th>Route</th>
                      <th>Stoppage</th>
                      <th>Stoppage no</th>
                      <th>Address</th>
                      <th>Distance</th>
                      <th>Pick Time</th>
                      <th>Drop Time</th>
                      <th>Amount</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="load_stoppage_fees">
                  </tbody>
                  <tr>
                    <th colspan="5"><span class="text-success">A = Active</span></th>
                    <th colspan="5"><span class="text-danger">D = Deleted</span></th>
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

    $(document).on('submit', '#route_pick_form', function(event) {
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

    display_stoppage_fee();

    function display_stoppage_fee() {
      var stoppage_html = '';
      var stoppage_url = './Transport_1.php?get_stoppage_fee=1';
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
          stoppage_html += '<tr><td  scope="row">' + value.Route_Name + '</td><td>' + value.Stopage_Name + '</td><td>' + value.Stopage_No + '</td><td>' + value.Stopage_Address + '</td><td>' + value.Distance + '</td></td><td>' + value.Pickup_Time + '</td></td><td>' + value.Drop_Time + '</td></td><td>' + value.Charges + '</td></td><td><button class="btn btn-warning btn_edit" id="' + value.TRCT_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="' + value.TRCT_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>' + status + '</td></tr>';
        });
        $('.load_stoppage_fees').html(stoppage_html);
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>