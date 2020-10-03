<?php
            session_start();
            include 'dbobj.php';
            include 'security.php';
            include 'errorLog.php';   
            //include 'generate_sequence.php';


            // Turn on all error reporting
            // Report all PHP errors (see changelog)
            error_reporting(E_ALL);
            //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
            ini_set('display_errors', 1);

            //starts here
            $lid=$_SESSION["LOGINID"];
            $schoolId=$_SESSION["SCHOOLID"];
            $admission_Id = $_REQUEST["admission_Id"];

            $selectAdmissionSql = "Select * From admission_master_table Where Admission_Id = ?";
            $stmt=$dbhandle->prepare($selectAdmissionSql);
            $stmt->bind_param("i", $admission_Id);

            //echo $admission_Id;

            $execResult=$stmt->execute();
            //echo $execResult . '<br>'; 
            echo $dbhandle->error;
        //

    if(!$execResult)
        {
            //var_dump($getStudentCount_result);
            $error_msg=mysqli_error($dbhandle);
            $sql="";
            //$el=new LogMessage();
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            //$el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
            $message='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
            $str_end='</div>';
            echo $str_start.$message.$str_end;
            die;
            //echo "";
            //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
        
        }

    $str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
    $message='Resultset = ';
    $execResult=$stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIFTCAMPUS | Admission Form View</title>
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
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admission</h3>
                    <ul>
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li>Application Entry</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Application Entry</h3>
                                <h4>Admission Id : <?php echo $row['Admission_Id']  ?></h3>
                            </div>
                        <form class="new-added-form aj-new-added-form"  action="admissionController.php" id="admitForm">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>First Name (As Per Birth Certificate) <span>*</span></label>
                                        <input type="text" name="studentFirstName" id="studentFirstName" placeholder="" required="" class="form-control" value='<?php echo $row['First_Name']  ?>' readonly>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="studentMiddleName" id="studentMiddleName" placeholder="" required="" class="form-control" value='<?php echo $row['Middle_Name']  ?>' readonly>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="studentLastName" id="studentLastName=" placeholder="" required="" class="form-control" value='<?php echo $row['Last_Name']  ?>' readonly>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Class <span>*</span></label>
                                        <select class="select2" name="studclassToApply" id="studclassToApply">
                                        <option value="0">Select Class</option>
                                        <option value="">Select Class</option>
                                            <option value="NUR" <?php if($row["Class_Id"]=='NUR') echo 'selected="selected"'; else echo ''; ?>>Nursery</option>
                                            <option value="PREP"<?php if($row["Class_Id"]=='PREP') echo 'selected="selected"'; else echo ''; ?>>PREP</option>
                                            <option value="KG1" <?php if($row["Class_Id"]=='KG1') echo 'selected="selected"'; else echo ''; ?>>KG1</option>
                                            <option value="KG2" <?php if($row["Class_Id"]=='KG2') echo 'selected="selected"'; else echo ''; ?>>KG2</option>
                                            <option value="1"   <?php if($row["Class_Id"]=='1') echo 'selected="selected"'; else echo ''; ?>>1</option>
                                            <option value="2"   <?php if($row["Class_Id"]=='2') echo 'selected="selected"'; else echo ''; ?>>2</option>
                                            <option value="3"   <?php if($row["Class_Id"]=='3') echo 'selected="selected"'; else echo ''; ?>>3</option>
                                            <option value="4"   <?php if($row["Class_Id"]=='4') echo 'selected="selected"'; else echo ''; ?>>4</option>
                                            <option value="5"   <?php if($row["Class_Id"]=='5') echo 'selected="selected"'; else echo ''; ?>>5</option>
                                            <option value="6"   <?php if($row["Class_Id"]=='6') echo 'selected="selected"'; else echo ''; ?>>6</option>
                                            <option value="7"   <?php if($row["Class_Id"]=='7') echo 'selected="selected"'; else echo ''; ?>>7</option>
                                            <option value="8"   <?php if($row["Class_Id"]=='8') echo 'selected="selected"'; else echo ''; ?>>8</option>
                                            <option value="9"   <?php if($row["Class_Id"]=='9') echo 'selected="selected"'; else echo ''; ?>>9</option>
                                            <option value="10"  <?php if($row["Class_Id"]=='10') echo 'selected="selected"'; else echo ''; ?>>10</option>
                                            <option value="11"  <?php if($row["Class_Id"]=='11') echo 'selected="selected"'; else echo ''; ?>>11</option>
                                            <option value="12"  <?php if($row["Class_Id"]=='12') echo 'selected="selected"'; else echo ''; ?>>12</option>
                                            <option value="MISC"<?php if($row["Class_Id"]=='MISC') echo 'selected="selected"'; else echo ''; ?>>Misc</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Section</label>
                                        <select class="select2" name="f_Section">
                                            <option value="">Please Select Section </option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                        </select>
                                    </div>

                                   <div class="form-group aj-form-group">
                                        <label>Roll No.</label>
                                        <select class="select2" name="f_Gender">
                                            <option value="">Please Select Roll Number </option>
                                            <option selected value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group aj-form-group">
                                        <label>Gender <span>*</span></label>
                                        <select class="select2" name="studentGender" id="studentGender" required="">
                                            <option value="">Please Select Gender </option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                            <option value="OTHER">Others</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Date of Birth <span>*</span></label>
                                        <input type="text" name="studentDOB" id="studentDOB" required="" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" value='<?php echo $row['DOB'] ?>' readonly>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Age</label>
                                        <input type="text" name="studentAge" id="studentAge" placeholder="" readonly="true" class="form-control">
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Social Category <span>*</span></label>
                                        <select class="select2" required="" name="studentSocialCat" id="studentSocialCat">
                                            <option value="">SELECT SOCIAL CATEGORY</option>
                                            <option selected value="GENERAL">GENERAL</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                            <option value="OBC">OBC</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Discount Category <span>*</span></label>
                                        <select class="select2" required="" name="studDiscCat" id="studDiscCat">
                                        <option value="">Please Select Discount </option>
                                        <option selected value="10">10%</option>
                                        <option value="15">15%</option>
                                    </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Locality </label>
                                        <select class="select2" name="studLocality" id="studLocality"> 
                                            <option value="">Select Locality</option>
                                            <option value="1">Bokaro Steel City</option>
                                            <option value="2">Bokaro Chas</option>
                                            <option value="3">Bokaro Sec-1</option>
                                            <option value="4">Bokaro Sec-4</option>
                                            <option value="5">Dhanbad City</option>                                
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Academic Session <span>*</span></label>
                                        <select class="select2" required="" name="studAcademicSession" id="studAcademicSession"> 
                                            <option value="">Select Session</option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2019-2020">2019-2020</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Mother Tongue <span>*</span></label>
                                        <select class="select2" required="" name="studMotherTongue" id="studMotherTongue" >
                                            <option value="">Select MotherTongue</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="English">English</option>
                                            <option value="Gujrati">Gujrati</option>
                                            <option value="Oriya">Oriya</option>
                                            <option value="Kannada">Kannada</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Marathi">Marathi</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Telugu">Telugu</option>                                
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                	<div class="form-group aj-form-group">
                                        <label>Religion <span>*</span></label>
                                        <select class="select2" required="" name="studReligion" id="studReligion">
                                            <option value="">Select Religion</option>
                                            <option selected value="Buddhist">Buddhist</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Jain">Jain</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Sikh">Sikh</option>
                                            <option value="Other">Other</option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Nationality <span>*</span></label>
                                        <select class="select2" required="" name="studNationality" id="studNationality">
                                            <option value="">Select Nationality</option>
                                            <option selected value="INDIAN">Indian</option>
                                            <option value="OTHERS">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Blood Group </label>
                                        <select class="select2" name="studBloodGroup" id="studBloodGroup">
                                            <option value="">Select Blood Group</option>
                                            <option value="A-Positive">A +</option>
                                            <option value="A-Negative">A -</option>
                                            <option value="AB-Positive">AB +</option>
                                            <option value="AB-Negative">AB -</option>
                                            <option value="B-Positive">B +</option>
                                            <option value="B-Negative">B -</option>
                                            <option value="O-Positive">O +</option>
                                            <option value="O-Negative">O -</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Adhaar Card No.</label>
                                        <input type="text" name="studAdharCardNo" id="studAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Aadhar_No']?>' readonly>
                                    </div>
                                    
                                    <div class="form-group faj-form-group">
                                        <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than  2MB)</label>
                                        <div class="d-image-user">
                                            <img src="img/avtar.png">
                                        </div>
                                            <div class="file-in">
                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                                                <input type="file" name="studentPhoto" id="studentPhoto" class="form-control-file">
                                            </div>
                                        </div>  
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Previous School Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>School Name</label>
                                        <input type="text" name="studPrevSchoolName" id="studPrevSchoolName" placeholder="" class="form-control" value='<?php echo $row['Prev_School_Name'] ?>' readonly>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Medium of Instrction</label>
                                         <select class="select2" name="studMOI" id="studMOI">
                                            <option value="">Select Medium of Instruction</option>
                                            <option value="English">English</option>
                                            <option value="Bangla">Bangla</option> 
                                            <option value="Hindi">Hindi</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Board</label>
                                        <select class="select2" name="studBoard" id="studBoard">
                                            <option value="">Select Board</option>
                                            <option value="CBSE">CBSE</option>
                                            <option value="ICSE">ICSE</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Class</label>
                                        <select class="select2" name="studClass" id="studClass">
                                           <option value="NUR" <?php if($row["Prev_School_Class"]=='NUR') echo 'selected="selected"'; else echo ''; ?>>Nursery</option>
                                            <option value="PREP"<?php if($row["Prev_School_Class"]=='PREP') echo 'selected="selected"'; else echo ''; ?>>PREP</option>
                                            <option value="KG1" <?php if($row["Prev_School_Class"]=='KG1') echo 'selected="selected"'; else echo ''; ?>>KG1</option>
                                            <option value="KG2" <?php if($row["Prev_School_Class"]=='KG2') echo 'selected="selected"'; else echo ''; ?>>KG2</option>
                                            <option value="1"   <?php if($row["Prev_School_Class"]=='1') echo 'selected="selected"'; else echo ''; ?>>1</option>
                                            <option value="2"   <?php if($row["Prev_School_Class"]=='2') echo 'selected="selected"'; else echo ''; ?>>2</option>
                                            <option value="3"   <?php if($row["Prev_School_Class"]=='3') echo 'selected="selected"'; else echo ''; ?>>3</option>
                                            <option value="4"   <?php if($row["Prev_School_Class"]=='4') echo 'selected="selected"'; else echo ''; ?>>4</option>
                                            <option value="5"   <?php if($row["Prev_School_Class"]=='5') echo 'selected="selected"'; else echo ''; ?>>5</option>
                                            <option value="6"   <?php if($row["Prev_School_Class"]=='6') echo 'selected="selected"'; else echo ''; ?>>6</option>
                                            <option value="7"   <?php if($row["Prev_School_Class"]=='7') echo 'selected="selected"'; else echo ''; ?>>7</option>
                                            <option value="8"   <?php if($row["Prev_School_Class"]=='8') echo 'selected="selected"'; else echo ''; ?>>8</option>
                                            <option value="9"   <?php if($row["Prev_School_Class"]=='9') echo 'selected="selected"'; else echo ''; ?>>9</option>
                                            <option value="10"  <?php if($row["Prev_School_Class"]=='10') echo 'selected="selected"'; else echo ''; ?>>10</option>
                                            <option value="11"  <?php if($row["Prev_School_Class"]=='11') echo 'selected="selected"'; else echo ''; ?>>11</option>
                                            <option value="12"  <?php if($row["Prev_School_Class"]=='12') echo 'selected="selected"'; else echo ''; ?>>12</option>
                                            <option value="MISC"<?php if($row["Prev_School_Class"]=='MISC') echo 'selected="selected"'; else echo ''; ?>>Misc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            
                            
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Communication Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Communication Address<span>*</span></label>
                                        <textarea type="text" rows="4" name="commAddress" id="commAddress" required="" placeholder="" class="aj-form-control" value='<?php echo $row['Comm_Address'] ?>' readonly> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>City/ District<span>*</span></label>
                                        <input type="text" name="commCityDist" id="commCityDist" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_City_Dist'] ?>' readonly>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode<span>*</span></label>
                                        <input type="text" name="commPinCode" id="commPinCode" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_Pincode'] ?>' readonly>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State<span>*</span> </label>
                                        <input type="text" name="commState" id="commState" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_State'] ?>' readonly>

                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No.<span>*</span></label>
                                        <input type="text" name="commContactNo" id="commContactNo" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_ContactNo'] ?>' readonly>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="commCountry" id="commCountry" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_Country'] ?>' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Residential Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Residential Address<span>*</span></label>
                                        <textarea type="text" rows="4" name="raAddress"  id="raAddress" required="" placeholder="" class="aj-form-control" value='<?php echo $row['Resid_Address']?>' readonly> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> City/ District <span>*</span></label>
                                        <input type="text" name="raCityDist"  id="raCityDist" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_City_Dist']?>' readonly>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode <span>*</span></label>
                                        <input type="text" name="raPinCode" id="raPinCode" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_Pincode']?>' readonly>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State <span>*</span> </label>
                                        <input type="text" name="raState" id="raState" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_State']?>' readonly>

                                        
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No. <span>*</span></label>
                                        <input type="text" name="raContactNo" id="raContactNo" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_ContactNo']?>' readonly>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="raCountry" id="raCountry" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_Country']?>' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Sibling Details <small> (if Any, After entering Admission No. Kindly press enter key again)</small></h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div class="form-group aj-form-group text-center">
                                        <span>Any Sibling in this School ?(Real brother/sister)</span>
                                        <div class="row-chang">
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling"> Yes</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="sibling-bs" name="sibling" checked>No</span>
                                            </div>
                                        </div>
                                    </div>

                                	<div class="active-div-a" style="display: none;">
                                		<div class="row">

                                            <div class="col-xl-3 col-lg-3 col-12">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sibling1StudId"  id="sibling1StudId" placeholder="" class="form-control" value='<?php echo $row['Sibling_1_Student_Id']?>' readonly>
                                                </div>
                                                
                                            </div>

                                			<div class="col-xl-3 col-lg-3 col-12">
                                				<div class="form-group aj-form-group">
			                                        <label>Class <span>*</span></label>
			                                        <select class="select2" name="sibling1Class"  id="sibling1Class">
                                                    <option value="">Select Class</option>
                                                    <option value="NUR" <?php if($row["Prev_School_Class"]=='NUR') echo 'selected="selected"'; else echo ''; ?>>Nursery</option>
                                                    <option value="PREP"<?php if($row["Prev_School_Class"]=='PREP') echo 'selected="selected"'; else echo ''; ?>>PREP</option>
                                                    <option value="KG1" <?php if($row["Prev_School_Class"]=='KG1') echo 'selected="selected"'; else echo ''; ?>>KG1</option>
                                                    <option value="KG2" <?php if($row["Prev_School_Class"]=='KG2') echo 'selected="selected"'; else echo ''; ?>>KG2</option>
                                                    <option value="1"   <?php if($row["Prev_School_Class"]=='1') echo 'selected="selected"'; else echo ''; ?>>1</option>
                                                    <option value="2"   <?php if($row["Prev_School_Class"]=='2') echo 'selected="selected"'; else echo ''; ?>>2</option>
                                                    <option value="3"   <?php if($row["Prev_School_Class"]=='3') echo 'selected="selected"'; else echo ''; ?>>3</option>
                                                    <option value="4"   <?php if($row["Prev_School_Class"]=='4') echo 'selected="selected"'; else echo ''; ?>>4</option>
                                                    <option value="5"   <?php if($row["Prev_School_Class"]=='5') echo 'selected="selected"'; else echo ''; ?>>5</option>
                                                    <option value="6"   <?php if($row["Prev_School_Class"]=='6') echo 'selected="selected"'; else echo ''; ?>>6</option>
                                                    <option value="7"   <?php if($row["Prev_School_Class"]=='7') echo 'selected="selected"'; else echo ''; ?>>7</option>
                                                    <option value="8"   <?php if($row["Prev_School_Class"]=='8') echo 'selected="selected"'; else echo ''; ?>>8</option>
                                                    <option value="9"   <?php if($row["Prev_School_Class"]=='9') echo 'selected="selected"'; else echo ''; ?>>9</option>
                                                    <option value="10"  <?php if($row["Prev_School_Class"]=='10') echo 'selected="selected"'; else echo ''; ?>>10</option>
                                                    <option value="11"  <?php if($row["Prev_School_Class"]=='11') echo 'selected="selected"'; else echo ''; ?>>11</option>
                                                    <option value="12"  <?php if($row["Prev_School_Class"]=='12') echo 'selected="selected"'; else echo ''; ?>>12</option>
                                                    <option value="MISC"<?php if($row["Prev_School_Class"]=='MISC') echo 'selected="selected"'; else echo ''; ?>>Misc</option>
			                                        </select>
			                                    </div>
			                                   
                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Section</label>
			                                         <select class="select2" name="sibling1Section" id="sibling1Section">
                                                        <option value="">Please Select Section</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        
                                                    </select>
			                                    </div>
			                                    
                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Roll No.</label>
			                                         <select class="select2" name="sibling1RollNo"  id="sibling1RollNo">
                                                        <option value="">Please Select Roll No. </option>
                                                        <option selected value="1">123456</option>
                                                        <option value="2">123456</option>
                                                        <option value="3">123456</option>
                                                        <option value="3">123456</option>
                                                    </select>
			                                    </div>
                                			</div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sibling2StudId" id="sibling2StudId" placeholder="" class="form-control" value='<?php echo $row['Sibling_2_Student_Id']?>' readonly>
                                                </div>
                                                
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Class <span>*</span></label>
                                                    <select class="select2" name="sibling2Class" id="sibling2Class" >
                                                    <option value="">Select Class</option>
                                                    <option value="Nur">Nursery</option>
                                                    <option value="PREP">PREP</option>
                                                    <option value="KG1">KG1</option>
                                                    <option value="KG2">KG2</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="Misc">Misc</option>
                                                   </select>
                                                </div>                                              
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">                                              
                                                <div class="form-group aj-form-group">
                                                    <label>Section</label>
                                                     <select class="select2" name="sibling2Sec" id="sibling2Sec">
                                                        <option value="">Please Select Section </option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>                                                      
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Roll No.</label>
                                                     <select class="select2" name="sibling2RollNo" id="sibling2RollNo">
                                                        <option value="">Please Select Roll No.</option>
                                                        <option value="1">123456</option>
                                                        <option value="2">123456</option>
                                                        <option value="3">123456</option>
                                                        <option value="3">123456</option>
                                                    </select>
                                                </div>
                                            </div>


                                		</div>


                                	</div>
                                </div>
                            </div>

                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Parent Details</h3>
                            </div>
                            <div class="f-section-n">
                            	<h3>Father's Details</h3>
	                            <div class="row">
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group aj-form-group0">
	                                         <label>Father's Name (As Per Birth Certificate) </label>
                                            <input type="text" name="fatherName" id="fatherName" placeholder="" class="form-control" value='<?php echo $row['Father_Name']?>' readonly>                                                                        
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Qualification</label>
	                                        <select class="select2" name="fatherQual" id="fatherQual">
	                                            <option value="">Select Qualification</option>
	                                            <option selected value="Non-Matric">Non-Matric</option>
	                                            <option value="Matriculation">Matriculation</option>
	                                            <option value="Intermediate">Intermediate</option>
	                                            <option value="Graduate">Graduate</option>
	                                            <option value="Post Graduate">Post Graduate</option>
	                                            <option value="PHD">PHD</option>
                                                <option value="Other">Other</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation</label>
	                                        <select class="select2" name="fatherOccupation" id="fatherOccupation">
	                                            <option value="">Select Occupation</option>
	                                            <option value="Armed Forces">Armed Forces</option>
	                                            <option value="Business">Business</option>
	                                            <option value="Doctor">Doctor</option>
	                                            <option value="Engineer">Engineer</option>
	                                            <option value="Public/PSU Sec. Employee">Public/PSU Sec. Employee</option>
	                                            <option value="Private Sec. Employee">Private Sec. Employee</option>
                                                <option value="Other">Other</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="fatherDesig" id="fatherDesig" placeholder="" class="form-control" value='<?php echo $row['Father_Designation']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name</label>
	                                        <input type="text" name="fatherOrgName" id="fatherOrgName" placeholder="" class="form-control" value='<?php echo $row['Father_Org_Name']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="fatherOrgAdd" id="fatherOrgAdd" placeholder="" class="form-control" value='<?php echo $row['Father_Org_Add']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="fatherCity" id="fatherCity" placeholder="" class="form-control" value='<?php echo $row['Father_City']?>' readonly>
                                        </div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text"  name="fatherState" id="fatherState" placeholder="" class="form-control" value='<?php echo $row['Father_State']?>' readonly>
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label>Country</label>
	                                        <input type="text" name="fatherCountry" id="fatherCountry" placeholder="" class="form-control" value='<?php echo $row['Father_Country']?>' readonly>
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text"  name="fatherPinCode" id="fatherPinCode" placeholder="" class="form-control" value='<?php echo $row['Father_Pincode']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="fatherEmail" id="fatherEmail" placeholder="" class="form-control" value='<?php echo $row['Father_Email']?>' readonly>
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="10" maxlength="10" name="fatherContactNo" id="fatherContactNo" placeholder="" class="form-control" value='<?php echo $row['Father_Contact_No']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text"  name="fatherAnnualIncome" id="fatherAnnualIncome" placeholder="" class="form-control" value='<?php echo $row['Father_Annual_Income']?>' readonly>
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text"  name="fatherAdharCardNo" id="fatherAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Father_Aadhar_Card']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Alumni</label>
	                                        <select class="select2" name="fatherAlumni" id="fatherAlumni">
	                                            <option selected value="No">No</option>
	                                            <option value="Yes">Yes</option>  
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Father Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avtar.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="fatherPhoto" id="fatherPhoto"  class="form-control-file" value='<?php echo $row['Father_Image']?>' readonly>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
                            <div class="m-section-n">
	                            <h3>Mother's Details</h3>
	                            <div class="row">
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group aj-form-group0">
	                            			 <label> Mother's Name (As Per Birth Certificate)</label>
                                            <input type="text" name="motherName" id="motherName" placeholder="" class="form-control">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Qualification</label>
	                                        <select class="select2" name="motherQual" id="motherQual">
                                            <option value="">Select Qualification</option>
	                                            <option value="Non-Matric">Non-Matric</option>
	                                            <option value="Matriculation">Matriculation</option>
	                                            <option value="Intermediate">Intermediate</option>
	                                            <option value="Graduate">Graduate</option>
	                                            <option value="Post Graduate">Post Graduate</option>
	                                            <option value="PHD">PHD</option>
                                                <option value="Other">Other</option>	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation </label>
	                                        <select class="select2" name="motherOccupation" id="motherOccupation">
                                                <option value="">Select Occupation</option>
	                                            <option value="Armed Forces">Armed Forces</option>
	                                            <option value="Business">Business</option>
	                                            <option value="Doctor">Doctor</option>
	                                            <option value="Engineer">Engineer</option>
	                                            <option value="Public/PSU Sec. Employee">Public/PSU Sec. Employee</option>
	                                            <option value="Private Sec. Employee">Private Sec. Employee</option>
                                                <option value="Other">Other</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="motherDesig" id="motherDesig" placeholder="" class="form-control" value='<?php echo $row['Mother_Designation']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name</label>
	                                        <input type="text" name="motherOrgName" id="motherOrgName" placeholder="" class="form-control" value='<?php echo $row['Mother_Org_Name']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="motherOrgAdd" id="motherOrgAdd" placeholder="" class="form-control" value='<?php echo $row['Mother_Org_Add']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="motherCity" id="motherCity" placeholder="" class="form-control" value='<?php echo $row['Mother_City']?>' readonly>
                                        </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text" name="motherState" id="motherState" placeholder="" class="form-control" value='<?php echo $row['Mother_State']?>' readonly>
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label> Country </label>
	                                        <input type="text" name="motherCountry" id="motherCountry" placeholder="" class="form-control" value='<?php echo $row['Mother_Country']?>' readonly>
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text" name="motherPinCode" id="motherPinCode" placeholder="" class="form-control" value='<?php echo $row['Mother_Pincode']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="motherEmail"  id="motherEmail" placeholder="" class="form-control" value='<?php echo $row['Mother_Email']?>' readonly>
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="12" maxlength="12" name="motherContactNo" id="motherContactNo" placeholder="" class="form-control" value='<?php echo $row['Mother_Contact_No']?>' readonly>
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text" name="motherAnnualIncome" id="motherAnnualIncome" placeholder="" class="form-control" value='<?php echo $row['Mother_Annual_Income']?>' readonly>
	                                    </div>
	                                    
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text" name="motherAdharCardNo" id="motherAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Mother_Aadhar_Card']?>' readonly>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Alumni</label>
	                                        <select class="select2" name="motherAlumni" id="motherAlumni">
	                                            <option value="No">No</option>
	                                            <option value="Yes">Yes</option>
	                                            
	                                        </select>
	                                    </div>
	                                    <div class="form-group faj-form-group">
	                                        <label class="text-dark-medium">Upload Mother Photo ( JPEG Less Than 2MB)</label>
	                                        <div class="d-image-user">
	                                            <img src="img/avatar-female.png">
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="motherPhoto"  id="motherPhoto" class="form-control-file" value='<?php echo $row['Mother_Image']?>' readonly>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>		
	                        </div>


                           
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Gaurdian Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12 ">
                                    <div class="form-group aj-form-group text-center">
                                        <!-- <span> Any Sibling in this School ?(Real brother/sister)</span> -->
                                        <div class="row-chang">
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian" checked>Father</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian">Mother</span>
                                            </div>
                                            <div class="radio">
                                              <span><input type="radio" class="gaurdian-bs" name="gaurdian">Others </span>
                                            </div>
                                        </div>
                                    </div>

                                	<div class="active-div-aa" style="display: none;">
                                		<div class="row">
			                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
			                                    <div class="form-group aj-form-group">
			                                        <label>Address</label>
			                                        <textarea type="text" name="othersAddress" id="othersAddress" rows="7" placeholder="" class="aj-form-control" value='<?php echo $row['Guardian_Address']?>' readonly> </textarea>
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Name</label>
			                                        <input type="text" name="othersName" id="othersName" placeholder="" class="form-control" value='<?php echo $row['Guardian_Name']?>' readonly>
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Relations</label>
                                                    <select class="select2" name="othersRelation" id="othersRelation">
                                                        <option value="">Select Relation</option>
                                                        <option value="Uncle">Uncle</option>
                                                        <option value="Aunt">Aunt</option>
                                                        <option value="Grand Father">Grand Father</option>
                                                        <option value="Grand Mother">Grand Mother</option>
                                                        <option value="Friend">Friend</option>
                                                        <option value="Other">Other</option>
	                                                </select>
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Mobile No.</label>
			                                        <input type="text" name="othersMobileNo" id="othersMobileNo" placeholder="" class="form-control" value='<?php echo $row['Guardian_Contact_No']?>' readonly>
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    

			                                    <div class="form-group faj-form-group">
			                                        <label class="text-dark-medium">Upload  Photo ( JPEG Less Than 2MB)</label>
			                                        <div class="d-image-user">
			                                            <img src="img/avtar.png">
			                                        </div>
		                                            <div class="file-in">
		                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
		                                                <input type="file" name="othersPhoto" id="othersPhoto" class="form-control-file" value='<?php echo $row['Guardian_Image']?>' readonly>
		                                            </div>
		                                        </div>
			                                </div>
			                            </div>
                                	</div>
                                </div>
                            </div>


                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">SMS Communication</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>SMS Contact No. <span>*</span></label>
                                        <input type="text" name="studSMSContactNo" id="studSMSContactNo" minlength="10" maxlength="10" required="" placeholder="" class="form-control" value='<?php echo $row['SMS_Contact_No']?>' readonly>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Whatsapp Contact No.</label>
                                        <input type="text" name="studWhatsAppContactNo" id="studWhatsAppContactNo" minlength="10" maxlength="10" placeholder="" class="form-control" value='<?php echo $row['Whatsapp_Contact_No']?>' readonly>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>E-Mail Address</label>
                                        <input type="text" name="studEmailAddress"  id="studEmailAddress" placeholder="" class="form-control" value='<?php echo $row['Email_Id']?>' readonly> 
                                    </div>
                                </div>
                            </div>
                            <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Documents Submited</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_1" id="docUpload_1">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_2" id="docUpload_2">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_3" id="docUpload_3">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_4" id="docUpload_4">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div> <br><br>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload</label>
                                            <select class="select2" name="docUpload_5" id="docUpload_5">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_6" id="docUpload_6">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_7" id="docUpload_7">
                                                <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_8" id="docUpload_8">
                                            <option value="">Select Document</option>
                                                <option selected value="Aadhar">Aadhar</option>
                                                <option value="Address Proof">Address Proof</option>
                                                <option value="Birth_Cert">Birth Certificate</option>
                                                <option value="Bonafied">Bonafied</option>
                                                <option value="CC">Character Cert</option>
                                                <option value="SLC">School Leaving Cert</option>
                                                <option value="TC">Transfer Cert.</option>
                                            </select>
                                        </div>
                                </div>
                                
                            </div>
                            <div class="footer-sec-aj">
                            </div>
                            
                            <div class="aaj-btn-chang-c">
                                    <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
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
    <script type="text/javascript">
	    $('.sibling-bs').change('.sibling-bs',function(){
	         var a= $('input[name="sibling"]:checked').val();
	         var id = $(this).attr('id')
	          if(a == 'on'){
	            $('.active-div-a').slideToggle('slow');
	            
	          }else{
	            
	          }
	        })
	     $('.gaurdian-bs').change('.gaurdian-bs',function(){
	         var a= $('input[name="gaurdian"]:checked').val();
	         var id = $(this).attr('id')
	          if(a == 'on'){
	            $('.active-div-aa').slideToggle('slow');
	            
	          }else{
	            
	          }
	        })
        

        $(document).ready(function(){
            $("#studentAge").focusin(function(){
                var dob = $('#studentDOB').val();
                $("#studentAge").val(moment().diff(moment(dob, 'DD-MM-YYYY'), 'years'));              
            });


            
        });
	</script>
</body>

</html>