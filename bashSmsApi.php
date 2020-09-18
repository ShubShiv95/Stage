<?php
/*
URL:-  http://voice.dealsms.in/index.php
User name:-  demodealsms 
Password :-  123456

Demo API Link
 	http://voice.dealsms.in/api/sendmsg.php?user=demodealsms&pass=123456&sender=Sender ID&phone=Mobile No&text=Test SMS&priority=Priority&stype=smstype

Demo PHP Code

*/
function fireOtp($mobileno,$message){
/*if(isset($_POST['submit']))
$username="success";
$Password="SMS121"
//Getting form data
$sender='TESTNG';
$number=$_POST['number'];
//$message=$_POST['message'];
$priority='ndnd';
$stype='normal';
$bal="Testsms";
$message=urlencode("Welcome :'".$bal."'");
$var="user=".$username."&pass=".$Password."&sender=".$sender."&phone=".$number."&text=".$message."&priority=".$priority."&stype=".$stype."";
*/
$var='http://bhashsms.com/api/sendmsg.php?user=smsventure&pass=123456&sender=TRMRTI&phone=' . $mobileno . '&text=' . $message. '&priority=ndnd&stype=normal';  
//$curl=curl_init('http://voice.dealsms.in/api/sendmsg.php?'.$var);
$curl=curl_init($var);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($curl);
curl_close($curl);
return $var;}
//http://bhashsms.com/api/sendmsg.php?user=smsventure&pass=123456&sender=TRMRTI&phone=9987567713&text=Test SMS&priority=ndnd&stype=normal
?>
