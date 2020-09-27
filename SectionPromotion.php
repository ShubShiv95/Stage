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
                                <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                    <div class="brouser-image ">
                                        <h5 class="text-center">Srudent Section Allocation</h5>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Class <span>*</span></label>
                                                <select class="select2" name="f_class">
                                                    <option value="">Please Select  Class</option>
                                                    <option value="3">Class K.G. 1</option>
                                                    <option value="3">Class K.G. 2</option>
                                                    <option value="3">Class K.G. 3</option>
                                                    <option value="3">Class K.G. 4</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="aaj-btn-chang-cbtn">
                                            <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
                                            <a  href="javascript:void(0);" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>
                                           
                                            
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </form>

                            <div class="tebal-promotion" style="display: none;">
                                <form class="new-added-form ">
                                    <h5 class="text-center">Class Promotion for Students of K.G. 1 to K.G.2 </h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Serial No. </th>
                                                    <th>Student Id </th>
                                                    <th>Student Name</th>
                                                    <th>Previous Year Sec</th>
                                                    <th>Previous Roll No. </th>
                                                    <th>Class </th>
                                                    <th>Section. A</th>
                                                    <th>Section. B</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian" checked> 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian" > 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian1" > 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian1" checked> 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian2" checked> 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian2" > 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian3" > 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian3" checked> 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian4" checked> 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian4" > 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>132564</td>
                                                    <td>Yash</td>
                                                    <td>* GA1</td>
                                                    <td>1</td>
                                                    <td>* K.G. 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian5" > 1</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="gaurdian5" checked> 1</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>                                                
                                        </table>
                                    </div>

                                    <div class="inpuy-chang-box">
                                        <div class="form-output">
                                            <div class="name-f">
                                                <h6>Section A</h6>
                                            </div>
                                            <div class="input-box-in">
                                                <h5>32</h5>
                                            </div>
                                            <div class="name-f">
                                                <h6>Section B</h6>
                                            </div>
                                            <div class="input-box-in n-br">
                                                <h5>25</h5>                                                
                                            </div>
                                        </div>
                                        <div class="new-added-form aj-new-added-form">
                                         <div class="aaj-btn-chang-cbtn">
                                                 <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Promote Student </button>
                                          </div>
                                        </div>       
                                    </div>

                                </form>
                            </div>
                            
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