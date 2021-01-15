<?php
//This file is used to collect online fee payment from parent app and parent web online fee payment.
$Parameter=$_REQUEST["parameter"];
if($Parameter=='OnlineFeePayment')
    {
        $studentid=$_REQUEST["studentid"];
        $ac_type=$_REQUEST["ac_type"];
        $data = array(
                        "status"=>"200",
                        "message"=>"success"

                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }
?>