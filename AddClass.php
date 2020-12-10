<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
$pageTitle = "Add Class";
//$bodyHeader = "Add Class";
require_once './includes/header.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form col-xl-6 col-lg-6 col-md-6 col-12 offset-xl-3 offset-lg-3 offset-md-3" action="./AddClass_1.php" id="class_form" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Class Number</label>
                <input type="text" id="action" value="add_new_record" autocomplete="off" name="form_action" style="display: none;">
                <input type="text" id="class_id" value="" autocomplete="off" name="class_id" style="display: none;">
                <input type="text" name="class_number" id="class_number" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Class Name</label>
                <input type="text" id="" autocomplete="off" name="class_sender" style="display: none;">
                <input type="text" name="class_name" id="class_name" placeholder="" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2 formErrors"></div>
    <div class="form-group aj-form-group text-right">
        <button type="submit" id="main_btn" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add</button>
    </div>
</form>
<div class="col-xl-12 col-lg-12 col-12 aj-mb-2  table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Class Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="show_classes"></tbody>
    </table>
</div>
</div>
<?php
require_once './includes/scripts.php';
?>
<script src="js/myscript.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#class_form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(data) {
                    $('.formErrors').html(data);
                    load_classes();
                    window.setTimeout(function() {
                        $('.formErrors').html('');
                    }, 3000);
                }
            });
        });
        load_classes();

        function load_classes() {
            const url = "./universal_apis.php?getAllClass_desc=1";
            html_data = '';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<tr><td>' + value.Class_Name + '</td><td>' + value.Class_No + '</td><td><button type="button" class="btn btn-warning btn_edit" id="' + value.Class_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button type="button" class="btn btn-danger btn_delete" id="' + value.Class_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                });
                $('.show_classes').html(html_data);
            });
        }
        $(document).on('click', '.btn_edit', function() {
            var class_id = $(this).attr('id');
            url = "./universal_apis.php?getClassbyId=1&class_id=" + class_id + "";
            $.getJSON(url, function(response) {
                $('#action').val('update_existing_record');
                $('#class_number').val(response.Class_No);
                $('#class_id').val(class_id);
                $('#main_btn').html('Update');
                $('#class_name').val(response.Class_Name);
            });
        });
    });
</script>
<?php
require_once './includes/closebody.php';
?>