<?php
    session_start();
    include 'dbobj.php';
    include 'errorLog.php';
    include 'security.php';
    require_once 'sequenceGenerator.php';
    $StudentId='027/2019';  //SAMPLE STUDENT ID.
    $Class_id=16;   //CLASS ID OF CLASS 11.
    $Stream='General';  //STREAM VALUE.
    $ConcessionId=1;
    $AdmissionNo=1;
    $LateFeeDay=27;
    
    mysqli_autocommit($dbhandle,false);
    //echo "autocommit off<br>";
    /*Fetching Concession details for the provided student's concession group.*/
    /*Concession List array creation*/
        $ConcessionGroup_sql="select * from concession_detail_table where concession_id=$ConcessionId and enabled=1 and session='" . $_SESSION["SESSION"] . "' and school_id=" . $_SESSION["SCHOOLID"];
        echo $ConcessionGroup_sql;
        $ConcessionGroup_result=$dbhandle->query($ConcessionGroup_sql);
        if(!$ConcessionGroup_result)
            {
                $error_msg = "Not able to get concession list for the student.";
                $sql=$CommissionGroup_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                echo "Database Error. Please contact application support team.";
                die;
            }
        $ConcessionList=array();    
        while($ConcessionGroup_row=$ConcessionGroup_result->fetch_assoc())
            {
                $ConcessionList[$ConcessionGroup_row["Fee_Head_Id"]]=$ConcessionGroup_row["Concession_Percent"];           
            }
        //echo "concession array created.<br>";        
     /*End of Concession List array creation*/       

    //Step1: Based on provided class and stream value fetch the Fee Cluster List Id applicable for the class and section.
        //Step1:Fetch Student Fee Cluster Structure information.
            $FeeClusterId_sql="select FC_Id from fee_cluster_class_list where Class_Id=$Class_id and Stream='$Stream'" . " and enabled=1 and school_id=" . $_SESSION["SCHOOLID"];
            //echo $FeeClusterId_sql;
            $FeeClusterId_result=$dbhandle->query($FeeClusterId_sql);
            if(!$FeeClusterId_result)
            {
                $error_msg = "Not able to get Fee Cluster Id Information.";
                $sql=$CommissionGroup_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                echo "Database Error. Please contact application support team.";
                die;
            }
            $FeeClusterId_row=$FeeClusterId_result->fetch_assoc();
            $FC_Id=$FeeClusterId_row["FC_Id"];
            //echo $FC_Id . '<br>';
        //End of Fee cluster id fetch.   
        
        /* Creating Installment List.*/
            $InstallmentList_sql="select * from installment_master_table order by installment_id";
            $InstallmentList_result=$dbhandle->query($InstallmentList_sql);
            if(!$InstallmentList_result)
            {
                $error_msg = "Not able to get Installment Information.";
                $sql=$InstallmentList_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                echo "Database Error. Please contact application support team.";
                die;
            }

            $InstallmentId=null;
            //step 1a. Looping installment id wise. 
            //step 1b. Selecting Fee_Cluster_Fee_List table for the installment id. 
            //step 1c. Looping for the Fee_Cluster_Fee_List records. 
            //step 1d. Insert Fee_Cluster_fee_List row information with other installment and discount information to the student_fee_list_table.
            
            /*Sql to fetch fee lsit items from fee_cluster_fee_list month wise or installment wise and inserting rows in student_fee_list_table for the selected fee cluster data installment id wise or month wise. */
            $FeeClusterFeeList_sql="select * from fee_cluster_fee_list where FC_ID=? and installment_id=? and session=?";
            $FeeClusterFeeList_prepare=$dbhandle->prepare($FeeClusterFeeList_sql);
            $FeeClusterFeeList_prepare->bind_param('iis',$FC_Id,$InstallmentId,$_SESSION["SESSION"]);
            //echo $FeeClusterFeeList_prepare-error;
            $count=0;
            while($InstallmentList_row=$InstallmentList_result->fetch_assoc()) //step1a.
            {
                $InstallmentId=$InstallmentList_row["Installment_Id"]; //fetching installment id.
                $FeeClusterFeeList_prepare->execute();//step1b.
                $result_set = $FeeClusterFeeList_prepare->get_result(); //exucuting fee_cluster_fee_list select statgement for the selected installment id to get fee list records.
                while($row = $result_set->fetch_assoc()) //step1c.
                    {
                        //step1d.
                        $SFL_Id = sequence_number('student_fee_list_table',$dbhandle);
                        //Calculating Discount Amount.
                        $DiscountAmount= round($row["Fee_Amount"] * $ConcessionList[$row["Fee_Head_Id"]] / 100);
                        $StudentFeeList_sql="INSERT INTO `student_fee_list_table`(`SFL_Id`, `FC_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Discount_Amount`, `Is_Paid`, `Student_Id`, `Session`, `School_Id`, `Enabled`, `Updated_By`) VALUES ($SFL_Id,$FC_Id," . $row["Fee_Head_Id"] . "," . $row["Fee_Installment_Type"] . "," . $row["Installment_Id"] . "," . $row["Fee_Amount"] . "," . $DiscountAmount . ",0,'" . $StudentId  . "','" . $_SESSION["SESSION"] . "'," . $_SESSION["SCHOOLID"] . ",1,'" . $_SESSION["LOGINID"]."')";
                        //echo $StudentFeeList_sql . "<br>";
                        $StudentFeeList_result=$dbhandle->query($StudentFeeList_sql);
                        if(!$StudentFeeList_result)
                            {
                                $error_msg = "Not able to insert into student_fee_list_table.";
                                $sql=$StudentFeeList_sql;
                                $el = new LogMessage();
                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                mysqli_rollback($dbhandle);
                                echo "Database Error. Please contact application support team.";
                                die;
                            }
                    }
            }
        mysqli_commit($dbhandle);  
        echo "Student Fee Generated Successfully.";  
                                                    


?>