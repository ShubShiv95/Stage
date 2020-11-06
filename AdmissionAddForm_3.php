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
    $schoolId = 200;
    $session = "2020-2021";
    $admissionId = $_REQUEST["admissionId"];
    $studentFirstName = $_REQUEST["studentFirstName"];
    $studentMiddleName = $_REQUEST["studentMiddleName"];
    $studentLastName = $_REQUEST["studentLastName"];
    $studclassToApply = $_REQUEST["studclassToApply"];
    $studentGender = $_REQUEST["studentGender"];
    $studentDOB = "str_to_date('".$_REQUEST["studentDOB"]."','%d/%m/%Y')";
    $studentAge = $_REQUEST["studentAge"];
    $studentSocialCat = $_REQUEST["studentSocialCat"];
    $studDiscCat = $_REQUEST["studDiscCat"];
    if($studDiscCat == "Select Discount"){
        $studDiscCat = 'NULL';
    }
    else{
        $studDiscCat = $studDiscCat;
    }
    $studLocality = $_REQUEST["studLocality"];
    $studAcademicSession = $_REQUEST["studAcademicSession"];
    $studMotherTongue = $_REQUEST["studMotherTongue"];
    $studReligion = $_REQUEST["studReligion"];
    $studNationality = $_REQUEST["studNationality"];
    $studBloodGroup = $_REQUEST["studBloodGroup"];
    $studAdharCardNo = $_REQUEST["studAdharCardNo"];
    $studentPhoto = $_REQUEST["studentPhoto"];
    $studPrevSchoolName = $_REQUEST["studPrevSchoolName"];
    $studMOI = $_REQUEST["studMOI"];
    $studBoard = $_REQUEST["studBoard"];
    $studClass = $_REQUEST["studClass"];
    $commAddress = $_REQUEST["commAddress"];
    $commState = $_REQUEST["commState"];
    $commCityDist = $_REQUEST["commCityDist"];
    $commPinCode = $_REQUEST["commPinCode"];
    $commContactNo = $_REQUEST["commContactNo"];
    $commCountry = $_REQUEST["commCountry"];
    $raAddress = $_REQUEST["raAddress"];
    $raCityDist = $_REQUEST["raCityDist"];
    $raPinCode = $_REQUEST["raPinCode"];
    $raState = $_REQUEST["raState"];
    $raContactNo = $_REQUEST["raContactNo"];
    $raCountry = $_REQUEST["raCountry"];
    $sibling1StudId = $_REQUEST["sibling1StudId"];
    $sibling2StudId = $_REQUEST["sibling2StudId"];
    $sibling1Class = $_REQUEST["sibling1Class"];
    $sibling1Section = $_REQUEST["sibling1Section"];
    $sibling1RollNo = $_REQUEST["sibling1RollNo"];
    $sibling2Class = $_REQUEST["sibling2Class"];
    $sibling2Section = $_REQUEST["sibling2Section"];
    $sibling2RollNo = $_REQUEST["sibling2RollNo"];
    $fatherName = $_REQUEST["fatherName"];
    $fatherQual = $_REQUEST["fatherQual"];
    $fatherOccupation = $_REQUEST["fatherOccupation"];
    $fatherDesig = $_REQUEST["fatherDesig"];
    $fatherOrgName = $_REQUEST["fatherOrgName"];
    $fatherOrgAdd = $_REQUEST["fatherOrgAdd"];
    $fatherCity = $_REQUEST["fatherCity"];
    $fatherState = $_REQUEST["fatherState"];
    $fatherCountry = $_REQUEST["fatherCountry"];
    $fatherPinCode = $_REQUEST["fatherPinCode"];
    $fatherEmail = $_REQUEST["fatherEmail"];
    $fatherContactNo = $_REQUEST["fatherContactNo"];
    $fatherAnnualIncome = $_REQUEST["fatherAnnualIncome"];
    $fatherAdharCardNo = $_REQUEST["fatherAdharCardNo"];
    $fatherAlumni = $_REQUEST["fatherAlumni"];
    $fatherPhoto = $_REQUEST["fatherPhoto"];
    $motherName = $_REQUEST["motherName"];
    $motherQual = $_REQUEST["motherQual"];
    $motherOccupation = $_REQUEST["motherOccupation"];
    $motherDesig = $_REQUEST["motherDesig"];
    $motherOrgName = $_REQUEST["motherOrgName"];
    $motherOrgAdd = $_REQUEST["motherOrgAdd"];
    $motherCity = $_REQUEST["motherCity"];
    $motherState = $_REQUEST["motherState"];
    $motherCountry = $_REQUEST["motherCountry"];
    $motherPinCode = $_REQUEST["motherPinCode"];
    $motherEmail = $_REQUEST["motherEmail"];
    $motherContactNo = $_REQUEST["motherContactNo"];
    $motherAnnualIncome = $_REQUEST["motherAnnualIncome"];
    $motherAdharCardNo = $_REQUEST["motherAdharCardNo"];
    $motherAlumni = $_REQUEST["motherAlumni"];
    $motherPhoto = $_REQUEST["motherPhoto"];
    $otherType = "Other";
    $othersAddress = $_REQUEST["othersAddress"];
    $othersName = $_REQUEST["othersName"];
    $othersRelation = $_REQUEST["othersRelation"];
    $othersMobileNo = $_REQUEST["othersMobileNo"];
    $othersPhoto = $_REQUEST["othersPhoto"];
    $studSMSContactNo = $_REQUEST["studSMSContactNo"];
    $studWhatsAppContactNo = $_REQUEST["studWhatsAppContactNo"];
    $studEmailAddress = $_REQUEST["studEmailAddress"];
    $docUpload_1 = $_REQUEST["docUpload_1"];
    $docUpload_2 = $_REQUEST["docUpload_2"];
    $docUpload_3 = $_REQUEST["docUpload_3"];
    $docUpload_4 = $_REQUEST["docUpload_4"];
    $docUpload_5 = $_REQUEST["docUpload_5"];
    $docUpload_6 = $_REQUEST["docUpload_6"];
    $docUpload_7 = $_REQUEST["docUpload_7"];
    $docUpload_8 = $_REQUEST["docUpload_8"];
    
    //School Configured Code, this will be dynamic

    $schoolCode = "DPS";
    $schoolAdmissionId;  

    /* error in mother tongue data reciving as string and database datatype is smallint */
    $updateAdmissionTableSql = "update admission_master_table set 
    School_Id = $schoolId , 
    Session = '$session', 
    First_Name ='$studentFirstName', 
    Middle_Name = '$studentMiddleName', 
    Last_Name ='$studentLastName', 
    Class_Id =$studClass  ,
    Gender = '$studentGender', 
    DOB = $studentDOB, 
    Age = $studentAge, 
    Social_Category = '$studentSocialCat', 
    Discount_Category = $studDiscCat, 
    Locality = $studLocality,    
    Academic_Session = '$studAcademicSession', 
    Mother_Tongue = '$studMotherTongue', 
    Religion = '$studReligion', 
    Nationality = '$studNationality', 
    Blood_Group = '$studBloodGroup', 
    Aadhar_No = '$studAdharCardNo', 
    Prev_School_Name = '$studPrevSchoolName', 
    Prev_School_Medium = '$studMOI', 
    Prev_School_Board = '$studBoard', 
    Prev_School_Class = $studClass, 
    Comm_Address = '$commAddress', 
    Comm_Add_Country = '$commCountry', 
    Comm_Add_State = '$commState', 
    Comm_Add_City_Dist = '$commCityDist', 
    Comm_Add_Pincode = '$commPinCode' , 
    Comm_Add_ContactNo = '$commContactNo', 
    Resid_Address = '$raAddress', 
    Resid_Add_Country = '$raCountry',
    Resid_Add_State = '$raState', 
    Resid_Add_City_Dist = '$raCityDist', 
    Resid_Add_Pincode = '$raPinCode', 
    Resid_Add_ContactNo = '$raContactNo', 
    Sibling_1_Student_Id = '$sibling1StudId', 
    Sibling_1_Class = $sibling1Class, 
    Sibling_1_Section = '$sibling1Section', 
    Sibling_1_RollNo = $sibling1RollNo , 
    Sibling_2_Student_Id =  '$sibling2StudId', 
    Sibling_2_Class = $sibling2Class, 
    Sibling_2_Section = '$sibling2Section', 
    Sibling_2_RollNo = $sibling2RollNo, 
    Father_Name = '$fatherName', 
    Father_Qualification = '$fatherQual', 
    Father_Occupation = '$fatherOccupation', 
    Father_Designation = '$fatherDesig',
    Father_Org_Name = '$fatherOrgName', 
    Father_Org_Add = '$fatherOrgAdd', 
    Father_City = '$fatherState', 
    Father_Country =  '$fatherCountry', 
    Father_Pincode = '$fatherPinCode', 
    Father_Email = '$fatherEmail' , 
    Father_Contact_No ='$fatherContactNo', 
    Father_Annual_Income = '$fatherAnnualIncome', 
    Father_Aadhar_Card = '$fatherAdharCardNo', 
    Father_Alumni = '$fatherAlumni',
    Mother_Name = '$motherName', 
    Mother_Qualification = '$motherQual' , 
    Mother_Occupation = '$motherOccupation', 
    Mother_Designation = '$motherDesig', 
    Mother_Org_Name = '$motherOrgName', 
    Mother_Org_Add = '$motherOrgAdd', 
    Mother_City = '$motherCity' , 
    Mother_State = '$motherState', 
    Mother_Country = '$motherCountry', 
    Mother_Pincode = '$motherPinCode', 
    Mother_Email = '$motherEmail',
    Mother_Contact_No =  '$motherContactNo' , 
    Mother_Annual_Income = '$motherAnnualIncome', 
    Mother_Aadhar_Card = '$motherAdharCardNo' , 
    Mother_Alumni = '$motherAlumni', 
    Guardian_Address = '$othersAddress', 
    Guardian_Name = '$othersName', 
    Guardian_Relation ='$othersRelation', 
    Guardian_Contact_No ='$othersMobileNo',
    SMS_Contact_No = '$studSMSContactNo', 
    Whatsapp_Contact_No = '$studWhatsAppContactNo', 
    Email_Id = '$studEmailAddress',
        Doc_Upload_1 = '$docUpload_1 ', 
        Doc_Upload_2 ='$docUpload_2', 
        Doc_Upload_3 = '$docUpload_3', 
        Doc_Upload_4 = '$docUpload_4', 
        Doc_Upload_5 = '$docUpload_5', 
        Doc_Upload_6 = '$docUpload_6', 
        Doc_Upload_7 = '$docUpload_7', 
        Doc_Upload_8 = '$docUpload_8'
        where Admission_Id = '$admissionId'" ;     
    //echo $updateAdmissionTableSql;
    $resultupdated = $dbhandle->query($updateAdmissionTableSql);
     
     if($resultupdated != 1){
        $isSuccess = false;
     }
    echo $dbhandle->error;	
echo $updateAdmissionTableSql;
/* what is str start and end. it is showing undefined so i am defining the as Start */
$messsage='Admission Updated.';
$str_start = 'Start';
$str_end = 'End';
//echo $str_start.$messsage.$str_end.'<script>alert("Data Updated Successfully"); window.location.href="AdmissionSearch.php"</script>';


?>
