<?php
include 'bashSmsApi.php';
$mno=$_REQUEST["mobileno"];
$val=mt_rand(1000,9999);
$x=fireOtp($mno,$val);
echo $val;
?>