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
    <title>SWIFTCAMPUS | Add New Staff</title>
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
                    <h3>Staff</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Staff  Form</li>
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
                        <form class="new-added-form school-form aj-new-added-form" id="addstaffform" method="post" action="AddStaff2.php">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Staff Name <span>*</span></label>
                                        <input type="text" name="staf_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Gender </label>
                                        <select class="select2" name="staf_Gender" required="">
                                            <option value="">Please Select Gender </option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Mobile No. <span>*</span></label>
                                        <input type="text" minlength="12" maxlength="10" required="" name="staf_phone" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>E-mail </label>
                                        <input type="email" name="staf_email" placeholder="" required="" class="form-control">
                                    </div>
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Category </label>
                                        <select class="select2" name="staf_category">
                                            <option value="">Please Select Class</option>
                                            <option value="Teaching">Teaching</option>
                                            <option value="Non-Teaching">Non-Teaching</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Department</label>
                                        <select class="select2" name="staf_department">
                                            <option value="">Please Select Section</option>
											<?php	
											 $sqldept='select Dept_Id, Dept_Name from department_master_table where Enabled=1 and School_Id="'.$schoolId.'" order by Dept_Id ';
											 $resultdept=mysqli_query($dbhandle,$sqldept);
											 while($row=mysqli_fetch_assoc($resultdept)) {
											?>	
											<option value="<?php echo $row["Dept_Id"]; ?>"><?php echo $row["Dept_Name"]; ?></option>
											<?php } ?>  
                                            
                                        </select>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Designation </label>
                                        <select class="select2" name="staf_designation">
                                            <option value="">Please Select Roll Number </option>
                                            <?php	
											 $sqldesc='select Desig_Id, Designation from designation_master_table where Enabled=1 and School_Id="'.$schoolId.'" order by Desig_Id ';
											 $resultdesc=mysqli_query($dbhandle,$sqldesc);
											 while($row=mysqli_fetch_assoc($resultdesc)) {
											?>	
											<option value="<?php echo $row["Desig_Id"]; ?>"><?php echo $row["Designation"]; ?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Alternate Contact No</label>
                                        <input type="text" name="staf_alternate_con" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Address </label>
                                        <textarea type="text" rows="4" name="staf_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                        <label>City</label>
                                        <input type="text" name="staf_city" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>State</label>
                                        <select class="select2" name="staf_state">
                                            <option value="">Please Select State</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="3">D</option>
                                            <option value="3">E</option>
                                            <option value="3">F</option>
                                            <option value="3">G</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>District</label>
                                        <select class="select2" name="staf_district">
                                            <option value="">Please Select District</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="3">D</option>
                                            <option value="3">E</option>
                                            <option value="3">F</option>
                                            <option value="3">G</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Father Name/Husband Name</label>
                                        <input type="text" name="staf_father_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" name="staf_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Blood Group</label>
                                        <input type="text" name="staf_blood_group" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Qualification </label>
                                        <input type="text" name="staf_qualification" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Experience(Yrs) <span>*</span> </label>
                                        <input type="text" name="staf_experience" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Date Of Joining </label>
                                        <input type="text" name="staf_doj" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Job Status</label>
                                        <select class="select2" name="staf_job_ststus">
                                            <option value="">Please Select Class</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="3">D</option>
                                            <option value="3">E</option>
                                            <option value="3">F</option>
                                            <option value="3">G</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                        <label>Bank Acc. Number </label>
                                        <input type="text" name="staf_bank_acc" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Bank  Number </label>
                                        <input type="text" name="staf_bank_name" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Bank Branch </label>
                                        <input type="text" name="staf_bank_branch" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>IFSC Code </label>
                                        <input type="text" name="staf_ifsc" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>PAN Cord No. </label>
                                        <input type="text" name="staf_pan_card" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Aadhaar No.</label>
                                        <input type="text" name="staf_aadhar_no" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>UAN No.</label>
                                        <input type="text" name="staf_uan_no" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>PF Acc. No. </label>
                                        <input type="text" name="staf_pf_acc" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>ESI Acc No. </label>
                                        <input type="text" name="staf_esi" placeholder="" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Login ID </label>
                                        <input type="text" name="staf_login" placeholder="" required="" class="form-control">
                                    </div>
									                                    
                                </div>
                                <div class="aaj-btn-chang-c">
                                    <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <!-- <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> -->
                                    
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">Powered by  <a href="http://swipetouch.tech">SwipeTouch Technologies</a></div>
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