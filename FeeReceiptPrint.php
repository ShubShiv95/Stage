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
    <link rel="stylesheet" media="screen,print" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen,print" href="css/bootstrap.min.css">
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
    <link rel="stylesheet" href="./css/custom_table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
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
                <!-- Hot Links Area Start Here -->
                <?php include('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1 d-print-none">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Print Fee Receipt</h3>
                            </div>
                        </div>
                        <!-- sample 1 <div class="col-12 table-reponsive mt-5 row border border-dark">
                            <div class="row">
                                <div class="col-6 text-center p-3 head-brdr">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="img-tbl-logo" src="./app_images/school_images/square_logo.jpg" alt="">
                                        </div>
                                        <div class="col-md-9 ">
                                            <img class="img-tbl" src="./app_images/school_images/logo_text.jpg" alt="">
                                            <p class="head-text-table">Affilicated By: CBSE, New Delhi JH101</p>
                                            <p class="head-text-table">Bokaro Steel City, Bokaro, Jharkhand</p>
                                            <p class="head-text-table">Phone : +91-9489510124</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-3 "></div>
                                <div class="col-3 mb-2 head-brdr">
                                    <strong>Receipt No :</strong> <span class="receipt_no">1234/2020</span>
                                </div>
                                <div class="col-3 mb-2 text-right head-brdr">
                                    <strong>Date :</strong> <span class="receipt_date">12/34/2020</span>
                                </div>
                                <div class="col-3 mb-2"></div>
                                <div class="col-3 mb-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="2" class="cus-head">
                                                        Fee Recipt For Apr - 2020-Jul-2020
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Name</th>
                                                    <td width="70%">Anant Kumar Singh</td>
                                                </tr>
                                                <tr>
                                                    <th>Admn No</th>
                                                    <td>DPS/20/2020</td>
                                                </tr>
                                                <tr>
                                                    <th>Class</th>
                                                    <td>8(B)</td>
                                                </tr>
                                                <tr>
                                                    <th>Parent Name</th>
                                                    <td>Mr. Dinesh Lal Chadda & Manju Chadda</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile No</th>
                                                    <td>+91-9865987458</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>bokaro Steel, Coty, Jharkhand</td>
                                                </tr>
                                                <tr>
                                                    <th>Route Name</th>
                                                    <td>Route - 2</td>
                                                </tr>
                                                <tr>
                                                    <th>Stoppage</th>
                                                    <td>Sector - 5</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount</th>
                                                    <td>17560</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="2" class="cus-head">
                                                        Payment Receiving Modes
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Cash</th>
                                                    <td width="70%">8000</td>
                                                </tr>
                                                <tr>
                                                    <th>Credit Card</th>
                                                    <td>8000</td>
                                                </tr>
                                                <tr>
                                                    <th>Cheque</th>
                                                    <td>8000</td>
                                                </tr>
                                                <tr>
                                                    <th>DD</th>
                                                    <td>8000</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="5" class="cus-head">Fee Details</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Description</th>
                                                    <th>Due</th>
                                                    <th>Con</th>
                                                    <th>Paid</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>  
                                                <tr>
                                                    <td>3</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>  
                                                <tr>
                                                    <td>4</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <th colspan="2">Total</th><th>32000</th><th>2000</th><th>32000</th>
                                                </tr>                                                        <tr>
                                                    <th>Amt. In Words</th><th colspan="4">Thirty Two Thousand Rupees Only</th>
                                                </tr>                                
                                            </table>
                                        </div>
                                        <div class="col-12 text-right" style="font-size: 10px;">
                                            Amount Received By: <span><strong>Rekesh Mehra</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <p style="font-size: 10px;">Note : This is Computer Generated Receipt Doesn't Require Any Authenticaltion</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- sample 3-->
                        <!--<div class="col-12 table-reponsive mt-5 row border border-dark">
                            <div class="row">
                                <div class="col-6 text-center p-3 head-brdr">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="img-tbl-logo" src="./app_images/school_images/square_logo.jpg" alt="">
                                        </div>
                                        <div class="col-md-9 ">
                                            <img class="img-tbl" src="./app_images/school_images/logo_text.jpg" alt="">
                                            <p class="head-text-table">Affilicated By: CBSE, New Delhi JH101</p>
                                            <p class="head-text-table">Bokaro Steel City, Bokaro, Jharkhand</p>
                                            <p class="head-text-table">Phone : +91-9489510124</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-3 "></div>
                                <div class="col-3 mb-2 head-brdr">
                                    <strong>Receipt No :</strong> <span class="receipt_no">1234/2020</span>
                                </div>
                                <div class="col-3 mb-2 text-right head-brdr">
                                    <strong>Date :</strong> <span class="receipt_date">12/34/2020</span>
                                </div>
                                <div class="col-3 mb-2"></div>
                                <div class="col-3 mb-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="2" class="cus-head">
                                                        Fee Recipt For Apr - 2020-Jul-2020
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Name</th>
                                                    <td width="70%">Anant Kumar Singh</td>
                                                </tr>
                                                <tr>
                                                    <th>Admn No</th>
                                                    <td>DPS/20/2020</td>
                                                </tr>
                                                <tr>
                                                    <th>Class</th>
                                                    <td>8(B)</td>
                                                </tr>
                                                <tr>
                                                    <th>Parent Name</th>
                                                    <td>Mr. Dinesh Lal Chadda & Manju Chadda</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile No</th>
                                                    <td>+91-9865987458</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>bokaro Steel, Coty, Jharkhand</td>
                                                </tr>
                                                <tr>
                                                    <th>Route Name</th>
                                                    <td>Route - 2</td>
                                                </tr>
                                                <tr>
                                                    <th>Stoppage</th>
                                                    <td>Sector - 5</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount</th>
                                                    <td>17560</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="2" class="cus-head">
                                                        Payment Receiving Modes
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Cash</th>
                                                    <td width="70%">8000</td>
                                                </tr>
                                                <tr>
                                                    <th>Credit Card</th>
                                                    <td>8000</td>
                                                </tr>
                                                <tr>
                                                    <th>Cheque</th>
                                                    <td>8000</td>
                                                </tr>
                                                <tr>
                                                    <th>DD</th>
                                                    <td>8000</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="5" class="cus-head">Fee Details</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Description</th>
                                                    <th>Due</th>
                                                    <th>Con</th>
                                                    <th>Paid</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <th>32000</th>
                                                    <th>2000</th>
                                                    <th>32000</th>
                                                </tr>
                                                <tr>
                                                    <th>Amt. In Words</th>
                                                    <th colspan="4">Thirty Two Thousand Rupees Only</th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 text-right" style="font-size: 10px;">
                                            Amount Received By: <span><strong>Rekesh Mehra</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <p style="font-size: 10px;">Note : This is Computer Generated Receipt Doesn't Require Any Authenticaltion</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- sample 2-->
                        <div class="col-12 table-reponsive mt-5 row border border-dark">
                            <div class="row">
                                <div class="col-12 text-center p-3 head-brdr">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="img-tbl-logo" src="./app_images/school_images/logo.jpeg" alt="">
                                        </div>
                                        <div class="col-md-12">
                                            <p class="head-text-table">Affilicated By: CBSE, New Delhi JH101</p>
                                            <p class="head-text-table">Bokaro Steel City, Bokaro, Jharkhand</p>
                                            <p class="head-text-table">Phone : +91-9489510124</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-2 head-brdr">
                                    <strong>Receipt No :</strong> <span class="receipt_no">1234/2020</span>
                                </div>
                                <div class="col-6 mb-2 text-right head-brdr">
                                    <strong>Date :</strong> <span class="receipt_date">12/34/2020</span>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table-nbrdr" >
                                                <tr>
                                                    <th colspan="2" class="cus-head-s">
                                                        Fee Recipt For Apr - 2020-Jul-2020
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="35%">Name</th>
                                                    <td width="65%">Anant Kumar Singh</td>
                                                </tr>
                                                <tr>
                                                    <th>Admn No</th>
                                                    <td>DPS/20/2020</td>
                                                </tr>
                                                <tr>
                                                    <th>Class</th>
                                                    <td>8(B)</td>
                                                </tr>
                                                <tr>
                                                    <th>Parent Name</th>
                                                    <td>Mr. Dinesh Lal Chadda & Manju Chadda</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile No</th>
                                                    <td>+91-9865987458</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>bokaro Steel, Coty, Jharkhand</td>
                                                </tr>
                                                <tr>
                                                    <th>Route Name</th>
                                                    <td>Route - 2</td>
                                                </tr>
                                                <tr>
                                                    <th>Stoppage</th>
                                                    <td>Sector - 5</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="4" class="cus-head">
                                                        Payment Receiving Modes
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Tr Type</th><th>Tr. No</th><th>Ins. No</th><th>Amt</th>
                                                </tr>
                                                <tr>
                                                    <td>Cash</td>
                                                    <td>NA</td>
                                                    <td>NA</td>
                                                    <td>8000</td>
                                                </tr>
                                                <tr>
                                                    <td>CC</td>
                                                    <td>12345685688</td>
                                                    <td>1332549</td>
                                                    <td>8000</td>
                                                </tr> 
                                                <tr>
                                                    <td>CC</td>
                                                    <td>12345685688</td>
                                                    <td>1332549</td>
                                                    <td>8000</td>
                                                </tr> 
                                                <tr>    
                                                    <td>CC</td>
                                                    <td>12345685688</td>
                                                    <td>1332549</td>
                                                    <td>8000</td>
                                                </tr>                                                  
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="custom-table">
                                                <tr>
                                                    <th colspan="5" class="cus-head">Fee Details</th>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Sl.</th>
                                                    <th width="50%">Description</th>
                                                    <th width="20%">Due</th>
                                                    <th width="20%">Con</th>
                                                    <th width="20%">Paid</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>  
                                                <tr>
                                                    <td>3</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>  
                                                <tr>
                                                    <td>4</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <td>5</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <td>6</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <td>7</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <td>8</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr> 
                                                <tr>
                                                    <td>9</td>
                                                    <td>Admission Fee</td>
                                                    <td>8000</td>
                                                    <td>500</td>
                                                    <td>7500</td>
                                                </tr>                                            
                                                <tr>
                                                    <th colspan="2">Total</th><th>32000</th><th>2000</th><th>32000</th>
                                                </tr>                                                        <tr>
                                                    <th colspan="5">Amt. In Words : Thirty Two Thousand Ninteen Hundred Ninteen Rupees Only</th>
                                                </tr>                                
                                            </table>
                                        </div>
                                        <div class="col-12 text-right" style="font-size: 10px;">
                                            Amount Received By: <span><strong>Rekesh Mehra</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <p style="font-size: 10px;">Note : This is Computer Generated Receipt Doesn't Require Any Authenticaltion</p>
                                        </div>
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
    <footer class="footer-wrap-layout1 d-print-none">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
    </div>
    </div>
    <style>
        @media print {

            .nav,
            .nav-item,
            .hot-link-main-sec {
                display: none;
            }
        }
    </style>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>

</body>

</html>