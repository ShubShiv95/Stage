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
    <title>SWIFTCAMPUS | Admission Search</title>
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
                <div class="breadcrumbs-area">
                    <!--h3>Students</h3-->
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Search Admission</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Hot Links Area Start Here -->
                <?php include('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Search Admission</h3>
                            </div>
                            <form class="new-added-form school-form aj-new-added-form" id="searchAddForm" name="searchAddForm">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                        <div class="brouser-image ">
                                            <!--h5 class="text-center">Search Admission</h5-->
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <label>School Session <span>*</span></label>
                                                    <select class="select2" name="f_class" id="schoolSession" name="schoolSession">
                                                        <option value="">-- SELECT Session --</option>
                                                        <?php
                                                        $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                                                        $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365));
                                                        echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                                <option value="' . $next_session . '">' . $next_session . '</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Search By <span>*</span></label>
                                                    <select class="select2 search_by" name="search_by" id="search_by" name="schoolSession">
                                                        <option value="0">Select Search By</option>
                                                        <option value="1">Class</option>
                                                        <option value="2">Admission Id</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group admission_id" style="display: none;">
                                                    <label>Admission Id<span>*</span></label>
                                                    <input type="text" name="student_id" id="student_id" placeholder=""  class="form-control" autocomplete="off">
                                                </div>                                                
                                                <div class="form-group aj-form-group admission_class" style="display: none;">
                                                    <label>School Class <span>*</span></label>
                                                    <select class="select2 class_name" name="f_class" id="schoolClass" name="schoolClass">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <button type="submit" id="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                                            </div>
                                        </div>
                                    </div>
                            </form>

                            <div class="tebal-promotion" style="display: none;">
                                <h5 class="text-center">Search Result of Admission</h5>
                                <div id="tablehere" name="tablehere"> </div>
                            </div>

                        </div>
                    </div>
                    <!-- Admit Form Area End Here -->
                    <footer class="footer-wrap-layout1">
                        <div class="copyright"><?php if (isset($_SESSION["FOOTERNOTE"])) echo $_SESSION["FOOTERNOTE"];
                                                else echo 'Powered by  <a href="http://swipetouch.tech">SwipeTouch Technologies</a>'; ?></div>
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
        <script src="js/myscript.js"></script>
        <script type="text/javascript">
            $('#fetchResult').click('.sibling-bs', function() {
                callbackend();
                $('.tebal-promotion').fadeIn('slow');
            });
        </script>

        <script type="text/javascript">
            var frm = $('#searchAddForm');

            $("#fetchResult").click(function(event){
                event.preventDefault();
                callbackend();
            });

            function callbackend() {
                
                $session = $('#schoolSession').val();
                $class = $('#schoolClass').val();
                $student_id = $('#student_id').val();
                var search_by = $('.search_by').val();
                if(search_by==1){
                    $student_id = '';
                }else if(search_by==2){
                    $class = '';
                }

                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("tablehere").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./AdmissionSearchController.php?class=" + $class + "&session=" + $session+"&admission_id="+$student_id, true);
                xmlhttp.send();
            }

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
            $('.search_by').change(function(){
                var search_by = $(this).val();
                if(search_by==1){
                    $('.admission_class').fadeIn(1000);
                    $('.admission_id').hide();
                }else if(search_by==2){
                    $('.admission_class').hide();
                    $('.admission_id').fadeIn(1000);
                }
            });
        </script>
</body>
</html>