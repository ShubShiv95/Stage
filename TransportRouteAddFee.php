<?php
/*make a variable named $pageTitle */
$pageTitle = "Transport  Add Route Fee";
$bodyHeader = "Transport Add Route Fee";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3 col-12">
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" method="post" id="route_fee_form" >
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_route">
                <input type="text" autocomplete="off" name="route_fee_Sender" class="d-none">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Enable Route Charges</label>
                    <input type="checkbox" name="enable_route_fee" id="enable_route_fee" value="1" class="form-control-file mt-4 ml-4" >
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                  <div class="form-group aj-form-group">
                    <label>Route<span>*</span></label>
                    <select class="select2 search_by col-12 form-group mb-4 route_name" name="route_name" id="search_by">
                      <option value="0">Select Route</option>
                    </select>
                  </div>
                </div>                 
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                  <div class="form-group aj-form-group">
                    <label>Route Charge</label>
                    <input type="number" name="route_amount" id="route_amount" class="form-control" required>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Amount</button>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3 formoutput">
                 
                </div>
              </form>
            </div>

            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2">
                  <div class="row assignment-list  table-responsive">
                      <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                          <tr>
                            <th>Route</th>
                            <th>Charges</th>
                            <th>Charges</th>
                            <th>Action</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                          <tbody class="load_routes_fees">
                            <tr>
                              <td scope="row"></td>
                              <td></td>
                              <td></td>
                            </tr>
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
  $(document).ready(function(){
    display_routes();
    function display_routes(){
      var route_html = '<option value="0">Select Route</option>';
      var route_url = './Transport_1.php?get_routes=1';
      $.getJSON(route_url,function(driver_resp){
        $.each(driver_resp,function(key, value){
          if(value.Enabled==1){
            route_html += '<option value="'+value.Route_Id +'">'+value.Route_Name +'</option>';
          }
        });
        $('.route_name').html(route_html);
      });  
    }  

    $(document).on('submit','#route_fee_form',function(event){
      event.preventDefault();
      post_data = $(this).serialize();
      $.post($(this).attr('action'),post_data,function(form_output){
        $('.formoutput').html(form_output);
        display_routes_fee();
      });
    });

    display_routes_fee();
    function display_routes_fee(){
      var driver_html = '';
      var driver_url = './Transport_1.php?get_routes_fee=1';
      var status_enb = '';
      $.getJSON(driver_url,function(driver_resp){
        $.each(driver_resp,function(key, value){
          if(value.Enabled==1){
            status = '<span class="text-success">A</span>';
          }
          else if(value.Enabled==0){
            status = '<span class="text-danger">D</span>';
          }
          if(value.Is_Enabled==1){
            status_enb = '<span class="text-success">Enabled</span>';
          }
          else if(value.Is_Enabled==0){
            status_enb = '<span class="text-danger">Disabled</span>';
          }
          driver_html += '<tr><td scope="row">'+value.Route_Name+'</td><td>'+value.Charges+'</td><td>'+status_enb+'</td><td><button class="btn btn-warning btn_edit" id="'+value.TRCT_Id  +'"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="'+value.TRCT_Id  +'"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>'+status+'</td></tr>';
        });
        $('.load_routes_fees').html(driver_html);
      });  
    }   
  });
</script>
<?php
require_once './includes/closebody.php';
?>
