<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Route";
$bodyHeader = "Transport Route";
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
              <form action="./Transport_1.php" method="post" class="new-added-form aj-new-added-form" id="ruote_form" >
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_route">
                <input type="text" autocomplete="off" name="route_sender" class="d-none">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Route Name</label>
                    <input type="text" name="route_name" id="route_name" class="form-control"  required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                  <div class="form-group aj-form-group">
                    <label>Description</label>
                    <textarea class="aj-form-control" rows="4" id="" name="route_description"></textarea>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Route</button>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3 formoutput">
                 
                </div>
              </form>
            </div>

            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2">
                  <div class="row table-responsive">
                      <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                          <tr>
                            <th>Route</th>
                            <th>Details</th>
                          </tr>
                          </thead>
                          <tbody class="load_routes">
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
    $(document).on('submit','#ruote_form',function(event){
      event.preventDefault();
      post_data = $(this).serialize();
      $.post($(this).attr('action'),post_data,function(form_output){
        $('.formoutput').html(form_output);
        display_routes();
      });
    });

    display_routes();
    function display_routes(){
      var route_html = '';
      var route_url = './Transport_1.php?get_routes=1';
      $.getJSON(route_url,function(route_resp){
        $.each(route_resp,function(key, value){
          if(value.Enabled==1){
            status = '<span class="text-success">A</span>';
          }
          else if(value.Enabled==0){
            status = '<span class="text-danger">D</span>';
          }
          route_html += '<tr><td scope="row">'+value.Route_Name+'</td><td>'+value.Route_Description+'</td><td>'+value.Remarks+'</td><td><button class="btn btn-warning btn_edit" id="'+value.Route_Id  +'"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="'+value.Route_Id  +'"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>'+status+'</td></tr>';
        });
        $('.load_routes').html(route_html);
      });  
    }   
  });
</script>
<?php
require_once './includes/closebody.php';
?>
