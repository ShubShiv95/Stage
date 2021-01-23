<?php
$pageTitle = "Student Attendance Message";
require_once './includes/header.php';
include_once './includes/navbar.php';
include 'sequenceGenerator.php';
require_once 'GlobalModel.php';
?>


<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
        <form class="new-added-form school-form aj-new-added-form">
            <div class="tebal-promotion">
                <h5 class="text-center">SMS Sent to Absent Student's Parent</h5>
                <div>
                    <?php
                    $aid = $_REQUEST["Attendance_Id"];
                    //mysqli_autocommit($dbhandle,False);
                    //Fetch Attendance Master Data
                    $getAttendanceInfo_sql = "select date_format(doa,'%d-%M-%Y') as doa,date_format(now(),'%d-%m-%Y') as curr_date,section,class_name,sms_status from class_section_table cst,class_master_table cmt,attendance_master_table amt where amt.Attendance_Id=$aid and cst.class_sec_id=amt.class_sec_id and cmt.class_id=cst.class_id ";
                    //echo $getAttendanceInfo_sql;
                    $getAttendanceInfo_result = $dbhandle->query($getAttendanceInfo_sql);

                    if (!$getAttendanceInfo_result) {

                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $getAttendanceInfo_sql;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Attendance SMS Send', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        $message = 'Error: Attendance SMS Failed to Create.  Please consult application consultant.';
                        echo $message;
                        die;
                    }
                    $getAttendanceInfo_row = $getAttendanceInfo_result->fetch_assoc();

                    $Message_Id = sequence_number('message_master_table', $dbhandle);
                    $Message_Category = 'Attendance';
                    $Message_Title = "Attendance Message Class " . $getAttendanceInfo_row["class_name"] . ' Section-' . $getAttendanceInfo_row["section"] . ' dated ' . $getAttendanceInfo_row["doa"] . '.';
                    $Message_Date = $getAttendanceInfo_row["curr_date"];

                    $Absent_Message = $GLOBAL_ATTENDANCE_SMS["Absent-SMS"];
                    $Absent_Message = str_replace("#date#", $getAttendanceInfo_row["doa"], $Absent_Message); //Absent message without student name.
                    $Present_Message = $GLOBAL_ATTENDANCE_SMS["Present-SMS"]; //Present message without student name.


                    $putMessageMasterData_sql = "insert into message_master_table(Message_Id,Message_Category,Message_Title,Message_Date,Message_Type,School_Id,Created_By) values($Message_Id,'$Message_Category','$Message_Title',str_to_date('$Message_Date','%d-%m-%Y'),'SMS'," . $_SESSION['SCHOOLID'] . ",'" . $_SESSION['LOGINID'] . "')";

                    $attendanceStudentList_sql = "select adt.student_id,smt.first_name,if(smt.gender='MALE','son','daughter') as gender,adt.attendance_status,adt.prev_attendance_status as prev_attendance_status from attendance_details_table adt,student_master_table smt where adt.attendance_id=" . $aid . " and smt.student_id=adt.student_id";
                    echo $attendanceStudentList_sql;

                    $attendanceStudentList_result = $dbhandle->query($attendanceStudentList_sql);
                    $count = 0;
                    while ($attendanceStudentList_row = $attendanceStudentList_result->fetch_assoc()) {
                        if ($attendanceStudentList_row["attendance_status"] == 'ABSENT') {
                            $Absent_Message = str_replace("#childname#", $attendanceStudentList_row["gender"] . ' ' . $attendanceStudentList_row["first_name"], $Absent_Message);
                            echo  '<BR>' . $Absent_Message . '<hr>';
                        }


                        if ($getAttendanceInfo_row["sms_status"] == 1) //send modified present sms to parene only if the previous sms sent operation has taken place. If no sms sent operation is done then no required to send any modified present sms.
                        {

                            if ($attendanceStudentList_row["attendance_status"] == 'ABSENT' and $attendanceStudentList_row["prev_attendance_status"] != 'ABSENT') {
                                $Present_Message = str_replace("#childname#", $attendanceStudentList_row["gender"] . ' ' . $attendanceStudentList_row["first_name"], $Present_Message);
                                echo  '<BR>' . $Absent_Message . '<hr>';
                            }
                        }
                    }


                    /*
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
        <?php require_once './includes/scripts.php';
        require_once './includes/closebody.php'; ?>