<?php
session_start();
include 'dbobj.php';
require_once './FeeApplyCurl.php';
//This file is created to apply the corresponding fee group to the students who are enrolled or imported from bulk entry and does not contains any fee group due to either not provided or due to some execution error.

$session=$_REQUEST["session"];
$GetStudentDetails_sql="select * from student_class_details where session=? and Regular_FG_ID is NULL and enabled=1";
$GSD_Prep = $dbhandle->prepare($GetStudentDetails_sql);
$GSD_Prep->bind_param('s',$session);
$GSD_Result = $GSD_Prep->execute();
$GSD_ResultSet = $GSD_Prep->get_result();
$FailedFG=array();
$html='';
while($row = $GSD_ResultSet->fetch_assoc())
{
    
    //mysqli_autocommit($dbhandle,false);
    //$updateFG_sql="update student_class_details set Regular_FG_ID=(select fgT.fg_id from fee_group_table fgt,fee_group_class_list fgcl,student_class_details scd where scd.student_id=? AND scd.enabled=1 AND scd.session=? AND fgcl.class_id=? AND fgcl.stream=? AND fgt.fg_id=fgcl.fg_id AND fgt.student_type=?) where student_id=?";
    //$updateFG_sql="update student_class_details set Regular_FG_ID=(select fgT.fg_id from fee_group_table fgt,fee_group_class_list fgcl where fgcl.class_id=? AND fgcl.stream=? AND fgt.fg_id=fgcl.fg_id AND fgt.student_type=?) where student_id=?";
    //$updateFG1_sql="update student_class_details set Regular_FG_ID=(select fgT.fg_id from fee_group_table fgt,fee_group_class_list fgcl where fgcl.class_id=" . $row["Class_Id"] . " AND fgcl.stream='"  . $row["Stream"] . "' AND fgt.fg_id=fgcl.fg_id AND fgt.student_type='" . $row["Student_Type"] . "') where student_id='" . $row["Student_Id"] . "'";
    //echo $updateFG1_sql;
    //$result=$dbhandle->query($updateFG1_sql);
    // $updateFG_Prep=$dbhandle->prepare($updateFG_sql);
    // echo $updateFG_Prep->error;
    // $updateFG_Prep->bind_param('isss',
    // $row["Class_Id"],
    // $row["Stream"],
    // $row["Student_Type"],
    // $row["Student_Id"]);

    //echo $updateFG_Prep->error;
    // $updateFG_Prep->bind_param('ssisss',
    // $row['Student_Id'],
    // $row['Session'],
    // $row['Class_Id'],
    // $row['Stream'],
    // $row['Student_Type'],
    // $row['Student_Id']);
    //$updateFG_Result=$updateFG_Prep->execute();
    // if(!$result)
    //     {
    //         array_push($FailedFG,'Failed to Apply Fee Group on Student Id ' . $row["Student_Id"] . '. Classid' . $row['Class_Id'] . '. ' . var_dump($updateFG_Result));
    //         mysqli_rollback($dbhandle);
    //         continue;
    //     }
    // if(!$updateFG_Result)
    //     {
    //         array_push($FailedFG,'Failed to Apply Fee Group on Student Id ' . $row["Student_Id"] . '. Classid' . $row['Class_Id'] . '. ' . var_dump($updateFG_Result));
    //         mysqli_rollback($dbhandle);
    //         continue;
    //     }
    //mysqli_commit($dbhandle);    
    //apply regular fee structure for the fee group created.
    $fee_gen = generate_student_fee_using_curl($row['Student_Id'],$row['Session'],$row['School_Id'],$_SESSION["LOGINID"]);

    echo '<br>' . $row['Student_Id'] .' - '. $row['Session'] .' - '. $row['School_Id'] .' - '. $_SESSION["LOGINID"];
    $json_data = json_decode($fee_gen);
    //$json_data= array();
    if ($json_data['status'] == "Error") 
    {      
        array_push($FailedFG,'FEE Structure Failed to Apply Fee Structure on Student Id ' . $row["Student_Id"] . '. Classid' . $row['Class_Id']);
    }
    else
    {
        array_push($FailedFG,'Fee Structure Successfully Appilied on Student Id ' . $row["Student_Id"] . '. Classid' . $row['Class_Id']);
    }
    $html='<table border="1px"><tr><td>Remarks</<td></tr>';
    foreach($FailedFG as $value)
        {
            $html=$html . "<tr><td>$value</td></tr>";
        }
    $html=$html . '</table>';
    
}
echo $html;

?>