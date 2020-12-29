<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

/*********** sving driver name ************/
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
                $query_insert = "INSERT INTO `transport_route_charge_table`(`TRCT_Id`,`Route_Id`, `Charges`, `Session`, `School_Id`, `Updated_By`,`Is_Enabled`) VALUES (?,?,?,?,?,?,?)";
                $query_insert_prepare = $dbhandle->prepare($query_insert);
                $query_insert_prepare->bind_param("iiiiisi",$route_fee_id,$_REQUEST['route_name'],$_REQUEST['route_amount'],$_SESSION["SESSION"],$_SESSION["SCHOOLID"],$_SESSION["LOGINID"],$enable_fee);
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

?>