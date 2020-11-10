    <?php
            session_start();
            include 'dbobj.php';
            include 'security.php';
            include 'errorLog.php';
            include 'AdmissionModel.php';

            // Turn on all error reporting
            // Report all PHP errors (see changelog)
            error_reporting(E_ALL);
            //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
            ini_set('display_errors', 1);

            //starts here
            $lid=$_SESSION["LOGINID"];
            $schoolId=$_SESSION["SCHOOLID"];
            $admission_Id = $_REQUEST["admission_Id"];

            $selectAdmissionSql = "Select *, date_format(DOB,'%d/%m/%Y') as DOB From admission_master_table Where Admission_Id = ?";
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

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    $classDropdownValue = "";
    $sql='select cmt.Class_Id,cmt.class_name,cst.stream from class_master_table cmt,class_stream_table cst where enabled=1 and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 and cst.stream_id=cmt.stream order by class_no,stream";

    $result=mysqli_query($dbhandle,$sql);
    while($classRow=mysqli_fetch_assoc($result))
    {
        if($row["Class_Id"] ==  $classRow["Class_Id"]){
            $classDropdownValue = '<option selected value="' . $classRow["Class_Id"] . '">Class ' . $classRow["class_name"] . ' ' . $classRow["stream"] . '</option>' . $classDropdownValue;
        } else{
            $classDropdownValue = '<option value="' . $classRow["Class_Id"] . '">Class ' . $classRow["class_name"] . ' ' . $classRow["stream"] . '</option>' . $classDropdownValue;
        }
    }

    $classDropdownValue_2 = "";
    $result=mysqli_query($dbhandle,$sql);
    while($classRow_2=mysqli_fetch_assoc($result))
    {
        if($row["Prev_School_Class"] ==  $classRow_2["Class_Id"]){
            $classDropdownValue_2 = '<option selected value="' . $classRow_2["Class_Id"] . '">Class ' . $classRow_2["class_name"] . ' ' . $classRow_2["stream"] . '</option>' . $classDropdownValue_2;
        } else{
            $classDropdownValue_2 = '<option value="' . $classRow_2["Class_Id"] . '">Class ' . $classRow_2["class_name"] . ' ' . $classRow_2["stream"] . '</option>' . $classDropdownValue_2;
        }
    }


    $classDropdownValue_3 = "";
    $result=mysqli_query($dbhandle,$sql);
    while($classRow_3=mysqli_fetch_assoc($result))
    {
        if($row["Sibling_1_Class"] ==  $classRow_3["Class_Id"]){
            $classDropdownValue_3 = '<option selected value="' . $classRow_3["Class_Id"] . '">Class ' . $classRow_3["class_name"] . ' ' . $classRow_3["stream"] . '</option>' . $classDropdownValue_3;
        } else{
            $classDropdownValue_3 = '<option value="' . $classRow_3["Class_Id"] . '">Class ' . $classRow_3["class_name"] . ' ' . $classRow_3["stream"] . '</option>' . $classDropdownValue_3;
        }
    }

    $classDropdownValue_4 = "";
    $result=mysqli_query($dbhandle,$sql);
    while($classRow_4=mysqli_fetch_assoc($result))
    {
        if($row["Sibling_2_Class"] ==  $classRow_4["Class_Id"]){
            $classDropdownValue_4 = '<option selected value="' . $classRow_4["Class_Id"] . '">Class ' . $classRow_4["class_name"] . ' ' . $classRow_4["stream"] . '</option>' . $classDropdownValue_4;
        } else{
            $classDropdownValue_4 = '<option value="' . $classRow_4["Class_Id"] . '">Class ' . $classRow_4["class_name"] . ' ' . $classRow_4["stream"] . '</option>' . $classDropdownValue_4;
        }
    }

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
                                <h4>Admission Id : <?php echo $row['School_Admission_Id']  ?></h3>
                            </div>
                        <form class="new-added-form aj-new-added-form"  action="AdmissionAddForm_3.php" id="admitForm" enctype="multipart/form-data">
                            <div class="row">
                            <input type="text" name="admissionId" id="admissionId" placeholder="" required="" class="form-control" value='<?php echo $row['Admission_Id'];  ?>'  style="display: none;">
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>First Name (As Per Birth Certificate) <span>*</span></label>

                                        <input type="text" name="studentFirstName" id="studentFirstName" placeholder="" required="" class="form-control" value='<?php echo $row['First_Name']  ?>'  >
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="studentMiddleName" id="studentMiddleName" placeholder="" required="" class="form-control" value='<?php echo $row['Middle_Name']  ?>'  >
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="studentLastName" id="studentLastName=" placeholder="" required="" class="form-control" value='<?php echo $row['Last_Name']  ?>'  >
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Class <span>*</span></label>
                                        <select class="select2" name="studclassToApply" id="studclassToApply">
                                        <?php
                                            echo $classDropdownValue;
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Section</label>
                                        <select class="select2" name="f_Section"  >
                                            <option value="">Please Select Section </option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                        </select>
                                    </div>

                                   <div class="form-group aj-form-group">
                                        <label>Roll No.</label>
                                        <select class="select2" name="f_Gender"  >
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
                                            <option value="MALE" <?php if($row["Gender"]=='MALE') echo 'selected="selected"'; else echo ''; ?>>Male</option>
                                            <option value="FEMALE"  <?php if($row["Gender"]=='FEMALE') echo 'selected="selected"'; else echo ''; ?>>Female</option>
                                            <option value="OTHER"  <?php if($row["Gender"]=='OTHER') echo 'selected="selected"'; else echo ''; ?>>Others</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Date of Birth <span>*</span></label>
                                        <input type="text" name="studentDOB" id="studentDOB" required="" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" value='<?php echo $row['DOB'] ?>'  >
                                        <i class="far fa-calendar-alt"></i>
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Age</label>
                                        <input type="text" name="studentAge" id="studentAge" placeholder="" value="<?php echo $row['Age'] ?>"  class="form-control">
                                    </div>

                                    <div class="form-group aj-form-group">
                                        <label>Social Category <span>*</span></label>
                                        <select class="select2" required="" name="studentSocialCat" id="studentSocialCat">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_SOCIAL_CAT as $x=>$x_value)
                                                {
                                                    if($row['Social_Category'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Discount Category <span>*</span></label>
                                        <select class="select2" required="" name="studDiscCat" id="studDiscCat">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_DISCOUNT_CAT as $x=>$x_value)
                                                {
                                                    if($row['Discount_Category'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }                                                }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Locality </label>
                                        <select class="select2" name="studLocality" id="studLocality">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_LOCALITY as $x=>$x_value)
                                                {
                                                    if($row['Locality'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Academic Session <span>*</span></label>
                                        <select class="select2" required="" name="studAcademicSession" id="studAcademicSession">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_SCHOOL_SESSION as $x=>$x_value)
                                                {
                                                    if($row['Session'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
                                       </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Mother Tongue <span>*</span></label>
                                        <select class="select2" required="" name="studMotherTongue" id="studMotherTongue" >
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_LANGUAGES as $x=>$x_value)
                                                {
                                                    if($row['Mother_Tongue'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                        ?>
                                       </select>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                	<div class="form-group aj-form-group">
                                        <label>Religion <span>*</span></label>
                                        <select class="select2" required="" name="studReligion" id="studReligion">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_RELIGION as $x=>$x_value)
                                                {
                                                    if($row['Religion'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Nationality <span>*</span></label>
                                        <select class="select2" required="" name="studNationality" id="studNationality">
                                            <option value="">Select Nationality</option>
                                            <option value="INDIAN" <?php if($row["Nationality"]=='INDIAN') echo 'selected="selected"'; else echo ''; ?>>Indian</option>
                                            <option value="OTHERS" <?php if($row["Nationality"]=='OTHERS') echo 'selected="selected"'; else echo ''; ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Blood Group </label>
                                        <select class="select2" name="studBloodGroup" id="studBloodGroup">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_BLOOD_GROUP as $x=>$x_value)
                                                {
                                                    if($row['Blood_Group'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Adhaar Card No.</label>
                                        <input type="text" name="studAdharCardNo" id="studAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Aadhar_No']?>'  >
                                    </div>

                                    <div class="form-group faj-form-group">
                                        <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than  2MB)</label>
                                        <div class="d-image-user">
                                            <?php
                                                if(empty($row['Student_Image'])){
                                                    echo '<img src="img/avtar.png">';
                                                }
                                                else{
                                                    echo '<img src="./app_images/'.$row['Student_Image'].'" style="width: 200px; height:125px;">';
                                                }
                                            ?>
                                        </div>
                                            <div class="file-in">
                                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                                                <input type="file" name="studentPhoto" id="studentPhoto" class="form-control-file" value='<?php echo $row['Student_Image'] ?>'  >
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
                                        <input type="text" name="studPrevSchoolName" id="studPrevSchoolName" placeholder="" class="form-control" value='<?php echo $row['Prev_School_Name'] ?>'  >
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Medium of Instruction</label>
                                         <select class="select2" name="studMOI" id="studMOI">
                                         <?php
                                                $string = "";
                                                foreach($GLOBAL_LANGUAGES as $x=>$x_value)
                                                {
                                                    if($row['Prev_School_Medium'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                   }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Board</label>
                                        <select class="select2" name="studBoard" id="studBoard">
                                        <?php
                                                $string = "";
                                                foreach($GLOBAL_SCHOOL_BOARD as $x=>$x_value)
                                                {
                                                    if($row['Prev_School_Board'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Class</label>
                                        <select class="select2" name="studClass" id="studClass">
                                        <?php
                                            echo $classDropdownValue_2;
                                        ?>
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
                                        <textarea type="text" rows="4" name="commAddress" id="commAddress" required="" placeholder="" class="aj-form-control"  ><?php echo $row['Comm_Address'] ?> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>City/ District<span>*</span></label>
                                        <input type="text" name="commCityDist" id="commCityDist" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_City_Dist'] ?>'  >
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode<span>*</span></label>
                                        <input type="text" name="commPinCode" id="commPinCode" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_Pincode'] ?>'  >
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State<span>*</span> </label>
                                        <input type="text" name="commState" id="commState" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_State'] ?>'  >

                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No.<span>*</span></label>
                                        <input type="text" name="commContactNo" id="commContactNo" required="" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_ContactNo'] ?>'  >
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="commCountry" id="commCountry" placeholder="" class="form-control" value='<?php echo $row['Comm_Add_Country'] ?>'  >
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
                                        <textarea type="text" rows="4" name="raAddress"  id="raAddress" required="" placeholder="" class="aj-form-control"><?php echo $row['Resid_Address']?> </textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label> City/ District <span>*</span></label>
                                        <input type="text" name="raCityDist"  id="raCityDist" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_City_Dist']?>'  >
                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Pincode <span>*</span></label>
                                        <input type="text" name="raPinCode" id="raPinCode" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_Pincode']?>'  >
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>State <span>*</span> </label>
                                        <input type="text" name="raState" id="raState" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_State']?>'  >


                                    </div>
                                    <div class="form-group aj-form-group">
                                        <label>Contact No. <span>*</span></label>
                                        <input type="text" name="raContactNo" id="raContactNo" required="" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_ContactNo']?>'  >
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>Country</label>
                                        <input type="text" minlength="12" maxlength="12" name="raCountry" id="raCountry" placeholder="" class="form-control" value='<?php echo $row['Resid_Add_Country']?>'  >
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
                                                    <input type="text" name="sibling1StudId"  id="sibling1StudId" placeholder="" class="form-control" value='<?php echo $row['Sibling_1_Student_Id']?>'  >
                                                </div>

                                            </div>

                                			<div class="col-xl-3 col-lg-3 col-12">
                                				<div class="form-group aj-form-group">
			                                        <label>Class <span>*</span></label>
			                                        <select class="select2" name="sibling1Class"  id="sibling1Class">
                                                    <?php
                                                        echo $classDropdownValue_3;
                                                    ?>
			                                        </select>
			                                    </div>

                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Section</label>
                                                    <input type="text" name="sibling1Section"  id="sibling1Section" placeholder="" class="form-control" value='<?php echo $row['Sibling_1_Section']?>'  >
			                                    </div>

                                			</div>
                                			<div class="col-xl-3 col-lg-3 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Roll No.</label>
                                                    <input type="text" name="sibling1RollNo"  id="sibling1RollNo" placeholder="" class="form-control" value='<?php echo $row['Sibling_1_RollNo']?>'  >
			                                    </div>
                                			</div>

                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Student Id</label>
                                                    <input type="text" name="sibling2StudId" id="sibling2StudId" placeholder="" class="form-control" value='<?php echo $row['Sibling_2_Student_Id']?>'  >
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Class <span>*</span></label>
                                                    <select class="select2" name="sibling2Class" id="sibling2Class" >
                                                    <?php
                                                        echo $classDropdownValue_4;
                                                    ?>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Section</label>
                                                     <input type="text" name="sibling2Section"  id="sibling2Section" placeholder="" class="form-control" value='<?php echo $row['Sibling_2_Section']?>'  >
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-12 mt-4">
                                                <div class="form-group aj-form-group">
                                                    <label>Roll No.</label>
                                                    <input type="text" name="sibling2RollNo"  id="sibling2RollNo" placeholder="" class="form-control" value='<?php echo $row['Sibling_2_RollNo']?>'  >
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
                                            <input type="text" name="fatherName" id="fatherName" placeholder="" class="form-control" value='<?php echo $row['Father_Name']?>'  >
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Qualification</label>
	                                        <select class="select2" name="fatherQual" id="fatherQual">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_QUALIFICATION as $x=>$x_value)
                                                {
                                                if($row['Father_Qualification'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                            ?>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation</label>
	                                        <select class="select2" name="fatherOccupation" id="fatherOccupation">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_OCCUPATION as $x=>$x_value)
                                                {
                                                    if($row['Father_Occupation'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="fatherDesig" id="fatherDesig" placeholder="" class="form-control" value='<?php echo $row['Father_Designation']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name</label>
	                                        <input type="text" name="fatherOrgName" id="fatherOrgName" placeholder="" class="form-control" value='<?php echo $row['Father_Org_Name']?>'  >
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="fatherOrgAdd" id="fatherOrgAdd" placeholder="" class="form-control" value='<?php echo $row['Father_Org_Add']?>'  >
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="fatherCity" id="fatherCity" placeholder="" class="form-control" value='<?php echo $row['Father_City']?>'  >
                                        </div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text"  name="fatherState" id="fatherState" placeholder="" class="form-control" value='<?php echo $row['Father_State']?>'  >
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label>Country</label>
	                                        <input type="text" name="fatherCountry" id="fatherCountry" placeholder="" class="form-control" value='<?php echo $row['Father_Country']?>'  >
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text"  name="fatherPinCode" id="fatherPinCode" placeholder="" class="form-control" value='<?php echo $row['Father_Pincode']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="fatherEmail" id="fatherEmail" placeholder="" class="form-control" value='<?php echo $row['Father_Email']?>'  >
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="10" maxlength="10" name="fatherContactNo" id="fatherContactNo" placeholder="" class="form-control" value='<?php echo $row['Father_Contact_No']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text"  name="fatherAnnualIncome" id="fatherAnnualIncome" placeholder="" class="form-control" value='<?php echo $row['Father_Annual_Income']?>'  >
	                                    </div>

	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text"  name="fatherAdharCardNo" id="fatherAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Father_Aadhar_Card']?>'  >
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
                                            <?php
                                                if(empty($row['Father_Image'])){
                                                    echo '<img src="img/avtar.png">';
                                                }
                                                else{
                                                    echo '<img src="./app_images/'.$row['Father_Image'].'" style="width: 200px; height:125px;">';
                                                }
                                            ?>
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="fatherPhoto" id="fatherPhoto"  class="form-control-file" value='<?php echo $row['Father_Image']?>'  >
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
                                            <input type="text" name="motherName" id="motherName" placeholder="" class="form-control" value="<?php echo $row['Mother_Name'] ?>">
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Qualification</label>
	                                        <select class="select2" name="motherQual" id="motherQual">
                                            <option value="">Select Qualification</option>
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_QUALIFICATION as $x=>$x_value)
                                                {
                                                if($row['Mother_Qualification'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                            ?>
                                            </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Occupation </label>
	                                        <select class="select2" name="motherOccupation" id="motherOccupation">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_OCCUPATION as $x=>$x_value)
                                                {
                                                    if($row['Mother_Occupation'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                }
                                                echo $string;
                                        ?>
	                                        </select>
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>Designation</label>
                                            <input type="text" name="motherDesig" id="motherDesig" placeholder="" class="form-control" value='<?php echo $row['Mother_Designation']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Name</label>
	                                        <input type="text" name="motherOrgName" id="motherOrgName" placeholder="" class="form-control" value='<?php echo $row['Mother_Org_Name']?>'  >
	                                    </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Org Address</label>
	                                        <input type="text" name="motherOrgAdd" id="motherOrgAdd" placeholder="" class="form-control" value='<?php echo $row['Mother_Org_Add']?>'  >
	                                    </div>
	                                    <div class="form-group aj-form-group">
                                            <label>City</label>
                                            <input type="text" name="motherCity" id="motherCity" placeholder="" class="form-control" value='<?php echo $row['Mother_City']?>'  >
                                        </div>

	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
	                            		<div class="form-group aj-form-group">
	                                        <label>State</label>
	                                        <input type="text" name="motherState" id="motherState" placeholder="" class="form-control" value='<?php echo $row['Mother_State']?>'  >
	                                    </div>
	                                	<div class="form-group aj-form-group">
	                                        <label> Country </label>
	                                        <input type="text" name="motherCountry" id="motherCountry" placeholder="" class="form-control" value='<?php echo $row['Mother_Country']?>'  >
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Pincode</label>
                                            <input type="text" name="motherPinCode" id="motherPinCode" placeholder="" class="form-control" value='<?php echo $row['Mother_Pincode']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Email</label>
	                                        <input type="text" name="motherEmail"  id="motherEmail" placeholder="" class="form-control" value='<?php echo $row['Mother_Email']?>'  >
	                                    </div>
                                        <div class="form-group aj-form-group">
                                            <label>Contact No.</label>
                                            <input type="text" minlength="12" maxlength="12" name="motherContactNo" id="motherContactNo" placeholder="" class="form-control" value='<?php echo $row['Mother_Contact_No']?>'  >
                                        </div>
	                                    <div class="form-group aj-form-group">
	                                        <label>Annual Income</label>
	                                        <input type="text" name="motherAnnualIncome" id="motherAnnualIncome" placeholder="" class="form-control" value='<?php echo $row['Mother_Annual_Income']?>'  >
	                                    </div>

	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-12 ">
	                                    <div class="form-group aj-form-group">
	                                        <label>Adhaar  Card No.</label>
	                                         <input type="text" name="motherAdharCardNo" id="motherAdharCardNo" placeholder="" class="form-control" value='<?php echo $row['Mother_Aadhar_Card']?>'  >
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
                                            <?php
                                                if(empty($row['Mother_Image'])){
                                                    echo '<img src="img/avtar.png">';
                                                }
                                                else{
                                                    echo '<img src="./app_images/'.$row['Mother_Image'].'" style="width: 200px; height:125px;">';
                                                }
                                            ?>
	                                        </div>
	                                        <div class="file-in">
	                                            <span class="fa fa-pencil-alt" aria-hidden="true"></span>
	                                            <input type="file" name="motherPhoto"  id="motherPhoto" class="form-control-file" value='<?php echo $row['Mother_Image']?>'  >
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
			                                        <textarea type="text" name="othersAddress" id="othersAddress" rows="7" placeholder="" class="aj-form-control" value='<?php echo $row['Guardian_Address']?>'  > </textarea>
			                                    </div>
			                                </div>
			                                <div class="col-xl-4 col-lg-4 col-12">
			                                    <div class="form-group aj-form-group">
			                                        <label>Name</label>
			                                        <input type="text" name="othersName" id="othersName" placeholder="" class="form-control" value='<?php echo $row['Guardian_Name']?>'  >
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Relations</label>
                                                    <select class="select2" name="othersRelation" id="othersRelation">
                                                    <?php
                                                        $string = "";
                                                        foreach($GLOBAL_OTHER_RELATION as $x=>$x_value)
                                                        {
                                                            if($row['Guardian_Relation'] == $x){
                                                                $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                            }else {
                                                                $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                            }
                                                        }
                                                        echo $string;
                                                    ?>
	                                                </select>
			                                    </div>
			                                    <div class="form-group aj-form-group">
			                                        <label>Mobile No.</label>
			                                        <input type="text" name="othersMobileNo" id="othersMobileNo" placeholder="" class="form-control" value='<?php echo $row['Guardian_Contact_No']?>'  >
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
		                                                <input type="file" name="othersPhoto" id="othersPhoto" class="form-control-file" value='<?php echo $row['Guardian_Image']?>'  >
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
                                        <input type="text" name="studSMSContactNo" id="studSMSContactNo" minlength="10" maxlength="10" required="" placeholder="" class="form-control" value='<?php echo $row['SMS_Contact_No']?>'  >
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Whatsapp Contact No.</label>
                                        <input type="text" name="studWhatsAppContactNo" id="studWhatsAppContactNo" minlength="10" maxlength="10" placeholder="" class="form-control" value='<?php echo $row['Whatsapp_Contact_No']?>'  >
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 ">
                                    <div class="form-group aj-form-group">
                                        <label>E-Mail Address</label>
                                        <input type="text" name="studEmailAddress"  id="studEmailAddress" placeholder="" class="form-control" value='<?php echo $row['Email_Id']?>'  >
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
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_1'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_2" id="docUpload_2">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_2'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_3" id="docUpload_3">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_3'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_4" id="docUpload_4">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_4'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div> <br><br>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload</label>
                                            <select class="select2" name="docUpload_5" id="docUpload_5">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_5'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_6" id="docUpload_6">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_6'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_7" id="docUpload_7">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_7'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_8" id="docUpload_8">
                                            <?php
                                                $string = "";
                                                foreach($GLOBAL_DOC_TYPE as $x=>$x_value)
                                                {
                                                    if($row['Doc_Upload_8'] == $x){
                                                        $string =  '<option selected value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }else {
                                                        $string =  '<option value="' . $x . '">' .$x_value .'</option>' . $string;
                                                    }
                                                 }
                                                echo $string;
                                            ?>
                                          </select>
                                        </div>
                                </div>

                            </div>
                            <div class="footer-sec-aj">
                            </div>

                            <div class="aaj-btn-chang-c">
                                    <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <a href="./ajax_controllers/admission_pdf.php?action=download_pdf&admission_Id=99"  class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow" id="btn_save_pdf"><i class="fa fa-save"></i> Download PDF</a>
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
    <!-- MyScript Js -->
    <script src="js/myscript.js"></script>
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
