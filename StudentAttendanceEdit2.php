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
                            <li>Student Attendence</li>
                        </ul>
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->
                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title aj-item-title">
                                    <h3 class="mb-4">Attendence</h3>
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
                                                <?php
                                                    //Collecting Attendance id for the attendance.
                                                    $AttendanceId=$_REQUEST["aid"]; 
                                                    $adt=$_REQUEST["adt"];
                                                    $secid=$_REQUEST["secid"];
                                                    $classid=$_REQUEST["classid"];
                                                    $period=$_REQUEST["period"];

                                                    $absent_student_list='';
                                                    mysqli_autocommit($dbhandle,FALSE);

                                                    //$dbhandle->query("lock table attendance_master_table write");
                                                    //Updating attendance master table with new updated master values.
                                                    $query1="update attendance_master_table set total_present=" . $_REQUEST["presentno"] . ",total_late=" . $_REQUEST["lateno"] . ",total_halfday=" . $_REQUEST["halfdayno"] . ",total_absent=" . $_REQUEST["absentno"] . ",attendance_taken_by='" . $_SESSION["LOGINID"] . "' where attendance_id=" . $AttendanceId . " and school_id=" . $_SESSION["SCHOOLID"];
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
                                                        //Preparing binding variables lists.
                                                        $AttendanceStatus='';		//This will be holding updated attendance value coming from the edit process.
                                                        $AttendanceRemarks='';		//This will be holding updated attendance remarks coming from the edit process.
                                                        $PrevAttendanceStatus='';	//This will be holding previous attendance value stored in the database during create attendance for the class corresponding to the students. 
                                                        $PrevAttendanceRemarks='';	//This will be holding previous attendance remarks value stored in the database during create attendance for the class corresponding to the students.
                                                        $StudentId='';				//This will be holding student id for which the above values are achieved.
                                                        $lid=$_SESSION["LOGINID"];	//This holds the user who is editing the attendance.
                                                    
                                                        $query4="update attendance_details_table set attendance_status=?,attendance_remarks=?,prev_attendance_status=?,prev_attendance_remarks=? where attendance_id=? and student_id=?";
                                                        $stmt4=$dbhandle->prepare($query4);
                                                        $stmt4->bind_param("ssssis",$AttendanceStatus,$AttendanceRemarks,$PrevAttendanceStatus,$PrevAttendanceRemarks,$AttendanceId,$StudentId);	
                                                        
                                                        $total_count=0;
                                                        $success_count=0;
                                                        $abscent_count=0;					// abscent student counter.
                                                        $asbcent_student = array();   //student abscent array list
                                                        
                                                    
                                                        for($i=1;$i<=$_REQUEST["total_count"];$i++)
                                                            {
                                                                //Generating index key values to fetch the Request array for the valiables posted.
                                                                $sidkey='sid' . $i;		//This key is used to fetch the student id value from the request array.							
                                                                $prevAttenStatusKey='prev_attendance_status' . $i;	//This key is used to fetch the previous attendancey value for the student stored during the previous attendance process.
                                                                $prevAttenRemarksKey='prev_attendance_remarks' . $i;	//This key is used to fetch the previous attendancey remarks value for the student stored during the previous attendance process.
                                                                $AttendanceRemarksKey='remarks' . $i;	//This key is used to fetch the current updated remarks provided in the remarks box. 
                                                                $rollnoKey='rollno' . $i;
                                                                $studentNameKey='sname'.$i; 
                                                                //Here fetching the corresponding attendance values and remarks as per edit process.
                                                                $AttendanceStatus=$_REQUEST[$i];
                                                                $AttendanceRemarks=$_REQUEST[$AttendanceRemarksKey];
                                                                $PrevAttendanceStatus=$_REQUEST[$prevAttenStatusKey];
                                                                $PrevAttendanceRemarks=$_REQUEST[$prevAttenRemarksKey];
                                                                $StudentId=$_REQUEST[$sidkey];
                                                                /*
                                                                if($PrevAttendanceStatus==$AttendanceStatus)
                                                                    {
                                                                        //This section checks if the previous attendance value and the updated attendance value are same then it means the attendance for the candidate is not edited and is correct as it was before.  So here we are not executing the updated process for this student attendance and continuing the for loop to the next incremental $i value to to process the next attendance record. 
                                                                        echo 'not updating';
                                                                        continue;
                                                                    }
                                                                else
                                                                    { */
                                                                        if($stmt4->execute())
                                                                            {
                                                                                if($AttendanceStatus=='ABSENT')
                                                                                    {
                                                                                        $absent_student_list=$absent_student_list .'<tr><td>' . $_REQUEST[$rollnoKey] . '</td><td>' . $_REQUEST[$studentNameKey] . '</td></tr>';    

                                                                                    }
                                                                                //var_dump($stmt4);
                                                                                $total_count=$total_count+1; //counts total by 1 for the attendance record.
                                                                                $success_count=$success_count+1; //counts by 1 if the insertion is successful for the fee detail record.
                                                                            }
                                                                        else
                                                                            {
                                                                                $total_count=$total_count+1;
                                                                                //echo "<p>Failed:Total Count=" . $total_count;
                                                                            }
                                                                            
                                                                            
                                                                    //}	
                                                            }
                                                    
                                                        if($total_count==$success_count)
                                                            {
                                                                mysqli_commit($dbhandle);
                                                                echo "<p><br><h1>Attendance posted successfully.</h1>";
                                                            }
                                                        else
                                                            {
                                                                mysqli_rollback($dbhandle);
                                                                echo "<h1><br><p>Database error. Please try again.</h1>";
                                                            }
                                                    
                                                    }   
                                                ?>            
                                                <h5 class="text-center">List of Absent Students</h5>
                                                <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Roll No. </th>
                                                                    <th>Srudent  Name </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php echo $absent_student_list;?>
                                                            </tbody>   
                                                        </table>
                                                </div>
                                                    <div class="atten-chack">
                                                        <div class="chack">
                                                            
                                                            <label class=""><?php echo '<input type="checkbox" class="form-check-input" ' .  ($period>1 ? 'disabled':'') . '>';?> Send Absentees SMS</label>                                                        </div>
                                                        <div class="chack">
                                                            <label class="form-check-label"><input type="checkbox" class="form-check-input" disabled> Send Absentees What's app</label>
                                                        </div>
                                                    </div>
                                                    <div class="new-added-form aj-new-added-form">
                                                        <div class="aaj-btn-chang-cbtn">
                                                            <?php echo '<a class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark mb-3" href="StudentAttendanceEdit.php?adt='.$adt.'&secid='.$secid.'&classid='.$classid .'&period='. $period .'&aid='.$AttendanceId.'">Edit Attendance  </a>';
                                                            if($period==1 ){ echo '<button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Post Attendance </button>';}?>
                                                        </div>
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