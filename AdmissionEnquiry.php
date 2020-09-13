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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    
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
                   <ul>
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li>Admission Eqnuiry</li>
                    </ul>
				 	
                </div>
                <div class="ui-alart-box">
                            <div class="icon-color-alart" id="msgreply">
                                
                            </div>
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
                        <form class="new-added-form" id="admissionform" method="post" action="admissionEnquiry2.php">
						<input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control" value="0" required>
                            <div class="row">
							
							    
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Name *</label>
                                    <input type="text" id="sname" name="sname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enquirer Name *</label>
                                    <input type="text" id="enqname" name="enqname" placeholder="" class="form-control" onkeypress="lettersOnly(event);">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enquirer Relation *</label>
                                    <select class="select2" id="enqrel" name="enqrel" required>
                                        <option value="">Select Option Values *</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Neighbour">Neighbour</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Contact Number *</label>
                                    <input type="text" id="contactno" name="contactno" placeholder="" class="form-control" onkeypress="return isNumberKey(event);"  onkeyup="restrict_textlength('contactno','10');" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email ID</label>
                                    <input type="email" id="email" name="email" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select Locality</label>
                                    <select class="select2" id="locality" name="locality">
                                        <option value="">Please Select Locality</option>
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
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Applying For Class *</label>
                                    <select class="select2" id="classno" name="classno" required>
                                        <option value="">Please Select Class *</option>
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
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Applying for Session *</label>
                                    <select class="select2" id="session" name="session" required>
                                        <option value="">Please Select Session *</option>
										<option value="2020-2021">2020-2021</option>
											<option value="2019-2020">019-2020</option>
											<option value="2018-2019">2018-2019</option>
											<option value="2017-2018">2017-2018</option>
                                    </select>
                                </div>
                               <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Lead Source *</label>
                                    <select class="select2" id="lsource" name="lsource" required>
                                        <option value="0">Select Lead Source</option>
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
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Follow Up Date *</label>
                                    <input type="text" id="fdate" name="fdate" placeholder="dd/mm/yyyy" class="form-control air-datepicker future-date"
                                        data-position='bottom right' required>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
								
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Any Sibling</label>
                                    <select class="select2" id="anysib" name="anysib">
                                        <option value="No">No</option>
										<option value="Yes">Yes</option>
                                    </select>
                                </div>
								
								
								<div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Enter OTP</label> <label id="otpverifymsg">&nbsp;&nbsp;</label>
                                    <input type="text" id="otptoverify" name="otptoverify" placeholder="" class="form-control">
                                </div>
								<div class="col-xl-9 col-lg-9 col-12 form-group">
                                    <label>Remarks</label>
									 <textarea class="textarea form-control"id="remarks" name="remarks"  cols="10" rows="4"></textarea>
                                </div>
								
								<div class="col-xl-3 col-lg-6 col-12 form-group btn-group-main">
								    <label>&nbsp;</label>
									<div class="col-xl-6 col-lg-6 col-6 form-group">
                                    <button type="button" name="otpbtn" id="otpbtn" class="btn-fill-md radius-4 text-light bg-true-v mbtn-verify" onclick="generateOtp();">Generate OTP</button>
                                            <input type="hidden" id="otp" name="otp" />
                                </div>
									<div class="col-xl-6 col-lg-6 col-6 form-group">
									<button type="button" name="votpbtn" id="votpbtn" class="btn-fill-md radius-4 text-light bg-dark-pastel-green mbtn-verify verify" onclick="verifyOtp();">Verify OTP</button>
									</div>
									<div class="col-xl-6 col-lg-6 col-6 form-group form-main-btn">
										<button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark save" onclick="frm.submit();">Save</button>
									</div>
                                    <div class="col-xl-6 col-lg-6 col-6 form-group form-main-btn">									
										<button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow resetm">Reset</button>
									</div>
                                </div>
								
								
                                
                                
                            </div>
                        </form>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
   <!--The ajex-function.js file contains all controller ajex functions used in the erp.-->
   <script src="js/ajax-function.js"></script>
	<script src="js/myscript.js"></script>
    <script type="text/javascript">
    var frm = $('#admissionform');

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
                $('div#msgreply').html(data);
                //alert(data);
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                $('div#msgreply').html(data);
                
            },
        });
    });
</script>
<script>
function generateOtp()
{
var mobileno=document.getElementById('contactno').value;
var xmlhttp;    
if (mobileno=="")
  {
  alert('Please Provide the Contact Numebr.');
  return;
  }
  document.getElementById('otpverifymsg').innerHTML=' - OTP Sent';
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
        document.getElementById('otp').value=xmlhttp.responseText;
        document.getElementById('otpverifymsg').innerHTML=' - Verify Now';
        //alert('OTP'+ xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","sendOtp.php?mobileno="+mobileno,true);
xmlhttp.send();
}

function verifyOtp(){

    var otp=document.getElementById('otp').value;
    var verifyingotp=document.getElementById('otptoverify').value;
    //alert('Generated OTP is ' + otp + ' and verifying OTP is ' + verifyingotp)
    if(otp==verifyingotp)
    {
        //alert("OTP Verified.")
        document.getElementById('votp').value=1;
        document.getElementById('otpverifymsg').innerHTML=' - Verified.';
    }
    else
    {
        //alert("Invalid OTP.")
        document.getElementById('votp').value=0;
        document.getElementById('otpverifymsg').value='Invalid OTP.';
    }

}
</script>
</body>

</html>