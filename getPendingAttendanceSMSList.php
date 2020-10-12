<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
                                                    
                                                    
                                                $indicatorHTML='<div class="table-responsive">';
                                                $indicatorHTML= $indicatorHTML.'<table class="table table-bordered attendence-msg">';
                                                $indicatorHTML= $indicatorHTML.'<tr><td>Colour Legends</td><td><ul class="list-absent">';
                                                $indicatorHTML= $indicatorHTML.'<li><span class="green-circle"></span>Attendance not done</li>';
                                                $indicatorHTML= $indicatorHTML.'<li><span class="orange-circle"></span>Attendance done but SMS not sent.</li>';
                                                $indicatorHTML= $indicatorHTML.'<li><span class="red-circle"></span>Attendance done and SMS sending triggered.</li>';
                                                $indicatorHTML= $indicatorHTML.'</td></tr></table>';
                                                $indicatorHTML= $indicatorHTML.'<table class="table table-bordered attendence-msg">';
                                                $indicatorHTML= $indicatorHTML.'<thead>';
                                                        
                                                '<table class="table table-bordered attendence-msg">
                                                    <thead>
                                                        <tr  align="center">
                                                            <th>Calss Name </th>
                                                            <th>Attendence </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                    //$classSectionList=array();

                                                    $attendanceList=array();
                                                    $attendanceList_sql="select * from attendance_master_table where doa=str_to_date('" . $_REQUEST["doa"] . "','%d/%m/%Y') and period=1";
                                                    $attendanceList_result=$dbhandle->query($attendanceList_sql);
                                                    if(!$attendanceList_result)
                                                    {
                                                        echo $attendanceList_sql;
                                                        die;
                                                    }
                                                    while($row=$attendanceList_result->fetch_assoc())
                                                    {
                                                        $attendanceList[$row["Class_Sec_id"]]["smsflag"]= $row["smsflag"];   
                                                        $attendanceList[$row["Class_Sec_id"]]["attendance_status"]= $row["attendance_status"];   
                                                        $attendanceList[$row["Class_Sec_id"]]["Attendance_id"]= $row["Attendance_id"];   
                                                    }

                                                    //fetching list of class and sections for a given date of preiod 1.
                                                    //$getclassSectionList_sql="select cmt.class_name as class_name,cst.class_id as class_id,cst.section as section,cst.class_sec_id as class_sec_id from class_master_table cmt,class_section_table cst where cst.class_id=cmt.class_id order by class_no,section";
                                                    $getclassSectionList_sql="select * from class_master_table where enabled=1 and class_no!=0 order by class_no";
                                                    $getclassSectionList_result=$dbhandle->query($getclassSectionList_sql);
                                                    //echo $getclassSectionList_sql;
                                                    while($row1=$getclassSectionList_result->fetch_assoc()) 
                                                        {
                                                            $indicatorHTML=$indicatorHTML. '<tr><td align="center">'. $row1["class_name"] . '</td><td><ul class="list-absent">';    
                                                            

                                                        //$getAttendanceMsgStatus_sql='select smsflag,attendance_status,class_name,section,cst.class_sec_id as class_sec_id,cst.class_id as class_id from class_section_table cst,attendance_master_table amt
                                                        //$getAttendanceMsgStatus_sql='select smsflag,attendance_status,class_name,section,cst.class_sec_id as class_sec_id,cst.class_id as class_id from class_section_table cst full outer join attendance_master_table amt on cst.class_sec_id=amt.class_sec_id
                                                        //where cst.class_id='.$row1["class_id"] . " and doa=str_to_date('10/10/2020','%d/%m/%Y') and period=1 and cst.enabled=1";
                                                        $getSectionList_sql='select class_sec_id,section from class_section_table where class_id='.$row1["class_id"] . " and enabled=1";
                                                        //echo $getSectionList_sql . '<p>';
                                                        $getSectionList_result=$dbhandle->query($getSectionList_sql);
                                                        //print_r($getAttendanceMsgStatus_result);
                                                        while($row2=$getSectionList_result->fetch_assoc()) 
                                                            {      
                                                                $attendance_status=(isset($attendanceList[$row2["class_sec_id"]])?$attendanceList[$row2["class_sec_id"]]["attendance_status"]:0);
                                                                $smsflag=(isset($attendanceList[$row2["class_sec_id"]])?$attendanceList[$row2["class_sec_id"]]["smsflag"]:0);
                                                                $Attendance_id=(isset($attendanceList[$row2["class_sec_id"]])?$attendanceList[$row2["class_sec_id"]]["Attendance_id"]:0);
                                                                //$smsflag=$row2["smsflag"];
                                                                //finding section circle symbol css as per the corresponding smsflag and attendance_status value for the section.
                                                                if($attendance_status==0 and $smsflag==0)
                                                                    {
                                                                        $circletype="green-circle";
                                                                        //echo $attendance_status . '<br>' . $smsflag;
                                                                    }
                                                                else if($attendance_status==1 and $smsflag==0)
                                                                    {
                                                                        $circletype="orange-circle";
                                                                        //echo $attendance_status . '<br>' . $smsflag;
                                                                    }
                                                                else if($attendance_status==1 and $smsflag==1)
                                                                    {
                                                                        $circletype="red-circle";
                                                                        //echo $attendance_status . '<br>' . $smsflag;
                                                                    }   

                                                                    $indicatorHTML=$indicatorHTML. '<li><span class="'. $circletype . '"></span>' . $row2["section"] . '</li>';
                                                                    if($attendance_status==1 and $smsflag==0)
                                                                    {
                                                                        $indicatorHTML=$indicatorHTML.'<input type="hidden" name="pendingsms[]" value="' .  $Attendance_id .'">';
                                                                    }
                                                                    

                                                            }
                                                            $indicatorHTML=$indicatorHTML. '</ul></td></tr>';;
                                                        }    
                                                
                                                    $indicatorHTML=$indicatorHTML. '</tbody></table>';
                                                    

                                                 
                                                    $indicatorHTML=$indicatorHTML. '</div>
                                            <div class="atten-chack">
                                                <div class="chack">
                                                    
                                                    <label class=""><input type="checkbox" class=""> Send Pending Absentees SMS</label>
                                                </div>
                                                <div class="chack">
                                                    <label class="form-check-label"><input type="checkbox" class="form-check-input" disabled> Send Absentees What' ."'" . 's app</label>
                                                </div>
                                            </div>
                                            <div class="new-added-form aj-new-added-form">
                                            <div class="aaj-btn-chang-cbtn">
                                                <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Send  Attendance  Message</button>
                                                
                                            </div>
                                            <div>
                                            </div>
                                            <ul class="list-absent">
                                            </div>';  
                                            echo $indicatorHTML;
?> 