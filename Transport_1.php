<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

/*********** saving driver name ************/
if(isset($_REQUEST['driver_form_sender'])){
    if (empty($_REQUEST['driver_form_sender'])){
    mysqli_autocommit($dbhandle, false);
    if (empty($_REQUEST['staff_name'])) {
        echo '<p class="text-danger">Please Select Driver</p>';
    }
    else if (empty($_REQUEST['license_no'])) {
        echo '<p class="text-danger">Please Enter License No</p>';
    }else{
        // check existed driver
        $query_driver = "SELECT * FROM transport_driver_table WHERE Staff_Id = ?";
        $query_driver_prep = $dbhandle->prepare($query_driver);
        $query_driver_prep->bind_param("i",$_REQUEST['staff_name']);
        $query_driver_prep->execute();
        $result_set = $query_driver_prep->get_result();
        if ($result_set->num_rows>0) {
            echo '<p class="text-danger">Driver Already Existed. Try With Another Name</p>';
            die;
        }
        else{
            $driver_id = $assignmentId = sequence_number('transport_driver_table',$dbhandle);
            $query_insert = "INSERT INTO `transport_driver_table`(`Driver_Id`, `Staff_Id`, `Liscence_No`, `Remarks`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
            $query_insert_prepare = $dbhandle->prepare($query_insert);
            $query_insert_prepare->bind_param("iissis",$driver_id,$_REQUEST['staff_name'],$_REQUEST['license_no'],$_REQUEST['driver_remarks'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
            if ($query_insert_prepare->execute()) {
                echo '<p class="text-success">Driver Added Successfully</p>';
            }
            else
            {
                $error_msg = $query_insert_prepare->error;
                $errors[] = $error_msg;
                $el = new LogMessage();
                $sql = $query_insert;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Create Driver ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                mysqli_rollback($dbhandle);
                $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                die;
            }
            mysqli_commit($dbhandle);   
        }   
        }
    }
}

/************** display driver details ****************/
if (isset($_REQUEST['get_drivers'])) {
    $query_driver = "SELECT tdt.*, smt.Staff_Name FROM transport_driver_table tdt, staff_master_table smt WHERE tdt.Staff_Id = smt.Staff_Id AND tdt.School_Id = ? ORDER BY tdt.Driver_Id DESC LIMIT 20";
    $query_driver_prep = $dbhandle->prepare($query_driver);
    $query_driver_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_driver_prep->execute(); $data = array();
    $result_set = $query_driver_prep->get_result();
    while ($row_driver = $result_set->fetch_assoc()) {
        $data[] = $row_driver;
    }
    echo json_encode($data);
}

// edit driver details

// delete driver
if (isset($_REQUEST['delete_driver'])) {
    
}

/********************** route controllers ************************/

////////// saving route //////////
if (isset($_REQUEST['route_sender'])){
    if (empty($_REQUEST['route_sender'])) {
        mysqli_autocommit($dbhandle, false);
        if (empty($_REQUEST['route_name'])) {
            echo '<p class="text-danger">Please Typre Route Name</p>';
        }
        else if (empty($_REQUEST['route_description'])) {
            echo '<p class="text-danger">Please Type Route Details</p>';
        }else{
            // check existed route
            $query_driver = "SELECT * FROM `transport_route_table` WHERE `Route_Name` = ?";
            $query_driver_prep = $dbhandle->prepare($query_driver);
            $query_driver_prep->bind_param("s",$_REQUEST['route_name']);
            $query_driver_prep->execute();
            $result_set = $query_driver_prep->get_result();
            if ($result_set->num_rows>0) {
                echo '<p class="text-danger">Route Already Existed. Try With Another Name</p>';
                die;
            }
            else{
                $route_id = $assignmentId = sequence_number('transport_route_table',$dbhandle);
                $query_insert = "INSERT INTO `transport_route_table`(`Route_Id`, `Route_Name`, `Route_Description`, `School_Id`, `Updated_By`,`Enabled`) VALUES (?,?,?,?,?,1)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("issis",$route_id,$_REQUEST['route_name'],$_REQUEST['route_description'],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"]);
                if ($query_insert_prepare->execute()) {
                    echo '<p class="text-success">Route Added Successfully</p>';
                }
                else
                {
                    $error_msg = $query_insert_prepare->error;
                    $errors[] = $error_msg;
                    $el = new LogMessage();
                    $sql = $query_insert;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Create Route ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
                mysqli_commit($dbhandle);   
            }   
            }        
    }
}

/************** display driver details ****************/
if (isset($_REQUEST['get_routes'])) {
    $query_route = "SELECT * FROM `transport_route_table` WHERE School_Id = ? ORDER BY `Route_Id` DESC LIMIT 20";
    $query_route_prep = $dbhandle->prepare($query_route);
    $query_route_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_route_prep->execute(); $data = array();
    $result_set = $query_route_prep->get_result();
    while ($row_route = $result_set->fetch_assoc()) {
        $data[] = $row_route;
    }
    echo json_encode($data);
}

/********************** route controllers fee ************************/

////////// saving route fee //////////
if (isset($_REQUEST['route_fee_Sender'])){
    if (empty($_REQUEST['route_fee_Sender'])) {
        mysqli_autocommit($dbhandle, false);
        if (empty($_REQUEST['route_name'])) {
            echo '<p class="text-danger">Please Typre Route Name</p>';
        }
        else if (empty($_REQUEST['route_amount'])) {
            echo '<p class="text-danger">Please Type Route Charge</p>';
        }else{
            // check existed route
            $query_route_chg = "SELECT * FROM `transport_route_charge_table` WHERE `Route_Id` = ? AND `School_Id` = ?";
            $query_route_chg_prep = $dbhandle->prepare($query_route_chg);
            $query_route_chg_prep->bind_param("is",$_REQUEST['route_name'],$_SESSION["SCHOOLID"]);
            $query_route_chg_prep->execute();
            $result_set = $query_route_chg_prep->get_result();
            if ($result_set->num_rows>0) {
                echo '<p class="text-danger">Route Fee Already Existed. Try With Another!!!</p>';
                die;
            }
            else{
                if (empty($_REQUEST['enable_route_fee'])) {
                    $enable_fee = 0;
                }
                else{
                    $enable_fee = 1;
                }
                $route_fee_id = $assignmentId = sequence_number('transport_route_charge_table',$dbhandle);
                $query_insert = "INSERT INTO `transport_route_charge_table`(`TRCT_Id`, `Route_Id`, `Charges`, `Session`, `Enabled`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("iiiiiis",$route_fee_id,$_REQUEST['route_name'],$_REQUEST['route_amount'],$_SESSION["SESSION"],$_SESSION["SCHOOLID"],$enable_fee,$_SESSION["LOGINID"]);
               
                if ($query_insert_prepare->execute()) {
                    echo '<p class="text-success">Route Fee Added Successfully</p>';
                }
                else
                {
                    $error_msg = $query_insert_prepare->error;
                    $errors[] = $error_msg;
                    $el = new LogMessage();
                    $sql = $query_insert;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Create Route ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                    $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
                mysqli_commit($dbhandle);   
            }   
            }        
    }
}

/************** display driver details ****************/
if (isset($_REQUEST['get_routes_fee'])) {
    $query_route = "SELECT trct.*, trt.Route_Name FROM transport_route_charge_table trct, transport_route_table trt WHERE trt.Route_Id = trct.Route_Id AND trct.School_Id = ? ORDER BY trct.TRCT_Id DESC LIMIT 20";
    $query_route_prep = $dbhandle->prepare($query_route);
    $query_route_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_route_prep->execute(); $data = array();
    $result_set = $query_route_prep->get_result();
    while ($row_route = $result_set->fetch_assoc()) {
        $data[] = $row_route;
    }
    echo json_encode($data);
}

/************** stoppage pickup controller ****************/
if (isset($_REQUEST['pickup_data_sender'])) {
    if (empty($_REQUEST['pickup_data_sender'])) {
        mysqli_autocommit($dbhandle, false);
        if (empty($_REQUEST['route_name'])) {
            echo '<p class="text-danger">Please Typre Route Name</p>';
        }
        else if (empty($_REQUEST['pick_up_name'])) {
            echo '<p class="text-danger">Please Type Route Stoppage</p>';
        }
        else if (empty($_REQUEST['pick_up_no'])) {
            echo '<p class="text-danger">Please Type Route Stoppage Number</p>';
        }        
        else if (empty($_REQUEST['pick_up_address'])) {
            echo '<p class="text-danger">Please Type Route Stoppage Address</p>';
        }   
        else if (empty($_REQUEST['pick_up_distance'])) {
            echo '<p class="text-danger">Please Type Route Stoppage Dispance</p>';
        }                
        else if (empty($_REQUEST['pick_hour'])) {
            echo '<p class="text-danger">Please Select Pick Minute</p>';
        }  
        else if (empty($_REQUEST['pick_minute'])) {
            echo '<p class="text-danger">Please Select Pick Hour</p>';
        }  
        else if (empty($_REQUEST['pick_meridian'])) {
            echo '<p class="text-danger">Please Select Pick Meridian</p>';
        }  
        else if (empty($_REQUEST['drop_hour'])) {
            echo '<p class="text-danger">Please Select Drop Minute</p>';
        }  
        else if (empty($_REQUEST['drop_minute'])) {
            echo '<p class="text-danger">Please Select Drop Hour</p>';
        }  
        else if (empty($_REQUEST['drop_meridian'])) {
            echo '<p class="text-danger">Please Select Drop Meridian</p>';
        }    
        else if (empty($_REQUEST['pick_up_charge'])) {
            echo '<p class="text-danger">Please Type Charge</p>';
        }                        
        else{
            // check existed route
            $query_route_chg = "SELECT * FROM `transport_stopage_table` WHERE `Route_Id` =? AND `Stopage_Name` = ? AND `School_Id` = ?";
            $query_route_chg_prep = $dbhandle->prepare($query_route_chg);
            $query_route_chg_prep->bind_param("isi",$_REQUEST['route_name'],$_REQUEST['pick_up_name'],$_SESSION["SCHOOLID"]);
            $query_route_chg_prep->execute();
            $result_set = $query_route_chg_prep->get_result();
            if ($result_set->num_rows>0) {
                echo '<p class="text-danger">Stoppage Fee Already Existed. Try With Another!!!</p>';
                die;
            }
            else{
               
                if ($_REQUEST['pick_meridian'] == 'PM') {
                    $pick_hr=12+$_REQUEST['pick_hour'];
                }else{
                    $pick_hr=$_REQUEST['pick_hour'];
                }
               
                if ($_REQUEST['drop_meridian'] == 'PM') {
                    $drop_hr=12+$_REQUEST['drop_hour'];
                }
                else{
                    $drop_hr=   $_REQUEST['drop_hour'];
                }
                $pickup_time = $pick_hr.':'.$_REQUEST['pick_minute'].':00'; 
                $drop_time = $drop_hr.':'.$_REQUEST['drop_minute'].':00';
                $route_fee_id = $assignmentId = sequence_number('transport_stopage_table',$dbhandle);
                $query_insert = "INSERT INTO `transport_stopage_table`(`Stopage_Id`, `Stopage_Name`, `Stopage_No`, `Stopage_Address`, `Route_Id`, `Distance`, `Pickup_Time`, `Drop_Time`, `Charges`, `Enabled`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?,?,?,1,?,?)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("isisiissiis",$route_fee_id, $_REQUEST['pick_up_name'],$_REQUEST['pick_up_no'], $_REQUEST['pick_up_address'], $_REQUEST['route_name'], $_REQUEST['pick_up_distance'], $pickup_time, $drop_time, $_REQUEST['pick_up_charge'], $_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
                if ($query_insert_prepare->execute()) {
                    echo '<p class="text-success">Stoppage Fee Added Successfully</p>';
                }
                else
                {
                    $error_msg = $query_insert_prepare->error;
                    $el = new LogMessage();
                    $sql = $query_insert;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Create Route ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                   echo $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
                mysqli_commit($dbhandle); 
            }   
            }    
    }
}

/************** display driver details ****************/
if (isset($_REQUEST['get_stoppage_fee'])) {
    $query_route = "SELECT tst.*, trt.Route_Name FROM transport_stopage_table tst, transport_route_table trt WHERE tst.Route_Id=trt.Route_Id AND tst.School_Id = ? ORDER BY tst.Stopage_Id DESC LIMIT 20";
    $query_route_prep = $dbhandle->prepare($query_route);
    $query_route_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_route_prep->execute(); $data = array();
    $result_set = $query_route_prep->get_result();
    while ($row_route = $result_set->fetch_assoc()) {
        $data[] = $row_route;
    }
    echo json_encode($data);
}

/***************** vehicle controller *******************/
if (isset($_REQUEST['vehicle_sender'])) {
    if (empty($_REQUEST['vehicle_sender'])) {
        mysqli_autocommit($dbhandle, false);
        if (empty($_REQUEST['vehicle_no'])) {
            echo '<p class="text-danger">Please Type Vehicle Number</p>';
        }
        elseif (empty($_REQUEST['vehicle_reg_no'])) {
            echo '<p class="text-danger">Please Type Vehicle Registration Number</p>';
        }
        elseif (empty($_REQUEST['vehicle_type'])) {
            echo '<p class="text-danger">Please Type Vehicle Type</p>';
        } 
        elseif (empty($_REQUEST['vehicle_capaity'])) {
            echo '<p class="text-danger">Please Type Vehicle Type</p>';
        }        
        elseif (empty($_REQUEST['route_name'])) {
            echo '<p class="text-danger">Please Select Route</p>';
        }
        elseif (empty($_REQUEST['vehicle_imei'])) {
            echo '<p class="text-danger">Please Type Vehicle IMEI Number</p>';
        }        
        elseif (empty($_REQUEST['vehicle_sim'])) {
            echo '<p class="text-danger">Please Type Vehicle SIM Number</p>';
        }  
        else
        {
            // check existed vehicle
            $query_route_chg = "SELECT * FROM `transport_vehicle_table` WHERE `Vehicle_Reg_No` =? AND `School_Id` = ?";
            $query_route_chg_prep = $dbhandle->prepare($query_route_chg);
            $query_route_chg_prep->bind_param("si",$_REQUEST['vehicle_reg_no'],$_SESSION["SCHOOLID"]);
            $query_route_chg_prep->execute();
            $result_set = $query_route_chg_prep->get_result();
            if ($result_set->num_rows>0) {
                echo '<p class="text-danger">Vehicle Already Existed. Try With Another!!!</p>';
                die;
            }
            else
            {
                $vehicle_id = $assignmentId = sequence_number('transport_vehicle_table',$dbhandle);
                $query_insert = "INSERT INTO `transport_vehicle_table`(`Vehicle_Id`, `Vehicle_Reg_No`, `Vehicle_Type`, `Vehicle_Capacity`, `Route_Id`, `IMEI_No`, `SIM_No`, `School_Id`, `Updated_By`,`Vehicle_No`) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("issiiiiisi",$vehicle_id, $_REQUEST['vehicle_reg_no'], $_REQUEST['vehicle_type'], $_REQUEST['vehicle_capaity'], $_REQUEST['route_name'], $_REQUEST['vehicle_imei'], $_REQUEST['vehicle_sim'] ,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"],$_REQUEST['vehicle_no']);
                if ($query_insert_prepare->execute()) {
                    echo '<p class="text-success">Vehicle Added Successfully</p>';
                }
                else
                {
                    $error_msg = $query_insert_prepare->error;
                    $el = new LogMessage();
                    $sql = $query_insert;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Create Route ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                   echo $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
                mysqli_commit($dbhandle); 
            }          
        }      
    }
}

// get vehicle details
if (isset($_REQUEST['get_vehicles'])) {
    $query_route = "SELECT tvt.*, trt.Route_Name FROM transport_vehicle_table tvt, transport_route_table trt WHERE trt.Route_Id = tvt.Route_Id AND tvt.School_Id = ? ORDER BY tvt.Vehicle_Id DESC LIMIT 20";
    $query_route_prep = $dbhandle->prepare($query_route);
    $query_route_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_route_prep->execute(); $data = array();
    $result_set = $query_route_prep->get_result();
    while ($row_route = $result_set->fetch_assoc()) {
        $data[] = $row_route;
    }
    echo json_encode($data);
}

/******************* vehicle route controller ******************/
if (isset($_REQUEST['vehicle_route_adder'])) {
    if (empty($_REQUEST['vehicle_route_adder'])) {
        mysqli_autocommit($dbhandle, false);
        if (empty($_REQUEST['vehicle_no'])) {
            echo '<p class="text-danger">Please Select Vehicle Number</p>';
        }
        elseif (empty($_REQUEST['driver_name'])) {
            echo '<p class="text-danger">Please Select Driver Name</p>';
        }       
        else
        {
            // check existed driver
            $query_route_chg = "SELECT * FROM `transport_vehicle_driver_table` WHERE `Vehicle_Id` = ? AND `Driver_Id` = ? AND `School_Id` = ?";
            $query_route_chg_prep = $dbhandle->prepare($query_route_chg);
            $query_route_chg_prep->bind_param("iii",$_REQUEST['vehicle_no'],$_REQUEST['driver_name'],$_SESSION["SCHOOLID"]);
            $query_route_chg_prep->execute();
            $result_set = $query_route_chg_prep->get_result();
            if ($result_set->num_rows>0) {
                echo '<p class="text-danger">Vehicle Driver Already Existed. Try With Another!!!</p>';
                die;
            }    
            else
            {
                $vehicle_driver_id = $assignmentId = sequence_number('transport_vehicle_driver_table',$dbhandle);
                $query_insert = "INSERT INTO `transport_vehicle_driver_table`(`TVDT_Id`, `Vehicle_Id`, `Driver_Id`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("iiiis",$vehicle_driver_id, $_REQUEST['vehicle_no'],$_REQUEST['driver_name'] ,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
                if ($query_insert_prepare->execute()) {
                    echo '<p class="text-success">Vehicle Driver Successfully</p>';
                }
                else
                {
                    $error_msg = $query_insert_prepare->error;
                    $el = new LogMessage();
                    $sql = $query_insert;
                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                    $el->write_log_message('Create Vehicle Driver ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                    //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                    mysqli_rollback($dbhandle);
                   echo $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                    die;
                }
                mysqli_commit($dbhandle);                 
            }        
        }
    }
}

// get vehicle driver details
if (isset($_REQUEST['get_vehicle_drivers'])) {
    $query_route = "SELECT tvdt.TVDT_Id, tvdt.Enabled, smt.Staff_Name, tvt.Vehicle_Reg_No FROM transport_vehicle_driver_table tvdt, staff_master_table smt, transport_vehicle_table tvt WHERE smt.Staff_Id = tvdt.Driver_Id AND tvt.Vehicle_Id = tvdt.Vehicle_Id AND tvdt.School_Id = ? ORDER BY tvdt.TVDT_Id DESC LIMIT 20";
    $query_route_prep = $dbhandle->prepare($query_route);
    $query_route_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_route_prep->execute(); $data = array();
    $result_set = $query_route_prep->get_result();
    while ($row_route = $result_set->fetch_assoc()) {
        $data[] = $row_route;
    }
    echo json_encode($data);
}

/*************** vehicle document controller *****************/
// add vehicle document
if (isset($_REQUEST['vehicle_doc_adder'])) {
    if (empty($_REQUEST['vehicle_doc_adder'])) {
        /*
            $_REQUEST['vehicle_name'];
            $_REQUEST['vehicle_doc_type'];
            $_REQUEST['is_validity_applicable'];
            $_REQUEST['valid_till'];
            $_FILES['vehicle_doc_name']['name'];
        */
        if (empty($_REQUEST['is_validity_applicable'])) {
            $validity = '0000-00-00';
        }
        else{
            $validity = $_REQUEST['valid_till'];
        }
        // form validation
        if (empty($_REQUEST['vehicle_name'])) {
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Alert!</strong> Please Select Vehicle.
                </div>';
        }
        else if(empty($_REQUEST['vehicle_doc_type'])){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Alert!</strong> Document Type.
                </div>';
        }
        elseif (empty($_FILES["vehicle_doc_name"]["name"])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Alert!</strong> Please Choose Document.
                </div>';
        }  
        else if (!empty($_REQUEST['is_validity_applicable']) && empty($_REQUEST['valid_till'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Please Select Validity Date.
            </div>';
        } 
        else if (empty($_REQUEST['is_validity_applicable']) && !empty($_REQUEST['valid_till'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Please Check Is Validity Applicable.
            </div>';
        }
        else{
            $document_id = sequence_number('transport_vehicle_document', $dbhandle);
            // add new record
            if ($_REQUEST['action']=="add_new_vehicle_document") {
                // saving files to server
                $directory="./app_images/vehicle_documents";
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }
                $allowed_image_extension = array("jpg", "jpeg", "pdf");
                $file_extension = strtolower(pathinfo($_FILES['vehicle_doc_name']['name'], PATHINFO_EXTENSION));
                if (!in_array($file_extension, $allowed_image_extension)) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Alert!</strong> Only (.pdf, .jpeg, .jpg) Allowed.
                            </div>';
                }
                else
                {
                    $file_name = md5($document_id . date('YmdHis')) . '.' . $file_extension;
                    $target_path = $directory.'/'.$file_name;
                    if (move_uploaded_file($_FILES['vehicle_doc_name']['tmp_name'], $target_path)) 
                    {   
                        // saving data to database
                        mysqli_autocommit($dbhandle, false);
                        $query = "INSERT INTO `transport_vehicle_document`(`Vehicle_Doc_Id`, `Vehicle_Id`, `Document_Type_Id`, `Filename`, `Valid_Date`,`School_Id`, `Updated_By`) VALUES (?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?)";
                        $query_prep = $dbhandle->prepare($query);
                        $query_prep->bind_param("iisssis",$document_id,$_REQUEST['vehicle_name'],$_REQUEST['vehicle_doc_type'],$file_name,$validity,$_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
                        if ($query_prep->execute()) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Alert!</strong> Document Saved Successfully.
                            </div>';
                        }
                        else
                        {
                            $error_msg = $query_prep->error;
                            $el = new LogMessage();
                            $sql = $query;
                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                            $el->write_log_message('Add Vehicle Documents ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                            //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                            mysqli_rollback($dbhandle);
                            $statusMsg = 'Error: Document Saving.  Please consult application consultant.';
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Alert!</strong> '.$statusMsg.'.
                            </div>';
                            die;
                        }
                        mysqli_commit($dbhandle);   
                    }
                    else
                    {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Alert!</strong> Failed to Upload File.
                            </div>';
                    }
                }
            }
            // update existing record
            if ($_REQUEST['action']=="update_existing_vehicle_document") {
                
            }
        }
    }
}

// get all vehicle documents
if (isset($_REQUEST['get_vehicle_doc'])) {
    $query = "SELECT tvd.*, tvt.Vehicle_Reg_No FROM transport_vehicle_document tvd, transport_vehicle_table tvt WHERE tvt.Vehicle_Id = tvd.Vehicle_Id AND tvd.Enabled =1 AND tvd.School_Id = ? ORDER BY tvd.Vehicle_Doc_Id DESC LIMIT 20";
    $query_prep = $dbhandle->prepare($query);
    $query_prep->bind_param("i",$_SESSION["SCHOOLID"]);
    $query_prep->execute(); $data = array();
    $result_set = $query_prep->get_result();
    while ($row = $result_set->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);   
}

/****************** assign students controller ****************/

// assign students
if (isset($_REQUEST['student_asignee'])) {
    if (empty($_REQUEST['student_asignee'])) {
        $data =array();
        if (empty($_REQUEST['student_class'])) {
            $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Alert!</strong> Please Select Class.
                            </div>';
        }

        if (empty($_REQUEST['student_section'])) {
            $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Please Select Section.
            </div>';
        }

        if (empty($_REQUEST['student_id'])) {
            $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Please Select Student.
            </div>';
        }

        if (empty($_REQUEST['pickup_type'])) {
            $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Please Choose Atleast One Pickup Type.
            </div>';
        }
        else
        {
            if ($_REQUEST['pickup_type'] =="Both" && empty($_REQUEST['stoppage_id']) && empty($_REQUEST['drop_stoppage'])) {
                $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Please Select Both Stoppages.
                </div>';
            }
            elseif ($_REQUEST['pickup_type'] =="PickupOnly" && empty($_REQUEST['stoppage_id'])) {
                $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Please Select Pickup Stoppage.
                </div>';
            }
            elseif ($_REQUEST['pickup_type'] =="DropOnly" && empty($_REQUEST['drop_stoppage'])) {
                $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Please Select Drop Stoppage.
                </div>';
            }
        }
        if (count($data['message'])<1) {
            // pickup type $_REQUEST['pickup_type'] 
            $query_check = "SELECT COUNT(TSM_Id) as total_row FROM `transport_student_map_table` WHERE `Student_Id` =? AND `Session` = ?";
            $query_check_prep = $dbhandle->prepare($query_check);
            $query_check_prep->bind_param("is",$_REQUEST['student_id'],$_SESSION['SESSION']);
            $query_check_prep->execute();
            $result_set = $query_check_prep->get_result();
            $row_check_data = $result_set->fetch_assoc();
            if ($row_check_data['total_row']>0) {
                $data['message'][] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Student Details Existed For This Session.
                </div>';
            }
            else
            {
                mysqli_autocommit($dbhandle, false);
                // save record into database
                $tsm_id = sequence_number('transport_student_map_table', $dbhandle);
                $query_ins = "INSERT INTO `transport_student_map_table`(`TSM_Id`, `Student_Id`, `Session`, `Pickup_Stopage_Id`, `Drop_Stopage_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
                $query_ins_prep = $dbhandle->prepare($query_ins);
                $query_ins_prep->bind_param("iisiis",$tsm_id,$_REQUEST['student_id'],$_SESSION['SESSION'],$_REQUEST['stoppage_id'],$_REQUEST['drop_stoppage'],$_SESSION["LOGINID"]);
                if ($query_ins_prep->execute()) {
                    $data['message'][] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Success!</strong> Student Route Assigned Successfully.
                    </div>';
                    }
                    else
                    {
                        $error_msg = $query_ins_prep->error;
                        $el = new LogMessage();
                        $sql = $query_ins;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Assign Route ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        mysqli_rollback($dbhandle);
                        $statusMsg = 'Error: Document Saving.  Please consult application consultant.';
                        $data['message'][]= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Alert!</strong> '.$statusMsg.'.
                        </div>';
                        die;
                    }
                    mysqli_commit($dbhandle);                      
            }
        }

        foreach ($data['message'] as $message) {
            echo $message;
        }
    }
}

/*************** universal apis for transport ***************/

// get all routes
if (isset($_REQUEST['api_call'])) {
    
    // get all routes
    /*
        parameters : school_id=1
        api link = ./Transport_1.php?api_call=get_all_routes&school_id=1
    */
    if ($_REQUEST['api_call']=='get_all_routes') 
    {
        $query = "SELECT * FROM `transport_route_table` WHERE `Enabled` =1 AND School_Id = ? ORDER BY `Route_Name`";
        $query_prep = $dbhandle->prepare($query);
        $query_prep->bind_param("i",$_REQUEST['school_id']);
        $query_prep->execute();
        $result_set = $query_prep->get_result();
        while($row = $result_set->fetch_assoc()){
            $data[] = array(
                "id" => $row['Route_Id'],
                "name"    =>  $row['Route_Name']
            );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    // get all stoppages 
        /*
        parameters : school_id=1, route_id=6

        api link = ./Transport_1.php?api_call=get_all_stops&school_id=1&route_id=6
    */
    if ($_REQUEST['api_call']=='get_all_stops') 
    {
        $query = "SELECT * FROM `transport_stopage_table` WHERE Enabled = 1 AND School_Id = ? AND Route_Id = ? ORDER BY Stopage_Name";
        $query_prep = $dbhandle->prepare($query);
        $query_prep->bind_param("ii",$_REQUEST['school_id'],$_REQUEST['route_id']);
        $query_prep->execute();
        $result_set = $query_prep->get_result();
        while($row = $result_set->fetch_assoc()){
            $data[] = array(
                "id" => $row['Stopage_Id'],
                "name"    =>  $row['Stopage_Name']
            );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

        // get all route vehicles
        /*
        parameters : school_id=1, route_id=6

        api link = ./Transport_1.php?api_call=get_all_vehicles&school_id=1&route_id=6
    */
    if ($_REQUEST['api_call']=='get_all_vehicles') 
    {
        $query = "SELECT * FROM `transport_vehicle_table` WHERE `Route_Id` = ? AND Enabled =1 AND School_Id = ? ORDER BY `Vehicle_Reg_No`";
        $query_prep = $dbhandle->prepare($query);
        $query_prep->bind_param("ii",$_REQUEST['route_id'],$_REQUEST['school_id']);
        $query_prep->execute();
        $result_set = $query_prep->get_result();
        while($row = $result_set->fetch_assoc()){
            $data[] = array(
                "id" => $row['Vehicle_Id'],
                "name"    =>  $row['Vehicle_Reg_No']
            );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
?>