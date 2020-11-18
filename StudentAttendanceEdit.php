<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
$Date_format = "d/m/Y"; //Creating a Indian date format string variable.
date_default_timezone_set('Asia/Kolkata');  //setting Indian time zone at application server level.
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIPETOUCH | Edit Student Attendence</title>
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
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
    <style>
    .attendance-textarea{
        font-size: 1.5rem;
    }
    </style>
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
                                        <!--div class="col-xl-4 col-lg-6 col-12 form-group"-->
                                        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Class</label>
                                                <select class="select2" required name="classid" id="classid" onchange="showsection(this.value)">
                                                    <!--option value="">Please Select Class *</option-->
                                                    <option value="0">Please Select Class *</option>
                                                    <?php
                                                        $query='select Class_Id,class_name from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                                                        $result=$dbhandle->query($query);
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
                                                        $str=$str . '</option>';
                                                        echo $str;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Section</label>
                                                <select class="select2" name="secid" id="secid" required>
                                                    <option value="">Please Select Section *</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Section</label>
                                                <select class="select2" name="cperiod" id="cperiod" required>
                                                    <option value="1">Period 1</option>
                                                    <option value="2">Period 2</option>
                                                    <option value="3">Period 3</option>
                                                    <option value="4">Period 4</option>
                                                    <option value="5">Period 5</option>
                                                    <option value="6">Period 6</option>
                                                    <option value="7">Period 7</option>
                                                    <option value="8">Period 8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Select Date</label>
                                                <input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php echo date('d/m/Y');?>">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 aaj-btn-chang text-right">
                                            <br>
                                            <button type="BUTTON" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="return editAttendanceList();">Submit</button>
                                            
                                        </div>
                                    </div>
                                </form>
                                <form class="new-added-form aj-new-added-form" action="StudentAttendanceEdit2.php" method="post">
                                    <div class="tebal-promotion" id="attendance-list-div">
                                        <!--Student Attendance List Form Starts Here-->
                                        <?php 
                                                    if(isset($_REQUEST["adt"])==True and isset($_REQUEST["secid"])==True and isset($_REQUEST["classid"])==True and isset($_REQUEST["period"])==True)
                                                    {
                                                                                                     
                                                        $adt=$_REQUEST["adt"];
                                                        $secid=$_REQUEST["secid"];
                                                        $classid=$_REQUEST["classid"];
                                                        $period=$_REQUEST["period"];
                                                        $attendance_date=strtotime($adt);
                                                        $aid=$_REQUEST["aid"];

                                                            //checking for any previous latest period attendance is present then will inherit the status of the previous period attendance to the attendance entry form.
                            
                                                        $query="select * from attendance_master_table where attendance_id=" . $aid;
                                                        //echo '<br><br> ' . $query;
                                                        $pretAttendance_result=$dbhandle->query($query);
                                                        
                                                        if($pretAttendance_result->num_rows>0)
                                                            {
                                                                $pretAttendance_row=$pretAttendance_result->fetch_assoc();					
                                                                
                                                                
                                                                //Printing Class Information.
                                                                $query1="select cm.class_no classno,cm.class_name,cs.section section from class_master_table cm,class_section_table cs where cm.class_id=cs.class_id and cs.class_sec_id=" . $secid . " and cs.enabled=1 and cs.school_id=" . $_SESSION["SCHOOLID"];
                                                                //echo $query;
                                                                $result1=$dbhandle->query($query1);
                                                                $row1=$result1->fetch_assoc();
                                                                $heading= '<h3 class="box">Attendance Entry For Class' . ' ' . $row1["class_name"];
                                                                //Generating attendance format based on latest previous period attendance made.
                                                                //$date = new DateTime($adt);
                                                                

                                                                $date =date_create_from_format($Date_format, $adt);
                                                                echo $heading . ' Dated ' .$date->format('d-m-Y') . '</H3>';
                                                                //End of Printing Class Information.
                                                                $present=0;
                                                                $attendanceStudentList_sql= "select adt.student_id,smt.first_name,smt.middle_name,smt.last_name,scd.roll_no,adt.attendance_status,adt.attendance_remarks,adt.prev_attendance_status as prev_attendance_status, adt.prev_attendance_remarks as prev_attendance_remarks from attendance_details_table adt,student_class_details scd, student_master_table smt where adt.attendance_id=" . $pretAttendance_row["Attendance_Id"] . " and scd.student_id=smt.student_id and smt.student_id=adt.student_id";

                                                                //echo $attendanceStudentList_sql;

                                                                    $attendanceStudentList_result=$dbhandle->query($attendanceStudentList_sql);

                                                                    $str='<table class="table table-bordered redio-btn-ch" style="text-align:center;">
                                                                            <thead><tr>
                                                                            <th>Roll No. </th>
                                                                            <th>Student Name </th>
                                                                            <th>Attendance Status</th>
                                                                            <th>Remarks</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>';

                                                                    $count=0;
                                                                    while($attendanceStudentList_row=$attendanceStudentList_result->fetch_assoc())
                                                                        {
                                                                            $count++;
                                                                            $studentname=$attendanceStudentList_row["first_name"] . ' ' . $attendanceStudentList_row["middle_name"] . ' ' .$attendanceStudentList_row["last_name"];
                                                                            $str= $str .  '<tr><td>' . $attendanceStudentList_row["roll_no"] . '<input type="hidden" name="rollno'.$count.'" value="'. $attendanceStudentList_row["roll_no"] .'" /></td><td>' . $studentname . '<input type="hidden" name="sname'.$count.'" value="'.  $studentname .'" /></td><td><div class="row radio">';
                                                                            
                                                                            $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                                                            <div class="form-group aj-form-group">
                                                                                                <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='PRESENT' ? 'checked="checked"' : null) . ' id="'. $count . 'present" value="PRESENT" onclick="calc_attendance();"/>&nbsp;Present</span>
                                                                                            </div>
                                                                                        </div> ';
                                                                            $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                                                            <div class="form-group aj-form-group">
                                                                                                <span><input  type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='LATE' ? 'checked="checked"' : null) . ' id="'. $count . 'late"  value="LATE" onclick="calc_attendance();"/>&nbsp;LATE</span>
                                                                                            </div>
                                                                                        </div> ';
                                                                            $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                                                            <div class="form-group aj-form-group">
                                                                                                <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='HALFDAY' ? 'checked="checked"' : null) . ' id="'. $count . 'halfday" value="HALFDAY"  onclick="calc_attendance();"/>&nbsp;HALFDAY</span>
                                                                                            </div>
                                                                                    </div> ';   
                                                                            $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                                                            <div class="form-group aj-form-group">
                                                                                                <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='ABSENT' ? 'checked="checked"' : null) . ' id="'. $count . 'absent"  value="ABSENT" onclick="calc_attendance();"/>&nbsp;ABSENT</span>
                                                                                            </div>
                                                                                        </div> ';                              
                                                                                        $str=$str . '</div></td><td><textarea class="form-control attendance-textarea" name="remarks' . $count . '" id="remarks' . $count . '" ' . '>' . $attendanceStudentList_row["attendance_remarks"] . '</textarea><input type="hidden" name="sid' . $count . '" value="' . $attendanceStudentList_row["student_id"] . '" /><input type="hidden" name="prev_attendance_status' . $count . '" value="' . $attendanceStudentList_row["attendance_status"] . '" /><input type="hidden" name="prev_attendance_remarks' . $count . '" value="' . $attendanceStudentList_row["attendance_remarks"] . '" /></td></tr>';

                                                                            $present=$present + 1;

                                                                        }
                                                                        
                                                                        $str=$str . '</tbody></table><div class="inpuy-chang-box atten-inpuy-chang-box">
                                                                        <div class="form-output">
                                                                            <div class="name-f">
                                                                                <h6>Present Number</h6>
                                                                            </div>
                                                                            <div class="input-box-in">
                                                                                <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["Total_Present"] . '" name="presentno" id="presentno">
                                                                            </div>
                                                                            <div class="name-f">
                                                                                <h6>Late Number</h6>
                                                                            </div>
                                                                            <div class="input-box-in">
                                                                                <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["Total_Late"] . '" name="lateno" id="lateno">
                                                                            </div>

                                                                            <div class="name-f">
                                                                                <h6>Half Day Number</h6>
                                                                            </div>
                                                                            <div class="input-box-in">
                                                                                <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["Total_Halfday"] . '" name="halfdayno" id="halfdayno">
                                                                            </div>
                                                                            <div class="name-f">
                                                                                <h6>Abscent Number</h6>
                                                                            </div>
                                                                            <div class="input-box-in">
                                                                                <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["Total_Absent"] . '" name="absentno" id="absentno">
                                                                            </div>
                                                                            <input type="hidden" name="total_count" id="total_count" value="' . $count . '" readonly />
                                                                            <input type="hidden" name="adt" id="adt" value="'. $adt . '" readonly />
                                                                            <input type="hidden" name="classid" value="' . $classid . '" readonly />
                                                                            <input type="hidden" name="secid"  value="' . $secid . '" readonly />	
                                                                            <input type="hidden" name="period"  value="' .  $period . '" readonly />
                                                                            <input type="hidden" name="aid"  value="' . $pretAttendance_row["Attendance_Id"] . '" readonly />
                                                                        </div>
                                                                        <div class="new-added-form aj-new-added-form">
                                                                            <div class="aaj-btn-chang-cbtn">
                                                                                    <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save Attendance </button>
                                                                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                                                            </div>
                                                                        </div> 
                                                                    ';
                                                                    echo $str; 
                                                            }
                                                                
                                                            /*End of previous attendance format data arrangement for previous period attendance if available.*/
                                                            
                                                        else
                                                            {	
                                                                
                                                                echo "The Attendance is not found.  Please check the option values.";
                                                                
                                                            }
                                                        }

                                                

                                                ?>

                                        <!--Student Attendance List Form Ends Here-->
                                    </div>
                                </form>                           
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Student Attendence Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">
                       <?php include 'footer.php';?>                         
                    </div>
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
    <!--Ajex Function Call-->
	<script src="js/ajax-function.js"></script>

