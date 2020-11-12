<?php
include 'bashSmsApi.php';
$mno=$_REQUEST["mobileno"];
$otp=mt_rand(1000,9999);
$val="Dear enquirer, the OTP from The ABC PAATHSHALA sent to you is " . $otp. ".  Please share it at enquiry section. ";
$x=fireOtp($val,$mno);
//echo $val . '<br>' . $x;
echo $x;
?>