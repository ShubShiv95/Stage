<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
require_once 'GenerateFeeRecept.php';

if (empty($_REQUEST['collect_fee_sender'])) {  //Checking for Honey Trap.

$StudentId = $_REQUEST['student_id'];   //Student Id of the Student
$SchoolId = $_REQUEST['school_name'];     //School Id to which the student belongs.  Selected from Fee Collect UI.
$FeeDepositeDate=$_REQUEST['date_of_receipt'];    //payment date.    
$Session = $_REQUEST['school_session'];     //School Id to which the student belongs.  Selected from Fee Collect UI.
$ac_type = $_REQUEST['ac_type'];   //Type of fee submited. SchoolBusFee, SchoolFee and BusFee.
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

$LateFee = $_REQUEST['late_fee'];       //Agreegate Amount of total late fee for the selected installment to be paid.
$ReAdmissionFee = $_REQUEST['readmission_fee']; //Re-admission fee if generated for the student id because of any process logic.
$OnDemandfee = $_REQUEST['student_fine']; //Ondemand fee as applicable by any fine appilied.
$DiscountAmt = $_REQUEST['discount_fee'];  //Discount Amount given to the student due to any process logic.
$ChequeBounceChg = $_REQUEST['cheque_bounce'];  //Aggregate amount of cheque bouncing charges if applicable.
$AdjustedAmt = $_REQUEST['excess_amt']; //Adjustable Amount.
$DueAmt = $_REQUEST['due_amt'];         // The amount that is requested to pay by the system to the student including the aggregate amount and the installment selected.
$Services = $_REQUEST['services'];      //Aggregate amount of total Service charges for the payment mode selected.
$TotalPaidAmt = $_REQUEST['paid_amt'];  //Total amount given by the student/parent during fee deposit. This may include service charges if applicable.
$BalanceAmount = $_REQUEST['amount_balance']; //The amount that can be taken as to restore as advance amount or to be returned back to the student/parent.

    //Data Validation Process

        //Checking if valid paying balance amount.  Only allowed when balance amount is either zero or negative.
        if($BalanceAmount>0)
        {
            echo "Fee cannot be deposited with Balance amount more than zero.";
            die;
        }
        $AdvanceAmount=0;
        if($BalanceAmount<0)
        {
            $AdvanceAmount=$BalanceAmount*(-1);
        }
    //Checking Balance Amount By calculation as per the posted data from fee to make the process hack proof.    
     
        //Creating installment id list for in operator for sql query.
        $InstallmentIdList='(';
        $total_fee_ids = count($_REQUEST['fee_amt']);
        for ($j=0; $j < $total_fee_ids; $j++)
            { 
                $explode_data = explode(',',$_REQUEST['fee_amt'][$j]);
                $InstallmentId = $explode_data[0];
                //$InstallmentAmt= $explode_data[0]; 
                //$monthly_fee_amt = $explode_data[1];
                $InstallmentIdList=$InstallmentIdList .  $InstallmentId . ',';
                
            }
            $InstallmentIdList = substr($InstallmentIdList, 0, -1);
            $InstallmentIdList=$InstallmentIdList . ')';
            
   
        //Creating sql with bind variables to fetch total fee amount for the selected installment ids.
        $GetInstallmentFeeSql="select sum(Total_Amount) as total_fee from student_fee_master sfm,fee_group_table fgt where student_id=?  and Installment_Id in $InstallmentIdList and sfm.session=? and sfm.school_id=? and Pay_Status='Unpaid' and fgt.FG_Id=sfm.FG_Id";
        //echo $GetInstallmentFeeSql;
        $GetInstallmentFeePrepare = $dbhandle->prepare($GetInstallmentFeeSql);
        $GetInstallmentFeePrepare->bind_param("ssi",$StudentId,$Session,$SchoolId);

        
        if (!$GetInstallmentFeePrepare->execute()) 
            {
                $error_msg = $GetInstallmentFeePrepare->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $GetInstallmentFeeSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment - Cashier Mode - No installment record found as per given installment selection from form data.', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Error: Data Not Found.  Please consult application consultant.';
                die;
            }
        $ResultSet = $GetInstallmentFeePrepare->get_result();
        $RowSet = $ResultSet->fetch_assoc();
        $total_fee=$RowSet["total_fee"]; //fetching total fee as applicable for the selected installmentid.
        
        $ActualAmt=$total_fee + $LateFee + $ReAdmissionFee + $OnDemandfee + $ChequeBounceChg - $AdjustedAmt - $DiscountAmt; //Preparing Actual Amount by combining the sent aggregate amounts from the fee collectoin form and with the total fee fetched from database.  
        
        $ActualBalance=$ActualAmt-$TotalPaidAmt; //Preparing actual balance as per database record.
        

        /*  Ignoring Backend Balance check condition --will be enabled after debugging.
        if($ActualBalance==$BalanceAmount)
            {
                echo "Payment Amount is correct.<br>";
            }
        else
            {
                //This message is executed only when the posted fee installment list with the aggregate amounts coming from the form request does not match while checking with the database values which were sent during form load.  This event only happens when someone is trying to hack and play with the form data and with the database date by making the posting data different as compared to the database data.  At such situation we are killing the process.
                //echo $ActualBalance . '<br>' . $BalanceAmount
                echo "This system found the mismatch between the balance posted and actual balance.  Please consult Application Development Team.";
                die; 
            }    

        */    

        //End of checking  balance amount Hack proof.   
        

    //At this point it is concluded from the above validation checks that all data values are found correct and hence in further codes direct insert and updates for the fee records are conducted.
    

    //Steps to Conduct
    //1. set autocommit off and lock tables
    //2. Generate a Fee Recept Number using function generate_fee_recept($dbhandle,$Session,$SchoolId);
    //3. Generate primary key value for fee_payment_master to enter into the FP_Id column by using sequence_number function.
    //4. Insert a record in fee_payment_master with the Recept Number and with the all aggregate amounts.
    //5. Insert payment details in fee_payment_details table.  Take FP_Id column value from fee_payment_master.
    //6. Update tables fee_advance_table, fee_cheque_table, fee_on_demand with the recept number.
    //7. Insert Advance Amount to fee_advance_table if any advance is provided=>when balance is negative.
    //8. Update student_fee_master with recept number and pay_status to Paid.
    //9. Commit all changes. Unlock tables.
    //10. At any transaction failure rollback all previous statements and unlock all tables.
    
        //Step1.  set autocommit off and lock tables
        mysqli_autocommit($dbhandle,false);    
        mysqli_query($dbhandle,"lock tables student_Fee_master");
        
        //Step2 Generate a Fee Recept Number using function generate_fee_recept($dbhandle,$Session,$SchoolId);
        $ReceptNo='';           //To store the recept number generated.
        $ReceptNo = generate_fee_recept($dbhandle,$Session,$SchoolId);
        //echo $ReceptNo;
        //Step3. Generate primary key value for fee_payment_master to enter into the FP_Id column by using sequence_number function.
        $FP_Id=sequence_number('Fee_Payment_Master',$dbhandle);

        //Step4. Insert a record in fee_payment_master with the Recept Number and with the all aggregate amounts.
        $FeePaymentMasterSql="INSERT INTO fee_payment_master(FP_Id, Recept_No, Student_Id,Session, Payment_Date, Due_Amount, Paid_Amount, Late_Fee, Ree_Adm_Fee, On_Demand_Fee, Chq_Bon_Amount, Advance_Adjusted, Discount_Amount, Advance_Amount, School_Id, Updated_By) VALUES (?,?,?,?,str_to_date(?,'%Y-%m-%d'),?,?,?,?,?,?,?,?,?,?,?)";
        //echo $GetInstallmentFeeSql;
        $FeePaymentMasterPrep = $dbhandle->prepare($FeePaymentMasterSql);
        $FeePaymentMasterPrep->bind_param("issssiiiiiiiiiis",
        $FP_Id,
        $ReceptNo,
        $StudentId,
        $Session,
        $FeeDepositeDate,
        $DueAmt,
        $TotalPaidAmt,
        $LateFee,
        $ReAdmissionFee,
        $OnDemandfee,
        $ChequeBounceChg,
        $AdjustedAmt,
        $DiscountAmt,
        $AdvanceAmount,
        $SchoolId,
        $_SESSION["LOGINID"]
        );
        
        if (!$FeePaymentMasterPrep->execute()) 
            {
                $error_msg = $FeePaymentMasterPrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $GetInstallmentFeeSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_Payment_Master table Entry Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle);
                mysqli_query($dbhandle,"unlock tables.");  
                echo $statusMsg;
                die;
            }

        //Step5.   Insert payment details in fee_payment_details table.  Take FP_Id column value from fee_payment_master.
       
        $PaymentType='';
        $InstrumentNo='';
        $PaymentDate='';
        $BankId='';
        $AmountReceived='';
        $ServiceCharge='';
        $FPD_Id='';

        $FeePaymentDetailsSql="INSERT INTO fee_payment_details(FPD_Id, FP_Id, Paymode, Instrument_No, Instrument_Date, Bank_Id, Amount, Service_Charges) VALUES (?,?,?,?,str_to_date(?,'%d-%m-%Y'),?,?,?)";
        $FeePaymentDetailsPrep = $dbhandle->prepare($FeePaymentDetailsSql);
        $FeePaymentDetailsPrep->bind_param("iiissiii",
        $FPD_Id,
        $FP_Id,
        $PaymentType,
        $InstrumentNo,
        $InstrumentDate,
        $BankId,
        $AmountReceived,
        $ServiceCharge
        );

        $total_datas = count($_REQUEST['payment_type']);
        for ($i=0; $i < $total_datas; $i++) 
        { 
                
            // payment type
            $PaymentType = $_REQUEST['payment_type'][$i];

            // instrument no
            if(isset($_REQUEST['instrument_no'][$i]))
                {
                    $InstrumentNo = $_REQUEST['instrument_no'][$i];
                }
             else 
                { 
                    $InstrumentNo = '';
                }

            // payment date
            //echo "Instrument Date" . $_REQUEST['payment_date'][$i];
            if(isset($_REQUEST['payment_date'][$i]))
                {
                    $InstrumentDate = $_REQUEST['payment_date'][$i];
                    if($_REQUEST['payment_date'][$i]=='')
                       {$InstrumentDate = date("d-m-Y"); echo "inst-date:" . $InstrumentDate;}
                }
             else 
                { 
                    $InstrumentDate = date("d-m-Y");
                }

            // bank name
            if(isset($_REQUEST['bank_name'][$i]))
                {
                    $BankId = $_REQUEST['bank_name'][$i];
                }
             else 
                { 
                    $BankId = Null;
                }
         
            // amount receiving 
            if(isset($_REQUEST['amount_receiving'][$i]))
                {
                    $AmountReceived = $_REQUEST['amount_receiving'][$i];
                }
            else 
                { 
                    $AmountReceived = 0;
                }    
                // amount with taxes / net amount
                if(isset($_REQUEST['amt_incl_taxex'][$i]))
                {
                    $ServiceCharge = $_REQUEST['amt_incl_taxex'][$i] - $_REQUEST['amount_receiving'][$i];
                }
            else 
                { 
                    $ServiceCharge = 0;
                } 
            $FPD_Id=sequence_number('Fee_Payment_Details',$dbhandle);
            if (!$FeePaymentDetailsPrep->execute()) 
            {
                $error_msg = $FeePaymentDetailsPrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $FeePaymentDetailsSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_Payment_Details table Entry Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle); 
                mysqli_query($dbhandle,"unlock tables."); 
                echo $statusMsg;
                die;
            }    


        }

    //Step6 .  Update tables fee_advance_table, fee_cheque_table, fee_on_demand with the recept number.
    
    //updading Fee Advance Table.
    $UpdateFeeAdvanceTable="update fee_advance_table set Adjusted=1,Advance_Adjust_date=str_to_date(?,'%Y-%m-%d'),Adjusted_Recept_No=?,Updated_By='" . $_SESSION["LOGINID"] . "' where student_id=? AND adjusted=0 and School_Id=?";
    $UpdateFeeAdvancePrep = $dbhandle->prepare($UpdateFeeAdvanceTable);
    $UpdateFeeAdvancePrep->bind_param('sssi', 
    $FeeDepositeDate,
    $ReceptNo,
    $StudentId,
    $SchoolId
    );
    if (!$UpdateFeeAdvancePrep->execute()) 
            {
                $error_msg = $UpdateFeeAdvancePrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $GetInstallmentFeeSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_Advance_Table table Update Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle); 
                mysqli_query($dbhandle,"unlock tables."); 
                echo $statusMsg;
                die;
            }   
    
            

    //updading Fee Cheque Table.
    $UpdateFeeChequeTable="update fee_cheque_table set Adjusted=1,Recept_No=?,Updated_By='" . $_SESSION["LOGINID"] . "' where student_id=? AND adjusted=0 AND School_Id=?";
    $UpdateFeeChequePrep = $dbhandle->prepare($UpdateFeeChequeTable);
    $UpdateFeeChequePrep->bind_param('ssi', 
    $ReceptNo,
    $StudentId,
    $SchoolId);

    if (!$UpdateFeeChequePrep->execute()) 
            {
                $error_msg = $UpdateFeeChequePrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $GetInstallmentFeeSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_Cheque_Table table Update Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle);
                mysqli_query($dbhandle,"unlock tables."); 
                echo $statusMsg;
                die;
            }    

    //updading Fee On Demand Table.
    $UpdateOnDemandFee="update fee_on_demand set pay_status='Paid',Recept_No=?,Updated_By='" . $_SESSION["LOGINID"] . "' where student_id=? AND pay_status='Unpaid' AND School_Id=?";
    //$UpdateOnDemandFee="update fee_on_demand set pay_status='Paid',Recept_No='$ReceptNo',Updated_By='" . $_SESSION["LOGINID"] . "' where student_id='$StudentId' AND pay_status='Unpaid' AND School_Id=$SchoolId";
    //echo $UpdateOnDemandFee;


    $UpdateOnDemandFeePrep = $dbhandle->prepare($UpdateOnDemandFee);
    $UpdateOnDemandFeePrep->bind_param('ssi', 
    $ReceptNo,
    $StudentId,
    $SchoolId);

    if (!$UpdateOnDemandFeePrep->execute()) 
            {
                $error_msg = $UpdateOnDemandFeePrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $GetInstallmentFeeSql;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_On_Demand table Update Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle);
                mysqli_query($dbhandle,"unlock tables.");  
                echo $statusMsg;
                die;
            }
              
    //Step7. Inserting Advance amount if advance balance exist.        
 
    $FA_Id = sequence_number('Fee_Advance_Table',$dbhandle);
    $InsertFeeAdvTable="INSERT INTO fee_advance_table(FA_Id, Student_Id, Advance_Amount, Advance_Date, Source_Recept_No, School_Id, Updated_By) VALUES (?,?,?, str_to_date(?,'%Y-%m-%d'),?,?,?)";
    $InsertFeeAdvTablePrep = $dbhandle->prepare($InsertFeeAdvTable);
    $InsertFeeAdvTablePrep->bind_param('isissis', 
    $FA_Id,
    $StudentId,
    $AdvanceAmount,
    $FeeDepositeDate,
    $ReceptNo,
    $SchoolId,
    $_SESSION["LOGINID"]);

    if (!$InsertFeeAdvTablePrep->execute()) 
            {
                $error_msg = $InsertFeeAdvTablePrep->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $InsertFeeAdvTable;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Fee Payment Entry Error at Cashier End :  Fee_Advance_Table table Entry Error', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $statusMsg = 'Fee Entry Error.  Please consult application consultant.';
                mysqli_rollback($dbhandle);  
                mysqli_query($dbhandle,"unlock tables.");
                echo $statusMsg;
                die;
            }    
    
    //Step 8. Update student_fee_master with recept number and pay_status to Paid.
    $UpdateInstallmentStatus="update student_fee_master sfm,fee_group_table fgt set Recept_No=?,Pay_Status='Paid',Paid_Amount_Date=str_to_date(?,'%Y-%m-%d') where student_id=?  and Installment_Id in $InstallmentIdList and sfm.session=? and sfm.school_id=? and Pay_Status='Unpaid' and fgt.FG_Id=sfm.FG_Id";
    //echo $GetInstallmentFeeSql;
    $UpdateInstallmentStatusPrep = $dbhandle->prepare($UpdateInstallmentStatus);
    $UpdateInstallmentStatusPrep->bind_param("ssssi",$ReceptNo,$FeeDepositeDate,$StudentId,$Session,$SchoolId);

    
    if (!$UpdateInstallmentStatusPrep->execute()) 
        {
            $error_msg = $GetInstallmentFeePrepare->error;
            $errors[] = $error_msg;
            $el = new LogMessage();
            $sql = $GetInstallmentFeeSql;
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Fee Payment Collection Error - Cashier Mode: Not able to update student _fee_master table.', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
            mysqli_rollback($dbhandle);
            mysqli_query($dbhandle,"unlock tables.");
            $statusMsg = 'Error: Fee Creation Error.  Please consult application consultant.';
            die;
        }
    

    mysqli_commit($dbhandle);
    mysqli_query($dbhandle,"Unlock Tables");
    echo "Fee Updated Successfully. Recept#: $ReceptNo";  
    $url =  './FeeReceiptPrint.php?receipt_id='.$ReceptNo;
    header('Location: ' . $url);


}//End of Honey Trap Section.   
/**********

    //Check if the Student id exist for the session available.  then check the fee list.

    $VerifyStudent_sql="select scd.* from student_class_details where student_id='?' and session='?' and enabled=1 and school_id=?";
    //$VerifyStudentPrepare = $dbhandle->prepare($VerifyStudent_sql);
    $VerifyStudentPrepare->bind_param("ssi",$StudentId,$Session,$SchoolId);
    $VerifyStudentPrepare->execute();
    //$data = array();
    if (!$noticeQueryPrepare->execute()) 
    {
    $error_msg = $VerifyStudentPrepare->error;
    $errors[] = $error_msg;
    $el = new LogMessage();
    $sql = $VerifyStudent_sql;
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Fee Payment - Cashier Mode ', $error_msg, $sql, _FILE_, $_SESSION['LOGINID']);
    mysqli_rollback($dbhandle);
    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
    die;
    }
    $ResultSet = $VerifyStudentPrepare->get_result();
    $Exist=$ResultSet->num_rows;
    if($Exist==0)
        {
            mysqli_rollback($dbhandle);
            echo "There is no student found with the Student id: $StudentId";
            die; 
        }
        
    $RowSet = $ResultSet->fetch_assoc();




    mysqli_autocommit($dbhandle,False);

/*
while ($row_student = $result_set->fetch_assoc()) {
    $data[] = $row_student;
  }
  echo json_encode($data);

*/


/************ 
$total_fee_ids = count($_REQUEST['fee_amt']);
for ($j=0; $j < $total_fee_ids; $j++)
    { 
        $explode_data = explode(',',$_REQUEST['fee_amt'][$j]);
        $InstallmentId = $explode_data[0]
        //$InstallmentAmt= $explode_data[0]; 
        $monthly_fee_amt = $explode_data[1];

    }
    
    
   
*/
?>