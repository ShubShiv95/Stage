<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
?>
<!doctype html>
<html class="no-js" lang="">

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
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link"><i class="fas fa-angle-right"></i>Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index3.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index4.html" class="nav-link"><i class="fas fa-angle-right"></i>Parents</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index5.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teachers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu sub-group-active">
                                <li class="nav-item">
                                    <a href="all-student.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-details.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admit-form.html" class="nav-link menu-active"><i
                                            class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-promotion.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Student Promotion</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i
                                    class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-teacher.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="teacher-details.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teacher Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add-teacher.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                        Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="teacher-payment.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Payment</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Parents</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Parents</a>
                                </li>
                                <li class="nav-item">
                                    <a href="parents-details.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Parents Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                        Parent</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Library</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-book.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add-book.html" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                                        Book</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Acconunt</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-fees.html" class="nav-link"><i class="fas fa-angle-right"></i>All Fees
                                        Collection</a>
                                </li>
                                <li class="nav-item">
                                    <a href="all-expense.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Expenses</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                        Expenses</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i
                                    class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Class</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-class.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Classes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add-class.html" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                                        Class</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="all-subject.html" class="nav-link"><i
                                    class="flaticon-open-book"></i><span>Subject</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="class-routine.html" class="nav-link"><i class="flaticon-calendar"></i><span>Class
                                    Routine</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="student-attendence.html" class="nav-link"><i
                                    class="flaticon-checklist"></i><span>Attendence</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Exam</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="exam-schedule.html" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                                        Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a href="exam-grade.html" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                                        Grades</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="transport.html" class="nav-link"><i
                                    class="flaticon-bus-side-view"></i><span>Transport</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="hostel.html" class="nav-link"><i class="flaticon-bed"></i><span>Hostel</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="notice-board.html" class="nav-link"><i
                                    class="flaticon-script"></i><span>Notice</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="messaging.html" class="nav-link"><i
                                    class="flaticon-chat"></i><span>Messeage</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-menu-1"></i><span>UI Elements</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="notification-alart.html" class="nav-link"><i class="fas fa-angle-right"></i>Alart</a>
                                </li>
                                <li class="nav-item">
                                    <a href="button.html" class="nav-link"><i class="fas fa-angle-right"></i>Button</a>
                                </li>
                                <li class="nav-item">
                                    <a href="grid.html" class="nav-link"><i class="fas fa-angle-right"></i>Grid</a>
                                </li>
                                <li class="nav-item">
                                    <a href="modal.html" class="nav-link"><i class="fas fa-angle-right"></i>Modal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="progress-bar.html" class="nav-link"><i class="fas fa-angle-right"></i>Progress Bar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-tab.html" class="nav-link"><i class="fas fa-angle-right"></i>Tab</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-widget.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Widget</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="map.html" class="nav-link"><i
                                    class="flaticon-planet-earth"></i><span>Map</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="account-settings.html" class="nav-link"><i
                                    class="flaticon-settings"></i><span>Account</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-menu-1"></i><span>Other Form</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="admit-form.html" class="nav-link"><i class="fas fa-angle-right"></i>Admit Rorm</a>
                                </li>
                                <li class="nav-item">
                                    <a href="registration-form.html" class="nav-link"><i class="fas fa-angle-right"></i>Registration  Form</a>
                                </li>
                                <li class="nav-item">
                                    <a href="bulk-import.html" class="nav-link"><i class="fas fa-angle-right"></i>Bulk Import</a>
                                </li>
                                <li class="nav-item">
                                    <a href="import-selected-date.html" class="nav-link"><i class="fas fa-angle-right"></i>Import Selected Date</a>
                                </li>
                                <li class="nav-item">
                                    <a href="class-promotion.html" class="nav-link"><i class="fas fa-angle-right"></i>Class Promotion</a>
                                </li>
                                <li class="nav-item">
                                    <a href="section-promotion.html" class="nav-link"><i class="fas fa-angle-right"></i>Section Promotion</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-Information.html" class="nav-link"><i class="fas fa-angle-right"></i>student-Information</a>
                                </li>

                                
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
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
                        <form class="new-added-form aj-new-added-form"  action="AdmissionController.php" id="admitForm">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>First Name (As Per Birth Certificate) <span>*</span></label>
                                        <input type="text" name="studentFirstName" id="studentFirstName" placeholder="" required="" class="form-control" value="F Name">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="studentMiddleName" id="studentMiddleName" placeholder="" required="" class="form-control" value="M Name">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="studentLastName" id="studentLastName="fatherLastName"" placeholder="" required="" class="form-control" value="L Name">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Class <span>*</span></label>
                                        <select class="select2" name="studclassToApply" id="studclassToApply">
                                        <option value="0">Select Class</option>
                                    <?php
                                                    
                                                    $sql='select cmt.Class_Id,cmt.class_name,cst.stream from class_master_table cmt,class_stream_table cst where enabled=1 and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 and cst.stream_id=cmt.stream order by class_no,stream";
                                                    
                                                    $result=mysqli_query($dbhandle,$sql);
                                                    
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                    echo '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . ' ' . $row["stream"] . '</option>';
                                                    }
                                                    ?>                                        
                                            </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Section</label>
                                        <select class="select2" name="f_Section">
                                            <option value="">Please Select Section </option>
                                            <option selected value="1">A</option>
                                            <option value="2">B</option>
                                        </select>
                                    </div>

                                   <div class="form-group aj-form-group">
                                        <label>Roll No.</label>
                                        <select class="select2" name="f_Gender">
                                            <option value="">Please Select Roll Number </option>
                                            <option selected value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Gender <span>*</span></label>
                                        <select class="select2" name="studentGender" id="studentGender" required="">
                                            <option value="">Please Select Gender </option>
                                            <option selected value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Date of Birth <span>*</span></label>
                                        <input type="text" name="studentDOB" id="studentDOB" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Age</label>
                                        <input type="text" name="studentAge" id="studentAge" readonly="" placeholder="" class="form-control" value="10">
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Social Category <span>*</span></label>
                                        <select class="select2" required="" name="studentSocialCat" id="studentSocialCat">
                                            <option value="">SELECT SOCIAL CATEGORY</option>
                                            <option selected value="GENERAL">GENERAL</option>
                                            <option value="">OBC</option>
                                            <option value="">PHYSICALLY DISABLED</option>
                                            <option value="">SC</option>
                                            <option value="">SINGLE CHILD</option>
                                            <option value="">ST</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Discount Category <span>*</span></label>
                                        <select class="select2" required="" name="studDiscCat" id="studDiscCat">
                                        <option value="">Please Select Discount </option>
                                        <option selected value="">10%</option>
                                        <option value="">15%</option>
                                    </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Locality </label>
                                        <select class="select2" name="studLocality" id="studLocality"> 
                                            <option value="">SELECT LOCALITY</option>
                                            <option selected value="10">CROSSING REPUBLIC</option>
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
                                        <select class="select2" required="" name="studAcademicSession" id="studAcademicSession"> 
                                            <option value="">SELECT Session</option>
                                            <option selected value="10">2015</option>
                                            <option value="10">2016</option>
                                            <option value="10">2017</option>
                                            <option value="10">2018</option>
                                            <option value="10">2019</option>
                                            <option value="10">2020</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Mother Tongue <span>*</span></label>
                                        <select class="select2" required="" name="studMotherTongue" id="studMotherTongue" >
                                            <option value="">SELECT MOTHERTONGUE</option>
                                            <option selected  value="">1-ASSAMESE</option>
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
                                        <select class="select2" required="" name="studReligion" id="studReligion">
                                            <option value="">SELECT RELIGION</option>
                                            <option selected value="6">BUDDHIST</option>
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
                                        <select class="select2" required="" name="studNationality" id="studNationality">
                                            <option value="">SELECT NATIONALITY</option>
                                            <option value="">AMERICAN</option>
                                            <option value="4">CANADIAN</option>
                                            <option value="6">CHINESE</option>
                                            <option selected value="INDIAN">INDIAN</option>
                                            <option value="12">NEPALI</option>
                                            <option value="11">OTHERS</option>
                                            <option value="8">PAKISTANI</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Blood Group </label>
                                        <select class="select2" name="studBloodGroup" id="studBloodGroup">
                                            <option value="">SELECT BLOOD GROUP</option>
                                            <option value="1">A +</option>
                                            <option value="2">A -</option>
                                            <option value="5">AB +</option>
                                            <option value="6">AB -</option>
                                            <option selected value="3">B +</option>
                                            <option value="4">B -</option>
                                            <option value="7">O +</option>
                                            <option value="8">O -</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Adhaar Card No.</label>
                                        <input type="text" name="studAdharCardNo" id="studAdharCardNo" placeholder="" class="form-control" value="DSDF2323">
                                    </div>
                                    
                                    <div class="form-group faj-form-group">
                                        <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than  2MB)</label>
                                        <div class="d-image-user">
                                            <img src="img/avtar.png">
                                        </div>
                                            <div class="file-in">
                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                                                <input type="file" name="studentPhoto" id="studentPhoto" class="form-control-file" value="/Download/Picture/abc.jpg">
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
                                        <input type="text" name="studPrevSchoolName" id="studPrevSchoolName" placeholder="" class="form-control" value="DPS">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Medium of Instrction</label>
                                         <select class="select2" name="studMOI" id="studMOI">
                                            <option value="">SELECT Medium of Instrction</option>
                                            <option selected value="English">English</option>
                                            <option value="3">Hindi</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Board</label>
                                        <select class="select2" name="studBoard" id="studBoard">
                                            <option value="">SELECT BOARD</option>
                                            <option selected value="CBSE">CBSE</option>
                                            <option value="2">ICSE</option>
                                            <option value="3">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Class</label>
                                        <select class="select2" name="studClass" id="studClass">
                                            <option value="">SELECT CLASS</option>
                                            <option value="15">NUR</option>
                                            <option selected value="16">PREP</option>
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
                                        <label>Communication Address<span>*</span></label>
                                        <textarea type="text" rows="4" name="commAddress" id="commAddress" required="" placeholder="" class="aj-form-control" value="Noida, City Center"> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> City/ District <span>*</span></label>
                                        <input type="text" name="commCityDist" id="commCityDist" required="" placeholder="" class="form-control" value="Noida">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode<span>*</span></label>
                                        <input type="text" name="commPinCode" id="commPinCode" required="" placeholder="" class="form-control" value="201301">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State<span>*</span> </label>
                                        <input type="text" name="commState" id="commState" required="" placeholder="" class="form-control" value="UP">

                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No.<span>*</span></label>
                                        <input type="text" name="commContactNo" id="commContactNo" required="" placeholder="" class="form-control" value="919899395627">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="commCountry" id="commCountry" placeholder="" class="form-control" value="India">
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Residential Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Residential Address<span>*</span></label>
                                        <textarea type="text" rows="4" name="raAddress"  id="raAddress" required="" placeholder="" class="aj-form-control" value="Noida Film City, ABC"> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> City/ District <span>*</span></label>
                                        <input type="text" name="raCityDist"  id="raCityDist" required="" placeholder="" class="form-control" value="Noida">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode <span>*</span></label>
                                        <input type="text" name="raPinCode" id="raPinCode" required="" placeholder="" class="form-control" value="201301">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State <span>*</span> </label>
                                        <input type="text" name="raState" id="raState" required="" placeholder="" class="form-control" value="UP">

                                        
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No. <span>*</span></label>
                                        <input type="text" name="raContactNo" id="raContactNo" required="" placeholder="" class="form-control" value="919899395627">
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="raCountry" id="raCountry" placeholder="" class="form-control" value="India">
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Sibling Details <small> (if Any, After entering Admission No. Kindly press enter key again)</small></h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div class="form-group aj-form-group text-center">
                                        <span>Any Sibling in this School ?(Real brother/sister)</span>
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
                                                    <input type="text" name="sibling1StudId"  id="sibling1StudId" placeholder="" class="form-control" value="Stu2010">
                                                </div>
                                                
                                            </div>

                                			<div class="col-xl-3 col-lg-3 col-12">
                                				<div class="form-group aj-form-group">
			                                        <label>Class <span>*</span></label>
			                                        <select class="select2" name="sibling1Class"  id="sibling1Class">
			                                            <option value="">Please Select Class </option>
			                                            <option value="1">Play</option>
			                                            <option selected value="2">Nursery</option>
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
			                                         <select class="select2" name="sibling1Section" id="sibling1Section">
                                                        <option value="">Please Select Section </option>
                                                        <option selected value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        
                                                    </select>
			                                    </div>
			                                    
                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Roll No.</label>
			                                         <select class="select2" name="sibling1RollNo"  id="sibling1RollNo">
                                                        <option value="">Please Select Roll No. </option>
                                                        <option selected value="1">123456</option>
                                                        <option value="2">123456</option>
                                                        <option value="3">123456</option>
                                                        <option value="3">123456</option>
                                                    </select>
			                                    </div>
                                			</div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sibling2StudId" id="sibling2StudId" placeholder="" class="form-control" value="STU0001">
                                                </div>
                                                
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Class <span>*</span></label>
                                                    <select class="select2" name="sibling2Class" id="sibling2Class" >
                                                        <option value="">Please Select Class </option>
                                                        <option value="1">Play</option>
                                                        <option selected value="2">Nursery</option>
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
                                                     <select class="select2" name="sibling2Sec" id="sibling2Sec">
                                                        <option value="">Please Select Section </option>
                                                        <option selected value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Roll No.</label>
                                                     <select class="select2" name="sibling2RollNo" id="sibling2RollNo">
                                                        <option value="">Please Select Roll No. </option>
                                                        <option selected value="1">123456</option>
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
	                                         <label>Father's Name (As Per Birth Certificate) </label>
                                            <input type="text" name="fatherName" id="fatherName" placeholder="" class="form-control" value="R N DUTTA">
	                                                                                  
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label> Qualification  </label>
	                                        <select class="select2" name="fatherQual" id="fatherQual">
	                                            <option value="">Select Qualification</option>
	                                            <option selected value="Non-Matric">Non-Matric</option>
	                                            <option value="Matriculation">Matriculation</option>
	                                            <option value="Intermediate">Intermediate</option>
	                                            <option value="Graduate">Graduate</option>
	                                            <option value="Post Graduate">Post Graduate</option>
	                                            <option value="PHD">PHD</option>
                                                <option value="Other">Other</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation</label>
	                                        <select class="select2" name="fatherOccupation" id="fatherOccupation">
	                                            <option value="">Select Occupation</option>
	                                            <option selected value="Engineer">Engineer</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="fatherDesig" id="fatherDesig" placeholder="" class="form-control" value="Sr Manager">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name</label>
	                                        <input type="text" name="fatherOrgName" id="fatherOrgName" placeholder="" class="form-control" value="RTD Ltd">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="fatherOrgAdd" id="fatherOrgAdd" placeholder="" class="form-control" value="Noida">
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="fatherCity" id="fatherCity" placeholder="" class="form-control" value="Noida">
                                        </div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text"  name="fatherState" id="fatherState" placeholder="" class="form-control" value="UP">
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label>Country </label>
	                                        <input type="text" name="fatherCountry" id="fatherCountry" placeholder="" class="form-control" value="India">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text"  name="fatherPinCode" id="fatherPinCode" placeholder="" class="form-control" value="201301">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="fatherEmail" id="fatherEmail" placeholder="" class="form-control" value="sdutta@gmail.com">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="12" maxlength="12" name="fatherContactNo" id="fatherContactNo" placeholder="" class="form-control" value="919899395627">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text"  name="fatherAnnualIncome" id="fatherAnnualIncome" placeholder="" class="form-control" value="2000000">
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text"  name="fatherAdharCardNo" id="fatherAdharCardNo" placeholder="" class="form-control" value="ABDF32242">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Alumni</label>
	                                        <select class="select2" name="fatherAlumni" id="fatherAlumni">
	                                            <option selected value="Y">No</option>
	                                            <option value="N">Yes</option>  
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Father Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avtar.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="fatherPhoto" id="fatherPhoto"  class="form-control-file" value="\Downloads\Pic.jpg">
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
                                            <input type="text" name="motherName" id="motherName" placeholder="" class="form-control" value="KD">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Qualification</label>
	                                        <select class="select2" name="motherQual" id="motherQual">
                                            <option value="">Select Qualification</option>
	                                            <option selected value="Non-Matric">Non-Matric</option>
	                                            <option value="Matriculation">Matriculation</option>
	                                            <option value="Intermediate">Intermediate</option>
	                                            <option value="Graduate">Graduate</option>
	                                            <option value="Post Graduate">Post Graduate</option>
	                                            <option value="PHD">PHD</option>
                                                <option value="Other">Other</option>	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation </label>
	                                        <select class="select2" name="motherOccupation" id="motherOccupation">
	                                            <option value="">Select City</option>
	                                            <option selected value="Engineer">Engineer</option>
	                                            <option value="7^U.P^INDIA">GHAZIABAD</option>
	                                            <option value="36^U.P^INDIA">Greater Noida West</option>
	                                            <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
	                                            <option value="5^U.P^INDIA">NOIDA</option>
	                                            <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="motherDesig" id="motherDesig" placeholder="" class="form-control" value="Housewife">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name </label>
	                                        <input type="text" name="motherOrgName" id="motherOrgName" placeholder="" class="form-control" value="NA">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="motherOrgAdd" id="motherOrgAdd" placeholder="" class="form-control" value="NA">
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="motherCity" id="motherCity" placeholder="" class="form-control" value="">
                                        </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text" name="motherState" id="motherState" placeholder="" class="form-control" value="UP">
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label> Country </label>
	                                        <input type="text" name="motherCountry" id="motherCountry" placeholder="" class="form-control" value="India">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text" name="motherPinCode" id="motherPinCode" placeholder="" class="form-control" value="201301">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="motherEmail"  id="motherEmail" placeholder="" class="form-control" value="sd@abc.com">
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="12" maxlength="12" name="motherContactNo" id="motherContactNo" placeholder="" class="form-control" value="011123456789">
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text" name="motherAnnualIncome" id="motherAnnualIncome" placeholder="" class="form-control" value="20000">
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text" name="motherAdharCardNo" id="motherAdharCardNo" placeholder="" class="form-control" value="NCSDS00922">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Alumni</label>
	                                        <select class="select2" name="motherAlumni" id="motherAlumni">
	                                            <option value="">No</option>
	                                            <option value="">Yes</option>
	                                            
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Mother Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avtar-female.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="motherPhoto"  id="motherPhoto" class="form-control-file">
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
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian" checked>Father</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian">Mother</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian">Others </span>
                                            </div>
                                        </div>
                                    </div>

                                	<div class="active-div-aa" style="display: none;">
                                		<div class="row">
			                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
			                                    <div class="form-group aj-form-group">
			                                        <label>Address</label>
			                                        <textarea type="text" name="othersAddress" id="othersAddress" rows="7" placeholder="" class="aj-form-control"> </textarea>
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Name</label>
			                                        <input type="text" name="othersName" id="othersName" placeholder="" class="form-control">
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Relations</label>
                                                    <select class="select2" name="othersRelation" id="othersRelation">
                                                        <option value="">Select Relation</option>
                                                        <option selected value="Uncle">Uncle</option>
                                                        <option value="Aunt">Aunt</option>
                                                        <option value="Grand Father">Grand Father</option>
                                                        <option value="Grand Mother">Grand Mother</option>
                                                        <option value="Friend">Friend</option>
                                                        <option value="Other">Other</option>
	                                                </select>
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Mobile No.</label>
			                                        <input type="text" name="othersMobileNo" id="othersMobileNo" placeholder="" class="form-control">
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
		                                                <input type="file" name="othersPhoto" id="othersPhoto" class="form-control-file">
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
                                        <input type="text" name="studSMSContactNo" id="studSMSContactNo" minlength="12" maxlength="12" required="" placeholder="" class="form-control" value="919899395627">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Whatsapp Contact No.</label>
                                        <input type="text" name="studWhatsAppContactNo" id="studWhatsAppContactNo" minlength="12" maxlength="12" placeholder="" class="form-control" value="919899395627">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>E-Mail Address</label>
                                        <input type="text" name="studEmailAddress"  id="studEmailAddress" placeholder="" class="form-control" value="sdutta@gmail.com" > 
                                    </div>
                                </div>
                            </div>

                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Documents Submited</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_1" id="docUpload_1">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option selected value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_2" id="docUpload_2">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_3" id="docUpload_3">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option selected value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_4" id="docUpload_4">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div> <br><br>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload</label>
                                            <select class="select2" name="docUpload_5" id="docUpload_5">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_6" id="docUpload_6">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_7" id="docUpload_7">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_8" id="docUpload_8">
                                                <option value="">Select Document</option>
                                                <option value="15^NEW DELHI^INDIA">DELHI</option>
                                                <option value="7^U.P^INDIA">GHAZIABAD</option>
                                                <option selected value="36^U.P^INDIA">Greater Noida West</option>
                                                <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                                                <option value="5^U.P^INDIA">NOIDA</option>
                                                <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                                            </select>
                                        </div>
                                </div>
                                
                            </div>



                            <div class="footer-sec-aj">
                            	
                            
                            </div>
                            
                            <div class="aaj-btn-chang-c">
                                    <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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