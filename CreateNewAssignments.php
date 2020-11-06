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
                    <h3>Attendance</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Attendance</li>
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
                                    <div class="col-12 col-md-9 col-lg-9 col-xl-9 ">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label> Assignments Type<span>*</span></label>
                                                    <select class="select2" required="" name="depar_Category">
                                                        <option value="">All </option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
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
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Topic</label>
                                                    <input type="text" id="sname" name="sname" placeholder="" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label class="mt-4">Section Name</label>
                                                        <div class="box-scroll">
                                                            <div class="radio ">
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present" checked=""> A</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> B</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> C</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> D</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> E</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> F</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> G</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> H</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> I</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> J</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present"> K</span>
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Description </label>
                                                    <textarea style="height: 100%;" class="textarea form-control" name="remarks" id="remarks" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Subject Name</label>
                                                    <select class="select2" required="" name="depar_Category">
                                                        <option value="">All </option>
                                                        <option>Hindi</option>
                                                        <option>English</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Is Submissable</label>
                                                    <select class="select2" required="" name="depar_Category">
                                                        <option value="">Yes </option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2 text-right">
                                                <a  href="javascript:void(0);"  class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a>
                                                <button type="submit"  class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create Assignments </button>
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