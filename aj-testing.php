<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

$query = "SELECT * FROM `instalment_master_table` WHERE School_Id = ".$_SESSION["SCHOOLID"]." AND Enabled = 1 ORDER BY `Installment_Id`";$data=array();
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
                            <form action="./FeeControl_1.php" method="post" id="cluster_form">
                                <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
                                <input type="text" name="cluster_sender" class="d-none" autocomplete="off">
                                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Fee Cluster Name <span>*</span></label>
                                            <!--<input type="text" name="" placeholder="" required="" class="form-control">-->
                                            <select class="select2 fee_cluster" name="fee_cluster_name" required>
                                                <option value="">-- SELECT Cluster --</option>
                                            </select>
                                            <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <div class="form-group aj-form-group">
                                            <label>Session *</label>
                                            <select class="select2" name="f_academic_session" required>
                                                <option value="">-- SELECT Session --</option>
                                                <?php
                                                /*$_SESSION["STARTYEAR"] = 2020;
                                                $_SESSION["ENDYEAR"] = 2021;*/
                                                $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                                                $next_session = $_SESSION["ENDYEAR"] . '-' . date($_SESSION["ENDYEAR"], strtotime('+1 years'));
                                                echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                    <option value="' . $next_session . '">' . $next_session . '</option>';
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="height: 50vh; overflow-x: auto;">
                                    <table class="stripe row-border order-column " >
                                        <thead class="month_head">
                                           <tr>
                                              <?php foreach ($data as $head) {
                                                 // echo '<th>'.$head['Installment_Name'].'</th>';
                                              } ?>
                                                <!--<th>Last name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                                <th>Extn.</th>
                                                <th>E-mail</th>-->
                                            </tr>
                                        </thead>
                                        <tbody class="fee_head_table">
                                            <tr>
                                                <td>Shad</td>
                                                <td>Decker</td>
                                                <td>Regional Director</td>
                                                <td>Edinburgh</td>
                                                <td>51</td>
                                                <td>2008/11/13</td>
                                                <td>$183,000</td>
                                                <td>6373</td>
                                                <td>s.decker@datatables.net</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="col-12 text-right mt-3">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Save</button>
                                    </div>
                                    <div class="col-12 form_output"></div>
                            </form>
                            <table id="example1" class="stripe row-border order-column" style="width:100%; height:30vh">
                                <thead>

                                    <tr>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Position</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>

                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>

                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>
                                    <tr>
                                        <td>Airi</td>
                                        <td>Satou</td>
                                        <td>Accountant</td>

                                    </tr>

                                </tbody>
                            </table>
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
        $(document).ready(function() { $('#example').DataTable({ scrollY: 300, scrollX: true, scrollCollapse: true, paging: false, fixedColumns: true }); }); $(document).ready(function() { $('#example1').DataTable({ scrollY: 300, scrollX: true, scrollCollapse: true, paging: false, fixedColumns: true }); $(document).on('submit','#cluster_form',function(event){ event.preventDefault(); $.post( $(this).attr('action'), $('form#cluster_form').serialize(), function(data) { $('.form_output').html(data); $('#cluster_form')[0].reset(); }, ); }); get_clusters();function get_clusters() { const url = "./universal_apis.php?get_all_clusters=1"; var html_data = ''; $.getJSON(url, function(data) { $.each(data, function(key, value) { html_data += '<option value="' + value.FC_Id + '">' + value.FC_Name + '</option>'; }); $('.fee_cluster').append(html_data); }); } load_fee_heads(); var i=0;j=0; function load_fee_heads(){const url="./universal_apis.php?get_all_fee_heads=1";var html_data = '';$.getJSON(url,function(data){$.each(data,function(key,value){html_data+='<tr><td>'+value.Fee_Head_Name+'<input type="text" name="fee_head_id[]" value="'+value.Fee_Head_Id +'" class="d-none"></td><td><div class="form-group aj-form-group"><select class="select2 col-12" name="installment_type[]" required><option value="0">Select</option><option value="12">Monthly</option><option value="6">Bi-Monthly</option><option value="4">Quarterly</option><option value="2">Half-Yearly</option></select></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][0]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[0]" class="d-none" value="4"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][1]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[1]" class="d-none" value="5"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][2]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[2]" class="d-none" value="6"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][3]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[3]" class="d-none" value="7"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][4]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[4]" class="d-none" value="8"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][5]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[5]" class="d-none" value="9"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][6]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[6]" class="d-none" value="10"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][7]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[7]" class="d-none" value="11"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][8]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[8]" class="d-none" value="12"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][9]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[9]" class="d-none" value="1"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][10]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[10]" class="d-none" value="2"></div></td><td><div class="form-group aj-form-group"><input type="text" name="'+i+'['+i+'][11]" placeholder="" class="form-control month_val" id="'+value.Fee_Head_Id +'"><input type="text" name="inst_name[11]" class="d-none" value="3"></div></td><td><div class="form-group aj-form-group"><input type="text" name="total[]" placeholder="" class="form-control total_val" value="0" id="month_total'+value.Fee_Head_Id +'"></div></td></tr>'; i=i+1;j=j+1;}); html_data+='<tr><td colspan="2" >Total</td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td><td><div class="form-group aj-form-group"><input type="text" name="" placeholder="" class="form-control"></div></td></tr>';$('.fee_head_table').html(html_data);});} $(document).on('blur','.month_val',function(){ const row_id = $(this).attr('id'); const new_val = $(this).val(); var ground_total = $('#month_total'+row_id+'').val(); newground_total = parseInt(ground_total)+parseInt(new_val); $('#month_total'+row_id+'').val(newground_total); }); load_month_heads(); function load_month_heads(){ const url = "./universal_apis.php?get_all_months=1"; html_data = ''; $.getJSON(url, function(response){ html_data +='<tr><th>Fee Head</th><th>Installment Type</th>'; $.each(response, function(key, value){ html_data += '<th>'+value.Installment_Name+'</th>'; }); html_data += '<th>Total</th>'; html_data +='</tr>'; $('.month_head').html(html_data);});}});
    </script>
</body>

</html>