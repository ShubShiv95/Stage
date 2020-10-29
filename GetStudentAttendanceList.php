<?php
session_start();
include 'dbobj.php';
	//Tables used in this page
	//class_master_table
	//class_section_table;
	//event_calender_master
	//Attendance_master_table;
	//Attendance_details_table;
	//student_master_table;
	//student_class_details; 

    $adt=$_REQUEST["adt"];
    //echo $adt;
	$secid=$_REQUEST["secid"];
    if(!isset($_REQUEST["classid"]))
        {
            echo "Class Id has not come.";
        }
	$period=$_REQUEST["period"];
    $attendance_date=strtotime($adt);
    $classid=$_REQUEST["classid"];
	//echo $cid;
	//echo $classid;
	
	//Checking and forcing to create addendance for perion 1 in case the attendance is not created for period 1.
    if($period!=1)
        {
            $query="select * from attendance_master_table where class_sec_id=" . $_REQUEST["secid"] . " and school_id=" . $_SESSION["SCHOOLID"] . " and doa=str_to_date('" .$adt . "','%d/%m/%Y') and period=1";
            //echo '<br><br> ' . $query;
            $result=$dbhandle->query($query);
            if($result->num_rows==0 and $period >1)
                {
                    echo "<h1>First period attendance is not found.  Attendance for other periods is not allowed before attendance of first period.  Please create the attendance for period 1 first.</h1>";
                    die;
                }
        }
	
	//Fetching information from the database if the attendance has not been created for the selected attendance date with the corresponding class period.  If exist then create new attendance will be discarded and will be adviced to edit the attendance.
	$query="select * from attendance_master_table where class_sec_id=" . $_REQUEST["secid"] . " and school_id=" . $_SESSION["SCHOOLID"] . " and doa=str_to_date('" .$adt . "','%d/%m/%Y') and period=$period";
	//echo '<br><br> ' . $query;
	$result=$dbhandle->query($query);

	if($result->num_rows>0)
		{
				echo "<h1><p><br>Attendance has been created for the day and period.</h1><br><h2><p>To edit please contact your reporting manager.</h2>";
				exit;
        }
        
	/*else if(date('d/m/Y',$attendance_date) > strtotime(date('d/m/Y')))
		{
					echo "<h2> Future date attendance is not allowed.</h2>".date('d/m/Y');
					exit;
        }
        /*  //need to rectify the code as it is taking previous day of sunday as sunday.
	else if (strtolower(date('D',strtotime($adt)))=='sun')
		{		
			//Extracting Day of the month if the day is sunday or not to restrict attendance on sunday.
			echo "<h1>Student Attendance is not allowed for Sunday.</h1>";
			exit;
		}
				//End of Holiday checking for the attendance date.			
    */
    else
		{
			
			//checking for any previous latest period attendance is present then will inherit the status of the previous period attendance to the attendance entry form.
			
			$query="select * from attendance_master_table where class_sec_id=" . $_REQUEST["secid"] . " and school_id=" . $_SESSION["SCHOOLID"] . " and doa=str_to_date('" .$adt . "','%d/%m/%Y') and period<$period order by period desc limit 1";
			//echo '<br><br> ' . $query;
			$pretAttendance_result=$dbhandle->query($query);
			
			if($pretAttendance_result->num_rows>0)
				{   //This section executes when the attendance for the class with corresponding period and date is present in the database then it fetches it with the existing values and creates the attendance form with the existing values.

					$pretAttendance_row=$pretAttendance_result->fetch_assoc();					
					
					
					//Printing Class Information.
					$query1="select cm.class_no classno,cm.class_name,cm.stream stream ,cs.section section from class_master_table cm,class_section_table cs where cm.class_id=cs.class_id and cs.class_sec_id=" . $secid . " and cs.enabled=1 and cs.school_id=" . $_SESSION["SCHOOLID"];
					//echo $query;
					$result1=$dbhandle->query($query1);
					$row1=$result1->fetch_assoc();
					$heading= '<h1 class="box">Attendance Entry For Class' . ' ' . $row1["class_name"];
					//Generating attendance format based on latest previous period attendance made.
                    $date1 = new DateTime($adt);
                    echo $heading . '<p>Dated ' .$date1->format('d-m-Y') . '</H1><p>';
					//End of Printing Class Information.
					$present=0;
					$attendanceStudentList_sql= "select adt.student_id,smt.first_name,smt.middle_name,smt.last_name,smt.roll_number,adt.attendance_status,adt.attendance_remarks,adt.prev_attendance_status as prev_attendance_status, adt.prev_attendance_remarks as prev_attendance_remarks from attendance_details_table adt,student_master_table smt where adt.attendance_id=" . $pretAttendance_row["Attendance_id"] . " and smt.student_id=adt.student_id";

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
                                $name=$attendanceStudentList_row["first_name"] . ' ' . $attendanceStudentList_row["middle_name"] . ' ' . $attendanceStudentList_row["last_name"];
                                $str= $str .  '<tr><td>' . $attendanceStudentList_row["roll_number"] . '<input type="hidden" name="rollno'.$count.'" value="'. $attendanceStudentList_row["roll_number"] .'" /></td><td>' . $name . '<input type="hidden" name="sname'.$count.'" value="'. $name .'" /></td><td><div class="row radio">';
                                
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='PRESENT' ? 'checked="checked"' : null) . ' id="'. $count . 'present" value="PRESENT" onclick="calc_attendance();"/>Present</span>
                                                </div>
                                            </div> ';
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input  type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='LATE' ? 'checked="checked"' : null) . ' id="'. $count . 'late"  value="Late" onclick="calc_attendance();"/>LATE</span>
                                                </div>
                                            </div>';
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='HALFDAY' ? 'checked="checked"' : null) . ' id="'. $count . 'halfday" value="HALFDAY"  onclick="calc_attendance();"/>Half Day</span>
                                                </div>
                                           </div> ';   
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='ABSENT' ? 'checked="checked"' : null) . ' id="'. $count . 'absent"  value="ABSENT" onclick="calc_attendance();"/>Absent</span>
                                                </div>
                                            </div> ';                              
                                $str=$str . '</div></td><td><textarea class="form-control attendance-textarea" name="remarks' . $count . '" id="reason' . $count . '" ' . '>' . $attendanceStudentList_row["attendance_remarks"] . '</textarea><input type="hidden" name="sid' . $count . '" value="' . $attendanceStudentList_row["student_id"] . '" /><input type="hidden" name="prev_attendance_status' . $count . '" value="' . $attendanceStudentList_row["attendance_status"] . '" /><input type="hidden" name="attendance_remarks' . $count . '" value="' . $attendanceStudentList_row["attendance_remarks"] . '" /></td></tr>';

								$present=$present + 1;

                            }
                            
                            $str=$str . '</tbody></table></div><div class="inpuy-chang-box atten-inpuy-chang-box"><div class="form-output">
                                <div class="name-f">
                                    <h6>Present Number</h6>
                                </div>
                                <div class="input-box-in">
                                    <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["total_present"] . '" name="presentno" id="presentno">
                                </div>
                                <div class="name-f">
                                    <h6>Late Number</h6>
                                </div>
                                <div class="input-box-in">
                                    <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["total_late"] . '" name="lateno" id="lateno">
                                </div>

                                <div class="name-f">
                                    <h6>Half Day Number</h6>
                                </div>
                                <div class="input-box-in">
                                    <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["total_halfday"] . '" name="halfdayno" id="halfdayno">
                                </div>
                                <div class="name-f">
                                    <h6>Abscent Number</h6>
                                </div>
                                <div class="input-box-in">
                                    <input type="text" readonly="" class="redonly-form-control" value="'. $pretAttendance_row["total_absent"] . '" name="absentno" id="absentno">
                                </div>
                                <input type="hidden" name="total_count" id="total_count" value="' . $count . '" readonly />
							    <input type="hidden" name="adt" id="adt" value="'. $adt . '" readonly />
							    <input type="hidden" name="classid" value="' . $classid . '" readonly />
	    						<input type="hidden" name="secid"  value="' . $secid . '" readonly />	
		    					<input type="hidden" name="period"  value="' .  $period . '" readonly />
			    				<input type="hidden" name="aid"  value="' . $pretAttendance_row["Attendance_id"] . '" readonly />
                            </div>
                            <div class="new-added-form aj-new-added-form">
                             <div class="aaj-btn-chang-cbtn">
                                     <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save Attendance </button>
                                     <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                              </div>
                            </div> 
                        </div>';
                        echo $str; 
				}
					
				/*End of previous attendance format data arrangement for previous period attendance if available.*/
				
			else
				{	
                    //This section executes only when the attendance for the class with the period number and for the day does not exist and reqires to generate a fresh attendance marking form for the class students.
                    
					//Fetching the Class Details to Print.	
					$query1="select cm.class_no classno,cm.class_name,cm.stream stream ,cs.section section from class_master_table cm,class_section_table cs where cm.class_id=cs.class_id and cs.class_sec_id=" . $secid . " and cs.enabled=1 and cs.school_id=" . $_SESSION["SCHOOLID"];
					//echo $query1;
					$result1=$dbhandle->query($query1);
					$row1=$result1->fetch_assoc();
					$heading= '<H2>Attendance Entry For Class' . ' ' . $row1["class_name"]. ' ' . $row1["section"] . "</H2>";
					//converting attendance date variable value into php date formated value. 
						
                    //echo $adt;
                    //$date = date_create($adt);
                    //$date = date_format("d/m/Y", strtotime($adt));
                    //$date = date_create_from_format('d/m/Y', $adt);

					echo $heading . '<p><h3>Dated ' . $adt . '</h3><p>';
					//echo $heading . '<p><h1>Dated ' .$adt . '</H1><p>';
					//echo $heading;
					/*	
					//Checking if the selected attendance date does not fall in any defined holiday by the school.
					$getEventCalender_sql="select * from event_calender_master where str_to_date('" . $adt . "','%d-%m-%Y') between start_date and end_date	and student_off=1 and ((" . $row1["classno"] . " between from_class_no and to_class_no) or (from_class_no=0 and to_class_no=0)) and school_id=" . $_SESSION["SCHOOLID"];
				
					echo $getEventCalender_sql;
				
					//sql meaning select record from event_calender_table where selected date falls between event's start_date and end_date and student_off is declared as full day off and selected class also comes in range of from_class_no and to_class_no or the selected record contains for all students as from_class_no and to_class_no for the selected school id as per session variable.
					//here student_off=0 means full day off.
				
					//echo $getEventCalender_sql;
				
					$getEventCalender_result=$dbhandle->query($getEventCalender_sql);
					if($getEventCalender_result->num_rows >0)
						{
							echo "<br><br><h2>The selected Day for the class is found to be closed as per school event calender. Please check with school management.</h2>";
							exit;
						}
				    */			
			
					$present=0;
					$query2= "select smt.student_id,smt.first_name,smt.middle_name,smt.last_name,scd.rollno from student_master_table smt, student_class_details scd where scd.class_sec_id=" . $secid . " and scd.enabled=1 and smt.student_id=scd.student_id and scd.session='" . $_SESSION["SESSION"] . "' and scd.school_id=". $_SESSION["SCHOOLID"];
					//$attendanceStudentList_row["first_name"]echo 'Second Section: ' . $query2;
                    $attendanceStudentList_result=$dbhandle->query($query2);
                  
                    
                    /*Creating New Attendance form.*/
                        $str='<table class="table table-bordered redio-btn-ch" style="text-align:center;">
                                <thead><tr>
                                <th>Roll No. </th>
                                <th>Student Name </th>
                                <th>Attendance Status</th>
                                <th>Remarks</th>
                                </tr></thead><tbody>';
                        $count=0;
                        while($attendanceStudentList_row=$attendanceStudentList_result->fetch_assoc())
                            {
                                $count++;
                                $name=$attendanceStudentList_row["first_name"] . ' '. $attendanceStudentList_row["middle_name"] . ' ' . $attendanceStudentList_row["last_name"];
                                $str= $str .  '<tr><td>' . $attendanceStudentList_row["rollno"] . '<input type="hidden" name="rollno'.$count.'" value="'. $attendanceStudentList_row["rollno"] .'" /></td><td>' . $name .'<input type="hidden" name="sname'.$count.'" value="'. $name .'" /></td><td><div class="row radio">';
                                /*
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input checked type="radio" class="gaurdian-bs" name="' . $count . '" id="'. $count . 'present" value="PRESENT"  onclick="calc_attendance();"/>&nbsp;Present</span>
                                                </div>
                                            </div>';
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input  type="radio" class="gaurdian-bs" name="' . $count . '" id="'. $count . 'late"   value="LATE" onclick="calc_attendance();"/>&nbsp;Late</span>
                                                </div>
                                            </div>';
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input  type="radio" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'halfday"  value= "HALFDAY" onclick="calc_attendance();"/>&nbsp;Half Day</span>
                                                </div>
                                        </div>';   
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">
                                                    <span><input type="radio" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'absent"  value="ABSENT" onclick="calc_attendance();"/>&nbsp;Absent</span>
                                                </div>
                                            </div> ';  */                            
                                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                                <div class="form-group aj-form-group">';
                                                    
                                $str=$str . '<table><tr><td><span><input checked type="radio" class="gaurdian-bs" name="' . $count . '" id="'. $count . 'present" value="PRESENT"  onclick="calc_attendance();"/>&nbsp;Present</span>
                                <span><input  type="radio" class="gaurdian-bs" name="' . $count . '" id="'. $count . 'late"   value="LATE" onclick="calc_attendance();"/>&nbsp;Late</span><span><input  type="radio" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'halfday"  value= "HALFDAY" onclick="calc_attendance();"/>&nbsp;Half Day</span>
                                <span><input type="radio" class="gaurdian-bs" name="' . $count . '"  id="'. $count . 'absent"  value="ABSENT" onclick="calc_attendance();"/>&nbsp;Absent</span></td></tr></table>
                                
                                       </div> ';                              
                                $str=$str . '</div></td><td><textarea class="form-control attendance-textarea" name="remarks' . $count . '" id="reason' . $count . '" ' . '></textarea><input type="hidden" name="sid' . $count . '" value="' . $attendanceStudentList_row["student_id"] . '" /><!--input type="hidden" name="prev_attendance_status' . $count . '" /--></td></tr>';

                                $present=$present + 1;

                            }
                
                        $str=$str . '</tbody></table></div><div class="inpuy-chang-box atten-inpuy-chang-box"><div class="form-output">
                            <div class="name-f">
                                <h6>Present Number</h6>
                            </div>
                            <div class="input-box-in">
                                <input type="text" readonly="" class="redonly-form-control" value="'. $count . '" name="presentno" id="presentno">
                            </div>
                            <div class="name-f">
                                <h6>Late Number</h6>
                            </div>
                            <div class="input-box-in">
                                <input type="text" readonly="" class="redonly-form-control" value="0" name="lateno" id="lateno">
                            </div>

                            <div class="name-f">
                                <h6>Half Day Number</h6>
                            </div>
                            <div class="input-box-in">
                                <input type="text" readonly="" class="redonly-form-control" value="0" name="halfdayno" id="halfdayno">
                            </div>
                            <div class="name-f">
                                <h6>Abscent Number</h6>
                            </div>
                            <div class="input-box-in">
                                <input type="text" readonly="" class="redonly-form-control" value="0" name="absentno" id="absentno">
                            </div>
                                <input type="hidden" name="total_count" id="total_count" value="' . $count . '" readonly />
                                <input type="hidden" name="adt" id="adt" value="'. $adt . '" readonly />
                                <input type="hidden" name="classid" value="' . $classid . '" readonly />
                                <input type="hidden" name="secid"  value="' . $secid . '" readonly />	
                                <input type="hidden" name="period"  value="' .  $period . '" readonly />
                            </div>
                            <div class="new-added-form aj-new-added-form">
                                <div class="aaj-btn-chang-cbtn">
                                        <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Save Attendance </button>
                                        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div> 
                        </div>';  
                        echo $classid;
                        echo $str;  
                     /* End of Creating New Attendance Form*/

					
							

		        }

		}
	
	?>