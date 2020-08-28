<?php
session_start();
include 'dbobj.php';
include 'error_log.php';
include 'security.php';
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
                            <a href="index.php">Home</a>
                        </li>
                        <li>Follow Up Note</li>
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
                        
                        <?php
                            $aeid=$_REQUEST["aeid"];
                            $query="select aet.*,cmt.class_name as class_name,mlt.location_name as location_name,lst.lead_source_name as lead_source_name from admission_enquiry_table aet,class_master_table cmt,marketting_location_table mlt, lead_source_table lst where AEID=" . $_REQUEST["aeid"] . ' and cmt.class_id=aet.class_id and mlt.locationid=aet.locality_id and lst.leadid=aet.lead_id';
                            $result=mysqli_query($dbhandle,$query);
                            if(!$result)
                                        {
                                            $error_msg=mysqli_error($dbhandle);
                                            $sql="";
                                            $el=new LogMessage();
                                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                            $el->write_log_message('Admission Eqnuiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch Student Enquiry list array. Please try after some time.</h1>";
                                            $dbhandle->query("unlock tables");
                                            mysqli_rollback($dbhandle);
                                            $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                            $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                            $str_end='</div>';
                                            echo $str_start.$messsage.$str_end;
                                        }   
                            $result_row=$result->fetch_assoc();

            
                        ?>


						<div class="followupnote-sec">
							<div class="col-6-xxxl col-xl-6 col-lg-6 col-12 section">
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Student Name:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["STUDENT_NAME"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Enquirer Relation:</span>
								 </div> 
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								        <?php echo $result_row["ENQUIRER_RELATION"];?>
								 </div> 
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Email ID:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["EMAIL_ID"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Applying For Class:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["class_name"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Lead Source:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["lead_source_name"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Any Sibling:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								        <?php echo $result_row["SIBLING"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Remarks:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["REMARKS"];?>
								 </div>
								
								
							</div>
							<div class="col-6-xxxl col-xl-6 col-lg-6 col-12 section">
							
							     <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Enquirer Name:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["ENQUIRER_NAME"];?>	
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Contact Number:</span>
								 </div> 
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["MOBILE_NO"];?>
								 </div> 
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Locality:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["location_name"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Applying For Session:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["SESSION"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Follow Up Date:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["FOLLOWUP_DATE"];?>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Enquiry Status:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                        <?php echo $result_row["ENQUIRY_STATUS"];?>
								 </div>
								 
								 
							
							</div>
						</div>
						
						<div class="followupnote-sec-middle">
							<div class="col-6-xxxl col-xl-6 col-lg-6 col-12 section">
								<div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
									  <span>Created By:</span>
								</div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
                                 <?php echo $result_row["CREATED_BY"];?>
								</div>
							</div>
                            <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 section">
								<div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								  <span>Created On:</span>
								 </div>
								 <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 element">
								 <?php echo $result_row["CREATED_ON"];?>
								 </div>
							</div>
                            <!--****div class="col-12-xxxl col-xl-12 col-lg-12 col-12 section last">
								
								  <label>Note:</label>
								  <div class="notedata">Tish is followed by me.</div>
								 
								 
							</div-->								
						
					    </div>
                <!-- Tab Area Start Here -->

                    <!--Feedback Note Display Here-->
                        <?php
                            $getFeedbackNote_sql="select *,date_format(note_date,'%a %D %M %Y') as note_date from admission_followup_note where aeid=$aeid order by note_date asc";
                            $getFeedbackNote_result=mysqli_query($dbhandle,$getFeedbackNote_sql);
                            if(!$getFeedbackNote_result)
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
                        ?>

                        <?php
                             while($getFeedbackNote_row=$getFeedbackNote_result->fetch_assoc()){                    
                                /* 
                                echo  '<div class="card ui-tab-card">
                                            <div class="card-body">
                                                <div class="basic-tab">
                                                   <ul class="nav nav-tabs" role="tablist">
                                                          <li class="nav-item">
                                                             <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">By ' . $_SESSION["NAME"] . '  On '. $getFeedbackNote_row["note_date"] .'</a>
                                                         </li>
                                                    </ul>
                                                    <div class="tab-pane fade show active" id="tab7" role="tabpanel">
                                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" style="white-space: pre-wrap;">
                                                        ' . $getFeedbackNote_row["NOTE"] . '
                                                        </div>
                                                    
                                                    </div>

                                                </div>
                                            </div>
                                        </div>';*/

                               echo '<div class="card ui-tab-card">
                                    <div class="card-body">
                                        <div class="basic-tab">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">By ' . $_SESSION["NAME"] . '  On '. $getFeedbackNote_row["note_date"] .'</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" style="white-space: pre-wrap;">
                                                    <p><b>' . $getFeedbackNote_row["NOTE"] . '</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>'     ;   

                    }
                    ?> 





                    <!--Feedback Note Display Ends Here-->

                        <div class="card ui-tab-card">
                            <div class="card-body">
                                <div class="basic-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Post Your Feedback</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        
                                                <div class="followupnote-sec-form">
                                                
                                                <form class="mg-b-20 new-added-form" action="followupNote2.php" method="post">
                                                        <div class="row gutters-8">
                                                        <div class="col-12-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                            <!--label>Enter Followup Note</label-->
                                                            <textarea class="textarea form-control"id="feedbacknote" name="feedbacknote"  cols="10" rows="4" placeholder="Enter Your Feedback Here..."></textarea>
                                                        </div>
                                                            <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                                                                <label>Next Followup Date *</label>
                                                                <input type="text" id="followupdate" name="followupdate" placeholder="From Date" class="form-control air-datepicker"
                                                                    data-position='bottom right' required>
                                                                <i class="far fa-calendar-alt"></i>
                                                            </div>
                                                            <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                                                                <label>Select Status</label>
                                                                <select class="select2" id="enqstatus" name="enqstatus">
                                                                    <option value="ALL">All</option>
                                                                    <option value="PENDING">Pending</option>
                                                                    <option value="PROCESSING">Work in Progress</option>
                                                                    <option value="CONVERTED">Accured</option>
                                                                    <option value="CLOSED">Closed</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                <input type="hidden" name="aeid" value="<?php echo  $aeid;?>" />
                                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark update">Update Note</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

					<!--Tab Ends Here -->

						
						
						
						
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
	

</body>

</html>