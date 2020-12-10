<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

$query = "SELECT * FROM `instalment_master_table` WHERE School_Id = " . $_SESSION["SCHOOLID"] . " AND Enabled = 1 ORDER BY `Installment_Id`";
$data = array();
$query_prep = $dbhandle->prepare($query);
$query_prep->execute();
$result_set = $query_prep->get_result();
while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
}
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
                            <form action="./FeeControl_1.php" method="post" id="cluster_form">
                                <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
                                    <input type="text" name="online_class_sender" class="d-none" autocomplete="off">
                                    <input type="text" name="add_new_record" id="action" name="action" class="d-none">
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
                                            <select class="select2 class_section" id="class_section" name="class_section" required>
                                                <option value="">-- SELECT Section --</option>
                                            </select>
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
                                            <input type="text" id="start_time" name="start_time" placeholder="" class="form-control">
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
                                            <input type="text" id="end_time" name="end_time" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Duration</label>
                                            <input type="text" id="duration" name="duration" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Description</label>
                                            <textarea type="text" rows="4" name="commAddress" id="commAddress" placeholder="" class="aj-form-control"> </textarea>
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
                        <div class="container mt-5">
                            <div class="col-lg-12">
                                <div class="jumbotron jumbotron-fluid shadow" style="border: 1px solid orange;border-radius:10px;">
                                    <div class="container">
                                        <h4 class="display-4">Topic</h4>
                                        <p class="lead">Description</p>
                                        <hr class="my-2">
                                        <div class="row">
                                            <div class="col-md-6"><p>Class (Section) </p></div>
                                            <div class="col-md-6"><p>Subject</p></div>
                                            <div class="col-md-6"><p>Start Time</p></div>
                                            <div class="col-md-6"><p>End Time</p></div>
                                        </div>
                                        <p class="lead">
                                            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Click To Join</a>
                                        </p>
                                        <div class="text-right">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-alt    "></i></button> 
                                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-lg-12 table-responsive">
                                <table class="table table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Topic</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Subject</th>
                                            <th>Start Date-Time</th>
                                            <th>End Date-Time</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">asd</td>
                                                <td>asd</td>
                                                <td>asd</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">asd</td>
                                                <td>asd</td>
                                                <td>sda</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>-->
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
                var url = "./universal_apis.php?getAllSubjects=1";
                html_data = '<option value="">SELECT Subject</option>';
                $.getJSON(url, function(response) {
                    $.each(response, function(key, value) {
                        html_data += '<option value="' + value.Subject_Id + '">' + value.Subject_Name + '</option>';
                    });
                    $('.subject_list').html(html_data);
                });
            }
            $(document).on('change', '.class_name', function() {
                var class_id = $(this).val();
                var url = "./universal_apis.php?getAllSections=1&class_id=" + class_id + "";
                html_data = '<option value="">-- SELECT Section --</option>';
                $.getJSON(url, function(response) {
                    $.each(response, function(key, value) {
                        html_data += '<option value="' + value.Class_Sec_Id + '">' + value.Section + '</option>';
                    });
                    $('.class_section').html(html_data);
                });
            });
        });
    </script>
</body>

</html>