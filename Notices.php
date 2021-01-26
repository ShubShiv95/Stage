<?php
$pageTitle = "Notices And Circular";
$bodyHeader = "Add Notice/Circular";    
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form" action="./Notice_1.php" id="notice_form" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Title</label>
                <input type="text" id="" autocomplete="off" name="notice_sender" style="display: none;">
                <input type="text" name="notice_title" id="notice_title" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Notice Type</label>
                <select class="select2 col-12" name="notice_type" id="Notice" name="class">
                    <option value="">Choose Type</option>
                    <option value="Notice" data-select2-id="Notice">Notice</option>
                    <option value="Circular" data-select2-id="Circular">Circular</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Details</label>
                        <textarea class="textarea summernote aj-form-control" name="notice_details" id="notice_details" cols="5" rows="5" onkeyup="restrict_textlength('note','100');"></textarea>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <div class="row-chang mt-5">
                            <span class="mt-2"> Publish In website ?</span>
                            <div class="radio">
                                <span><input type="radio" class="sibling-bs" name="publish" value="1" checked=""> Yes </span>
                            </div>
                            <div class="radio">
                                <span><input type="radio" class="sibling-bs" name="publish" value="0"> No</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                    <div class="form-group ">
                        <label class="ml-4">Files (pdf/jpeg/jpg)</label>
                        <input type="file" name="notice_attachment" placeholder="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label> Notice To</label>
                        <select class="select2 col-12" id="notice_to" name="notice_to">
                        <option value="" data-select2-id="">Select</option>
                            <option value="All" data-select2-id="All">All</option>
                            <option value="ClassId" data-select2-id="ClassId">Students</option>
                            <option value="DepartmentId" data-select2-id="DepartmentId">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="Individuals-cug">
                        <div class="Attendance-staff Attendance-staff aj-scroll-Attendance-staff">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="pt-3 pb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkAll">
                                                    <label class="form-check-label text-white">Select Individuals</label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="top-position-ss2 populatingDiv">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-9 col-lg-9 col-md-9 col-12 aj-mb-2 formErrors"></div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-12  aj-mb-2">
            <div class="form-group aj-form-group text-right">
                <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>    
                <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create</button>
            </div>
        </div>
    </div>
</form>
<?php
require_once './includes/scripts.php';
?>
<script src="js/myscript.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  /****** getting data according changes into notice to *****/  
  $('#notice_to').change(function(){
    const notice_to = $(this).val();
    if (notice_to == 'ClassId') {
      data = {'getAllClass':1};
      $('.Individuals-cug').show();
    }
    else if(notice_to == 'DepartmentId'){
      data = {'getAllDepartments':1};
      $('.Individuals-cug').show();
    }
    else if(notice_to == 'All'){
        $('.Individuals-cug').hide();
    }
    
    $.ajax({
      url : './universal_apis.php',
      type : 'get',
      data : data,
      dataType : 'json',
      success : function(data){
        var html = '';
        const exactData = JSON.parse(JSON.stringify(data));
        for (let i = 0; i < exactData.length; i++) {
            const noticeTo = exactData[i];
            if (notice_to == 'ClassId') {
                noticeTo.name = noticeTo.Class_Name;
                noticeTo.vals = noticeTo.Class_Id;
            }
            else if(notice_to == 'DepartmentId'){
                noticeTo.name = noticeTo.Dept_Name;
                noticeTo.vals = noticeTo.Dept_Id;
            }
            html += '<tr><td><div class="form-check"><input type="checkbox" name="notice_refs[]" class="form-check-input" value="'+noticeTo.vals+'"><label class="form-check-label">'+noticeTo.name+'</label></div></td></tr>';
        }
        $('.populatingDiv').html(html);
      }
    });
  });
  CKEDITOR.replace( 'notice_details' );

  $('#notice_form').on('submit',function(event){
    event.preventDefault();
    $.ajax({
        url : $(this).attr('action'),
        type : $(this).attr('method'),
        data : new FormData(this),
        contentType : false,
        processData : false,
        success : function(data){
            $('.formErrors').html(data);
            $('#notice_form')[0].reset();   
            window.setTimeout(function(){
                $('.formErrors').html('');
            },3000);
        }
    });
  });
});
</script>
<?php
require_once './includes/closebody.php';
?>
