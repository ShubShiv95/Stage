<?php
function crawlerBhashSMS($request,$username='smsventure',$Password='123456',$sender='TRMRTI',$number='')
{

$priority='ndnd';
$stype='normal';
$bal="Testsms";
$message=urlencode("Welcome :'".$bal."'");
$var="user=".$username."&pass=".$Password."&sender=".$sender."&phone=".$number."&text=".$message."&priority=".$priority."&stype=".$stype."";


if($request='CHECK_BALANCE')
    {

        $curl=curl_init('http://bhashsms.com/api/checkbalance.php?user=smsventure&pass='.$Password);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $response=curl_exec($curl);
        curl_close($curl);
        return $response;
         
    }
}

?>