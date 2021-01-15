<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport Stoppages";
$bodyHeader = "Transport Add Driver";
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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="driver_form" >
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_driver">
                <input type="text" autocomplete="off" name="driver_form_sender" class="d-none">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Driver <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4 staff_name" name="staff_name" id="staff_name">
                        <option value="0">Select Staff</option>
                        <option value="1">Class</option>
                        <option value="2">Admission Id</option>
                      </select>
                    </div>
                  </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Lincense No</label>
                    <input type="text" name="license_no" id="license_no" class="form-control"  required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                  <div class="form-group aj-form-group">
                    <label>Remarks</label>
                    <textarea class="aj-form-control" rows="4" id="driver_remarks" name="driver_remarks"></textarea>
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
                            <th>Driver</th>
                            <th>License No</th>
                            <th>Remarks</th>
                            <th>Action</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                          <tbody class="load_drivers">
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
    html_staff=' <option value="0">Select Driver</option>';
    staff_url ='./universal_apis.php?get_all_staff_list=1';
    $.getJSON(staff_url,function(response_staff){
      $.each(response_staff,function(key,value){
        html_staff += ' <option value="'+value.Staff_Id+'">'+value.Staff_Name+'</option>';
      });
      $('.staff_name').html(html_staff);
    });
    $(document).on('submit','#driver_form',function(event){
      event.preventDefault();
      post_data = $(this).serialize();
      $.post($(this).attr('action'),post_data,function(form_output){
        $('.formoutput').html(form_output);
        display_drivers();
      });
    });

    display_drivers();
    function display_drivers(){
      var driver_html = '';
      var driver_url = './Transport_1.php?get_drivers=1';
      $.getJSON(driver_url,function(driver_resp){
        $.each(driver_resp,function(key, value){
          if(value.Enabled==1){
            status = '<span class="text-success">A</span>';
          }
          else if(value.Enabled==0){
            status = '<span class="text-danger">D</span>';
          }
          driver_html += '<tr><td scope="row">'+value.Staff_Name+'</td><td>'+value.Liscence_No+'</td><td>'+value.Remarks+'</td><td><button class="btn btn-warning btn_edit" id="'+value.Driver_Id +'"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="'+value.Driver_Id +'"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>'+status+'</td></tr>';
        });
        $('.load_drivers').html(driver_html);
      });
    }

    $(document).on('click','.btn_edit',function(){
      var driver_id =  $(this).attr('id');
    });

    $(document).on('click','.btn_delete',function(){
      var driver_id =  $(this).attr('id');
      form_data = {'delete_driver':1,'driver_id':driver_id};
      if(confirm("Are You Sure to Delete?")){
        $.post('./Transport_1.php',form_data,function(driver_del_res){
          $('.formoutput').html(driver_del_res);
        });
      }
    });    
  });
</script>
<?php
require_once './includes/closebody.php';
?>