<!--script type="text/javascript">
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
</script-->
<script type="text/javascript">
function calc_attendance()
	{
		var present_count=0;
		var late_count=0;
		var halfday_count=0;
		var abscent_count=0;
		total_count=document.getElementById("total_count").value;
		for(i=1;i<=total_count;i++)
			{
				if(document.getElementById(i+'present').checked)
					{
						present_count++;
					}
				else if(document.getElementById(i+'late').checked)
					{
						late_count++;
						present_count++;
					}
				else if(document.getElementById(i+'halfday').checked)
					{
						halfday_count++;
						present_count++;
					}
				else 
					{
						abscent_count++;
					}
			}
			document.getElementById("presentno").value=present_count;
			document.getElementById("lateno").value=late_count;
			document.getElementById("halfdayno").value=halfday_count;
			document.getElementById("abscentno").value=abscent_count;	
	}
</script>
<script>
function editAttendanceList()
{
var xmlhttp;
var classid=document.getElementById("classid").value;
var secid=document.getElementById("secid").value;
var adt=document.getElementById("adt").value;
var cperiod=document.getElementById("cperiod").value;

if (classid==0 || secid==0 || adt=='')
  {
    alert('Please select proper values for class, section, attendance date and class period.');
    return;
  }
  document.getElementById('attendance-list-div').empty;
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
    
    document.getElementById('attendance-list-div').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","GetStudentAttendanceEditList.php?classid="+classid+"&secid="+secid+"&adt="+adt+"&period="+cperiod,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
function calc_attendance()
	{
		var present_count=0;
		var late_count=0;
		var halfday_count=0;
		var abscent_count=0;
		total_count=document.getElementById("total_count").value;
		for(i=1;i<=total_count;i++)
			{
				if(document.getElementById(i+'present').checked)
					{
						present_count++;
					}
				else if(document.getElementById(i+'late').checked)
					{
						late_count++;
						present_count++;
					}
				else if(document.getElementById(i+'halfday').checked)
					{
						halfday_count++;
						present_count++;
					}
				else 
					{
						abscent_count++;
					}
			}
			document.getElementById("presentno").value=present_count;
			document.getElementById("lateno").value=late_count;
			document.getElementById("halfdayno").value=halfday_count;
			document.getElementById("absentno").value=abscent_count;	
	}
</script>
<script>
function showsection(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("section").innerHTML="";
  return;
  }
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
    document.getElementById("secid").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getSectionList.php?classid="+str,true);
xmlhttp.send();
}
</script>
</body>

</html>