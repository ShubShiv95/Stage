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
                                                                $adt=$_REQUEST["adt"];
                                                                $secid=$_REQUEST["secid"];
                                                                $classid=$_REQUEST["classid"];
                                                                $period=$_REQUEST["period"];
                                                                $absent_student_list='';
                                                                echo $classid;

                                                                if($_REQUEST["absentno"]==0 and $_REQUEST["presentno"]==0)
                                                                {
                                                                    echo "<p><h1><br>Database option not found. Please check proper select values.</h1>";
                                                                    exit;
                                                                }
                                                                
                                                                mysqli_autocommit($dbhandle,true);
                                                                
                                                                //$dbhandle->query("lock table attendance_master_table write");
                                                                $aid=sequence_number('attendance_master_table',$dbhandle);
                                                                
                                                                $query1="insert into attendance_master_table (attendance_id,class_id,class_sec_id,doa,period,attendance_taken_by,total_absent,total_present,total_halfday,total_late,school_id,	attendance_status) values($aid," .$classid . "," .$secid . ",str_to_date('" . $adt . "','%d/%m/%Y')," . $_REQUEST["period"] . ",'" . $_SESSION["LOGINID"] . "'," . $_REQUEST["absentno"] . "," .$_REQUEST["presentno"] ."," . $_REQUEST["halfdayno"] . "," .$_REQUEST["lateno"] ."," . $_SESSION["SCHOOLID"] . ",1)";
                                                                //echo $query1.'<br>';
                                                                $result1=$dbhandle->query($query1);
                                                                //$error=mysqli_error($dbhandle);
                                                                //echo $error;
                                                                //var_dump($result1);
                                                                if(!$result1)
                                                                {
                                                                    mysqli_rollback($dbhandle);
                                                                    $dbhandle->query("unlock tables");
                                                                    echo "<p><h1>At First Step. Database Error. Please try after some time.</h1>";
                                                                    exit;
                                                                }
                                                                else
                                                                    {     
                                                                        $sidkey='sid';
                                                                        $attendance='';
                                                                        $remarkskey='remarks';
                                                                        $lid=$_SESSION["LOGINID"];
                                                                        $schoolid=$_SESSION["SCHOOLID"];
                                                                        $query4="insert into attendance_details_table (attendance_id,student_id,attendance_status,attendance_remarks,prev_attendance_status,prev_attendance_remarks,school_id) values(?,?,?,?,?,?,?)";
                                                                        $stmt4=$dbhandle->prepare($query4);
                                                                        $stmt4->bind_param("isssssi",$aid,$sid,$attendance,$remarks,$attendance,$remarks,$_SESSION["SCHOOLID"]);	
                                                                        $total_count=0;
                                                                        $success_count=0;
                                                                        $abscent_count=0;					// abscent student counter.
                                                                            
                                                                        for($i=1;$i<=$_REQUEST["total_count"];$i++)
                                                                        {
                                                                            $sidkey='sid' . $i;
                                                                            $sid=$_REQUEST[$sidkey];
                                                                            $remarkskey='remarks' . $i;
                                                                            $remarks=$_REQUEST[$remarkskey];
                                                                            $attendance=$_REQUEST[$i];
                                                                            $studentNameKey='sname'.$i; 
                                                                            $rollnoKey='rollno' . $i; 
                                                                            //var_dump($stmt4);
                                                                            if($stmt4->execute())
                                                                                {
                                                                                    $total_count=$total_count+1; //counts total by 1 for the attendance record.
                                                                                    $success_count=$success_count+1; //counts by 1 if the insertion is successful for the fee detail record.	
                                                                                    if($attendance=='ABSENT')
                                                                                        {
                                                                                            $absent_student_list=$absent_student_list .'<tr><td>' . $_REQUEST[$rollnoKey] . '</td><td>' . $_REQUEST[$studentNameKey] . '</td></tr>';    

                                                                                        }
                                                                                    //echo "Attendance Status=" . $attendance . '<br>';
                                                                                    
                                                                                    /*Commented Abscent message system. Will be reconstruct as per new requirement.
                                                                                    $attendance_result=true;
                                                                                    $attenSmsFlag_result=true;
                                                                                    //var_dump($stmt4);
                                                                                        
                                                                                        if($attendance=='ABSENT')	//if the student is abscent.
                                                                                            {
                                                                                                $sname_index="sname".$i;
                                                                                                $sname=$_REQUEST[$sname_index];
                                                                                                $attnd_msg="Dear Parent " . $sname ." has found abscent on " . $adt . " as per school attendance. Please take care of your child.";
                                                                                                $attendance_sql="insert into student_message_list (student_id,message,mobile_no,message_cat,status_code,school_id,delivery_date) values('" . $sid . "','" . $attnd_msg . "',(select father_mob_no from student_master_table where student_id='" . $sid . "'),5,0," . $_SESSION["SCHOOLID"] . ",str_to_date(now(),'%Y-%m-%d'))";
                                                                                                    //echo '<br>' . $attnd_msg;
                                                                                                //echo '<br>' . $attendance_sql;
                                                                                                    $attendance_result=$dbhandle->query($attendance_sql);
                                                                                                //Update status of sms sent successful for the attendance for the class.
                                                                                                $attenSmsFlag_result=$dbhandle->query("update attendance_details_table set sms_sent_status=1 where attendance_id=" . $aid );
                                                                                            }
                                                                                        if($attendance_result and $attenSmsFlag_result)
                                                                                            {
                                                                                                $total_count=$total_count+1; //counts total by 1 for the attendance record.
                                                                                                $success_count=$success_count+1; //counts by 1 if the insertion is successful for the fee detail record.
                                                                                            }
                                                                                        else
                                                                                            {
                                                                                                $total_count=$total_count+1;
                                                                                                echo mysqli_error($dbhandle);
                                                                                            }
                                                                                            */
                                                                                        //echo "<p>Passed:Total Count=" . $total_count;
                                                                                        //echo "<p>Passed:Success Count=" . $success_count;
                                                                                        //echo '<p>' . $_REQUEST[$chkabskey];
                                                                                }
                                                                            else
                                                                                {
                                                                                    $total_count=$total_count+1;
                                                                                    // echo mysql_error($dbhandle);
                                                                                    //echo "<p>Failed:Total Count=" . $total_count;
                                                                                    
                                                                                }
                                                                        }
                                                                        //echo '<br>'.$total_count . ' and  ' . $success_count;
                                                                        if($total_count==$success_count and ($total_count!=0 or $success_count!=0))
                                                                        {
                                                                            mysqli_commit($dbhandle);
                                                                            echo "<p><br><h1>Attendance posted successfully.</h1>";
                                                                            
                                                                        }
                                                                        else
                                                                        {
                                                                            mysqli_rollback($dbhandle);
                                                                            echo "<h1><br><p>Database error. Please try again.</h1>";
                                                                        }
                                                                        $dbhandle->query("unlock tables");
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
                                                            <label class="form-check-label"><?php echo '<input type="checkbox" class="form-check-input" ' .  ($period>1 ? 'disabled':'') . '>';?> Send Absentees What's app</label>
                                                        </div>
                                                    </div>
                                                    <div class="new-added-form aj-new-added-form">
                                                        <div class="aaj-btn-chang-cbtn">
                                                            <?php echo '<a class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark mb-3" href="StudentAttendanceEdit.php?adt='.$adt.'&secid='.$secid.'&classid='.$classid .'&period='. $period .'&aid='.$aid.'">Edit Attendance  </a>';?>
                                                            <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Post Attendance </button>
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