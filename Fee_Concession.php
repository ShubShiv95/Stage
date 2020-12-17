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
                            </div>-->
                        </div> 
                            <form class="new-added-form school-form aj-new-added-form consession_form" action="./FeeControl_1.php" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                        <div class="">
                                            <!--h5 class="text-center">Student Attendence Message</h5-->
                                            <div class="row justify-content-center mb-4">
                                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                                <input type="text" name="consession_sender" id="" class="d-none" autocomplete="off">
                                                    <div class="form-group aj-form-group">
                                                        <label>Concession Category Name</label>
                                                        <input type="text" name="consession_name" placeholder="" class="form-control">
                                                        <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <div class="form-group aj-form-group">
                                                        <label>Session *</label>
                                                        <select class="select2" name="consession_session">
                                                            <option value="">-- SELECT Session --</option>
                                                            <?php
                                                            $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                                                            $next_session = $_SESSION["ENDYEAR"] . '-' .date('Y',strtotime($_SESSION["ENDYEAR"])+(3600*24*365*2));
                                                            echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                                <option value="' . $next_session . '">' . $next_session . '</option>';
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                                    <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                                        <div class="table-responsive">
                                                            <table class="table display ">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 60%;">Fee Name </th>
                                                                        <th style="width: 40%;">Concession %</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="top-position-ss load_dyn_data">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-12 text-right mt-3">
                                                    <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                                                </div>
                                                <div class="col-12 form_output"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 load_consessions table-responsive">
                                    <table class="table" style="height: 30vh;">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Fee Head</th>
                                                <th>Discount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_head">
                                        </tbody>
                                    </table>
                                </div>
                            </form>
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
            $(document).ready(function() { load_fee_heads(); function load_fee_heads() { var html_data = ''; const url = "./universal_apis.php?get_all_fee_heads=1"; var html_data = ''; $.getJSON(url, function(data) { $.each(data, function(key, value) { html_data += '<tr><td style="width: 60%;"><input type="text" class="form-control d-none" value="' + value.Fee_Head_Id + '" name="fee_head_id[]">' + value.Fee_Head_Name + '</td><td style="width: 40%;"><div class="form-group aj-form-group"> <input type="text" name="consession[]" value="0" placeholder="" class="form-control consession_value" id="cons_'+value.Fee_Head_Id+','+value.Fee_Head_Name+'"></div></td></tr>'; }); $('.load_dyn_data').append(html_data); }); } $(document).on('submit','.consession_form',function(event){ event.preventDefault(); $.ajax({ url : $(this).attr('action'), type : $(this).attr('method'), data : $(this).serialize(), success : function(data){ $('.form_output').html(data); $('.consession_form')[0].reset();window.setTimeout(function(){$('.form_output').html('')},3000);load_consessions(); } }); });$(document).on('blur','.consession_value',function(){ var consession_value = $(this).val(); var div_id = $(this).attr('id'); var div_names = div_id.split(','); if(consession_value>100 || consession_value<0){ $('.form_output').html('<p class="text-danger">Consession Should Between 0 To 100 to Fee Named :- '+div_names[1]+'</p>'); $(this).val(0); } });load_consessions(); function load_consessions(){ const url = './FeeControl_1.php?get_all_consessions=1'; var html_data = ''; $.getJSON(url, function(response){ $.each(response, function(key, value){ html_data+= '<tr><td>'+value.Concession_Name+'</td><td>'+value.Fee_Head_Name+'</td><td>'+value.Concession_Percent+'%</td><td><button class="btn btn-danger delete_consession" id="'+value.Concession_Detail_Id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>'; }); $('.table_head').html(html_data); }) }$(document).on('click','.delete_consession',function(event){ event.preventDefault(); var cons_id = $(this).attr('id'); if (confirm("Are You Sure To Delete?")) { $.ajax({ url : './FeeControl_1.php', type : 'post', data : {'delete_consession':1,'cons_id':cons_id}, success : function(data){ $('.form_output').html(data); $('.consession_form')[0].reset();window.setTimeout(function(){$('.form_output').html('')},3000);load_consessions(); } }); } }); }); 
        </script>
</body>
</html>