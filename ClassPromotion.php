<?php
session_start();
$pageTitle = "Sudent's Promotion";
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
                <h5 class="text-center">Student Class Promotion</h5>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>School Class <span>*</span></label>
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
    <form class="new-added-form" id="student_promotion" method="post" action="./ClassPromotion_1.php">
        <h5 class="text-center class_details_prom">Class Promotion <span class="current_class"></span> To <span class="next_class"></span></h5>
        <input type="text" class="d-none" name="student_prom_data_sender">
        <div class="table-responsive" style="height:60vh; overflow:auto">
            <table class="table table-bordered student_class_tbl">
                <thead>
                    <tr>
                        <th>Serial No. </th>
                        <th>Class </th>
                        <th>Roll No.</th>
                        <th>Student Name</th>
                        <th>Promoted </th>
                        <th>Not Promoted</th>
                        <th>Non Promotion Reason</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="inpuy-chang-box">
            <div class="form-output">
                <div class="name-f">
                    <h6>Promoted</h6>
                </div>
                <div class="input-box-in">
                    <input type="text" readonly="" id="count_promoted" class="redonly-form-control" value="" name="">
                </div>
                <div class="name-f">
                    <h6>Not Promoted</h6>
                </div>
                <div class="input-box-in n-br">
                    <input type="text" readonly="" id="count_not_promoted" class="redonly-form-control" value="0" name="">
                </div>
            </div>
            <div class="new-added-form aj-new-added-form">
                <div class="aaj-btn-chang-cbtn">
                    <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Promote Student </button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-md-12"><span id="form_output"></span></div>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    /* fetch students details class wise */
    $('#opne-form-Promotion').click('.sibling-bs', function() {
        $('.student_class_tbl').html('');
        const class_id = $('.class_list').val();
        if (class_id == '' || class_id == '0') {
            alert("Please Select Class");
        } else {
            get_curr_class(class_id);
            $.ajax({
                url: './ClassPromotion_1.php',
                type: 'get',
                data: {
                    "getStudentDetailsbyClass": 1,
                    "class_id": class_id
                },
                dataType: 'json',
                success: function(response) {
                    var table_html = '<thead><tr><th>Serial No. </th><th>Class </th><th>Roll No.</th><th>Student Name</th><th>Promoted </th><th>Not Promoted</th><th>Remarks    </th></tr></thead><tbody><tbody><tr><td colspan="7"><h4 class="text-danger text-center">No Record Found!!!</h4></td></tr></tbody>';
                    const stud_json = JSON.parse(JSON.stringify(response));
                    if (stud_json == '') {
                        table_html += '';
                    } else 
                    {
                        table_html = '<thead><tr><th>Serial No. </th><th>Class </th><th>Roll No.</th><th>Student Name</th><th>Promoted </th><th>Not Promoted</th><th>Remarks</th></tr></thead><tbody><tr>';
                        for (let i = 0; i < stud_json.length; i++) {
                            sl = 1 + i;
                            const data_json = stud_json[i];
                            table_html += ' <tr>';
                            table_html += '<td><input type="text" class="d-none" value="'+data_json.Student_Details_Id+'" name="student_details_id[]">' + sl + '</td>';
                            table_html += '<td>' + data_json.Class_Name + '</td>';
                            table_html += '<td>' + data_json.Roll_No + '</td>';
                            if (data_json.Middle_Name == null || data_json.Middle_Name == NULL) {
                                table_html += '<td>' + data_json.First_Name + ' ' + data_json.Last_Name + '</td>';
                            } else {
                                table_html += '<td>' + data_json.First_Name + ' ' + data_json.Middle_Name + ' ' + data_json.Last_Name + '</td>';
                            }
                            table_html += '<td><div class="radio"><span><input type="radio"class="gaurdian-bs promoted" checked name="promoted['+i+']" value="1" id="' + data_json.Student_Details_Id + '" > Promoted</span></div></td>';
                            table_html += '<td><div class="radio"><span><input type="radio" class="gaurdian-bs not_promoted" name="promoted['+i+']" value="0" id="' + data_json.Student_Details_Id + '"> Not Promoted</span></div></td>';
                            table_html += '<td><textarea class="form-control reason_not_promoted" name="student_remarks['+i+']" id="' + data_json.Student_Details_Id + '"></textarea></td>';
                            table_html += '</tr>';
                        }
                        table_html += '</tbody>';
                    }
                    $('#count_promoted').val(stud_json.length);
                    $('.student_class_tbl').append(table_html);
                    $('.tebal-promotion').slideDown('slow');
                }
            });
        }
    });

    // get curent class and next class by name
    function get_curr_class(class_id) {
        const url = "./universal_apis.php?getClassbyId=1&class_id=" + class_id + "";
        $.getJSON(url, function(data) {
            $('.current_class').html(data.Class_Name);
            const next_url = "./universal_apis.php?getClassbyId=1&class_id=" + data.Next_Class_Id + "";
            $.getJSON(next_url, function(next_data) {
                $('.next_class').html(next_data.Class_Name);
            });
        });
    }

    // get all classes through API
    const url = "./universal_apis.php?getAllClass=1";
    var html_class_d = '<option value="">Please Select Class</option>';
    $.getJSON(url, function(data) {
        $.each(data, function(key, value) {
            html_class_d += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
        });
        $('.class_list').append(html_class_d);
    });

    // submit student promotion data
    $('#student_promotion').submit(function(event){
        event.preventDefault();
        $.ajax({
            url : $(this).attr('action'),
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function(data){
                $('#form_output').html(data);
                window.setTimeout(function(){$('#form_output').html('')},2000);
                $('.tebal-promotion').fadeOut('slow');
            }
        });
    });

    // count not promoted
    $(document).on('change','.not_promoted',function(){
        var count_promoted = $('#count_promoted').val();
        var count_not_promoted = $('#count_not_promoted').val();
        var new_count = parseInt(count_promoted)-1;
        var new_not_pr = parseInt(count_not_promoted)+1;
        $('#count_promoted').val(new_count); $('#count_not_promoted').val(new_not_pr);
    });

    // count promoted
    $(document).on('change','.promoted',function(){
        var count_promoted = $('#count_promoted').val();
        var count_not_promoted = $('#count_not_promoted').val();
        var new_count = parseInt(count_promoted)+1;
        var new_not_pr = parseInt(count_not_promoted)-1;
        $('#count_promoted').val(new_count); $('#count_not_promoted').val(new_not_pr);
    });
</script>
<?php include_once './includes/closebody.php'; ?>