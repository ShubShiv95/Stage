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
    <title>SwipeTouch | Admission Form</title>
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
                        <form class="new-added-form school-form aj-new-added-form" id="searchAddForm" name="searchAddForm">
                            
                            
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                    <div class="brouser-image ">
                                        <h5 class="text-center">Student Class Promotion</h5>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>School Session <span>*</span></label>
                                                <select class="select2" name="f_class" id="schoolSession" name="schoolSession">
                                                <option value="">Select Session</option>
                                                <option value="2019-2020">2019-2020</option>
                                                <option value="2020-2021">2020-2021</option>
                                                </select>
                                            </div> 
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>School Class <span>*</span></label>
                                                <select class="select2" name="f_class" id="schoolClass" name="schoolClass">
                                                <option value="">Select Class</option>
                                                <option value="20">Nursery</option>
                                                <option value="21">PREP</option>
                                                <option value="22">KG1</option>
                                                <option value="23">KG2</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="24">Misc</option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                    </div>
                                   
                                    <div class="aaj-btn-chang-cbtn">
                                            <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
                                            <a  href="javascript:void()" id="fetchResult" name="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>
                                           
                                            
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </form>

                            <div class="tebal-promotion" style="display: none;">
                                    <h5 class="text-center">Class Promotion for Students of K.G. 1 to K.G.2 </h5>
                                    <div id="tablehere" name="tablehere" > </div>
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
        $('#fetchResult').click('.sibling-bs',function(){
            callbackend();
             $('.tebal-promotion').slideToggle('slow');
            })
    </script>

    <script type="text/javascript">
    var frm = $('#searchAddForm');
    
    //$("#fetchResult").click(function(){
    function callbackend(){
        $class = $('#schoolClass').val();
        $session = $('#schoolSession').val();
        var xmlhttp;    
        
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
            }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        xmlhttp.onreadystatechange=function(){
         if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById("tablehere").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "./AdmissionSearchController.php?class=" + $class +"&session=" + $session, true);
        xmlhttp.send();
           
    //});
    }
    </script>
</body>

</html>