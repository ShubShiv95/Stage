<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
$lid=$_SESSION["LOGINID"];
$schoolId=$_SESSION["SCHOOLID"];

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIFTCAMPUS | Update Staff Details</title>
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
                    <h3>View Staff </h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>View Staff </li>
                    </ul>
                </div>
				<?php 
					if(isset($_SESSION['successmsg'])){
					echo $_SESSION["successmsg"]; 
					}
				?>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">View Staff</h3>
                            </div>
                          
                        <form class="new-added-form school-form aj-new-added-form">
                             
                            <div class="row ">
                                    <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label>Role <span>*</span></label>
                                            <select class="select2" name="depar_Category">
                                                <option value="">Bro. Satheesh K. Don</option>
                                                <option value="">Bro. Satheesh K. Don</option>
                                                <option value="">Bro. Satheesh K. Don</option>
                                                <option value="">Bro. Satheesh K. Don</option>
                                                <option value="">Bro. Satheesh K. Don</option>
                                                <option value="">Bro. Satheesh K. Don</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 text-left">
                                        <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
                                        <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Get Data </a>
                                        <a  href="javascript:void(0);"  class=" ml-3 aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Export</a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2 mb-5">
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Filter Search    </label>
                                        <input type="text" name="desi_designation" placeholder="Staff Name/Login Id" class="form-control">
                                    </div>
                                    
                                </div>
                                </div>
                                    
                                <br>
                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 ">

                                    <div class="Attendance-staff aj-scroll-Attendance-staff">
                                        <div class="table-responsive">
                                            <table class="table table-bordered sticky-header table-striped">
                                                <thead >
                                                    <tr>
                                                        <th style="width: 25%;">Name </th>
                                                        <th style="width: 15%;">Mobile No.  </th>
                                                        <th style="width: 15%;">Login Id</th>
                                                        <th style="width: 10%;">Role</th>
                                                        <th style="width: 25%;">Father Name</th>
                                                        <th style="width: 10%;">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="top-position-ss">
												    <?php	
														$sqlstaffdetails='select Staff_Id, Staff_Name, Contact_No, Login_Id, Role, Fathers_Or_Husband_Name, Enabled from staff_master_table where School_Id="'.$schoolId.'" order by Staff_Id ';
														 $resultstaffdetails=mysqli_query($dbhandle,$sqlstaffdetails);
														 while($row=mysqli_fetch_assoc($resultstaffdetails)) {
													 ?>
                                                    <tr>
                                                        <td style="width: 25%;"><?php echo $row["Staff_Name"]; ?></td>
                                                        <td style="width: 15%;"><?php echo $row["Contact_No"]; ?></td>
                                                        <td style="width: 15%;"><?php echo $row["Login_Id"]; ?></td>
                                                        <td style="width: 10%;"><?php echo $row["Role"]; ?></td>
                                                        <td style="width: 25%;"><?php echo $row["Fathers_Or_Husband_Name"]; ?></td>
                                                        <td style="text-align: center; width: 10%;"> 
	                                                    	<div class="dropdown">
				                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                                                    <span class="flaticon-more-button-of-three-dots"></span>
				                                                </a>
				                                                <div class="dropdown-menu dropdown-menu-right">
				                                                    <a class="dropdown-item" href="EditStaff.php?staffid=<?php echo $row["Staff_Id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i>Edit</a>
				                                                    <a class="dropdown-item" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Family Detail</a>
				                                                    <a class="dropdown-item" href="#"><i class="fa fa-upload" aria-hidden="true"></i> Document Upload</a>
																	<?php if($row["Enabled"] ==1) { ?>
				                                                    <a class="dropdown-item" href="DeactivateStaff2.php?staffid=<?php echo $row["Staff_Id"]; ?>" onclick="return confirm('sure to Deactivate ?')"><i style="color: red" class="fa fa-ban" aria-hidden="true"></i>Deactivate</a>
																	<?php } else { ?>
																	<a class="dropdown-item" href="ActivateStaff2.php?staffid=<?php echo $row["Staff_Id"]; ?>" onclick="return confirm('sure to Activate ?')"><i style="color: green" class="fa fa-ban" aria-hidden="true"></i>Activate</a>
																	<?php } ?>
				                                                    <a class="dropdown-item" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Massage</a>
				                                                </div>
				                                            </div>
				                                        </td>

                                                    </tr>
													<?php } ?>  
                                                    
                                                </tbody>                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">Powered by <a href="http://swipetouch.tech">SwipeTouch Technologies</a></div>
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
<?php	
unset($_SESSION['successmsg']); 
?> 	
</body>

</html>