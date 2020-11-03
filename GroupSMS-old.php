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
    <title>Communication</title>
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
                 			  
                   <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Group Sms</li>
                    </ul>
				  	
                </div>
                <!-- Breadcubs Area End Here -->
				<!--<div class="page-title-section">
				  <i class="flaticon-mortarboard"></i>&nbsp;Admission Eqnuiry
				</div>-->
				
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body bg-skybluelight">
                       
                        <form class="new-added-form" id="groupSmsForm" action="GroupSMS2.php" method="post">
                            <div class="row">
                                <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
                                        <div class="row" id="Select-level1-div">
                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                    <label>Message To*</label>
                                                    <select class="select2" id="L1-Select" name="user_type" required onChange="GrpMsgGroupList(this.value);">
                                                        <option value="0">Select Visitor Type</option>
                                                        
                                                        <?php
                                                            $query='select * from message_user_group_table where enabled=1' . ' and group_select_enabled=1 and School_Id=' . $_SESSION["SCHOOLID"];
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
                                                <select class="select2" id="L2-Select" name="L2-Select" required onChange="Grp_Communication_Call2('L1-Select',this.value,'Select-level4-subdiv1');" >
                                                </select>
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
                                                                        
                                                                        <label>Select Groups</label>
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
                                        <textarea class="textarea form-control" name="composemsg" id="composemsg" cols="10" rows="10" onkeyup="restrict_textlength('composemsg','480');return smsLength('composemsg');" required></textarea>
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
                                            <span>Message Balance: <?php echo $_SESSION["SMSBALANCE"];?></span>
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


    <script>
        window.onload=function(){
            $("#unknownNo-div").hide();
            };
       // });
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
    $('#myform').submit(function() {
            var techs = [];
            $.each($("input[name='tech']:checked"), function() {
                techs.push($(this).val());
            });
            alert("My favourite techs are: " + techs.join(", "));
         });
         return true; // return false to cancel form action
});
</script>
  


  <script type="text/javascript">
    var frm = $('#groupSmsForm');

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
                //$('div#msgreply').html(data);
                alert(data);
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                alert(data);
                //$('div#msgreply').html(data);
                
            },
        });
    });
</script>
  
</body>

</html>