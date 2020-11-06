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
                    <h3>Assignment</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Assignment</li>
                    </ul>
                </div>
                                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Upload File for Assignment</h3>
                            </div>
                        </div>
                        <form class="new-added-form school-form aj-new-added-form">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                    <div class="row mt-5">
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Assignment Name <span>*</span></label>
                                                <select class="select2" name="sttaf-a-class">
                                                    <option value="">Please Select School Name</option>
                                                    <option value="3">One</option>
                                                    <option value="3">Two</option>
                                                    <option value="3">Three</option>
                                                    <option value="3">Four</option>
                                                    <option value="3">Five</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Attach Assignment File</label>
                                                <input type="file" name="sttaf-a-name" placeholder="" required="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aaj-btn-chang-cbtn">
                                            <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Upload File</button>
                                    </div>
                                    <div class="Attendance-staff aj-scroll-Attendance-staff mt-5">
                                        <div class="table-responsive">
                                            <table class="table table-bordered attendence-msg">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 33.333%">Question List.pdf</th>
                                                        <th style="width: 33.333%">Sample.jpg</th>
                                                        <th style="width: 33.333%">Example.pdf</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="top-position-ss">
                                                    <tr>
                                                        <td><a href="javascript:void(0);">Question List.pdf</a></td>
                                                        <td><a href="javascript:void(0);">Sample.jpg</a></td>
                                                        <td><a href="javascript:void(0);">Example.pdf</a></td>
                                                    </tr>
                                                </tbody>   
                                            </table>
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