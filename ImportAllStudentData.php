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
                            <form class="new-added-form school-form aj-new-added-form" id="fileInputForm" name="fileInputForm" enctype="multipart/form-data" method="POST" action="">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                        <div class="brouser-image ">
                                            <h6>Supported Browser:

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div> -->
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
                                                    <span class="mt-2"> Import Type:</span>
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

                        <div class="tebal-promotion" style="display: block;">
                                    <h5 class="text-center">Search Result of Admission</h5>
                                    <div id="tablehere" name="tablehere" > 
                                    <div class="table-responsive" id="dynamicContent" name="dynamicContent">
                                    <!-- <table class="table table-bordered"><thead><tr><th>School ID</th><th>Session</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Gender</th><th>DOB</th><th>Age</th><th>Social Category</th><th>Discount Category</th><th>Locality</th><th>Academic Session</th><th>Mother Tongue</th><th>Religion</th><th>Nationality</th><th>Blood Group</th><th>Aadhar No</th><th>Prev School Name</th><th>Prev School Medium</th><th>Prev School Board</th><th>Prev School Class</th><th>Comm Address</th><th>Comm City</th><th>Comm State</th><th>Comm Country </th><th>Comm PinCode</th><th>Comm ContactNo</th><th>Resid Add</th><th>Resid City</th><th>Resid State</th><th>Resid Country</th><th>Resid PinCode</th><th>Resid Contact No</th><th>Sibling_1 Stud Id</th><th>Sibling_1 Class</th><th>Sibling_1 Section</th><th>Sibling_1 Roll</th><th>Sibling_2 Stud Id</th><th>Sibling_2 Class</th><th>Sibling_2 Sec</th><th>Sibling_2 Roll</th><th>Father Name</th><th>Father Qual</th><th>Father Occup</th><th>Father Desig</th><th>Father Org Name</th><th>Father Org Add</th><th>Father City</th><th>Father State</th><th>Father Country</th><th>Father PinCode</th><th>Father Email</th><th>Father Contact</th><th>Father AnnualIncome</th><th>Father Aadhar</th><th>Father Alumni</th><th>Mother Name</th><th>Mother Qual</th><th>Mother Occup</th><th>Mother Desig</th><th>Mother Org Name</th><th>Mother Org Add</th><th>Mother City</th><th>Mother State</th><th>Mother Country</th><th>Mother PinCode</th><th>Father Email</th><th>Mother ContactNo</th><th>Mother AnnualIncome</th><th>Mother Aadhar</th><th>Mother Alumni</th><th>Guardian Type</th><th>Guardian Add</th><th>Guardian Name</th><th>Guardian Relation</th><th>Guardian ContactNo</th><th>SMS ContactNo</th><th>WhatsApp ContactNo</th></tr></thead></table> -->
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">Powered by  <a href="http://swipetouch.tech">SwipeTouch Technologies</a></div>
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