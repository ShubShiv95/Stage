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
                                <h3 class="mb-4">Online Class </h3>
                            </div>
                            <form action="./OnlineClassControl_1.php" method="post" id="block_online_class" class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form" >
                                    <input type="text" name="block_online_class_sender" class="d-none" autocomplete="off">
                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Class Name <span>*</span></label>
                                            <select class="select2 class_name" id="class_name" name="class_name" required>
                                                <option value="">SELECT Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Studnt Name</label>
                                            <select class="select2 student_list" id="student_list" name="student_list" required>
                                                <option value="">-- SELECT Student --</option>
                                            </select>
                                        </div>
                                        <span id="student_status"></span>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Change Ststus</label>
                                            <select class="select2 class_type" id="block_Status" name="block_Status" required>
                                                <option value="">-- SELECT Status --</option>
                                                <option value="1">Block</option>
                                                <option value="0">Un-Block</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-xl-12 col-lg-12 col-12 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Remarks</label>
                                            <input type="text" value="" class="form-control" name="block_remarks" id="block_remarks">
                                        </div>
                                    </div>                                    
                                    <div class="col-xl-12 col-lg-12 col-12 mt-5 form_output">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 text-right mt-3">
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

            $(document).on('change','.class_name',function(){
                var class_id = $(this).val();
                const url_students = "./universal_apis.php?get_all_students_by_class=1&class_id="+class_id+"";
                $.getJSON(url_students,function(response){
                    var html_students = '<option value="">Select Student</option>';
                    $.each(response,function(key,value){
                        if(value.Middle_Name == null){
                            var st_name =  value.First_Name+' '+value.Last_Name;
                        }
                        else{
                            var st_name =  value.First_Name+' '+value.Middle_Name+' '+value.Last_Name;
                        }
                        html_students += '<option value="'+value.Student_Id+'">'+st_name+'</option>';
                    });
                    $('.student_list').html(html_students);
                });
            });
            $(document).on('change','.student_list',function(){
                var student_id=$(this).val();
                var url_st_details = "./universal_apis.php?getStudentDetailsbyId=1&student_id="+student_id+"";html_status='';
                $.getJSON(url_st_details,function(response_st){
                    $.each(response_st,function(key,value){
                        console.log(value.Is_Blocked);
                        if(value.Is_Blocked=='0'){
                        html_status += '<span class="text-success">'+value.Section+' | Roll - '+value.Roll_No+' | Curreulty Un-Blocked</span>';
                        }else{
                            html_status += '<span class="text-danger">'+value.Section+' | Roll - '+value.Roll_No+' | Curreulty Blocked</span>';
                        } 
                    });
                    $('#student_status').html(html_status);
                });
            });

            $(document).on('submit','#block_online_class',function(event){
                event.preventDefault();
                var data = $(this).serialize();
                $.post($(this).attr('action'),data,function(response){
                    $('.form_output').html(response);
                    window.setTimeout(function(){
                        $('.form_output').html('');
                    },3000);
                });
            });

        });
    </script>
</body>
</html>