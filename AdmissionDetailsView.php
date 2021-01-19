    <?php
    $pageTitle  = "Admission Details View";
    require_once './includes/header.php';
    require_once './includes/navbar.php';
    include 'AdmissionModel.php';

    // Turn on all error reporting
    // Report all PHP errors (see changelog)
    error_reporting(E_ALL);
    //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
    ini_set('display_errors', 1);

    //starts here
    $lid = $_SESSION["LOGINID"];
    $schoolId = $_SESSION["SCHOOLID"];
    $admission_Id = $_REQUEST["admission_Id"];

    $selectAdmissionSql = "Select *, date_format(DOB,'%d/%m/%Y') as DOB From admission_master_table Where Admission_Id = ?";
    $stmt = $dbhandle->prepare($selectAdmissionSql);
    $stmt->bind_param("i", $admission_Id);

    //echo $admission_Id;

    $execResult = $stmt->execute();
    //echo $execResult . '<br>';
    echo $dbhandle->error;
    if (!$execResult) {
        $error_msg = mysqli_error($dbhandle);
        $sql = "";
        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        $dbhandle->query("unlock tables");
        mysqli_rollback($dbhandle);
        $str_start = '<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
        $message = 'Error: Admission Enquiry Not Saved.  Please consult application consultant.';
        $str_end = '</div>';
        echo $str_start . $message . $str_end;
        die;
    }

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    $classDropdownValue = "";
    $sql = 'select cmt.Class_Id as Class_Id,cmt.class_name from class_master_table cmt where enabled=1 and School_Id=' . $_SESSION["SCHOOLID"] . " order by Class_Id ASC";
    $prevClass = "";
    $result = mysqli_query($dbhandle, $sql);
    while ($classRow = mysqli_fetch_assoc($result)) {
        if ($row["Class_Id"] ==  $classRow["Class_Id"]) {
            $prevClass = $classRow["class_name"];
        }
    }

    $classDropdownValue_2 = "";
    $result = mysqli_query($dbhandle, $sql);
    while ($classRow_2 = mysqli_fetch_assoc($result)) {
        if ($row["Prev_School_Class"] ==  $classRow_2["Class_Id"]) {
            $classDropdownValue_2 = '<option selected value="' . $classRow_2["Class_Id"] . '">Class ' . $classRow_2["class_name"] .  '</option>' . $classDropdownValue_2;
        } else {
            $classDropdownValue_2 = '<option value="' . $classRow_2["Class_Id"] . '">Class ' . $classRow_2["class_name"] .  '</option>' . $classDropdownValue_2;
        }
    }


    $classDropdownValue_3 = "";
    $result = mysqli_query($dbhandle, $sql);
    while ($classRow_3 = mysqli_fetch_assoc($result)) {
        if ($row["Sibling_1_Class"] ==  $classRow_3["Class_Id"]) {
            $classDropdownValue_3 = '<option selected value="' . $classRow_3["Class_Id"] . '">Class ' . $classRow_3["class_name"] .  '</option>' . $classDropdownValue_3;
        } else {
            $classDropdownValue_3 = '<option value="' . $classRow_3["Class_Id"] . '">Class ' . $classRow_3["class_name"] . '</option>' . $classDropdownValue_3;
        }
    }

    $classDropdownValue_4 = "";
    $result = mysqli_query($dbhandle, $sql);
    while ($classRow_4 = mysqli_fetch_assoc($result)) {
        if ($row["Sibling_2_Class"] ==  $classRow_4["Class_Id"]) {
            $classDropdownValue_4 = '<option selected value="' . $classRow_4["Class_Id"] . '">Class ' . $classRow_4["class_name"] .  '</option>' . $classDropdownValue_4;
        } else {
            $classDropdownValue_4 = '<option value="' . $classRow_4["Class_Id"] . '">Class ' . $classRow_4["class_name"] . '</option>' . $classDropdownValue_4;
        }
    }
    ?>
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title aj-item-title">
                    <h3 class="mb-4">Application Details</h3>
                    <h4>Admission Id : <?php echo $row['School_Admission_Id']  ?></h3>
                </div>
                <?php echo  '<div class="row"><div class="col-xl-9 col-lg-9 col-9 aj-mb-2 ">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-8 mb-2"><strong>Name :</strong> ' . $row['First_Name'] . ' ' . $row['Middle_Name'] . ' ' . $row['Last_Name'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>DOB : </strong>' . date('d-M-Y', strtotime($row['DOB'])) . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Age : </strong>' . $row['Age'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Religion : </strong>' . $row['Religion'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Nationality : </strong>' . $row['Nationality'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Category : </strong>' . $row['Social_Category'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Blood Group : </strong>' . $row['Blood_Group'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Class : </strong>' . $row['Class_Id'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Section : </strong>' . $row['Class_Id'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Roll No : </strong>' . $row['Class_Id'] . '</div>
                                   
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Gender : </strong>' . $row['Gender'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Discount Category : </strong>' . $row['Discount_Category'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Aadhar : </strong>' . implode(" ", str_split($row['Aadhar_No'], 4)) . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Locality : </strong>' . $row['Locality'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Session : </strong>' . $row['Academic_Session'] . '</div>
                                    <div class="col-xl-3 col-lg-3 col-4 mb-2"><strong>Mother Tongue : </strong>' . $row['Mother_Tongue'] . '</div>
                                </div>
                         </div>  
                            <div class="col-xl-3 col-lg-3 col-3 aj-mb-2"><img src="./app_images/' . $row['Student_Image'] . '" style="width: 75%; height:75%;"></div>  </div>
                        ';
                ?>
                <div class="item-title aj-item-title f-aj-item-title">
                    <h3 class="mb-4">Previous School Details</h3>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-3 aj-mb-2">
                        <strong>School Name :</strong>
                        <?php echo $row['Prev_School_Name'] ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-3 aj-mb-2">
                        <strong>Medium of Instruction :</strong>
                        <?php echo $row['Prev_School_Medium']
                        ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-3 aj-mb-2">
                        <strong>Board :</strong>
                        <?php
                        echo $row['Prev_School_Board'];
                        ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-3 ">
                        <strong>Class</strong>
                        <?php echo $prevClass; ?>
                    </div>
                </div>
            </div>
            <div class="item-title aj-item-title f-aj-item-title">
                <h3 class="mb-4">Communication Address</h3>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-4 mb-2">
                    <strong>Communication Address :</strong>
                    <?php echo $row['Comm_Address'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 mb-2">
                    <strong>City/ District</strong>
                    <?php echo $row['Comm_Add_City_Dist'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 mb-2">
                    <strong>Pincode</strong>
                    <?php echo $row['Comm_Add_Pincode'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 mb-2">
                    <strong>State</strong>
                    <?php echo $row['Comm_Add_State'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 mb-2">
                    <strong>Contact No.</strong>
                    <?php echo implode(" ", str_split($row['Comm_Add_ContactNo'], 5)) ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 ">
                    <strong>Country</strong>
                    <?php echo $row['Comm_Add_Country'] ?>
                </div>
            </div>

            <div class="item-title aj-item-title f-aj-item-title">
                <h3 class="mb-4">Residential Address</h3>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-4 aj-mb-2">
                    <strong>Residential Address</strong>
                    <?php echo $row['Resid_Address'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 aj-mb-2">
                    <strong> City/ District :</strong>
                    <?php echo $row['Resid_Add_City_Dist'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 aj-mb-2">
                    <strong>Pincode </strong>
                    <?php echo $row['Resid_Add_Pincode'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 aj-mb-2">
                    <strong>State </strong>
                    <?php echo $row['Resid_Add_State'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 aj-mb-2">
                    <strong>Contact No.</strong>
                    <?php echo $row['Resid_Add_ContactNo'] ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 ">
                    <strong>Country</strong>
                    <?php echo $row['Resid_Add_Country'] ?>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-12 item-title aj-item-title f-aj-item-title" style="background-color: orange;">
                <h3 class="mb-4 p-2 mt-2">Parent Details</h3>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 ">
                <h3>Father's Details</h3>
                <div class="row">
                    <div class="col-lg-9 col-md-9 row">
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Father's Name (As Per Birth Certificate) </strong>
                            <?php echo $row['Father_Name'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Qualification</strong>
                            <?php echo $row['Father_Qualification']; ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Occupation</strong>
                            <?php echo $row['Father_Occupation']; ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Designation</strong>
                            <?php echo $row['Father_Designation'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Org Name</strong>
                            <?php echo $row['Father_Org_Name'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Org Address</strong>
                            <?php echo $row['Father_Org_Add'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>City</strong>
                            <?php echo $row['Father_City'] ?>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-6 aj-mb-2">
                            <strong>State</strong>
                            <?php echo $row['Father_State'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Country</strong>
                            <?php echo $row['Father_Country'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Pincode</strong>
                            <?php echo $row['Father_Pincode'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Email</strong>
                            <?php echo $row['Father_Email'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Contact No.</strong>
                            <?php echo $row['Father_Contact_No'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Annual Income</strong>
                            <?php echo $row['Father_Annual_Income'] ?>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6 aj-mb-2">
                            <strong>Adhaar Card No.</strong>
                            <?php echo $row['Father_Aadhar_Card'] ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3"><img src="./app_images/<?php echo $row['Father_Image']; ?>" style="width: 75%; height:75%;"></div>
                </div>
            </div>
            <div class="m-section-n">
                <h3>Mother's Details</h3>
                <div class="row">
                    <div class="col-lg-9 col-md-9 row">
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong> Mother's Name (As Per Birth Certificate)</strong>
                            <?php echo $row['Mother_Name'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Qualification</strong>
                            <?php echo $row['Mother_Qualification'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Occupation</strong>
                            <?php echo $row['Mother_Occupation'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Designation</strong>
                            <?php echo $row['Mother_Designation'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Org Name</strong>
                            <?php echo $row['Mother_Org_Name'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>State</strong>
                            <?php echo $row['Mother_State'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong> Country </strong>
                            <?php echo $row['Mother_Country'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Pincode</strong>
                            <?php echo $row['Mother_Pincode'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Email</strong>
                            <?php echo $row['Mother_Email'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Contact No.</strong>
                            <?php echo $row['Mother_Contact_No'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Annual Income</strong>
                            <?php echo $row['Mother_Annual_Income'] ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-6 aj-mb-2">
                            <strong>Adhaar Card No.</strong>
                            <?php echo $row['Mother_Aadhar_Card'] ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3"><img src="./app_images/<?php echo $row['Mother_Image']; ?> " style="width: 75%; height:75%;"></div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 item-title aj-item-title f-aj-item-title" style="background-color: orange;">
                <h3 class="mb-4 p-2">SMS Communication</h3>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-6 aj-mb-2">
                    <strong>SMS Contact No.</strong>
                    <?php echo $row['SMS_Contact_No'] ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-6 aj-mb-2">
                    <strong>Whatsapp Contact No.</strong>
                    <?php echo $row['Whatsapp_Contact_No'] ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-6 ">
                    <strong>E-Mail Address</strong>
                    <?php echo $row['Email_Id'] ?>
                </div>
            </div>
            <?php require_once './includes/scripts.php'; ?>
            <script type="text/javascript">
                $('.sibling-bs').change('.sibling-bs', function() {
                    var a = $('input[name="sibling"]:checked').val();
                    var id = $(this).attr('id')
                    if (a == 'on') {
                        $('.active-div-a').slideToggle('slow');

                    } else {

                    }
                })
                $('.gaurdian-bs').change('.gaurdian-bs', function() {
                    var a = $('input[name="gaurdian"]:checked').val();
                    var id = $(this).attr('id')
                    if (a == 'on') {
                        $('.active-div-aa').slideToggle('slow');

                    } else {

                    }
                })
                $(document).ready(function() {
                    $("#studentAge").focusin(function() {
                        var dob = $('#studentDOB').val();
                        $("#studentAge").val(moment().diff(moment(dob, 'DD-MM-YYYY'), 'years'));
                    });
                });
            </script>
            <?php require_once './includes/closebody.php'; ?>