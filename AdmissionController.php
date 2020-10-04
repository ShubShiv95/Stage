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
    $studentFirstName = $_REQUEST["studentFirstName"];
    $studentMiddleName = $_REQUEST["studentMiddleName"];
    $studentLastName = $_REQUEST["studentLastName"];
    $studclassToApply = $_REQUEST["studclassToApply"];
    $studentGender = $_REQUEST["studentGender"];
    $studentDOB = $_REQUEST["studentDOB"];
    $studentAge = $_REQUEST["studentAge"];
    $studentSocialCat = $_REQUEST["studentSocialCat"];
    $studDiscCat = $_REQUEST["studDiscCat"];
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
    /*$sibling1Class = $_REQUEST["sibling1Class"];
    $sibling1Section = $_REQUEST["sibling1Section"];
    $sibling1RollNo = $_REQUEST["sibling1RollNo"];
    $sibling2StudId = $_REQUEST["sibling2StudId"];
    $sibling2Class = $_REQUEST["sibling2Class"];
    $sibling2Section = $_REQUEST["sibling2Section"];
    $sibling2RollNo = $_REQUEST["sibling2RollNo"];*/
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
    $admissionId = 101;
    

    $insertAdmissionTableSql = "insert into admission_master_table
        (Admission_Id, School_Id, Session, First_Name, Middle_Name, Last_Name, Class_Id, Gender , DOB, Age, Social_Category, Discount_Category, Locality,
        Academic_Session, Mother_Tongue, Religion, Nationality, Blood_Group, Aadhar_No, Student_Image, Prev_School_Name, Prev_School_Medium, Prev_School_Board, 
        Prev_School_Class, Comm_Address, Comm_Add_Country, Comm_Add_State, Comm_Add_City_Dist, Comm_Add_Pincode, Comm_Add_ContactNo, Resid_Address, Resid_Add_Country,
        Resid_Add_State, Resid_Add_City_Dist, Resid_Add_Pincode, Resid_Add_ContactNo, Sibling_1_Student_Id,Sibling_2_Student_Id, Father_Name, Father_Qualification, Father_Occupation, Father_Designation,
        Father_Org_Name, Father_Org_Add, Father_City, Father_State, Father_Country, Father_Pincode, Father_Email, Father_Contact_No, Father_Annual_Income, Father_Aadhar_Card, Father_Alumni, Father_Image,
        Mother_Name, Mother_Qualification, Mother_Occupation, Mother_Designation, Mother_Org_Name, Mother_Org_Add, Mother_City, Mother_State, Mother_Country, Mother_Pincode, Mother_Email,
        Mother_Contact_No, Mother_Annual_Income, Mother_Aadhar_Card, Mother_Alumni,Mother_Image, 
        Gurdian_Type, Guardian_Address, Guardian_Name, Guardian_Relation, Guardian_Contact_No, Guardian_Image, 
        SMS_Contact_No, Whatsapp_Contact_No, Email_Id,
        Doc_Upload_1, Doc_Upload_2, Doc_Upload_3, Doc_Upload_4, Doc_Upload_5, Doc_Upload_6, Doc_Upload_7, Doc_Upload_8) 
        values(?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
     

    //echo $insertAdmissionTableSql;

    $stmt=$dbhandle->prepare($insertAdmissionTableSql);
    echo $dbhandle->error;	
   
    $stmt->bind_param("iissssissisiisiisssssssissssssssssssssssssssssssssisssssssssssssssissssssssssssssssssss",    
    $admissionId,
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
    $studentPhoto,
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
    $sibling2StudId,
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
    $fatherPhoto,
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
    $motherPhoto,
    $otherType,
    $othersAddress,
    $othersName,
    $othersRelation,
    $othersMobileNo,
    $othersPhoto,
    $studSMSContactNo,
    $studWhatsAppContactNo,
    $studEmailAddress,
    $docUpload_1,
    $docUpload_2,
    $docUpload_3,
    $docUpload_4,
    $docUpload_5,
    $docUpload_6,
    $docUpload_7,
    $docUpload_8
    );


    $execResult=$stmt->execute();
    echo $dbhandle->error;
    $stmt->close();

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
    $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    $str_end='</div>';
    echo $str_start.$messsage.$str_end;
    die;
    //echo "";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';	
    
}

$str_start='<div class="alert icon-alart bg-light-green2" role="alert"><i class="far fa-hand-point-right bg-light-green3"></i>';
$messsage='Enquiry Saved.';
$str_end='</div>';
echo $str_start.$messsage.$str_end;


?>