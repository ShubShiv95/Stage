<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">New Visitor Search</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form aj-new-added-form new-aj-new-added-form" action="VisitorSearch2.php" method="post" id="FrmVisitorSearch">
                            <div class="row">
                                       
                            <!--/div-->
                       
                            <?php
                                
                                //$getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and out_time is null or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y') and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
                                
                                //Updated by removing condition "or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y')" from the above sql. 
                                $getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vt_id=vet.visitor_type_id and vpm.vp_id=vet.visit_purpose_id and out_time is null  and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
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
                           
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Visitor Type <span>*</span></label>
                                        <select class="select2" id="visitortype" name="visitortype">
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
                                                $str='<option value="' . $row["VT_Id"] . '">Class ' . $row["Visitor_Type"];
                                                echo $str;
                                            }
                                        ?>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Purpose <span>*</span></label>
                                            <select class="select2" id="visitpurpose" name="visitpurpose" >
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
                                                            $str='<option value="' . $row["VP_Id"] . '">' . $row["Visitor_Purpose"] . '</option>';
                                                            echo $str;
                                                        }
                                            ?>
                                            </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                            <label>From Date <span>*</span></label>
                                            <input type="text" autocomplete="off" id="fromdate" name="fromdate" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                        <i class="far fa-calendar-alt"></i>
                                        </div>                             
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <div class="form-group aj-form-group">
                                            <label>To Date <span>*</span></label>
                                            <input type="text"  autocomplete="off" id="todate" name="todate" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                        <i class="far fa-calendar-alt"></i>
                                        </div> 
                                    </div>                                    
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 text-right">
                                    <div class="form-group aj-form-group">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-12">
                            <div class="d-grid-a mt-5">
                                <h6 class="text-left"><b>Total Visitors Found:</b> <span></span></h6>
                                <h6><b>From Date:</b> <span></span></h6>
                                <h6><b>To Date:</b> <span></span></h6>
                                <h6><b>Out Time Not Defined:</b> <span>5</span></h6>
                                <h6  class="text-right"><a href="javascript:void(0);"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-print" aria-hidden="true"></i></a></h6>
                            </div>
                        </div>
                        <div class="Attendance-staff" id="search-result-div">
                            <div class="table-responsive">
                            <table class="table" id="visitor-list">
                                <thead>
                                    <tr>
                                        <th style="width: 6%;">S No.</th>
                                        <th style="width: 15%;">Visitor Name</th>
                                        <th style="width: 10%;">Purpose</th>
                                        <th style="width: 10%;">Contact No.</th>
                                        <th style="width: 10%;">Address</th>
                                        <th style="width: 10%;">No Of Person</th>
                                        <th style="width: 10%;">Date</th>
                                        <th style="width: 10%;">In Time</th>
                                        <th style="width: 14%;">Out Time</th>
                                        <th style="width: 10%;">Photo</th>
                                        <th width="20%">Print</th>
                                    </tr>
                                </thead>
                                
                            </table>
                            <?php 
                                    // May be used in Printing Process if search record count value is required :: The below input control contains total number of records generated in search list above in the table structure.
                                    //echo '<input type="hidden" id="searchlistcount" value="' . $cnt . '">'; 
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

<script type="text/javascript">
    var frm = $('#FrmVisitorSearch');

    frm.submit(function (e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                //alert(data);
                $('div#search-result-div').html(data);
                //alert(data);
                //$('#admissionform').trigger("reset");
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                //$('div#msgreply').html(data);
                alert(data);
            },
        });
    });
</script>
                                          


</body>

</html>