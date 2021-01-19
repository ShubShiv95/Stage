<?php
session_start();
include 'dbobj.php';
    if ($_REQUEST['receipt_id']) 
    {
        $total_rows = 1;
        if ($total_rows>0) 
        {
            // if row result is more than 0 then run code below else give output of line no 49
            // master array
            $success = array(
                "status"        =>  "200",
                "type"          =>  "success",
                "message"       =>  "record found"
            );

  
    //Finding Fee Details for the Recept.  Example Recept No 121
    //$receptno=$_REQUEST['receipt_id'];
    $receptno=$_REQUEST['receipt_id'];
    $schoolid=$_SESSION['SCHOOLID'];
    
        


            //Fetching Consolidated Fee information.
            $GetFeeMasterSql="select sfm.*,smt.staff_name,imt.installment_name from student_fee_master sfm,staff_master_table smt,installment_master_table imt where recept_no=? and sfm.school_id=? and smt.login_id=sfm.updated_by and imt.installment_id=sfm.installment_id";
            $GetFeeMasterPrep=$dbhandle->prepare($GetFeeMasterSql);
            $GetFeeMasterPrep->bind_param('si',$receptno,$schoolid);
            $result=$GetFeeMasterPrep->execute();
            $result_set = $GetFeeMasterPrep->get_result(); 
            $fee_receipt_for='';
            $staff_name='';
            $total_latefee_amount=0;
            $paid_latefee_amount=0;
            $total_due_amt=0; // total fee amount paid.
            $total_concession_amount=0; // total fee amount paid.
            $total_paid_amuont=0; // total fee amount paid.

            while($row1 = $result_set->fetch_assoc())
                {
                    $fee_receipt_for=$fee_receipt_for . '-' .$row1["installment_name"];
                    $total_latefee_amount=$total_latefee_amount+$row1["Late_Fee_Amount"];
                   
                }
            $fee_receipt_for=substr($fee_receipt_for,1,strlen($fee_receipt_for));
            
            $GetFeeDetailsSql="select sfm.recept_no, sum(fee_amount) as due_amount,sum(concession_amount) as concession_amount from student_fee_master sfm,student_fee_details sfd,fee_head_table fht WHERE fht.fee_head_id=sfd.fee_head_id AND sfd.sfm_id=sfm.sfm_id AND sfm.recept_no=? and sfm.school_id=? ";
            $GetFeeDetailsPrep=$dbhandle->prepare($GetFeeDetailsSql);
            $GetFeeDetailsPrep->bind_param('si',$receptno,$schoolid);
            $result=$GetFeeDetailsPrep->execute();
            $result_set = $GetFeeDetailsPrep->get_result(); 
    
            $row2 = $result_set->fetch_assoc();
            $total_due_amt = $row2["due_amount"];
            $total_concession_amount = $row2["concession_amount"];
            $total_paid_amuont = $total_due_amt  + $total_concession_amount;
            //echo "due amount=" .$total_due_amt;
            
            $GetFeePaymentMasterSql="select *,date_format(payment_date,'%d/%m/%Y') as recept_date from fee_payment_master where recept_no=? and school_id=?";
            //echo $GetFeePaymentMasterSql;
            $GetFeePaymentMasterPrep=$dbhandle->prepare($GetFeePaymentMasterSql);
            $GetFeePaymentMasterPrep->bind_param('is',$receptno,$schoolid);
            //var_dump($GetFeePaymentMasterPrep);
            $result=$GetFeePaymentMasterPrep->execute();
            
            $result_set1 = $GetFeePaymentMasterPrep->get_result(); 
            $row8 = $result_set1->fetch_assoc();
            $receipt_date = $row8["recept_date"];
            //$student_id = $row3["Student_Id"];
            $student_id= $row8["Student_Id"];
            //echo "Student=".$row8["Student_Id"];
            //echo "Receipt No: " . $row8["Recept_No"];
            //$student_id = "2020000080";

            //the Json with student details information part is generated  at the bottom.    

            $GetStudentDetailsSql="select smt.admission_id,smt.student_id,smt.first_name,smt.middle_name,smt.last_name,smt.father_name,smt.mother_name,smt.sms_contact_no,smt.comm_address,cmt.class_name,cst.section,cst.stream from student_master_table smt,student_class_details scd,class_master_table cmt,class_section_table cst where scd.student_id=? and scd.school_id=? and smt.student_id=scd.student_id and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id";
            //echo $GetStudentDetailsSql;
            $GetStudentDetailsPrep=$dbhandle->prepare($GetStudentDetailsSql);
            $GetStudentDetailsPrep->bind_param('si',$student_id,$schoolid);
            $result=$GetStudentDetailsPrep->execute();
            if(!$result)
                    {

                        $error_msg = $GetStudentDetailsPrep->error;
                        $sql = $GetStudentDetailsSql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Fee Receipt Creation Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        mysqli_rollback($dbhandle);
                        //$json = array("status" => "Error", "message" => "Database Error: Not able to get student concession group details. Please try again later.");
                        //$json = json_encode($json);
                        //return $json;
                    }
        //var_dump($GetStudentDetailsPrep);
        $result_set = $GetStudentDetailsPrep->get_result(); 
        $row4 = $result_set->fetch_assoc();
        //echo '<br>dfas fad';
        $student_name=$row4["first_name"] . ' ' . $row4["middle_name"] . ' '. $row4["last_name"]; 
        $admission_id=$row4["admission_id"]; 
        $class=$row4["class_name"] . '-' . $row4["section"] . ' ' . $row4["stream"];
        $parent_name=(empty($row4["father_name"])? '' : $row4["father_name"] . ' & ') . (empty($row4["father_name"])? '' : $row4["father_name"]);        
        $contact_no=$row4["sms_contact_no"];       
        $address=$row4["comm_address"];
        //Route details are pending. Will be done after transport module work.
        $route_name="East of Dhanbad";
        $stoppage="Signature Tower More"; 
        
            $data['fee_Details']= array(
                "fee_receipt_no"                =>  $receptno,
                "fee_receipt_for"               =>  $fee_receipt_for,
                "student_name"                  =>  $student_name,
                "admission_no"                  =>  $admission_id,
                "class"                         =>  $class,
                "parent_name"                   =>  $parent_name,
                "contact_no"                    =>  $contact_no,
                "address"                       =>  $address,
                "route_name"                    =>  $route_name,
                "stoppage"                      =>  $stoppage,
                "receipt_date"                  =>  $receipt_date,
                "staff_name"                    =>  $staff_name
            );

                


        //Finding Consolidated Pending Fee- Late fee,cheque bounce fee, other demanding fee.       
            // Get Appilied Cheque Bounce Fee Amounts Appilied.
            $ChequeBounceFeeSql="select sum(Bounce_Charge) as Bouncechg from fee_cheque_table where Recept_No=? and school_id=?";
            $ChequeBounceFeePrep=$dbhandle->prepare($ChequeBounceFeeSql);
            $ChequeBounceFeePrep->bind_param('si',$receptno,$schoolid);
            $result=$ChequeBounceFeePrep->execute();
            $result_set = $ChequeBounceFeePrep->get_result();
            $ChequeBounceFeeDue=0;
            $row5 = $result_set->fetch_assoc();
            $ChequeBounceFeeDue = $ChequeBounceFeeDue + $row5["Bouncechg"];
            
            // Get Appilied On Demand Fee Amounts Appilied.
            $OnDemandFeeSql="select sum(amount) amount from fee_on_demand where Recept_no=?  and school_id=?";
            $OnDemandFeePrep=$dbhandle->prepare($OnDemandFeeSql);
            $OnDemandFeePrep->bind_param('si',$receptno,$schoolid);
            $result=$OnDemandFeePrep->execute();
            $result_set = $OnDemandFeePrep->get_result();
            $ODFeeDue=0;
            $row5 = $result_set->fetch_assoc();
            $ODFeeDue = $ODFeeDue + $row5["amount"];



        //End of Finding Consolidated Pending Fee

        //Fetching Fee Payment Master Data with consollidated paid amounts.
            $FeePaymentSql="select * from fee_payment_master where recept_no=? and school_id=?";
            $FeePaymentPrep=$dbhandle->prepare($FeePaymentSql);
            $FeePaymentPrep->bind_param('si',$receptno,$schoolid);
            $result=$FeePaymentPrep->execute();
            $result_set = $FeePaymentPrep->get_result();  
            $row5 = $result_set->fetch_assoc();
            $PaymentAmount=$row5["Paid_Amount"];
            $PaymentLateFee=$row5["Late_Fee"];
            $PaymentReeAdmFee=$row5["Ree_Adm_Fee"];
            $PaymentODFee=$row5["On_Demand_Fee"];
            $PaymentChqBonFee=$row5["Chq_Bon_Amount"];
            $PaymentAdvAdjAmt=$row5["Advance_Adjusted"];
            $PaymentDiscount=$row5["Discount_Amount"];

            $FeePaymentDetailsSql="select fpd.*,pmt.Paymode_Name from fee_payment_details fpd,paymode_master_table pmt where fp_id=".$row5["FP_Id"] . " and pmt.paymode_id=fpd.paymode";
            //echo $FeePaymentDetailsSql;
            $FeePaymentDetailsResult=$dbhandle->query($FeePaymentDetailsSql);
            if(!$FeePaymentDetailsResult)
                {
                    $data['fee_Details']['payment_receiving_details']    =array(
                        ["transaction_type"              =>  "",
                        "transaction_no"                =>  "",
                        "instrument_no"                 =>  "",
                        "amount"                        =>  ""],
                   
                    );
  
                }
            else
                {
                    while($FeePaymentDetailsRow=$FeePaymentDetailsResult->fetch_assoc())
                    {
                        $data['fee_Details']['payment_receiving_details'] = array(
                            ["transaction_type"              =>  $FeePaymentDetailsRow["Paymode_Name"],
                            "transaction_no"                =>  $FeePaymentDetailsRow["FPD_Id"],
                            "instrument_no"                 =>  $FeePaymentDetailsRow["Instrument_No"],
                            "amount"                        =>  $FeePaymentDetailsRow["Amount"]],
                      
                        );
                    }    

                }     
            
                  

        //Generating Receipt Fee Head Details JSon with total sum values.
            $FeeHeadDetailsSql="select fht.fee_head_name feename,sum(fee_amount) as due,sum(concession_amount) as concession,sum(fee_amount)-sum(concession_amount) as paid_amount,sum(late_fee_amount) late_fee from student_fee_details sfd,fee_head_table fht,student_fee_master sfm where sfm.recept_no=? and sfm.school_id=? and sfd.sfm_id=sfm.sfm_id and fht.fee_head_id=sfd.fee_head_id group by feename";
            //echo $FeeHeadDetailsSql;
            $FeeHeadDetailsPrep=$dbhandle->prepare($FeeHeadDetailsSql);
            $FeeHeadDetailsPrep->bind_param('si',$receptno,$schoolid);
            $result=$FeeHeadDetailsPrep->execute();
            $result_set = $FeeHeadDetailsPrep->get_result();  
            $TotalDue=0;
            $TotalCons=0;
            $TotalPaid=0;  
            $TotalLateFee=0; 
            while($row = $result_set->fetch_assoc())
            {
                if($row["due"]>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  $row["feename"],
                        "due_amount"                    =>  $row["due"],
                        "concession"                    =>  $row["concession"],
                        "paid"                          =>  $row["paid_amount"]);
                        $TotalDue = $TotalDue + $row["due"];            //totaling due amount.
                        $TotalCons = $TotalCons + $row["concession"];  //toatalling concession amount.
                        $TotalPaid = $TotalPaid + $row["paid_amount"];   //totalling fee head amounts
                        $TotalLateFee = $TotalLateFee + $row["late_fee"]; //totaling applicable late fee amount
                }
            }

            //For Late Fee head
            if($TotalLateFee>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  "Late Fee",
                        "due_amount"                    =>  $TotalLateFee,
                        "concession"                    =>  $TotalLateFee-$PaymentLateFee,
                        "paid"                          =>  $PaymentLateFee);
                        $TotalDue = $TotalDue + $TotalLateFee;            //totaling due amount.
                        $TotalCons = $TotalCons + $TotalLateFee-$PaymentLateFee;  //toatalling concession amount.
                        $TotalPaid = $TotalPaid + $PaymentLateFee;   //totalling fee head amounts
                        
                }
                
            //For Late Fee head
            if($PaymentChqBonFee>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  "Cheque Bounce Chg.",
                        "due_amount"                    =>  $ChequeBounceFeeDue,
                        "concession"                    =>  $ChequeBounceFeeDue-$PaymentChqBonFee,
                        "paid"                          =>  $PaymentChqBonFee);
                        $TotalDue = $TotalDue + $ChequeBounceFeeDue;            //totaling due amount.
                        $TotalCons = $TotalCons + $ChequeBounceFeeDue-$PaymentChqBonFee;  //toatalling concession amount.
                        $TotalPaid = $TotalPaid + $PaymentChqBonFee;  //totalling fee head amounts
                       
                }
                
            if($PaymentReeAdmFee>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  "Ree Admission Fee",
                        "due_amount"                    =>  $PaymentReeAdmFee,
                        "concession"                    =>  0,
                        "paid"                          =>  $PaymentReeAdmFee);
                        $TotalDue = $TotalDue + $PaymentReeAdmFee;            //totaling due amount.
                        $TotalCons = $TotalCons + 0;  //toatalling concession amount.
                        $TotalPaid = $TotalPaid + $PaymentReeAdmFee;   //totalling fee head amounts
                       
                }
                
            if($ODFeeDue>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  "On Demand Fee",
                        "due_amount"                    =>  $ODFeeDue,
                        "concession"                    =>  $ODFeeDue-$PaymentODFee,
                        "paid"                          =>  $PaymentODFee);
                        $TotalDue = $TotalDue + $ODFeeDue;            //totaling due amount.
                        $TotalCons = $TotalCons + $PaymentODFee-$PaymentODFee;  //toatalling concession amount.
                        $TotalPaid = $TotalPaid + $PaymentODFee;   //totalling fee head amounts
                        
                }        

            if($PaymentDiscount>0)
                {
                    $data['fee_Details']['payment_details_fee_head_wise'][]   =   array(
                        "descriptiom"                   =>  "Discount",
                        "due_amount"                    =>  0,
                        "concession"                    =>  0,
                        "paid"                          =>  $PaymentDiscount*(-1));
                        $TotalDue = $TotalDue + $ODFeeDue;            //totaling due amount.
                        $TotalCons = 0;  //toatalling concession amount.
                        $TotalPaid = $TotalPaid - $PaymentDiscount;   //totalling fee head amounts
                }
                
            $data['fee_Details']['Totalling'][]   =   array( 
                "total_due_amt"                 =>  $TotalDue,
                "total_concession_amount"       =>  $TotalCons,
                "total_paid_amuont"             =>  $TotalPaid
            );
        
                
            /*
            $FeePaymentDetailsSql="select * from fee_payment_master whre recept_no=?";    

            
            $GetFeeDetailsSql="select fht.fee_head_name feename,sum(fee_amount) as due_amount,sum(concession_amount) as concession,sum(fee_amount)-sum(concession_amount) as paid_amount from student_fee_details sfd,fee_head_table fht,student_fee_master sfm where sfm.recept_no='121' and sfd.sfm_id=sfm.sfm_id and fht.fee_head_id=sfd.fee_head_id group by feename";
            $GetFeeDetailsPrep=$dbhandle->prepare($GetFeeDetailsSql);
            $GetFeeDetailsPrep->bind_param('is',$schoolid,$receptno);
            $result=$GetFeeDetailsPrep->execute();
            $result_set = $GetFeeDetailsPrep->get_result(); 

            while($row = $result_set->fetch_assoc())
                {
                    $data['fee_Details']['payment_receiving_details']   =   array([
                        "descriptiom"                   =>  $row["feename"],
                        "due_amount"                    =>  $row["due"],
                        "concession"                    =>  $row["concession_amount"],
                        "paid"                          =>  $row["paid_amount"]]);
                }

            // fee details array
           /* $data['fee_Details']= array(
                "fee_receipt_no"                =>  "12345/2020",
                "fee_receipt_for"               =>  "Apr-2020-Jul-2020",
                "student_name"                  =>  "Student Name",
                "admission_no"                  =>  "Admn No",
                "class"                         =>  "student class with section",
                "parent_name"                   => "student Parent Name",
                "contact_no"                    =>  "mobile no",
                "address"                       =>  "address",
                "route_name"                    => "bus route name",
                "stoppage"                      =>  "student drop place",
                "receipt_date"                  =>  "receipt date",
                "staff_name"                    =>  "rakesh sinha",
                "total_due_amt"                 =>  "21000",
                "total_concession_amount"       =>  "500",
                "total_paid_amuont"             =>  "20500"
            );



            $data['fee_Details']['payment_receiving_details']    =array(
                ["transaction_type"              =>  "Cash/Card/ert",
                "transaction_no"                =>  "1256899",
                "instrument_no"                 =>  "986989",
                "amount"                        =>  "amount received"],
               [ "transaction_type"              =>  "Cash",
                "transaction_no"                =>  "777777",
                "instrument_no"                 =>  "986989",
                "amount"                        =>  "amount received"]
            );
            $data['fee_Details']['payment_details_fee_head_wise'] = array([
                "descriptiom"                   =>  "Fee HEad name",
                "due_amount"                    =>  "5000",
                "concession"                    =>  "500",
                "paid"                          =>  "4500",
            ],
            [
                "descriptiom"                   =>  "Tution Fee",
                "due_amount"                    =>  "8000",
                "concession"                    =>  "0",
                "paid"                          =>  "8000",
            ],
            [
                "descriptiom"                   =>  "Tution Fee",
                "due_amount"                    =>  "8000",
                "concession"                    =>  "0",
                "paid"                          =>  "8000",
            ]);
            */
        }
        else
        {
            // if number of data is less than one
            $error =array(
                "status"        =>  "500",
                "type"          =>  "error",
                "message"       =>  "no recrod found"
            );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
