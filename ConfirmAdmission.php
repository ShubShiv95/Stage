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
    <title>SWIFTCAMPUS | Admission Confirmation</title>
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
        <?php include('includes/navbar.php') ?>
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
                    <!--h3>Students</h3-->
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Admission Confirmation</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Hot Links Area Start Here -->
                <?php include('includes/hot-link.php'); ?>
                <!-- Hot Links Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Admission Confirmation</h3>
                            </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th><td id="stud_name">asdda</td>
                                            <th>Application No</th><td id="sud_app_no">asd</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Class</th><td id="stud_class"></td>
                                            <th>Stream</th><td id="class_stream"></td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Father's Name</th><td id="f_name"></td>
                                            <th>Mother's Name</th><td id="m_name"></td>
                                        </tr>
                                        <tr>
                                            <th>DOB</th><td id="stud_dob"></td>    
                                            <th>Discount Category</th><td id="dis_cat"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <h4 class="text-center">Monthwise Fee Details</h4>
                            <div class="table-responsive show_cluster"></div>
                        </div>
                        </div>
                        <span id="class_id" class="d-none"></span>
                        <span id="class_session" class="d-none"></span>
                        <div class="text-center">
                            <form action="./AdmissionAdd_1.php" method="post" class="new-added-form aj-new-added-form col-lg-4 offset-lg-4" id="admission_confirm_form">
                                <input type="text" autocomplete="off" class="d-none" name="admission_confirm">
                                <input type="text" name="adminssion_id" class="d-none" value="<?php echo $_REQUEST['adminssion_id']; ?>">
                                    <div class="form-group aj-form-group">
                                        <label>Admission Number <span>*</span></label>
                                        <input type="text" name="admission_number" id="admission_number" placeholder=""  class="form-control">
                                    </div>
                            <input type="text" name="fee_cluster_id" class="d-none" id="fee_cluster_id" value="">
                            <div class="new-added-form school-form aj-new-added-form">
                            <button type="submit" name="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Enroll Student </button>
                            </div>
                        </form>
                        <div class="form_output col-12"></div>
                        </div>
                        
                    </div>
                    <!-- Admit Form Area End Here -->
                    <footer class="footer-wrap-layout1">
                        <div class="copyright"><?php if (isset($_SESSION["FOOTERNOTE"])) echo $_SESSION["FOOTERNOTE"];
                        else echo 'Powered by  <a href="http://swipetouch.tech">SwipeTouch Technologies</a>'; ?></div>
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
        <script>
        $(document).ready(function(){
            get_admission_details();
            function get_admission_details(){
                var stud_url = './universal_apis.php?get_admission_details=1&admission_id='+<?php echo $_GET['adminssion_id'] ?>+'';
                $.getJSON(stud_url,function(stud_response){
                    $.each(stud_response,function(key,value){
                        if(value.Middle_Name == null ){
                            var stud_name = value.First_Name+' '+value.Last_Name;
                        }else{
                            var stud_name = value.First_Name+' '+value.Middle_Name+' '+value.Last_Name;
                        }
                        $('#stud_name').text(stud_name);
                        $('#sud_app_no').text(value.Admission_Id );
                        $('#stud_class').text(value.Class_Name );
                        $('#stud_dob').text(value.DOB);
                        $('#f_name').text(value.Father_Name);
                        $('#m_name').text(value.Mother_Name);
                        $('#dis_cat').text(value.Concession_Name);
                        $('#class_id').text(value.Class_Id);
                        $('#class_session').text(value.Session);
                        $('#class_stream').text(value.Stream);
                        get_fee_cluster(value.Stream,value.Class_Id,value.Session);
                    });
                });
            }

            
            function get_fee_cluster(stream,class_id,session){
              url_cl = "./universal_apis.php?fee_cluster_id_by_class=1&class_id="+class_id+"&stream="+stream+"";
              $.getJSON(url_cl,function(cl_head){
                $.each(cl_head,function(key,value){
                    load_fee_cluster_details(value.FC_Id,session);
                    $('#fee_cluster_id').val(value.FC_Id);
                });
              });
            }
            
            function load_fee_cluster_details(fc_id,session){
                var send_data = {'get_clust_details':1,'cluster_session':session,'cluster_name':fc_id};
                $.get('./FeeControl_1.php',send_data,function(data){
                    $('.show_cluster').html(data);
                });
            }

            $(document).on('submit','#admission_confirm_form',function(event){
                event.preventDefault();
                var form_data = $('#admission_confirm_form').serialize();
                $.post($(this).attr('action'),form_data,function(resp_data){
                    $('.form_output').html(resp_data);
                });
            });
        });
        </script>
</body>

</html>