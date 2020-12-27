<?php
    session_start();
    include 'dbobj.php';
    include 'errorLog.php';
    include 'security.php';
    require_once 'sequenceGenerator.php';
    
    mysqli_autocommit($dbhandle,false);
    $StudentId=$_REQUEST["studentid"];  //SAMPLE STUDENT ID.
    $session='2020-2021';
    $StudentDetails_sql="select * from student_class_details where student_id='$StudentId' and session='$session' and enabled=1";
    echo $StudentDetails_sql . '<br>';
    $StudentDetails_result=$dbhandle->query($StudentDetails_sql);
    if(!$StudentDetails_result)
        {
            $error_msg = $dbhandle->error;
            $sql=$StudentDetails_sql;
            $el = new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
            mysqli_rollback($dbhandle);
            die('Database Error: Not able to get Student class details. Please try again later.');     
        }
    if($StudentDetails_result->num_rows==0)
        {
            $error_msg = $dbhandle->error;
            $sql=$StudentDetails_sql;
            $el = new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
            mysqli_rollback($dbhandle);
            die('Student class record not found. Please try again.');
        }    
    $StudentDetails_row=$StudentDetails_result->fetch_assoc();
    
    
    $Class_id=$StudentDetails_row["Class_Id"];   //CLASS ID OF CLASS 11.
    $Student_Type=$StudentDetails_row["Student_Type"];   //CLASS ID OF CLASS 11.
    $Stream=$StudentDetails_row["Stream"];   //CLASS ID OF CLASS 11.
    $Concession_Id=$StudentDetails_row["Concession_Id"];   //CLASS ID OF CLASS 11.
    $FG_Id=$StudentDetails_row["FG_Id"];   //CLASS ID OF CLASS 11.
  

    //echo "autocommit off<br>";
    /*Fetching Concession details for the provided student's concession group.*/
    /*Concession List array creation*/
        $ConcessionGroup_sql="select * from concession_detail_table where concession_id=$Concession_Id and enabled=1 and session='$session' and school_id=" . $_SESSION["SCHOOLID"];
        echo $ConcessionGroup_sql . '<br>';
        $ConcessionGroup_result=$dbhandle->query($ConcessionGroup_sql);
        if(!$ConcessionGroup_result)
            {
                $error_msg = $dbhandle->error;
                $sql=$ConcessionGroup_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                die("Database Error. Please contact application support team.");
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
           /*Commenting this section as FG_Id is now available from student_class_details table in the earlier line of code.
            
            $FeeClusterId_sql="select FG_Id from fee_cluster_class_list where Class_Id=$Class_id and Stream='$Stream'" . " and enabled=1 and school_id=" . $_SESSION["SCHOOLID"];
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
                die("Database Error. Please contact application support team.");
            }
            $FeeClusterId_row=$FeeClusterId_result->fetch_assoc();
            $FC_Id=$FeeClusterId_row["FG_Id"];
            //echo $FC_Id . '<br>';

            */
        //End of Fee cluster id fetch.   
        
        /* Creating Installment List.*/
            $InstallmentList_sql="select * from installment_master_table order by installment_id";
            $InstallmentList_result=$dbhandle->query($InstallmentList_sql);
            if(!$InstallmentList_result)
            {
                $error_msg = $dbhandle->error;
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
            //step 1b. Selecting fee_structure_table table for the installment id. 
            //step 1c. Looping for the fee_structure_table records. 
            //step 1d. Insert Fee_Cluster_fee_fee_structure_tableList row information with other installment and discount information to the student_fee_list_table.
            
            /*Sql to fetch fee lsit items from fee_structure_table month wise or installment wise and inserting rows in student_fee_list_table for the selected fee cluster data installment id wise or month wise. */
            $FeeClusterFeeList_sql="select * from fee_structure_table where FG_ID=? and installment_id=? and session=?";
            $FeeClusterFeeList_prepare=$dbhandle->prepare($FeeClusterFeeList_sql);
            $FeeClusterFeeList_prepare->bind_param('iis',$FG_Id,$InstallmentId,$session);
            //echo $FeeClusterFeeList_prepare->error;
            $StudentFeeMasterError=false;
            $StudentFeeDetailsError=false;
            while($InstallmentList_row=$InstallmentList_result->fetch_assoc()) //step1a.
            {
                $InstallmentId=$InstallmentList_row["Installment_Id"]; //fetching installment id.
                $FeeClusterFeeList_prepare->execute();//step1b.
                $result_set = $FeeClusterFeeList_prepare->get_result(); //exucuting fee_structure_table select statgement for the selected installment id to get fee list records.
                $Installment_Total_Amount=0;
                $SFMId=sequence_number('student_fee_master',$dbhandle); 
                while($row = $result_set->fetch_assoc()) //step1c.
                    {
                        //step1d.
                        $SFD_Id = sequence_number('student_fee_list_table',$dbhandle);
                        //Calculating Discount Amount.
                        $Installment_Total_Amount= $Installment_Total_Amount+$row["Fee_Amount"];
                        $ConcessionAmount= round($row["Fee_Amount"] * $ConcessionList[$row["Fee_Head_Id"]] / 100);
                        $StudentFeeList_sql="INSERT INTO `student_fee_list_table`(`SFD_Id`,`SFM_Id`,`FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Concession_Amount`, `Concession_Id`,  `Enabled`, `Updated_By`) VALUES ($SFD_Id,$SFMId,$FG_Id," . $row["Fee_Head_Id"] . "," . $row["Fee_Installment_Type"] . "," . $row["Installment_Id"] . "," . $row["Fee_Amount"] . "," . $ConcessionAmount . ",$Concession_Id," . "1,'" . $_SESSION["LOGINID"]."')";
                        echo $StudentFeeList_sql . "<br>";
                        $StudentFeeList_result=$dbhandle->query($StudentFeeList_sql);
                        if(!$StudentFeeList_result)
                            {
                                $error_msg = $dbhandle->error;
                                $sql=$StudentFeeList_sql;
                                $el = new LogMessage();
                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                $el->write_log_message('Student Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                mysqli_rollback($dbhandle);
                                $StudentFeeDetailsError=true;
                                //die("Database Error. Please contact application support team.");

                            }
                    }
                   
                $StudentFeeMaster_sql="INSERT INTO `student_fee_master`(`SFM_Id`, `FG_Id`, `Installment_Id`, `Total_Amount`, `Pay_Status`,  `Student_Id`, `Session`, `Installment_Month`, `School_Id`, `Updated_By`) VALUES ($SFMId,$FG_Id,$InstallmentId, $Installment_Total_Amount,'Unpaid','$StudentId','$session'," . $InstallmentList_row["Installment_Month"] . "," . $_SESSION["SCHOOLID"] . ",'" . $_SESSION["LOGINID"] . "')";
                echo $StudentFeeMaster_sql . '<br>';
                $StudentFeeMaster_result=$dbhandle->query($StudentFeeMaster_sql);
                if(!$StudentFeeMaster_result)
                    {
                        echo 'master failed';
                        $StudentFeeMasterError=true;
                        $error_msg = $dbhandle->error;
                        $sql=$StudentFeeMaster_sql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        //mysqli_rollback($dbhandle);
                        $StudentFeeDetailsError=true;
                        //die("Database Error. Please contact application support team.");
                    } 
            }
        if(!$StudentFeeMasterError and !$StudentFeeDetailsError)
            {    
                mysqli_commit($dbhandle);  
                echo "Student Fee Generated Successfully.";  
            }
        else    
            {
                mysqli_rollback($dbhandle);  
                echo "Student Fee Generation Error..";  
            }                                            


?>