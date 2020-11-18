<?php	
	session_start();
    include 'dbobj.php';
    /*
	$result=mysqli_query($dbhandle,'select start_month,end_month,start_year,end_year from school_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"]);
	$row=mysqli_fetch_assoc($result);
    */
    $HTMLString='<div class="heading-layout1">
    <div class="item-title">
        <h3>Attendence Sheet Of Class One: Section A, April 2019</h3>
    </div>
</div>
<div class="table-responsive sticky-div">
    <table class="table bs-table table-striped table-bordered text-nowrap tebal-form-in sticky-table">
        <thead>';    
	$secid=$_GET["secid"];
	$atnmonth=$_GET["month"];
	$first_day='1';
	$last_day=0;
	$year=0;
	$month=0;
	//Formating Year value.
	if($atnmonth >=4 and $atnmonth<=12)
		{
			$year=$_SESSION["STARTYEAR"];
		}
	else
		{
			$year=$_SESSION["ENDYEAR"];
		}
	//End of year formatting.
	
	//Formating first_day and last_day for the month.
	if($atnmonth==1 or $atnmonth==3 or $atnmonth==5 or $atnmonth==7 or $atnmonth==8 or $atnmonth==10 or $atnmonth==12)
		{
			$last_day=31;
		}
	else if($atnmonth==4 or $atnmonth==6 or $atnmonth==9 or $atnmonth==11)
		{
			$last_day=30;
		}		
	else if($atnmonth==2)	//calculating leaf year or not and specify the last day of february.
		{
			if($_SESSION["ENDYEAR"]%4==0)
				{
					if($_SESSION["ENDYEAR"]%100==0)
						{
							if($_SESSION["ENDYEAR"]%400==0)
								{
									$last_day=29;
								}
							else
								{	
									$last_day=28;
								}		
						}
					else
						{
							$last_day=29;
						}
						
				}
			else
				{
					$last_day=28;
				}
			
			
			
		}
	// END OF STEP1: first day and last day formatting.
	
		
	//STEP2: Formating month value.
		$month='';
		if($atnmonth<10)
			{
				$month= '0' . $atnmonth;
			}
		else
			{
				$month=$atnmonth;
			}	
	//END OF STEP2: Formating month value.
	
	//STEP 3: Generating list of Students for the selected class section.	
		$getStudentList_sql="select scd.student_id,smt.first_name as student_name,scd.rollno from student_class_details scd,student_master_table smt where scd.class_sec_id=" .  $secid . " and scd.enabled=1 and scd.school_id=" .  $_SESSION["SCHOOLID"] . " and scd.session='" . $_SESSION["SESSION"] . "' and smt.student_id=scd.student_id order by scd.rollno";
		//echo $getStudentList_sql;
		$getStudentList_result=$dbhandle->query($getStudentList_sql);
	//END OF STEP 3: 	Generating list of Students for the selected class section.
	
	
	$start_date= $first_day . '-' . $month . '-' . $year;
	$end_date= $last_day . '-' . $month . '-' . $year;
	
	
	
	
	//Get the class number for finding holidays for the class 
	$getClassNo_sql="select class_no from class_master_table cmt,class_section_table cst where cst.class_sec_id=" . $secid . " and cmt.class_id=cst.class_id and cst.school_id=" . $_SESSION["SCHOOLID"];
	//echo $getClassNo_sql;
	$getClassNo_result=$dbhandle->query($getClassNo_sql);
	$getClassNo_row=$getClassNo_result->fetch_assoc();
	
	//Get list of holidays for the selected month.

	$getEventCalender_sql="select date_format(start_date,'%d-%m-%Y') as start_date,date_format(end_date,'%d-%m-%Y') as  end_date from event_calender_master where start_date between str_to_date('" . $start_date . "','%d-%m-%Y') and str_to_date('" . $end_date . "','%d-%m-%Y') and end_date between str_to_date('" . $start_date . "','%d-%m-%Y') and str_to_date('" . $end_date . "','%d-%m-%Y') and student_off=1 and ((" . $getClassNo_row["class_no"] . " between from_class_no and to_class_no) or (from_class_no=0 and to_class_no=0)) and school_id=" . $_SESSION["SCHOOLID"];

	
	
	
	//Creating table structure for printing days for attendance details for the class.
	$HTMLString=$HTMLString. '<tr><th class="sticky-col first-col">Student_Name</th>';
		for($i=date('j',strtotime($start_date));$i<=date('d',strtotime($end_date));$i++)
			{
				$dt= ($i<10 ? '0' .$i : $i) . '-' . $month  .  '-' . $year;
				//$HTMLString=$HTMLString. '<th>' . date('M',strtotime($dt)) . ' ' . $i . ' ' . date('D',strtotime($dt)) . '</th>';
				$HTMLString=$HTMLString. '<th>' .  $i .  '</th>';
			}
            $HTMLString=$HTMLString.'<th>Pre. Nos.</th><th>Abs. Nos.</th><th>Percent</th></tr></thead><tbody class="tebal-form-ina">';
	//var_dump($getStudentList_result);
	//Navigating each student and printing their attendance.
	while($getStudentList_row=$getStudentList_result->fetch_assoc())
		{
		
			//Fetching attendance for the selected student.
			$getAttendance_sql="select student_id,date_format(doa,'%d') as sdoa,date_format(doa,'%d-%m-%Y') as ldoa,adt.attendance_status from attendance_master_table amt,attendance_details_table adt where amt.doa between str_to_date('" . $start_date . "','%d-%m-%Y') and str_to_date('"  . $end_date . "','%d-%m-%Y') and adt.student_id='" . $getStudentList_row["student_id"] . "' and adt.attendance_id=amt.attendance_id and amt.period=1 and amt.school_id=" . $_SESSION["SCHOOLID"] . '  order by ldoa';
			//$HTMLString=$HTMLString. '<tr><td>' . $getAttendance_sql . '</td></tr>';
			echo $getAttendance_sql;
			$getAttendance_result=$dbhandle->query($getAttendance_sql);
			
		//	echo date('l',strtotime($start_date));
		//	echo date('d',strtotime($end_date));
			
			
        $HTMLString=$HTMLString. '<tr  class=""><td class="sticky-col first-col" style="text-align:left;">' . $getStudentList_row["student_name"] . '</td>';
			//Variable to host the attendance date to compare for checking presence of the student.
			$attendance_date=strtotime($start_date);

			//First attendance date is fatched outside of the attendance fetching loop to initiate attendance date compare inside the attendance compare for loop.
			$getAttendance_row=$getAttendance_result->fetch_assoc();

			//Attendance checking for loop.//initiate value with the first day number of attendance start day, compare with the last day number of the end date.
			$loop_start_day=strtotime($start_date);
			$loop_end_day=strtotime($end_date);
			$count_present=0;	//present days counter.
			$count_abscent=0;	//
			$count_informed=0;
			$count_total=0;
			$attendance_percent=0;
			
			for($i=$first_day;$i<=$last_day;$i++)
				{ 
				
					$dt= ($i<10 ? '0' .$i : $i) . '-' . $month  .  '-' . $year;
						
		    
															
						//Checks if the fetched attendance date matches with the comparing attendance date then it means the attendance exist for the student with either value present or abscent (1,0).
						var_dump($dt);
						var_dump($getAttendance_row["ldoa"]);
						echo isset($getAttendance_row["ldoa"]);

						if(strtotime($dt)==strtotime($getAttendance_row["ldoa"]))
							{	
								if($getAttendance_row["attendance_status"]=='PRESENT')
									{
										$HTMLString=$HTMLString. '<td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P" readonly></td>';
                                        $count_present++;
                                        $count_total++;	
										
									}
							
								else if($getAttendance_row["attendance_status"]=='ABSENT')
									{
										$HTMLString=$HTMLString. '<td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A" readonly></td>';
                                        $count_abscent++;
                                        $count_total++;	
										/*if($getAttendance_row["abscent_informed"]==1)
											{
												$count_informed++;
											}
										*/	
									}else if($getAttendance_row["attendance_status"]=='LATE')
									{
                                        $HTMLString=$HTMLString. '<td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L" readonly></td>';
                                        $count_present++;
                                        $count_total++;	
										//$count_abscent++;
										/*if($getAttendance_row["abscent_informed"]==1)
											{
												$count_informed++;
											}
										*/	
									}elseif($getAttendance_row["attendance_status"]=='HALFDAY')
									{
                                        $HTMLString=$HTMLString. '<td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD" readonly></td>';
                                        $count_present++;
                                        $count_total++;	
										//$count_abscent++;
										/*if($getAttendance_row["abscent_informed"]==1)
											{
												$count_informed++;
											}
										*/	
									}else
									{
										$HTMLString=$HTMLString. '<td align="center" style="color:#000000;style:bold;" align="center">NA</td>';
										//$count_abscent++;
										/*if($getAttendance_row["abscent_informed"]==1)
											{
												$count_informed++;
											}
										*/	
									}
								
								
								
								$getAttendance_row=$getAttendance_result->fetch_assoc();	
								
								
							}
						
						else if(date('D',strtotime($dt))=='Sun')
							{
								//$HTMLString=$HTMLString. '<td bgcolor="yellow" align="center">'.date('D',strtotime($dt)).'</td>';
								$HTMLString=$HTMLString. '<td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S" readonly></td>';
							}	
						else
							{
									$found=0;
									$date=date('d-m-Y',strtotime($dt));
									$getEventCalender_result=$dbhandle->query($getEventCalender_sql);
									while($getEventCalender_row=$getEventCalender_result->fetch_assoc())
										{
											$startdate=date('d-m-Y',strtotime($getEventCalender_row["start_date"]));
											$enddate=date('d-m-Y',strtotime($getEventCalender_row["end_date"]));
											if($date >= $startdate and $date <= $enddate)
												{
													$found=1;
													break;
												}	
										}
								
									/*foreach($holidays as $dates)
										{
											if(strtotime($dt)==strtotime($dates))
												{
													$HTMLString=$HTMLString. '<td bgcolor="pink" align="center">' . 'HOL' .'</td>';
													$found=1;
													break;
												}
											
												
										}*/
									if($found==1)
										{
											$HTMLString=$HTMLString. '<td> <input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H" readonly></td>';
										}
									else if($found==0)
										{
											$HTMLString=$HTMLString. '<td align="center" style="color:#000000;style:bold;" align="center">NA</td>';
										}										
								
							}
						//$attendance_date=date('d-m-Y', strtotime($attendance_date . '+ 1 day'));
						//$loop_start_day=strtotime($loop_start_day . '+ 1 day');
			    }
				if($count_total==0)
				$present_percent=0;
				else
				$present_percent=round(($count_present * 100) / $count_total);
				
				$HTMLString=$HTMLString. '<td bgcolor="blue" style="color:#FFFFFF;" align="center">' . $count_present . '</td><td bgcolor="blue" style="color:#FFFFFF;" align="center">'.$count_abscent.'</td><td  style="color:#FFFFFF;" align="center" ' .($present_percent < 75 ?  'bgcolor="red">' . $present_percent :  'bgcolor="blue">' . $present_percent) .'</td>' ;
                $HTMLString=$HTMLString. '</tr>';
		}	
        $HTMLString=$HTMLString. '<tfoot>
		<tr>
			<th colspan="35">
				<h6 class="mar-bott"><B>Attendance Legends</B></h6>
			</th>
		</tr>
		<tr>
			<td colspan="35">
				<ul class="color-chang">
					<li class="atent-as"><span class="atent-s">S</span><b>Sunday</b></li>
					<li class="atent-ap"><span class="atent-p">P</span><b>Present</b></li>
					<li class="atent-aa"><span class="atent-a">A</span><b>Absent</b></li>
					<li class="atent-ah"><span class="atent-h">H</span><b>Holiday</b></li>
					<li class="atent-al"><span class="atent-l">L</span><b>Late</b></li>
					<li class="atent-ahd"><span class="atent-hd">HD</span><b>Half Day</b></li>
				</ul>
			</td>
		</tr>
	</tfoot>';	
        $HTMLString=$HTMLString. '</table>';	
	/*
	if($_GET["navigate"]=='summary_report')
		{
			$HTMLString=$HTMLString. '<a href="section_summary_report.php?classid='. $_GET["classid"] . '"><span class="field_label">Back to Section Summary 
Report</span></a>';

		}
	else if($_GET["navigate"]=='view_attendance')
		{
			$HTMLString=$HTMLString. '<a href="view_attendance_entry.php">View Another Attendance Sheel</a>';
        }*/
        
        echo $HTMLString;
?>