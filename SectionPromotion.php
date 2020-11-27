<?php
session_start();
$pageTitle = "Sudent's Section Allocation";
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include_once 'dbobj.php';
include_once 'errorLog.php';
include_once 'security.php';
require_once './includes/header.php';
?>
<form class="new-added-form school-form aj-new-added-form">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="brouser-image ">
                <h5 class="text-center">Student Section Allocation</h5>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Select Class <span>*</span></label>
                        <select class="select2 class_list" name="f_class">
                        </select>
                    </div>
                </div>
            </div>
            <div class="aaj-btn-chang-cbtn">
                <a href="javascript:void(0);" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>
            </div>
        </div>
    </div>
</form>

<div class="tebal-promotion" style="display: none;">
    <form class="new-added-form ">
        <h5 class="text-center">Section Promotion <span class="current_class"></span> To <span class="next_class"></span></h5>
        <div class="table-responsive" style="height:60vh;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial No. </th>
                        <th>Student Id </th>
                        <th>Student Name</th>
                        <th>Class </th>
                        <th>Curr. Section</th>
                        <th>Change Section</th>
                        <th>Roll No. </th>
                    </tr>
                </thead>
                <tbody class="students_data">
                </tbody>

            </table>
        </div>

        <div class="inpuy-chang-box">
            <span class="text-center form_output"></span>
            <div class="form-output">
                <div class="name-f">
                    <h6>Section A</h6>
                </div>
                <div class="input-box-in">
                    <h5>32</h5>
                </div>
                <div class="name-f">
                    <h6>Section B</h6>
                </div>
                <div class="input-box-in n-br">
                    <h5>25</h5>
                </div>
            </div>
            <div class="new-added-form aj-new-added-form">
                <div class="aaj-btn-chang-cbtn">
                    <!--<button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Promote Student </button>-->
                </div>
            </div>
        </div>

    </form>
</div>


<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $('#opne-form-Promotion').click('.sibling-bs', function() {
        $('.tebal-promotion').slideDown('slow');
    });

    // get all classes through API
    const url = "./universal_apis.php?getAllClass=1";
    var html_class_d = '<option value="">Please Select Class</option>';
    $.getJSON(url, function(data) {
        $.each(data, function(key, value) {
            html_class_d += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
        });
        $('.class_list').append(html_class_d);
    });

    $('#opne-form-Promotion').click(function() {
        const class_id = $('.class_list').val();
        $('.students_data').html('');
        if (class_id == '' || class_id == '0') {
            alert("Please Select Class");
        } else {
            get_curr_class(class_id);
            get_class_w_sections(class_id);
        }
    });

    // get class with section
    function get_class_w_sections(class_id) {
        const url = './ClassPromotion_1.php?get_prom_sec_data=1&class_id=' + class_id + '';
        table_html = '';
        $.getJSON(url, function(data) {
            var sl = 1;
            $.each(data, function(key, value) {
                get_sections(class_id, value.Class_Sec_Id, value.Student_Details_Id);
                table_html += '<tr><td>' + sl++ + '</td><td>' + value.Student_Id + '</td><td>' + value.First_Name + ' ' + value.Last_Name + '</td><td>' + value.Class_Name + '</td><td class="sec_name' + value.Student_Details_Id + '">' + value.Section + '</td><td><select class="form_control student_section" id="' + value.Student_Details_Id + '">';
                table_html += '</select></td>';
                table_html += '<td contenteditable="true" id="' + value.Student_Details_Id + ',' + value.Class_Sec_Id + '" class="student_roll_change">' + value.Roll_No + '</td></tr>';
            });
            $('.students_data').append(table_html);
        });
    }
    // get sections by class id
    function get_sections(class_id, sec_id, Student_Details_Id) {
        const sec_url = './universal_apis.php?getAllSections=1&class_id=' + class_id + '';
        var select_data = '<select class="form_control student_section" id="' + Student_Details_Id + '"><option value="">Select One</option>';
        $.getJSON(sec_url, function(response) {
            $.each(response, function(key, section) {
                if (section.Class_Sec_Id == sec_id) {
                    select_data += '<option value="' + section.Class_Sec_Id + '">' + section.Section + '</option>';
                } else {
                    select_data += '<option value="' + section.Class_Sec_Id + '">' + section.Section + '</option>';
                }
            });
            select_data += '</select>';
            $('.student_section').html(select_data);
        });
    }

    // get curent class and next class by name
    function get_curr_class(class_id, sec_id) {
        const url = "./universal_apis.php?getClassbyId=1&class_id=" + class_id + "";
        $.getJSON(url, function(data) {
            $('.current_class').html(data.Class_Name);
            const next_url = "./universal_apis.php?getClassbyId=1&class_id=" + data.Next_Class_Id + "";
            $.getJSON(next_url, function(next_data) {
                $('.next_class').html(next_data.Class_Name);
            });
        });
    }

    /*********** updation of roll no and sections ***********/
    // update section
    $(document).on('change', '.student_section', function() {
        const student_details_id = $(this).attr('id');
        const section_name = $(this).val();
        $('.form_output').html('');
        if (section_name != '') {
            $.ajax({
                url: './ClassPromotion_1.php',
                type: 'post',
                data: {
                    'update_st_section': 1,
                    'student_details_id': student_details_id,
                    'section_name': section_name
                },
                success: function(data) {
                    $('.form_output').html(data);
                }
            });
        }
    });

    // update roll nos
    $(document).on('blur', '.student_roll_change', function() {
        $('.form_output').html('');
        const student_details_id = $(this).attr('id');
        const stud_roll_no = $(this).text();
        const class_id = $('.class_list').val();
         if(stud_roll_no !=""){
             $.ajax({
                 url : './ClassPromotion_1.php',
                 type : 'post',
                 data : {'update_st_roll':1,'student_details_id':student_details_id,'stud_roll_no':stud_roll_no,'class_id':class_id},
                 dataType : 'json',
                 success : function(data){
                     json_data = JSON.parse(JSON.stringify(data));
                    if(json_data['type']=="Error"){
                        html_data = '<div class="alert alert-warning" role="alert"><strong>Alert </strong>Roll No Already Alloted To '+json_data['message']+'</div>'
                    }else{
                        html_data = '<div class="alert alert-success" role="alert"><strong>Alert </strong>'+json_data['message']+'</div>'
                    }
                     $('.form_output').html(html_data);
                 }
             });
         }
    });
</script>
<?php include_once './includes/closebody.php'; ?>