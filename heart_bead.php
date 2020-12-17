<?php
session_start();
//date_default_timezone_set('Asia/Kolkata');
require_once './dbobj.php';
//if (isset($_REQUEST['heart_beat'])) {

    $set_id = $_REQUEST['set_id'];
    $query_st_time = "SELECT Start_date,End_Date,now() as curr_date,(Start_date - INTERVAL 5 MINUTE) as fiveminbfr FROM `online_class_table` WHERE `Set_Id` = ?";
    $query_st_time_prep = $dbhandle->prepare($query_st_time);
    $query_st_time_prep->bind_param("i",$set_id);
    $query_st_time_prep->execute(); 
    $rtesult_set = $query_st_time_prep->get_result();
    $row_time = $rtesult_set->fetch_assoc();
   
    $start_time = strtotime($row_time['Start_date']);
    $curr_time = strtotime($row_time['curr_date']);
    $end_date = strtotime($row_time['End_Date']);
    //current time 5 mins before
    $five_mins_before = strtotime($row_time['fiveminbfr']);
    $row_time['fiveminbfr'].'<br>';
    //&& $curr_time<=$end_date
    $current_date = date('Y-m-d H:i:s').'<br>';
    if ($curr_time >= $five_mins_before && $curr_time<=$end_date) {
      echo "true";
    }else{
        echo "false";
    }
//}



?>