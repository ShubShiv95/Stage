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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include ('includes/navbar.php') ?>
        <div class="dashboard-page-one">
             <?php 
            include 'includes/sidebar.php'; 
            ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                    <h3>Eqnuiry</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Follow Up Eqnuiry</li>
                    </ul>
                </div>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Daily Staff  Attendance  Report</h3>
                            </div>
                          
                        <form class="new-added-form school-form aj-new-added-form">
                                <div class="row justify-content-center">
                                    <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Class <span>*</span></label>
                                            <select class="select2" required="" name="depar_Category">
                                                <option value="">All </option>
                                                <option value="">1st</option>
                                                <option value="">2nd</option>
                                                <option value="">3rd</option>
                                                <option value="">4th</option>
                                                <option value="">5th</option>
                                                <option value="">6th</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Section </label>
                                            <select class="select2" required="" name="depar_Category">
                                                <option value="">All </option>
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Subject <span>*</span></label>
                                            <select class="select2" required="" name="depar_Category">
                                                <option value="">All </option>
                                                <option>Hindi</option>
                                                <option>English</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Month</label>
                                            <select class="select2" required="" name="depar_Category">
                                                <option value="">All </option>
                                                <option value="">January </option>
                                                <option value="">February </option>
                                                <option value="">March </option>
                                                <option value="">April </option>
                                                <option value="">May </option>
                                                <option value="">June </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-12 aj-mb-2 text-right">
                                        <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
                                        <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Search</a>
                                    </div>
                                    <div class="col-xl-10 col-lg-10 col-12 mt-5">
                                        <div class="cart-box-row">
                                            <div class="box-row">
                                                <div class="left-content">
                                                    <h6>NEW SESSION STUDENT LIST</h6>
                                                    <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by Montfort School </span> | <span> Created on 5May2020 </span></p>
                                                </div>
                                                <div class="right-content">
                                                    <ul>
                                                        <li><a href="javascript:void(0);" class="color-1"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-2"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-3"><i class="fa fa-file" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-4"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-5"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="content-descr"> 
                                                <a href="javascript:void(0);" add="addin" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                                    <div class="content addin">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </div>

                                            </div>  
                                        </div>
                                        <div class="cart-box-row">
                                            <div class="box-row">
                                                <div class="left-content">
                                                    <h6>NEW SESSION STUDENT LIST</h6>
                                                    <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by Montfort School </span> | <span> Created on 5May2020 </span></p>
                                                </div>
                                                <div class="right-content">
                                                    <ul>
                                                        
                                                        <li><a href="javascript:void(0);" class="color-5"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="content-descr">
                                            <a href="javascript:void(0);" add="addin1" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                                 <div class="content addin1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </div>

                                            </div>  
                                        </div>
                                        
                                       

                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                            href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/datepicker.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myscript.js"></script>
    <script type="text/javascript" src="js/ajax-function.js"></script>

<script language="JavaScript">

    $(document).on('click', '.hide-cl', function () {

          $(this).addClass('chang-togel');
          $(this).html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
          var add = $(this).attr('add')
          $('.content').removeClass('active')


           var par = $('.'+ add).addClass('active');
      });

    $(document).on('click', '.chang-togel', function () {
        $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        $('.content').removeClass('active')
        $('.chang-togel').removeClass('chang-togel')
    });
</script>
</body>

</html>