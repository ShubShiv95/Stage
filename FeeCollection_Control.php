<?php
/*************** submitting fee collection form data to database ***************/
if (isset($_REQUEST['collect_fee_sender'])) {
    if (empty($_REQUEST['collect_fee_sender'])) {

        // student id
       echo $student_id = $_REQUEST['student_id'].'<br>';

        // school name
       echo $school_name = $_REQUEST['school_name'].'<br>';

        // account type
      echo  $ac_type = $_REQUEST['ac_type'].'<br>';

        // late fee total
      echo  $late_fee = $_REQUEST['late_fee'].'<br>';

        // readmission fee
      echo  $readmission_fee = $_REQUEST['readmission_fee'].'<br>';

        // dicount amount
      echo  $discount_amt = $_REQUEST['discount_fee'].'<br>';

        // cheque bounce
       echo $cheque_bounce = $_REQUEST['cheque_bounce'].'<br>';

        // excess amount
      echo  $excess_amt = $_REQUEST['excess_amt'].'<br>';

        // due amount
       echo $due_amt = $_REQUEST['due_amt'].'<br>';

        // services
       echo $services = $_REQUEST['services'].'<br>';

        // total paid amount
       echo $total_paid_amt = $_REQUEST['paid_amt'].'<br>';

        // amount due / balance (current amount as he is paying fee)
       echo $amount_balance = $_REQUEST['amount_balance'].'<br>';

        // installment name and amount
        $total_fee_ids = count($_REQUEST['fee_amt']);
        for ($j=0; $j < $total_fee_ids; $j++) { 
            $explode_data = explode(',',$_REQUEST['fee_amt'][$j]);

            // fee head id
          echo  $feehead_id = $explode_data[0].'<br>';

            // fee amount (due)
           echo $monthly_fee_amt = $explode_data[1].'<br>';

        }

        // payment details
        $total_datas = count($_REQUEST['payment_type']);
        for ($i=0; $i < $total_datas; $i++) 
        { 
            // payment type
         echo   $payment_type = $_REQUEST['payment_type'][$i].'<br>';

            // instrument no
          echo  $instrument_no = $_REQUEST['instrument_no'][$i].'<br>';

            // payment data
         echo   $payment_date = $_REQUEST['payment_date'][$i].'<br>';

            // bank name
          echo  $bank_name = $_REQUEST['bank_name'][$i].'<br>';

            // amoount receiving
          echo  $amount_receiving = $_REQUEST['amount_receiving'][$i].'<br>';

            // amount with taxes / net amount
          echo  $amt_incl_taxex = $_REQUEST['amt_incl_taxex'][$i].'<br>';

        }

    }
}
?>