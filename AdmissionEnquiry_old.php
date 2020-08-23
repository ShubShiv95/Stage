<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'error_log.php';
include 'security.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admission Enquiry</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--The ajex-function.js file contains all controller ajex functions used in the erp.-->
    <script src="js/ajex-function.js"></script>

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
                                    <a href="index.php" class="nav-link"><i class="fas fa-angle-right"></i>Admin</a>
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
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-student.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-details.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admit-form.html" class="nav-link"><i
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
                            <a href="#" class="nav-link"><i class="flaticon-mortarboard"></i><span>Enquiry</span></a>
                            <ul class="nav sub-group-menu sub-group-active">
                                <li class="nav-item">
                                    <a href="AdmissionEnquiry.php" class="nav-link menu-active"><i class="fas fa-angle-right"></i>Admission Eqnuiry</a>
                                </li>
								<li class="nav-item">
                                    <a href="visitorEnquiry.php" class="nav-link"><i class="fas fa-angle-right"></i>Visitor</a>
                                </li>
                                <li class="nav-item">
                                    <a href="searchEnquiry.php" class="nav-link"><i class="fas fa-angle-right"></i>Search Eqnuiry</a>
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
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
			    <!-- Hot Links Area Start Here -->
				<?php include ('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
				  <!--<div class="col-xl-2 col-lg-4 col-4 fsec">
                    <h3>Admission Eqnuiry</h3>
				  </div>-->
                 			  
                   <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Admission Eqnuiry</li>
                    </ul>
				 	
                </div>
                <div class="ui-alart-box">
                            <div class="icon-color-alart" id="msgreply">
                                
                            </div>
                </div>
                <!-- Breadcubs Area End Here -->
				<!--<div class="page-title-section">
				  <i class="flaticon-mortarboard"></i>&nbsp;Admission Eqnuiry
				</div>-->
				
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body bg-skyblue">
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
                        <form class="new-added-form" id="admissionform" method="post" action="SaveAdmEnq.php">
						<input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control" required>
                            <div class="row">
							
							    
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Name *</label>
                                    <input type="text" id="sname" name="sname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enquirer Name *</label>
                                    <input type="text" id="enqname" name="enqname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" required>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enquirer Relation *</label>
                                    <select class="select2" id="enqrel" name="enqrel" required>
                                        <option value="">Select Option Values *</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Neighbour">Neighbour</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Contact Number *</label>
                                    <input type="text" id="contactno" name="contactno" placeholder="" class="form-control" onkeypress="return isNumberKey(event);"  onkeyup="restrict_textlength('contactno','10');" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email ID</label>
                                    <input type="email" id="email" name="email" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select Locality</label>
                                    <select class="select2" id="locality" name="locality">
                                        <option value="">Please Select Locality</option>
										<option value="Jharkhand">Jharkhand</option>
                                        <option value="Tata Nagar">Tata Nagar</option>
                                        <option value="Bhubaneswar">Bhubaneswar</option>
                                        <option value="Cuttack">Cuttack</option>
                                       
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Applying For Class *</label>
                                    <select class="select2" id="classno" name="classno" required>
                                        <option value="">Please Select Class *</option>
										<option value="Play School">Play School</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                       
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Applying for Session *</label>
                                    <select class="select2" id="session" name="session" required>
                                        <option value="">Please Select Session *</option>
										<option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                       
                                    </select>
                                </div>
                               <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Lead Source *</label>
                                    <select class="select2" id="lsource" name="lsource" required>
                                        <option value="">Please Select Lead *</option>
										<option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                       
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-12 form-group">
                                    <label>Follow Up Date *</label>
                                    <input type="text" id="fdate" name="fdate" placeholder="dd/mm/yyyy" class="form-control air-datepicker future-date"
                                        data-position='bottom right' required>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
								
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Any Sibling</label>
                                    <select class="select2" id="anysib" name="anysib">
                                        <option value="No">No</option>
										<option value="Yes">Yes</option>
                                    </select>
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group initial-disable">
                                    <label>Class *</label>
                                    <select class="select2" required name="classid" id="classid" onchange="showsection(this.value)">
                                        <!--option value="">Please Select Class *</option-->
                                        <option value="0">PleaseSelect Class *</option>
                                        <?php
                                            $query='select Class_Id,class_name,stream from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                                            $result=mysqli_query($dbhandle,$query);
                                            if(!$result)
                                                {
                                                    //var_dump($getStudentCount_result);
                                                    $error_msg=mysqli_error($dbhandle);
                                                    $el=new LogMessage();
                                                    $sql=$query;
                                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                    $el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                                                    $dbhandle->query("unlock tables");
                                                    mysqli_rollback($dbhandle);
                                                    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                                    //$str_end='</div>';
                                                    //echo $str_start.$messsage.$str_end;
                                                    //echo "";
                                                    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                }
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                            $str='<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"];
                                            if($row["stream"]==1)
                                            $str= $str . ' Science';
                                            else if($row["stream"]==2)
                                            $str= $str . ' Commerce';
                                            else if($row["stream"]==3)
                                            $str= $str . ' Arts';
                                            $str=$str . '</option>';
                                            echo $str;
                                        }
                                        ?>
                                    </select>
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group initial-disable" >
                                    <label>Section *</label>
                                    <select class="select2" name="secid" id="secid" onchange="showstudent(this.value)" required>
                                        <option value="">Please Select Section *</option>
                                    </select>
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group initial-disable" id="studentdiv">
                                    <label>Student Name *</label>
                                    <select class="select2" name="sid" id="sid" onchange="fillsid(this.value);" required>
                                        <option value="0">Please Select Student *</option>
                                       
                                    </select>
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group initial-disable">
                                    <label>Student Id</label>
                                    <input type="text" id="studentid" name="studentid" placeholder="" class="form-control" disabled>
                                </div>
								<div class="col-lg-6 col-12 form-group">
                                    <label>Remarks</label>
									 <input type="text" id="remarks" name="remarks" placeholder="" class="form-control">
                                    
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enter OTP</label>
                                    <input type="text" id="vmobno" name="vmobno" placeholder="" class="form-control">
                                </div>
								<div class="col-xl-3 col-lg-6 col-12 form-group">
								    <label>&nbsp;</label>
                                    <button type="button" name="otpbtn" id="otpbtn" class="btn-fill-md radius-4 text-light bg-true-v mbtn-verify">Generate OTP</button>
									<button type="button" name="votpbtn" id="votpbtn" class="btn-fill-md radius-4 text-light bg-dark-pastel-green mbtn-verify text-right">Verify OTP</button>
                                </div>
								
								
                                
                                <div class="col-12 form-group mg-t-8">
                                    <input type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="frm.submit();" value="Save">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
	<script src="js/myscript.js"></script>
    <script type="text/javascript">
    var frm = $('#admissionform');

    frm.submit(function (e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                //alert(data);
                $('div#msgreply').html(data);
                //alert(data);
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                $('div#msgreply').html(data);
                
            },
        });
    });
</script>
</body>

</html>