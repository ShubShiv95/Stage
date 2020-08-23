<?php
session_start();
include 'dbobj.php';
include 'error_log.php';
include 'security.php';


$visitortype=$_REQUEST["visitortype"];
$companyname=$_REQUEST["companyname"];
$vname=$_REQUEST["vname"];
$contactno=$_REQUEST["contactno"];
$purpose=$_REQUEST["purpose"];
$location=$_REQUEST["location"];
$personmeet=$_REQUEST["personmeet"];
$nperson=$_REQUEST["nperson"];
$note=$_REQUEST["note"];
$loginid=$_SESSION['LOGINID'];
$schoolid=$_SESSION['SCHOOLID'];


mysqli_autocommit($dbhandle,FALSE);

$insertVisitorEnquiry_sql="insert into visitor_enquiry_table
    (visitor_type,
    visitor_name,
    contact_no,
    company_name,
    purpose,
    location,
    person_to_meet,
    no_of_person,
    date_of_visit,
    in_time,
    note,
    created_by,
    created_on,
    school_id) values(?,?,?,?,?,?,?,?,NOW(),TIME_FORMAT(current_time,'%h:%i %p'),?,?,NOW(),?)";
 
    $insertVisitorEnquiry_stmt=$dbhandle->prepare($insertVisitorEnquiry_sql);
    //echo $dbhandle->error;die;	
    $insertVisitorEnquiry_stmt->bind_param('ssssssisssi',
    $visitortype,
    $vname,
    $contactno,
    $companyname,
    $purpose,
    $location,
    $personmeet,
    $nperson,
    $note,
    $loginid,
    $schoolid);

    
    $insertVisitorEnquiry_stmt_result=$insertVisitorEnquiry_stmt->execute(); //Feedback note added to admission_followup_note Table.
    
    // Remote image URL
    //$imgurl = $_REQUEST["image"];

    $myimg = $_REQUEST['image'];
    $destinationPath = "data/images/";
  
    $web_capture_part = explode(";base64,", $myimg);
    $image_type_aux = explode("image/", $web_capture_part[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($web_capture_part[1]);
    $myimgName = uniqid() . '.png';
  
    $file = $destinationPath . $myimgName;
    file_put_contents($file, $image_base64);
  
    //print_r($myimgName);







/*
    // Image path
    $img = 'data/images/codexworld.jpg';
    $ch = curl_init($imgurl);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

*/

    if(!$insertVisitorEnquiry_stmt_result)
        {
            //var_dump($getStudentCount_result);
            $error_msg=mysqli_error($dbhandle);
            $sql="";
            $el=new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Add Feedback Note',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
            //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
            //$str_end='</div>';
            //echo $str_start.$messsage.$str_end;
            //die;
            //echo "unsecessful";
            echo '<meta HTTP-EQUIV="Refresh" content="0; URL=visitorEnquiry.php">';
        }
    else
        {
            mysqli_commit($dbhandle);
            //echo "success";
            echo '<meta HTTP-EQUIV="Refresh" content="0; URL=visitorEnquiry.php">';
        }    

?>