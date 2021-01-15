<?php
session_start();
//http://localhost/stage/RegularFeeCreation.php?studentid=150/2018&session=2020-2021
$student_id_gen='156/2018';

//echo $url;
//$domain = $_SERVER['HTTP_HOST'];
//$prefix = $_SERVER['HTTP'] ? 'http://' : 'https://';
$relative = 'http://localhost/stage/RegularFeeCreation.php?studentid='.$student_id_gen.'&session=2020-2021&schoolid=1&loginid=admin';
//echo $prefix.$domain.$relative;
$curl=curl_init($relative);
curl_setopt($curl,CURLOPT_URL,$relative);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_SSL_SESSIONID_CACHE,true);
$response=curl_exec($curl);
curl_close($curl);
       //SELECT * FROM `student_fee_master` WHERE `Student_Id` = '2020000096'
echo "Response- ".$response;
//echo $statusMsg = '<p class="text-success pt-4">Student Enrolled With Student Id <strong>'.$student_id_gen.'<strong> .</p><script>window.setTimeout(function(){window.open("AdmissionFormPrint.php?student_id='.$student_id_gen.'");},2000);</script>';
      


?>