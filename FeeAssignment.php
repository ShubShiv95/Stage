<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
require_once './GlobalModel.php';
/********** get cluster fee details **********/
    $FGId=2;
    $session='2020-2021';
    $data = '';
    $data .= '<table class="table" border="1"><thead><tr><th>Fee Head</th><th>Inst. Type</th>';
    $months_data = get_all_months($dbhandle);
    foreach ($months_data as $months) {
       $data.= '<th>'.$months['Installment_Name'].'</th>';
    }
    $data .= '<th class="text-right">Total Amt</th></tr></thead><tbody>';
    $query = "SELECT  fst.*  FROM fee_structure_table fst WHERE fst.FG_Id = ? AND fst.Session = ? AND fst.School_Id = ? AND fst.Enabled = 1 AND fst.Installment_Id=? AND fst.Fee_Head_Id=?";
    $query_prep = $dbhandle->prepare($query);
    //var_dump($query_prep);
    //$query_fee_head = "SELECT DISTINCT fht.*, fst.Fee_Installment_Type FROM fee_head_table fht, fee_structure_table fst WHERE fht.Fee_Type='Regular' AND fst.Fee_Head_Id = fht.Fee_Head_Id AND fst.Session = ? AND fst.School_Id = ? AND fst.FG_Id = ?";
    $query_fee_head = "SELECT DISTINCT fht.*, fst.Fee_Installment_Type FROM fee_head_table fht, fee_structure_table fst WHERE fst.Fee_Head_Id = fht.Fee_Head_Id AND fst.Session = ? AND fst.School_Id = ? AND fst.FG_Id = ?";
    $query_fee_head_prep = $dbhandle->prepare($query_fee_head);
    $query_fee_head_prep->bind_param("sii",$session,$_SESSION["SCHOOLID"],$FGId);
    $query_fee_head_prep->execute();
    $result_set_head = $query_fee_head_prep->get_result();
    // total amount of months by fee head id
    $query_ttl_monthc = "SELECT SUM(`Fee_Amount`) as total_amt FROM fee_structure_table WHERE FG_Id =? AND Session=? AND Fee_Head_Id = ?";
    $query_ttl_month_prep = $dbhandle->prepare($query_ttl_monthc);

    // sum of column according months
    $query_ttl_month = "SELECT SUM(`Fee_Amount`) as total_amt_month FROM fee_structure_table WHERE FG_Id =? AND Session=? AND Installment_Id = ?";
    $query_ttl_monthw_prep = $dbhandle->prepare($query_ttl_month);    
    $fee_type="Not Defined";
    while($row_head = $result_set_head->fetch_assoc()){
        $data.='<tr><td>'.$row_head['Fee_Head_Name'].'</td><td>';
        if ($row_head['Fee_Installment_Type']==1) {
           $fee_type = "Annual";
        }elseif($row_head['Fee_Installment_Type']==2){
            $fee_type= "Installment";
        }
        elseif($row_head['Fee_Installment_Type']==3){
            $fee_type= "Lifetime";
        }
        else{
            $fee_type= "Not Defined";
        }
        $data.=''.$fee_type.'</td>';
        foreach ($months_data as $months) {
            $query_prep->bind_param("isiii",$FGId,$session,$_SESSION["SCHOOLID"],$months['Installment_Id'],$row_head['Fee_Head_Id']);
            
            $query_prep->execute();$result_set_fee = $query_prep->get_result();
           
            while ($row_fee = $result_set_fee->fetch_assoc()) {
                $data.= '<td>'.$row_fee['Fee_Amount'].'</td>'; 
            }
         }
         $query_ttl_month_prep->bind_param("isi",$FGId,$session,$row_head['Fee_Head_Id']);
         $query_ttl_month_prep->execute();
         $result_amt = $query_ttl_month_prep->get_result();
         while ($row_amt = $result_amt->fetch_assoc()) {
            $data.='<td class="text-right">'.$row_amt['total_amt'].'</td>';
         }
        $data.='</tr>';
    }
    $data .='<tr><td colspan="2" class="text-center" style="font-weight:bold">Total</td>';
    foreach ($months_data as $months){
        $query_ttl_monthw_prep->bind_param("isi",$FGId,$session,$months['Installment_Id']);
        $query_ttl_monthw_prep->execute();
        $result_amtw = $query_ttl_monthw_prep->get_result();  
        $row_mttl = $result_amtw->fetch_assoc();      
        $data.='<td>'.$row_mttl['total_amt_month'].'</td>';
    }
    $g_ttl = "SELECT SUM(Fee_Amount) as g_ttl FROM fee_structure_table WHERE FG_Id =? AND Session =? ";
    $g_ttl_prep = $dbhandle->prepare($g_ttl);
    $g_ttl_prep->bind_param("is",$FGId,$session);
    $g_ttl_prep->execute(); 
    $result_set_gttl = $g_ttl_prep->get_result();
    $row_gttl = $result_set_gttl->fetch_assoc();
    $data.='<td style="font-weight:bold;" class="text-right">'.$row_gttl['g_ttl'].'</td></tr></tbody>';
    echo $data;
    function get_all_months($dbhandle){
        $query = "SELECT * FROM `installment_master_table` ORDER BY Installment_Id";
        $query_prep = $dbhandle->prepare($query);
        $query_prep->execute();$data = array();
        $result_set = $query_prep->get_result();
        while($rows = $result_set->fetch_assoc()){
            $data[] = $rows;
        }
        return $data;
    }
?>