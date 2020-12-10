<?php
session_start();
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';
$pageTitle = "Add Section";
//$bodyHeader = "Add Notice/Circular";
require_once './includes/header.php';
require_once './GlobalModel.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form col-xl-6 col-lg-6 col-12 offset-lg-3 offset-md-3" action="./AddSection_1.php" id="section_form" method="post">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="form-group aj-form-group">
                <input type="text" autocomplete="off" name="section_sender" style="display: none;">
                <label> Select Class</label>
                <select class="select2 col-xl-12 col-lg-12 col-12" id="class_id" name="class_id">
                    <option value="0">Select</option>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label> Select Stream</label>
                <select class="col-xl-12 col-lg-12 col-12" id="stream" name="stream">
                    <option value="">Select</option>
                    <?php
                        foreach ($GLOBAL_CLASS_STREAM as $stream) {
                           echo  '<option value="'.$stream.'" data-select2-id="">'.$stream.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label> Max Roll Number</label>
                <input type="text" id="action" name="action" value="add_new_record" autocomplete="off" name="form_action" style="display: none;">
                <input type="text" id="section_id" value="" autocomplete="off" name="section_id" style="display: none;">
                <input type="number" name="max_roll_number" id="max_roll_number" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5">
            <div class="form-group aj-form-group text-right view_trash">
                <button type="reset" id="reset_form" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                <button type="submit" id="button_name" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add New Section</button>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 mt-5 form_output">
        </div>
</form>
</div>
<div class="container">
    <div class="col-md-12 col-12 table-responsive text-right"><span class="trash_count"></span></div>
    <div class="col-md-12 col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Sections</th>
                    <th>Streams</th>
                    <th>Max Roll No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="section_data">
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './includes/scripts.php';
?>
<script src="js/myscript.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        load_classes();

        function load_classes() {
            const url = "./universal_apis.php?getAllClass=1";
            var html_data = '';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
                });
                $('.select2').append(html_data);
            });
        }
        $(document).on('change', '.select2', function() {
            var class_id = $(this).val();
            load_section_data(class_id);
            show_trash(class_id);
        });

        var class_id = $('.select2').val();
        load_section_data(class_id);

        function load_section_data(class_id) {
            var html_data = '';
            const url = "./universal_apis.php?getAllSections=1&class_id=" + class_id + "";
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<tr><td scope="row">' + value.Class_Name + '</td><td>' + value.Section + '</td><td>' + value.Stream + '</td><td>' + value.Max_Rollno + '</td><td><button class="btn btn-warning btn_edit" id="' + value.Class_Sec_Id + '"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button class="btn btn-danger btn_delete" id="' + value.Class_Sec_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                });
                $('.section_data').html(html_data);
            });
        }
        $(document).on('submit', '#section_form', function(event) {
            event.preventDefault();
            var class_id = $('.select2').val();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(data) {
                    $('.form_output').html(data);
                    window.setTimeout(function() {
                        $('.form_output').html('')
                    }, 3000);
                    load_section_data(class_id);
                }
            });
        });
        $(document).on('click', '.btn_edit', function(event) {
            event.preventDefault();
            var sec_id = $(this).attr('id');
            const url = './universal_apis.php?get_sec_details_by_id=1&sec_id=' + sec_id + '';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    $('#action').val('update_existing_record');
                    $('#max_roll_number').val(value.Max_Rollno);
                    $('#section_id').val(sec_id);
                    $("select#stream").val(value.Stream);
                    $("select.select2").val(value.Class_Id);
                    $('#button_name').html('Update Record');
                });
            });
        });
        $(document).on('click', '.btn_delete', function(event) {
            event.preventDefault();
            var sec_id = $(this).attr('id');
            var class_id = $('.select2').val();
            var del_type = 0;
            if (confirm("Are You Sure To Delete?")) {
                $.ajax({
                    url: './AddSection_1.php',
                    type: 'post',
                    data: {
                        'delete_section': 1,
                        'sec_id': sec_id,
                        'del_type': del_type
                    },
                    success: function(data) {
                        $('.form_output').html(data);
                        window.setTimeout(function() {
                            $('.form_output').html('')
                        }, 3000);
                        load_section_data(class_id);
                        show_trash(class_id);
                    }
                });
            }
        });
        $(document).on('click', '.btn_recycle', function(event) {
            event.preventDefault();
            var sec_id = $(this).attr('id');
            var class_id = $('.select2').val();
            var del_type = 1;
            if (confirm("Are You Sure To Restore?")) {
                $.ajax({
                    url: './AddSection_1.php',
                    type: 'post',
                    data: {
                        'delete_section': 1,
                        'sec_id': sec_id,
                        'del_type': del_type
                    },
                    success: function(data) {
                        $('.form_output').html(data);
                        window.setTimeout(function() {
                            $('.form_output').html('')
                        }, 3000);
                        load_section_data(class_id);
                        show_trash(class_id);
                        show_trasn_data(class_id);
                    }
                });
            }
        });

        function show_trash(class_id) {
            const url = './AddSection_1.php?count_trash=1&class_id=' + class_id + '';
            $.getJSON(url, function(response) {
                if (response == '0') {
                    $('.trash_count').html('No Trash <i class="fa fa-trash-o" aria-hidden="true">');
                    $('.trash_count').addClass('text-success');
                    $('.trash_count').removeClass('text-danger');
                } else {
                    $('.trash_count').html('' + response + ' Trash <i class="fa fa-trash" aria-hidden="true">');
                    $('.trash_count').addClass('text-danger');
                }
            });
        }
        $(document).on('click', '.trash_count', function() {
            show_trasn_data(class_id);
        });

        function show_trasn_data(class_id) {
            var class_id = $('.select2').val();
            const url = "./AddSection_1.php?getAllDeletedSections=1&class_id=" + class_id + "";
            var html_data = '';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<tr><td>' + value.Class_Name + '</td><td>' + value.Section + '</td><td>' + value.Stream + '</td><td>' + value.Max_Rollno + '</td><td><button class="btn btn-primary btn_recycle" id="' + value.Class_Sec_Id + '"><i class="fa fa-recycle" aria-hidden="true"></i></button> </td></tr>';
                });
                $('.section_data').append(html_data);
                $('.trash_count').fadeOut('slow');
            });
        }
        $('#reset_form').click(function(event) {
            event.preventDefault();
            $('#section_form')[0].reset();
            $('#action').val('add_new_record');
        });
    });
</script>
<?php
require_once './includes/closebody.php';
?>