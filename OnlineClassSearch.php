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
                        <li>View Online Session</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">View Online Session</h3>
                            </div>
                            <div>
                                <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
                                    <input type="text" name="online_class_sender" class="d-none" autocomplete="off">
                                    <input type="text" value="add_new_record" id="action" name="action" class="d-none">
                                    <?php
                                    if (empty($_SESSION["CLASSID"])) {
                                        echo   '<div class="col-xl-2 col-lg-2 col-md-2 col-6 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Class Name <span>*</span></label>
                                                        <select class="select2 class_name" id="class_name" name="class_name" required>
                                                            <option value="">SELECT Class</option>
                                                        </select>
                                                    </div>
                                                </div>';
                                    }
                                    ?>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-6 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Subject</label>
                                            <select class="select2 subject_list" id="subject_list" name="subject_list" required>
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


                /*function check_tr_fl(set_id) {
                    var data = {
                        'set_id': set_id
                    };
                    $.get('./heart_bead.php', data, function(response) {
                        $('#test_data').html(response);
                    });
                }*/

            });
        </script>
</body>

</html>