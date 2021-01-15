<?php
    session_start();
    include 'dbobj.php';
    include 'errorLog.php';
    include 'security.php';
    require_once 'sequenceGenerator.php';


    
    function Add_Transport_Fee($dbhandle,$StudentId,$TFG_Id,$session,$StopageId,$ClassId)
    {
            $json='';
            $getStopageFee_sql="select * from transport_stopage_table where stopage_id=$StopageId";
            $getStopageFee_result=$dbhandle->query($getStopageFee_sql);
            if(!$getStopageFee_result)
                {
                    //Database Error handling while fetching stopage fee information.
                    $error_msg = $dbhandle->error;
                    $sql=$getStopageFee_sql;
                    $el = new LogMessage();
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Student Transport stopage fee Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    mysqli_rollback($dbhandle);
                    $json=array("status"=>"Error","message"=>"Database Error: Not able to get stopage fare. Please try again later.");
                    $json=json_encode($json);
                    return $json; 
                }
            $row=$getStopageFee_result->fetch_assoc();
            $BusFare=$row["Charges"];

            /*Fetching Concession details for the provided student's concession group id.*/
            /*Concession List array creation*/
                
                /* Commented as no discount setting created for transport fee.
                $ConcessionGroup_sql="select * from concession_detail_table where concession_id=$Concession_Id and enabled=1 and session='$session' and school_id=" . $_SESSION["SCHOOLID"];
                //echo $ConcessionGroup_sql . '<br>';
                $ConcessionGroup_result=$dbhandle->query($ConcessionGroup_sql);
                if(!$ConcessionGroup_result)
                    {
                        //Database Error handling while fetching concession group information.
                        $error_msg = $dbhandle->error;
                        $sql=$ConcessionGroup_sql;
                        $el = new LogMessage();
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Regular Fee List Creation: Concession Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        mysqli_rollback($dbhandle);
                        $json=array("success"=>"False","message"=>"Database Error: Not able to get student concession group details. Please try again later.");
                        $json=json_encode($json);
                        return $json; 
                    }

                $ConcessionList=array();    
                while($ConcessionGroup_row=$ConcessionGroup_result->fetch_assoc())
                    {
                        $ConcessionList[$ConcessionGroup_row["Fee_Head_Id"]]=$ConcessionGroup_row["Concession_Percent"];           
                    }

                   */ 
                //echo "concession array created.<br>";        
                /*End of Concession List array creation*/       
                /* Creating Installment List.*/
                $InstallmentList_sql="select * from installment_master_table order by installment_id";
                $InstallmentList_result=$dbhandle->query($InstallmentList_sql);
                if(!$InstallmentList_result)
                {
                    //Database Error handling while fetching installment information.
                    $error_msg = $dbhandle->error;
                    $sql=$InstallmentList_sql;
                    $el = new LogMessage();
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Student Transport Fee List Creation:Installment Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    mysqli_rollback($dbhandle);
                    $json=array("status"=>"Error","message"=>"Database Error: Not able to get installment information details. Please try again later.");
                    $json=json_encode($json);
                    return $json; 
                }

                $InstallmentId=null;
                //step 1a. Looping installment id wise. 
                //step 1b. Selecting fee_structure_table table for the installment id. 
                //step 1c. Looping for the fee_structure_table records. 
                //step 1d. Insert Fee_Cluster_fee_fee_structure_tableList row information with other installment and discount information to the student_fee_list_table.
                
                /*Sql to fetch fee lsit items from fee_structure_table month wise or installment wise and inserting rows in student_fee_list_table for the selected fee cluster data installment id wise or month wise. */
                $FeeClusterFeeList_sql="select * from fee_structure_table where FG_ID=? and installment_id=? and session=?";
                $FeeClusterFeeList_prepare=$dbhandle->prepare($FeeClusterFeeList_sql);
                $FeeClusterFeeList_prepare->bind_param('iis',$TFG_Id,$InstallmentId,$session);
                //echo $FeeClusterFeeList_prepare->error;
                $StudentFeeMasterError=false;
                $StudentFeeDetailsError=false;
                while($InstallmentList_row=$InstallmentList_result->fetch_assoc()) //step1a.
                    {
                        $InstallmentId=$InstallmentList_row["Installment_Id"]; //fetching installment id.
                        $result=$FeeClusterFeeList_prepare->execute();//step1b.
                        if(!$result){
                            //Database Error handling while fetching installment information.
                            $error_msg = $dbhandle->error;
                            $sql=$FeeClusterFeeList_sql;
                            $el = new LogMessage();
                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                            $el->write_log_message('Student Transport Fee List Creation:Fee Structure Fetch Error. ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                            mysqli_rollback($dbhandle);
                            $json=array("status"=>"Error","message"=>"Database Error: Not able to get Transport Fee Structure information details. Please try again later.");
                            $json=json_encode($json);
                            return $json; 
                        }
                        $result_set = $FeeClusterFeeList_prepare->get_result(); //exucuting fee_structure_table select statgement for the selected installment id to get fee list records.
                        $Installment_Amount=0;
                        $SFMId=sequence_number('student_fee_master',$dbhandle); 
                        while($row = $result_set->fetch_assoc()) //step1c.
                            {
                                //step1d.
                                $Installment_Amount=$BusFare*$row["Fee_Amount"]; //Here $row["Fee_Amount"] denotes the month count value present in the fee structure table for transport fee structrue installment month to be taken. It's range can be from 0 to 12.
                                $SFD_Id = sequence_number('student_fee_details',$dbhandle);
                                //Calculating Discount Amount.
                                $StudentFeeList_sql="INSERT INTO `student_fee_details`(`SFD_Id`,`SFM_Id`,`FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Enabled`, `Updated_By`) VALUES ($SFD_Id,$SFMId,$TFG_Id," . $row["Fee_Head_Id"] . "," . $row["Fee_Installment_Type"] . "," . $row["Installment_Id"] . "," . $Installment_Amount . ",1,'" . $_SESSION["LOGINID"]."')";
                                //echo $StudentFeeList_sql . "<br>";
                                $StudentFeeList_result=$dbhandle->query($StudentFeeList_sql);
                                if(!$StudentFeeList_result)
                                    {
                                        $error_msg = $dbhandle->error;
                                        $sql=$StudentFeeList_sql;
                                        $el = new LogMessage();
                                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                        $el->write_log_message('Student Transport Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                        mysqli_rollback($dbhandle);
                                        $StudentFeeDetailsError=true;
                                        //die("Database Error. Please contact application support team.");

                                    }
                            }
                        
                        $StudentFeeMaster_sql="INSERT INTO `student_fee_master`(`SFM_Id`, `FG_Id`, `Installment_Id`, `Total_Amount`, `Pay_Status`,  `Student_Id`, `Session`, `Installment_Month`, `School_Id`, `Updated_By`) VALUES ($SFMId,$TFG_Id,$InstallmentId, $Installment_Amount,'Unpaid','$StudentId','$session'," . $InstallmentList_row["Installment_Month"] . "," . $_SESSION["SCHOOLID"] . ",'" . $_SESSION["LOGINID"] . "')";
                        //echo $StudentFeeMaster_sql . '<br>';
                        $StudentFeeMaster_result=$dbhandle->query($StudentFeeMaster_sql);
                        if(!$StudentFeeMaster_result)
                            {
                                    //echo 'master failed';
                                    $StudentFeeMasterError=true;
                                    $error_msg = $dbhandle->error;
                                    $sql=$StudentFeeMaster_sql;
                                    $el = new LogMessage();
                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                    $el->write_log_message('Student Transport Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                    mysqli_rollback($dbhandle);
                                    
                                    //die("Database Error. Please contact application support team.");
                            } 
                    }

                    $UpdateStudentClassDetails_sql="update student_class_details set Transport_FG_Id=$TFG_Id where Session='$session' and Student_Id='$StudentId' and Class_id=$ClassId and School_Id=". $_SESSION["SCHOOLID"] . " and Enabled=1";
                    //echo  $UpdateStudentClassDetails_sql;
                    $UpdateStudentClassDetails_result=$dbhandle->query($UpdateStudentClassDetails_sql);
                    if(!$UpdateStudentClassDetails_result)
                        {
                                    //echo 'master failed';
                                    $error_msg = $dbhandle->error;
                                    $sql=$UpdateStudentClassDetails_sql;
                                    $el = new LogMessage();
                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                    $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                    //mysqli_rollback($dbhandle);
                                    $json=array("status"=>"Error","message"=>"Database Error: Not able to update fee group informatio to student class details section. Please try again later.");
                                    $json=json_encode($json);
                                    return $json;
                        } 
                //var_dump($StudentFeeDetailsError);
                //var_dump($StudentFeeMasterError);        
                        
                if(!$StudentFeeMasterError and !$StudentFeeDetailsError)
                    {    
                        mysqli_commit($dbhandle);  
                        echo "Student Transport Fee Generated Successfully.";  
                        $json=array("status"=>"success","message"=>"Student Transport Fee Generated Successfully.");
                        $json=json_encode($json);
                        return $json; 
                    }
                else    
                    {
                        mysqli_rollback($dbhandle);  
                        //echo "Student Fee Generation Error..";  
                        $json=array("status"=>"Error","message"=>"Some Error Occured. Failed to generate student Transport fee structure. Please try again.");
                        $json=json_encode($json);
                        return $json; 
                    }                                            
    }


        $json=''; //Json variable which will return to client request.   
        mysqli_autocommit($dbhandle,false);
        //Capturing request data.
        $StudentId=$_REQUEST["studentid"];  //SAMPLE STUDENT ID.
        $session=$_REQUEST["session"];      
        $StopageId=$_REQUEST["stopage"];      
        //Fetching Student_Id class information for the sessoin.
        $StudentDetails_sql="select * from student_class_details where student_id='$StudentId' and session='$session' and enabled=1";
        //echo $StudentDetails_sql . '<br>';
        $StudentDetails_result=$dbhandle->query($StudentDetails_sql);
        if(!$StudentDetails_result)
            {
                //Database Error handling while fetching student class detail information.
                $error_msg = $dbhandle->error;
                $sql=$StudentDetails_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $json=array("status"=>"Error","message"=>"Database Error: Not able to get Student class details. Please try again later.");
                $json=json_encode($json);
                echo $json;     
            }

        if($StudentDetails_result->num_rows==0)
            {
                //Error Handling if no class information found.    
                $error_msg = $dbhandle->error;
                $sql=$StudentDetails_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Fee Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $json=array("status"=>"Error","message"=>"Student class record not found. Please try again.");
                $json=json_encode($json);
                echo $json;
            }
        //Fetching Student class and concession group information.    
        $StudentDetails_row=$StudentDetails_result->fetch_assoc();
        $Class_id=$StudentDetails_row["Class_Id"];
        $Stream=$StudentDetails_row["Stream"];
        $Student_Type=$StudentDetails_row["Student_Type"];
        //$Concession_Id=$StudentDetails_row["Concession_Id"]; 

 
        //Finding Transport Fee Group Id.
        $FeeClusterId_sql="SELECT FGT.FG_Id FROM fee_group_table fgt WHERE fgt.student_type='$Student_Type' AND fgt.school_id=" . $_SESSION["SCHOOLID"] . " AND fgt.Fee_Group_Type='Transport'";
        //echo $FeeClusterId_sql;
        $FeeClusterId_result=$dbhandle->query($FeeClusterId_sql);
        if(!$FeeClusterId_result)
            {
                //Databae error handling while fetching Fee Group Information.
                $error_msg = "Transport Fee Cluster Id not found.";
                $sql=$FeeClusterId_sql;
                $el = new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Student Transport Fee List Creation ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                mysqli_rollback($dbhandle);
                $json=array("status"=>"Error","message"=>"Database Error. Please try again.");
                $json=json_encode($json);
                echo $json;
            }
        //Fetching Regular Fee Group id information    
        $FeeClusterId_row=$FeeClusterId_result->fetch_assoc();
        $TFG_Id=$FeeClusterId_row["FG_Id"]; 
        $Transport_result=Add_Transport_Fee($dbhandle,$StudentId,$TFG_Id,$session,$StopageId,$Class_id);
        echo $Transport_result;    
?>    