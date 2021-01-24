<?php
$pageTitle = "Student Attendance Message";
require_once './includes/header.php';
include_once './includes/navbar.php';
include 'sequenceGenerator.php';
?>

<form class="new-added-form school-form aj-new-added-form">
    <div class="tebal-promotion">
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
<?php require_once './includes/scripts.php';
require_once './includes/closebody.php'; ?>