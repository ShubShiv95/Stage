<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIFTCAMPUS | Import Bulk Entry</title>
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
                <!-- Breadcumbs Area Start Here -->
                <div class="breadcrumbs-area">
                    <!--h3>Students</h3-->
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
                                <h3 class="mb-4">Bulk Import Sudent Data</h3>
                            </div>
                        </div>
                        <form class="new-added-form school-form aj-new-added-form"  enctype="multipart/form-data" id="fileInputForm" name="fileInputForm" method="POST" action="">
                            
                            
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
                                                <select class="select2" name="f_class" required>
                                                    <option value="">Please Select School Name</option>
                                                    <option value="1">The ABC PAATHSHALA</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-center">
                                                <label>Download Excel Format</label>
                                                <br>
                                                <a href="formats/test.xls" download><img src="img/aj-img/excel.png" width="80"></a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            
                                            <div class="form-group">
                                                <label>Import Excel</label>
                                                <input type="file" name="file" id="file" placeholder="" class="form-control" accept=".csv" required="">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                                <div class="form-group aj-form-group text-center mt-2">
                                                    <div class="row-chang">
                                                    <span class="mt-2">Import Type:</span>
                                                        <div class="radio">
                                                        <span><input type="radio" class="sibling-bs" name="sibling" checked> Add New </span>
                                                        </div>
                                                        <div class="radio">
                                                        <span><input type="radio" class="sibling-bs" name="sibling" > Overwright Existing</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     </div>
                                    <div class="aaj-btn-chang-cbtn">
                                            <button  type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" name="importBtn" id="importBtn">Import </button>
                                            <button type="reset" class="aj-btn-a1 btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                            
                                    </div>
                                </div>
                               
                            </div>
                            
                            
                        </form>

                        <div class="tebal-promotion" style="overflow-x: scroll;overflow-y: scroll; height:500px">
                                    <h5 class="text-center">Search Result of Admission</h5>
                                    <div id="dynamicContent" name="dynamicContent" > </div>
                        </div>
                    </div>
                </div>    
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright"><?php if(isset($_SESSION["FOOTERNOTE"])) echo $_SESSION["FOOTERNOTE"]; else echo 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';?></div>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    
  
    <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#importBtn").click(function() { 
                var fd = new FormData(); 
                var files = $('#file')[0].files[0]; 
                fd.append('file', files); 
       
                $.ajax({ 
                    url: 'ImportAllStudentData_2.php', 
                    type: 'post', 
                    data: fd, 
                    contentType: false, 
                    processData: false, 
                    success: function(response){ 
						document.getElementById("dynamicContent").innerHTML = response;
                    }, 
                }); 
            }); 
        }); 
    </script> 
 
</body>

</html>