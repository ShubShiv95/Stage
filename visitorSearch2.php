<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
                            $getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitortype,vpm.visitor_purpose as visitpurpose from visitor_enquiry_table vet,visitor_type_master vtm,visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and "; 
                            if($_REQUEST["visitortype"]=='0'){

                                null;
                            }    
                            else{    
                                    $getVisitorEnquiry_sql=$getVisitorEnquiry_sql . "visitor_type_id='" . $_REQUEST["visitortype"] . " ' and ";
                                }                                          
                            
                            if($_REQUEST["visitpurpose"]=='0'){

                                null;
                            }    
                            else{    
                                    $getVisitorEnquiry_sql=$getVisitorEnquiry_sql . "visit_purpose_id='" . $_REQUEST["visitpurpose"] . " ' and ";
                                }                                          
                                
                                $getVisitorEnquiry_sql=$getVisitorEnquiry_sql . " vet.date_of_visit between str_to_date('" . $_REQUEST["fromdate"] . "','%d/%m/%Y') and str_to_date('" . $_REQUEST["todate"] . "','%d/%m/%Y') and ";            

                                $getVisitorEnquiry_sql=$getVisitorEnquiry_sql . " vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
                         
                            
                                //$getVisitorEnquiry_sql="select *,date_format(vet.created_on,'%d-%m-%Y') as createdon from visitor_enquiry_table vet,visitor_type_master vtm,visit_purpose_master vpt where out_time is null or date_format(created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y') and school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
                            //echo $getVisitorEnquiry_sql;
                            
                            $getVisitorEnquiry_result=mysqli_query($dbhandle,$getVisitorEnquiry_sql);
                            $rowcount=$getVisitorEnquiry_result->num_rows;
                            if(!$getVisitorEnquiry_result)
                                        {
                                            $error_msg=mysqli_error($dbhandle);
                                            $sql="";
                                            $el=new LogMessage();
                                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                            $el->write_log_message('View Feedback Note',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                            //$_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch Student Enquiry list array. Please try after some time.</h1>";
                                            //$dbhandle->query("unlock tables");
                                            //mysqli_rollback($dbhandle);
                                            //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                            //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                           // $str_end='</div>';
                                            //echo $str_start.$messsage.$str_end;
                                        } 
                                        
                                    $str= '<div class="table-responsive">
                                        <table class="table display data-table text-nowrap dataTable no-footer" id="visitor-list">
                                            <thead>
                                                <tr>
                                                    <th width="5%"><label class="form-check-label">SL NO</label>
                                                    <!--div class="form-check">
                                                            <!--input type="checkbox" class="form-check-input checkAll"-->
                                                            
                                                    </div-->
                                                    </th>
                                                    <th width="10%">Visitor Name</th>
                                                    <th width="10%">Visitor Type</th>
                                                    <th width="10%">Visit Purpose</th>
                                                    <th width="10%">Contact No.</th>
                                                    <th width="10%">Address</th>
                                                    <th width="5%">No Of Person</th>
                                                    <th width="10%">Date</th>
                                                    <th width="5%">In Time</th>
                                                    <th width="10%">Out Time</th>
                                                    <th width="20%">Photo</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                    
                                                        $cnt=1;
                                                        while($getVisitorEnquiry_row=$getVisitorEnquiry_result->fetch_assoc()){                    
                                                            $str=$str.'<tr id=id="visitor"' . $cnt . '>
                                                                    <td>' . $cnt . '
                                                                        <!--div class="form-check">
                                                                            <!--input type="checkbox" class="form-check-input">
                                                                            <label class="form-check-label"></label>
                                                                        </div-->
                                                                    </td>
                                                                    <td>' . $getVisitorEnquiry_row["visitor_name"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["visitortype"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["visitpurpose"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["contact_no"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["location"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["no_of_person"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["date_of_visit"] .  '</td>
                                                                    <td>' . $getVisitorEnquiry_row["in_time"] .  '</td>
                                                                    <td id="td_outtime'.$cnt.'">' . ($getVisitorEnquiry_row["out_time"]!="" ? $getVisitorEnquiry_row["out_time"] : '<input type="time" step="1" min='. "'1:00'" . " max='12:59' " . ' id="outtime' . $cnt . '" name="outtime" class="form-control"> <img src="img/update-icon.png" class="update" alt="update" onClick="outtime(' . "'outtime" . $cnt . "'," . $getVisitorEnquiry_row["veid"] .  ",'td_outtime" . $cnt ."'" . ');" />').' </td>
                                                                    <td class="text-center"><img src="app_images/visitors/visitor' . $getVisitorEnquiry_row["veid"]. '.png" alt="visitor"></td>
                                                                </tr>';
                                                            $cnt++;
                                                        }
                                                 
                                            $str=$str.'</tbody>
                                        </table>
                                    </div>';
                                echo $str;                                
                                    ?> 
