<?php
  /******** crud operations for Admissions  ********/
  session_start();
  include 'dbobj.php';
  include 'security.php';
  include 'errorLog.php';   
  if(isset($_POST['newStudentEntry'])){
    if (empty($_POST['newStudentEntry'])) {
      //starts here
      $lid=$_SESSION["LOGINID"];
      $schoolId=$_SESSION["SCHOOLID"];
      $schoolId = 200;
      $session = "2020-2021";
      $studentFirstName = mysqli_real_escape_string($dbhandle,$_POST["studentFirstName"]);
      $studentMiddleName = mysqli_real_escape_string($dbhandle,$_POST["studentMiddleName"]);
      $studentLastName = mysqli_real_escape_string($dbhandle,$_POST["studentLastName"]);
      $studclassToApply = mysqli_real_escape_string($dbhandle,$_POST["studclassToApply"]);
      $studentGender = mysqli_real_escape_string($dbhandle,$_POST["studentGender"]);
      $studentDOB = mysqli_real_escape_string($dbhandle,$_POST["studentDOB"]);
      $studentAge = mysqli_real_escape_string($dbhandle,$_POST["studentAge"]);
      $studentSocialCat = mysqli_real_escape_string($dbhandle,$_POST["studentSocialCat"]);
      $studDiscCat = mysqli_real_escape_string($dbhandle,$_POST["studDiscCat"]);
      $studLocality = mysqli_real_escape_string($dbhandle,$_POST["studLocality"]);
      $studAcademicSession = mysqli_real_escape_string($dbhandle,$_POST["studAcademicSession"]);
      $studMotherTongue = mysqli_real_escape_string($dbhandle,$_POST["studMotherTongue"]);
      $studReligion = mysqli_real_escape_string($dbhandle,$_POST["studReligion"]);
      $studNationality = mysqli_real_escape_string($dbhandle,$_POST["studNationality"]);
      $studBloodGroup = mysqli_real_escape_string($dbhandle,$_POST["studBloodGroup"]);
      $studAdharCardNo = mysqli_real_escape_string($dbhandle,$_POST["studAdharCardNo"]);
      $studentPhoto = $_FILES["studentPhoto"]["name"];
      $studPrevSchoolName = mysqli_real_escape_string($dbhandle,$_POST["studPrevSchoolName"]);
      $studMOI = mysqli_real_escape_string($dbhandle,$_POST["studMOI"]);
      $studBoard = mysqli_real_escape_string($dbhandle,$_POST["studBoard"]);
      $studClass = mysqli_real_escape_string($dbhandle,$_POST["studClass"]);
      $commAddress = mysqli_real_escape_string($dbhandle,$_POST["commAddress"]);
      $commState = mysqli_real_escape_string($dbhandle,$_POST["commState"]);
      $commCityDist = mysqli_real_escape_string($dbhandle,$_POST["commCityDist"]);
      $commPinCode = mysqli_real_escape_string($dbhandle,$_POST["commPinCode"]);
      $commContactNo = mysqli_real_escape_string($dbhandle,$_POST["commContactNo"]);
      $commCountry = mysqli_real_escape_string($dbhandle,$_POST["commCountry"]);
      $raAddress = mysqli_real_escape_string($dbhandle,$_POST["raAddress"]);
      $raCityDist = mysqli_real_escape_string($dbhandle,$_POST["raCityDist"]);
      $raPinCode = mysqli_real_escape_string($dbhandle,$_POST["raPinCode"]);
      $raState = mysqli_real_escape_string($dbhandle,$_POST["raState"]);
      $raContactNo = mysqli_real_escape_string($dbhandle,$_POST["raContactNo"]);
      $raCountry = mysqli_real_escape_string($dbhandle,$_POST["raCountry"]);
      $sibling1StudId = mysqli_real_escape_string($dbhandle,$_POST["sibling1StudId"]);
      $sibling2StudId = mysqli_real_escape_string($dbhandle,$_POST["sibling2StudId"]);
      $sibling1Class = mysqli_real_escape_string($dbhandle,$_POST["sibling1Class"]);
      $sibling1Section = mysqli_real_escape_string($dbhandle,$_POST["sibling1Section"]);
      $sibling1RollNo = mysqli_real_escape_string($dbhandle,$_POST["sibling1RollNo"]);
      $sibling2Class = mysqli_real_escape_string($dbhandle,$_POST["sibling2Class"]);
      $sibling2Section = mysqli_real_escape_string($dbhandle,$_POST["sibling2Section"]);
      $sibling2RollNo = mysqli_real_escape_string($dbhandle,$_POST["sibling2RollNo"]);
      $fatherName = mysqli_real_escape_string($dbhandle,$_POST["fatherName"]);
      $fatherQual = mysqli_real_escape_string($dbhandle,$_POST["fatherQualification"]);
      $fatherOccupation = mysqli_real_escape_string($dbhandle,$_POST["fatherOccupation"]);
      $fatherDesig = mysqli_real_escape_string($dbhandle,$_POST["fatherDesig"]);
      $fatherOrgName = mysqli_real_escape_string($dbhandle,$_POST["fatherOrgName"]);
      $fatherOrgAdd = mysqli_real_escape_string($dbhandle,$_POST["fatherOrgAdd"]);
      $fatherCity = mysqli_real_escape_string($dbhandle,$_POST["fatherCity"]);
      $fatherState = mysqli_real_escape_string($dbhandle,$_POST["fatherState"]);
      $fatherCountry = mysqli_real_escape_string($dbhandle,$_POST["fatherCountry"]);
      $fatherPinCode = mysqli_real_escape_string($dbhandle,$_POST["fatherPinCode"]);
      $fatherEmail = mysqli_real_escape_string($dbhandle,$_POST["fatherEmail"]);
      $fatherContactNo = mysqli_real_escape_string($dbhandle,$_POST["fatherContactNo"]);
      $fatherAnnualIncome = mysqli_real_escape_string($dbhandle,$_POST["fatherAnnualIncome"]);
      $fatherAdharCardNo = mysqli_real_escape_string($dbhandle,$_POST["fatherAdharCardNo"]);
      $fatherAlumni = mysqli_real_escape_string($dbhandle,$_POST["fatherAlumni"]);
      $fatherPhoto = $_FILES["fatherPhoto"]["name"];
      $motherName = mysqli_real_escape_string($dbhandle,$_POST["motherName"]);
      $motherQual = mysqli_real_escape_string($dbhandle,$_POST["motherQualification"]);
      $motherOccupation = mysqli_real_escape_string($dbhandle,$_POST["motherOccupation"]);
      $motherDesig = mysqli_real_escape_string($dbhandle,$_POST["motherDesig"]);
      $motherOrgName = mysqli_real_escape_string($dbhandle,$_POST["motherOrgName"]);
      $motherOrgAdd = mysqli_real_escape_string($dbhandle,$_POST["motherOrgAdd"]);
      $motherCity = mysqli_real_escape_string($dbhandle,$_POST["motherCity"]);
      $motherState = mysqli_real_escape_string($dbhandle,$_POST["motherState"]);
      $motherCountry = mysqli_real_escape_string($dbhandle,$_POST["motherCountry"]);
      $motherPinCode = mysqli_real_escape_string($dbhandle,$_POST["motherPinCode"]);
      $motherEmail = mysqli_real_escape_string($dbhandle,$_POST["motherEmail"]);
      $motherContactNo = mysqli_real_escape_string($dbhandle,$_POST["motherContactNo"]);
      $motherAnnualIncome = mysqli_real_escape_string($dbhandle,$_POST["motherAnnualIncome"]);
      $motherAdharCardNo = mysqli_real_escape_string($dbhandle,$_POST["motherAdharCardNo"]);
      $motherAlumni = mysqli_real_escape_string($dbhandle,$_POST["motherAlumni"]);
      $motherPhoto = $_FILES["motherPhoto"]["name"];
      $otherType = "Other";
      $othersAddress = mysqli_real_escape_string($dbhandle,$_POST["othersAddress"]);
      $othersName = mysqli_real_escape_string($dbhandle,$_POST["othersName"]);
      $othersRelation = mysqli_real_escape_string($dbhandle,$_POST["othersRelation"]);
      $othersMobileNo = mysqli_real_escape_string($dbhandle,$_POST["othersMobileNo"]);
      $othersPhoto = $_FILES["othersPhoto"]["name"];
      $studSMSContactNo = mysqli_real_escape_string($dbhandle,$_POST["studSMSContactNo"]);
      $studWhatsAppContactNo = mysqli_real_escape_string($dbhandle,$_POST["studWhatsAppContactNo"]);
      $studEmailAddress = mysqli_real_escape_string($dbhandle,$_POST["studEmailAddress"]);
      $docUpload_1 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_1"]);
      $docUpload_2 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_2"]);
      $docUpload_3 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_3"]);
      $docUpload_4 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_4"]);
      $docUpload_5 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_5"]);
      $docUpload_6 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_6"]);
      $docUpload_7 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_7"]);
      $docUpload_8 = mysqli_real_escape_string($dbhandle,$_POST["docUpload_8"]);

      //School Configured Code, this will be dynamic
      $schoolCode = "DPS";
      $schoolAdmissionId;
      $admissionCountSql = "Select count(Admission_Id) as admno from admission_master_table where school_id=" . $schoolId. ' and Session=' . "'" . $session . "'";
      $admissionCountResult = $dbhandle->query($admissionCountSql);

      $temp[] = $admissionCountResult;

      if($admissionCountResult)
      {
        $getAdmissionCountRow = $admissionCountResult -> fetch_assoc();
        $admId = ($getAdmissionCountRow["admno"] + 1);
        $schoolAdmissionId = $schoolCode . date("Y") .  $admId;
      } 

     $formErrors = array();
      /******* data validation starts *******/
      if(empty($studentFirstName)){
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
      /*if (empty($studLocality)) {
        $formErrors[] = 'Please Select Locality';
      }     */ 
      if (empty($studLocality)) {
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

      /* display errors */
      if($formErrors>0){
        echo '<ul class="bg-danger list-group">';
        foreach ($formErrors as $error) 
        {
          echo '<li class="text-danger list-group-item">'.$error.'</li>';
        }
        echo '</ul>';     
      }

      if(empty($formErrors))
      {
        /* file handling and saving to database  */

        // data saving to database
        
        $insertAdmissionTableSql = "insert into admission_master_table
        (Admission_Id, School_Admission_Id, School_Id, Session, First_Name, Middle_Name, Last_Name, Class_Id, Gender , DOB, Age, Social_Category, Discount_Category, Locality,
        Academic_Session, Mother_Tongue, Religion, Nationality, Blood_Group, Aadhar_No,  Prev_School_Name, Prev_School_Medium, Prev_School_Board, 
        Prev_School_Class, Comm_Address, Comm_Add_Country, Comm_Add_State, Comm_Add_City_Dist, Comm_Add_Pincode, Comm_Add_ContactNo, Resid_Address, Resid_Add_Country,
        Resid_Add_State, Resid_Add_City_Dist, Resid_Add_Pincode, Resid_Add_ContactNo, Sibling_1_Student_Id, Sibling_1_Class, Sibling_1_Section, Sibling_1_RollNo, 
        Sibling_2_Student_Id, Sibling_2_Class, Sibling_2_Section, Sibling_2_RollNo, Father_Name, Father_Qualification, Father_Occupation, Father_Designation,
        Father_Org_Name, Father_Org_Add, Father_City, Father_State, Father_Country, Father_Pincode, Father_Email, Father_Contact_No, Father_Annual_Income, Father_Aadhar_Card, Father_Alumni, 
        Mother_Name, Mother_Qualification, Mother_Occupation, Mother_Designation, Mother_Org_Name, Mother_Org_Add, Mother_City, Mother_State, Mother_Country, Mother_Pincode, Mother_Email,
        Mother_Contact_No, Mother_Annual_Income, Mother_Aadhar_Card, Mother_Alumni,
        Gurdian_Type, Guardian_Address, Guardian_Name, Guardian_Relation, Guardian_Contact_No, 
        SMS_Contact_No, Whatsapp_Contact_No, Email_Id) 
        values(?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt=$dbhandle->prepare($insertAdmissionTableSql);

        echo $dbhandle->error;	
      
        $stmt->bind_param("isissssississssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssissssssss",   
        $admId,$schoolAdmissionId,$schoolId,$session,$studentFirstName,$studentMiddleName,$studentLastName,$studclassToApply,$studentGender,$studentDOB,$studentAge,$studentSocialCat,$studDiscCat,$studLocality,$studAcademicSession,$studMotherTongue,$studReligion,$studNationality,$studBloodGroup,$studAdharCardNo,$studPrevSchoolName,$studMOI,$studBoard,$studClass,$commAddress,$commCountry,$commState,$commCityDist,$commPinCode,$commContactNo,$raAddress,$raCountry,$raState,$raCityDist,$raPinCode,$raContactNo,$sibling1StudId,$sibling1Class,$sibling1Section,$sibling1RollNo,$sibling2StudId,$sibling2Class,$sibling2Section,$sibling2RollNo,$fatherName,$fatherQual,$fatherOccupation,$fatherDesig,$fatherOrgName,$fatherOrgAdd,$fatherCity,$fatherState,
        $fatherCountry,$fatherPinCode,$fatherEmail,$fatherContactNo,$fatherAnnualIncome,$fatherAdharCardNo,$fatherAlumni,$motherName,$motherQual,$motherOccupation,$motherDesig,$motherOrgName,
        $motherOrgAdd,$motherCity,$motherState,$motherCountry,$motherPinCode,$motherEmail,$motherContactNo,
        $motherAnnualIncome,$motherAdharCardNo,$motherAlumni,$otherType,$othersAddress,$othersName,$othersRelation,$othersMobileNo,$studSMSContactNo,$studWhatsAppContactNo,$studEmailAddress
        );

        $execResult=$stmt->execute();
        //print_r($execResult);
        echo $dbhandle->error;
        
        $stmt->close();
        if ($execResult == true) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Success!</strong>Data Saved With Admission Id '.$schoolAdmissionId.'.
        </div>';
        }
        else{
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
        $queryPrepare->bind_param('s',$schoolAdmissionId);
        $queryExecute = $queryPrepare->execute();
        $queryResult = $queryPrepare->get_result();
        $rowQuery = $queryResult->fetch_assoc();
       // print_r($rowQuery);
        /* 
          check if file exists in form
        */    

        // making necessary directories
        if (!empty($studentPhoto) || !empty($fatherPhoto)||!empty($motherPhoto)) {
          $mainDirectory = "./app_images/AdmissionDocuments/";
          if (!file_exists($mainDirectory)) {
            mkdir('./app_images/AdmissionDocuments/', 0777, true);
          }
          $directory = $rowQuery['Admission_Id']."_AdmissionDocs";
          
          $fillePath = "./app_images/AdmissionDocuments/".$directory;
          if (!file_exists($fillePath)) {
            mkdir('./app_images/AdmissionDocuments/'.$directory, 0777, true);
          } 
        }

        // image processing
        $allowedImageExtension = array("jpg","jpeg");
        // student pic
        if (empty($studentPhoto)) {
          echo '<div class="alert alert-warning alert-dismissible fade show hide_time" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Alert!</strong> No Student Image Choosed to Save
        </div>'; $targetPathStudent = 'NULL';
        }
        else if(!empty($studentPhoto)){
          $fileExtension = strtolower(pathinfo($studentPhoto,PATHINFO_EXTENSION));
          if (!in_array($fileExtension, $allowedImageExtension)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Only Image(jpg,jpeg) allowed.
              </div>';
          }else{
            $fillePath = "./app_images/AdmissionDocuments/".$directory;
            $studentImageFileName = md5($_SESSION["EMPLOYEEID"].'S'.date('YmdHis')).'.'.$fileExtension;
            $targetPathStudent = $fillePath.'/'.$studentImageFileName; 
            $fileSave = move_uploaded_file($_FILES['studentPhoto']['tmp_name'],$targetPathStudent);
            $sDatabaseFileName = 'AdmissionDocuments/'.$directory.'/'.$studentImageFileName;
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
        </div>';$targetPathFather = 'NULL';
        }
        elseif (!empty($fatherPhoto)) {
          $fileExtension = strtolower(pathinfo($fatherPhoto,PATHINFO_EXTENSION));
          if (!in_array($fileExtension, $allowedImageExtension)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Only Image(jpg,jpeg) allowed For Father Image.
              </div>';
          }else{
            $fillePath = "./app_images/AdmissionDocuments/".$directory;
            $fatherImageFileName = md5($_SESSION["EMPLOYEEID"].'F'.date('YmdHis')).'.'.$fileExtension;
            $targetPathFather = $fillePath.'/'.$fatherImageFileName; 
            $fileSave = move_uploaded_file($_FILES['fatherPhoto']['tmp_name'],$targetPathFather);
            $fDatabaseFileName = 'AdmissionDocuments/'.$directory.'/'.$fatherImageFileName;
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
        </div>';$targetPathMother = 'NULL';
        }
        elseif (!empty($motherPhoto)) {
          $fileExtension = strtolower(pathinfo($motherPhoto,PATHINFO_EXTENSION));
          if (!in_array($fileExtension, $allowedImageExtension)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> Only Image(jpg,jpeg) allowed.
          </div>';
      }else{
        $fillePath = "./app_images/AdmissionDocuments/".$directory;
        $motherImageFileName = md5($_SESSION["EMPLOYEEID"].'M'.date('YmdHis')).'.'.$fileExtension;
        $targetPathMother = $fillePath.'/'.$motherImageFileName;  
        $fileSave = move_uploaded_file($_FILES['motherPhoto']['tmp_name'],$targetPathMother);
        $mDatabaseFileName = 'AdmissionDocuments/'.$directory.'/'.$motherImageFileName;
      }            
        }

        // update admin master
        $updateQuery = "UPDATE admission_master_table SET `Student_Image` =?, `Father_Image`=?, `Mother_Image` =? WHERE `Admission_Id` = ?";
        $updateQueryPrepare = $dbhandle->prepare($updateQuery);
        $updateQueryPrepare->bind_param('sssi',$sDatabaseFileName,$fDatabaseFileName,$mDatabaseFileName,$rowQuery['Admission_Id']);
        $updateQueryExecute = $updateQueryPrepare->execute();
        if ($updateQueryExecute ==true) {
          echo '<div class="alert alert-primary alert-dismissible fade show hide_time" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>Success!</strong> Given Image/Images Saved Successfully!!!.
          </div>';
        }
      }
    }
  }

?>
