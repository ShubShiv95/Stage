
<?php
    session_start();
    include 'dbobj.php';
    //include 'security.php';
    include 'errorLog.php';
    //include 'generate_sequence.php';

    // Turn on all error reporting
    // Report all PHP errors (see changelog)
    error_reporting(E_ALL);
    //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
    ini_set('display_errors', 1);
    
    //starts here
    $lid=$_SESSION["LOGINID"];
    $schoolId=$_SESSION["SCHOOLID"];
    $session = $_SESSION["SESSION"];
    $FromDate=$_REQUEST["fdate"];
    $ToDate=$_REQUEST["tdate"];
   
    


    //$dcrd = $_REQUEST["dcrd"];
    $headlist=array();
    $Total_Collection_Amount=0;
    $Total_Feehead_Amount=array();
    $Total_Discount_Amount=array();
    $Total_Late_Fee_Amount=0;
    $Total_ReeAdmFee_Amount=0;
    $Total_ODFee_Amount=0;
    $Total_ChqBon_Amount=0;
    $Total_Advance_Amount=0;
    $Total_Discount_Amount=0;
 
    $feeheadList=array();
    $FeeHeadListSql="select fee_Print_Lable, fee_head_id from fee_head_table where enabled=1 and school_id=? order by fee_head_id";
    $FeeHeadListPrep=$dbhandle->prepare($FeeHeadListSql);
    $FeeHeadListPrep->bind_param("i", $schoolId); 
    $FeeHeadListPrepResult=$FeeHeadListPrep->execute(); 
    if(!$FeeHeadListPrepResult)
        {
            //errorlog
            null;
        }
    $FeeHeadListResultset = $FeeHeadListPrep->get_result();

    $htmlStr='<table border="1" style="text-align: center;"><tr><td>Receipt No.</td><td>Student Id</td><td>Disc. Cat.</td>';

    while($row = $FeeHeadListResultset->fetch_assoc()) //Preaparing array of Fee_head_id and printing table header containing fee head names.
        {
            //array_push($headlist,$row["fee_head_name"]);
            array_push($feeheadList,$row["fee_head_id"]); //populating feeheadlist array with feehead id.
            $htmlStr=$htmlStr . '<td>' . $row["fee_Print_Lable"].'</td>';
            //$data[][$row["fh_id"]]= le"].'</td>';
        }
     
    $htmlStr=$htmlStr . '<td>Late Fee</td>'. '<td>ReAdm Fee</td>'. '<td>OD Fee</td>'. '<td>Chq-Bon</td><td>Adv. Amt</td><td>Net Disc.</td><td>Total Amt</td>';
    $htmlStr=$htmlStr . '</tr>';

    //$ReceiptListSql='';
    $feeheadamount=array();
    $ReceiptListSql="select distinct recept_no from student_fee_master where pay_status='Paid' and paid_amount_date between str_to_date('$FromDate','%d-%m-%Y') and str_to_date('$ToDate','%d-%m-%Y')";
   
    $ReceiptListResult=$dbhandle->query($ReceiptListSql);
    //Query for inner head wise amount data fetching for the receipt number from student_fee_details table.
    $ReceiptDetailsSql="select fee_head_id,sum(fee_amount) amount,sum(concession_amount) as con_amount from student_fee_details where sfm_id in(select sfm_id from student_fee_master where recept_no=?) group by fee_head_id order by fee_head_id";
    //Query for agreegate head's amount fetching for the receipt number from fee_master_table.
    $FeePaymentMasterSql="select * from fee_payment_master where recept_no=?";
    
  

    while($row=$ReceiptListResult->fetch_assoc())
        {
            
            //echo $ReceiptDetailsSql."<BR>";
            $Receipt_Dtl_Prep = $dbhandle->prepare($ReceiptDetailsSql);
            $Receipt_Dtl_Prep->bind_param("s", $row["recept_no"]);
            $Receipt_Dtl_Prep->execute();
            $Receipt_Dtl_ResultSet = $Receipt_Dtl_Prep->get_result();
            
            
                $GetConcNameSql="select sfm.student_id,concession_name from concession_master_table cmt,student_Fee_master sfm,student_class_details scd where sfm.recept_no=? and scd.student_id=sfm.student_id and cmt.concession_id=scd.concession_id";
                $GetConcNamePrep = $dbhandle->prepare($GetConcNameSql);
                $GetConcNamePrep->bind_param("s", $row["recept_no"]);
                $GetConcNamePrep->execute();
                $GetConcNameResultSet = $GetConcNamePrep->get_result();
                $GetConcNameRow=$GetConcNameResultSet->fetch_assoc();

            $htmlStr=$htmlStr . '<tr><td>' . $row["recept_no"] . "</td><td>" . $GetConcNameRow["student_id"] . "</td><td>" . $GetConcNameRow["concession_name"]  . "</td>";
            $count=0;
            $NetDiscount=0;
            while($Receipt_Dtl_Row = $Receipt_Dtl_ResultSet->fetch_assoc())
                {
                    $feeheadamount[$Receipt_Dtl_Row["fee_head_id"]]=$Receipt_Dtl_Row["amount"];
                    $NetDiscount=$NetDiscount+$Receipt_Dtl_Row["con_amount"];

                    $Total_Feehead_Amount[$Receipt_Dtl_Row["fee_head_id"]]=isset($Total_Feehead_Amount[$Receipt_Dtl_Row["fee_head_id"]]) ? $Total_Feehead_Amount[$Receipt_Dtl_Row["fee_head_id"]]+ $Receipt_Dtl_Row["amount"] : $Receipt_Dtl_Row["amount"];
                    //$htmlStr=$htmlStr . '<td>' . $Receipt_Dtl_Row["amount"]. "</td>";
                }
             //print_r($feeheadamount);   

            /***Printing the Fee Head Amount Serially as per the feeheadlist array created. */
                foreach($feeheadList as $value)
                    {
                        //echo (array_key_exists($value,$feeheadamount) ? "not found " : " found");
                        $htmlStr=$htmlStr . '<td>' .  (array_key_exists($value,$feeheadamount) ? $feeheadamount[$value] : 0) . "</td>";
                    }
                    
                    $Fee_Pmt_Mst_Prep = $dbhandle->prepare($FeePaymentMasterSql);
                    $Fee_Pmt_Mst_Prep->bind_param("s", $row["recept_no"]);
                    $Fee_Pmt_Mst_Prep->execute();
                    $Fee_Pmt_Mst_ResultSet = $Fee_Pmt_Mst_Prep->get_result(); 
                    $Fee_Pmt_Mst_Row=$Fee_Pmt_Mst_ResultSet->fetch_assoc();
                    $NetDiscount=$NetDiscount+$Fee_Pmt_Mst_Row["Discount_Amount"];
                    $htmlStr=$htmlStr . '<td>' . $Fee_Pmt_Mst_Row["Late_Fee"] . '</td><td>' . $Fee_Pmt_Mst_Row["Ree_Adm_Fee"] . '</td><td>' . $Fee_Pmt_Mst_Row["On_Demand_Fee"] . '</td><td>' . $Fee_Pmt_Mst_Row["Chq_Bon_Amount"] . '</td><td>' . $Fee_Pmt_Mst_Row["Advance_Amount"] . '</td><td>' . $Fee_Pmt_Mst_Row["Discount_Amount"] . '</td><td>' . $Fee_Pmt_Mst_Row["Paid_Amount"] . '</td>';

                    
                    $Total_Late_Fee_Amount+= $Fee_Pmt_Mst_Row["Late_Fee"];
                    $Total_ReeAdmFee_Amount+= $Fee_Pmt_Mst_Row["Ree_Adm_Fee"];
                    $Total_ODFee_Amount+= $Fee_Pmt_Mst_Row["On_Demand_Fee"];
                    $Total_ChqBon_Amount+= $Fee_Pmt_Mst_Row["Chq_Bon_Amount"];
                    $Total_Advance_Amount+= $Fee_Pmt_Mst_Row["Advance_Amount"];
                    $Total_Discount_Amount+= $NetDiscount;
                    $Total_Collection_Amount+= $Fee_Pmt_Mst_Row["Paid_Amount"];
            $htmlStr=$htmlStr . '</tr>';
        }
        
        $htmlStr=$htmlStr . "<tr><td></td><td></td><td></td>";
        foreach($feeheadList as $value)
        {
            //echo (array_key_exists($value,$feeheadamount) ? "not found " : " found");
            $htmlStr=$htmlStr . '<td>' .  (array_key_exists($value,$Total_Feehead_Amount) ? $Total_Feehead_Amount[$value] : 0) . "</td>";
        }
        $htmlStr=$htmlStr . '<td>' . $Total_Late_Fee_Amount . '</td><td>' . $Total_ReeAdmFee_Amount . '</td><td>' . $Total_ODFee_Amount . '</td><td>' . $Total_ChqBon_Amount . '</td><td>' . $Total_Advance_Amount . '</td><td>' . $Total_Discount_Amount . '</td><td>' . $Total_Collection_Amount . '</td></tr>';
       
        

    //Payment Mode Details     

    $PaymentModeListSql="select distinct paymode_name as paymode_name,sum(fpd.amount) as paid_amount from fee_payment_master fpm,fee_payment_details fpd,paymode_master_table pmt where fpm.recept_no in (select distinct recept_no from student_fee_master where pay_status='Paid' and paid_amount_date between str_to_date('$FromDate','%d-%m-%Y') and str_to_date('$ToDate','%d-%m-%Y')) and pmt.paymode_id=fpd.paymode and fpd.fp_id=fpm.fp_id";
    $PaymentModeListResult=$dbhandle->query($PaymentModeListSql);
    
    /*
    foreach($headlist as $value)
        {
            $htmlStr=$htmlbody . '<td>' . $value.'</td>';
        }*/
    $htmlStr=$htmlStr . '</table>';
    echo "<h3>Fee Collection Report from $FromDate to $ToDate.";
    echo $htmlStr ;
    
    $PML_Html='<br>Paymode Details<br><table border="1">' . '<tr><td>Paymode Type</td><td>Collected Amount</td></tr>';
    while($PMLRow=$PaymentModeListResult->fetch_assoc())
        {
            $PML_Html=$PML_Html . "<tr><td>" . $PMLRow["paymode_name"] . "</td><td>" . $PMLRow["paid_amount"] . "</td></tr>";
        }
    $PML_Html=$PML_Html . "</table>";
    echo $PML_Html;    
    //var_dump($feeheadList);    

//}
?>
