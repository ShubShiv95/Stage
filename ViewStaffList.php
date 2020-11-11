<?php session_start(); error_reporting(E_ALL ^ E_NOTICE);?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | All Teachers</title>
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
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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
                    <h3>Staff</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Staff Attendance</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3 id="display_status">All Staff Data</h3>
                            </div>

                        </div>

                        <form class="new-added-form school-form aj-new-added-form">
                            <div class="row ">
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Search by ID <span>*</span></label>
                                                <input type="text"   placeholder="" class="form-control searchById">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Search by Name</label>
                                                <input type="text"   placeholder="" class="form-control searchByName" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Search by Phone</label>
                                                <input type="text"   placeholder="" class="form-control searchByPhone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                        <div class="text-right">
                                        <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                                        <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Search </a>
                                        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>-->
                                </div>
                                    </div>

                                </div>
                            </form>
                            <div class="item-title aj-item-title bg-warning mt-3">
                              <div class="row">
                                  <div class="col-md-6">
                                    <h3 class="mb-4 p-2 ml-2"></h3>
                                  </div>
                                  <div class="col-md-6 pt-2 pb-2">
                                      <div class="row">
                                          <div class="col-md-4">
                                              
                                          </div>
                                          <div class="col-md-4">
                                              
                                          </div>
                                          <div class="col-md-4">
                                            <button class="btn btn-sm btn-danger pdf_export"><i class="fas fa-file-pdf fa-2x p-1"></i></button>
                                            
                                            <button class="btn btn-sm btn-success excel_export"><i class="fas fa-file-excel fa-2x p-1"></i></button>
                                            
                                            <button class="btn btn-sm btn-primary" onclick="window.print();"><i class="fas fa-print fa-2x p-1"></i></i></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                            </div>
                        <div class="Attendance-staff  mt-5 aj-scroll-Attendance-staff">
                            <div class="table-responsive" id="showStaffData">
                            <!--    <table class="table display data-table text-nowrap data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkAll">
                                                    <label class="form-check-label">ID</label>
                                                </div>
                                            </th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Section</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>E-mail</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="top-position-ss">
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0021</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student2.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0022</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student3.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0023</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student4.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0024</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student5.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0025</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student6.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0026</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student7.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0027</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student8.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0028</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student9.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0029</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student10.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0030</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student6.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0021</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student2.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0022</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student3.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0023</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student4.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0024</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student5.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0021</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student2.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0022</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student3.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0023</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student4.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0024</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student5.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>Mathematics</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0025</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student6.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0026</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student7.png" alt="student"></td>
                                            <td>Jessia Rose</td>
                                            <td>Female</td>
                                            <td>1</td>
                                            <td>English</td>
                                            <td>A</td>
                                            <td>59 Australia, Sydney</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#0027</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="img/figure/student8.png" alt="student"></td>
                                            <td>Mark Willy</td>
                                            <td>Male</td>
                                            <td>2</td>
                                            <td>Physics</td>
                                            <td>A</td>
                                            <td>TA-107 Newyork</td>
                                            <td>+ 123 9988568</td>
                                            <td>kazifahim93@gmail.com</td>
                                             <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Teacher Table Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      var toLowerCase = "";
      load_staff_data();
      function load_staff_data() {
        $.ajax({
          type : 'get',
          url : './ViewStaffList_1.php',
          data : {'getStaffList':1},
          success : function(data) {
            $('#showStaffData').html(data);
          }
        });
      }

      function search_staff_data(id,name,phone) {
          $('#showStaffData').html('');
          $.ajax({
            type : 'post',
            url : './ViewStaffList_1.php',
            data : {'searchStaffData':1,'id':id,'name':name,'phone':phone},
            success : function(data) {
              $('#showStaffData').html(data);
            }
          });
      }

      $('.searchById').keyup(function() {
        var empId=$(this).val();
        var empName=$('#searchByName').val();
        var empPhone=$('#searchByPhone').val();
          if (empId !="" ) {
            empName = ""; empPhone = "";
            search_staff_data(empId,empName,empPhone);
          }else{
            load_staff_data();
          }
      });
      $('.searchByName').keyup(function() {
        var empName=$(this).val();
        var empId=$('#searchById').val();
        var empPhone=$('#searchByPhone').val();
        if (empName !==""){
          empPhone = "";empId ==""
          search_staff_data(empId,empName,empPhone);
        }
        else{
          load_staff_data();
        }
      });
      $('.searchByPhone').keyup(function() {
          var empPhone=$(this).val();
          var empName=$('#searchByName').val();
          var empId=$('#searchById').val();
        if (empPhone !=="") {
            empName = "";empId ==""
          search_staff_data(empId,empName,empPhone);
        }else{
          load_staff_data();
        }
      });

      $(".excel_export").click(function(e) {
        let file = new Blob([$('#showStaffData').html()], {type:"application/vnd.ms-excel"});
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
        href: url,
        download: "staff_data.xls"}).appendTo("body").get(0).click();
        e.preventDefault();
    });

    var doc = new jsPDF('l');
    var specialElementHandlers = {
        '#showStaffData': function (element, renderer) {
            return true;
        }
    };  
    $('.pdf_export').click(function () {
        doc.fromHTML($('#showStaffData').html(), 5, 5, {
            'width': 2500,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
        
    });
    </script>
</body>
</html>
