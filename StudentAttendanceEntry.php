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
    <title>AKKHOR | Student Attendence</title>
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
                    <h3>Student Attendence</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Attendence</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Student Attendence Search Area Start Here -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title aj-item-title">
                                        <h3>Student Attendence</h3>
                                    </div>
                                </div>
                                <form class="new-added-form aj-new-added-form">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                        <div class="form-group aj-form-group">
                                                <label>Select Class</label>
                                                <select class="select2" name="attn-class">
                                                    <option value="">Class K.G. 1</option>
                                                    <option value="1">Nursery</option>
                                                    <option value="2">Play</option>
                                                    <option value="3">One</option>
                                                    <option value="4">Two</option>
                                                    <option value="5">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Select Section</label>
                                                <select class="select2" name="attn-section">
                                                    <option value="0">Select Section</option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                    <option value="4">D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Select Date</label>
                                                <input type="text" name="attn_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 aaj-btn-chang text-right">
                                            <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                            
                                        </div>
                                    </div>
                                </form>
                                <div class="tebal-promotion" >
                                <form class="new-added-form aj-new-added-form" action="AbsentStudentList.php" method="post">
                                    <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Attendance Halfs <span>*</span></label>
                                                <select class="select2" name="f_class">
                                                    <option value="">First Half</option>
                                                    <option value="3">One</option>
                                                    <option value="3">Two</option>
                                                    <option value="3">Three</option>
                                                    <option value="3">Four</option>
                                                    <option value="3">Five</option>
                                                </select>
                                            </div>
                                        
                                   
                                    
                                </div>
                               
                            </div>
                                    <div class="table-responsive mt-5">
                                        <table class="table table-bordered redio-btn-ch">
                                            <thead>
                                                <tr>
                                                    <th>Roll No. </th>
                                                    <th>Student Name </th>
                                                    <th>Attendance Status</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>K.G. Student 1</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="Present" checked> Present</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present" > Late</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present" > Half Day</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present" > Abscent</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>K.G. Student 2</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="Present1" > Present</span>
                                                          <span><input checked type="radio" class="gaurdian-bs" name="Present1" > Late</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present1" > Half Day</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present1" > Abscent</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>K.G. Student 3</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="Present2" > Present</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present2" > Late</span>
                                                          <span><input type="radio" class="gaurdian-bs" checked name="Present2" > Half Day</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present2" > Abscent</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>K.G. Student 4</td>
                                                    <td>
                                                        <div class="radio">
                                                          <span><input type="radio" class="gaurdian-bs" name="Present4" > Present</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present4" > Late</span>
                                                          <span><input type="radio" class="gaurdian-bs" name="Present4" > Half Day</span>
                                                          <span><input type="radio" class="gaurdian-bs" checked name="Present4" > Abscent</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"></textarea>
                                                    </td>
                                                </tr>

                                                
                                            </tbody>                                                
                                        </table>
                                    </div>

                                    <div class="inpuy-chang-box atten-inpuy-chang-box">
                                        <div class="form-output">
                                            <div class="name-f">
                                                <h6>Present Number</h6>
                                            </div>
                                            <div class="input-box-in">
                                                <input type="text" readonly="" class="redonly-form-control" value="3" name="">
                                            </div>
                                            <div class="name-f">
                                                <h6>Late Number</h6>
                                            </div>
                                            <div class="input-box-in">
                                                <input type="text" readonly="" class="redonly-form-control" value="3" name="">
                                            </div>

                                            <div class="name-f">
                                                <h6>Half Day Number</h6>
                                            </div>
                                            <div class="input-box-in">
                                                <input type="text" readonly="" class="redonly-form-control" value="3" name="">
                                            </div>
                                            <div class="name-f">
                                                <h6>Abscent Number</h6>
                                            </div>
                                            <div class="input-box-in n-br">
                                                <input type="text" readonly="" class="redonly-form-control" value="1" name="">
                                            </div>
                                        </div>

                                        <div class="new-added-form aj-new-added-form">
                                         <div class="aaj-btn-chang-cbtn">
                                                 <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save Attendance </button>
                                                 <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                          </div>
                                        </div> 
                                        

                                    </div>

                                </form>
                            </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Student Attendence Area End Here -->
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
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>

    <!-- Custom Js -->
    <script src="js/main.js"></script>
<script type="text/javascript">
    $(function(){
        $("input[type='text']").each(function( index ) {
          if(this.value == 'P' || this.value == 'p'){
            $(this).addClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-ap");
          }else if(this.value == 'A' || this.value == 'a'){
            $(this).removeClass("atent-p");
            $(this).addClass("atent-a");
            $(this).removeClass("atent-ap");
          }else if(this.value == '-'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).addClass("atent-ap");
          }
        });
    })
$(document).on("change","input[type='text']",function(){
    if($(this).val() == 'P' || $(this).val() == 'p'){
            $(this).addClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-ap");
          }else if($(this).val() == 'A' || $(this).val() == 'a'){
            $(this).removeClass("atent-p");
            $(this).addClass("atent-a");
            $(this).removeClass("atent-ap");
          }else if($(this).val() == '-'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).addClass("atent-ap");
          }
})
</script>
</body>

</html>