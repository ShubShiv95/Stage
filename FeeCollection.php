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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
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
                   
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Fee cluster Structure</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Hot Links Area Start Here -->
				<?php include ('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Fee cluster Structure</h3>
                            </div>
                            
                        </div>  
                        <form class="new-added-form aj-new-added-form Fee-collection" action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-xl-3 col-lg-3 col-12 aj-md-2">
                                    <div class="col-xl-12 col-lg-12 aj-md-2 pb-3">
                                        <div class="image">
                                            <img src="http://sms.solvethemess.in/sms/img/avtar.png"   alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 aj-md-2 mt-5">
                                        <div class="form-group aj-form-group">
                                            <label>Sibling Info</label>
                                            <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 aj-md-2 mt-4">
                                        <div class="form-group aj-form-group">
                                            <label>Excess Amount</label>
                                            <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 aj-md-2 mt-4">
                                        <div class="form-group aj-form-group">
                                            <label>Cheque Bounce</label>
                                            <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-12 aj-mb-2">
                                    <div class="" >
                                        <!--h5 class="text-center">Student Attendence Message</h5-->
                                        <div class="row justify-content-center mb-4 ">
                                        <div class="col-xl-6 col-lg-6 col-12 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Collection </label>
                                                    <select class="select2" name="name"> 
                                                        <option value="">-- School --</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>A/C Type </label>
                                                    <select class="select2" name="name1"> 
                                                        <option value="">-- School --</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Rec Date  <span>*</span></label>
                                                    <input type="text" name="f_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Rec No.</label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Search Name <span>*</span></label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Fee No <span>*</span></label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Father Name</label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Admission No. <span>*</span></label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Mother Name</label>
                                                    <input type="text" name="" placeholder="" required="" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-xl-12 col-lg-12 mb-3"><hr></div>
                                            <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                                                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                                    <div class="table-responsive">
                                                        <table class="table display ">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 50%;">Fee Installment Name </th>
                                                                    <th style="width: 20%;">Due Amt</th>
                                                                    <th style="width: 10%;">Select</th>
                                                                    <th style="width: 10%;">Details</th>
                                                                    <th style="width: 10%;">Fixed</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="top-position-ss">
                                                                <tr>
                                                                    <td style="width: 30%;">OCT</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%;">NOV</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%;">DEC</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%;">JAN</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%;">FEB</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%;">MAR</td>
                                                                    <td style="width: 20%;">2600</td>
                                                                    <td style="width: 10%;"><div class="radio"><span><input type="checkbox" class="sibling-bs" name="sibling"></span></div></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".details">...</a></td>
                                                                    <td style="width: 15%;"><a href="javascript:void(0);" data-toggle="modal" data-target=".Fixed">...</a></td>
                                                                </tr>
                                                            </tbody>                                                
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                        <div class="form-group aj-form-group">
                                                            <label>Late Fee</label>
                                                            <input type="text" name="" placeholder="" required="" class="form-control">
                                                        </div>        
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                        <div class="form-group aj-form-group">
                                                            <label>Readm Fee</label>
                                                            <input type="text" name="" placeholder="" required="" class="form-control">
                                                        </div>        
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                        <div class="form-group aj-form-group">
                                                            <label>Discount Fee</label>
                                                            <input type="text" name="" placeholder="" required="" class="form-control">
                                                        </div>        
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                        <div class="form-group aj-form-group">
                                                            <label>Chq Bounce</label>
                                                            <input type="text" name="" placeholder="" required="" class="form-control">
                                                        </div>        
                                                    </div> 
                                                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4">
                                                        <div class="form-group aj-form-group">
                                                            <label>Bus Late Fee</label>
                                                            <input type="text" name="" placeholder="" required="" class="form-control">
                                                        </div>        
                                                    </div>
                                                </div> 
                                            </div> 
                                              
                                    </div>
                                </div> 
                                                                   
                            </div>
                            <div class="col-lg-12">
                                                <table id="example" class="stripe row-border order-column" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Paymode </th>
                                                            <th>Instrument No</th>
                                                            <th>Instrument Date</th>
                                                            <th>Bank Name</th>
                                                            <th>Amount </th>
                                                            <th>Amt ( Inc . Charges ) </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dContecnt">
                                                    <tr>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <select class="" name=""> 
                                                                    <option value="">-- Cash --</option>
                                                                    <option value="">-- Cheque --</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <input type="number" name="" placeholder="" required="" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <input type="date" name="" required="" placeholder="dd/mm/yyyy" class="form-control" data-position="bottom right">
                                                            
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <select class="" name=""> 
                                                                    <option value="">-- Cash --</option>
                                                                    <option value="">-- Cheque --</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <input type="number" name="" placeholder="" required="" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group aj-form-group">
                                                                <input type="number" name="" placeholder="" required="" class="form-control on-chang" add="1" onkeypress="adddRowRow(event)" >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>  
                                        <div class="col-xl-12 col-lg-12 mb-3 mt-2"><hr></div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 mt-3">
                                                <div class="form-group aj-form-group">
                                                    <label>Deu</label>
                                                    <input type="number" name="" placeholder="" readonly="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 mt-3">
                                                <div class="form-group aj-form-group">
                                                    <label>Service</label>
                                                    <input type="number" name="" placeholder="" readonly="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 mt-3">
                                                <div class="form-group aj-form-group">
                                                    <label>Paid</label>
                                                    <input type="number" name="" placeholder="" readonly="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 mt-3">
                                                <div class="form-group aj-form-group">
                                                    <label>Balance</label>
                                                    <input type="number" name="" placeholder="" readonly="" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-12 aj-mb-2 mt-5">
                                                <div class="form-group aj-form-group">
                                                    <label>Remarks</label>
                                                    <input type="text" name="" placeholder=""  required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-12 aj-mb-2   mt-5">
                                                <div class="form-group aj-form-group mb-0">
                                                    <div class="radio mr-5">
                                                        <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Update Student Fee Remarks</b></span>
                                                    </div>
                                                </div>
                                                <div class="form-group aj-form-group">
                                                    <div class="radio mr-5">
                                                        <span><input type="checkbox" class="sibling-bs" name="sibling" > <b>Print Receipt</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-xl-12 col-12 text-center mt-3">
                                                    <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save</button>
                                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Cancel</button>  
                                                    <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Receipt Detail</button>
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

<div class="modal details" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h6 class="modal-title">Fee Head Details</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="model-tebal-in">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
            <form class="new-added-form aj-new-added-form Fee-collection" action="" method="post">
                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table display ">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Head Name  </th>
                                    <th style="width: 20%;">Amount </th>
                                    <th style="width: 20%;">Con Amt </th>
                                    <th style="width: 30%;">Paid Amount </th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss">
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                
                            </tbody>                                                
                        </table>
                    </div>
                </div>
                </form>
            </div> 
        
        </div>
      </div>
     

    </div>
  </div>
</div>
<div class="modal Fixed">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h6 class="modal-title">Fee Head Fixed</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="model-tebal-in">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
            <form class="new-added-form aj-new-added-form Fee-collection" action="" method="post">
                <div class="Attendance-staff  aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table display ">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Head Name  </th>
                                    <th style="width: 20%;">Amount </th>
                                    <th style="width: 20%;">Con Amt </th>
                                    <th style="width: 30%;">Paid Amount </th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss">
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Tuition Fee</td>
                                    <td style="width: 20%;">2600</td>
                                    <td style="width: 20%;">0</td>
                                    <td style="width: 30%;"><div class="form-group aj-form-group"><input type="text" name="" placeholder="" required="" class="form-control"></div></td>
                                </tr>
                                
                            </tbody>                                                
                        </table>
                    </div>
                        
                </div>


               
                </form>
            </div> 
        
        </div>
      </div>
         

    </div>
  </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script>

        function adddRowRow(e){
            if (e.keyCode == 13) {
                        // var add = $(this).attr('add');
                        $(this).attr('add',1);
                        var cnt = '<tr><td ><div class="form-group aj-form-group"><select class="" name=""><option value="">-- Cash --</option><option value="">-- Cheque --</option></select></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" required="" class="form-control"></div></td><td ><div class="form-group aj-form-group"><input type="date" name="" required="" placeholder="dd/mm/yyyy" class="form-control "></div></td><td ><div class="form-group aj-form-group"><select class="" name=""><option value="">-- Cash --</option><option value="">-- Cheque --</option></select></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" required="" class="form-control"></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" required="" class="form-control on-chang" onkeypress="adddRowRow(event)" add="1" ></div></td></tr>';
                        $('#dContecnt').append(cnt)

                        
                    }
                    

        }
        // $(function(){
        //     $(".on-chang").keypress(function (e) {
        //         if (e.keyCode == 13) {
        //                 var add = $(this).attr('add');
        //                 $(this).attr('add',parseInt(add)+1);
        //                 var cnt = '<tr id="dContecnt"><td ><div class="form-group aj-form-group"><select class="select2" name=""><option value="">-- Cash --</option><option value="">-- Cheque --</option></select></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" required="" class="form-control"></div></td><td ><div class="form-group aj-form-group"><input type="text" name="" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right"></div></td><td ><div class="form-group aj-form-group"><select class="select2" name=""><option value="">-- Cash --</option><option value="">-- Cheque --</option></select></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" required="" class="form-control"></div></td><td ><div class="form-group aj-form-group"><input type="number" name="" placeholder="" onkeypress="adddRowRow(event)" required=""  class="form-control on-chang" add="1" ></div></td></tr>';
        //                 $('#dContecnt').append(cnt)
        //             }
        //         });
        //     });
            $(document).ready(function() {
                $('#example').DataTable( {
                    scrollY:        200,
                    scrollX:        true,
                    scrollCollapse: true,
                    paging:         false,
                    fixedColumns:   false
                } );
            } );
    </script>
</body>
</html>