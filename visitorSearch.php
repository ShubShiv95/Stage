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
    <title>SwipeTouch | Search Visitor</title>
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
	<script src="js/modernizr-3.6.0.min.js"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
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
                        <li>Search Visitor</li>
                    </ul>
				  	
                </div>
                <!-- Breadcubs Area End Here -->
				<!--<div class="page-title-section">
				  <i class="flaticon-mortarboard"></i>&nbsp;Admission Eqnuiry
				</div>-->
				
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body bg-skybluelight">
                        <form class="new-added-form" method="post" name="MainForm" id="MainForm" action="visitorSearch2.php">
						<div class="second-form-sec">
							<form class="mg-b-20 new-added-form">
								<div class="row gutters-8">
								   <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
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
                                                $str='<option value="' . $row["vtid"] . '">Class ' . $row["Visitor_Type"];
                                                echo $str;
                                            }
                                        ?>
										</select>
                                   </div>
								   <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
										<label>Purpose *</label>
										<select class="select2" id="visitpurpose" name="visitpurpose" required>
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
									<div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
									    <label>From Date *</label>
										<input type="text" id="fromdate" name="fromdate" placeholder="From Date" class="form-control air-datepicker"
											data-position='bottom right' required>
										<i class="far fa-calendar-alt"></i>
									</div>
									<div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
									    <label>To Date *</label>
										<input type="text" id="todate" name="todate" placeholder="To Date" class="form-control air-datepicker"
											data-position='bottom right' required>
										<i class="far fa-calendar-alt"></i>
									</div>
									<div class="col-12-xxxl col-xl-12 col-lg-12 col-12 form-group second-form-btn">
										<button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow">SEARCH</button>
									</div>
								</div>
							</form>
						</div>
                        </form>
                       

						<div class="tabular-section-info">
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="novisitorfound"><?php //echo $rowcount;?> </span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="fromdate"><?php// echo $earlier_date;  ?></span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="todate"><?php //echo date("d-m-Y"); ?></span>
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="todate"><?php //echo  $blank_out_time;?></span><input value="Print" type="button" onclick="printData();" />
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							&nbsp;
							</div>
							<div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
							<span class="dexcel"><a href="#"><i class="fas fa-file-excel"></i></a></span><span class="dpdf"><a href="javascript:demoFromHTML();"><i class="fas fa-file-pdf"></i></a></span>
							</div>
						
					    </div>

						<div class="tabular-section-detail" id="visitorList">
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
                                            <th width="10%">Purpose</th>
                                            <th width="10%">Contact No.</th>
                                            <th width="10%">Address</th>
                                            <th width="5%">No Of Person</th>
                                            <th width="10%">Date</th>
                                            <th width="5%">In Time</th>
                                            <th width="10%">Out Time</th>
                                            <th width="20%">Photo</th>
                                        </tr>
                                    </thead>
                                 
                                </table>
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
    <script type="text/javascript" src="js/ajex-function.js"></script>                                                      
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script-->
<!--script>
    function outtime(outtime_control,visitor_id,target_td)
    {
    var outtime=document.getElementById(outtime_control).value;
    var xmlhttp;    
    if (outtime=="")
    {
    alert('Please Provide Outtime.');
    return;
    }
    //alert(outtime);
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById(target_td).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","update_outtime.php?outtime="+outtime+"&veid="+visitor_id+"&target_td="+target_td,true);
    xmlhttp.send();
    }
</script-->


                                          


</body>

</html>