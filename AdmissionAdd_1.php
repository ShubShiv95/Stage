<?php

/******** crud operations for Admissions  ********/
session_start();
include 'dbobj.php';
include 'security.php';
include 'errorLog.php';
require_once 'sequenceGenerator.php';
if (isset($_POST['newStudentEntry'])) {
  if (empty($_POST['newStudentEntry'])) {
    //starts here
    $lid = $_SESSION["LOGINID"];
    $schoolId = $_SESSION["SCHOOLID"];
    $session = $_SESSION["SESSION"];
    $studentFirstName = mysqli_real_escape_string($dbhandle, $_POST["studentFirstName"]);
    $studentMiddleName = mysqli_real_escape_string($dbhandle, $_POST["studentMiddleName"]);
    $studentLastName = mysqli_real_escape_string($dbhandle, $_POST["studentLastName"]);
    $studclassToApplyComb = $_POST["studclassToApply"];
    $studclassToApplyArr = explode("|",$studclassToApplyComb);
    $studclassToApply = $studclassToApplyArr[0];
    $studentGender = mysqli_real_escape_string($dbhandle, $_POST["studentGender"]);
    $studentDOB = mysqli_real_escape_string($dbhandle, $_POST["studentDOB"]);
    $studentAge = mysqli_real_escape_string($dbhandle, $_POST["studentAge"]);
    $studentSocialCat = mysqli_real_escape_string($dbhandle, $_POST["studentSocialCat"]);
    $studDiscCat = mysqli_real_escape_string($dbhandle, $_POST["studDiscCat"]);
    $studLocality = mysqli_real_escape_string($dbhandle, $_POST["studLocality"]);
    $studAcademicSession = mysqli_real_escape_string($dbhandle, $_POST["studAcademicSession"]);
    $studMotherTongue = mysqli_real_escape_string($dbhandle, $_POST["studMotherTongue"]);
    $studReligion = mysqli_real_escape_string($dbhandle, $_POST["studReligion"]);
    $studNationality = mysqli_real_escape_string($dbhandle, $_POST["studNationality"]);
    $studBloodGroup = mysqli_real_escape_string($dbhandle, $_POST["studBloodGroup"]);
    $studAdharCardNo = mysqli_real_escape_string($dbhandle, $_POST["studAdharCardNo"]);
    $studentPhoto = $_FILES["studentPhoto"]["name"];
    $studPrevSchoolName = mysqli_real_escape_string($dbhandle, $_POST["studPrevSchoolName"]);
    $studMOI = mysqli_real_escape_string($dbhandle, $_POST["studMOI"]);
    $studBoard = mysqli_real_escape_string($dbhandle, $_POST["studBoard"]);
    $studClass = mysqli_real_escape_string($dbhandle, $_POST["studClass"]);
    $commAddress = mysqli_real_escape_string($dbhandle, $_POST["commAddress"]);
    $commState = mysqli_real_escape_string($dbhandle, $_POST["commState"]);
    $commCityDist = mysqli_real_escape_string($dbhandle, $_POST["commCityDist"]);
    $commPinCode = mysqli_real_escape_string($dbhandle, $_POST["commPinCode"]);
    $commContactNo = mysqli_real_escape_string($dbhandle, $_POST["commContactNo"]);
    $commCountry = mysqli_real_escape_string($dbhandle, $_POST["commCountry"]);
    $raAddress = mysqli_real_escape_string($dbhandle, $_POST["raAddress"]);
    $raCityDist = mysqli_real_escape_string($dbhandle, $_POST["raCityDist"]);
    $raPinCode = mysqli_real_escape_string($dbhandle, $_POST["raPinCode"]);
    $raState = mysqli_real_escape_string($dbhandle, $_POST["raState"]);
    $raContactNo = mysqli_real_escape_string($dbhandle, $_POST["raContactNo"]);
    $raCountry = mysqli_real_escape_string($dbhandle, $_POST["raCountry"]);
    $sibling1StudId = mysqli_real_escape_string($dbhandle, $_POST["sibling1StudId"]);
    $sibling2StudId = mysqli_real_escape_string($dbhandle, $_POST["sibling2StudId"]);
    $sibling1Class = mysqli_real_escape_string($dbhandle, $_POST["sibling1Class"]);
    $sibling1Section = mysqli_real_escape_string($dbhandle, $_POST["sibling1Section"]);
    $sibling1RollNo = mysqli_real_escape_string($dbhandle, $_POST["sibling1RollNo"]);
    $sibling2Class = mysqli_real_escape_string($dbhandle, $_POST["sibling2Class"]);
    $sibling2Section = mysqli_real_escape_string($dbhandle, $_POST["sibling2Section"]);
    $sibling2RollNo = mysqli_real_escape_string($dbhandle, $_POST["sibling2RollNo"]);
    $fatherName = mysqli_real_escape_string($dbhandle, $_POST["fatherName"]);
    $fatherQual = mysqli_real_escape_string($dbhandle, $_POST["fatherQualification"]);
    $fatherOccupation = mysqli_real_escape_string($dbhandle, $_POST["fatherOccupation"]);
    $fatherDesig = mysqli_real_escape_string($dbhandle, $_POST["fatherDesig"]);
    $fatherOrgName = mysqli_real_escape_string($dbhandle, $_POST["fatherOrgName"]);
    $fatherOrgAdd = mysqli_real_escape_string($dbhandle, $_POST["fatherOrgAdd"]);
    $fatherCity = mysqli_real_escape_string($dbhandle, $_POST["fatherCity"]);
    $fatherState = mysqli_real_escape_string($dbhandle, $_POST["fatherState"]);
    $fatherCountry = mysqli_real_escape_string($dbhandle, $_POST["fatherCountry"]);
    $fatherPinCode = mysqli_real_escape_string($dbhandle, $_POST["fatherPinCode"]);
    $fatherEmail = mysqli_real_escape_string($dbhandle, $_POST["fatherEmail"]);
    $fatherContactNo = mysqli_real_escape_string($dbhandle, $_POST["fatherContactNo"]);
    $fatherAnnualIncome = mysqli_real_escape_string($dbhandle, $_POST["fatherAnnualIncome"]);
    $fatherAdharCardNo = mysqli_real_escape_string($dbhandle, $_POST["fatherAdharCardNo"]);
    $fatherAlumni = mysqli_real_escape_string($dbhandle, $_POST["fatherAlumni"]);
    $fatherPhoto = $_FILES["fatherPhoto"]["name"];
    $motherName = mysqli_real_escape_string($dbhandle, $_POST["motherName"]);
    $motherQual = mysqli_real_escape_string($dbhandle, $_POST["motherQualification"]);
    $motherOccupation = mysqli_real_escape_string($dbhandle, $_POST["motherOccupation"]);
    $motherDesig = mysqli_real_escape_string($dbhandle, $_POST["motherDesig"]);
    $motherOrgName = mysqli_real_escape_string($dbhandle, $_POST["motherOrgName"]);
    $motherOrgAdd = mysqli_real_escape_string($dbhandle, $_POST["motherOrgAdd"]);
    $motherCity = mysqli_real_escape_string($dbhandle, $_POST["motherCity"]);
    $motherState = mysqli_real_escape_string($dbhandle, $_POST["motherState"]);
    $motherCountry = mysqli_real_escape_string($dbhandle, $_POST["motherCountry"]);
    $motherPinCode = mysqli_real_escape_string($dbhandle, $_POST["motherPinCode"]);
    $motherEmail = mysqli_real_escape_string($dbhandle, $_POST["motherEmail"]);
    $motherContactNo = mysqli_real_escape_string($dbhandle, $_POST["motherContactNo"]);
    $motherAnnualIncome = mysqli_real_escape_string($dbhandle, $_POST["motherAnnualIncome"]);
    $motherAdharCardNo = mysqli_real_escape_string($dbhandle, $_POST["motherAdharCardNo"]);
    $motherAlumni = mysqli_real_escape_string($dbhandle, $_POST["motherAlumni"]);
    $motherPhoto = $_FILES["motherPhoto"]["name"];
    $guardianPhoto = $_FILES["othersPhoto"]["name"];
    $otherType = "Other";
    $othersAddress = mysqli_real_escape_string($dbhandle, $_POST["othersAddress"]);
    $othersName = mysqli_real_escape_string($dbhandle, $_POST["othersName"]);
    $othersRelation = mysqli_real_escape_string($dbhandle, $_POST["othersRelation"]);
    $othersMobileNo = mysqli_real_escape_string($dbhandle, $_POST["othersMobileNo"]);
    $studSMSContactNo = mysqli_real_escape_string($dbhandle, $_POST["studSMSContactNo"]);
    $studWhatsAppContactNo = mysqli_real_escape_string($dbhandle, $_POST["studWhatsAppContactNo"]);
    $studEmailAddress = mysqli_real_escape_string($dbhandle, $_POST["studEmailAddress"]);
    $stream = $_REQUEST['stud_stream'];
    // $docUpload_1 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_1"]);
    // $docUpload_2 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_2"]);
    // $docUpload_3 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_3"]);
    // $docUpload_4 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_4"]);
    // $docUpload_5 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_5"]);
    // $docUpload_6 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_6"]);
    // $docUpload_7 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_7"]);
    // $docUpload_8 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_8"]);

    //School Configured Code, this will be dynamic
    $schoolCode = "DPS";
    $schoolAdmissionId;
    // generate 10 digit student id
    $student_id_gen = generate_student_id('admission_master_table', $dbhandle);
    $formErrors = array();
    /******* data validation starts *******/
    if (empty($studentFirstName)) {
      $formErrors[] = 'Please Fill First Name';
    }
    if (empty($studentLastName)) {
      $formErrors[] = 'Please Fill Last Name';
    }
    if (empty($studclassToApply)) {
      $formErrors[] = 'Please Choose Class to Apply';
    }
    if (empty($studentGender)) {
      $formErrors[] = 'Please Choose Student Gender';
    }
    if (empty($studentDOB)) {
      $formErrors[] = 'Please Choose Date of Birth';
    }
    if (empty($studentAge)) {
       $formErrors[] = 'Student Age Cannot Be Empty';
    }
    if (empty($studentSocialCat)) {
       $formErrors[] = 'Please Select Social Category';
    }
    if (($studclassToApplyArr[1]<=10) && ($stream !='General')) {
      $formErrors[] = 'Stream Should Be General If Class is Less Than 10';
    }
    /*if (empty($studLocality)) {
        $formErrors[] = 'Please Select Locality';
      }     */
    /*if (empty($studLocality)) {
        $formErrors[] = 'Please Select Locality';
      } 
      if (empty($studAcademicSession)) {
        $formErrors[] = 'Please Select Academic Session';
      } 
      if (empty($studMotherTongue)) {
        $formErrors[] = 'Please Select Mother Tongue';
      } 
      if (empty($studReligion)) {
        $formErrors[] = 'Please Select Religion';
      } 
      if (empty($studNationality)) {
        $formErrors[] = 'Please Select Nationality';
      } 
      if (empty($studBloodGroup)) {
        $formErrors[] = 'Please Select Blood Group';
      } 
      if (empty($studAdharCardNo)) {
        $formErrors[] = 'Please Fill Aadhar Number';
      } 
      if (empty($studPrevSchoolName) || empty($studMOI)|| empty($studBoard)|| empty($studClass)) {
        $formErrors[] = 'Please Fill All Fields of Previous Schooling';
      } 
      if (empty($studPrevSchoolName) || empty($studMOI)|| empty($studBoard)|| empty($studClass)) {
        $formErrors[] = 'Please Fill All Fields of Previous Schooling';
      }
      if (empty($commAddress) || empty($commCityDist)|| empty($commState)|| empty($commCountry)|| empty($commPinCode)|| empty($commContactNo)) {
        $formErrors[] = 'Please Fill All Fields of Communication Address';
      }
      if (empty($raAddress) || empty($raCityDist)|| empty($raState)|| empty($raCountry)|| empty($raPinCode)|| empty($raContactNo)) {
        $formErrors[] = 'Please Fill All Fields of Residential Address';
      }
      if (empty($fatherName) || empty($fatherQual)|| empty($fatherOccupation)) {
        $formErrors[] = 'Please Fill Father Details Carefully';
      } 
      if (empty($motherName) || empty($motherQual)|| empty($motherOccupation)) {
        $formErrors[] = 'Please Fill Mother Details Carefully';
      }
      */

    /* display errors */
    if ($formErrors > 0) {
      echo '<ul class="bg-danger list-group">';
      foreach ($formErrors as $error) {
        echo '<li class="text-danger list-group-item">' . $error . '</li>';
      }
      echo '</ul>';
    }

    if (empty($formErrors)) {
      /* file handling and saving to database  */

      // data saving to database

      $insertAdmissionTableSql = "insert into admission_master_table
        (Admission_Id, School_Admission_Id,	Is_Admited, School_Id, Session, First_Name, Middle_Name, Last_Name, Class_Id, Gender , DOB, Age, Social_Category, Discount_Category, Locality,
        Academic_Session, Mother_Tongue, Religion, Nationality, Blood_Group, Aadhar_No,  Prev_School_Name, Prev_School_Medium, Prev_School_Board, 
        Prev_School_Class, Comm_Address, Comm_Add_Country, Comm_Add_State, Comm_Add_City_Dist, Comm_Add_Pincode, Comm_Add_ContactNo, Resid_Address, Resid_Add_Country,
        Resid_Add_State, Resid_Add_City_Dist, Resid_Add_Pincode, Resid_Add_ContactNo, Sibling_1_Student_Id, Sibling_1_Class, Sibling_1_Section, Sibling_1_RollNo, 
        Sibling_2_Student_Id, Sibling_2_Class, Sibling_2_Section, Sibling_2_RollNo, Father_Name, Father_Qualification, Father_Occupation, Father_Designation,
        Father_Org_Name, Father_Org_Add, Father_City, Father_State, Father_Country, Father_Pincode, Father_Email, Father_Contact_No, Father_Annual_Income, Father_Aadhar_Card, Father_Alumni, 
        Mother_Name, Mother_Qualification, Mother_Occupation, Mother_Designation, Mother_Org_Name, Mother_Org_Add, Mother_City, Mother_State, Mother_Country, Mother_Pincode, Mother_Email,
        Mother_Contact_No, Mother_Annual_Income, Mother_Aadhar_Card, Mother_Alumni,
        Gurdian_Type, Guardian_Address, Guardian_Name, Guardian_Relation, Guardian_Contact_No, 
        SMS_Contact_No, Whatsapp_Contact_No, Email_Id,Stream,Updated_By) 
        values(?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $stmt = $dbhandle->prepare($insertAdmissionTableSql);

      echo $dbhandle->error;
      $isAdmitted = "No";

      $stmt->bind_param(
        "ississssississssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssissssssssss",
        $student_id_gen,
        $student_id_gen,
        $isAdmitted,
        $schoolId,
        $session,
        $studentFirstName,
        $studentMiddleName,
        $studentLastName,
        $studclassToApply,
        $studentGender,
        $studentDOB,
        $studentAge,
        $studentSocialCat,
        $studDiscCat,
        $studLocality,
        $studAcademicSession,
        $studMotherTongue,
        $studReligion,
        $studNationality,
        $studBloodGroup,
        $studAdharCardNo,
        $studPrevSchoolName,
        $studMOI,
        $studBoard,
        $studClass,
        $commAddress,
        $commCountry,
        $commState,
        $commCityDist,
        $commPinCode,
        $commContactNo,
        $raAddress,
        $raCountry,
        $raState,
        $raCityDist,
        $raPinCode,
        $raContactNo,
        $sibling1StudId,
        $sibling1Class,
        $sibling1Section,
        $sibling1RollNo,
        $sibling2StudId,
        $sibling2Class,
        $sibling2Section,
        $sibling2RollNo,
        $fatherName,
        $fatherQual,
        $fatherOccupation,
        $fatherDesig,
        $fatherOrgName,
        $fatherOrgAdd,
        $fatherCity,
        $fatherState,
        $fatherCountry,
        $fatherPinCode,
        $fatherEmail,
        $fatherContactNo,
        $fatherAnnualIncome,
        $fatherAdharCardNo,
        $fatherAlumni,
        $motherName,
        $motherQual,
        $motherOccupation,
        $motherDesig,
        $motherOrgName,
        $motherOrgAdd,
        $motherCity,
        $motherState,
        $motherCountry,
        $motherPinCode,
        $motherEmail,
        $motherContactNo,
        $motherAnnualIncome,
        $motherAdharCardNo,
        $motherAlumni,
        $otherType,
        $othersAddress,
        $othersName,
        $othersRelation,
        $othersMobileNo,
        $studSMSContactNo,
        $studWhatsAppContactNo,
        $studEmailAddress,
        $stream,
        $_SESSION["LOGINID"]
      );
      $execResult = $stmt->execute();
      //print_r($execResult);
      echo $dbhandle->error;

     $stmt->close();
      if ($execResult == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Success!</strong>Data Saved With Admission Id ' . $student_id_gen . '.
        </div><script>window.setTimeout(function(){window.open("./AdmissionFormPrint.php?admission_id=' . $student_id_gen . '");},3000); </script>';
      } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Warning!</strong> Failed to Save
        </div>';
      }

      /* 
          get user details by its school admission id
        */
      $queryDetails = "SELECT * FROM `admission_master_table` WHERE `School_Admission_Id` = ?";
      $queryPrepare = $dbhandle->prepare($queryDetails);
      $queryPrepare->bind_param('s', $student_id_gen);
      $queryExecute = $queryPrepare->execute();
      $queryResult = $queryPrepare->get_result();
      $rowQuery = $queryResult->fetch_assoc();
      // print_r($rowQuery);
      /* 
          check if file exists in form
        */

      // making necessary directories
      if (!empty($studentPhoto) || !empty($fatherPhoto) || !empty($motherPhoto)) {
        $mainDirectory = "./app_images/AdmissionDocuments/";
        if (!file_exists($mainDirectory)) {
          mkdir('./app_images/AdmissionDocuments/', 0777, true);
        }
        $directory = $student_id_gen . "_AdmissionDocs";

        $fillePath = "./app_images/AdmissionDocuments/" . $directory;
        if (!file_exists($fillePath)) {
          mkdir('./app_images/AdmissionDocuments/' . $directory, 0777, true);
        }
      }

      // image processing
      $allowedImageExtension = array("jpg", "jpeg");
      // student pic
      if (empty($studentPhoto)) {
        echo '<div class="alert alert-warning alert-dismissible fade show hide_time" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Alert!</strong> No Student Image Choosed to Save
        </div>';
        $targetPathStudent = 'NULL';
      } else if (!empty($studentPhoto)) {
        $fileExtension = strtolower(pathinfo($studentPhoto, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedImageExtension)) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Only Image(jpg,jpeg) allowed.
              </div>';
        } else {
          $fillePath = "./app_images/AdmissionDocuments/" . $directory;
          $studentImageFileName = md5($_SESSION["LOGINID"] . 'S' . date('YmdHis')) . '.' . $fileExtension;
          $targetPathStudent = $fillePath . '/' . $studentImageFileName;
          $fileSave = move_uploaded_file($_FILES['studentPhoto']['tmp_name'], $targetPathStudent);
          $sDatabaseFileName = 'AdmissionDocuments/' . $directory . '/' . $studentImageFileName;
        }
      }
      // father photo
      if (empty($fatherPhoto)) {
        echo '<div class="alert alert-warning alert-dismissible fade show hide_time" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Alert!</strong> No Father Image Choosed to Save
        </div>';
        $targetPathFather = 'NULL';
      } elseif (!empty($fatherPhoto)) {
        $fileExtension = strtolower(pathinfo($fatherPhoto, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedImageExtension)) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Only Image(jpg,jpeg) allowed For Father Image.
              </div>';
        } else {
          $fillePath = "./app_images/AdmissionDocuments/" . $directory;
          $fatherImageFileName = md5($_SESSION["LOGINID"] . 'F' . date('YmdHis')) . '.' . $fileExtension;
          $targetPathFather = $fillePath . '/' . $fatherImageFileName;
          $fileSave = move_uploaded_file($_FILES['fatherPhoto']['tmp_name'], $targetPathFather);
          $fDatabaseFileName = 'AdmissionDocuments/' . $directory . '/' . $fatherImageFileName;
        }
      }
      // mother photo
      if (empty($motherPhoto)) {
        echo '<div class="alert alert-warning alert-dismissible fade show hide_time" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Alert!</strong> No Mother Image Choosed to Save
        </div>';
        $targetPathMother = 'NULL';
      } elseif (!empty($motherPhoto)) {
        $fileExtension = strtolower(pathinfo($motherPhoto, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedImageExtension)) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Only Image(jpg,jpeg) allowed.
          </div>';
        } else {
          $fillePath = "./app_images/AdmissionDocuments/" . $directory;
          $motherImageFileName = md5($_SESSION["LOGINID"] . 'M' . date('YmdHis')) . '.' . $fileExtension;
          $targetPathMother = $fillePath . '/' . $motherImageFileName;
          $fileSave = move_uploaded_file($_FILES['motherPhoto']['tmp_name'], $targetPathMother);
          $mDatabaseFileName = 'AdmissionDocuments/' . $directory . '/' . $motherImageFileName;
        }
      }

      // guardian image handling
      if (!empty($guardianPhoto)) {
        $fileExtension = strtolower(pathinfo($guardianPhoto, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedImageExtension)) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Only Image(jpg,jpeg) allowed.
          </div>';
        } else {
          $fillePath = "./app_images/AdmissionDocuments/" . $directory;
          $guardianImageFileName = md5($_SESSION["LOGINID"] . 'Grd' . date('YmdHis')) . '.' . $fileExtension;
          $targetPathMother = $fillePath . '/' . $guardianImageFileName;
          $fileSave = move_uploaded_file($_FILES['othersPhoto']['tmp_name'], $targetPathMother);
          $gDatabaseFileName = 'AdmissionDocuments/' . $directory . '/' . $guardianImageFileName;
        }
      }      
      // update admission master
      $updateQuery = "UPDATE admission_master_table SET `Student_Image` =?, `Father_Image`=?, `Mother_Image` =?, `Guardian_Image`=? WHERE `Admission_Id` = ?";
      $updateQueryPrepare = $dbhandle->prepare($updateQuery);
      $updateQueryPrepare->bind_param('sssis', $sDatabaseFileName, $fDatabaseFileName, $mDatabaseFileName, $gDatabaseFileName,$rowQuery['Admission_Id']);
      $updateQueryExecute = $updateQueryPrepare->execute();
      if ($updateQueryExecute == true) {
        echo '<div class="alert alert-primary alert-dismissible fade show hide_time" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Success! </strong> Given Image/Images Saved Successfully!!!.
          </div>';
      }
    }
  }
}




