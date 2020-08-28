<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Communication</title>
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
			    <!-- Hot Links Area Start Here -->
				<?php include ('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
				  <!--<div class="col-xl-2 col-lg-4 col-4 fsec">
                    <h3>Visitor Eqnuiry</h3>
				  </div>-->
                 			  
                   <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Individual Sms</li>
                    </ul>
				  	
                </div>
                <!-- Breadcubs Area End Here -->
				<!--<div class="page-title-section">
				  <i class="flaticon-mortarboard"></i>&nbsp;Admission Eqnuiry
				</div>-->
				
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body bg-skybluelight">
                       <!-- <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Students</h3>
                            </div>
                            <div class="dropdown">
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
                    <form class="new-added-form">
						
                        <div class="row">
							    
							<div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
							    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Message To Student*</label>
                                    <select class="select2" id="smscommclass" name="smscommclass" required>
                                        <option value="">Select Class *</option>
										<option value="Play School">Play School</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                       
                                    </select>
                                </div>
                                
								<div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>&nbsp;</label>
                                    <select class="select2" id="smscommsection" name="smscommsection" required>
                                        <option value="">Select Section *</option>
										<option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
								
								<div class="col-xl-12 col-lg-12 col-12 form-group initial-disable1">
                                    <div class="tabular-section-detail comm-message">
                                            <div class="table-responsive">
                                                <table class="table display data-table text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                            <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input checkAll">
                                                                    <label class="form-check-label">Student of Nursery A</label>
                                                            </div>
                                                            </th>
                                                            
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Mark Willy</label>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                    </div>
								</div>
						    </div>
                                
								
							
					
							<div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
								<div class="col-xl-12 col-lg-12 col-12 form-group">
										<label>Title *</label>
										<input type="text" id="messagetitle" name="messagetitle" placeholder="" class="form-control" required>
								</div>
								<div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Compose Messeage *</label>
                                    <textarea class="textarea form-control" name="messagedetail" id="messagedetail" cols="10" rows="10" onkeyup="restrict_textlength('messagedetail','300');" required></textarea>
                                </div>
								<div class="col-xl-12 col-lg-12 col-12 form-group count-row">
								 <div class="col-xl-6 col-lg-6 col-6 form-group char-count">
								   <span>Character Count: 189</span>
								 </div>
								 <div class="col-xl-6 col-lg-6 col-6 form-group sms-count">
								   <span>Sms Count: 2</span>
								 </div>
								
								</div>
								<div class="col-xl-12 col-lg-12 col-12 form-group count-row">
								 <div class="col-xl-6 col-lg-6 col-12 form-group">
								   <span>Message Balance: 25000</span>
								 </div>
								</div>
								<div class="col-xl-12 col-lg-12 col-12 form-group count-row">
								 <div class="col-xl-4 col-lg-4 col-12 form-group">
								   <span>Message Sending Date</span>
								 </div>
								 <div class="col-xl-5 col-lg-5 col-12 form-group">
								       <input type="text" id="messagedate" name="messagedate" placeholder="Select Date" class="form-control air-datepicker future-date"
											data-position='bottom right' required>
										<i class="far fa-calendar-alt messagedate"></i>
									
								 </div>
								 <div class="col-xl-3 col-lg-3 col-12 form-group">
								       <input type="time" id="messagetime" name="messagetime" class="form-control" required>
									
								 </div>
								</div>
								<div class="col-xl-12 col-lg-12 col-12 form-group count-row">
								 <div class="col-xl-6 col-lg-6 col-12 form-group">
								   <span>Message As</span>
								 </div>
								</div>
								<div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="messagetype">
								 <div class="col-xl-4 col-lg-4 col-12 form-group">
								   <span>SMS</span> <input type="checkbox" id="messagesms" name="messageas[]" value="SMS" class="">
								 </div>
								 <div class="col-xl-4 col-lg-4 col-12 form-group">
								      <span>What's App</span> <input type="checkbox" id="messagewhatsapp" name="messageas[]" value="What's App" class="">
								 </div>
								 <div class="col-xl-4 col-lg-4 col-12 form-group btncomm">
								       <button type="submit" id="sendmessage" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
									
								 </div>
								</div>
							</div>
							
							
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
	<!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
	<script src="js/myscript.js"></script>


</body>

</html>