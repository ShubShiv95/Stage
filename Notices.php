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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
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
				<!-- <?php include ('includes/hot-link.php'); ?> -->
                <!-- Hot Links Area End Here -->
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admission Eqnuiry</h3>
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
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Notices And Circular</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form aj-new-added-form new-aj-new-added-form">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> Title</label>
                                        <input type="text" minlength="12" maxlength="12" name="ra_telephone" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> Notice Type</label>
                                        <select class="select2" id="Notice" name="class">
                                            <option value="All">All</option>
                                            <option value="Nurshery" data-select2-id="17">Nurshery</option>
                                            <option value="Play" data-select2-id="18">Play</option>
                                            <option value="LKG" data-select2-id="19">LKG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Details</label>
                                        <textarea  class="textarea summernote aj-form-control" name="editor1" id="note" cols="5" rows="5" onkeyup="restrict_textlength('note','100');"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                    <div class="form-group ">
                                                <label class="ml-4">Files</label>
                                                <input type="file" name="" placeholder="" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 aj-mb-2"></div>

                                <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group float-right">
                                        <div class="row-chang mt-5">
                                        <span class="mt-2"> Publish In website ?</span>
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling" checked=""> Yes </span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling"> No</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> School Staff</label>
                                        <select class="select2" id="School-Staff" name="class">
                                            <option value="All">All</option>
                                            <option value="Nurshery" data-select2-id="17">Nurshery</option>
                                            <option value="Play" data-select2-id="18">Play</option>
                                            <option value="LKG" data-select2-id="19">LKG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 aj-mb-2"></div>
                                <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> All Departments</label>
                                        <select class="select2" id="Departments" name="class">
                                            <option value="All">All</option>
                                            <option value="Nurshery" data-select2-id="17">Nurshery</option>
                                            <option value="Play" data-select2-id="18">Play</option>
                                            <option value="LKG" data-select2-id="19">LKG</option>
                                        </select>
                                    </div>
                                </div>                    
                            </div>
                                <div class="row mt-5">
                                    <div class="col-xl-5 col-lg-5 col-12">
                                        <div class="Individuals-cug">
                                            <div class="Attendance-staff Attendance-staff aj-scroll-Attendance-staff" >
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-3 pb-3"> 
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll">
                                                                        <label class="form-check-label text-white">Select Individuals</label>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="top-position-ss2">
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-12">
                                        <div class="Individuals-cug">
                                            <div class="sec-icones-a">
                                                <div class="text-center">
                                                    <button><i class="fa fa-hand-o-right" style="color: green;" aria-hidden="true"></i></button>
                                                    <br>
                                                    <button  class="mt-4"><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-12">
                                        <div class="Individuals-cug">
                                            <div class="Attendance-staff Attendance-staff aj-scroll-Attendance-staff" >
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-3 pb-3"> 
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll">
                                                                        <label class="form-check-label text-white">Select Individuals</label>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="top-position-ss2">
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create</button>
                                            <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
                //$('div#msgreply').html(data);
                alert(data);
                $('#admissionform').trigger("reset");
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                //$('div#msgreply').html(data);
                alert(data);
            },
        });
    });
</script>
<script>
function generateOtp()
{
var mobileno=document.getElementById('contactno').value;
var xmlhttp;    
if (mobileno=="")
  {
  alert('Please Provide the Contact Numebr.');
  return;
  }
  //document.getElementById('otpverifymsg').innerHTML=' - OTP Sent';
//alert(outtime);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById('otp').value=xmlhttp.responseText;
        document.getElementById('otpverifymsg').innerHTML=' OTP Sent - Verify Now';
        //alert('OTP'+ xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","sendOtp.php?mobileno="+mobileno,true);
xmlhttp.send();
}

function verifyOtp(){

    var otp=document.getElementById('otp').value;
    var verifyingotp=document.getElementById('otptoverify').value;
    //alert('Generated OTP is ' + otp + ' and verifying OTP is ' + verifyingotp)
    if(otp==verifyingotp)
    {
        //alert("OTP Verified.")
        document.getElementById('votp').value=1;
        document.getElementById('otpverifymsg').innerHTML=' - Verified.';
    }
    else
    {
        //alert("Invalid OTP.")
        document.getElementById('votp').value=0;
        document.getElementById('otpverifymsg').value='Invalid OTP.';
    }

}

CKEDITOR.replace( 'editor1' );
</script>                                        
</body>

</html>