/************** enroll student *************/
if (isset($_REQUEST['admission_confirm'])) {
  if (empty($_REQUEST['admission_confirm'])) {
    mysqli_autocommit($dbhandle, false);

    // searching student by their admission id
    $search_stuednt = "SELECT * FROM `admission_master_table` WHERE `Admission_Id` = ?";
    $search_stuednt_prep = $dbhandle->prepare($search_stuednt);
    $search_stuednt_prep->bind_param("i", $_REQUEST['adminssion_id']);
    $search_stuednt_prep->execute();
    $row_stud = $search_stuednt_prep->get_result();
    $student_details = $row_stud->fetch_assoc();
    if ($student_details['Is_Admited'] == 'Yes') {
      echo '<div class="alert alert-danger" role="alert">
              <strong>Warning </strong> Student Already Enrolled;
          </div>';
    } else {
      // generate 10 digit student id
      $student_id_gen = generate_student_id('student_master_table', $dbhandle);

      // hard coded variables
      $image_folder_id = 'NULL';
      $stud_sec = 'NULL';
      $enabled = 1;
      $Is_Blocked = 0;
      // inserting data into student master table
      $insert_q = "INSERT INTO `student_master_table`(`Student_Id`, `Image_Folder_Id`, `Admission_Id`, `School_Id`, `Session`, `Session_Start_Year`, `Session_End_Year`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Class_Sec_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `LID`, `Parent_LID`, `Enabled`, `Is_Blocked`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`, `Updated_By`,`School_Adm_No`) VALUES (
    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
    ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
    ?,?,?,?)";
      $insert_q_prep = $dbhandle->prepare($insert_q);
      $insert_q_prep->bind_param("isiisiisssiississssssssssssssssssssssssssssiiiiiissssssssssssssssssssssssssssssssissssssssssiissssssssss", $student_id_gen, $student_id_gen, $student_details['Admission_Id'], $student_details['School_Id'], $student_details['Session'], $_SESSION["STARTYEAR"], $_SESSION["ENDYEAR"], $student_details['First_Name'], $student_details['Middle_Name'], $student_details['Last_Name'], $student_details['Class_Id'], $stud_sec, $student_details['Gender'], $student_details['DOB'], $student_details['Age'], $student_details['Social_Category'], $student_details['Discount_Category'], $student_details['Locality'], $student_details['Academic_Session'], $student_details['Mother_Tongue'], $student_details['Religion'], $student_details['Nationality'], $student_details['Blood_Group'], $student_details['Aadhar_No'], $student_details['Student_Image'], $student_details['Prev_School_Name'], $student_details['Prev_School_Medium'], $student_details['Prev_School_Board'], $student_details['Prev_School_Class'], $student_details['Comm_Address'], $student_details['Comm_Add_Country'], $student_details['Comm_Add_State'], $student_details['Comm_Add_City_Dist'], $student_details['Comm_Add_Pincode'], $student_details['Comm_Add_ContactNo'], $student_details['Resid_Address'], $student_details['Resid_Add_Country'], $student_details['Resid_Add_State'], $student_details['Resid_Add_City_Dist'], $student_details['Resid_Add_Pincode'], $student_details['Resid_Add_ContactNo'], $student_details['Sibling_1_Student_Id'], $student_details['Sibling_1_Class'], $student_details['Sibling_1_Section'], $student_details['Sibling_1_RollNo'], $student_details['Sibling_2_Student_Id'], $student_details['Sibling_2_Class'], $student_details['Sibling_2_Section'], $student_details['Sibling_2_RollNo'], $student_details['Father_Name'], $student_details['Father_Qualification'], $student_details['Father_Occupation'], $student_details['Father_Designation'], $student_details['Father_Org_Name'], $student_details['Father_Org_Add'], $student_details['Father_City'], $student_details['Father_State'], $student_details['Father_Country'], $student_details['Father_Pincode'], $student_details['Father_Email'], $student_details['Father_Contact_No'], $student_details['Father_Annual_Income'], $student_details['Father_Aadhar_Card'], $student_details['Father_Alumni'], $student_details['Father_Image'], $student_details['Mother_Name'], $student_details['Mother_Qualification'], $student_details['Mother_Occupation'], $student_details['Mother_Designation'], $student_details['Mother_Org_Name'], $student_details['Mother_Org_Add'], $student_details['Mother_City'], $student_details['Mother_State'], $student_details['Mother_Country'], $student_details['Mother_Pincode'], $student_details['Mother_Email'], $student_details['Mother_Contact_No'], $student_details['Mother_Annual_Income'], $student_details['Mother_Aadhar_Card'], $student_details['Mother_Alumni'], $student_details['Mother_Image'], $student_details['Gurdian_Type'], $student_details['Guardian_Address'], $student_details['Guardian_Name'], $student_details['Guardian_Relation'], $student_details['Guardian_Contact_No'], $student_details['Guardian_Image'], $student_details['SMS_Contact_No'], $student_details['Whatsapp_Contact_No'], $student_details['Email_Id'], $stud_sec, $stud_sec, $enabled, $Is_Blocked, $stud_sec, $stud_sec, $stud_sec, $stud_sec, $stud_sec, $stud_sec, $stud_sec, $stud_sec, $_SESSION["LOGINTYPE"], $_REQUEST['admission_number']);
      if ($insert_q_prep->execute()) {

        // update admission master table
        $is_admitted = 'Yes';
        $update_adm_query = "UPDATE admission_master_table SET Is_Admited = ? WHERE Admission_Id = ?";
        $update_adm_query_prep = $dbhandle->prepare($update_adm_query);
        $update_adm_query_prep->bind_param("si", $is_admitted, $student_details['Admission_Id']);
        $update_adm_query_prep->execute();

        // inserting into student class details
        $student_cl_gen = sequence_number('student_class_details', $dbhandle);
        // class details by class id
        $query_class = "SELECT cmt.Class_No, cst.Class_Sec_Id FROM class_master_table cmt, class_section_table cst WHERE cmt.Class_Id = ? AND cst.Class_Id = cmt.Class_Id";
        $query_class_prep = $dbhandle->prepare($query_class);
        $query_class_prep->bind_param("i", $student_details['Class_Id']);
        $query_class_prep->execute();
        $result_class_name = $query_class_prep->get_result();
        $row_class_name = $result_class_name->fetch_assoc();

        // session start / end year
        $session_year = explode('-', $student_details['Session']);

        $insert_class_tbl = "INSERT INTO `student_class_details`(`Student_Details_Id`, `Student_Id`, `Class_Id`, `Class_No`, `Stream`, `Session`, `Session_Start_Year`, `Session_End_Year`, `Updated_By`,`School_Id`,`Student_Type`,`Concession_Id`,`Class_Sec_Id`) VALUES (?,?,?,?,?,?,?,?,?,?,'New',?,?)";
        $insert_class_tbl_prep = $dbhandle->prepare($insert_class_tbl);
        $insert_class_tbl_prep->bind_param("iiiissiisiii", $student_cl_gen, $student_id_gen, $student_details['Class_Id'], $row_class_name['Class_No'], $student_details['Stream'], $student_details['Session'], $session_year[0], $session_year[1], $_SESSION["LOGINTYPE"], $_SESSION["SCHOOLID"], $student_details['Discount_Category'], $row_class_name['Class_Sec_Id']);
        if (!$insert_class_tbl_prep->execute()) {
          $message = $insert_class_tbl_prep->error;
          $el = new LogMessage();
          $sql = $insert_class_tbl;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Student Class Details ', $message, $sql, __FILE__, $_SESSION['LOGINID']);
          //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
          mysqli_rollback($dbhandle);
          echo $statusMsg = '<p class="text-danger">Error: Enroll Student Details.  Please consult application consultant.</p>';
          die;
        } else {
          mysqli_commit($dbhandle);
          // run fee list creation php page
          /* require_once './RegularFeeCreation.php'; 
        */
          require_once './FeeApplyCurl.php';
          $fee_gen = generate_student_fee_using_curl($student_id_gen, $student_details['Session'], $_SESSION["SCHOOLID"], $_SESSION["LOGINID"]);
          $json_data = json_decode($fee_gen);
          //$json_data= array();
          if ($json_data['status'] == "Success") {
            echo $statusMsg = '<p class="text-success pt-4">Student Enrolled With Student Id <strong>' . $student_id_gen . '</strong> ' . $json_data->message . ' .</p><script>window.setTimeout(function(){window.href="AdmissionFormPrint.php?student_id=' . $student_id_gen . '";},2000);</script>';
          } else {
            echo $statusMsg = '<p class="text-danger pt-4">Student Enrolled With Student Id <strong>' . $student_id_gen . '</strong> Student Fee Didnot Generated. Please Consult Application Support</p>';
          }
        }
      } else {
        $message = $insert_q_prep->error;
        $el = new LogMessage();
        $sql = $insert_q;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Student Enroll ', $message, $sql, __FILE__, $_SESSION['LOGINID']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        echo $statusMsg = '<p  class="text-danger">Error: Enroll Student Class.  Please consult application consultant.</p>';
        die;
      }
      mysqli_commit($dbhandle);
    }
  }
}
