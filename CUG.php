<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
//include 'security.php';
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
<style> 
.rectangle {
  border-style: solid;
  border-width: 1px;
  border-color:grey;
}
</style>
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
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Close User Group</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Group Sms</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form aj-new-added-form new-aj-new-added-form" action="CUG2.php" id="cugform">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>  Choose Unit Group Name <span>*</span></label>
                                        <input type="text" minlength="12" maxlength="100" id="smsgroupname" name="smsgroupname" placeholder="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <select class="select2" id="L1-Select" name="user_type"  onChange="getGroups4CUG(this.value);">
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
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <select class="select2" id="L2-Select" name="L2-Select"  onChange="getGroupList4CUG('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');">
                                        </select>
                                    </div> 
                                </div>  
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <select class="select2" id="L3-Select" name="L3-Select"  onChange="getStuNumList4CUG(this.value);">
                                        </select>
                                    </div> 
                                </div>                       
                            </div>
                                <div class="row mt-5">
                                    <div class="col-xl-5 col-lg-5 col-12 rectangle">
                                        <div class="Individuals-cug">
                                            <div class="Attendance-staff  aj-scroll-Attendance-staff groupsmsfirsttable" id="Select-level4-subdiv1">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-3 pb-3"> 
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll">
                                                                        <label class="form-check-label text-white">Select Individuals</label>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="top-position-ss2">
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input">
                                                                        <label class="form-check-label">Test 1 Nursery</label>
                                                                    </div>
                                                                </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-12">
                                        <div class="Individuals-cug">
                                            <div class="sec-icones-a">
                                                <div class="text-center">
                                                    <!--a href="javascript:void(0);" class="mb-4"><i class="fa fa-hand-o-right" style="color: green;" aria-hidden="true"></i></a>
                                                    <br>
                                                    <br>
                                                    <a href="javascript:void(0);" class="mt-4"><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></a>
                                                    <br-->
                                                    <button type="button" class="get-values"><i class="fa fa-hand-o-right" style="color: green;" aria-hidden="true"></i></button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="delete-values"><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-12 rectangle">
                                        <div class="Individuals-cug">
                                            <div class="Attendance-staff aj-scroll-Attendance-staff groupsmssecondtable" >
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-3 pb-3"> 
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll" id="checkAll">
                                                                        <label class="form-check-label text-white">Select Individuals</label>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="top-position-ss2">
                                                            <tr class="hiddenrow">
                                                                <td>Test</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                            
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
<script type="text/javascript">
    var frm = $('#cugform');

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
                $('#cugform').trigger("reset");
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