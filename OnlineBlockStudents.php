<?php
$pageTitle = "Online Block Students";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<style>
    /* Ensure that the demo table scrolls */
    th,
    td {
        white-space: nowrap;
    }

    td {
        color: #000;
    }

    div.dataTables_wrapper {
        width: 90%;
        margin: 0 auto;
        border: 1px;
    }
</style>

<form action="./OnlineClassControl_1.php" method="post" id="block_online_class" class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
    <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
        <input type="text" name="block_online_class_sender" class="d-none" autocomplete="off">
        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Class Name <span>*</span></label>
                <select class="select2 col-12 class_name" id="class_name" name="class_name" required>
                    <option value="">SELECT Class</option>
                </select>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5">
            <div class="form-group aj-form-group">
                <label>Studnt Name</label>
                <select class="select2 col-12 student_list" id="student_list" name="student_list" required>
                    <option value="">-- SELECT Student --</option>
                </select>
            </div>
            <span id="student_status"></span>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5">
            <div class="form-group aj-form-group">
                <label>Change Ststus</label>
                <select class="select2 col-12 class_type" id="block_Status" name="block_Status" required>
                    <option value="">-- SELECT Status --</option>
                    <option value="1">Block</option>
                    <option value="0">Un-Block</option>
                </select>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5">
            <div class="form-group aj-form-group">
                <label>Remarks</label>
                <input type="text" value="" class="form-control" name="block_remarks" id="block_remarks">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5 form_output">
        </div>
        <div class="col-xl-12 col-lg-12 text-right mt-3">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Save</button>
        </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        get_class();

        function get_class() {
            var url = "./universal_apis.php?getAllClass=1";
            html_data = '<option value="">SELECT Class</option>';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
                });
                $('.class_name').html(html_data);
            });
        }

        $(document).on('change', '.class_name', function() {
            var class_id = $(this).val();
            const url_students = "./universal_apis.php?get_all_students_by_class=1&class_id=" + class_id + "";
            $.getJSON(url_students, function(response) {
                var html_students = '<option value="">Select Student</option>';
                $.each(response, function(key, value) {
                    if (value.Middle_Name == null) {
                        var st_name = value.First_Name + ' ' + value.Last_Name;
                    } else {
                        var st_name = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name;
                    }
                    html_students += '<option value="' + value.Student_Id + '">' + st_name + '</option>';
                });
                $('.student_list').html(html_students);
            });
        });
        $(document).on('change', '.student_list', function() {
            var student_id = $(this).val();
            var url_st_details = "./universal_apis.php?getStudentDetailsbyId=1&student_id=" + student_id + "";
            html_status = '';
            $.getJSON(url_st_details, function(response_st) {
                $.each(response_st, function(key, value) {
                    console.log(value.Is_Blocked);
                    if (value.Is_Blocked == '0') {
                        html_status += '<span class="text-success">' + value.Section + ' | Roll - ' + value.Roll_No + ' | Curreulty Un-Blocked</span>';
                    } else {
                        html_status += '<span class="text-danger">' + value.Section + ' | Roll - ' + value.Roll_No + ' | Curreulty Blocked</span>';
                    }
                });
                $('#student_status').html(html_status);
            });
        });

        $(document).on('submit', '#block_online_class', function(event) {
            event.preventDefault();
            var data = $(this).serialize();
            $.post($(this).attr('action'), data, function(response) {
                $('.form_output').html(response);
                window.setTimeout(function() {
                    $('.form_output').html('');
                }, 3000);
            });
        });

    });
</script>
<?php require_once './includes/closebody.php'; ?>