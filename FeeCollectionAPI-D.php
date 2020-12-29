<?php
$request_type=$_REQUEST["Parameter"];
if($request_type=='CollectFee')
    {
  
    $fee=array();
    //Populating April Installment.
    //[]=>installment_id
    //[][details][]=>feeheadid
	
	//April
    $fee[1]["details"]["1"]["feeheadid"]=1;
    $fee[1]["details"]["1"]["name"]="Admission Fee";
    $fee[1]["details"]["1"]["amount"]=5000;
    $fee[1]["details"]["1"]["concession"]=1000;
    //$fee[1]["Installment_name"]="Apr";
    //$fee[1]["Installment_Id"]="4";
    
    $fee[1]["details"]["2"]["feeheadid"]=2;
    $fee[1]["details"]["2"]["name"]="Tuition Fee";
    $fee[1]["details"]["2"]["amount"]=2000;
    $fee[1]["details"]["2"]["concession"]=500;
    //$fee[1]["Installment_name"]="Apr";
    //$fee[1]["Installment_Id"]="4";

    $fee[1]["details"]["3"]["feehaeaid"]=3;
    $fee[1]["details"]["3"]["name"]="Miscellaneous Fee";
    $fee[1]["details"]["3"]["amount"]=1000;
    $fee[1]["details"]["3"]["concession"]=0;

	//$fee[1]["Installment_name"]="Apr";
    //$fee[1]["Installment_Id"]="4";
   
	
	$fee[1]["details"]["4"]["feeheadid"]=4;
    $fee[1]["details"]["4"]["name"]="Transport Fee";
    $fee[1]["details"]["4"]["amount"]=350;
    $fee[1]["details"]["4"]["concession"]=0;
	//$fee[1]["Installment_name"]="Apr";
    //$fee[1]["Installment_Id"]="4";
	
	$fee[1]["Installment_name"]="Apr";
    $fee[1]["Installment_Id"]="4";
    $fee[1]["LateFee"]="400";
    $fee[1]["Net_Amount"]="7250";

    

    //populating May Installment

//May
    $fee[2]["details"]["1"]["feeheadid"]=2;
    $fee[2]["details"]["1"]["name"]="Tuition Fee";
    $fee[2]["details"]["1"]["amount"]=2000;
    $fee[2]["details"]["1"]["concession"]=500;
    //$fee[2]["Installment_name"]="May";
    //$fee[2]["Installment_Id"]="5";


    $fee[2]["details"]["2"]["feehaeaid"]=3;
    $fee[2]["details"]["2"]["name"]="Miscellaneous Fee";
    $fee[2]["details"]["2"]["amount"]=1000;
    $fee[2]["details"]["2"]["concession"]=0;
    //$fee[2]["Installment_name"]="May";
    //$fee[2]["Installment_Id"]="5";
	
	$fee[2]["details"]["3"]["feeheadid"]=4;
    $fee[2]["details"]["3"]["name"]="Transport Fee";
    $fee[2]["details"]["3"]["amount"]=350;
    $fee[2]["details"]["3"]["concession"]=0;
	//$fee[2]["Installment_name"]="May";
    //$fee[2]["Installment_Id"]="5";
	
	$fee[2]["Installment_name"]="May";
    $fee[2]["Installment_Id"]="5";
    $fee[2]["Net_Amount"]="2850";
    //populating June Installment
//June
    $fee[3]["details"]["1"]["feeheadid"]=2;
    $fee[3]["details"]["1"]["name"]="Tuition Fee";
    $fee[3]["details"]["1"]["amount"]=2000;
    $fee[3]["details"]["1"]["concession"]=500;
    //$fee[3]["Installment_name"]="June";
    //$fee[3]["Installment_Id"]="6";


    $fee[3]["details"]["2"]["feehaeaid"]=3;
    $fee[3]["details"]["2"]["name"]="Miscellaneous Fee";
    $fee[3]["details"]["2"]["amount"]=1000;
    $fee[3]["details"]["2"]["concession"]=0;
    //$fee[3]["Installment_name"]="June";
    //$fee[3]["Installment_Id"]="6";
	
	$fee[3]["details"]["3"]["feeheadid"]=4;
    $fee[3]["details"]["3"]["name"]="Transport Fee";
    $fee[3]["details"]["3"]["amount"]=350;
    $fee[3]["details"]["3"]["concession"]=0;
	//$fee[3]["Installment_name"]="June";
    //$fee[3]["Installment_Id"]="6";
	
	$fee[3]["Installment_name"]="June";
    $fee[3]["Installment_Id"]="6";
    $fee[3]["Net_Amount"]="2850";

    //populating July Installment
//July
    $fee[4]["details"]["1"]["feeheadid"]=2;
    $fee[4]["details"]["1"]["name"]="Tuition Fee";
    $fee[4]["details"]["1"]["amount"]=2000;
    $fee[4]["details"]["1"]["concession"]=500;
    //$fee[4]["Installment_name"]="July";
    //$fee[4]["Installment_Id"]="7";


    $fee[4]["details"]["2"]["feehaeaid"]=3;
    $fee[4]["details"]["2"]["name"]="Miscellaneous Fee";
    $fee[4]["details"]["2"]["amount"]=1000;
    $fee[4]["details"]["2"]["concession"]=0;
    //$fee[4]["Installment_name"]="July";
    //$fee[4]["Installment_Id"]="7";
	
	$fee[4]["details"]["3"]["feeheadid"]=4;
    $fee[4]["details"]["3"]["name"]="Transport Fee";
    $fee[4]["details"]["3"]["amount"]=350;
    $fee[4]["details"]["3"]["concession"]=0;
	//$fee[4]["Installment_name"]="July";
   // $fee[4]["Installment_Id"]="7";


	$fee[4]["Installment_name"]="July";
    $fee[4]["Installment_Id"]="7";
    $fee[4]["Net_Amount"]="2850";

//August

    
    //populating August Installment
    $fee[5]["details"]["1"]["feeheadid"]=2;
    $fee[5]["details"]["1"]["name"]="Tuition Fee";
    $fee[5]["details"]["1"]["amount"]=2000;
    $fee[5]["details"]["1"]["concession"]=500;
    //$fee[5]["Installment_name"]="August";
    //$fee[5]["Installment_Id"]="8";

    $fee[5]["details"]["2"]["feehaeaid"]=3;
    $fee[5]["details"]["2"]["name"]="Miscellaneous Fee";
    $fee[5]["details"]["2"]["amount"]=1000;
    $fee[5]["details"]["2"]["concession"]=0;
    //$fee[5]["Installment_name"]="August";
    //$fee[5]["Installment_Id"]="8";
	
    $fee[5]["details"]["3"]["feeheadid"]=4;
    $fee[5]["details"]["3"]["name"]="Transport Fee";
    $fee[5]["details"]["3"]["amount"]=350;
    $fee[5]["details"]["3"]["concession"]=0;
	//$fee[5]["Installment_name"]="August";
    //$fee[5]["Installment_Id"]="8";
	
	$fee[5]["Installment_name"]="August";
    $fee[5]["Installment_Id"]="8";
    $fee[5]["Net_Amount"]="2850";
  
	
    //populating September Installment
    $fee[6]["details"]["1"]["feeheadid"]=2;
    $fee[6]["details"]["1"]["name"]="Tuition Fee";
    $fee[6]["details"]["1"]["amount"]=2000;
    $fee[6]["details"]["1"]["concession"]=500;
    //$fee[6]["Installment_name"]="September";
    //$fee[6]["Installment_Id"]="9";

    $fee[6]["details"]["2"]["feehaeaid"]=3;
    $fee[6]["details"]["2"]["name"]="Miscellaneous Fee";
    $fee[6]["details"]["2"]["amount"]=1000;
    $fee[6]["details"]["2"]["concession"]=0;
    //$fee[6]["Installment_name"]="September";
    //$fee[6]["Installment_Id"]="9";
	
	$fee[6]["details"]["3"]["feeheadid"]=4;
    $fee[6]["details"]["3"]["name"]="Transport Fee";
    $fee[6]["details"]["3"]["amount"]=350;
    $fee[6]["details"]["3"]["concession"]=0;
	//$fee[6]["Installment_name"]="September";
    //$fee[6]["Installment_Id"]="9";
	
	$fee[6]["Installment_name"]="September";
    $fee[6]["Installment_Id"]="9";
    $fee[6]["Net_Amount"]="2850";

    $fee["ChequeBounce"]["1"]["ChequeNo"]="121450";
    $fee["ChequeBounce"]["1"]["BounceCharge"]="200";
    $fee["ChequeBounce"]["2"]["ChequeNo"]="121354";
    $fee["ChequeBounce"]["2"]["BounceCharge"]="200";
   // $obj=json_encode($fee);
   //echo "<pre>" . $obj . "</pre<br>";
  header('Content-type: text/javascript');
    echo json_encode($fee, JSON_PRETTY_PRINT);
}

?>