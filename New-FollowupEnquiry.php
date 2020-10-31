<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Eqnuiry</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Follow Up Eqnuiry</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Follow Up Eqnuiry</h3>
                            </div>
                            <!-- <div class="dropdown">
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
                            </div> -->
                        </div>
                        <form class="new-added-form aj-new-added-form new-aj-new-added-form" action="getEnquiry.php" method="post" id="MainForm">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Enquiry Status</label>
                                        <select class="select2" id="enqtype" name="enqtype">
                                            <option value="All">All</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="PROCESSING">Processing</option>
                                            <option value="CONVERTED">Converted</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Applying For Class</label>
                                            <select class="select2" id="class" name="class">
                                                <option value="All">All</option>
                                                <?php
                                            $query='select Class_Id,class_name,stream from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                                            $result=mysqli_query($dbhandle,$query);
                                            if(!$result)
                                                {
                                                    //var_dump($getStudentCount_result);
                                                    $error_msg=mysqli_error($dbhandle);
                                                    $el=new LogMessage();
                                                    $sql=$query;
                                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                    $el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                                                    $dbhandle->query("unlock tables");
                                                    mysqli_rollback($dbhandle);
                                                    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                                    //$str_end='</div>';
                                                    //echo $str_start.$messsage.$str_end;
                                                    //echo "";
                                                    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                }
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                            $str='<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"];
                                            if($row["stream"]==1)
                                            $str= $str . ' Science';
                                            else if($row["stream"]==2)
                                            $str= $str . ' Commerce';
                                            else if($row["stream"]==3)
                                            $str= $str . ' Arts';
                                            $str=$str . '</option>';
                                            echo $str;
                                        }
                                        ?>
                                            </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Applying For Session</label>
                                        <select class="select2" id="session" name="session">
                                            <option value="All">All</option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2019-2020">2019-2020</option>
                                            <option value="2018-2019">2018-2019</option>
                                            <option value="2017-2018">2017-2018</option>
                                            
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Select Locality</label>
                                        <select class="select2" id="locality" name="locality">
                                            <option value="All">All</option>
                                            <?php
                                            $query='select locationid,location_name from marketting_location_table where School_Id=' . $_SESSION["SCHOOLID"];
                                            $result=mysqli_query($dbhandle,$query);
                                            if(!$result)
                                                {
                                                    //var_dump($getStudentCount_result);
                                                    $error_msg=mysqli_error($dbhandle);
                                                    $el=new LogMessage();
                                                    $sql=$query;
                                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                    $el->write_log_message('Admission Eqnuiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate location list array. Please try after some time.</h1>";
                                                    $dbhandle->query("unlock tables");
                                                    mysqli_rollback($dbhandle);
                                                    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                                    //$str_end='</div>';
                                                    //echo $str_start.$messsage.$str_end;
                                                    //echo "";
                                                    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                }
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                 echo '<option value="' . $row["locationid"] . '">' . $row["location_name"] . '</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="form-group aj-form-group">
                                        <label>Any Sibling <span>*</span></label>
                                        <select class="select2" id="sibling" name="sibling">
                                            <option value="">All</option>
                                            <option value="YES">Yes</option>
                                            <option value="NO">No</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="form-group aj-form-group">
                                        <label>Lead Source <span>*</span></label>
                                        <select class="select2" id="lsource" name="lsource">
                                            <option value="">All</option>
                                            <?php
                                            $query='select leadid,lead_source_name from lead_source_table where School_Id=' . $_SESSION["SCHOOLID"];
                                            $result=mysqli_query($dbhandle,$query);
                                            if(!$result)
                                                {
                                                    //var_dump($getStudentCount_result);
                                                    $error_msg=mysqli_error($dbhandle);
                                                    $el=new LogMessage();
                                                    $sql=$query;
                                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                    $el->write_log_message('Admission Eqnuiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                                                    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate location list array. Please try after some time.</h1>";
                                                    $dbhandle->query("unlock tables");
                                                    mysqli_rollback($dbhandle);
                                                    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                                    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                                                    //$str_end='</div>';
                                                    //echo $str_start.$messsage.$str_end;
                                                    //echo "";
                                                    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                                }
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                 echo '<option value="' . $row["leadid"] . '">' . $row["lead_source_name"] . '</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Search Date As</label>
                                            <select class="select2" id="searchdate" name="searchdate">
                                            <option value="createdon">By Created on</option>
                                        <option value="followup">By Followup Date</option>                                       
                                            </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                            <label>From Date <span>*</span></label>
                                            <input type="text" id="fromdate" name="fromdate" placeholder="From Date" required=""  class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                                        <i class="far fa-calendar-alt"></i>
                                        </div>                             
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <div class="form-group aj-form-group">
                                            <label>To Date <span>*</span></label>
                                            <input type="text" id="todate" name="todate" placeholder="To Date" required="" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                                        <i class="far fa-calendar-alt"></i>
                                        </div> 
                                    </div>                                    
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                        <button type="button" onclick="showurl();" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    </div>                                    
                                </div>
                            </div>
                            
                        </form>
                        <div class="col-lg-12">
                            <div class="d-grid-a mt-5">
                                <h6 class="text-left"><b>Total Visitors Found:</b> <span>48</span></h6>
                                <h6><b>From Date:</b> <span>01-08-2020</span></h6>
                                <h6><b>To Date:</b> <span>10-08-2020</span></h6>
                                <h6><b>Out Time Not Defined:</b> <span>5</span></h6>
                                <h6  class="text-right"><a href="javascript:void(0);"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-print" aria-hidden="true"></i></a></h6>
                            </div>
                        </div>
                        <div class="Attendance-staff mt-5"  id="search-result-div">
                            <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label text-white">SL NO</label>
                                            </div>
                                        </th>
                                        <th>Enquirer Name</th>
                                        <th>Contact No.</th>
                                        <th>Student Name</th>
                                        <th>Location</th>
                                        <th>Class</th>
                                        <th>Session</th>
                                        <th>Relation</th>
                                        <th>Sibling</th>
                                        <th>Last Attend By</th>
                                        <th>Last Attend On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                  
                                </tbody>
                            </table>
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
    <script type="text/javascript" src="js/ajax-function.js"></script>
<!-- <script language="JavaScript">
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
</script> -->
<script language="JavaScript">
//Ajex Function for Submit Operation used by visitorSearch.php file.  This function can use used to post the entire form data.  Make the changes as required 
var MainForm = $('#MainForm');

MainForm.submit(function (e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: MainForm.attr('method'),
            url: MainForm.attr('action'),
            data: MainForm.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                //alert(data);
                $('div#search-result-div').html(data);
                //alert(data);
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                $('div#search-result-div').html(data);
                
            },
        });
	});
	
//End of Ajex Function for Submit Operation used by visitorSearch.php file. 
</script>
</body>

</html>