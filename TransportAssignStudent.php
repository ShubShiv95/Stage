<?php
/*make a variable named $pageTitle */
$pageTitle = "Transport Assign Student";
$bodyHeader = "Transport Assign Student";
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
              <form action="./Transport_1.php" class="new-added-form aj-new-added-form" id="student_assign_form">
                <input type="text" name="student_asignee" class="d-none" autocomplete="off">
                <input type="text" autofill="none" style="display: none;" name="action" value="add_new_asignee">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Class <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="student_class" id="student_class">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Section <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="student_section" id="student_section">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                      <label>Select Student <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="student_id" id="student_id">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                    <div class="form-group aj-form-group">
                      <label>Pickup Type</label>
                      <div class="row text-center">
                        <div class="col-4 mt-3">Both <input type="radio" id="pickup_both" name="pickup_type" value="Both" checked></div>
                        <div class="col-4">Pickup Only <input type="radio" id="pickup_only" value="PickupOnly" name="pickup_type"></div>
                        <div class="col-4">Drop Only <input type="radio" id="drop_only" value="DropOnly" name="pickup_type"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3 pick_div">
                    <div class="form-group aj-form-group">
                      <label>Route <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="route_name" id="route_name">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3  pick_div">
                    <div class="form-group aj-form-group">
                      <label>Stoppage<span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="stoppage_id" id="stoppage_id">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3  pick_div">
                    <div class="form-group aj-form-group">
                      <label>Vehicle <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="vehicle_id" id="vehicle_id">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3 drop_div">
                    <div class="form-group aj-form-group">
                      <label>Drop Route <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_route_id" id="drop_route_id">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3 drop_div">
                    <div class="form-group aj-form-group">
                      <label>Drop <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_stoppage" id="drop_stoppage">
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12 aj-mb-2 pt-3 drop_div">
                    <div class="form-group aj-form-group">
                      <label>Vehicle <span>*</span></label>
                      <select class="select2 search_by col-12 form-group mb-4" name="drop_vehicle" id="drop_vehicle">
                      </select>
                    </div>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button type="submit" name="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Route</button>
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
<?php
  require_once './includes/scripts.php';
?>
<script>
$(document).ready(function(){

  get_all_class();
  function get_all_class(){
    const get_class_url = './universal_apis.php?getAllClass=1';class_html='';
    $.getJSON(get_class_url, function(class_response){
      class_html += `<option value="0">Select Class</option>`;
      $.each(class_response,function(key,value){
        class_html += `<option value="${value.Class_Id}">${value.Class_Name}</option>`;
      });
      $('#student_class').html(class_html);
    });
  }

  $(document).on('change','#student_class',function(){
    var class_id = $(this).val();
    sec_url = './universal_apis.php?getAllSections=1&class_id='+class_id+'';sec_html='';
    $.getJSON(sec_url, function(sec_response){
      sec_html += `<option value="0">Select Section</option>`;
      $.each(sec_response,function(key,value){
        sec_html += `<option value="${value.Class_Sec_Id}">${value.Section}</option>`;
      });
      $('#student_section').html(sec_html);
    });
  });

  $(document).on('change','#student_section',function(){
    var sec_id = $(this).val();
    var class_id = $('#student_class').val();
    var stud_html = '';
    stud_html += `<option value="0">Select Student</option>`;
    const students_url = './universal_apis.php?get_all_students_by_class_section=1&class_id='+class_id+'&sec_id='+sec_id+'';
    $.getJSON(students_url,function(stud_resp){
      $.each(stud_resp,function(key,value){
        if(value.Middle_Name==null){
          name = value.First_Name+' '+value.Last_Name;
        }
        else{
          name = value.First_Name+' '+value.Middle_Name+' '+value.Last_Name;
        }
        stud_html += `<option value="${value.Student_Id}">${name}</option>`;
      }); 
      $('#student_id').html(stud_html);
    });
  });

  $(document).on('submit','#student_assign_form',function(event){
    event.preventDefault();
    form_data = $(this).serialize();
    $.post($(this).attr('action'),form_data,function(response_form){
      $('.formoutput').html(response_form);
    });
  });
  
  load_routes();
  function load_routes(){
    var school_id = "<?php echo $_SESSION["SCHOOLID"]; ?>";
    const route_url = "./Transport_1.php?api_call=get_all_routes&school_id="+school_id+"";
    var route_html = '';
    route_html += `<option value="0">Select Route</option>`;
    $.getJSON(route_url,function(route_response){
      $.each(route_response,function(key,value){
        route_html += `<option value="${value.id}">${value.name}</option>`;
      });
      $('#route_name').html(route_html);
      $('#drop_route_id').html(route_html);
    });
  }

  $(document).on('change','#route_name',function(){
    var route_id = $(this).val();
    var div_name = '#stoppage_id';
    $('#stoppage_id').html(''); div_name_veh = '#vehicle_id';
    load_stoppages(route_id,div_name);
    load_vehicles(route_id,div_name_veh);
  });

  $(document).on('change','#drop_route_id',function(){
    var route_id = $(this).val();
    $('#drop_stoppage').html('');
    var div_name = '#drop_stoppage';
    div_name_veh = '#drop_vehicle'; 
    load_stoppages(route_id,div_name);
    load_vehicles(route_id,div_name_veh);
  });

  function load_stoppages(route_id,div_name){
    var school_id = "<?php echo $_SESSION["SCHOOLID"]; ?>";
    const stops_url = "./Transport_1.php?api_call=get_all_stops&school_id="+school_id+"&route_id="+route_id+"";
    var stop_html = '';
    stop_html += `<option value="0">Select Stop</option>`;
    $.getJSON(stops_url,function(stop_resp){
      $.each(stop_resp,function(key,value){
        stop_html += `<option value="${value.id}">${value.name}</option>`;
      });
      $(div_name).html(stop_html);
    });
  }

  function load_vehicles(route_id,div_name){
    var school_id = "<?php echo $_SESSION["SCHOOLID"]; ?>";
    const stops_url = "./Transport_1.php?api_call=get_all_vehicles&school_id="+school_id+"&route_id="+route_id+"";
    var stop_html = '';
    stop_html += `<option value="0">Select Vehicle</option>`;
    $.getJSON(stops_url,function(stop_resp){
      $.each(stop_resp,function(key,value){
        stop_html += `<option value="${value.id}">${value.name}</option>`;
      });
      $(div_name).html(stop_html);
    });
  }
  $('#pickup_both').click(function(){
    $('.pick_div').fadeIn('slow');
    $('.drop_div').fadeIn('slow');
  });

  $('#pickup_only').click(function(){
    $('.pick_div').fadeIn('slow');
    $('.drop_div').fadeOut('slow');
  });
  $('#drop_only').click(function(){
    $('.pick_div').fadeOut('slow');
    $('.drop_div').fadeIn('slow');
  });
});
</script>
<?php
  require_once './includes/closebody.php';
?>