<?php
session_start();
include 'dbobj.php';
include 'security.php';
include 'errorLog.php';
require_once './GlobalModel.php';
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SWIFTCAMPUS | Admission Form Print</title>
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
        <?php include('includes/navbar.php') ?>
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
                <div class="breadcrumbs-area  d-print-none">
                    <h3>Application Print</h3>
                    <ul>
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li>Application Print</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                    <table>
                        <tr>
                            <th style="padding:10px;" width="50%">
                                <img src="./app_images/school_images/logo.jpeg" alt="" class="w-100 school_img">
                            </th>
                            <th class="text-right">
                                <p class="mr-3 mt-2" style="font-size: 12px;">Date and Time : <?php echo date('d/m/Y H:i:s'); ?></p>
                                <p class="mr-3 mt-2">Registration No : 13s/2020</p>
                                <p class="mr-3 mt-2" style="font-size: 12px;">Bokaro Steel, City, Sector-4,Bokaro, Jharkhand, India 826004</p>   
                            </th>
                        </tr>

                    </table>
                        <table>
                            <tr class="heading">
                                <th colspan="6">Student Details</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td colspan="3" class="first_name text-uppercase">Md Meraj Alam</td>                              
                                <th rowspan="6" colspan="2"  width="20%" class="image_th" width="20%"><img class="main_img" src="./img/avatar_blank.png" width="200px" alt=""></th>
                            </tr>
                            <tr>
                                <th>Admission No</th>
                                <td class="student_id"></td>                                  
                                <th>Class</th>
                                <td class="class"></td>
                            </tr>
                            <tr>
                                <th>Section</th>
                                <td class="section">N.A.</td>                                
                                <th>Roll No</th>
                                <td class="roll">N.A.</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td class="dob">General</td>                                
                                <th>Gender</th>
                                <td class="gender">General</td>                              
                            </tr>
                            <tr>
                                <th>Stream</th>
                                <td class="stream">BPL</td>                                  
                                <th>Category</th>
                                <td class="soc_cat">Dhanbad</td>
                            </tr>
                            <tr>
                                <th>Discount Category</th>
                                <td class="dis_category">2020-2021</td>                                
                                <th>Locality</th>
                                <td class="locality">English</td>                                
                            </tr>
                            <tr>
                                <th>Session</th>
                                <td class="session">Hindu</td>                                
                                <th>Mother Tongue</th>
                                <td class="tongue">Indian</td>
                                <th>Religion</th>
                                <td class="religion">A+</td>                                
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td class="nationality">4698 5689 9852</td>
                                <th>Blood Group</th>
                                <td class="b_group">4698 5689 9852</td>
                                <th>Aadhar</th>
                                <td class="aadhar">4698 5689 9852</td>
                            </tr>
                        </table>

                        <table style="margin-top: 30px;">
                            <tr class="heading">
                                <th colspan="4" class="padd">Communication Address</th>
                                <th colspan="3" class="padd">Residential Address</th>
                            </tr>
                            <tr>
                                <td colspan="4" class="com_add padd text-uppercase"></td>
                                <td class="res_add padd text-uppercase" colspan="3"></td>
                            </tr>
                        </table>

                        <table style="margin-top: 30px;">
                            <tr class="heading">
                                <th colspan="6">Father's Detail</th>
                            </tr>
                            <tr>
                                <th class="padd">Name</th><td class="father_name text-uppercase"></td>
                                <th class="padd">Occupation</th><td class="father_occupation"></td>
                                <th colspan="2" rowspan="5" style="text-align: center;"  width="20%"><img class="main_img_father" src="./img/avatar_blank.png"  width="200px" alt=""></th>
                            </tr>
                            <tr>
                                <th>Designation</th><td class="father_desig"></td>
                                <th>Organition</th><td class="father_org"></td>
                            </tr>                            
                            <tr>
                                <th>Qualification</th><td class="father_qualification"></td>
                                <th>Email</th><td class="father_email"></td>
                            </tr>
                            <tr>
                                <th>Contact</th><td class="father_contact"></td>
                                <th>Address</th><td class="father_add"></td>
                            </tr>
                        </table>

                        <table style="margin-top: 30px;">
                            <tr class="heading">
                                <th colspan="6">Mother's Detail</th>
                            </tr>
                            <tr>
                                <th class="padd">Name</th><td class="mother_name text-uppercase"></td>
                                <th class="padd">Occupation</th><td class="mother_occupation"></td>
                                <th colspan="2" rowspan="5" style="text-align: center;" width="20%"><img class="main_img_mother" src="./img/avatar_blank.png" alt=""></th>
                            </tr>
                            <tr>
                                <th>Designation</th><td class="mother_desig"></td>
                                <th>Organition</th><td class="mother_org"></td>
                            </tr>                               
                            <tr>
                                <th>Qualification</th><td class="mother_qualification"></td>
                                <th>Email</th><td class="mother_email"></td>
                            </tr>
                            <tr>
                                <th>Contact</th><td class="mother_contact"></td>
                                <th>Address</th><td class="mother_add"></td>
                            </tr>
                        </table>    
                        <table style="margin-top: 30px;">
                            <tr class="heading">
                                <th colspan="6">SMS Communication</th>
                            </tr>
                            <tr>
                                <th class="padd">SMS Contact</th><td class="sms_contact"></td>
                                <th class="padd">Whatsapp</th><td class="whatsapp_contact"></td>
                                <th class="padd">Email</th><td class="email_add"></td>
                            </tr>
                        </table>  
                        
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
                <footer class="footer-wrap-layout1 d-print-none">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
        <style>
            table {
                width: 100%;
                font-size: 15px;
            }

            table{
                border: 1px solid #D9D9D9;
                padding: 4px;
            }
            th,td{
                padding:8px 8px 8px 8px;
                border-bottom: 1px dashed #979797;
            }
            .heading {
                background-color: #ffae01 !important;
            }

            .image_th {
                text-align: center;
            }
            .padd
            {
                padding:10px;
            }
        </style>
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
    <script>
        load_student_data(<?php echo $_REQUEST['admission_id'] ?>);
        // function to load student data 
        function load_student_data(student_id) {
            var url = "./universal_apis.php?get_admission_details=1&stud_data=" + student_id + "";
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    if (value.Middle_Name == null) {
                        var name_studs = value.First_Name + ' ' + value.Last_Name;
                    } else {
                        var name_studs = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name;
                    }
                    con_url = "./FeeControl_1.php?get_consessions=1&concession_id="+value.Discount_Category+"";
                    $.getJSON(con_url,function(responce_conc){
                        if(responce_conc.Concession_Name == null){
                            dis_name = 'N.A.';
                        }else{
                            dis_name = responce_conc.Concession_Name;
                        }
                        $('.dis_category').text(dis_name);
                    });
                    var locality = <?php echo json_encode($GLOBAL_LOCALITY); ?>;
                    st_locality = locality[value.Locality];
                    $('.first_name').text(name_studs);
                    $('.student_id').text(value.Admission_Id)
                    $('.class').text(value.Class_Name);
                    $('.section').text(value.Section);
                    $('.stream').text(value.Stream);
                    $('.soc_cat').text(value.Social_Category);
                    $('.roll').text(value.Roll_No);
                    $('.gender').text(value.Gender);
                    $('.father_name').text(value.Father_Name);
                    $('.mother_name').text(value.Mother_Name);
                    $('.dob').text(value.DOB);
                    $('.father_occupation').text(value.Father_Occupation);
                    $('.religion').text(value.Religion);
                    $('.email').text(value.Email_Id);
                    $('.session').text(value.Session);
                    $('.session_st').text(value.Session_Start_Year);
                    $('.session_en').text(value.Session_End_Year);
                    $('.tongue').text(value.Mother_Tongue);
                    $('.tongue').text(value.Mother_Tongue);
                    $('.locality').text(st_locality);
                    $('.aadhar').text(value.Aadhar_No);
                    $('.b_group').text(value.Blood_Group);
                    $('.nationality').text(value.Nationality);
                    $('.com_add').text(value.Comm_Address + ', ' + value.Comm_Add_Country + ', ' + value.Comm_Add_State + ', ' + value.Comm_Add_City_Dist + ', ' + value.Comm_Add_Pincode + ', Contact :' + value.Comm_Add_ContactNo);
                    $('.res_add').text(value.Resid_Address + ', ' + value.Resid_Add_Country + ', ' + value.Resid_Add_State + ', ' + value.Resid_Add_City_Dist + ', ' + value.Resid_Add_Pincode + ', Contact :' + value.Resid_Add_ContactNo);
                    $('.father_name').text(value.Father_Name);
                    $('.father_occupation').text(value.Father_Occupation);
                    $('.father_qualification').text(value.Father_Qualification);
                    $('.father_add').text(value.Father_Org_Name + ', ' + value.Father_Org_Add + ', ' + value.Father_City + ', ' + value.Father_State + ', ' + value.Father_Country + ', ' + value.Father_Pincode);
                    $('.father_email').text(value.Father_Email);
                    $('.father_contact').text(value.Father_Contact_No);
                    $('.father_desig').text(value.Father_Designation);
                    $('.father_org').text(value.Father_Org_Name);
                    $('.mother_name').text(value.Mother_Name);
                    $('.mother_occupation').text(value.Mother_Occupation);
                    $('.mother_qualification').text(value.Mother_Qualification);
                    $('.mother_desig').text(value.Mother_Designation);
                    $('.mother_org').text(value.Mother_Org_Name);
                    $('.mother_add').text(value.Mother_Org_Name + ', ' + value.Mother_Org_Add + ', ' + value.Mother_City + ', ' + value.Mother_State + ', ' + value.Mother_Country + ', ' + value.Mother_Pincode);
                    $('.mother_email').text(value.Mother_Email);
                    $('.mother_contact').text(value.Mother_Contact_No);
                    $('.sms_contact').text(value.SMS_Contact_No);
                    $('.whatsapp_contact').text(value.Whatsapp_Contact_No);
                    console.log(value.Student_Image);
                    $('.email_add').text(value.Email_Id);
                    url_father = './app_images/'+value.Father_Image;
                        $('.main_img_mother').attr('src', url_father);
                    url_mother = './app_images/'+value.Mother_Image;
                        $('.main_img_father').attr('src', url_mother);
                    if (value.Student_Image != null) {
                        url = './app_images/'+value.Student_Image;
                        $('.main_img').attr('src', url);
                    }
                });
            });
        }

        load_school_details();  
        function load_school_details(){
            school_url = './universal_apis.php?get_school_name_by_id=1';
            $.getJSON(school_url,function(school_response){
                
            });
        }
       
        window.setTimeout(function(){
            window.print();
        },1000);

    </script>
</body>

</html>