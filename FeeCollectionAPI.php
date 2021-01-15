<?php
    session_start();
    include 'dbobj.php';
    include 'errorLog.php';
   // include 'security.php';
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

             
   
                //step 1a. Looping installment id wise. 
                //step 1b. Selecting fee_structure_table table for the installment id. 
                //step 1c. Looping for the fee_structure_table records. 
                //step 1d. Insert Fee_Cluster_fee_fee_structure_tableList row information with other installment and discount information to the student_fee_list_table.
                
                /*Sql to fetch fee lsit items from fee_structure_table month wise or installment wise and inserting rows in student_fee_list_table for the selected fee cluster data installment id wise or month wise. */
                $StudentFeeMaster_sql="select sfm.*,fgt.Fee_Group_Type from student_fee_master sfm,fee_group_table fgt where installment_id=? and session=? and student_id=? and sfm.Pay_Status='Unpaid' and fgt.FG_Id=sfm.FG_Id and fgt.School_Id=sfm.School_Id and sfm.school_id=$schoolid and fgt.Fee_Group_Type in($FG_Type)";
                //echo $StudentFeeMaster_sql;

                //$StudentFeeMaster_sql="select sfm.*,fgt.Fee_Group_Type from student_fee_master sfm,fee_group_table fgt where installment_id=? and session=? and student_id=? and Pay_Status!='Paid' and fgt.FG_Id=sfm.FG_Id";
                //echo $StudentFeeMaster_sql;
                $StudentFeeMaster_prepare=$dbhandle->prepare($StudentFeeMaster_sql);
                $StudentFeeMaster_prepare->bind_param('iss',$InstallmentId,$SessionId,$StudentId);
                $firstindex=1;
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
                        if($StudentFeeMaster_result_set->num_rows==0)
                                {
                                    continue;
                                }
                        while($StudentFeeMaster_row=$StudentFeeMaster_result_set->fetch_assoc())//Looping through each student_fee_master record.
                            {            
                                $SFM_Id=$StudentFeeMaster_row["SFM_Id"];
                                $LateFeeAmount=$LateFeeAmount+$StudentFeeMaster_row["Late_Fee_Amount"]; 
                                
                                /* The Due is deprecated.  Now the Pay Status only works for Paid and Unpaid.
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
                                    */
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
                                        // $fee[$InstallmentId]["details"][$counter]["feeheadid"]=$row["Fee_Head_Id"];
                                        // $fee[$InstallmentId]["details"][$counter]["feename"]=$row["Fee_Head_Name"];
                                        // $fee[$InstallmentId]["details"][$counter]["amount"]=$row["Fee_Amount"];
                                        // $fee[$InstallmentId]["details"][$counter]["concession"]=$row["Concession_Amount"];
                                        $fee[$firstindex]["details"][$counter]["feeheadid"]=$row["Fee_Head_Id"];
                                        $fee[$firstindex]["details"][$counter]["feename"]=$row["Fee_Head_Name"];
                                        $fee[$firstindex]["details"][$counter]["amount"]=$row["Fee_Amount"];
                                        $fee[$firstindex]["details"][$counter]["concession"]=$row["Concession_Amount"];
                                     
                                        
                                        $counter++;
                                        }
                                    }

                                    //$fee[$InstallmentId]["Late_Fee"]=$StudentFeeMaster_row["Late_Fee_Amount"]; 
                            }
                            // $fee[$InstallmentId]["Installment_name"]="$Installment_Name";
                            // $fee[$InstallmentId]["Installment_Id"]="$InstallmentId"; 
                            // $fee[$InstallmentId]["Late_Fee"]=$LateFeeAmount;
                            // $fee[$InstallmentId]["Net_Amount"]=$TotalInstAmount;    
                            $fee[$firstindex]["Installment_name"]="$Installment_Name";
                            $fee[$firstindex]["Installment_Id"]="$InstallmentId"; 
                            $fee[$firstindex]["Late_Fee"]=$LateFeeAmount;
                            $fee[$firstindex]["Net_Amount"]=$TotalInstAmount;    
                            $counter=0;
                            $firstindex++;
                          
                    }
                        header('Content-type: text/javascript');
                        echo json_encode($fee, JSON_PRETTY_PRINT);
                                                     
    }   


    if($request_type=='CollectOtherAmounts')
    {
        $OtherFee["AdjustedAmount"]=0;
        $OtherFee["ODF"]=0;
        $OtherFee["Discount"]=0;
        $OtherFee["ReeAdmFee"]=0;
        $OtherFee["Cheque"][1]["ReceptNo"]='2020/12';
        $OtherFee["Cheque"][1]["ChequeNo"]='254789';
        $OtherFee["Cheque"][1]["BCharges"]=400;
        $OtherFee["Cheque"][2]["ReceptNo"]='2020/13';
        $OtherFee["Cheque"][2]["ChequeNo"]='658749';
        $OtherFee["Cheque"][2]["BCharges"]=500;
          
          
        // Advance Fee Information starts here.
          $GetAdvanceAmount="select * from fee_advance_table where student_id='$StudentId' and adjusted=0 and school_id=$schoolid";
          //echo $GetAdvanceAmount;
          $GetAdvanceAmountResult=$dbhandle->query($GetAdvanceAmount);
          if(!$GetAdvanceAmountResult)
            {
                $error_msg = $dbhandle->error;
                $sql=$GetAdvanceAmount;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Other Fee List Creation: Advance Fee Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $json=array("status"=>"Error","message"=>"Database Error: Not able to get student advance fee detail information. Please try again later.");
                $json=json_encode($json);
                return $json; 
            }
        $AdvanceAmount=0;    
        while($row=$GetAdvanceAmountResult->fetch_assoc())
            {
              
                //$OtherFee["advancefee"]=array("amount"=>$row["Advance_Amount"]);
                $AdvanceAmount=$AdvanceAmount+$row["Advance_Amount"];
            }    
            $OtherFee["AdjustedAmount"]=$AdvanceAmount;

        //End of Advance Fee Adjustment Information.

       //Readmission fee Calculation Starts here.
      
       //fetching list of unpaid regular fee records for the student with installment month number and current month value. 
        $GetUnpaidFeeList_sql="select sfm.*,imt.installment_month,month(now()) as current_month from student_fee_master sfm,fee_group_table fgt,installment_master_table imt where sfm.student_id='$StudentId'  and sfm.school_id=$schoolid and sfm.session='$SessionId' and fgt.fg_id=sfm.fg_id and fgt.fee_group_type='Regular' and sfm.pay_status='Unpaid' and imt.installment_id=sfm.installment_id order by sfm.installment_id asc";
        //echo $StudentFeeMaster_sql;


          $GetUnpaidFeeList_Result=$dbhandle->query($GetUnpaidFeeList_sql);
          if(!$GetUnpaidFeeList_Result)
            {
                $error_msg = $dbhandle->error;
                $sql=$GetAdvanceAmount;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee List Creation: Unpaid Fee Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $json=array("status"=>"Error","message"=>"Database Error: Not able to get student unpaid fee master table information. Please try again later.");
                $json=json_encode($json);
                return $json; 
            }
        
            $CountUnpaidMonths=0;
            $ReadmissionMonthLimit=6; //for testing the value is static.  This value can be taken from customized configuration readmission month limit value as per school requirement.
            $ReadmFeeAmount=5000;
        while($row=$GetUnpaidFeeList_Result->fetch_assoc())
            {
                if($row["current_month"]>=1 and $row["current_month"]<=3  and $row["installment_month"]>=4 and $row["installment_month"]<=12   )
                    {
                        //unpaid month count increments if for the fetch record the installment month is between april and december and current month value between january and march.
                        $CountUnpaidMonths++;
                        continue;
                    }
                
                if(($row["current_month"]>=1 and $row["current_month"]<=3)  and ($row["installment_month"]>=1 and $row["installment_month"]<=3) and $row["installment_month"]<=$row["current_month"])
                    {
                        //if the both the installment month and current month value both belongs to same year and installment month is lower than equal to current month then increment unpaid month counter. In between January to March.
                        $CountUnpaidMonths++;
                        continue;

                    }    

                    if(($row["current_month"]<=12 and $row["current_month"]>=4)  and ($row["installment_month"]<=12 and $row["installment_month"]>=4) and $row["installment_month"]<=$row["current_month"])
                    {
                        //if the both the installment month and current month value both belongs to same year and installment month is lower than equal to current month then increment unpaid month counter. In between April to december.
                        $CountUnpaidMonths++;
                        continue;

                    }      

               
            }
        if($CountUnpaidMonths>=$ReadmissionMonthLimit)
            {
            
                $OtherFee["ReeAdmFee"]=$ReadmFeeAmount;
            }    
            
        //End of Readmission fee Calculation

        // On Demand Fee Information starts here.
        $GetAdvanceAmount="select NULLIF(sum(amount),0) odf_amount from fee_on_demand where student_id='$StudentId' and pay_status='Unpaid' and school_id=$schoolid  and session='$SessionId'";
        //echo $GetAdvanceAmount;
        $GetAdvanceAmountResult=$dbhandle->query($GetAdvanceAmount);
        if(!$GetAdvanceAmountResult)
          {
              $error_msg = $dbhandle->error;
              $sql=$GetAdvanceAmount;
              $el = new LogMessage();
              //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
              $el->write_log_message('Student Other Fee List Creation: Advance Fee Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
              mysqli_rollback($dbhandle);
              $json=array("status"=>"Error","message"=>"Database Error: Not able to get student advance fee detail information. Please try again later.");
              $json=json_encode($json);
              return $json; 
          }
    
        $row=$GetAdvanceAmountResult->fetch_assoc();
        if($row["odf_amount"]!='')
            {$OtherFee["ODF"]=$row["odf_amount"];}

      //End of Advance Fee Adjustment Information.

       
        header('Content-type: text/javascript');
        echo json_encode($OtherFee, JSON_PRETTY_PRINT);
    }
   

   /*This section contains codes to create json data to view student fee summary data in Student 360 Fee Section Page. */
    if($request_type=='ViewFeeSummary')
    {
        $fee=array();
        $json='';
      
        /* Creating Installment List.*/
        
        $StudentClassDetailsSql="select * from student_class_details where student_id=? and session=? and school_id=?";
        $SCD_prepare=$dbhandle->prepare($StudentClassDetailsSql);
        $SCD_prepare->bind_param('ssi',$StudentId,$SessionId,$schoolid);
        $SCD_result=$SCD_prepare->execute();
        if(!$SCD_result)
                    {
                        $error_msg = $dbhandle->error;
                        $sql=$StudentFeeMaster_sql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Class Details Fetch Error: Not able to fetch student class details and fee groups. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        mysqli_rollback($dbhandle);
                        $json=array("status"=>"Error","message"=>"Database Error:  Not able to fetch student class details and fee groups. Please try again later.");
                        $json=json_encode($json);
                        return $json; 
                    }
        $SCD_result_set = $SCD_prepare->get_result(); 
       
       
        $SCD_row=$SCD_result_set->fetch_assoc();
        $RegularFGId=$SCD_row["Regular_FG_Id"];
        $TransportFGId=$SCD_row["Transport_FG_Id"];            
        
        
        //Generating json data for Regular Fee grup id
        $RegularFeeSql="select sfmt.*,imt.installment_name from student_fee_master sfmt,installment_master_table imt where sfmt.student_id=? and sfmt.fg_id=? and sfmt.session=? and sfmt.school_id=? and imt.installment_id=sfmt.installment_id order by sfmt.installment_id";
                    //echo 'month is ' . date('M',4);
        //echo $RegularFeeSql;
        $RF_prepare=$dbhandle->prepare($RegularFeeSql); 
        $RF_prepare->bind_param('sisi',$StudentId,$RegularFGId,$SessionId,$schoolid);
        
         $RF_result=$RF_prepare->execute();
       
        if(!$RF_result)
                    {
                        $error_msg = $dbhandle->error;
                        $sql=$StudentFeeMaster_sql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Regular Fee Fetch Error: Not able to fetch student Regular Fee Data. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        mysqli_rollback($dbhandle);
                        $json=array("status"=>"Error","message"=>"Database Error:  tudent Regular Fee Fetch Error: Not able to fetch student Regular Fee Data. Please try again later.");
                        $json=json_encode($json);
                        return $json; 
                    }
        $RF_result_set = $RF_prepare->get_result(); 

        if($RF_result_set->num_rows==0) //if no fee found for Regular Fee group then just print a zero filled json.
        {
            //This condition should never come for a student but if this comes then it means the student has not been assigned with any of the fee group.  Where as it should no be done the student must have some fee group.  To remove the exception this N/A with Unpaid json has been created.
            for($month=4;$month<=12;$month++)
                {
                    $monthName = date('M', mktime(0, 0, 0, $month, 15));
                    //$str=$str.', '.$month;
                    $fee["School_Fee"][]=array(
                    "Month"=>$monthName,
                    "Fee_Amount"=>'N/A',
                    "Pay_Status"=>'Unpaid');
                    if($month==12)
                        {
                            $month=0;
                        }
                    if($month==3)
                        {
                            break;
                        }    
                }
        }

        while($RF_result_row=$RF_result_set->fetch_assoc())
            {
                //var_dump($RF_result_row). '<br>';
                $fee["School_Fee"][]=array(
                    "Month"=>$RF_result_row["installment_name"],
                    "Fee_Amount"=>$RF_result_row["Total_Amount"],
                    "Pay_Status"=>$RF_result_row["Pay_Status"]);

            }


        //Generating json data for Transport Fee grup id
        $RegularFeeSql="select sfmt.*,imt.installment_name from student_fee_master sfmt,installment_master_table imt where sfmt.student_id=? and sfmt.fg_id=? and sfmt.session=? and sfmt.school_id=? and imt.installment_id=sfmt.installment_id order by sfmt.installment_id";
      
        $RF_prepare=$dbhandle->prepare($RegularFeeSql); 
        $RF_prepare->bind_param('sisi',$StudentId,$TransportFGId,$SessionId,$schoolid);
        $RF_result=$RF_prepare->execute();
        //echo $RF_prepare->num_rows();
        if(!$RF_result)
                    {
                        $error_msg = $dbhandle->error;
                        $sql=$StudentFeeMaster_sql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Regular Fee Fetch Error: Not able to fetch student Regular Fee Data. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        mysqli_rollback($dbhandle);
                        $json=array("status"=>"Error","message"=>"Database Error:  tudent Regular Fee Fetch Error: Not able to fetch student Regular Fee Data. Please try again later.");
                        $json=json_encode($json);
                        return $json; 
                    }
        $RF_result_set = $RF_prepare->get_result(); 
        if($RF_result_set->num_rows==0) //if no fee found for transport fee group then just print a zero filled json.
            {
                //This condition meets only when the student avail no transport facility. 
                for($month=4;$month<=12;$month++)
                    {
                        $monthName = date('M', mktime(0, 0, 0, $month, 15));
                        //$str=$str.', '.$month;
                        $fee["Bus_Fee"][]=array(
                        "Month"=>$monthName,
                        "Fee_Amount"=>'N/A',
                        "Pay_Status"=>'Paid');
                        if($month==12)
                            {
                                $month=0;
                            }
                        if($month==3)
                            {
                                break;
                            }    
                    }
            }

       
        while($RF_result_row=$RF_result_set->fetch_assoc())
            {
                //var_dump($RF_result_row). '<br>';
                $fee["Bus_Fee"][]=array(
                    "Month"=>$RF_result_row["installment_name"],
                    "Fee_Amount"=>$RF_result_row["Total_Amount"],
                    "Pay_Status"=>$RF_result_row["Pay_Status"]);

            }    
            header('Content-type: text/javascript');
            echo json_encode($fee, JSON_PRETTY_PRINT);


    }
  



?>