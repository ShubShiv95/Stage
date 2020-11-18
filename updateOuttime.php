<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

$outtime=$_REQUEST["outtime"];
$veid=$_REQUEST["veid"];
$target_td=$_REQUEST["target_td"];



$updateVisitorOuttime_sql="update visitor_enquiry_table set out_time=time_format('$outtime','%H:%i') where ve_id=$veid";
//echo $updateVisitorOuttime_sql;
$updateVisitorOuttime_result=$dbhandle->query($updateVisitorOuttime_sql);
if(!$updateVisitorOuttime_result)
    {

        echo "Error1";

    }
else    
    {    
        $getVisitorOuttime_sql="select time_format(out_time,'%I:%i %p')  as outtime from visitor_enquiry_table where ve_id=$veid";
        //echo $getVisitorOuttime_sql;
        if(!$updateVisitorOuttime_result=$dbhandle->query($getVisitorOuttime_sql))
            {
                echo "Error2";   
            }
        else
            {
                $updateVisitorOuttime_row=$updateVisitorOuttime_result->fetch_assoc();
                {
                    echo $updateVisitorOuttime_row["outtime"];
        
                }    

            }

    }        



?>
