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
                                            <table class="table-nbrdr">
                                                <tr>
                                                    <th colspan="2" class="cus-head-s">
                                                        Fee Recipt For <span class="receipt_for">Apr - 2020-Jul-2020</span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="35%">Name</th>
                                                    <td width="65%"><span class="student_name"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Admn No</th>
                                                    <td><span class="admission_no"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Class</th>
                                                    <td><span class="student_class"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Parent Name</th>
                                                    <td><span class="parent_name"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile No</th>
                                                    <td><span class="contact_no"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><span class="address"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Route Name</th>
                                                    <td><span class="route_name"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Stoppage</th>
                                                    <td><span class="drop_stop"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 payment_receivings">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 fee_details">

                                        </div>
                                        <div class="col-12 text-right" style="font-size: 10px;">
                                            Amount Received By: <span><strong class="staff_name"></strong></span>
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
            show_receipt("<?php echo $_GET['receipt_id']; ?>")

            function show_receipt(receipt_id) {
                const receipt_url = "./FeeReceiptAPI.php?receipt_id=" + receipt_id + "";
                var receiving_modes = '';
                var fee_details = ``;
                fee_details += `<table class="custom-table">
                                    <tr>
                                        <th colspan="5" class="cus-head">Fee Details</th>
                                    </tr>
                                    <tr>
                                        <th width="10%">Sl.</th>
                                        <th width="50%">Description</th>
                                        <th width="20%">Due</th>
                                        <th width="20%">Con</th>
                                        <th width="20%">Paid</th>
                                    </tr>`;
                receiving_modes += `<table class="custom-table">
                                        <tr>
                                            <th colspan="4" class="cus-head">
                                                Payment Receiving Modes
                                            </th>
                                        </tr>`;
                $.getJSON(receipt_url, function(receipt_response) {
                    if (receipt_response.type == 'success') {
                        $('.receipt_no').text(receipt_response.fee_Details.fee_receipt_no);
                        $('.receipt_date').text(receipt_response.fee_Details.receipt_date);
                        $('.receipt_for').text(receipt_response.fee_Details.fee_receipt_for);
                        $('.student_name').text(receipt_response.fee_Details.student_name);
                        $('.admission_no').text(receipt_response.fee_Details.admission_no);
                        $('.student_class').text(receipt_response.fee_Details.class);
                        $('.parent_name').text(receipt_response.fee_Details.parent_name);
                        $('.contact_no').text(receipt_response.fee_Details.contact_no);
                        $('.route_name').text(receipt_response.fee_Details.route_name);
                        $('.drop_stop').text(receipt_response.fee_Details.stoppage);
                        $('.address').text(receipt_response.fee_Details.address);
                        $('.staff_name').text(receipt_response.fee_Details.staff_name);;

                        $.each(receipt_response.fee_Details.payment_receiving_details, function(key, value_rec) {
                            $.each(value_rec, function(key, rec_details) {
                                receiving_modes += `<tr>
                                                    <td>${rec_details.transaction_type}</td>
                                                    <td>${rec_details.transaction_no}</td>
                                                    <td>${rec_details.instrument_no}</td>
                                                    <td>${rec_details.amount}</td>
                                                </tr>  `;
                            });
                            receiving_modes += `</table>`;
                            $('.payment_receivings').html(receiving_modes);
                        });

                        $.each(receipt_response.fee_Details.payment_details_fee_head_wise, function(key, value_rec) {
                            var i = 0;
                            $.each(value_rec, function(key, rec_details) {
                                i = i++;
                                fee_details += `<tr>
                                                    <td>${++i}</td>
                                                    <td>${rec_details.descriptiom}</td>
                                                    <td>${rec_details.due_amount}</td>
                                                    <td>${rec_details.concession}</td>
                                                    <td>${rec_details.paid}</td>
                                                </tr>  `;
                            });
                            fee_details += `<tr>
                                        <th colspan="2">Total</th><th><span class="total_due">${receipt_response.fee_Details.total_due_amt}</span></th><th><span class="total_conc">${receipt_response.fee_Details.total_concession_amount}</span></th><th><span class="total_paid">${receipt_response.fee_Details.total_paid_amuont}</span></th>
                                    </tr><tr>
                                        <th colspan="5">Amt. In Words : ${price_in_words(receipt_response.fee_Details.total_paid_amuont)} Rupees Only</th>
                                    </tr>                                
                                </table>`;
                            fee_details += `</table>`;
                            $('.fee_details').html(fee_details);
                        });

                    } else {
                        alert("No Record Found");
                        window.location.href = "./FeeCollection.php";
                    }
                });

                ///////////////
                function price_in_words(price) {
                    var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
                        dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
                        tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
                        handle_tens = function(dgt, prevDgt) {
                            return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
                        },
                        handle_utlc = function(dgt, nxtDgt, denom) {
                            return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
                        };

                    var str = "",
                        digitIdx = 0,
                        digit = 0,
                        nxtDigit = 0,
                        words = [];
                    if (price += "", isNaN(parseInt(price))) str = "";
                    else if (parseInt(price) > 0 && price.length <= 10) {
                        for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
                            case 0:
                                words.push(handle_utlc(digit, nxtDigit, ""));
                                break;
                            case 1:
                                words.push(handle_tens(digit, price[digitIdx + 1]));
                                break;
                            case 2:
                                words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
                                break;
                            case 3:
                                words.push(handle_utlc(digit, nxtDigit, "Thousand"));
                                break;
                            case 4:
                                words.push(handle_tens(digit, price[digitIdx + 1]));
                                break;
                            case 5:
                                words.push(handle_utlc(digit, nxtDigit, "Lakh"));
                                break;
                            case 6:
                                words.push(handle_tens(digit, price[digitIdx + 1]));
                                break;
                            case 7:
                                words.push(handle_utlc(digit, nxtDigit, "Crore"));
                                break;
                            case 8:
                                words.push(handle_tens(digit, price[digitIdx + 1]));
                                break;
                            case 9:
                                words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
                        }
                        str = words.reverse().join("")
                    } else str = "";
                    return str

                }
            }
        });
    </script>

</body>

</html>