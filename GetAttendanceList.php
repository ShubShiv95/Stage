<?php
    session_start();
    include 'dbhandle.php';
    $classid=$_REQUEST["classid"];
	$secid=$_REQUEST["secid"];
	$adt=$_REQUEST["adt"];

	//Check if the attendance date selected is of future date then restrict attendance date.
	$attendance_date=strtotime($adt);
	if(strtotime(date('d-m-Y',$attendance_date)) > strtotime(date('d-m-Y')))
		{
			echo "<h2> Future date attendance is not allowed.</h2>";
			exit;
		}
		
	//Fetching the Class Details to Print.	
	$query1="select cm.class_no classno,cm.class_name,cm.stream stream ,cs.section section from class_master_table cm,class_section_table cs where cm.class_id=cs.class_id and cs.class_sec_id=" . $secid . " and cs.enabled=1 and cs.school_id=" . $_SESSION["SCHOOLID"];
	//echo $query1;
	$result1=mysqli_query($dbhandle,$query1);
	$row1=mysqli_fetch_assoc($result1);
	$heading= 'Attendance Entry For Class' . ' ' . $row1["class_name"]. ' ' . $row1["section"];
	//converting attendance date variable value into php date formated value. 
	$timestamp=strtotime($adt);
	//Extracting Day of the month if the day is sunday or not to restrict attendance on sunday.
	$day=strtolower(date('D',$timestamp));
	if($day == 'sun')
		{
			echo "<h1>Student Attendance is not allowed for Sunday.</h1>";
			exit;
		}
	
	
	//$getEventCalender_sql="select * from event_calender_table where date_format('" . $adt . "','%Y-%m-%d')=off_day	and student_off=1 and ((" . $row1["classno"] . " between from_class_no and to_class_no) or (from_class_no=0 and to_class_no=0)) and school_id=" . $_SESSION["SCHOOLID"];
	
	//Checking if the selected attendance date does not fall in any defined holiday by the school.
		$getEventCalender_sql="select * from event_calender_master where str_to_date('" . $adt . "','%d-%m-%Y') between start_date and end_date	and student_off=1 and ((" . $row1["classno"] . " between from_class_no and to_class_no) or (from_class_no=0 and to_class_no=0)) and school_id=" . $_SESSION["SCHOOLID"];
		
		//echo $getEventCalender_sql;
		
		//sql meaning select record from event_calender_table where selected date falls between event's start_date and end_date and student_off is declared as full day off and selected class also comes in range of from_class_no and to_class_no or the selected record contains for all students as from_class_no and to_class_no for the selected school id as per session variable.
		//here student_off=0 means full day off.
		
		//echo $getEventCalender_sql;
		
		$getEventCalender_result=$dbhandle->query($getEventCalender_sql);
		if($getEventCalender_result->num_rows >0)
			{
				echo "<br><br><h2>The selected Day for the class is found to be closed as per school event calender. Please check with school management.</h2>";
				exit;
			}
	//End of Holiday checking for the attendance date.		

	//Fetching information from the database if the attendance has not been created for the selected attendance date with the corresponding class period.  If exist then create new attendance will be discarded and will be adviced to edit the attendance.
		$query="select * from attendance_master_table amt, attendance_details_table adt where adt.attendance_id=amt.attendance_id and  amt.class_id=" . $_REQUEST["classid"] . " and amt.class_sec_id=" . $_REQUEST["secid"] . " and amt.school_id=" . $_SESSION["SCHOOLID"] . " and doa=str_to_date('" .$adt . "','%Y-%m-%d') and period1 is not null";
		//echo '<br><br> ' . $query;
		$result=mysqli_query($dbhandle,$query);
         //$str='<form class="new-added-form aj-new-added-form" method="post" action="AbsentStudentList.php">';  
         $str = ''; 
		if(mysqli_num_rows($result)==0)
		{
			$date = new DateTime($adt);
			echo $heading . '<p>Dated ' .$date->format('d-m-Y') . '</H1;><p>';
			//echo $heading;    
            //$str = $str . '';
            $str = $str . '<div class="table-responsive mt-5" >';
            $str='<table class="table table-bordered redio-btn-ch" style="text-align:center;">';
            $str = $str . '<thead>';
            $str = $str . '<tr>';
            $str = $str . '<th>Roll No. </th>';
            $str = $str . '<th>Student Name </th>';
            $str = $str . '<th>Attendance Status</th>';
            $str = $str . '<th>Remarks</th>';
            $str = $str . '</tr>';
            $str = $str . '</thead>';
            $str = $str . '<tbody>';
            $present=0;
            $query2= "select smt.student_id,smt.student_name,scd.rollno from student_master_table smt, student_class_details scd where scd.class_sec_id=" . $secid . " and scd.enabled=1 and smt.student_id=scd.student_id and scd.session='" .$_SESSION["SESSION"] ."' and scd.school_id=". $_SESSION["SCHOOLID"];
            //echo $query2;
            $result2=mysqli_query($dbhandle,$query2);
            
            $count=0;
            while($row2=mysqli_fetch_assoc($result2))
            {
                $count++;
                $str = $str . '<tr><td>' . $row2["rollno"] . '</td>';
                $str = $str . '<td>' . $row2["student_name"] . '<input type="hidden" value="' . $row2["student_name"] . '" name="sname' . $count . '" /> 
                        </td>';
                $str = $str . '<td><div class="row radio">';
                $str = $str .  '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">';
                $str = $str .  '<div class="form-group aj-form-group">';
                $str = $str . '<span><input type="radio" value="PRESENT" class="gaurdian-bs" name="' . $count . '" checked="checked"  id="'. $count . 'present" onclick="calc_attendance();" > Present</span></div></div>';
                $str = $str .  '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">';
                $str = $str .  '<div class="form-group aj-form-group">';
                $str = $str . '<span><input type="radio" value="LATE" class="gaurdian-bs" name="' . $count . '"   id="'. $count . 'late" onclick="calc_attendance();" >Late</span></div></div>';
                $str = $str .  '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">';
                $str = $str .  '<div class="form-group aj-form-group">';
                $str = $str . '<span><input type="radio" value="Half Day" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'halfday" onclick="calc_attendance();" >Half Day</span></div></div>';
                $str = $str .  '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">';
                $str = $str .  '<div class="form-group aj-form-group">';
                $str = $str . '<span><input type="radio" value="ABSENT" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'absent" onclick="calc_attendance();" >Absent</span></div></div>';

                $str = $str . '</div></td><td><textarea class="form-control" name="reason' . $count . '" id="remarks' . $count . '"></textarea>';
                $str = $str . '<input type="hidden" name="sid' . $count . '" value="' . $row2["student_id"] . '" /></td></tr>';
                $present=$present + 1;

            }
            $str = $str . '</tbody></table></div>';

            $str = $str . '<div class="inpuy-chang-box atten-inpuy-chang-box">';
                $str = $str . '<div class="form-output">';
                    $str = $str . '<div class="name-f"><h6>Present Number</h6></div><div class="input-box-in"><input type="text"  class="redonly-form-control" name="presentno" id="presentno" value="'.$count. '" readonly /></div>';
                    $str = $str . '<div class="name-f"><h6>Late Number</h6></div><div class="input-box-in"><input type="text" class="redonly-form-control" name="lateno" id="lateno" value="0" readonly /></div>';
                    $str = $str . '<div class="name-f"><h6>Half Day Number</h6></div><div class="input-box-in"><input type="text"  class="redonly-form-control" name="halfdayno" id="halfdayno" value="0" readonly /></div>';
                    $str = $str . '<div class="name-f"><h6>Abscent Number</h6></div><div class="input-box-in n-br"><input type="text"  class="redonly-form-control" name="abscentno" id="abscentno" value="0" readonly />';
                    $str = $str . '<input type="hidden" name="total_count" id="total_count" value=" ' . $count . '" readonly />
                    <input type="hidden" name="adt" id="adt" value="' . $adt . '" readonly />
                    <input type="hidden" name="classid" value=" ' . $classid . '" readonly />
                    <input type="hidden" name="secid"  value="' . $secid . '" readonly /></div>';
                $str = $str . '</div>';
                $str = $str . '<div class="new-added-form aj-new-added-form">';
                    $str = $str . '<div class="aaj-btn-chang-cbtn">';
                    $str = $str . '<button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save Attendance </button>';
                    $str = $str . '<button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>';
                $str = $str . '</div>';
            $str = $str . '</div>'; 
            $str = $str . '</div>';
            echo $str;
        }
        else
        {
            echo "<h1><p><br>Attendance has been created for the day and period.</h1><br><h2><p>To edit please contact your reporting manager.</h2>";
        }
?>