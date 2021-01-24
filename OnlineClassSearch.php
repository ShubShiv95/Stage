<?php
$pageTitle = "Search Online Class";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
    <input type="text" name="online_class_sender" class="d-none" autocomplete="off">
    <input type="text" value="add_new_record" id="action" name="action" class="d-none">
    <?php
    if (empty($_SESSION["CLASSID"])) {
        echo   '<div class="col-xl-2 col-lg-2 col-md-2 col-6 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Class Name <span>*</span></label>
                                                        <select class="select2 col-12 class_name" id="class_name" name="class_name" required>
                                                            <option value="">SELECT Class</option>
                                                        </select>
                                                    </div>
                                                </div>';
    }
    ?>
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 aj-mb-2">
        <div class="form-group aj-form-group">
            <label>Subject</label>
            <select class="select2 subject_list col-12" id="subject_list" name="subject_list" required>
                <option value="">-- SELECT Subject --</option>
            </select>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-6 aj-mb-2">
        <div class="form-group aj-form-group">
            <label>Start Date <span>*</span></label>
            <input type="text" id="start_date" name="start_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" autocomplete="off" data-position='bottom right' required>
            <i class="far fa-calendar-alt"></i>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-6 aj-mb-2">
        <div class="form-group aj-form-group">
            <label>End Date <span>*</span></label>
            <input type="text" id="end_date" name="end_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" autocomplete="off" data-position='bottom right' required>
            <i class="far fa-calendar-alt"></i>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 aj-mb-2">
        <button type="button" id="search_class" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Search</button>
    </div>
    <div class="col-xl-12">
        <div class="container mt-5"><span id="test_data"></span>
            <div class="col-lg-12 display_search">
            </div>
        </div>
    </div>
</div>
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
        get_subject();

        function get_subject() {
            $('#subject_list').html('');
            var url = "./universal_apis.php?getAllSubjects=1";
            html_datas = '<option value="">SELECT Subject</option>';
            $.getJSON(url, function(responsesub) {
                $.each(responsesub, function(key, value) {
                    html_datas += '<option value="' + value.Subject_Id + '">' + value.Subject_Name + '</option>';
                });
                $('.subject_list').html(html_datas);
            });
        }
        $(document).on('click', '#search_class', function(event) {
            event.preventDefault();
            var class_name = $('#class_name').val();
            var subject_list = $('#subject_list').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            display_online_class(class_name, subject_list, start_date, end_date);
        });

        function display_online_class(class_name, subject, start_date, end_date) {
            var class_data = {
                'display_online_class': 1,
                'class': class_name,
                'subject': subject,
                'start_date': start_date,
                'end_date': end_date
            };
            $.get('./OnlineClassControl_1.php', class_data, function(rec_data) {
                $('.display_search').html(rec_data);
                var set_id = $('.clock_timer').text();
                console.log(set_id);

            });
        }

        $(document).on('click', '.btn_redirect', function(e) {
            event.preventDefault();
            const url = $(this).attr('id');
            const ocl_id = $(this).attr('res_id');
            var current_time = "<?php date_default_timezone_set('Asia/Kolkata');
                                echo date('Y-m-d H:i:s'); ?>";
            /*if(){
                
            }*/
            var att_data = {
                'make_att': 1,
                'ocl_id': ocl_id,
                url: url
            };
            $.post('./OnlineClassControl_1.php', att_data, function(data) {
                window.open(data);
            });
        });
        $(document).on('click', '.btn_delete', function(e) {
            e.preventDefault();
            if (confirm("Are You Sure to Delete?")) {
                var del_id = $(this).attr('id');
                var del_data = {
                    'delete_class': 1,
                    'del_id': del_id
                };
                $.post('./OnlineClassControl_1.php', del_data, function(response) {
                    alert('Online Class Has Been Deleted');
                    var class_name = $('#class_name').val();
                    var subject_list = $('#subject_list').val();
                    var start_date = $('#start_date').val();
                    display_online_class(class_name, subject_list, start_date);
                });
            }
        });

    });
</script>
<?php require_once './includes/closebody.php'; ?>