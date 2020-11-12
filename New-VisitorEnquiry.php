<?php
session_start();
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
    <!-- Modernize js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <style type="text/css">
    #camContainer {
      width: 600px;
      height: 450px;
    }
    #picture_from_cam {
        position: absolute;
        right: 0;
        width: 100% !important;
        text-align: center;
    }
    #picture_from_cam img {
      border: solid 1px #000;
        width: auto;
        height: 174px;
        margin: 0 auto;
    }
  </style>
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
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Eqnuiry</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Visitor Eqnuiry</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Visitor Eqnuiry</h3>
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
                        <form class="new-added-form aj-new-added-form new-aj-new-added-form" action="VisitorEnquiry2.php" method="post">
                            <input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control">
                            <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Visitor Type <span>*</span></label>
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
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                 <label>Company Name</label>
                                                <input type="text" id="companyname" name="companyname" placeholder="" class="form-control" >
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Visitor Name <span>*</span></label>
                                            <input type="text" id="vname" name="vname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Contact Number</label>
                                            <input type="text" id="contactno" name="contactno" placeholder="" class="form-control" onkeypress="return isNumberKey(event);"  onkeyup="restrict_textlength('contactno','10');">
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Purpose <span>*</span></label>
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
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Location</label>
                                            <input type="text" id="location" name="location" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Person to Meet <span>*</span></label>
                                            <input type="text" id="personmeet" name="personmeet" placeholder="" class="form-control" required>
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Number of Persons <span>*</span></label>
                                            <input type="text" id="nperson" name="nperson" placeholder="" class="form-control" onkeypress="return isNumberKey(event);" required>
                                            </div>                                    
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Note</label>
                                            <textarea class="textarea aj-form-control" name="note" id="note" cols="10" rows="10" onkeyup="restrict_textlength('note','100');"></textarea>
                                            </div>                                    
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="box-web-cem" id="camContainer"></div>   
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="box-web-cem" id="picture_from_cam"></div>   
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
                                             <button  type="button" onclick="take_snapshot()" class="btn-fill-lg bg-blue-dark btn-hover-yellow take-snap  valid" >Take Snapshot</button>  
                                             <input type="hidden" name="image" class="image-tag">
                                        </div>
                                
                                        <div class="col-xl-4 col-lg-4 col-12 text-right aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                                <button type="button" onclick="showurl();" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
                            <!--div class="row mt-5"-->
                                <!-- <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Visitor Type <span>*</span></label>
                                        <select class="select2" name="sd_class">
                                            <option value="">Select Option Values *</option>
                                            <option value="15">Visitor Type 1</option>
                                            <option value="16">Visitor Type 2</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Purpose <span>*</span></label>
                                            <select class="select2" name="sd_class">
                                                <option value="" >Select Option Values *</option>
                                                <option value="Principal Meet">Principal Meet</option>
                                                <option value="Teacher Meet">Teacher Meet</option>
                                                <option value="Product Selling">Product Selling</option>
                                                <option value="Fee Submit">Fee Submit</option>
                                                <option value="Student Meet">Student Meet</option>
                                                <option value="Other Purpose">Other Purpose</option>
                                            </select>
                                    </div>                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                            <label>From Date <span>*</span></label>
                                            <input type="text" name="f_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                        <i class="far fa-calendar-alt"></i>
                                        </div>                             
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <div class="form-group aj-form-group">
                                            <label>To Date <span>*</span></label>
                                            <input type="text" name="f_dob" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                        <i class="far fa-calendar-alt"></i>
                                        </div> 
                                    </div>                                    
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 text-right">
                                    <div class="form-group aj-form-group">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                    </div>
                                </div> -->
                            <!-- </div> -->
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
                        <div class="Attendance-staff" >
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
                                <tbody>
                                <?php
                                            $cnt=1;
                                            while($getVisitorEnquiry_row=$getVisitorEnquiry_result->fetch_assoc())
                                            {  
                                                
                                                //Preparing delimetered data for  Hidden textbox data for pringing purpose
                                                    $str='SLNo.-' . $cnt;
                                                    $str= $str . ';Visitor Name-'. $getVisitorEnquiry_row["visitor_name"];
                                                    //$str= $str . ';Visitor Type-'. $getVisitorEnquiry_row["visitor_type"];
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
                                                        <!--td>' . $getVisitorEnquiry_row["visitor_type"] .  '</td-->
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
    <script src="js/webcam.min.js"></script>
    <script type="text/javascript" src="js/ajax-function.js"></script>
    <!-- Data Table Js -->
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script src="js/myscript.js"></script>
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