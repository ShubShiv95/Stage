<?php
   session_start();
   include 'dbobj.php';
   include 'security.php';
   include 'errorLog.php';   



   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   
   $htmlbody = '<table class="table table-bordered"><thead><tr><th>School ID</th><th>Session</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Gender</th><th>DOB</th><th>Age</th><th>Social Category</th><th>Discount Category</th><th>Locality</th><th>Academic Session</th><th>Mother Tongue</th><th>Religion</th><th>Nationality</th><th>Blood Group</th><th>Aadhar No</th><th>Prev School Name</th><th>Prev School Medium</th><th>Prev School Board</th><th>Prev School Class</th><th>Comm Address</th><th>Comm City</th><th>Comm State</th><th>Comm Country </th><th>Comm PinCode</th><th>Comm ContactNo</th><th>Resid Add</th><th>Resid City</th><th>Resid State</th><th>Resid Country</th><th>Resid PinCode</th><th>Resid Contact No</th><th>Sibling_1 Stud Id</th><th>Sibling_1 Class</th><th>Sibling_1 Section</th><th>Sibling_1 Roll</th><th>Sibling_2 Stud Id</th><th>Sibling_2 Class</th><th>Sibling_2 Sec</th><th>Sibling_2 Roll</th><th>Father Name</th><th>Father Qual</th><th>Father Occup</th><th>Father Desig</th><th>Father Org Name</th><th>Father Org Add</th><th>Father City</th><th>Father State</th><th>Father Country</th><th>Father PinCode</th><th>Father Email</th><th>Father Contact</th><th>Father AnnualIncome</th><th>Father Aadhar</th><th>Father Alumni</th><th>Mother Name</th><th>Mother Qual</th><th>Mother Occup</th><th>Mother Desig</th><th>Mother Org Name</th><th>Mother Org Add</th><th>Mother City</th><th>Mother State</th><th>Mother Country</th><th>Mother PinCode</th><th>Father Email</th><th>Mother ContactNo</th><th>Mother AnnualIncome</th><th>Mother Aadhar</th><th>Mother Alumni</th><th>Guardian Type</th><th>Guardian Add</th><th>Guardian Name</th><th>Guardian Relation</th><th>Guardian ContactNo</th><th>SMS ContactNo</th><th>WhatsApp ContactNo</th></tr></thead></table> ';


   while(($filesop = fgetcsv($fileHandle,100,',')) !== false) {
          
     /* $schoolId = $filesop[0];
      $session = $filesop[1];
      $firstName = $filesop[2];
      $middleName = $filesop[3];
      $classId = $filesop[4];
      $gender = $filesop[5];
      $dob = $filesop[6];
      $age = $filesop[7];
      $socialCat = $filesop[8];
      $discCat = $filesop[9];
      $locality = $filesop[10];
      $academicSess = $filesop[11];
      $motherTongue = $filesop[12];
      $religion = $filesop[13];
      $nationality = $filesop[14];
      $bloodGroup = $filesop[15];
      $adharNo = $filesop[16];
      $prevSchoolName = $filesop[17];
      $prevSchoolMedium = $filesop[18];
      $prevSchoolBoard = $filesop[19];
      $preSchoolClass = $filesop[20];
      $commAddress = $filesop[21];
      $commAddCountry = $filesop[22];
      $commAddState = $filesop[23];
      $commAddCityDist = $filesop[24];
      $commAddPinCode = $filesop[25];
      $commAddContactNo = $filesop[26];
      $sibling1StudId = $filesop[27];
      $sibling1Class = $filesop[28];
      $sibling1Sec = $filesop[29];
      $sibling1Roll = $filesop[30];
      $sibling2StudId = $filesop[31];
      $sibling2Class = $filesop[32];
      $sibling2Sec = $filesop[33];
      $siblig2Roll = $filesop[34];
      $fatherName = $filesop[35];
      $fatherQual = $filesop[36];
      $fatherOccup = $filesop[37];
      $fatherDesig = $filesop[38];
      $fatherOrgName = $filesop[39];
      $fatherOrgAdd = $filesop[40];
      $fatherCity = $filesop[41];
      $fatherState = $filesop[42];
      $fatherCountry = $filesop[43];
      $fatherPincode = $filesop[44];
      $fatherEmail = $filesop[45];
      $fatherContactNo = $filesop[46];
      $fatherAnnualIncome = $filesop[47];
      $fatherAadharCard = $filesop[48];
      $fatherAlumni = $filesop[49];
      $motherName = $filesop[50];
      $motherQual = $filesop[51];
      $motherOccup = $filesop[52];
      $motherDesig = $filesop[53];
      $motherOrgName = $filesop[54];
      $motherOrgAdd = $filesop[55];
      $motherCity = $filesop[56];
      $motherState = $filesop[57];
      $motherCountry = $filesop[58];
      $motherPinCode = $filesop[59];
      $motherEmail = $filesop[60];
      $motherContact = $filesop[61];
      $motherAnnualIncome = $filesop[62];
      $motherAadharCard = $filesop[63];
      $motherAlumni = $filesop[64];
      $guardianType = $filesop[65];
      $guardianAdd = $filesop[66];
      $guardianName = $filesop[67];
      $guardianRel = $filesop[68];
      $guardianContactNo = $filesop[69];
      $smsContactNo = $filesop[70];
      $whatsAppContactNo = $filesop[71];
      $studentEmail = $filesop[72];
      $joinYear = $filesop[73];
      $session = $filesop[74];
      $studName = $filesop[75];
      $joinYear = $filesop[76];
      $session = $filesop[77];
      $studName = $filesop[78];
      $joinYear = $filesop[79];
      $session = $filesop[80];
      $studName = $filesop[81];
      $joinYear = $filesop[82];
      $session = $filesop[83];
      $studName = $filesop[84];
      $joinYear = $filesop[85];
      $session = $filesop[86];
      $studName = $filesop[87];
      $joinYear = $filesop[88];
      $session = $filesop[89];
      $session = $filesop[90];
      $session = $filesop[91];
      $session = $filesop[92];
*/

     
			$counter++;
   }

echo $htmlbody;   

?>