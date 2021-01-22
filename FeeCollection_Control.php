<?php
/*************** submitting fee collection form data to database ***************/
if (isset($_REQUEST['collect_fee_sender'])) {
    if (empty($_REQUEST['collect_fee_sender'])) {

        // student id
       echo "Student Id ".$student_id = $_REQUEST['student_id'].'<br>';

        // school name
       echo "school name ".$school_name = $_REQUEST['school_name'].'<br>';

      // payment date
       echo "Payment Date".$date_of_receipt=$_REQUEST['date_of_receipt'].'<br>';

      // student session
       echo "Session".$school_session=$_REQUEST['school_session'].'<br>';

      // account type
      echo  "account type ".$ac_type = $_REQUEST['ac_type'].'<br>';

        // late fee total
      echo  "late fee total ".$late_fee = $_REQUEST['late_fee'].'<br>';

        // readmission fee
      echo  "readmission fee ".$readmission_fee = $_REQUEST['readmission_fee'].'<br>';
        
        // Ondemand fee
      echo  "Ondemand fee ".$readmission_fee = $_REQUEST['student_fine'].'<br>';

        // dicount amount
      echo  "dicount amoun ".$discount_amt = $_REQUEST['discount_fee'].'<br>';

        // cheque bounce
       echo "cheque bounce ".$cheque_bounce = $_REQUEST['cheque_bounce'].'<br>';

        // excess amount
      echo  "excess amount ".$excess_amt = $_REQUEST['excess_amt'].'<br>';

        // total due amount
       echo "total due amount ".$due_amt = $_REQUEST['due_amt'].'<br>';

        // services
       echo "services ".$services = $_REQUEST['services'].'<br>';

        // total paid amount
       echo "total paid amount ".$total_paid_amt = $_REQUEST['paid_amt'].'<br>';

        // amount balance (current amount as he is paying fee)
       echo "amount due / balance ".$amount_balance = $_REQUEST['amount_balance'].'<br>';

        // installment name and amount
        $total_fee_ids = count($_REQUEST['fee_amt']);
        for ($j=0; $j < $total_fee_ids; $j++) { 
            $explode_data = explode(',',$_REQUEST['fee_amt'][$j]);

            // installment Id
          echo  "installment id ".$feehead_id = $explode_data[0].'<br>';

            // fee amount (installment)
           echo "fee amount (due) ".$monthly_fee_amt = $explode_data[1].'<br>';

        }

        // payment details
        echo "payment_type " . count($_REQUEST['payment_type']) . '<br>';
        $total_datas = count($_REQUEST['payment_type']);
        for ($i=0; $i < $total_datas; $i++) 
        { 
            // payment type
            echo '<br>value of I = ' . $i.'<br>';
         echo   'Payment Type:' . $payment_type = $_REQUEST['payment_type'][$i].'<br>';

         // instrument no
          echo  (isset($_REQUEST['instrument_no'][$i]) ? 'Instrument No.: ' . $_REQUEST['instrument_no'][$i] : 'Instrument No.: NA') .'<br>';

            // payment data
         //echo   $payment_date = $_REQUEST['payment_date'][$i].'<br>';
         echo  (isset( $_REQUEST['payment_date'][$i]) ? 'Payment Date: ' . $_REQUEST['payment_date'][$i] : 'payment date: NA') .'<br>';
            // bank name
          //echo  $bank_name = $_REQUEST['bank_name'][$i].'<br>';
          echo  (isset($_REQUEST['bank_name'][$i]) ? 'Bank Name: ' .  $_REQUEST['bank_name'][$i] : 'Bank Name :NA') .'<br>';
            // amount receiving
          echo  "amount receiving ".$amount_receiving = $_REQUEST['amount_receiving'][$i].'<br>';

            // amount with taxes / net amount
          echo  $amt_incl_taxex = $_REQUEST['amt_incl_taxex'][$i].'<br><hr>';

        }
        echo 'Total amount paid='. array_sum($_REQUEST['amt_incl_taxex']);

    }
}
