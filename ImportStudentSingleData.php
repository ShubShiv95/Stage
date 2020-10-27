<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include 'AdmissionModel.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIFTCAMPUS | Import Bulk Single Column</title>
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
        <?php include ('includes/navbar.php') ?>
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
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Admit Form</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">School</h3>
                            </div>
                        <form class="new-added-form school-form aj-new-added-form"  id="fileInputForm" name="fileInputForm" method="POST" 
                            action="ImportStudentSingleData_2.php">
                            
                            
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                    <div class="brouser-image ">
                                        <h6>Supported Browser:

                                            <div class="image">
                                                <img src="img/aj-img/Firefox.png" >
                                                <img src="img/aj-img/chrome1.png" >
                                            </div>
                                        </h6>
                                    </div>
                                    <div class="row">
                                         <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>School Name <span>*</span></label>
                                                <select class="select2" name="f_class">
                                                    <option value="3">ABC PAATHSALA</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-center">
                                                <label>Download Excel Format</label>
                                                <br>
                                                <a href="javascript:void(0);"><img src="img/aj-img/excel.png" width="80"></a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Student Column Name<span>*</span></label>
                                                <select class="select2" name="colName" id="colName">
                                                    <?php
                                                         $string = "";
                                                        foreach($GLOBAL_SINGLE_BULK_ENTRY_DROPDOWN as $x=>$x_value)
                                                            {
                                                                $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                            }
                                                        echo $string;
                                                    ?>                                                          
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Import Excel</label>
                                                <input type="file" name="s_l_name" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aaj-btn-chang-cbtn">
                                            <input  type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" value="Get Excel" name="genXLS" id="genXLS">
                                            <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Import </button>                                            
                                    </div>
                                </div>
                               
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">Powered by  <a href="http://swipetouch.tech">SwipeTouch Technologies</a></div>
                </footer>            </div>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <!-- <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#genXLS").click(function() { 
                var fd = new FormData(); 
       
                $.ajax({ 
                    url: 'ImportStudentSingleData_2.php', 
                    type: 'post', 
                    data: fd, 
                    contentType: false, 
                    processData: false, 
                    success: function(response){ 
						//document.getElementById("dynamicContent").innerHTML = response;
                        var win = window.open("", "_blank");
                        win.location.href = response;
                    }, 
                }); 
            }); 
        }); 
    </script>  -->

</body>

</html>