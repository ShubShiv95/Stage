<?php
session_start();
include 'dbobj.php';
include 'error_log.php';
include 'security.php';
include 'crawlerBhashSMS.php';
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Admission Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
	<!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
	
  
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper bg-ash">
            <!-- Header Menu Area Start Here -->
            <?php include ('includes/navbar.php') ?>
            <!-- Header Menu Area End Here -->
            <!-- Page Area Start Here -->
            <div class="dashboard-page-one">
                <!-- Sidebar Area Start Here -->
                <?php 
                include 'includes/sidebar.php'; 
                ?>
                <!-- Sidebar Area End Here -->
                <div class="dashboard-content-one">
                    <!-- Hot Links Area Start Here -->
                    <?php include ('includes/hot-link.php'); ?>
                    <!-- Hot Links Area End Here -->
                    <!-- Breadcubs Area Start Here -->
                    <div class="breadcrumbs-area">
                    <!--<div class="col-xl-2 col-lg-4 col-4 fsec">
                        <h3>Visitor Eqnuiry</h3>
                    </div>-->
                                
                    <ul>
                            <li>
                                <a href="dashboard.php">Home</a>
                            </li>
                            <li>Communication</li>
                        </ul>
                        
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!--<div class="page-title-section">
                    <i class="flaticon-mortarboard"></i>&nbsp;Admission Eqnuiry
                    </div>-->
                    
                    <!-- Admit Form Area Start Here -->
                    <div class="card height-auto">
                        <div class="card-body bg-skybluelight">
                        <!-- <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Add New Students</h3>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false">...</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-times text-orange-red"></i>Close</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                    </div>
                                </div>
                            </div> -->
                            
                    

                        
                    <!-- Tab Area Start Here -->

                        <!--Feedback Note Display Here-->
            
                    

                                <div class="card ui-tab-card">
                                    <div class="card-body bg-skybluelight">
                                        <div class="card ui-tab-card">
                                            <div class="card-body">
                                                <div class="heading-layout1 mg-b-25">
                                                    <div class="item-title">
                                                        <h3>Communication System::<span>Message Balance: <?php echo crawlerBhashSMS('CHECK_BALANCE');?></span></h3>
                                                    </div>
                                                           
                                                </div>

                                                <div class="border-nav-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#tab7" role="tab" aria-selected="true">Individual Communication</a>
                                                        </li>
                                                        <!--li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Close Group Communication</a>
                                                        </li-->
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-selected="false">Group Communication</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="tab7" role="tabpanel">
                                                            <form class="new-added-form" action="individualSms2.php" method="post">
                                
                                                                <div class="row bg-skybluelight">
                                                                        
                                                                    <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
                                                                            <div class="row" id="Select-level1-div">
                                                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                        <label>Message To*</label>
                                                                                        <select class="select2" id="L1-Select1" name="user_type" required onChange="Communication_Call1(this.value);">
                                                                                        <option value="0">Select Message To </option>
                                                                                        
                                                                                        <?php
                                                                                        $query='select * from user_type_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                                                                                        $result=mysqli_query($dbhandle,$query);
                                                                                        if(!$result)
                                                                                            {
                                                                                                //var_dump($getStudentCount_result);
                                                                                                $error_msg=mysqli_error($dbhandle);
                                                                                                $el=new LogMessage();
                                                                                                $sql=$query;
                                                                                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                                                                $el->write_log_message('Individual Message ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                                                                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch user type value from user_type_master_table. Please try after some time.</h1>";
                                                                                                $dbhandle->query("unlock tables");
                                                                                                mysqli_rollback($dbhandle);
                                                                                                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                                                                $messsage='Error: Eearch Inquiry Not Saved.  Please consult application consultant.';
                                                                                                //$str_end='</div>';
                                                                                                //echo $str_start.$messsage.$str_end;
                                                                                                //echo "";
                                                                                                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                                                            }
                                                                                        while($row=mysqli_fetch_assoc($result))
                                                                                        {
                                                                                        $str='<option value="' . $row["utype_id"] . '">' .  $row["user_type"];
                                                                                        
                                                                                            echo $str;
                                                                                        }
                                                                                        ?>
                                                                                        </select>
                                                                                    </div>
                                                                            </div>   

                                                                            <div class="row" id="Select-level2-div1">
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                    <label>&nbsp;</label>
                                                                                    <select class="select2" id="L2-Select1" name="L2-Select" required onChange="Communication_Call2('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');" >
                                                                                    
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row" >
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="Select-level3-div">
                                                                                <label>&nbsp;</label>
                                                                                    <select class="select2" id="L3-Select1" name="L3-Select" required onChange="getStuNumList(this.value);">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <BR>
                                                                            <div class="row" >    
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="unknownNo-div">
                                                                                    <label>Enter 10 digit Mobile Numbers separated with semicolon ( ; ) *</label>
                                                                                    <textarea class="textarea form-control" name="messagedetail" id="messagedetail1" cols="10" rows="4" onkeyup="restrict_textlength('messagedetail','300');"></textarea>
                                                                                </div>  
                                                                            </div> 
                                                                        
                                                                            <div class="row">

                                                                                <div class="col-xl-12 col-lg-12 col-12 tabular-section-detail" id="Select-level4-subdiv11">
                                                                                
                                                                                    <div class="table-responsive">
                                                                                        <table class="table display data-table text-nowrap">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th> 
                                                                                                        <div >
                                                                                                            
                                                                                                            <label>Select Individuals</label>
                                                                                                        </div>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                        
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                    </div>   
                                                                        
                                                                    <div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                <label>Title *</label>
                                                                                <input type="text" id="messagetitle1" name="messagetitle" placeholder="" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                            <label>Compose Messeage *</label>
                                                                            <textarea class="textarea form-control" name="composemsg" id="composemsg1" cols="10" rows="8" onkeyup="restrict_textlength('composemsg','480');return smsLength('composemsg');" required></textarea>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group char-count" id="charCount-div1">
                                                                            <span id="charCount-span">Character Count:</span>
                                                                            </div>
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group sms-count" id="smsCount-div1" >
                                                                            <span id="smsCount-span">Sms Count:</span>
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <!--span>Message Balance: <?php //echo crawlerBhashSMS('CHECK_BALANCE');?></span-->
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>Message Sending Date</span>
                                                                            </div>
                                                                        <div class="col-xl-5 col-lg-5 col-12 form-group">
                                                                            <input type="text" id="messagedate1" name="messagedate" placeholder="Select Date" class="form-control air-datepicker future-date" data-position='bottom right' required>
                                                                                <i class="far fa-calendar-alt messagedate"></i>
                                                                            
                                                                        </div>

                                                                        <div class="col-xl-3 col-lg-3 col-12 form-group">
                                                                            <input type="time" id="messagetime1" name="messagetime" class="form-control" required>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <span>Message As</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="messagetype">
                                                                            
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>SMS</span> <input type="checkbox" id="smsmessage1" name="smsmessage" value="1" class="">
                                                                            </div>

                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>What's App</span> <input type="checkbox" id="whatsappmessage1" name="whatsappmessage" value="1" class="">
                                                                            </div>
                                                                        
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group btncomm">
                                                                            <button type="submit" id="sendmessage1" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                
                                                            </form>
                                                        </div>

                                                        <!--div class="tab-pane fade" id="tab8" role="tabpanel">
                                                            <form class="new-added-form" action="individualSms2.php" method="post">
                                    
                                                                <div class="row bg-skybluelight">
                                                                        
                                                                    <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
                                                                            <div class="row" id="Select-level1-div2">
                                                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                        <label>Message To*</label>
                                                                                        <select class="select2" id="L1-Select2" name="user_type2" required onChange="Communication_Call1(this.value);">
                                                                                        <option value="0">Select Message To </option>
                                                                                        
                                                                                        <?php
                                                                                        $query='select * from user_type_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                                                                                        $result=mysqli_query($dbhandle,$query);
                                                                                        if(!$result)
                                                                                            {
                                                                                                //var_dump($getStudentCount_result);
                                                                                                $error_msg=mysqli_error($dbhandle);
                                                                                                $el=new LogMessage();
                                                                                                $sql=$query;
                                                                                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                                                                $el->write_log_message('Individual Message ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                                                                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch user type value from user_type_master_table. Please try after some time.</h1>";
                                                                                                $dbhandle->query("unlock tables");
                                                                                                mysqli_rollback($dbhandle);
                                                                                                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                                                                $messsage='Error: Eearch Inquiry Not Saved.  Please consult application consultant.';
                                                                                                //$str_end='</div>';
                                                                                                //echo $str_start.$messsage.$str_end;
                                                                                                //echo "";
                                                                                                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                                                            }
                                                                                        while($row=mysqli_fetch_assoc($result))
                                                                                        {
                                                                                        $str='<option value="' . $row["utype_id"] . '">' .  $row["user_type"];
                                                                                        
                                                                                            echo $str;
                                                                                        }
                                                                                        ?>
                                                                                        </select>
                                                                                    </div>
                                                                            </div>   

                                                                            <div class="row" id="Select-level2-div">
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                    <label>&nbsp;</label>
                                                                                    <select class="select2" id="L2-Select2" name="L2-Select2" required onChange="Communication_Call2('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');" >
                                                                                    
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row" >
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="Select-level3-div2">
                                                                                <label>&nbsp;</label>
                                                                                    <select class="select2" id="L3-Select2" name="L3-Select2" required onChange="getStuNumList(this.value);">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <BR>
                                                                            <div class="row" >    
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="unknownNo-div2">
                                                                                    <label>Enter 10 digit Mobile Numbers separated with semicolon ( ; ) *</label>
                                                                                    <textarea class="textarea form-control" name="messagedetail" id="messagedetail" cols="10" rows="4" onkeyup="restrict_textlength('messagedetail','300');"></textarea>
                                                                                </div>  
                                                                            </div> 
                                                                        
                                                                            <div class="row">

                                                                                <div class="col-xl-12 col-lg-12 col-12 tabular-section-detail2" id="Select-level4-subdiv12">
                                                                                
                                                                                    <div class="table-responsive">
                                                                                        <table class="table display data-table text-nowrap">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th> 
                                                                                                        <div >
                                                                                                            
                                                                                                            <label>Select Individuals</label>
                                                                                                        </div>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                        
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                    </div>   
                                                                        
                                                                    <div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                <label>Title *</label>
                                                                                <input type="text" id="messagetitle2" name="messagetitle" placeholder="" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                            <label>Compose Messeage *</label>
                                                                            <textarea class="textarea form-control" name="composemsg" id="composemsg2" cols="10" rows="8" onkeyup="restrict_textlength('composemsg','480');return smsLength('composemsg');" required></textarea>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group char-count" id="charCount-div2">
                                                                            <span id="charCount-span">Character Count:</span>
                                                                            </div>
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group sms-count" id="smsCount-div2" >
                                                                            <span id="smsCount-span">Sms Count:</span>
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <span>Message Balance: <?php echo crawlerBhashSMS('CHECK_BALANCE');?></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>Message Sending Date</span>
                                                                            </div>
                                                                        <div class="col-xl-5 col-lg-5 col-12 form-group">
                                                                            <input type="text" id="messagedate2" name="messagedate" placeholder="Select Date" class="form-control air-datepicker future-date" data-position='bottom right' required>
                                                                                <i class="far fa-calendar-alt messagedate"></i>
                                                                            
                                                                        </div>

                                                                        <div class="col-xl-3 col-lg-3 col-12 form-group">
                                                                            <input type="time" id="messagetime2" name="messagetime" class="form-control" required>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <span>Message As</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="messagetype">
                                                                            
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>SMS</span> <input type="checkbox" id="smsmessage2" name="smsmessage" value="1" class="">
                                                                            </div>

                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>What's App</span> <input type="checkbox" id="whatsappmessage2" name="whatsappmessage" value="1" class="">
                                                                            </div>
                                                                        
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group btncomm">
                                                                            <button type="submit" id="sendmessage2" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    
                                                                </div>

                                                            </form>
                                                        </div-->

                                                        <div class="tab-pane fade" id="tab9" role="tabpanel">
                                                            <form class="new-added-form" action="individualSms2.php" method="post">
                                    
                                                                <div class="row bg-skybluelight">
                                                                        
                                                                    <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
                                                                            <div class="row" id="Select-level1-div">
                                                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                        <label>Message To*</label>
                                                                                        <select class="select2" id="L1-Select" name="user_type" required onChange="Communication_Call1(this.value);">
                                                                                        <option value="0">Select Message To </option>
                                                                                        
                                                                                        <?php
                                                                                        $query='select * from user_type_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                                                                                        $result=mysqli_query($dbhandle,$query);
                                                                                        if(!$result)
                                                                                            {
                                                                                                //var_dump($getStudentCount_result);
                                                                                                $error_msg=mysqli_error($dbhandle);
                                                                                                $el=new LogMessage();
                                                                                                $sql=$query;
                                                                                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                                                                $el->write_log_message('Individual Message ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                                                                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch user type value from user_type_master_table. Please try after some time.</h1>";
                                                                                                $dbhandle->query("unlock tables");
                                                                                                mysqli_rollback($dbhandle);
                                                                                                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                                                                $messsage='Error: Eearch Inquiry Not Saved.  Please consult application consultant.';
                                                                                                //$str_end='</div>';
                                                                                                //echo $str_start.$messsage.$str_end;
                                                                                                //echo "";
                                                                                                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                                                            }
                                                                                        while($row=mysqli_fetch_assoc($result))
                                                                                        {
                                                                                        $str='<option value="' . $row["utype_id"] . '">' .  $row["user_type"];
                                                                                        
                                                                                            echo $str;
                                                                                        }
                                                                                        ?>
                                                                                        </select>
                                                                                    </div>
                                                                            </div>   

                                                                            <div class="row" id="Select-level2-div">
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                    <label>&nbsp;</label>
                                                                                    <select class="select2" id="L2-Select" name="L2-Select" required onChange="Communication_Call2('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');" >
                                                                                    
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row" >
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="Select-level3-div">
                                                                                <label>&nbsp;</label>
                                                                                    <select class="select2" id="L3-Select" name="L3-Select" required onChange="getStuNumList(this.value);">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <BR>
                                                                            <div class="row" >    
                                                                                <div class="col-xl-12 col-lg-12 col-12 form-group" id="unknownNo-div">
                                                                                    <label>Enter 10 digit Mobile Numbers separated with semicolon ( ; ) *</label>
                                                                                    <textarea class="textarea form-control" name="messagedetail" id="messagedetail" cols="10" rows="4" onkeyup="restrict_textlength('messagedetail','300');"></textarea>
                                                                                </div>  
                                                                            </div> 
                                                                        
                                                                            <div class="row">

                                                                                <div class="col-xl-12 col-lg-12 col-12 tabular-section-detail" id="Select-level4-subdiv1">
                                                                                
                                                                                    <div class="table-responsive">
                                                                                        <table class="table display data-table text-nowrap">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th> 
                                                                                                        <div >
                                                                                                            
                                                                                                            <label>Select Individuals</label>
                                                                                                        </div>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                        
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                    </div>   
                                                                        
                                                                    <div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                                <label>Title *</label>
                                                                                <input type="text" id="messagetitle" name="messagetitle" placeholder="" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                            <label>Compose Messeage *</label>
                                                                            <textarea class="textarea form-control" name="composemsg" id="composemsg" cols="10" rows="8" onkeyup="restrict_textlength('composemsg','480');return smsLength('composemsg');" required></textarea>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group char-count" id="charCount-div">
                                                                            <span id="charCount-span">Character Count:</span>
                                                                            </div>
                                                                            <div class="col-xl-6 col-lg-6 col-6 form-group sms-count" id="smsCount-div" >
                                                                            <span id="smsCount-span">Sms Count:</span>
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <!--span>Message Balance: <?php //echo crawlerBhashSMS('CHECK_BALANCE');?></span-->
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>Message Sending Date</span>
                                                                            </div>
                                                                        <div class="col-xl-5 col-lg-5 col-12 form-group">
                                                                            <input type="text" id="messagedate" name="messagedate" placeholder="Select Date" class="form-control air-datepicker future-date" data-position='bottom right' required>
                                                                                <i class="far fa-calendar-alt messagedate"></i>
                                                                            
                                                                        </div>

                                                                        <div class="col-xl-3 col-lg-3 col-12 form-group">
                                                                            <input type="time" id="messagetime" name="messagetime" class="form-control" required>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row">
                                                                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                                                <span>Message As</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="messagetype">
                                                                            
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>SMS</span> <input type="checkbox" id="smsmessage" name="smsmessage" value="1" class="">
                                                                            </div>

                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                                                                <span>What's App</span> <input type="checkbox" id="whatsappmessage" name="whatsappmessage" value="1" class="">
                                                                            </div>
                                                                        
                                                                            <div class="col-xl-4 col-lg-4 col-12 form-group btncomm">
                                                                            <button type="submit" id="sendmessage" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>

                  
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                            href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
	<!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
	<script src="js/myscript.js"></script>
	
    <script src="js/ajax-function.js"></script>
	<script src="js/app-functions.js"></script>


    <!--script>
        window.onload=function(){
            $("#unknownNo-div").show();
            };
       // });
    </script-->
    <script>    
     $('#L1-Select1').on('change', function(){
    	var demovalue = $(this).val(); 
    	if(demovalue ==1){
			 $("#Select-level2-div1").show();
             $("#Select-level3-div1").show();
             $('#Select-level4-subdiv11').show();
             $('#unknownNo-div1').hide();
			 
        }
        else if(demovalue ==2){
            $("#Select-level3-div1").hide();
            $('#unknownNo-div1').hide();
            $('#Select-level4-subdiv11').show();
            

        }
        else{
            $("#Select-level2-div1").hide();
             $("#Select-level3-div1").hide();
             $('#unknownNo-div1').show();
             $('#Select-level4-subdiv11').hide();
             

        }
    });
    </script>

    <script>    
     $('#L1-Select').on('change', function(){
    	var demovalue = $(this).val(); 
    	if(demovalue ==1){
			 $("#Select-level2-div").show();
             $("#Select-level3-div").show();
             $('#Select-level4-subdiv1').show();
             $('#unknownNo-div').hide();
			 
        }
        else if(demovalue ==2){
            $("#Select-level3-div").hide();
            $('#unknownNo-div').hide();
            $('#Select-level4-subdiv1').show();
            

        }
        else{
            $("#Select-level2-div").hide();
             $("#Select-level3-div").hide();
             $('#unknownNo-div').show();
             $('#Select-level4-subdiv1').hide();
             

        }
    });
    </script>
   



  <script>    
     $('#L1-Select2').on('change', function(){
    	var demovalue = $(this).val(); 
    	if(demovalue ==1){
			 $("#Select-level2-div2").show();
             $("#Select-level3-div2").show();
             $('#Select-level4-subdiv12').show();
             $('#unknownNo-div2').hide();
			 
        }
        else if(demovalue ==2){
            $("#Select-level3-div2").hide();
            $('#unknownNo-div2').hide();
            $('#Select-level4-subdiv12').show();
            

        }
        else{
            $("#Select-level2-div2").hide();
             $("#Select-level3-div2").hide();
             $('#unknownNo-div2').show();
             $('#Select-level4-subdiv12').hide();
             

        }
    });
    </script>
   
</body>

</html>