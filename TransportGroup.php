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
                <div class="breadcrumbs-area">

                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Fee cluster Structure</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Transport Group</h3>
                            </div>
                            <!-- <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div> -->
                            <form class="new-added-form school-form aj-new-added-form" id="fee_cluster_form" action="./FeeControl_1.php" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
                                        <div class="">
                                            <!--h5 class="text-center">Student Attendence Message</h5-->
                                            <div class="row justify-content-center mb-4">
                                                <input type="text" name="transport_cluster_Sender" id="" autocomplete="off" class="d-none">
                                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Fee Cluster Name <span>*</span></label>
                                                        <input type="text" id="cluster_name" name="cluster_name" placeholder="" class="form-control">
                                                        <p class="mt-2  font-size-14 line-height-14 cluster_check">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Master Account</label>
                                                        <select class="select2 show_school" name="cluster_school_name">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 mb-3">
                                                    <div class="form-group aj-form-group">
                                                        <label>Student Type</label>
                                                        <select class="select2" name="student_type">
                                                            <option value="">-- Type --</option>
                                                            <option value="New">New</option>
                                                            <option value="Existing">Existing</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-xl-6 col-12 text-right mb-3">
                                                    <button type="submit" name="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-12 mb-3 form_output">

                                                </div>
                            </form>
                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2  border border-primary">
                                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                    <div class="table-responsive ">
                                        <table class="table display ">
                                            <thead>
                                                <tr>
                                                    <th style="width: 25%;">Fee Cluster Name </th>
                                                    <th style="width: 20%;">Class </th>
                                                    <th style="width: 30%;">School Account</th>
                                                    <th style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="top-position-ss display_data">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
            get_all_schools();

            function get_all_schools() {
                const url = './universal_apis.php?get_school_name=1';
                html_data = '<option value="0">-- Master Account --</option>';
                $.getJSON(url, function(data) {
                    $.each(data, function(key, value) {
                        html_data += '<option value="' + value.school_id + '">' + value.school_name + '</option>';
                    });
                    $('.show_school').html(html_data);
                });
            }
            get_all_class();

            function get_all_class() {
                const url = './universal_apis.php?getAllClass=1';
                var html_data = '';
                $.getJSON(url, function(data) {
                    $.each(data, function(key, value) {
                        html_data += '<li><div class="radio"><span><input type="checkbox" value="' + value.Class_Id + ',' + value.Class_No + '" class="sibling-bs class_name_checks" name="class_names[]"> <b>' + value.Class_Name + '</b></span></div></li>';
                    });
                    $('.pop_class_names').html(html_data);
                });
            }
            $('#cluster_name').blur(function() {
                const cluster_name = $(this).val();
                $.ajax({
                    url: './FeeControl_1.php',
                    type: 'get',
                    data: {
                        'check_cluster_name': 1,
                        'cluster_name': cluster_name
                    },
                    success: function(data) {
                        $('.cluster_check').html(data);
                    }
                });
            });
            $(document).on('submit', '#fee_cluster_form', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('.form_output').html(data);
                        get_cluster_list();
                    }
                });
            });
            get_cluster_list();

            function get_cluster_list() {
                const ulr =  './FeeControl_1.php?get_all_clusters=1&fee_type=Transport';
                var html_data = '';
                $.getJSON(ulr, function(data) {
                    $.each(data, function(key, value) {
                        html_data += '<tr><td style="width: 25%;">' + value.FG_Name + '</td><td style="width: 20%;">' + value.Class_Name + '</td><td style="width: 30%;">' + value.school_name + '</td><td style="width: 5%"><button class="btn btn-danger del_cluster" id="' + value.FGCL_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                    });
                    $('.display_data').html(html_data);
                });
            }
            $(document).on('click', '.del_cluster', function(event) {
                event.preventDefault();
                var cluster_class_id = $(this).attr('id');
                if (confirm("Are You Sure To Delete")) {
                    $.ajax({
                        url: './FeeControl_1.php',
                        type: 'post',
                        data: {
                            'delete_cluster_class': 1,
                            'cluster_class_id': cluster_class_id
                        },
                        success: function(data) {
                            $('.form_output').html(data);
                            get_cluster_list();
                            window.setTimeout(function() {
                                $('.form_output').html('');
                            }, 3000)
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>