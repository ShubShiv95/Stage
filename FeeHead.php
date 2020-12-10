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
                                <h3 class="mb-4">Fee cluster Structure</h3>
                            </div>
                            <form class="new-added-form school-form aj-new-added-form" action="./FeeControl_1.php" method="post" id="fee_header_form">
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-lg-10 col-12 aj-mb-2 form_output">
                                    </div>
                                    <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
                                        <div class="">
                                            <input type="text" name="fee_head_sender" class="d-none" autocomplete="off">
                                            <div class="row  mb-4">
                                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Fee Name <span>*</span></label>
                                                        <input type="text" name="fee_name" placeholder="" class="form-control">
                                                        <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Fee Print Label <span>*</span></label>
                                                        <input type="text" name="fee_print_label" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-12">
                                                    <div class="form-group aj-form-group">
                                                        <label>Select Fee Type</label>
                                                        <select class="select2" name="fee_type">
                                                            <option value="0">-- Select Fee Type --</option>
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Bi-Monthly">Bi-Monthly</option>
                                                            <option value="Quarterly">Quarterly</option>
                                                            <option value="Half-Yearly">Half-Yearly</option>
                                                            <option value="Annually">Annually</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8 col-lg-8 col-12">

                                                    <div class="form-group aj-form-group text-center">
                                                        <div class="row ml-3">
                                                            <h6>
                                                                <div class="radio mr-5">
                                                                    <span><input type="checkbox" class="sibling-bs" name="ref_fee_amt" checked="" value="1"> <b>Refundable Fee Amount</b></span>
                                                                </div>
                                                            </h6>
                                                            <h6>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="tax_benefit" value="1"> <b>Include In Tax Benifit Certificate</b></span>
                                                                </div>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-xl-4 col-12 text-right mb-5">
                                                    <button type="submit" name="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                                                </div>
                            </form>
                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                    <div class="table-responsive fee_head_data">
                                        <table class="table display ">
                                            <thead>
                                                <tr>
                                                    <th style="width: 25%;">Available Fee Heads. </th>
                                                    <th style="width: 15%;">Print Label</th>
                                                    <th style="width: 20%;">Fee Type </th>
                                                    <th style="width: 15%;">Refundable </th>
                                                    <th style="width: 15%;">Tax Benifit</th>
                                                    <th style="width: 10%;">Added By</th>
                                                </tr>
                                            </thead>
                                            <tbody class="top-position-ss">
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

            $(document).on('submit', '#fee_header_form', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('.form_output').html(data);
                        load_fee_head();
                        window.setTimeout(function() {
                            $('.form_output').html('');
                        }, 5000);
                        $('#fee_header_form')[0].reset();
                    }
                });
            });
            load_fee_head();

            function load_fee_head() {
                const fee_head_url = "./FeeControl_1.php?getall_feehead=1";
                $.getJSON(fee_head_url, function(data) {
                    html_data = '<table class="table display "><thead><tr><th style="width: 25%;">Available Fee Heads.  </th><th style="width: 15%;">Print Label</th><th style="width: 20%;">Fee Type </th><th style="width: 15%;">Refundable </th><th style="width: 15%;">Tax Benifit</th><th style="width: 10%;">Action</th></tr></thead><tbody class="top-position-ss">';
                    $.each(data, function(key, value) {
                        if (value.Refundable == 0) {
                            Refundables = '<button type="button" class="btn btn-danger"><i class="fas fa-times fa-2x"></i></button>';
                        } else {
                            Refundables = '<button type="button" class="btn btn-success"><i class="fas fa-check fa-2x"></i></i></button>';
                        }
                        if (value.Tax_Benifit == 0) {
                            Tax_Benifits = '<button type="button" class="btn btn-danger"><i class="fas fa-times fa-2x"></i></button>';
                        } else {
                            Tax_Benifits = '<button type="button" class="btn btn-success"><i class="fas fa-check fa-2x"></i></i></button>';
                        }
                        html_data += '<tr><td style="width: 25%;">' + value.Fee_Head_Name + '</td><td style="width: 15%;">' + value.Fee_Head_Type + '</td><td style="width: 20%;">' + value.Fee_Print_Lable + '</td><td style="width: 15%;">' + Refundables + '</td><td style="width: 15%;">' + Tax_Benifits + '</td><td style="width: 10%;"><button type="button" class="btn btn-danger delete_feehead_data" id="' + value.Fee_Head_Id + '"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button></td></tr>';
                    });
                    html_data += '<tbody>';
                    $('.fee_head_data').html(html_data);
                });
            }
            $(document).on('click', '.delete_feehead_data', function(event) {
                event.preventDefault();
                if (confirm("Are You Sure to Delete This Fee Head?")) {
                    const fee_head_id = $(this).attr('id');
                    $.ajax({
                        url: './FeeControl_1.php',
                        type: 'post',
                        data: {
                            'delete_fee_head': 1,
                            'fee_head_id': fee_head_id
                        },
                        success: function(data) {
                            $('.form_output').html(data);
                            load_fee_head();
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