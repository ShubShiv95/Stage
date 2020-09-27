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
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="img/logo.png" alt="logo">
                    </a>
                </div>
                  <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">Stevne Zone</h5>
                                <span>Admin</span>
                            </div>
                            <div class="admin-img">
                                <img src="img/figure/admin.jpg" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">Steven Zone</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                                    <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
                                    <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                    <li><a href="login.html"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-message">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                            <span>5</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">05 Message</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Maria Zaman</span> 
                                                <span class="item-time">18:30</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-yellow author-online">
                                        <img src="img/figure/student12.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Benny Roy</span> 
                                                <span class="item-time">10:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-pink">
                                        <img src="img/figure/student13.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Steven</span> 
                                                <span class="item-time">02:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-violet-blue">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Joshep Joe</span> 
                                                <span class="item-time">12:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                            <span>8</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">03 Notifiacations</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-icon bg-skyblue">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Complete Today Task</div>
                                        <span>1 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-orange">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Director Metting</div>
                                        <span>20 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-violet-blue">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Update Password</div>
                                        <span>45 Mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                     <li class="navbar-item dropdown header-language">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Spanish</a>
                            <a class="dropdown-item" href="#">Franchis</a>
                            <a class="dropdown-item" href="#">Chiness</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
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
                                <h3 class="mb-4">Registration For Admission</h3>
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
                        <form class="new-added-form aj-new-added-form">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>First Name (As Per Birth Certificate) <span>*</span></label>
                                        <input type="text" name="f_f_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="f_m_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="f_l_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Class <span>*</span></label>
                                        <select class="select2" name="f_class">
                                            <option value="">Please Select Class</option>
                                            <option value="1">Play</option>
                                            <option value="2">Nursery</option>
                                            <option value="3">One</option>
                                            <option value="3">Two</option>
                                            <option value="3">Three</option>
                                            <option value="3">Four</option>
                                            <option value="3">Five</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Section</label>
                                        <select class="select2" name="f_Gender">
                                            <option value="">Please Select Section</option>
                                            <option value="">A</option>
                                            <option value="1">B</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Roll No.</label>
                                        <select class="select2" name="f_Gender">
                                            <option value="">Please Select Roll Number </option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Gender <span>*</span></label>
                                        <select class="select2" name="f_Gender" required="">
                                            <option value="">Please Select Gender </option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Date of Birth <span>*</span></label>
                                        <input type="text" name="f_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Age</label>
                                        <input type="text" name="f_age" readonly="" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Social Category <span>*</span></label>
                                        <select class="select2" required="" name="f_social_c">
                                            <option value="">SELECT SOCIAL CATEGORY</option>
                                            <option value="">GENERAL</option>
                                            <option value="">OBC</option>
                                            <option value="">PHYSICALLY DISABLED</option>
                                            <option value="">SC</option>
                                            <option value="">SINGLE CHILD</option>
                                            <option value="">ST</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Discount Category <span>*</span></label>
                                        <select class="select2" required="" name="f_mother_tongue">
                                        <option value="">Please Select Discount </option>
                                        <option value="">10%</option>
                                        <option value="">15%</option>
                                    </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Locality </label>
                                        <select class="select2" name="f_locality"> 
                                            <option value="">SELECT LOCALITY</option>
                                            <option value="10">CROSSING REPUBLIC</option>
                                            <option value="2">EASTEND/VASUNDHRA ENCLAVE</option>
                                            <option value="7">INDIRA PURAM</option>
                                            <option value="4">MAYUR VIHAR   I</option>
                                            <option value="6">MAYUR VIHAR   I I I</option>
                                            <option value="1">NOIDA</option>
                                            <option value="11">NOIDA EXTENSION</option>
                                            <option value="12">OTHERS</option>
                                            <option value="8">VAISHALI</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Academic Session <span>*</span></label>
                                        <select class="select2" required="" name="f_academic_session"> 
                                            <option value="">SELECT Session</option>
                                            <option value="10">2015</option>
                                            <option value="10">2016</option>
                                            <option value="10">2017</option>
                                            <option value="10">2018</option>
                                            <option value="10">2019</option>
                                            <option value="10">2020</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Mother Tongue <span>*</span></label>
                                        <select class="select2" required="" name="f_mother_tongue">
                                            <option value="">SELECT MOTHERTONGUE</option>
                                            <option value="">1-ASSAMESE</option>
                                            <option value="">10-MARATHI</option>
                                            <option value="">11-NEPALI</option>
                                            <option value="">12-ORIYA</option>
                                            <option value="">13-PUNJABI</option>
                                            <option value="">14-SANSKRIT</option>
                                            <option value="">15-SINDHI</option>
                                            <option value="">16-TAMIL</option>
                                            <option value="">17-TELUGU</option>
                                            <option value="">18-URDU</option>
                                            <option value="">19-ENGLISH</option>
                                            <option value="">2-BENGALI</option>
                                            <option value="">20-BODO</option>
                                            <option value="">22-DOGRI</option>
                                            <option value="">29-FRENCH</option>
                                            <option value="">3-GUJARATI</option>
                                            <option value="">4-HINDI</option>
                                            <option value="">5-KANNADA</option>
                                            <option value="">51-MAITHILI</option>
                                            <option value="">56-RAJASTHANI</option>
                                            <option value="">6-KASHMIRI</option>
                                            <option value="">7-KONKANI</option>
                                            <option value="">8-MALAYALAM</option>
                                            <option value="">8-MANIPURI</option>
                                            <option value="">99-Other Languages</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                	<div class="form-group aj-form-group">
                                        <label>Religion <span>*</span></label>
                                        <select class="select2" required="" name="f_religion">
                                            <option value="">SELECT RELIGION</option>
                                            <option value="6">BUDDHIST</option>
                                            <option value="3">CHRISTIAN</option>
                                            <option value="1">HINDU</option>
                                            <option value="4">JAIN</option>
                                            <option value="2">MUSLIM</option>
                                            <option value="8">OTHERS</option>
                                            <option value="5">SIKH</option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Nationality <span>*</span></label>
                                        <select class="select2" required="" name="f_nationality">
                                            <option value="">SELECT NATIONALITY</option>
                                            <option value="3">AMERICAN</option>
                                            <option value="4">CANADIAN</option>
                                            <option value="6">CHINESE</option>
                                            <option value="1">INDIAN</option>
                                            <option value="12">NEPALI</option>
                                            <option value="11">OTHERS</option>
                                            <option value="8">PAKISTANI</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Blood Group </label>
                                        <select class="select2" name="f_blood_group">
                                            <option value="">SELECT BLOOD GROUP</option>
                                            <option value="1">A +</option>
                                            <option value="2">A -</option>
                                            <option value="5">AB +</option>
                                            <option value="6">AB -</option>
                                            <option value="3">B +</option>
                                            <option value="4">B -</option>
                                            <option value="7">O +</option>
                                            <option value="8">O -</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Adhaar Card No.</label>
                                        <input type="text" name="f_adhaar_card_no" placeholder="" class="form-control">
                                    </div>
                                    
                                    <div class="form-group faj-form-group">
                                        <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than  2MB)</label>
                                        <div class="d-image-user">
                                            <img src="img/avtar.png">
                                        </div>
                                            <div class="file-in">
                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                                                <input type="file" name="f_student_photo" class="form-control-file">
                                            </div>
                                        </div>  
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Previous School Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>School Name</label>
                                        <input type="text" name="sd_school_details" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Medium of Instrction</label>
                                         <select class="select2" name="f_religion">
                                            <option value="">SELECT Medium of Instrction</option>
                                            <option value="6">English</option>
                                            <option value="3">Hindi</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Board</label>
                                        <select class="select2" name="sd_board">
                                            <option value="">SELECT BOARD</option>
                                            <option value="1">CBSE</option>
                                            <option value="2">ICSE</option>
                                            <option value="3">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Class</label>
                                        <select class="select2" name="sd_class">
                                            <option value="">SELECT CLASS</option>
                                            <option value="15">NUR</option>
                                            <option value="16">PREP</option>
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
                                            <option value="17">Misc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            
                            
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Communication Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Communication Address *</label>
                                        <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> Country <span>*</span></label>
                                        <input type="text" name="ra_country" required="" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>State <span>*</span></label>
                                        <input type="text" name="ra_state" required="" placeholder="" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>City/ District <span>*</span> </label>
                                        <input type="text" name="ra_city_district" required="" placeholder="" class="form-control">

                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label> Pincode <span>*</span></label>
                                        <input type="text" name="ra_pincode" required="" placeholder="" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>  Contact No.</label>
                                        <input type="text" minlength="12" maxlength="12" name="ra_telephone" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Residential Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Communication Address <span>*</span></label>
                                        <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> Country <span>*</span></label>
                                        <input type="text" name="ra_country" required="" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>State <span>*</span></label>
                                        <input type="text" name="ra_state" required="" placeholder="" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>City/ District <span>*</span> </label>
                                        <input type="text" name="ra_city_district" required="" placeholder="" class="form-control">

                                        
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label> Pincode <span>*</span></label>
                                        <input type="text" name="ra_pincode" required="" placeholder="" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>  Contact No.</label>
                                        <input type="text" minlength="12" maxlength="12" name="ra_telephone" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Sibling Details <small> (if Any, After entering Admission No. Kindly press enter key again)</small></h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div class="form-group aj-form-group text-center">
                                        <span> Any Sibling in this School ?(Real brother/sister)</span>
                                        <div class="row-chang">
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling"> Yes</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling" checked> No</span>
                                            </div>
                                        </div>
                                    </div>

                                	<div class="active-div-a" style="display: none;">
                                		<div class="row">

                                            <div class="col-xl-3 col-lg-3 col-12">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sid_section" placeholder="" class="form-control">
                                                </div>
                                                
                                            </div>

                                			<div class="col-xl-3 col-lg-3 col-12">
                                				<div class="form-group aj-form-group">
			                                        <label>Class <span>*</span></label>
			                                        <select class="select2" name="sid_class">
			                                            <option value="">Please Select Class </option>
			                                            <option value="1">Play</option>
			                                            <option value="2">Nursery</option>
			                                            <option value="3">One</option>
			                                            <option value="3">Two</option>
			                                            <option value="3">Three</option>
			                                            <option value="3">Four</option>
			                                            <option value="3">Five</option>
			                                        </select>
			                                    </div>
			                                   
                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
                                				
			                                    <div class="form-group aj-form-group">
			                                        <label>Section</label>
			                                         <select class="select2" name="sid_class">
                                                        <option value="">Please Select Section </option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        
                                                    </select>
			                                    </div>
			                                    
                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Roll No.</label>
			                                         <select class="select2" name="sid_class">
                                                        <option value="">Please Select Roll No. </option>
                                                        <option value="1">123456</option>
                                                        <option value="2">123456</option>
                                                        <option value="3">123456</option>
                                                        <option value="3">123456</option>
                                                    </select>
			                                    </div>
                                			</div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sid_section" placeholder="" class="form-control">
                                                </div>
                                                
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Class <span>*</span></label>
                                                    <select class="select2" name="sid_class">
                                                        <option value="">Please Select Class </option>
                                                        <option value="1">Play</option>
                                                        <option value="2">Nursery</option>
                                                        <option value="3">One</option>
                                                        <option value="3">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="3">Four</option>
                                                        <option value="3">Five</option>
                                                    </select>
                                                </div>
                                               
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Section</label>
                                                     <select class="select2" name="sid_class">
                                                        <option value="">Please Select Section </option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Roll No.</label>
                                                     <select class="select2" name="sid_class">
                                                        <option value="">Please Select Roll No. </option>
                                                        <option value="1">123456</option>
                                                        <option value="2">123456</option>
                                                        <option value="3">123456</option>
                                                        <option value="3">123456</option>
                                                    </select>
                                                </div>
                                            </div>


                                		</div>


                                	</div>
                                </div>
                            </div>

                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Parent Details</h3>
                            </div>
                            <div class="f-section-n">
                            	<h3>Father's Details</h3>
	                            <div class="row">
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group aj-form-group0">
	                                         <label>  Father's Name (As Per Birth Certificate) </label>
                                            <input type="text" name="fa_d_name" placeholder="" class="form-control">
	                                                                                  
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Qualification  </label>
	                                        <select class="select2" name="fa_d_qualification">
	                                            <option value="">Select City</option>
	                                            <option value="15^NEW DELHI^INDIA">DELHI</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation </label>
	                                        <select class="select2" name="fa_d_occupation">
	                                            <option value="">Select City</option>
	                                            <option value="15^NEW DELHI^INDIA">DELHI</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label> Designation  </label>
                                            <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Org Name  </label>
	                                        <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Org Address </label>
	                                        <input type="text" name="fa_d_org_address" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label> City  </label>
                                            <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                                        </div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label> State   </label>
	                                        <input type="text"  name="fa_d_state" placeholder="" class="form-control">
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label> Country </label>
	                                        <input type="text"  name="fa_d_country" placeholder="" class="form-control">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>  Pincode       </label>
                                            <input type="text"  name="fa_d_pincode" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Email </label>
	                                        <input type="text"  name="fa_d_email" placeholder="" class="form-control">
	                                    </div>
                                        
                                        
                                        <div class="form-group aj-form-group">
                                            <label>  Contact No.    </label>
                                            <input type="text" minlength="12" maxlength="12" name="fa_d_mobile" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Annual Income   </label>
	                                        <input type="text"  name="fa_d_annual_income" placeholder="" class="form-control">
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>  Adhaar  Card No.      </label>
	                                         <input type="text"  name="fa_d_adhaar_card_no" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Alumni    </label>
	                                        <select class="select2" name="fa_d_alumni" >
	                                            <option value="">No</option>
	                                            <option value="">Yes</option>
	                                            
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Father Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avtar.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="fa_d_father_photo"  class="form-control-file">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
                            <div class="m-section-n">
	                            <h3>Mother's Details</h3>
	                            <div class="row">
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group aj-form-group0">
	                            			 <label> Mother's Name (As Per Birth Certificate)</label>
                                            <input type="text" name="mo_d_mother" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Qualification   </label>
	                                        <select class="select2" name="mo_d_qualification">
	                                            <option value="">Select City</option>
	                                            <option value="15^NEW DELHI^INDIA">DELHI</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation </label>
	                                        <select class="select2" name="mo_d_occupation">
	                                            <option value="">Select City</option>
	                                            <option value="15^NEW DELHI^INDIA">DELHI</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label> Designation  </label>
                                            <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Org Name  </label>
	                                        <input type="text" name="mo_d_org_name" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Org Address </label>
	                                        <input type="text" name="mo_d_org_address" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label> City  </label>
                                            <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                                        </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label> State   </label>
	                                        <input type="text" name="mo_d_state" placeholder="" class="form-control">
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label> Country </label>
	                                        <input type="text" name="mo_d_country" placeholder="" class="form-control">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>  Pincode       </label>
                                            <input type="text" name="mo_d_pincode" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Email </label>
	                                        <input type="text" name="mo_d_email" placeholder="" class="form-control">
	                                    </div>
                                        
                                        
                                        <div class="form-group aj-form-group">
                                            <label>  Contact No.   </label>
                                            <input type="text" minlength="12" maxlength="12" name="mo_d_mobile" placeholder="" class="form-control">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Annual Income   </label>
	                                        <input type="text" name="mo_d_annual_income" placeholder="" class="form-control">
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>  Adhaar  Card No.      </label>
	                                         <input type="text" name="mo_d_adhaar_card_no" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Alumni</label>
	                                        <select class="select2" name="mo_d_alumni">
	                                            <option value="">No</option>
	                                            <option value="">Yes</option>
	                                            
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Mother Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avatar-female.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="mo_d_mother_photo" class="form-control-file">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>		
	                        </div>


                           
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Gaurdian Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12 ">
                                    <div class="form-group aj-form-group text-center">
                                        <!-- <span> Any Sibling in this School ?(Real brother/sister)</span> -->
                                        <div class="row-chang">
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian" checked> Father</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian" > Mother</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian" > Others </span>
                                            </div>
                                        </div>
                                    </div>

                                	<div class="active-div-aa" style="display: none;">
                                		<div class="row">
			                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
			                                    <div class="form-group aj-form-group">
			                                        <label>Address</label>
			                                        <textarea type="text" name="gd_d_address" rows="7" placeholder="" class="aj-form-control"> </textarea>
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label> Name</label>
			                                        <input type="text" name="gd_d_name" placeholder="" class="form-control">
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Relations </label>
			                                        <input type="text" name="gd_d_relations" placeholder="" class="form-control">
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>  Mobile No.</label>
			                                        <input type="text" name="gd_d_mobile_no" placeholder="" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    

			                                    <div class="form-group faj-form-group">
			                                        <label class="text-dark-medium">Upload  Photo ( JPEG Less Than 2MB)</label>
			                                        <div class="d-image-user">
			                                            <img src="img/avtar.png">
			                                        </div>
		                                            <div class="file-in">
		                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
		                                                <input type="file" name="doc_d_photo" class="form-control-file">
		                                            </div>
		                                        </div>
			                                </div>
			                            </div>
                                	</div>
                                </div>
                            </div>


                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">SMS Communication</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>SMS Contact No. <span>*</span></label>
                                        <input type="text" name="sd_school_details" minlength="12" maxlength="12" required="" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Whatsapp Contact No.</label>
                                        <input type="text" name="sd_school_details" minlength="12" maxlength="12" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>E-Mail Address</label>
                                        <input type="text" name="sd_school_details" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Documents Submited</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div> <br><br>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label> Document Upload </label>
                                            <select class="select2" name="mo_d_city">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                
                            </div>



                            <div class="footer-sec-aj">
                            	
                            	
                            	<!-- <div class="top3">
                            		<ul>
                            			<li>I hereby certify that the above information is accurate to the best of my knowledge and belief.
                                        I understand that if any part of it is found to be false, this application will be cancelled.</li>
                                        <li>I fully understand that the school, on accepting the registration form of my child, is not bound to grant admission.</li>
                                        <li>I agree that the decision of the school administration regarding grant of admission will be final and binding on me.</li>
                                        <li>I understand that the school transport will be provided on specified routes / stops only.</li>
                                        <li>I acknowledge that the registration fee is non-refundable.</li>
                                        <li>I agree to follow and ensure that my child abides by all the rules, regulations and procedures laid down by the school from time-to-time.</li>
                            		</ul>
                            	</div> -->
                            	<!-- <div class="top5">
                            	<div class="row">
                            		<div class="col-lg-3 aj-mb-2">
                        				<div class="form-group aj-form-group text-center">
	                                        <div class="row-chang">
	                                            <div class="radio">
	                                              <span><input type="checkbox" name="gaurdian" checked> I Agree</span>
	                                            </div>
	                                        </div>
	                                    </div>
                            		</div>
                            		<div class="col-lg-3 aj-mb-2">
                            			<div class="form-group aj-form-group">
	                                        <label>Enter Code </label>
	                                        <input type="text" placeholder="enter_code" name="" class="form-control">
	                                    </div>
                            		</div>
                            		<div class="col-xl-3 aj-mb-2">
                            			<div class="number">
                            				<a href="javascript:void(0)">8P12ZZ</a>
                            			</div>
                            		</div>
                            		<div class="col-xl-3 aj-mb-2">
                            			<div class="Refresh">
                            				<a href="javascript:void(0)">Refresh</a>
                            			</div>
                            		</div>

                            	</div>
                            </div> -->
                            </div>
                            
                            <div class="aaj-btn-chang-c">
                                    <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <!-- <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Ack Recipt</button>
                                    <button type="submit" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Questionnaire</button>
                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Close</button> -->
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
	    $('.sibling-bs').change('.sibling-bs',function(){
	         var a= $('input[name="sibling"]:checked').val();
	         var id = $(this).attr('id')
	          if(a == 'on'){
	            $('.active-div-a').slideToggle('slow');
	            
	          }else{
	            
	          }
	        })
	     $('.gaurdian-bs').change('.gaurdian-bs',function(){
	         var a= $('input[name="gaurdian"]:checked').val();
	         var id = $(this).attr('id')
	          if(a == 'on'){
	            $('.active-div-aa').slideToggle('slow');
	            
	          }else{
	            
	          }
	        })
	</script>
</body>

</html>