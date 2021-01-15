<?php
include 'dbobj.php';
    if ($_REQUEST['receipt_id']) 
    {
        $total_rows = 1;
        if ($total_rows>0) 
        {
            // if row result is more than 0 then run code below else give output of line no 49
            // master array
            $success = array(
                "status"        =>  "200",
                "type"          =>  "success",
                "message"       =>  "record found"
            );

  
    //Step1: Finding Fee Details for the Recept.  Example Recept No 121
    //$receptno=$_REQUEST['receipt_id'];
    $receptno=$_REQUEST['receipt_id'];
    $schoolid=1;
   

            $data['fee_Details']= array();
            //Selecting Student Details.
            //receives recept number, school id , 
            $GetStudentDetailsSql="select smt.admission_id,smt.student_id,smt.first_name,smt.middle_name,smt.last_name,smt.father_name,smt.mother_name,smt.sms_contact_no,smt.comm_address,cmt.class_name,cst.section,cst.stream from student_master_table smt,student_class_details scd,class_master_table cmt,class_section_table cst where scd.student_id=(select distinct student_id from student_fee_master where recept_no=?) and scd.enabled=1 and scd.school_id=? and smt.student_id=scd.student_id and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id";
            $GetStudentDetailsPrep=$dbhandle->prepare($GetStudentDetailsSql);
            $GetStudentDetailsPrep->bind_param('si',$receptno,$schoolid);
            $result=$GetStudentDetailsPrep->execute();
            $result_set = $GetStudentDetailsPrep->get_result(); 
            $row = $result_set->fetch_assoc();

        
            $student_id = $row["student_id"];     
            $student_name=$row["first_name"] . ' ' . $row["middle_name"] . ' '. $row["last_name"]; 
            $admission_id=$row["admission_id"]; 
            $class=$row["class_name"] . '-' . $row["section"] . ' ' . $row["stream"];
            $parent_name=(empty($row["father_name"])? '' : $row["father_name"] . ' & ') . (empty($row["father_name"])? '' : $row["father_name"]);        
            $contact_no=$row["sms_contact_no"];       
            $address=$row["comm_address"];  
            
            //Route details are pending. Will be done after transport module work.
            $route_name="East of Dhanbad";
            $stoppage="Signature Tower More";  

            //Fetching Consolidated Fee information.
            $GetFeeMasterSql="select sfm.*,smt.staff_name,imt.installment_name from student_fee_master sfm,staff_master_table smt,installment_master_table imt where recept_no=? and sfm.school_id=? and smt.login_id=sfm.updated_by and imt.installment_id=sfm.installment_id";
            $GetFeeMasterPrep=$dbhandle->prepare($GetFeeMasterSql);
            $GetFeeMasterPrep->bind_param('si',$receptno,$schoolid);
            $result=$GetFeeMasterPrep->execute();
            $result_set = $GetFeeMasterPrep->get_result(); 
            $fee_receipt_for='';
            $staff_name='';
            $total_latefee_amount=0;
            $paid_latefee_amount=0;
            $total_due_amt=0; // total fee amount paid.
            $total_concession_amount=0; // total fee amount paid.
            $total_paid_amuont=0; // total fee amount paid.

            while($row = $result_set->fetch_assoc())
                {
                    $fee_receipt_for=$fee_receipt_for . '-' .$row["installment_name"];
                    $total_latefee_amount=$total_latefee_amount+$row["Late_Fee_Amount"];
                   
                }
            $GetFeeDetailsSql="select sfm.recept_no, sum(fee_amount) as due_amount,sum(concession_amount) as concession_amount from student_fee_master sfm,student_fee_details sfd,fee_head_table fht WHERE fht.fee_head_id=sfd.fee_head_id AND sfd.sfm_id=sfm.sfm_id AND sfm.recept_no=? and sfm.school_id=? ";
            $GetFeeDetailsPrep=$dbhandle->prepare($GetFeeDetailsSql);
            $GetFeeDetailsPrep->bind_param('is',$schoolid,$receptno);
            $result=$GetFeeDetailsPrep->execute();
            $result_set = $GetFeeDetailsPrep->get_result(); 
    
            $row = $result_set->fetch_assoc();
            $total_due_amt = $row["due_amount"];
            $total_concession_amount = $row["concession_amount"];
            $total_paid_amuont = $total_due_amt  + $total_concession_amount;
            
            $GetFeePaymentMasterSql="select *,date_format(payment_date,'%d/%m/%Y') as recept_date from fee_payment_master  where recept_no=? and school_id=? ";
            $GetFeePaymentMasterPrep=$dbhandle->prepare($GetFeePaymentMasterSql);
            $GetFeePaymentMasterPrep->bind_param('is',$schoolid,$receptno);
            $result=$GetFeePaymentMasterPrep->execute();
            $result_set = $GetFeePaymentMasterPrep->get_result(); 
    
            $row = $result_set->fetch_assoc();
            $receipt_date = $row["recept_date"];

                  

                $data['fee_Details']= array(
                    "fee_receipt_no"                =>  $receptno,
                    "fee_receipt_for"               =>  $fee_receipt_for,
                    "student_name"                  =>  $student_name,
                    "admission_no"                  =>  $admission_id,
                    "class"                         =>  $class,
                    "parent_name"                   =>  $parent_name,
                    "contact_no"                    =>  $contact_no,
                    "address"                       =>  $address,
                    "route_name"                    =>  $route_name,
                    "stoppage"                      =>  $stoppage,
                    "receipt_date"                  =>  $receipt_date,
                    "staff_name"                    =>  $staff_name,
                    "total_due_amt"                 =>  $total_due_amt,
                    "total_concession_amount"       =>  $total_concession_amount,
                    "total_paid_amuont"             =>  $total_paid_amuont
                );
                
                

            $FeePaymentDetailsSql="select * from fee_payment_master whre recept_no=?";    

            $GetFeeDetailsSql="select fee_head_name,sum(fee_amount) as due_amount,sum(concession_amount) as concession_amount from student_fee_master sfm,student_fee_details sfd,fee_head_table fht WHERE fht.fee_head_id=sfd.fee_head_id AND sfd.sfm_id=sfm.sfm_id AND sfm.recept_no=? and sfm.school_id=? group by fee_head_Name";
            $GetFeeDetailsPrep=$dbhandle->prepare($GetFeeDetailsSql);
            $GetFeeDetailsPrep->bind_param('is',$schoolid,$receptno);
            $result=$GetFeeDetailsPrep->execute();
            $result_set = $GetFeeDetailsPrep->get_result(); 

            while($row = $result_set->fetch_assoc())
                {
                    $row["installment_name"];
                    $latefee_amount=$latefee_amount+$row["late_fee_amount"];
                }

            // fee details array
           /* $data['fee_Details']= array(
                "fee_receipt_no"                =>  "12345/2020",
                "fee_receipt_for"               =>  "Apr-2020-Jul-2020",
                "student_name"                  =>  "Student Name",
                "admission_no"                  =>  "Admn No",
                "class"                         =>  "student class with section",
                "parent_name"                   => "student Parent Name",
                "contact_no"                    =>  "mobile no",
                "address"                       =>  "address",
                "route_name"                    => "bus route name",
                "stoppage"                      =>  "student drop place",
                "receipt_date"                  =>  "receipt date",
                "staff_name"                    =>  "rakesh sinha",
                "total_due_amt"                 =>  "21000",
                "total_concession_amount"       =>  "500",
                "total_paid_amuont"             =>  "20500"
            );*/
            $data['fee_Details']['payment_receiving_details']    =array(
                ["transaction_type"              =>  "Cash/Card/ert",
                "transaction_no"                =>  "1256899",
                "instrument_no"                 =>  "986989",
                "amount"                        =>  "amount received"],
               [ "transaction_type"              =>  "Cash",
                "transaction_no"                =>  "777777",
                "instrument_no"                 =>  "986989",
                "amount"                        =>  "amount received"]
            );
            $data['fee_Details']['payment_details_fee_head_wise'] = array([
                "descriptiom"                   =>  "Fee HEad name",
                "due_amount"                    =>  "5000",
                "concession"                    =>  "500",
                "paid"                          =>  "4500",
            ],
            [
                "descriptiom"                   =>  "Tution Fee",
                "due_amount"                    =>  "8000",
                "concession"                    =>  "0",
                "paid"                          =>  "8000",
            ],
            [
                "descriptiom"                   =>  "Tution Fee",
                "due_amount"                    =>  "8000",
                "concession"                    =>  "0",
                "paid"                          =>  "8000",
            ]);
        }
        else
        {
            // if number of data is less than one
            $error =array(
                "status"        =>  "500",
                "type"          =>  "error",
                "message"       =>  "no recrod found"
            );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
?>