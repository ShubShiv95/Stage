<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
//include 'security.php';
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SwiftCampus | Admission Form</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    function demoFromHTML(visitor) {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
		 source = $('#visitor-list')[0];
        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            }, 
            function (dispose) {	
                pdf.save('Test.pdf');
            }, margins
        );
    }
</script>
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
                        <li>Visitor Eqnuiry</li>
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
                        <form class="new-added-form" action="VisitorEnquiry2.php" method="post">
						    <input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control" required>
                            <div class="row">
							<div class="main-form-area-visitor col-xl-6 col-lg-6 col-12">
							    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Visitor Type *</label>
                                    <select class="select2" id="visitortype" name="visitortype" required>
                                        <option value="0">Select Visitor Type</option>
											<?php
                                            $query='select * from visitor_type_master where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                                            $result=mysqli_query($dbhandle,$query);
                                            if(!$result)
                                                {
                                                    //var_dump($getStudentCount_result);
                                                    $error_msg=mysqli_error($dbhandle);
                                                    $el=new LogMessage();
                                                    $sql=$query;
                                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                    $el->write_log_message('Eearch Inquiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
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
                                            $str='<option value="' . $row["vtid"] . '">' .  $row["Visitor_Type"];
                                            
                                            echo $str;
                                        }
                                        ?>
                                    </select>
                                </div>
								<div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Company Name</label>
                                    <input type="text" id="companyname" name="companyname" placeholder="" class="form-control" >
                                </div>
								<div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Visitor Name *</label>
                                    <input type="text" id="vname" name="vname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
                                </div>
								 <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Contact Number</label>
                                    <input type="text" id="contactno" name="contactno" placeholder="" class="form-control" onkeypress="return isNumberKey(event);"  onkeyup="restrict_textlength('contactno','10');">
                                </div>
							    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Purpose *</label>
                                    <select class="select2" id="purpose" name="purpose" required>
                                        <option value="0">Select Visitor Purpose</option>
											<?php
                                                 $query='select * from visit_purpose_master where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                                                $result=mysqli_query($dbhandle,$query);
                                                if(!$result)
                                                    {
                                                        //var_dump($getStudentCount_result);
                                                        $error_msg=mysqli_error($dbhandle);
                                                        $el=new LogMessage();
                                                        $sql=$query;
                                                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                        $el->write_log_message('Eearch Inquiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                        $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
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
                                                            $str='<option value="' . $row["vpid"] . '">' . $row["visitor_purpose"] . '</option>';
                                                            echo $str;
                                                        }
                                                ?>
                                    </select>
                                </div>
								<div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Location</label>
                                    <input type="text" id="location" name="location" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Person to Meet *</label>
                                    <input type="text" id="personmeet" name="personmeet" placeholder="" class="form-control" required>
                                </div>
								 <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Number of Persons *</label>
                                    <input type="text" id="nperson" name="nperson" placeholder="" class="form-control" onkeypress="return isNumberKey(event);" required>
                                </div>
                                <!--div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>In Time *</label>
                                    <input type="time" id="intime" name="intime" class="form-control" required>
                                </div-->
								<div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Note</label>
                                    <textarea class="textarea form-control" name="note" id="note" cols="10" rows="4" onkeyup="restrict_textlength('note','100');"></textarea>
                                </div>
								<div class="col-xl-12 col-lg-12 col-12 form-group">
										<button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
										<button type="button" onclick="showurl();" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
								</div>
						    </div>
							<div class="snap-area-visitor col-xl-6 col-lg-6 col-12">
                                <div class="col-xl-6 col-lg-6 col-12" id="camContainer" >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12" id="picture_from_cam" > 
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <button type="button" onclick="take_snapshot();" class="btn-fill-lg bg-blue-dark btn-hover-yellow take-snap">Take Snap</button>
                                    <input type="hidden" name="image" class="image-tag">
                                </div>
						    </div>
                               <!--/div-->
                        </form>
                        <?php
                            
                            //$getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and out_time is null or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y') and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
                            
                            //Updated by removing condition "or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y')" from the above sql. 
                            $getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and out_time is null  and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
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
                        ?>
						<div class="tabular-section-info">
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="novisitorfound"><?php //echo $getVisitorEnquiry_sql;?> </span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="fromdate"><?php// echo $earlier_date;  ?></span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="todate"><?php //echo date("d-m-Y"); ?></span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="todate"><?php //echo  $blank_out_time;?></span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							&nbsp;
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="dexcel"><a href="#"><i class="fas fa-file-excel"></i></a></span><span class="dpdf"><a href="javascript:demoFromHTML();"><i class="fas fa-file-pdf"></i></a></span>
							</div>						
					    </div>
						<div class="tabular-section-detail" id="visitorlist">
                            <div class="table-responsive">
                                <table class="table display data-table text-nowrap" id="visitor-list">
                                    <thead>
                                        <tr>
                                            <th width="5%">
                                            <div class="form-check">
                                                    <!--input type="checkbox" class="form-check-input checkAll"-->
                                                    <label class="form-check-label">SL NO</label>
                                            </div>
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
                                            <th width="20%">Print</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $cnt=1;
                                            while($getVisitorEnquiry_row=$getVisitorEnquiry_result->fetch_assoc())
                                            {  
                                                
                                                //Preparing delimetered data for  Hidden textbox data for pringing purpose
                                                    $str='SLNo.-' . $cnt;
                                                    $str= $str . ';Visitor Name-'. $getVisitorEnquiry_row["visitor_name"];
                                                    $str= $str . ';Visitor Type-'. $getVisitorEnquiry_row["visitor_type"];
                                                    $str= $str . ';Purpose-' . $getVisitorEnquiry_row["visit_purpose"];
                                                    $str= $str . ';Contact Number-' . $getVisitorEnquiry_row["contact_no"];
                                                    $str= $str . ';Address-' . $getVisitorEnquiry_row["location"] ;
                                                    $str= $str . ';Number of Person-' . $getVisitorEnquiry_row["no_of_person"];
                                                    $str= $str . ';Visiging Date-' . $getVisitorEnquiry_row["date_of_visit"];
                                                    $str= $str . ';In Time-' . $getVisitorEnquiry_row["in_time"];                                
                                                //End of Delimetered data preparation.    

                                                echo '<tr id=id="visitor"' . $cnt . '>
                                                        <td>' . $cnt . '</td>
                                                        <td>' . $getVisitorEnquiry_row["visitor_name"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["visitor_type"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["visit_purpose"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["contact_no"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["location"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["no_of_person"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["date_of_visit"] .  '</td>
                                                        <td>' . $getVisitorEnquiry_row["in_time"] .  '</td>
                                                        <td id="td_outtime'.$cnt.'">' . ($getVisitorEnquiry_row["out_time"]!="" ? $getVisitorEnquiry_row["out_time"] : '<input type="time" step="1" min='. "'1:00'" . " max='12:59' " . ' id="outtime' . $cnt . '" name="outtime" class="form-control"> <img src="img/update-icon.png" class="update" alt="update" onClick="outtime(' . "'outtime" . $cnt . "'," . $getVisitorEnquiry_row["veid"] .  ",'td_outtime" . $cnt ."'" . ');" />').' </td>
                                                        <td class="text-center"><a href="app_images/visitors/visitor' . $getVisitorEnquiry_row["veid"]. '.png"><img src="app_images/visitors/visitor' . $getVisitorEnquiry_row["veid"]. '.png" alt="visitor"></a></td>
                                                        <td>Print <input type="hidden" id="printval' . $cnt . '" value=" ' . $str . '"> </td>
                                                    </tr>';
                                                    $cnt++;
                                            }  
                                        ?>
                                    </tbody>
                                </table>
                                <?php 
                                    // May be used in Printing Process if search record count value is required :: The below input control contains total number of records generated in search list above in the table structure.
                                    echo '<input type="hidden" id="searchlistcount" value="' . $cnt . '">'; 
                                ?>
                            </div>
						</div>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">ShishaSoft</a> 2019. All rights reserved. Designed by <a
                            href="#">ShishaSoft</a></div>
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
	<script src="js/webcam.min.js"></script>
	<script type="text/javascript" src="js/ajax-function.js"></script>
<script language="JavaScript">
    var data_uri;
    Webcam.set({
    width: 520,
    height: 400,
    image_format: 'jpeg',
    jpeg_quality: 120
    });
    Webcam.attach( '#camContainer' );
    function take_snapshot() {
    Webcam.snap( function(data_uri) {
    $(".image-tag").val(data_uri);
    document.getElementById('picture_from_cam').innerHTML = '<img src="'+data_uri+'"/>';
    });
    }
</script>
</body>
</html>