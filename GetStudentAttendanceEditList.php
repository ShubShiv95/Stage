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

	$classid=$_REQUEST["classid"];
	$secid=$_REQUEST["secid"];
	$adt=$_REQUEST["adt"];
	$period=$_REQUEST["period"];
	
	$query1="select cm.class_no classno,cm.class_name,cm.stream stream ,cs.section section from class_master_table cm,class_section_table cs where cm.class_id=cs.class_id and cs.class_sec_id=" . $secid . " and cs.enabled=1 and cs.school_id=" . $_SESSION["SCHOOLID"];
	//echo $query;
	$result1=mysqli_query($dbhandle,$query1);
	$row1=mysqli_fetch_assoc($result1);
	$heading= '<h1 class="box">Attendance Entry For Class' . ' ' . $row1["class_name"] . '-' . $row1["section"] .' </h1>';;    

	$date = new DateTime($adt);
	echo  $heading . '<p><h2>Dated '  . $date->format('d-m-Y') . '</h2><p>';

	$query="select * from attendance_master_table where class_sec_id=" . $secid . " and school_id=" . $_SESSION["SCHOOLID"] . " and doa=str_to_date('" . $adt . "','%d/%m/%Y') and period=$period";
	//echo $query;
	$result=$dbhandle->query($query);

	if($result->num_rows==0)
		{
			echo "The attendance for the day is not found. Please contact System Administrator.";
			exit;
		}

	if($result->num_rows==1)
	{
		//echo $heading;
		$row1=mysqli_fetch_assoc($result);        

                    $str='<table class="table table-bordered redio-btn-ch" style="text-align:center;">
                            <thead><tr>
                                <th>Roll No. </th>
                                <th>Student Name </th>
                                <th>Attendance Status</th>
                                <th>Remarks</th>
                                </tr>
                            </thead>
                        <tbody>';

        $present=0;
        $attendanceStudentList_query= "select adt.student_id,smt.student_name,smt.roll_number,adt.attendance_status,adt.attendance_remarks,adt.prev_attendance_status as prev_attendance_status, adt.prev_attendance_remarks as prev_attendance_remarks from attendance_details_table adt,student_master_table smt where adt.attendance_id=" . $row1["Attendance_id"] . " and smt.student_id=adt.student_id";
        $attendanceStudentList_result=$dbhandle->query($attendanceStudentList_query);
		$count=0;
		while($attendanceStudentList_row=$attendanceStudentList_result->fetch_assoc())
			{
				$count++;
                $str= $str .  '<tr><td>' . $attendanceStudentList_row["roll_number"] . '<input type="hidden" name="rollno'.$count.'" value="'. $attendanceStudentList_row["roll_number"] .'" /></td><td>' . $attendanceStudentList_row["student_name"] . '<input type="hidden" name="sname'.$count.'" value="'. $attendanceStudentList_row["student_name"] .'" /></td>';
                               
                $str=$str . '<td><div class="row radio">
                                    <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='PRESENT' ? 'checked="checked"' : null) . ' id="'. $count . 'present" value="PRESENT" onclick="calc_attendance();"/> &nbsp;Present</span>
                                        </div>
                                    </div>';
                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <span><input  type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='LATE' ? 'checked="checked"' : null) . ' id="'. $count . 'late"  value="LATE" onclick="calc_attendance();"/>&nbsp;LATE</span>
                                </div>
                            </div>';
                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                        <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='HALFDAY' ? 'checked="checked"' : null) . ' id="'. $count . 'halfday" value="HALFDAY"  onclick="calc_attendance();"/>&nbsp;HALFDAY</span>
                                </div>
                            </div>';   
                $str=$str . '<div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <span><input type="radio" class="gaurdian-bs" name="' . $count . '" ' . ($attendanceStudentList_row["attendance_status"]=='ABSENT' ? 'checked="checked"' : null) . ' id="'. $count . 'absent"  value="ABSENT" onclick="calc_attendance();"/>&nbsp;ABSENT</span>
                                </div>
                            </div></div></td>';                              
                $str=$str . '<td><textarea class="form-control attendance-textarea" name="remarks' . $count . '" id="remarks' . $count . '" ' . '>' . $attendanceStudentList_row["attendance_remarks"] . '</textarea><input type="hidden" name="sid' . $count . '" value="' . $attendanceStudentList_row["student_id"] . '" /><input type="hidden" name="prev_attendance_status' . $count . '" value="' . $attendanceStudentList_row["attendance_status"] . '" /><input type="hidden" name="prev_attendance_remarks' . $count . '" value="' . $attendanceStudentList_row["attendance_remarks"] . '" /></td></tr>';

                $present=$present + 1;
            }
                                
            $str=$str . '</tbody></table>
                            <div class="inpuy-chang-box atten-inpuy-chang-box">
                                <div class="form-output">
                                    <div class="name-f">
                                        <h6>Present Number</h6>
                                    </div>
                                    <div class="input-box-in">
                                        <input type="text" readonly="" class="redonly-form-control" value="'. $row1["total_present"] . '" name="presentno" id="presentno">
                                    </div>
                                    <div class="name-f">
                                        <h6>Late Number</h6>
                                    </div>
                                    <div class="input-box-in">
                                        <input type="text" readonly="" class="redonly-form-control" value="'. $row1["total_late"] . '" name="lateno" id="lateno">
                                    </div>
                                    <div class="name-f">
                                        <h6>Half Day Number</h6>
                                    </div>
                                    <div class="input-box-in">
                                        <input type="text" readonly="" class="redonly-form-control" value="'. $row1["total_halfday"] . '" name="halfdayno" id="halfdayno">
                                    </div>
                                    <div class="name-f">
                                        <h6>Abscent Number</h6>
                                    </div>
                                    <div class="input-box-in">
                                        <input type="text" readonly="" class="redonly-form-control" value="'. $row1["total_absent"] . '" name="absentno" id="absentno">
                                    </div>
                                    <input type="hidden" name="total_count" id="total_count" value="' . $count . '" readonly />
                                    <input type="hidden" name="adt" id="adt" value="'. $adt . '" readonly />
                                    <input type="hidden" name="classid" value="' . $classid . '" readonly />
                                    <input type="hidden" name="secid"  value="' . $secid . '" readonly />	
                                    <input type="hidden" name="period"  value="' .  $period . '" readonly />
                                    <input type="hidden" name="aid"  value="' . $row1["Attendance_id"] . '" readonly />
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
				


		
	
?>