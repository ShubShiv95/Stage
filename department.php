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
                    <h3>Department</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Department  Form</li>
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
                        <form class="new-added-form school-form aj-new-added-form">
                            <div class="row justify-content-center">
                                <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                    <div class="box-sedow">
                                        <div class="brouser-image ">
                                            <h5 class="text-center">Create New Department</h5>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Category <span>*</span></label>
                                                    <select class="select2" name="depar_Category">
                                                        <option value="">Please Select  Category</option>
                                                        <option value="3">One</option>
                                                        <option value="3">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="3">Four</option>
                                                        <option value="3">Five</option>
                                                    </select>
                                                </div>
                                                <div class="form-group aj-form-group">
                                                    <label>Department   </label>
                                                    <input type="text" name="depar_department" placeholder="" class="form-control">
                                                </div>
                                                <div class="form-group aj-form-group">
                                                    <label>Remarks <span>*</span></label>
                                                    <textarea type="text" rows="3" name="depar_remarks" required="" placeholder="" class="aj-form-control"> </textarea>
                                                </div>
                                            </div>
                                        </div>                                       
                                        <div class="aaj-btn-chang-cbtn text-right">
                                                <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
                                                <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
     <script type="text/javascript">
        $('#opne-form-Promotion').click('.sibling-bs',function(){
             $('.tebal-promotion').slideToggle('slow');
            })
    </script>  
</body>

</html>