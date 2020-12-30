<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';
require_once './GlobalModel.php';

/******* function to check existing fee cluster structure ********/
function check_existing_structure($dbhandle,$cluster_name,$school_id,$session){
    $query_check = "SELECT COUNT(FS_Id) as total_rows FROM fee_structure_table  WHERE FG_Id = ? AND School_Id = ? AND Session = ?";
    $query_check_prep = $dbhandle->prepare($query_check);
    $query_check_prep->bind_param("iis",$cluster_name,$school_id,$session);
    $query_check_prep->execute();
    $result_set = $query_check_prep->get_result();
    $row_count = $result_set->fetch_assoc();
    return $row_count;
}

/*********** get all  months *************/
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

/**  receive form data fee head  **/
if(isset($_REQUEST['fee_head_sender'])){
    mysqli_autocommit($dbhandle, false);
    if (empty($_REQUEST['fee_head_sender'])) { 
        $html_data = array();
       $fee_name = $_REQUEST['fee_name'];
       $fee_type = 'Monthly';
       $fee_print_label = $_REQUEST['fee_print_label'];

       if (!isset($_REQUEST['ref_fee_amt'])) {
        $ref_fee_amt = 0;
       }else{
        $ref_fee_amt = $_REQUEST['ref_fee_amt'];
       }

       if (!isset($_REQUEST['tax_benefit'])) {
        $tax_benefit = 0;
       }else{
        $tax_benefit = $_REQUEST['tax_benefit'];
       }

        if (empty($fee_name)) {
            $html_data[] ='<a href="#" class="list-group-item list-group-item-action text-danger">1. Fee Name Cannot Be Blank</a>';
        }
        if (empty($fee_print_label)) {
            $html_data []= '<a href="#" class="list-group-item list-group-item-action text-danger">2. Fee Print Label Cannot Be Blank</a>';
        }
        if (empty($fee_type)) {
            $html_data []= '<a href="#" class="list-group-item list-group-item-action text-danger">3. Please Select Fee Type</a>';
        }   
        elseif (!empty($fee_name) && !empty($fee_print_label) && !empty($fee_type)) {
            // check existed transport fee head
            $query_check = "SELECT COUNT(Fee_Head_Id) FROM `fee_head_table` WHERE `Fee_Type` = 'Transport' AND School_Id = ".$_SESSION["SCHOOLID"]."";
            $query_check_prep = $dbhandle->prepare($query_check);
            $query_check_prep->execute();
            $row_query = $query_check_prep->get_result();
            if($row_query->num_rows>0){
                $html_data []= '<a href="#" class="list-group-item list-group-item-action text-danger">Transport Fee Head Already Existed Use This!!!</a>';
            }else{
                // saving data into database
                //$Regular='Regular'; //Assuming this controller is creating Regular fee type head only.
                $fhead_id = sequence_number('fee_head_table',$dbhandle);
                $insert_query = "INSERT INTO `fee_head_table`(`Fee_Head_Id`, `Fee_Head_Name`, `Fee_Head_Type`, `Fee_Type`,`Fee_Print_Lable`, `Refundable`, `Tax_Benifit`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?,?,?)";
                $insert_query_prepare = $dbhandle->prepare($insert_query);
                $insert_query_prepare->bind_param("issssiiis",$fhead_id,$fee_name,$fee_type,$_REQUEST['fee_type_choosen'],$fee_print_label,$ref_fee_amt,$tax_benefit,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                if (!$insert_query_prepare->execute()) {
                    $error_msg = $insert_query_prepare->error;
                    $el = new LogMessage();
                    $sql = $insert_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Fee Header ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                    $html_data []= '<a href="#" class="list-group-item list-group-item-action text-danger">Failed To Save!!!</a>';
                    
                }
                else{
                    $html_data []= '<a href="#" class="list-group-item list-group-item-action text-success">Fee Head Data Has Been Saved Successfully!!!</a>';
                }
            }
        }     
    }
    
    echo '<div class="list-group pb-5">'; 
        foreach($html_data as $error){
            echo $error;
        }
    echo '</div>';
    mysqli_commit($dbhandle);
}


/*********** get all fee heads ***********/
if (isset($_REQUEST['getall_feehead'])) {
    $fee_head_query = "SELECT * FROM `fee_head_table` WHERE `Enabled` = 1 AND School_Id = ".$_SESSION["SCHOOLID"]." ORDER BY Fee_Head_Id DESC";
    $fee_head_query_prepa = $dbhandle->prepare(($fee_head_query));
    $fee_head_query_prepa->execute();
    $result_set = $fee_head_query_prepa->get_result(); $data = array();
    while($rows = $result_set->fetch_assoc()){
        $data[] = $rows;
    }
    echo json_encode($data);
}

/********* delete fee head ********/
if (isset($_REQUEST['delete_fee_head'])) {
    //fee_head_id
    $query_del = "UPDATE fee_head_table SET Enabled = 0 WHERE Fee_Head_Id = ?";
    $query_del_prepa = $dbhandle->prepare($query_del);
    $query_del_prepa->bind_param('i',$_REQUEST['fee_head_id']);
    if($query_del_prepa->execute()){
        echo '<div class="list-group pb-5"><a href="#" class="list-group-item list-group-item-action text-success">Fee Head Has Been Deleted Successfully!!!</a></div>';
    }else{
        echo '<div class="list-group pb-5"><a href="#" class="list-group-item list-group-item-action text-danger">Failed To Delete!!!</a></div>';
    }
}

/*********************** cluster work starts here********************************/

/* check cluster name */
if (isset($_REQUEST['check_cluster_name'])) {
    if (empty($_REQUEST['cluster_name'])) {
        echo '<p class="mt-2  font-size-14 line-height-14 text-danger">Please Type Cluster Name</p>';
    }else{
        $cluster_name = "'%".$_REQUEST['cluster_name']."%'";
        $check_Query = "SELECT * FROM `fee_group_table` WHERE `FG_Name` LIKE $cluster_name AND Fee_Group_Type='Regular' AND `Enabled` = 1 AND `School_Id` = ".$_SESSION["SCHOOLID"]."";
        $check_Query_prepare = $dbhandle->prepare($check_Query);
        $result_set = $check_Query_prepare->get_result();
        if ($check_Query_prepare->num_rows >0) {
            echo '<p class="mt-2  font-size-14 line-height-14 text-danger">Cluster Name Already Existed</p>';
        }else{
            echo '<p class="mt-2  font-size-14 line-height-14 text-success">No Match Found</p>';
        }
    }
}

/* save fee group name as regular */
if (isset($_REQUEST['cluster_Sender'])) {
  
    if (empty($_REQUEST['cluster_Sender'])) {
        $cluster_name  = $_REQUEST['cluster_name'];
        $cluster_school_name = $_REQUEST['cluster_school_name'];
        $fee_stream = $_REQUEST['fee_stream']; 
        
        $total_loops = count($_REQUEST['class_names']);
        if (empty($_REQUEST['cluster_name'])) {
            echo '<p class="text-danger">Cluster Name Cannot Be Blank</p>';
        }
        if (empty($_REQUEST['cluster_school_name'])) {
            echo '<p class="text-danger">Please Select Cluster School</p>';
        }
        if (empty($_REQUEST['fee_stream'])) {
            echo '<p class="text-danger">Please Select Cluster Fee Stream</p>';
        }  
        if(empty($_REQUEST['student_type'])){
            echo '<p class="text-danger">Please Select Student Type</p>';
        }
        mysqli_autocommit($dbhandle, false);
        // entry query      
        for ($i=0; $i < $total_loops; $i++) { 
           if ($fee_stream == 'General') {
               $max_class_no  = 10;
               $exp_data = explode(',',$_REQUEST['class_names'][$i]);
               if ($exp_data[1]>$max_class_no) {
                   echo '<p class="text-danger">Class Number Cannot Be More Than 10 While Selecting <strong>General<strong></p>';
                    break; die;
               }
           }else{
            $range_class_no  = 10;$exp_data = explode(',',$_REQUEST['class_names'][$i]);
               if ($exp_data[1]<$range_class_no) {
                echo '<p class="text-danger">Class Number Cannot Be Less Than 10 While Selecting <strong>'.$_REQUEST['fee_stream'].'<strong></p>'; 
                break; die;
               }
           }
        }

        if (!empty($_REQUEST['fee_stream']) && !empty($_REQUEST['cluster_name'])) {
            // check fee cluster data
            $query_search = "SELECT COUNT(FG_Id) FROM fee_group_table WHERE Student_Type = ? AND FG_Name = ? AND School_Id = ?";
            $query_search_prep = $dbhandle->prepare($query_search);
            $query_search_prep->bind_param("ssi",$_REQUEST['student_type'],$cluster_name,$_SESSION["SCHOOLID"]);
            $query_search_prep->execute();
            $result_set = $query_search_prep->get_result();
            if($result_set->num_rows>0)
            {
                echo '<p class="text-danger">Fee Grroup Already Existed Try Another</p>';
            }
            else
            {
                // one time insert into cluster_mster_table
                $fgroup_type='Regular';
                $faccount_type='School-Fee'; //Here this is fixed as the other account type is created by configuration system before implementation.
                $student_type=$_REQUEST['student_type']; //fixed with default value must changed with sending parameter as per requirement. This value is only valid till testing purpose. This must be changed with dynamic variable as per the post request made.
                $fcluster_id = sequence_number('fee_group_table',$dbhandle);
                $ins_clus_query = "INSERT INTO `fee_group_table`(`FG_Id`, `FG_Name`, `Fee_Group_Type`,`Fee_Account_Type`,`Student_Type`,`School_Id`, `Updated_By`,`Enabled`) VALUES (?,?,?,?,?,?,?,?)"; $enabled = 1;
                $ins_clus_query_prepate = $dbhandle->prepare($ins_clus_query);
                $ins_clus_query_prepate->bind_param('issssisi',$fcluster_id,$_REQUEST['cluster_name'],$fgroup_type,$faccount_type,$student_type,$_REQUEST['cluster_school_name'],$_SESSION["LOGINID"],$enabled);
                if (!$ins_clus_query_prepate->execute()) {
                    $error_msg = $ins_clus_query_prepate->error;
                    $el = new LogMessage();
                    $sql = $ins_clus_query;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Cluster Master ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }else{
                    $total_loops = count($_REQUEST['class_names']);
                    for ($i=0; $i < $total_loops; $i++) { 
                        $cluster_class_id = sequence_number('fee_group_class_list',$dbhandle);
                        $exp_data = explode(',',$_REQUEST['class_names'][$i]);
                        $ins_clus_class_q = "INSERT INTO `fee_group_class_list`(`FGCL_Id`, `FG_Id`, `Class_Id`, `Stream`, `School_Id`,`Updated_By`) VALUES (?,?,?,?,?,?)";
                        $ins_clus_class_q_prep = $dbhandle->prepare($ins_clus_class_q);
                        $ins_clus_class_q_prep->bind_param("iiisis",$cluster_class_id,$fcluster_id,$exp_data[0],$_REQUEST['fee_stream'],$_REQUEST['cluster_school_name'],$_SESSION["LOGINID"]);
                        if (!$ins_clus_class_q_prep->execute()) {
                            $error_msg = $ins_clus_class_q_prep->error;
                            $el = new LogMessage();
                            $sql = $ins_clus_class_q;
                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                            $el->write_log_message('Cluster Msster ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                            mysqli_rollback($dbhandle);
                            $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                            die; 
                        }
                    }
                    echo '<p class="text-success">Data Has Been Saved Successfully</p>';
                }
            }
        }
        mysqli_commit($dbhandle);
    }
}

/* save fee group name as transport */
if (isset($_REQUEST['transport_cluster_Sender'])) {
  
    if (empty($_REQUEST['cluster_Sender'])) {
        $cluster_name  = $_REQUEST['cluster_name'];
        $cluster_school_name = $_REQUEST['cluster_school_name'];
        if (empty($_REQUEST['cluster_name'])) {
            echo '<p class="text-danger">Cluster Name Cannot Be Blank</p>';
        }
        if (empty($_REQUEST['cluster_school_name'])) {
            echo '<p class="text-danger">Please Select Cluster School</p>';
        }
        if(empty($_REQUEST['student_type'])){
            echo '<p class="text-danger">Please Select Student Type</p>';
        }
        mysqli_autocommit($dbhandle, false);

        if (!empty($_REQUEST['cluster_school_name']) && !empty($_REQUEST['cluster_name']) && !empty($_REQUEST['student_type'])) {
            // check fee cluster data
            $query_search = "SELECT COUNT(FG_Id) AS total_row FROM fee_group_table WHERE Student_Type = ? AND FG_Name = ? AND School_Id = ?";
            $query_search_prep = $dbhandle->prepare($query_search);
            $query_search_prep->bind_param("ssi",$_REQUEST['student_type'],$cluster_name,$_SESSION["SCHOOLID"]);
            $query_search_prep->execute();
            $result_set = $query_search_prep->get_result();
            echo var_dump($result_set->num_rows);
            $row_Exist = $result_set->fetch_assoc();
            if($row_Exist['total_row']>0)
            {
                echo '<p class="text-danger">Fee Grroup Already Existed Try Another</p>';
            }
            else
            {            
            // one time insert into cluster_mster_table
            $fgroup_type='Transport';
            $faccount_type='Transport-Fee'; //Here this is fixed as the other account type is created by configuration system before implementation.
            $student_type=$_REQUEST['student_type']; //fixed with default value must changed with sending parameter as per requirement. This value is only valid till testing purpose. This must be changed with dynamic variable as per the post request made.
            $fcluster_id = sequence_number('fee_group_table',$dbhandle);
            $ins_clus_query = "INSERT INTO `fee_group_table`(`FG_Id`, `FG_Name`, `Fee_Group_Type`,`Fee_Account_Type`,`Student_Type`,`School_Id`, `Updated_By`,`Enabled`) VALUES (?,?,?,?,?,?,?,?)"; $enabled = 1;
            $ins_clus_query_prepate = $dbhandle->prepare($ins_clus_query);
            $ins_clus_query_prepate->bind_param('issssisi',$fcluster_id,$_REQUEST['cluster_name'],$fgroup_type,$faccount_type,$student_type,$_REQUEST['cluster_school_name'],$_SESSION["LOGINID"],$enabled);
            if (!$ins_clus_query_prepate->execute()) 
            {
                $error_msg = $ins_clus_query_prepate->error;
                $el = new LogMessage();
                $sql = $ins_clus_query;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Cluster Master ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                mysqli_rollback($dbhandle);
                $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                die;
            }
            else
            {
                    $class_id = $fee_stream = 'NULL';
                    $cluster_class_id = sequence_number('fee_group_class_list',$dbhandle);
                    $ins_clus_class_q = "INSERT INTO `fee_group_class_list`(`FGCL_Id`, `FG_Id`, `Class_Id`, `Stream`, `School_Id`,`Updated_By`) VALUES (?,?,?,?,?,?)";
                    $ins_clus_class_q_prep = $dbhandle->prepare($ins_clus_class_q);
                    $ins_clus_class_q_prep->bind_param("iiisis",$cluster_class_id,$fcluster_id,$class_id,$fee_stream,$_REQUEST['cluster_school_name'],$_SESSION["LOGINID"]);
                    if (!$ins_clus_class_q_prep->execute()) {
                        $error_msg = $ins_clus_class_q_prep->error;
                        $el = new LogMessage();
                        $sql = $ins_clus_class_q;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Cluster Msster ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        mysqli_rollback($dbhandle);
                        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                        die; 
                    }
            }
                echo '<p class="text-success">Data Has Been Saved Successfully</p>';
            }
        }
        mysqli_commit($dbhandle);
    }
}

/**** get all clusters ***/
if (isset($_REQUEST['get_all_clusters'])) {
    $cluster_query = "SELECT fgt.*, fgcl.*, cmt.Class_Name, smt.school_name FROM fee_group_table fgt, fee_group_class_list fgcl, class_master_table cmt, school_master_table smt WHERE fgt.FG_Id = fgcl.FG_Id AND fgt.Enabled = 1 AND fgcl.Enabled=1 AND fgt.School_Id = ? AND cmt.Class_Id = fgcl.Class_Id  AND cmt.School_Id = smt.school_id AND fgt.Fee_Group_Type=? ORDER BY fgt.FG_Id DESC";
    $cluster_query_prep = $dbhandle->prepare($cluster_query);
    $cluster_query_prep->bind_param("is",$_SESSION["SCHOOLID"],$_REQUEST['fee_type']);
    $cluster_query_prep->execute();
    $result_set = $cluster_query_prep->get_result();$data = array();
    while ($rows = $result_set->fetch_assoc()) {
        $data[] = $rows;
    }
    echo json_encode($data);
}

/* delete clusters */
if (isset($_REQUEST['delete_cluster_class'])) {
    //cluster_class_id
    $del_query = "UPDATE fee_group_class_list SET Enabled =0 WHERE FGCL_Id = ?";
    $del_query_prep = $dbhandle->prepare($del_query);
    $del_query_prep->bind_param("i",$_REQUEST['cluster_class_id']);
    if ($del_query_prep->execute()) {
        echo '<p class="text-success">Cluster Class Deleted </p>';
    }else{
        echo '<p class="text-danger">Failed To Delete </p>';
    }
}

/******************* submit consession form *******************/
if (isset($_REQUEST['consession_sender'])) 
{
    if (empty($_REQUEST['consession_sender'])) 
    {
        mysqli_autocommit($dbhandle, false);  
        $consession_name = $_REQUEST['consession_name'];
        $consession_session = $_REQUEST['consession_session'];

        if (empty($consession_name)) {
            echo '<p class="text-danger">Please Type Consession Category Name</p>';
        }
        if (empty($consession_session)) {
            echo '<p class="text-danger">Please Select Session</p>';
        }
        if (!empty($consession_name) && !empty($consession_session)) {
            // check existing concession fee name
            $query_check_con = "SELECT * FROM `concession_master_table` WHERE `Concession_Name` = ? AND `School_Id` = ?";
            $query_check_con_prep = $dbhandle->prepare($query_check_con);
            $query_check_con_prep->bind_param("si",$_REQUEST['consession_name'],$_SESSION["SCHOOLID"]);
            $query_check_con_prep->execute();
            $result_conc = $query_check_con_prep->get_result();
            $row_cons = $result_conc->fetch_assoc();
            if ($result_conc->num_rows >0) 
            {
                echo '<p class="text-danger">Consession Already Existed With Same Name Try Another</p>';
            }
            else
            {
               // echo $row_cons['Concession_Id'];
                // inserting into master table
                $concession_master_id = sequence_number('concession_master_table',$dbhandle);
                $ins_query = "INSERT INTO `concession_master_table`(`Concession_Id`, `Concession_Name`, `School_Id`, `Updated_By`) VALUES (?,?,?,?)";
                $ins_query_prep = $dbhandle->prepare($ins_query);
                $ins_query_prep->bind_param("isis",$concession_master_id,$consession_name,$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                if ($ins_query_prep->execute()) 
                {
                    // inserting into consession details
                   $total_loops = count($_REQUEST['consession']);
                    $ins_det = "INSERT INTO `concession_detail_table`(`Concession_Detail_Id`, `Concession_Id`, `Fee_Head_Id`, `Concession_Percent`, `School_Id`,`Updated_By`,`Session`) VALUES (?,?,?,?,?,?,?)";
                    $ins_det_prep = $dbhandle->prepare($ins_det);
                    for ($i=0; $i < $total_loops; $i++) { 
                        if ($_REQUEST['consession'][$i]>=0 && $_REQUEST['consession'][$i] <=100) {
                            $concession_detail_id = sequence_number('concession_detail_table',$dbhandle);
                            $ins_det_prep->bind_param("iiiiiss",$concession_detail_id,$concession_master_id,$_REQUEST['fee_head_id'][$i],$_REQUEST['consession'][$i],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$_REQUEST['consession_session']);
                            $ins_det_ins = $ins_det_prep->execute();
                        }
                    }
                    if ($ins_det_ins) {
                        echo '<p class="text-success">Consession Has Been Saved Successfully</p>';
                    }
                    else
                    {
                        $error_msg = $ins_query_prep->error;
                        $el = new LogMessage();
                        $sql = $ins_query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Consession Master ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        mysqli_rollback($dbhandle);
                        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                        die; 
                    }
                }    
            }
        }
        mysqli_commit($dbhandle);
    }
}

/*********** get consessions ************/
if (isset($_REQUEST['get_all_consessions'])) {
    $query = "SELECT cmt.*, cdt.Concession_Percent, cdt.Concession_Detail_Id,fhlt.Fee_Head_Name FROM concession_master_table cmt, concession_detail_table cdt, fee_head_table fhlt WHERE cmt.Concession_Id = cdt.Concession_Id AND fhlt.Fee_Head_Id = cdt.Fee_Head_Id AND cmt.Enabled =1 AND cdt.Enabled =1 AND cmt.School_Id = ".$_SESSION["SCHOOLID"]." ORDER BY cdt.Concession_Detail_Id DESC";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->execute();
    $result_set = $query_prep->get_result();$data=array();
    while ($rows = $result_set->fetch_assoc()) {
        $data[] = $rows;
    }
    echo json_encode($data);
}


/*********** get consession details by its id ************/
if (isset($_REQUEST['get_consessions'])) {
    $query = "SELECT cmt.* FROM concession_master_table cmt WHERE cmt.Enabled =1 AND cmt.School_Id = ? AND cmt.Concession_Id = ? ";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->bind_param("ii",$_SESSION["SCHOOLID"],$_REQUEST['concession_id']);
    $query_prep->execute();
    $result_set = $query_prep->get_result();$data=array();
    while ($rows = $result_set->fetch_assoc()) {
        $data[] = $rows;
    }
    echo json_encode($data);
}

/******** delete consession ********/
if(isset($_REQUEST['delete_consession'])){
    $query = "Update concession_detail_table SET Enabled = 0 WHERE Concession_Detail_Id = ?";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->bind_param("i",$_REQUEST['cons_id']);
    if($query_prep->execute()){
        echo '<p class="text-success">Data Has Been Deleted Successfully!!!</p>';
    }

}

/********** submit Fee Structure data as regular fee **********/
if (isset($_REQUEST['cluster_sender'])) {
    mysqli_autocommit($dbhandle, false);  
    // check existing records
    $fee_data = check_existing_structure($dbhandle,$_REQUEST['fee_cluster_name'],$_SESSION["SCHOOLID"],$_REQUEST['f_academic_session']);
    if ($fee_data['total_rows']>0) {
        echo '<p class="text-danger">Record Existing For This Strucure Please Donot Proceed</p>';
    }
    else{
         // total loop counting
        $total_loops_down =  count($_REQUEST['installment_type']);
        // total installments
        $months_data = get_all_months($dbhandle);
        
        $insert_query = "INSERT INTO `fee_structure_table`(`FS_Id`, `FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Session`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?,?,?)";
        $insert_query_perp = $dbhandle->prepare($insert_query);
        for ($i=0; $i < $total_loops_down; $i++) 
        { 
            for ($j=0; $j < count($months_data); $j++) 
            {   
                $cluster_fee_id = sequence_number('fee_structure_table',$dbhandle);
                $insert_query_perp->bind_param("iiiiiisis",$cluster_fee_id,$_REQUEST['fee_cluster_name'],$_REQUEST['fee_head_id'][$i],$_REQUEST['installment_type'][$i],$_REQUEST['inst_name'][$j],$_REQUEST[$i][$i][$j],$_REQUEST['f_academic_session'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                $execute_Query = $insert_query_perp->execute();
            }    
        }
        if ($execute_Query) {
            echo '<p class="text-success">Data Has Been Inserted Successfully!!!</p>';
        }
        else{
            echo '<p class="text-danger">Failed to Save!!!</p>';
        }  
    }
    mysqli_commit($dbhandle);
}

/********** submit Fee Structure data as transport fee **********/
if (isset($_REQUEST['transport_cluster_sender'])) {
    mysqli_autocommit($dbhandle, false);  
    // check existing records
    $fee_data = check_existing_structure($dbhandle,$_REQUEST['fee_cluster_name'],$_SESSION["SCHOOLID"],$_REQUEST['f_academic_session']);
    if ($fee_data['total_rows']>0) {
        echo '<p class="text-danger">Record Existing For This Strucure Please Donot Proceed</p>';  die;
    }
    else{
         // total loop counting
        $total_loops_down =  count($_REQUEST['installment_type']);
        // total installments
        $months_data = get_all_months($dbhandle);
        
        $insert_query = "INSERT INTO `fee_structure_table`(`FS_Id`, `FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Session`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?,?,?)";
        $insert_query_perp = $dbhandle->prepare($insert_query);
        for ($i=0; $i < $total_loops_down; $i++) 
        { 
            for ($j=0; $j < count($months_data); $j++) 
            {   
                $cluster_fee_id = sequence_number('fee_structure_table',$dbhandle);
                $insert_query_perp->bind_param("iiiiiisis",$cluster_fee_id,$_REQUEST['fee_cluster_name'],$_REQUEST['fee_head_id'][$i],$_REQUEST['installment_type'][$i],$_REQUEST['inst_name'][$j],$_REQUEST[$i][$i][$j],$_REQUEST['f_academic_session'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                $execute_Query = $insert_query_perp->execute();
            }    
        }
        if ($execute_Query) {
            echo '<p class="text-success">Data Has Been Inserted Successfully!!!</p>';
        }
        else{
            echo '<p class="text-danger">Failed to Save!!!</p>';
        }  
    }
    mysqli_commit($dbhandle);
}
/******* check existing fee details *******/
if (isset($_REQUEST['check_existing_fee'])) {
    $fee_data = check_existing_structure($dbhandle,$_REQUEST['cluster_name'],$_SESSION["SCHOOLID"],$_REQUEST['cluster_session']);
    if ($fee_data['total_rows']>0) {
        echo '<p class="text-danger">Record Existed For This Session Please Donot Proceed</p>';  
    }
    else{
        echo '<p class="text-success">You Can Process</p>';  
    }
}

/********** get cluster fee details **********/
if (isset($_REQUEST['get_clust_details'])) 
{
    $data = '';
    $data .= '<table class="table"><thead><tr><th>Fee Head</th><th>Inst. Type</th>';
    $months_data = get_all_months($dbhandle);
    foreach ($months_data as $months) {
       $data.= '<th>'.$months['Installment_Name'].'</th>';
    }
    $data .= '<th class="text-right">Total Amt</th></tr></thead><tbody>';
    $query = "SELECT  fst.*  FROM fee_structure_table fst WHERE fst.FG_Id = ? AND fst.Session = ? AND fst.School_Id = ? AND fst.Enabled = 1 AND fst.Installment_Id=? AND fst.Fee_Head_Id=?";
    $query_prep = $dbhandle->prepare($query);

    $query_fee_head = "SELECT DISTINCT fht.*, fst.Fee_Installment_Type FROM fee_head_table fht, fee_structure_table fst WHERE fht.Fee_Type='Regular' AND fst.Fee_Head_Id = fht.Fee_Head_Id AND fst.Session = ? AND fst.School_Id = ? AND fst.FG_Id = ?";
    $query_fee_head_prep = $dbhandle->prepare($query_fee_head);
    $query_fee_head_prep->bind_param("sii",$_REQUEST['cluster_session'],$_SESSION["SCHOOLID"],$_REQUEST['cluster_name']);
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
            $query_prep->bind_param("isiii",$_REQUEST['cluster_name'],$_REQUEST['cluster_session'],$_SESSION["SCHOOLID"],$months['Installment_Id'],$row_head['Fee_Head_Id']);
            $query_prep->execute();$result_set_fee = $query_prep->get_result();
            while ($row_fee = $result_set_fee->fetch_assoc()) {
                $data.= '<td>'.$row_fee['Fee_Amount'].'</td>'; 
            }
         }
         $query_ttl_month_prep->bind_param("isi",$_REQUEST['cluster_name'],$_REQUEST['cluster_session'],$row_head['Fee_Head_Id']);
         $query_ttl_month_prep->execute();
         $result_amt = $query_ttl_month_prep->get_result();
         while ($row_amt = $result_amt->fetch_assoc()) {
            $data.='<td class="text-right">'.$row_amt['total_amt'].'</td>';
         }
        $data.='</tr>';
    }
    $data .='<tr><td colspan="2" class="text-center" style="font-weight:bold">Total</td>';
    foreach ($months_data as $months){
        $query_ttl_monthw_prep->bind_param("isi",$_REQUEST['cluster_name'],$_REQUEST['cluster_session'],$months['Installment_Id']);
        $query_ttl_monthw_prep->execute();
        $result_amtw = $query_ttl_monthw_prep->get_result();  
        $row_mttl = $result_amtw->fetch_assoc();      
        $data.='<td>'.$row_mttl['total_amt_month'].'</td>';
    }
    $g_ttl = "SELECT SUM(Fee_Amount) as g_ttl FROM fee_structure_table WHERE FG_Id =? AND Session =? ";
    $g_ttl_prep = $dbhandle->prepare($g_ttl);
    $g_ttl_prep->bind_param("is",$_REQUEST['cluster_name'],$_REQUEST['cluster_session']);
    $g_ttl_prep->execute(); 
    $result_set_gttl = $g_ttl_prep->get_result();
    $row_gttl = $result_set_gttl->fetch_assoc();
    $data.='<td style="font-weight:bold;" class="text-right">'.$row_gttl['g_ttl'].'</td></tr></tbody>';
    echo $data;
}

/***************** get cluster form (Load with full UI) *******************/
if (isset($_REQUEST['get_cluster_form'])) {
    $data = '';
    $data .= '<table class="table" style="overflow-x:auto; width:125%; "><thead><tr><th style="border:1px solid #ffae01; padding:4px;">Fee Head</th><th style="border:1px solid #ffae01; padding:4px;">Inst. Type</th>';

    // get all fee heads
    $fee_heads = 'SELECT * FROM fee_head_table WHERE Enabled = 1 AND School_Id = ? AND Fee_Type=?'; //hiding the transport head. Showing rest of the fee heads.
    $fee_heads_prep = $dbhandle->prepare($fee_heads);
    $fee_heads_prep->bind_param("is",$_SESSION['SCHOOLID'],$_REQUEST['structure_type']);
    $fee_heads_prep->execute();
    $fee_head_rows = $fee_heads_prep->get_result();
    
    // get all months
    $months_data = get_all_months($dbhandle);
    
    foreach ($months_data as $months) {
       $data.= '<th class="text-center" style="border:1px solid #ffae01; padding:4px;">'.$months['Installment_Name'].'</th>';
    }
    $data .= '<th class="text-right" style="border:1px solid #ffae01; padding:4px;">Total<span id="total_installments" class="d-none">'.count($months_data).'</span><span id="total_heads" class="d-none">'.$fee_head_rows->num_rows.'</span></th></tr></thead><tbody><tr>';
    // print fee head and its relevent inputs
    $i=0; $k=0;
    while($fee_rows = $fee_head_rows->fetch_assoc()){
        $i=$i;$j=0;
        $data .= '<th style="border:1px solid #ffae01; padding:4px;">'.$fee_rows['Fee_Head_Name'].'<input type="text" name="fee_head_id[]" value="' . $fee_rows['Fee_Head_Id'] . '" class="d-none"></th><td width="9%"><div class="form-group "><select class="select2 col-12" name="installment_type[]" required style="height:40px; width:100px;"><option value="0">Select One</option>';
        foreach ($GLOBL_FEE_INSTALLMENT_TYPE as $key => $value) {
            $data.= '<option value="'.$value.'">'.$key.'</option>';
        }   
        $data .='</select></div></td>';
        foreach ($months_data as $months) {
            $j=$j;
            //id="'.$i.','.$j.'"
            $data.= '<td><input type="number" class="form-control fee_amount" name="'.$i.'['.$i.']['.$j.']" id="i'.$i.$j.'" fee_head="'.$i.'" inst_id="'.$j.'" value="0" autocomplete="off" style="width:100px; font-size:2rem;height:40px; "><input type="text" name="inst_name[]" class="d-none" value="'.$months["Installment_Id"].'"></td>';
            $j=$j+1;
        }
        $data .= '<td class="text-right" style="border:1px solid #ffae01; padding:4px;"><span class="total_amount" id="total'.$i.'">0</span></td></tr>';
        $i=$i+1;
    }
    $data .= '<tr><td colspan="2" class="text-center" style="border:1px solid #ffae01; padding:4px; font-weight:bold">Total</td>'; 
    foreach ($months_data as $months) {
        $data.= '<td class="text-center" style="border:1px solid #ffae01; padding:4px;"><span id="fh_total'.$k.'">0</span></td>';
        $k=$k+1;
    }
    $data .='<td class="text-right" style="border:1px solid #ffae01; padding:4px;"><span id="g_total">0</span></td></tr>';
    $data .= '</tbody></table>';
    echo $data;
}

/************** display unpaid amount of student **************/
if (isset($_REQUEST['get_all_dues_fees'])) {
    $query = "SELECT SUM(sflt.Fee_Amount)-SUM(sflt.Discount_Amount)+SUM(sflt.Late_Fee_Amount) AS net_total, sflt.Installment_Id, imt.Installment_Name FROM student_fee_list_table sflt, installment_master_table imt WHERE sflt.Installment_Id=imt.Installment_Id AND sflt.Student_Id = ? AND sflt.Session = ? AND sflt.Is_Paid = 0 GROUP BY sflt.Installment_Id";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->bind_param("is",$_REQUEST['student_id'],$_SESSION["SESSION"]);
    $query_prep->execute(); $data = array();
    $result_set = $query_prep->get_result();
        while ($row_fees = $result_set->fetch_assoc()) {
            $data[] = $row_fees;
        }
    echo json_encode($data);
}
?>
