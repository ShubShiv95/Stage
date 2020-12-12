<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Admission Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>


</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <?php include('includes/navbar.php') ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php
            include 'includes/sidebar.php';
            ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <?php include('includes/hot-link.php'); ?>
                <div class="breadcrumbs-area">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Online Class</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Online Class</h3>
                            </div>
                            <form action="./OnlineClassControl_1.php" method="post" id="online_class_form">
                                <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form" >
                                    <input type="text" name="online_class_sender" class="d-none" autocomplete="off">
                                    <input type="text" value="add_new_record" id="action" name="action" class="d-none">
                                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Class Name <span>*</span></label>
                                            <select class="select2 class_name" id="class_name" name="class_name" required>
                                                <option value="">SELECT Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <div class="form-group aj-form-group">
                                            <label>Section *</label>
                                            <div class="box-scroll ">
                                                <div class="radio class_section"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <div class="form-group aj-form-group">
                                            <label>Subject</label>
                                            <select class="select2 subject_list" id="subject_list" name="subject_list" required>
                                                <option value="">-- SELECT Subject --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Staff</label>
                                            <select class="select2 staff_list" id="staff_list" name="staff_list" required>
                                                <option value="">-- SELECT Staff --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Topic</label>
                                            <input type="text" id="topic" name="tpoic" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Class Type</label>
                                            <select class="select2 class_type" id="class_type" name="class_type" required>
                                                <option value="">-- SELECT Type --</option>
                                                <option value="Zoom">Zoom</option>
                                                <option value="Google-Meet">Google-Meet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>URL</label>
                                            <input type="text" id="url" name="url" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Start Date <span>*</span></label>
                                            <input type="text" id="start_date" name="start_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker future-date" data-position='bottom right' required>
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Start Time</label>
                                            <input type="time" id="start_time" name="start_time" placeholder="" class="form-control start_time">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>End Date <span>*</span></label>
                                            <input type="text" id="end_date" name="end_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker future-date" data-position='bottom right' required>
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>End Time</label>
                                            <input type="time" id="end_time" name="end_time" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Duration</label>
                                            <input type="number" id="duration" name="duration" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Description</label>
                                            <textarea type="text" rows="4" name="class_description" id="class_description" placeholder="" class="aj-form-control"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 mt-5 form_output">
                                    </div>
                                    <div class="col-12 text-right mt-3">
                                        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script src="js/myscript.js"></script>
    <script src="js/webcam.min.js"></script>
    <script type="text/javascript" src="js/ajax-function.js"></script>
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

            get_staff_list();
            function get_staff_list() {
                $('#staff_list').html('');
                var url = "./universal_apis.php?get_all_staff_list=1";
                html_datast = '<option value="">SELECT Staff</option>';
                $.getJSON(url, function(responsestaff) {
                    $.each(responsestaff, function(key, value) {
                        html_datast += '<option value="' + value.Staff_Id+ '">' + value.Staff_Name + '</option>';
                    });
                    $('.staff_list').html(html_datast);
                });
            }

            $(document).on('change', '.class_name', function() {
                var class_id = $(this).val();
                var url = "./universal_apis.php?getAllSections=1&class_id=" + class_id + "";
                html_data = '';
                $.getJSON(url, function(response) {
                    $.each(response, function(key, value) {
                        html_data += '<span><input type="checkbox" class="gaurdian-bs" name="class_section[]" checked="" value="' + value.Class_Sec_Id + '"> ' + value.Section + '</span>';
                    });
                    $('.class_section').html(html_data);
                });
            });
            $(document).on('submit','#online_class_form',function(event){
                event.preventDefault();
                var data = $(this).serialize();
                $.post($(this).attr('action'),data,function(response){
                    $('.form_output').html(response);
                    //$('#online_class_form')[0].reset();
                });
            });
        });
    </script>
</body>

</html>