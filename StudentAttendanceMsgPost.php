<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
include 'sequenceGenerator.php';
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
                        <h3>Students</h3>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Attendence Message</li>
                        </ul>
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->
                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title aj-item-title">
                                    <h3 class="mb-4">Attendence Message </h3>
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
                                </div-->
                            </div> 
                            
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                    <form class="new-added-form school-form aj-new-added-form">
                                        <div class="tebal-promotion" >
                                        <h5 class="text-center">Pending SMS Sent to Absent Student's Parent</h5>
                                                <div>


                                                <?php

                                                    /*commented for demo purpose...else the code is running..



                                                    //Collecting Attendance id for the attendance.
                                                    $aidlist=array();
                                                    $aidlist=$_REQUEST["pendingaid"];
                                                    
                                                    foreach($aidlist as $value)
                                                        {
                                                            $AttendanceId=$value;
                                                            // $Flag=$_REQUEST["flag"];  requires verification why this is used.
                                                            $SMS='';
                                                            $GLOBAL_MESSAGE_CATEGORY=array();
                                                            $GLOBAL_MESSAGE_CATEGORY= array(
                                                                'NEW_ATTENDANCE_SMS'=>'NEW ATTENDANCE SMS',
                                                                'MFD_ATTENDANCE_SMS'=>'MODIFIED ATTENDANCE SMS',
                                                            );
                                                            $Message_Title="Attendance Message";
                                                            $Message_Date=date('d/m/Y');


                                                        
                                                            mysqli_autocommit($dbhandle,FALSE);

                                                            //$dbhandle->query("lock table attendance_master_table write");
                                                            //Updating attendance master table with new updated master values.
                                                            $query1="select smt.first_name,smt.sms_contact_no,smt.gender from student_master_table smt,attendance_details_table adt where attendance_id=" . $AttendanceId .  " and adt.attendance_status='ABSENT'" .  ' and smt.student_id=adt.student_id';
                                                            //echo $query1;
                                                            
                                                            $result1=$dbhandle->query($query1);
                                                            
                                                            
                                                            if(!$result1)
                                                                {
                                                                    mysqli_rollback($dbhandle);
                                                                    echo "<p><h1>At First Step. Database Error. Please try after some time.</h1>";
                                                                    exit;
                                                                }
                                                            else	//if attendance master_table_update process done successfully then updating attendance_details_table;
                                                            {
                                                                $totalRows=$result1->num_rows;
                                                                $count=0;
                                                                while($rows=$result1->fetch_assoc())
                                                                {
                                                                    $SMS='Dear Parent, This is to inform you that your ' . ($rows["gender"]=='FEMALE'?'daughter' : 'son') . ' ' . $rows["first_name"] . ' is found absent in class on ' . $Message_Date.  '. Please take care of your '. ($rows["gender"]=='FEMALE'?'daughter' : 'son');  
                                                                    echo $SMS . '<p>';
                                                                    $count++;
                                                                } 
                                                                $updateMessageStatus_sql="update attendance_master_table set smsflag=1 where attendance_id="  . $AttendanceId; 
                                                                $updateMessageStatus_result=$dbhandle->query($updateMessageStatus_sql);
                                                                if($count==$totalRows and $updateMessageStatus_result)
                                                                    {
                                                                        mysqli_commit($dbhandle);
                                                                        echo "Messages Sent Successfully.";
                                                                    }

                                                            }   

                                                        }    


                                                        */
                                                ?>            
                                                
                                                        
                                                </div>
                                                        
                                        </div>                                    
                                    </form>
                                </div>
                                    
                            </div>
                        </div>            
                    </div>
                <!--/div-->
                    <!-- Admit Form Area End Here -->
                    <footer class="footer-wrap-layout1">
                        <div class="copyright"> <?php include 'footer.php';?>  </div>
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
</body>
</html>