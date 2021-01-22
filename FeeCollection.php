<?php
require_once './includes/header.php';
require_once 'dbobj.php';

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash d-print-none">
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
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Collect Fee</h3>
                            </div>

                        </div>
                        <form class="new-added-form aj-new-added-form Fee-collection" id="fee_collection_form" action="./FeeCollection2.php" method="post">
                            <input type="text" name="collect_fee_sender" id="" class="d-none" autocomplete="off">
                            <div class="row justify-content-center">
                                <div class="col-xl-3 col-lg-3 col-12 aj-md-2">
                                    <div class="col-xl-12 col-lg-12 aj-md-2">
                                        <div class="container-img shadow" style="width:150px; margin-left: auto;margin-right: auto;height:150px;">
                                            <img class="main_img" src="" alt="">
                                        </div>

                                    </div>
                                    <div class="col-xl-12 col-lg-12 aj-md-2 mt-2">
                                        <div class="list-group ">
                                            <a href="#" class="list-group-item list-group-item-action active">Sibling Info</a>
                                            <a href="#" class="list-group-item list-group-item-action"><span class="sibling_1">Sibling 1</span> <span><button class="btn btn-success btn-sm btn_sibling_1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></span></a>
                                            <a href="#" class="list-group-item list-group-item-action"><span class="sibling_2">Sibling 2</span> <button class="btn btn-success btn-sm btn_sibling_2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-12 aj-mb-2">
                                    <div class="row  mb-4 ">
                                        <!-- First Row -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="form-group aj-form-group col-xl-10 col-lg-10 col-md-10 col-10">
                                                    <label>Student Id <span>*</span></label>
                                                    <input type="text" name="student_id" id="student_id" placeholder="" required="" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-2">
                                                    <button class="btn btn-warning btn-lg mt-1" type="button" id="name_search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 form-group">
                                                    <div class="form-group aj-form-group">
                                                        <label>Student Name <span>*</span></label>
                                                        <input type="text" name="student_name_dispkay" id="student_name_dispkay" placeholder="" value="" required="" class="form-control first_name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group aj-form-group col-xl-12 col-lg-12 col-md-12 col-12">
                                                    <label>Class <span>*</span></label>
                                                    <input type="text" name="student_class" id="student_class" placeholder="" required="" class="form-control student_class">
                                                </div>
                                                <div class="form-group aj-form-group col-xl-12 col-lg-12 col-md-12 col-12">
                                                    <label>Concession Group <span>*</span></label>
                                                    <input type="text" name="student_concession" id="student_concession" placeholder="" required="" class="form-control student_concession">
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Father's Name</label>
                                                        <input type="text" name="father_name" placeholder="" required="" readonly class="form-control st_father_name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Mother's Name</label>
                                                        <input type="text" readonly name="" placeholder="" required="" class="form-control st_mother_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- first Row ends -->
                                        <!-- Second Row starts-->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                                    <div class="Attendance-staff  aj-scroll-Attendance-staff " style="height: 38vh; overflow-x:auto;">
                                                        <div class="table-responsive text-center">
                                                            <table class="table display" style="font-size: 1.5rem; width:100%">
                                                                <tr style="background-color: #ffae01!important;">
                                                                    <th style="width: 30%;">Inst. Name </th>
                                                                    <th style="width: 25%;">Due Amt</th>
                                                                    <th style="width: 20%;">Details</th>
                                                                    <th style="width: 25%;">Select</th>
                                                                </tr>
                                                                <tbody class="load_dyn_fee_data">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Second Row ends -->
                                        <!-- third Row starts -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-12 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>School Name </label>
                                                        <select class="select2 show_school" name="school_name" id="show_school" >
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>A/C Type </label>
                                                        <select class="select2 account_type col-12" name="ac_type" id="account_type">
                                                            <option value="SchoolBusFee">School and Bus Fee</option>
                                                            <option value="SchoolFee">School Fee</option>
                                                            <option value="BusFee">Bus Fee</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Pay Date <span>*</span></label>
                                                        <input type="text" name="date_of_receipt" placeholder="DD/MM/YYYY" value="<?php echo date('Y-m-d') ?>" class="form-control pay_date air-datepicker" id="pay_date" data-position="bottom right" autocomplete="off" required="">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Session <span>*</span></label>
                                                        <select class="select2" name="school_session" id="school_session">
                                                            <?php
                                                            $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                                                            $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365));
                                                            echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                                <option value="' . $next_session . '">' . $next_session . '</option>';
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Late Fee</label>
                                                        <input type="text" name="late_fee" id="late_fee" placeholder="" required="" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Re Adm. Fee</label>
                                                        <input type="text" name="readmission_fee" placeholder="" value="0" id="readmission_fee" required="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Adv. Amount</label>
                                                        <input type="text" name="excess_amt" id="advance_fee" placeholder="" required="" class="form-control" value="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>On Demand Fee</label>
                                                        <input type="text" name="student_fine" id="fine_fee" placeholder="" required="" class="form-control" value="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Discount</label>
                                                        <input type="text" name="discount_fee" id="discount_fee" placeholder="" required="" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-6 aj-mb-2 mb-4">
                                                    <div class="form-group aj-form-group">
                                                        <label>Chq Bounce Chg.</label>
                                                        <input type="text" id="cheque_bounce" name="cheque_bounce" placeholder="" required="" value="0" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-6 aj-mb-2" style="overflow-y: auto; height:10vh">
                                                    <table class="text-center chq_bounce_table" style="border: 1px solid #ffae01!important; width:100%">

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- third Row ends -->
                                    </div>
                                </div>
                                <div class="col-lg-9" style="overflow-y:auto; height:16vh; ">
                                    <table style="width:100%; ">
                                        <thead>
                                            <tr style="background-color: #ffae01!important;">
                                                <th>Paymode </th>
                                                <th>Instrument No</th>
                                                <th>Instrument Date</th>
                                                <th>Bank Name</th>
                                                <th>Amount </th>
                                                <th>Amt ( Inc . Chgs. ) </th>
                                            </tr>
                                        </thead>
                                        <tbody id="dContecnt">
                                            <tr>
                                                <td style="width: 5%;">
                                                    <div class="form-group aj-form-group mt-2">
                                                        <select id="payment_type1" class="payment_type1 pmt_hide_elements pay_modes" name="payment_type[]">
                                                            <option value="0">-- Select --</option>
                                                            <option value="1">-- Cash --</option>
                                                            <option value="2">-- Cheque --</option>
                                                            <option value="3">-- CC --</option>
                                                            <option value="4">-- DD --</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" name="instrument_no[]" placeholder="" required="" class="form-control instrument_no1 " style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem">
                                                </td>
                                                <td>
                                                    <input type="date" name="payment_date[]" required="" placeholder="dd/mm/yyyy" class="form-control insttument_date1" data-position="bottom right" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem">
                                                </td>
                                                <td style="width: 10%;">
                                                    <select id="bank_neme1" class="bank_name1" name="bank_name[]" style="height:38px; border: 1px solid #ffae01!important;">
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="amount_receiving[]" id="amount_receiving1" placeholder="" value="0" required="" class="form-control amt_receiving" onkeypress="adddRowRow(event)" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem">
                                                </td>
                                                <td>
                                                    <input type="number" name="amt_incl_taxex[]" placeholder="" required="" id="rec_amt1" class="form-control on-chang amt_receiving_all_taxex" add="1" value="0" onkeypress="adddRowRow(event)" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xl-3 col-lg-3 mb-3">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Due</label>
                                                <input type="number" name="due_amt" id="due_amt" placeholder="" readonly="" value="0" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Service</label>
                                                <input type="number" value="0" id="services" name="services" placeholder="" readonly="" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mt-3">
                                            <div class="form-group aj-form-group">
                                                <label>Paid</label>
                                                <input type="number" id="paid_amt" name="paid_amt" placeholder="" readonly="" required="" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mt-3">
                                            <div class="form-group aj-form-group">
                                                <label>Balance</label>
                                                <input type="number" value="0" name="amount_balance" id="amount_balance" placeholder="" readonly="" required="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-lg-12 col-xl-12 col-12 form_output  text-right">
                                    <div class="row">
                                        <div class="col-12"><input type="checkbox" name="bal_amt_as_adv" id=""> <label>Keep Balance Amount As Advance</label></div>
                                    </div>
                                </div>-->
                                <div class="col-lg-8 col-xl-8 col-12 mt-3 form_output">
                                </div>
                                <div class="col-lg-4 col-xl-4 col-12 mt-3 text-right">
                                    <button type="submit" name="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark submit_btn">Save Payment</button>
                                    <!--<button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Receipt Detail</button>-->
                                </div>
                            </div>
                    </div>
                </div>
                </form>
                <span id="total_rows" class="d-none">1</span>
                <span class="total_due_amount_month_wise d-none" id="total_due_amount_month_wise"></span>
                <span class="total_other_amount d-none" id="total_other_amount"></span>
                <span class="total_json_row d-none"></span>
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
    <div class="modal details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Fee Head Details</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="model-tebal-in">
                        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                            <form class="new-added-form aj-new-added-form Fee-collection" action="" method="post">
                                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                    <div class="table-responsive">
                                        <table class="table display modal_table text-center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30%;">Head Name </th>
                                                    <th style="width: 20%;">Amount </th>
                                                    <th style="width: 20%;">Con Amt </th>
                                                </tr>
                                            </thead>
                                            <tbody class="top-position-ss ">
                                                <tr>
                                                    <td style="width: 30%;">Tuition Fee</td>
                                                    <td style="width: 20%;">2600</td>
                                                    <td style="width: 20%;">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="modal serach_student">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Search Student</h6>
                    <button type="button" class="close close_st_mod" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="model-tebal-in">
                        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                            <form class="new-added-form aj-new-added-form Fee-collection" action="" method="post">
                                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2 mt-3 ml-1 row">
                                        <div class="form-group aj-form-group col-xl-10 col-lg-10 col-12">
                                            <label>Student Name</label>
                                            <input type="text" id="student_name" name="student_name" placeholder="" autocomplete="off" required="" class="form-control">
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-1 aj-mb-2">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" id="search_data">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mt-2 table-responsive populate_student_list form_output">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>
    <style>
        .cus-border {
            border: 1px solid #ffae01 !important;
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
    <!------- ******** -------->
    <script>
        function adddRowRow(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                var total_rows = $('#total_rows').text();
                var new_row_no = parseInt(total_rows) + 1;
                $('#total_rows').text(new_row_no);
                $(this).attr('add', 1);
                var cnt = '<tr><td ><div class="form-group aj-form-group"><select  id="payment_type' + new_row_no + '" class="payment_type' + new_row_no + ' pmt_hide_elements pay_modes" name="payment_type[]"></select></div></td><td ><div class="form-group aj-form-group"><input type="number" name="instrument_no[]" placeholder="" required="" class="form-control instrument_no' + new_row_no + '" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem"></td><td ><input type="date" name="payment_date[]" required="" placeholder="dd/mm/yyyy" class="form-control insttument_date' + new_row_no + '" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem"></td><td ><select id="bank_neme' + new_row_no + '"" class="bank_name' + new_row_no + '" name="bank_name[]" style="height:38px; border: 1px solid #ffae01!important;"><option value="0">Select Bank</option><option value="3">Bank Of Baroda</option><option value="1">Indian Overseas Bank</option><option value="2">State Bank Of Maharashtra</option></select></td><td><input type="number" name="amount_receiving[]" value="0" id="amount_receiving' + new_row_no + '" placeholder="" required="" class="form-control amt_receiving dyn_inp" onkeypress="adddRowRow(event)" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem"></td><td ><input type="number" name="amt_incl_taxex[]" placeholder="" required="" class="form-control dyn_inp on-chang amt_receiving_all_taxex" value="0" id="rec_amt' + new_row_no + '" onkeypress="adddRowRow(event)" add="' + new_row_no + '" style="height:38px; border: 1px solid #ffae01!important;font-size:1.5rem"></div></td></tr>';
                $('#dContecnt').append(cnt);
                get_pmt_modes(new_row_no);
                get_all_banks(new_row_no);
            }
        }

        // get payment modes
        get_pmt_modes(1);

        function get_pmt_modes(pmt_no) {
            modes_html = '';
            modes_html += '<option value="0">Choose Mode</option>';
            const modes_url = "universal_apis.php?get_payment_modes=1";
            $.getJSON(modes_url, function(modes_resp) {
                var i = 1;
                $.each(modes_resp, function(key, value) {
                    var pmt_mode_val = value.Paymode_Id + "," + value.Service_Percent;
                    modes_html += `<option value="${pmt_mode_val}" >${value.Paymode_Nane}</option>`;
                    i = i + 1;
                });
                $('.payment_type' + pmt_no).html(modes_html);
            });
        }
        // get payment modes
        get_all_banks(1);

        function get_all_banks(serial_no) {
            banks_html = '';
            banks_html += '<option value="0">Choose Bank</option>';
            const banks_url = "universal_apis.php?get_all_banks=1";
            $.getJSON(banks_url, function(bank_resp) {
                $.each(bank_resp, function(key, value) {
                    banks_html += `<option value="${value.bank_id}" >${value.bank_name}</option>`;
                });
                $('.bank_name' + serial_no).html(banks_html);
            });
        }
        $(document).ready(function() {
            $('#student_id').focusin();

            function load_fee_details(student_id) {
                $('.load_dyn_fee_data').html('');
                var ac_type = $("#account_type").val(); //$('.account_type').val();
                var school_id = $('.show_school').val();
                var curr_session = $('#school_session').val();
                const fee_url = "./FeeCollectionAPI.php?Parameter=CollectFee&studentid=" + student_id + "&ac_type=" + ac_type + "&school_id=" + school_id + "&session="+curr_session+"";
                var fee_list_html = '';
                var i = 1;
                $.getJSON(fee_url, function(response_fee) {
                    total_datas_in_fees = Object.keys(response_fee).length;
                    $('.total_json_row').text(total_datas_in_fees);
                    $.each(response_fee, function(key, value) {
                        if (value.Late_Fee == null) {
                            var late_fees = 0;
                        } else {
                            late_fees = value.Late_Fee;
                        }
                        fee_list_html += '<tr><td style="width: 30%;">' + value.Installment_name + '</td><td style="width: 20%;">' + value.Net_Amount + '</td><td style="width: 15%;"><a href="javascript:void(0);" class="show_fee_details" data-toggle="modal" row_id="' + i + '" id="' + value.Installment_Id + '" stud_id="' + student_id + '" data-target=".details">...</a></td><td style="width: 10%;"><div class="radio"><span><input type="checkbox" id="' + i + '" value="' + value.Installment_Id + ',' + value.Net_Amount + '" class="fee_month check_box_no' + i + '" name="fee_amt[]"></span><input type="number" class="d-none fee_amuont' + i + '" value="' + value.Net_Amount + '"><input class="d-none late_fee_amt' + i + '" value="' + late_fees + '"></div></td></tr> ';
                        i = i + 1;
                    });
                    $('.load_dyn_fee_data').html(fee_list_html);
                });
            }
            $(document).on('click', '.show_fee_details', function(event) {
                event.preventDefault();
                $('.modal_table').html('');
                var inst_id = $(this).attr('id');
                row_no = $(this).attr('row_id');
                var student_id = $(this).attr('stud_id');
                var ac_type = $('.account_type').val();
                var school_id = $('.show_school').val();
                var curr_session = $('#school_session').val();
                const fee_url = "./FeeCollectionAPI.php?Parameter=CollectFee&studentid=" + student_id + "&ac_type=" + ac_type + "&school_id=" + school_id + "&session="+curr_session+"";
                var fee_table_html = '<thead><tr><th style="width: 40%;">Fee Type </th><th style="width: 20%;">Amount </th><th style="width: 20%;">Con Amt </th><th style="width: 20%;">Net Total</th></tr></thead><tbody class="top-position-ss ">';
                $.getJSON(fee_url, function(response_details_view) {
                    var json_data = JSON.parse(JSON.stringify(response_details_view));
                    total_datas_in_json = Object.keys(response_details_view).length;
                    total_datas_in_fees = Object.keys(json_data[row_no].details).length;
                    for (let i = 1; i <= parseInt(total_datas_in_fees); i++) {
                        var json_fee_data = json_data[row_no].details[i];
                        //if (parseInt(json_fee_data.amount)>0) {
                        fee_table_html += '<tr><td style="width: 40%;">' + json_fee_data.feename + '</td><td style="width: 20%;">' + parseInt(json_fee_data.amount) + '</td><td style="width: 20%;">' + parseInt(json_fee_data.concession) + '</td><td style="width: 20%;">' + (parseInt(json_fee_data.amount) - (parseInt(json_fee_data.concession))) + '</td></tr>';
                        //}
                    }
                    fee_table_html += '</tbody> ';
                    $('.modal_table').html(fee_table_html);
                });
            });

            $(document).on('click', '.fee_month', function() {
                var check_id = $(this).attr('id');
                var due_total = 0;
                var fee_amt = '';
                var late_fee = total_late_fee = 0;
                var total_json_row = $('.total_json_row').text();
                var discount_fee = 0;
                var paid_amount = $('#paid_amt').val();
                var late_fee = $('#late_fee').val();
                var cheque_bounce = $('#cheque_bounce').val();
                var readmission_fe = $('#readmission_fee').val();
                // fine / challan #cheque_bounce
                var on_demand_fee = $('fine_fee').val();

                if ($(".check_box_no" + check_id).is(':checked')) {
                    for (let i = check_id; i >= 1; i--) {
                        $(".check_box_no" + i).prop("checked", true);
                        fee_amt = $('.fee_amuont' + i).val();
                        late_fee = $('.late_fee_amt' + i).val();
                        total_late_fee = parseInt(total_late_fee) + parseInt(late_fee);
                        due_total = parseInt(due_total) + parseInt(fee_amt);
                        $('.total_due_amount_month_wise').text(due_total);
                    }
                    $('#late_fee').val(total_late_fee);
                } else {
                    for (let j = parseInt(check_id); j <= parseInt(total_json_row); j++) {
                        $(".check_box_no" + parseInt(j)).prop("checked", false);
                    }
                    for (let k = 1; k <= (parseInt(check_id) - 1); k++) {
                        fee_amt = $('.fee_amuont' + k).val();
                        late_fee = $('.late_fee_amt' + k).val();
                        total_late_fee = parseInt(total_late_fee) + parseInt(late_fee);
                        due_total = parseInt(due_total) + parseInt(fee_amt);
                        $('.total_due_amount_month_wise').text(due_total);
                    }
                }
                $('#late_fee').val(total_late_fee);
                var stud_fine = $('#fine_fee').val();
                var prev_execess_amt = $('#advance_fee').val();
                due_total = parseInt(due_total) + parseInt(readmission_fe) + parseInt(stud_fine) + parseInt(cheque_bounce);
                paid_amount = parseInt(paid_amount) + parseInt(prev_execess_amt);
                count_balance_amount(due_total, discount_fee, paid_amount);
                $('#due_amt').val(due_total);
            });


            // function to count balance
            function count_balance_amount(due_total, discount_fee, paid_amount) {
                var balance = (parseInt(due_total)) - (parseInt(paid_amount) + parseInt(discount_fee));
                $('#amount_balance').val(balance);
            }

            $(document).on('blur', '.amt_receiving', function() {
                var total_rows = $('#total_rows').text();
                var pr_total = parseInt(total_rows);
                var rec_amt_ttl = 0;
                var id_inp = $(this).attr('id');
                var split_id = id_inp.split('rec_amt');
                var prev_execess_amt = $('#advance_fee').val();
                if (split_id[1] > 1) {
                    for (let i = pr_total; i >= 1; i--) {
                        var net_amt = $('#rec_amt' + i).val();
                        rec_amt_ttl = parseInt(rec_amt_ttl) + parseInt(net_amt);
                    }
                } else {
                    rec_amt_ttl = $(this).val();
                }
                $('#paid_amt').val(rec_amt_ttl);
                var due_amt = $('#due_amt').val();
                if (due_amt == '') {
                    alert("Please Choose Fee Amount");
                    $(this).val(0);
                    $('#paid_amt').val(0);
                }
                var discount_fee = $('#discount_fee').val();
                var paid_amount_ttl = parseInt(rec_amt_ttl) + parseInt(prev_execess_amt);
                var cheque_bounce_amt = $('#cheque_bounce').val();
                count_balance_amount(due_amt, discount_fee, paid_amount_ttl);
            });

            $(document).on('click', '#name_search_btn', function(event) {
                event.preventDefault();
                $('.serach_student').fadeIn('slow');
                $('#student_name').focus();
            });
            $(document).on('click', '.close_st_mod', function() {
                $('.serach_student').fadeOut('slow');
            });

            // get data on click
            $('#search_data').click(function(event) {
                event.preventDefault();
                stud_data = $('#student_name').val();
                if (stud_data != '') {
                    const url = "./universal_apis.php?get_stud_details_by_name=1&search_type=2&stud_data=" + stud_data + "";
                    var html_table = '';
                    html_table += '<table class="table table-bordered"><tr><th>Name</th><th>Father Name</th><th>DOB</th><th>Class</th><th>Add</th></tr>';
                    $.getJSON(url, function(data) {
                        $.each(data, function(key, value) {
                            if (value.Middle_Name == null) {
                                var name_studs = value.First_Name + ' ' + value.Last_Name;
                            } else {
                                var name_studs = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name;
                            }
                            html_table += '<tr><td>' + name_studs + '</td><td>' + value.Father_Name + '</td><td>' + value.DOB + '</td><td>' + value.Class_Name + ' (' + value.Section + ')</td><td><button class="btn btn-warning load_student_data" id="' + value.Student_Id + '"><i class="fa fa-arrow-left text-white" aria-hidden="true"></i></button></td></tr>';
                        });
                        html_table += '</table>';
                        $('.populate_student_list').html(html_table);
                    });
                }

            });

            $(document).on('click', '.load_student_data', function(event) {
                event.preventDefault();
                var student_id = $(this).attr('id');
                $('.serach_student').fadeOut('slow');
                $('#student_id').val(student_id);
                load_student_data(student_id);
                $('.populate_student_list').html('');
                $('#student_name').val('');
                school_id = $('.show_school').val();
                ac_type = $('.account_type').val();
                get_other_amounts(student_id, school_id, ac_type);
                load_fee_details(student_id);
            });

            // function to load student data
            function load_student_data(student_id) {
                var url = "./universal_apis.php?get_stud_details_by_name=1&search_type=1&stud_data=" + student_id + "";
                $.getJSON(url, function(data) {
                    $.each(data, function(key, value) {
                        url_conc = "./FeeControl_1.php?get_consessions=1&concession_id=" + value.Concession_Id + "";
                        $.getJSON(url_conc, function(cons_resp) {
                            $.each(cons_resp, function(key, value) {
                                $('.student_concession').val(value.Concession_Name);
                            });
                        });
                        if (value.Middle_Name == null) {
                            var name_studs = value.First_Name + ' ' + value.Last_Name;
                        } else {
                            var name_studs = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name;
                        }
                        $('.first_name').val(name_studs);
                        //$('.class').text(value.Class_Name);
                        //$('.section').text(value.Section);
                        //$('.roll').text(value.Roll_No);
                        $('.sibling_1').text(value.Sibling_1_Student_Id); // btn_sibling_1
                        $('.sibling_2').text(value.Sibling_2_Student_Id);
                        $('.btn_sibling_1').attr('id', value.Sibling_1_Student_Id);
                        $('.btn_sibling_2').attr('id', value.Sibling_2_Student_Id);
                        $('.st_father_name').val(value.Father_Name);
                        $('.st_mother_name').val(value.Mother_Name);
                        $('.student_class').val(value.Class_Name);
                        if (value.Student_Image != null) {
                            //url = './app_images/AdmissionDocuments/' + value.Admission_Id + '_AdmissionDocs/' + value.Student_Image;
                            url = './app_images/profile/' + value.Student_Image;
                            $('.main_img').attr('src', url);
                        }
                    });
                });
            }

            $(document).on('blur', '#student_id', function() {
                var student_id = $(this).val();
                if (student_id != '') {
                    load_student_data(student_id);
                    load_fee_details(student_id);
                    school_id = $('.show_school').val();
                    ac_type = $('.account_type').val();
                    get_other_amounts(student_id, school_id, ac_type);
                }
            });
            $(document).on('click', '.btn_sibling_1', function(ev) {
                ev.preventDefault();
                var student_id = $(this).attr('id');
                load_student_data(student_id);
                load_fee_details(student_id);
                $('#student_id').val(student_id);
                school_id = $('.show_school').val();
                ac_type = $('.account_type').val();
                get_other_amounts(student_id, school_id, ac_type);
            });
            $(document).on('click', '.btn_sibling_2', function(ev) {
                ev.preventDefault();
                var student_id = $(this).attr('id');
                load_student_data(student_id);
                load_fee_details(student_id);
                $('#student_id').val(student_id);
                school_id = $('.show_school').val();
                ac_type = $('.account_type').val();
                get_other_amounts(student_id, school_id, ac_type);
            });

            $(document).on('click', '.inp_cheque_bounce', function() {
                var btn_id = $(this).attr('id');
                split_id = btn_id.split("bounce");

                var total_bounce = $("#cheque_bounce").val();
                var discount_fee = $('#discount_fee').val();
                var prev_execess_amt = $('#advance_fee').val();
                var paid_amount = parseInt($('#paid_amt').val()) + parseInt(prev_execess_amt);
                if ($(".check_checkbox_" + split_id[1]).is(':checked')) {
                    var amt_bounce = $(this).val();
                    // total amount bounce
                    total_bounce = parseInt(total_bounce) + parseInt(amt_bounce);
                    var due_amt = $('#due_amt').val();
                    var due_amt = parseInt(due_amt) + parseInt(amt_bounce);
                    $('#due_amt').val(due_amt);
                    $('#cheque_bounce').val(total_bounce);
                    count_balance_amount(due_amt, discount_fee, paid_amount);
                } else {
                    var amt_bounce = $(this).val();
                    // total amount bounce
                    total_bounce = parseInt(total_bounce) - parseInt(amt_bounce);
                    var due_amt = $('#due_amt').val();
                    var due_amt = parseInt(due_amt) - parseInt(amt_bounce);
                    $('#due_amt').val(due_amt);
                    $('#cheque_bounce').val(total_bounce);
                    count_balance_amount(due_amt, discount_fee, paid_amount);
                }
                $(".check_checkbox_" + split_id[1]).val(amt_bounce);

            });

            // adding service charges
            $(document).on('focusin', '.amt_receiving', function() {
                var prev_amt = $(this).val();
                $(document).on('focusout', '.amt_receiving', function() {
                    var amount_receiving = $(this).val();
                    var row_id = $(this).attr('id');
                    var split_value = row_id.split('amount_receiving');
                    var payment_type = $('.payment_type' + split_value[1]).val();
                    var payment_chrg_arr = payment_type.split(',');
                    if (payment_chrg_arr[0] == 3 || payment_chrg_arr[0] == 4) {
                        var percent_amt = ((parseInt(amount_receiving) * parseInt(payment_chrg_arr[1])) / 100);
                        var net_amt = parseInt(percent_amt) + parseInt(amount_receiving);
                        $('#rec_amt' + split_value[1]).val(net_amt);
                    } else {
                        $('#rec_amt' + split_value[1]).val(amount_receiving);
                    }
                    var total_paid_amt = paid_amt = 0;
                    var prev_execess_amt = $('#advance_fee').val();
                    var services_amt = 0;
                    for (let i = 1; i <= split_value[1]; i++) {
                        paid_amount = $('#amount_receiving' + i).val();
                        total_paid_amt = parseInt(paid_amount) + parseInt(total_paid_amt);
                        var amt_incl_taxes = $('#rec_amt' + i).val();
                        var amt_receiving = $('#amount_receiving' + i).val();
                        var services = parseInt(amt_incl_taxes) - parseInt(amt_receiving);
                        services_amt = parseInt(services_amt) + parseInt(services);
                    }
                    $('#services').val(services_amt);
                    var due_amt = $('#due_amt').val();
                    $('#paid_amt').val(total_paid_amt);
                    var dis_amt = 0;
                    total_paid_amt = parseInt(total_paid_amt) + parseInt(prev_execess_amt);
                    count_balance_amount(due_amt, dis_amt, total_paid_amt);
                });
            });

            // disable /  enable elements of inputs of CC/DD/Cheque Cash_Id always taken as 1
            $(document).on('change', '.pmt_hide_elements', function() {
                var pmt_hide_elements_id = $(this).attr('id');
                var combined_vals = $(this).val();
                var cash_id = combined_vals.split(',');
                split_value = pmt_hide_elements_id.split('payment_type');
                if (cash_id[0] == 1) {
                    $('.insttument_date' + split_value[1]).attr('readonly', true);
                    $('#bank_neme' + split_value[1]).hide();
                    $('.instrument_no' + split_value[1]).attr('readonly', true);
                    $('#amount_receiving' + split_value[1]).val(0);
                    $('#rec_amt' + split_value[1]).val(0);
                } else {
                    $('.insttument_date' + split_value[1]).prop('readonly', false);
                    $('#bank_neme' + split_value[1]).show();
                    $('.instrument_no' + split_value[1]).prop('readonly', false);
                    $('#amount_receiving' + split_value[1]).val(0);
                    $('#rec_amt' + split_value[1]).val(0);
                }
            });

            get_all_schools();

            function get_all_schools() {
                const url = './universal_apis.php?get_school_name=1';
                html_data = '';
                $.getJSON(url, function(data) {
                    $.each(data, function(key, value) {
                        html_data += '<option value="' + value.school_id + '">' + value.school_name + '</option>';
                    });
                    $('.show_school').html(html_data);
                });
            }

            // submitting form data
            $(document).on('submit', '#fee_collection_form', function(event) {
                event.preventDefault();
                $('.form_output').html('');
                var amount_balance = $('#amount_balance').val();
                if (amount_balance <= 0) {
                    var form_data = $(this).serialize();
                    $.post($(this).attr('action'), form_data, function(fee_response) {
                        $('.form_output').html(fee_response);
                        window.open("FeeReceiptPrint.php?receipt_id=5625");
                        reset_form();
                    });
                } else {
                    var html_alert = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Alert</strong> Form Cannot Be Submitted When Balance Is More Than Zero.</div>`;
                    $('.form_output').html(html_alert);
                }
            });

            // addition of late fee
            $(document).on('focusin', '#late_fee', function() {
                var pre_late_fee = $('#late_fee').val();
                $(document).on('focusout', '#late_fee', function() {
                    var post_late_fee = $('#late_fee').val();
                    var due_total = $('#due_amt').val();
                    var new_late_fee = parseInt(pre_late_fee) - parseInt(post_late_fee);
                    var prev_execess_amt = $('#advance_fee').val();
                    due_total = parseInt(due_total) - parseInt(pre_late_fee) + parseInt(post_late_fee);
                    var discount_fee = $('#discount_fee').val();
                    var paid_amount = parseInt($('#paid_amt').val()) + parseInt(prev_execess_amt);
                    $('#due_amt').val(due_total);
                    count_balance_amount(due_total, discount_fee, paid_amount);
                });
            });
            // readmission fee
            $('#readmission_fee').focusin(function() {
                var prev_readm_fee = $(this).val();
                var due_amt = $('#due_amt').val();
                var prev_execess_amt = $('#advance_fee').val();
                $('#readmission_fee').focusout(function() {
                    var readmission_fee = $(this).val();
                    var discount_fee = 0;
                    var paid_amount = parseInt($('#paid_amt').val()) + parseInt(prev_execess_amt);
                    due_amt = (parseInt(due_amt) - parseInt(prev_readm_fee)) + parseInt(readmission_fee);
                    $('#due_amt').val(due_amt);
                    count_balance_amount(due_amt, discount_fee, paid_amount);
                });
            });
            // discount fee
            $('#discount_fee').focusin(function() {
                var prev_dis_fee = $(this).val();
                var due_amt = $('#due_amt').val();
                var prev_execess_amt = $('#advance_fee').val();
                $('#discount_fee').focusout(function() {
                    var curr_dis_fee = $(this).val();
                    var paid_amount = parseInt($('#paid_amt').val()) + parseInt(prev_execess_amt);
                    dis_amt = parseInt(curr_dis_fee) - parseInt(prev_dis_fee);
                    count_balance_amount(due_amt, dis_amt, paid_amount);
                    due_amt = (parseInt(due_amt) - parseInt(dis_amt));
                    $('#due_amt').val(due_amt);
                });
            });

            function show_late_fee_into_modal() {
                var student_id = $('#student_id').val();
                $('.load_late_fee').html('');
                var ac_type = $('.account_type').val();
                var school_id = $('.show_school').val();
                const fee_url = "./FeeCollectionAPI.php?Parameter=CollectFee&studentid=" + student_id + "&ac_type=" + ac_type + "&school_id=" + school_id + "";
                var fee_list_html = '';

                $.getJSON(fee_url, function(response_fee) {
                    total_datas_in_fees = Object.keys(response_fee).length;
                    $('.total_json_row').text(total_datas_in_fees);
                    var i = 1;
                    $.each(response_fee, function(key, value) {
                        if (value.Late_Fee > 0) {
                            var late_fees = value.Late_Fee;
                            fee_list_html += `<tr>
                                            <td scope="row">${value.Installment_name}</td>
                                            <td ><input serial_no="${i}" id="${value.Installment_Id}" type="number" readonly value="${late_fees}" class="d-block edit_late_fee_data late_fee_amt_no_${i}"></td>
                                        </tr>`;
                            $('.max_late_fee_rows').text(i);
                            i = i + 1;
                        }
                    });
                    $('.load_late_fee').html(fee_list_html);
                });
            }

            $(document).on('blur', '.edit_late_fee_data', function() {
                if (confirm("Are You Sure To Update")) {
                    var student_id = $('#student_id').val();
                    var installment_id = $(this).attr('id');
                    var serial_no = $(this).attr('serial_no');
                    var total_late_fee = due_amt = dis_amt = paid_amount = 0;
                    var max_late_fee_rows = $('.max_late_fee_rows').text()
                    // update fee table and load fee data again

                    for (let i = 1; i <= parseInt(max_late_fee_rows); i++) {
                        var late_fee_amt = $('.late_fee_amt_no_' + i).val();
                        total_late_fee = late_fee_amt;
                        total_late_fee = parseInt(total_late_fee) + parseInt(late_fee_amt);
                    }
                    $('#late_fee').val(total_late_fee);
                    count_balance_amount(due_amt, dis_amt, paid_amount);
                }
            });

            // getting other amounts like bounce/fine etc
            function get_other_amounts(student_id, school_id, ac_type) {
                $('.chq_bounce_table').html('');
                chq_tbl = `<tr>
                            <th colspan="3">Cheque Bounce Charges</th>
                        </tr>
                        <tr>
                            <th class="cus-border">Rec. No</th>
                            <th class="cus-border">Chq. No</th>
                            <th  class="cus-border text-center">Amt.</th>
                        </tr>`;
                        var curr_session = $('#school_session').val();                   
                const other_Fee_url = "FeeCollectionAPI.php?Parameter=CollectOtherAmounts&studentid=" + student_id + "&ac_type=" + ac_type + "&school_id=" + school_id + "&session="+curr_session+"";
                $.getJSON(other_Fee_url, function(oth_fee_resp) {
                    $('#advance_fee').val(oth_fee_resp.AdjustedAmount);
                    $('#readmission_fee').val(oth_fee_resp.ReeAdmFee);
                    $('#fine_fee').val(oth_fee_resp.ODF);
                    $('#discount_fee').val(oth_fee_resp.Discount);
                    var total_bounce_chg = 0;
                    $.each(oth_fee_resp.Cheque, function(key, value) {
                        total_bounce_chg = total_bounce_chg + value.BCharges;
                        chq_tbl += `<tr>
                            <td class="cus-border">${value.ReceptNo}</td>
                            <td class="cus-border">${value.ChequeNo}</td>
                            <td class="cus-border">${value.BCharges}</td>
                        </tr>`;
                    });
                    $('#cheque_bounce').val(total_bounce_chg);
                    $('.chq_bounce_table').html(chq_tbl);
                    var due_total = parseInt(total_bounce_chg) + parseInt(oth_fee_resp.ReeAdmFee) + parseInt(oth_fee_resp.ODF);
                    var balance_total = parseInt(total_bounce_chg) + parseInt(oth_fee_resp.ReeAdmFee) + parseInt(oth_fee_resp.ODF) - (parseInt(oth_fee_resp.AdjustedAmount) + parseInt(oth_fee_resp.Discount));
                    $('#due_amt').val(due_total);
                    $('#amount_balance').val(balance_total);
                });
            }

            /******** reset form *********/
            function reset_form() {
                $('.load_dyn_fee_data').html('');
                $('.chq_bounce_table').html('');
                $('.main_img').attr('src', '');
            }
            $(document).on('focusin', '#student_id', function() {
                reset_form();
            });
            $(document).on('change','.account_type',function(){
                reset_form();
                var value_dd = $(this).val();
                console.log(value_dd);
            });
            $(document).on('focusout', '#pay_date', function() {
                reset_form();
            });
            $(document).on('focusout', '#school_session', function() {
                reset_form();
            });
        });
    </script>

</body>

</html>