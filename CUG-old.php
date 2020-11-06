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
    <title>Communication Group</title>
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
                            <form class="new-added-form" action="test.php">
                            <div class="row">   
                                <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            <label>Choose Unit Group Name *</label>
                                            <input type="text" id="smsgroupname" name="smsgroupname" placeholder="" class="form-control"  required>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            <label>&nbsp;</label>
                                            <select class="select2" id="L1-Select" name="user_type" required onChange="getGroups4CUG(this.value);">
                                                <option value="0">Select User Type</option>
                                                    
                                                <?php
                                                    $query='select * from message_user_group_table where enabled=1' . ' and cug_enabled=1 and School_Id=' . $_SESSION["SCHOOLID"];
                                                    $result=mysqli_query($dbhandle,$query);
                                                    if(!$result)
                                                        {
                                                            //var_dump($getStudentCount_result);
                                                            $error_msg=mysqli_error($dbhandle);
                                                            $el=new LogMessage();
                                                            $sql=$query;
                                                            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                                            $el->write_log_message('Close User Group Creation ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
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
                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            <label>&nbsp;</label>
                                            <select class="select2" id="L2-Select" name="L2-Select" required onChange="getGroupList4CUG('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');" >
                                            </select>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-12 form-group" id="Select-level3-div">
                                            <label>&nbsp;</label>
                                            <select class="select2" id="L3-Select" name="L3-Select"  onChange="getStuNumList4CUG(this.value);"  required>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            <div class="tabular-section-detail groupsmsfirsttable comm-message 1st-tab-section" id="Select-level4-subdiv1">
                                                <div class="table-responsive">
                                                    <table class="table display data-table text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll">
                                                                        <label class="form-check-label">Select Individuals</label>
                                                                </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 1 Nursery 1" label="Test 1 Nursery 1"  name="groupsms">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 1 PlyaSchool" label="Test 1 PlyaSchool" name="groupsms">
                                                                        <label class="form-check-label">Test 1 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 2 Nursery" label="Test 2 Nursery" name="groupsms">
                                                                        <label class="form-check-label">Test 2 Nursery</label>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 2 PlyaSchool" label="Test 2 PlyaSchool" name="groupsms">
                                                                        <label class="form-check-label">Test 2 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 3 Nursery" name="groupsms">
                                                                        <label class="form-check-label">Test 3 Nursery</label>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" value="Test 3 PlyaSchool" label="Test 3 PlyaSchool" name="groupsms">
                                                                        <label class="form-check-label">Test 3 PlyaSchool</label>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-12 form-group btn-section groupsms">
                                                <button type="button" class="get-values"><img src="img/download-new.png" style="width: 40px;"/></button>
                                                <button type="button" class="delete-values"><img src="img/delete-new.png" style="width: 40px;"/></button>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            <div class="tabular-section-detail groupsmssecondtable comm-message second-tab-section">
                                                    <div class="table-responsive">
                                                        <table class="table display data-table text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                    <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                                                            <label class="form-check-label">Select Individuals</label>
                                                                    </div>
                                                                    </th>
                                                                    
                                                                    
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="hiddenrow">
                                                                <td>Test</td>
                                                                </tr>
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-12 form-group groupsmssubmit-btn-sec">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark create" id="CheckselectedGroup">Create</button>
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
             $("#L2-Select").prop('required',true);
             $("#L3-Select").prop('required',true); 

			 
        }
        else if(demovalue ==2){
            $("#Select-level3-div").hide();            
            $('#unknownNo-div').hide();
            $('#Select-level4-subdiv1').show();
            $("#L2-Select").prop('required',true);
            $("#L3-Select").prop('required',false); 
            

        }
        else{
             $("#Select-level2-div").hide();
             $("#Select-level3-div").hide();
             $('#unknownNo-div').show();
             $('#Select-level4-subdiv1').hide();
             $("#L2-Select").prop('required',false);
             $("#L3-Select").prop('required',false);
             
             

        }
    });
    </script>
<script>
    $(document).ready(function() {
		$(".groupsmssecondtable  table tr.hiddenrow").css("display", "none");
        $(".get-values").click(function(){
			
			
			
			$.each($("input[name='groupsms']:checked"), function(){
               $pushvalue = $(this).val();
			   $pushlabel = $(this).attr('label');
			   $dontmove = 0;
			   
			   
				checkAll($(this).val());
               	if($dontmove != 1)	{		
				$('.groupsmssecondtable table tbody').append('<tr><td><div class="form-check"><input type="checkbox" class="form-check-input check-by-all" value="'+$(this).val()+'" name="groupsmsact[]"><label class="form-check-label">'+$pushlabel+'</label></div></td></tr>');
				
				}
				
				
            });
			
          
			
        });
		function checkAll(evn) {
				$("input[name='groupsmsact[]']").each(function () {
					$pushvalueact = $(this).val();
					if (evn == $pushvalueact) {
					//alert(evn);
					$dontmove =1;
					}
				});
			}
	    function CheckselectedGropu(){
		 		 
		}
        $('#CheckselectedGroup').click(function() {
			 var atLeastOneIsChecked = false;
			  $('input[name="groupsmsact[]"]').each(function () {
				if ($(this).is(':checked')) {
				  atLeastOneIsChecked = true;
				  // Stop .each from processing any more items
				  return false;
				}
			  });
			  if(atLeastOneIsChecked == true){
				  return true;
			  }else{
				  alert('Please select any group to create sms');
				return false;  
			  }
		});		
		$(".delete-values").click(function(){	
		$.each($("input[name='groupsmsact[]']:checked"), function(){
			$(this).closest('tr').remove();
		   });	
		});	
    });

    $("#checkAll").click(function () {
     $('.check-by-all').not(this).prop('checked', this.checked);
 });

</script>
</body>
</html>