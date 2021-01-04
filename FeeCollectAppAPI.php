<?php
    session_start();
    include 'dbobj.php';
    include 'errorLog.php';
    include 'security.php';
    require_once 'sequenceGenerator.php';


$request_type=$_REQUEST["Parameter"];
$StudentId=$_REQUEST["studentid"];
$SessionId=$_REQUEST["session"];
$ac_type=$_REQUEST["ac_type"];
$schoolid=$_REQUEST["school_id"];
$FG_Type='';
if($ac_type=='SchoolFee')
    {
        $FG_Type="'Regular'";
    }
else if($ac_type=='BusFee')
    {
        $FG_Type="'Transport'";
    }
else if($ac_type=='SchoolBusFee')
    {
        $FG_Type="'Regular','Transport'";
    }

//echo $FG_Type;

if($request_type=='CollectFee')
    {
        


            $fee=array();

            /*
            $StudentFeeIds_sql="select * from student_class_details where student_id='$Student_Id' and session='" . $_SESSION["SESSIONID"] . "' and enabled=1";
            $StudentFeeIds_result=$dbhandle->query($StudentFeeIds_sql);
            if(!$StudentFeeIds_result)
                {
                    //Database Error handling while fetching Student Fee Group Ids.
                    $error_msg = $dbhandle->error;
                    $sql=$StudentFeeIds_sql;
                    $el = new LogMessage();
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Student Fee Group Fetch Error:Database Error handling while fetching Student Fee Group Ids. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    mysqli_rollback($dbhandle);
                    $json=array("status"=>"error","message"=>"Database Error: Not able to get stopage fare. Please try again later.");
                    $json=json_encode($json);
                    return $json; 
                }
            $StudentFeeIds_row=$StudentFeeIds_result->fetch_assoc();    
            $FG_Id=$StudentFeeIds_row["Regular_FG_Id"];
            $TFG_Id=$StudentFeeIds_row["Transport_FG_Id"];
             */

            $json='';
            /*Fetching Concession details for the provided student's concession group id.*/
            /*Concession List array creation*/
               
                //echo "concession array created.<br>";        
                /*End of Concession List array creation*/       

                /* Creating Installment List.*/
                $InstallmentList_sql="select * from installment_master_table order by installment_id";
                $InstallmentList_result=$dbhandle->query($InstallmentList_sql);
                if(!$InstallmentList_result)
                {
                    //Database Error handling while fetching installment information.
                    $error_msg = $dbhandle->error;
                    $sql=$InstallmentList_sql;
                    $el = new LogMessage();
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Student Fee List Creation:Installment Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    mysqli_rollback($dbhandle);
                    $json=array("status"=>"Error","message"=>"Database Error: Not able to get installment information details. Please try again later.");
                    $json=json_encode($json);
                    return $json; 
                }

                $InstallmentId=null;

                /*//April
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
    $fee[1]["Net_Amount"]="6850";
    
    */
                //step 1a. Looping installment id wise. 
                //step 1b. Selecting fee_structure_table table for the installment id. 
                //step 1c. Looping for the fee_structure_table records. 
                //step 1d. Insert Fee_Cluster_fee_fee_structure_tableList row information with other installment and discount information to the student_fee_list_table.
                
                /*Sql to fetch fee lsit items from fee_structure_table month wise or installment wise and inserting rows in student_fee_list_table for the selected fee cluster data installment id wise or month wise. */
                $StudentFeeMaster_sql="select sfm.*,fgt.Fee_Group_Type from student_fee_master sfm,fee_group_table fgt where installment_id=? and session=? and student_id=? and Pay_Status!='Paid' and fgt.FG_Id=sfm.FG_Id and fgt.School_Id=sfm.School_Id and sfm.school_id=$schoolid and fgt.Fee_Group_Type in($FG_Type)";
                //echo $StudentFeeMaster_sql;

                //$StudentFeeMaster_sql="select sfm.*,fgt.Fee_Group_Type from student_fee_master sfm,fee_group_table fgt where installment_id=? and session=? and student_id=? and Pay_Status!='Paid' and fgt.FG_Id=sfm.FG_Id";
                //echo $StudentFeeMaster_sql;
                $StudentFeeMaster_prepare=$dbhandle->prepare($StudentFeeMaster_sql);
                $StudentFeeMaster_prepare->bind_param('iss',$InstallmentId,$SessionId,$StudentId);
                
                while($InstallmentList_row=$InstallmentList_result->fetch_assoc()) //Looping through each Installment.
                    {
                        //Creating Installment variables.
                        $InstallmentId=$InstallmentList_row["Installment_Id"]; //fetching installment id.
                        $Installment_Name=$InstallmentList_row["Installment_Name"]; //fetching installment id.

                        //Creating jsons Installment entries.
                        //$fee[$InstallmentId]["Installment_name"]="$Installment_Name";
                        //$fee[$InstallmentId]["Installment_Id"]="$InstallmentId"; 
                        
                        $TotalInstAmount=0; //initialize total installment amount to zero.
                        $LateFeeAmount=0;
                        $StudentFeeMaster_result=$StudentFeeMaster_prepare->execute();// listing student_fee_master rows for the installment.
                            if(!$StudentFeeMaster_result)
                                    {
                                    $error_msg = $dbhandle->error;
                                    $sql=$StudentFeeMaster_sql;
                                    $el = new LogMessage();
                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                    $el->write_log_message('Student Fee List Creation:Fee Structure Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                    mysqli_rollback($dbhandle);
                                    $json=array("status"=>"Error","message"=>"Database Error: Not able to get Fee Structure information details. Please try again later.");
                                    $json=json_encode($json);
                                    return $json; 
                                }
                        $StudentFeeMaster_result_set = $StudentFeeMaster_prepare->get_result(); 
                        $counter=1; 
                        while($StudentFeeMaster_row=$StudentFeeMaster_result_set->fetch_assoc())//Looping through each student_fee_master record.
                            {            
                                $SFM_Id=$StudentFeeMaster_row["SFM_Id"];
                                $LateFeeAmount=$LateFeeAmount+$StudentFeeMaster_row["Late_Fee_Amount"]; 
                                if($StudentFeeMaster_row["Pay_Status"]=='Due')
                                    {
                                        $TotalInstAmount=$StudentFeeMaster_row["Due_Amount"];
                                        $fee[$InstallmentId]["details"][0]["feeheadid"]=0; //Treading this as due fee head id.
                                        $fee[$InstallmentId]["details"][0]["feename"]="Due";
                                        $fee[$InstallmentId]["details"][0]["amount"]=$StudentFeeMaster_row["Due_Amount"];
                                        $fee[$InstallmentId]["details"][0]["concession"]=0;
                                        $fee[$InstallmentId]["Installment_name"]="$Installment_Name";
                                        $fee[$InstallmentId]["Installment_Id"]="$InstallmentId"; 
                                        $fee[$InstallmentId]["Late_Fee"]=$LateFeeAmount;
                                        $fee[$InstallmentId]["Net_Amount"]=$TotalInstAmount; 
                                        continue;
                                    }
                                    $TotalInstAmount=$TotalInstAmount+$StudentFeeMaster_row["Total_Amount"]+$StudentFeeMaster_row["Late_Fee_Amount"];  
                                $StudentFeeDetails_sql="select sfd.*,fht.Fee_Head_Name from student_fee_details sfd,fee_head_table fht where SFM_ID=? and fht.fee_head_id=sfd.fee_head_id";
                               // echo $StudentFeeDetails_sql;
                                $StudentFeeDetails_prepare=$dbhandle->prepare($StudentFeeDetails_sql);
                                $StudentFeeDetails_prepare->bind_param('i',$SFM_Id);
                                
                                $StudentFeeDetails_result=$StudentFeeDetails_prepare->execute();// Fetching Student_fee_details rows for the student_fee_master id.
                                
                                    if(!$StudentFeeDetails_result)
                                            {
                                                $error_msg = $dbhandle->error;
                                                $sql=$StudentFeeDetails_sql;
                                                $el = new LogMessage();
                                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                $el->write_log_message('Student Fee List Creation:Fee Structure Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                                mysqli_rollback($dbhandle);
                                                $json=array("status"=>"Error","message"=>"Database Error: Not able to get Fee Structure information details. Please try again later.");
                                                $json=json_encode($json);
                                                return $json; 
                                            }    
                                           // echo $StudentFeeDetails_prepare->error;
                                $StudentFeeDetails_result_set = $StudentFeeDetails_prepare->get_result(); //  
                                 
                                while($row = $StudentFeeDetails_result_set->fetch_assoc()) // Looping through each SFM_ID to fetch student_fee_details rows.
                                    {
                                        if($row["Fee_Amount"]>0)
                                        {
                                        $fee[$InstallmentId]["details"][$counter]["feeheadid"]=$row["Fee_Head_Id"];
                                        $fee[$InstallmentId]["details"][$counter]["feename"]=$row["Fee_Head_Name"];
                                        $fee[$InstallmentId]["details"][$counter]["amount"]=$row["Fee_Amount"];
                                        $fee[$InstallmentId]["details"][$counter]["concession"]=$row["Concession_Amount"];
                                       // echo $counter;
                                       // echo  '<br>' . $row["Fee_Head_Id"] . '<br>';
                                       // echo $row["Fee_Head_Name"]. '<br>';
                                       //echo $row["Fee_Amount"]. '<br>';
                                       // echo $row["Concession_Amount"]. '<br>';
                                        
                                        $counter++;
                                        }
                                    }

                                    //$fee[$InstallmentId]["Late_Fee"]=$StudentFeeMaster_row["Late_Fee_Amount"]; 
                            }
                            $fee[$InstallmentId]["Installment_name"]="$Installment_Name";
                            $fee[$InstallmentId]["Installment_Id"]="$InstallmentId"; 
                            $fee[$InstallmentId]["Late_Fee"]=$LateFeeAmount;
                            $fee[$InstallmentId]["Net_Amount"]=$TotalInstAmount;    
                            $counter=0;
                          
                    }
                        header('Content-type: text/javascript');
                        echo json_encode($fee, JSON_PRETTY_PRINT);
                                                     
    }   
?>