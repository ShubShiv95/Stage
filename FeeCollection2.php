<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';


$StudentId = $_REQUEST['student_id'];   //Student Id of the Student
$SchoolId = $_REQUEST['school_id'];     //School Id to which the student belongs.  Selected from Fee Collect UI.
$Session = $_REQUEST['session'];     //School Id to which the student belongs.  Selected from Fee Collect UI.

$AcType = $_REQUEST['ac_type'];         //Type of fee submited. SchoolBusFee, SchoolFee and BusFee.
$LateFee = $_REQUEST['late_fee'];       //Agreegate Amount of total late fee for the selected installment to be paid.
$ReAdmissionFee = $_REQUEST['readmission_fee']; //Re-admission fee if generated for the student id because of any process logic.
$DiscountAmt = $_REQUEST['discount_fee'];  //Discount Amount given to the student due to any process logic.
$ChequeBounceChg = $_REQUEST['cheque_bounce'];  //Aggregate amount of cheque bouncing charges if applicable.
$Services = $_REQUEST['services'];      //Aggregate amount of total Service charges for the payment mode selected.
$TotalPaidAmt = $_REQUEST['paid_amt'];  //Total amount given by the student/parent during fee deposit. This may include service charges if applicable.
$AmountBalance = $_REQUEST['amount_balance']; //The amount that can be taken as to restore as advance amount or to be returned back to the student/parent.
$DueAmt = $_REQUEST['due_amt'];         // The amount that is requested to pay by the system to the student including the aggregate amount and the installment selected.
$AdjustedAmt = $_REQUEST['excess_amt']; //Adjustable Amount.
$PaymentDate=date();    //payment date.    
$ReceptNo='';           //To store the recept number generated.

function generate_fee_recept($dbhandle,$Session,$SchoolId){
    $rno='';
    $CountRow_sql="select count(FP_Id) as receptno,date_format(now(),'%m%y') as dateformat from fee_payment_master where session='$Session' and school_id=$SchoolId";
    $result=$dbhandle->query($CountRow_sql);
    $row=$result->fetch_assoc();
    $count=$row["receptno"];
    $count++;
    $rno=$row["dateformat"] .  '/' . $count ;
    return $rno;

}

$ReceptNo = generate_fee_recept($dbhandle,$Session,$SchoolId);
echo $ReceptNo;


$total_fee_ids = count($_REQUEST['fee_amt']);
for ($j=0; $j < $total_fee_ids; $j++)
    { 
        $explode_data = explode(',',$_REQUEST['fee_amt'][$j]);
        $InstallmentAmt= $explode_data[0]; 
        $monthly_fee_amt = $explode_data[1];

    }
    
    
    $total_payment_datas = count($_REQUEST['payment_type']);
    for ($i=0; $i < $total_payment_datas; $i++) 
        {
            $payment_type = $_REQUEST['payment_type'][$i];

            ifisset($_REQUEST['instrument_no'][$i]) )
                {
                    $InstrumentNo = $_REQUEST['instrument_no'][$i];

                }
            if(isset( $_REQUEST['payment_date'][$i]))
                {
                    $PaymentDate = $_REQUEST['payment_date'][$i];

                }    
            if(isset($_REQUEST['bank_name'][$i]))
            {
                $BankName = $_REQUEST['bank_name'][$i];    
            }    

            $AmountReceive = $_REQUEST['amount_receiving'][$i];
            $AmountInclServiceChg = $_REQUEST['amt_incl_taxex'][$i];
            $TotalAmount = array_sum($_REQUEST['amt_incl_taxex']);
        }

?>