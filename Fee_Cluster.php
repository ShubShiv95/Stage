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
                            </div>
                        </div> -->
                        <form class="new-added-form school-form aj-new-added-form" action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
                                    <div class="" >
                                        <!--h5 class="text-center">Student Attendence Message</h5-->
                                        <div class="row justify-content-center mb-4">
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Fee Cluster Name <span>*</span></label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                    <p class="mt-2  font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Master Account</label>
                                                    <select class="select2" name="f_academic_session"> 
                                                        <option value="">-- Master Account --</option>
                                                        <option value="1">The ABC Paathshala Account</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12    ">
                                                <div class="form-group aj-form-group">
                                                  <label>Select Applicable Class</label>
                                                    <div class="chackbox-cl">
                                                        <ul>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" checked=""> <b>KG-1</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>KG-2</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 1</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 2</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 3</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 4</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 5</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 6 </b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 7</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 8</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 9</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 10</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 11</b></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio">
                                                                    <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Class 12</b></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 mb-3">
                                                <div class="form-group aj-form-group">
                                                    <label>Stream</label>
                                                    <select class="select2" name="f_academic_session"> 
                                                        <option value="">-- Stream --</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Commerce">Commerce</option>
                                                        <option value="Arts">Arts</option>
                                                        <option value="General">General</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12 col-12 text-right mb-3">
                                                    <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                                            </div>
                                        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                            <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                                <div class="table-responsive">
                                                    <table class="table display ">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 30%;">Fee Cluster  Name </th>
                                                                <th style="width: 20%;">Class </th>
                                                                <th style="width: 20%;">Stream</th>
                                                                <th style="width: 30%;">School Account</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="top-position-ss">
                                                            <tr>
                                                                <td style="width: 30%;">Admission Fee</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;">Tuition  Fee</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;">Computer  Fee</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;">Biology Lab  Fee</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;">Physices Lab  Fee</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;">Total</td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 20%;"></td>
                                                                <td style="width: 30%;"></td>
                                                            </tr>
                                                            
                                                        </tbody>                                                
                                                    </table>
                                                </div>
                                            </div>
                                        </div>    
                                        </div>
                                    </div>                                    
                                </div>
                               
                            </div>
                        </form>

                            
                            
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                            href="#">PsdBosS</a></div>
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
  
</body>

</html>