<?php
   session_start();
   include 'dbobj.php';
   include 'security.php';
   include 'errorLog.php';   



   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   
   $htmlbody = '<table class="table table-bordered"><thead><tr><th>School ID</th><th>Session</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Gender</th><th>DOB</th><th>Age</th><th>Social Category</th><th>Discount Category</th><th>Locality</th><th>Academic Session</th><th>Mother Tongue</th><th>Religion</th><th>Nationality</th><th>Blood Group</th><th>Aadhar No</th><th>Prev School Name</th><th>Prev School Medium</th><th>Prev School Board</th><th>Prev School Class</th><th>Comm Address</th><th>Comm City</th><th>Comm State</th><th>Comm Country </th><th>Comm PinCode</th><th>Comm ContactNo</th><th>Resid Add</th><th>Resid City</th><th>Resid State</th><th>Resid Country</th><th>Resid PinCode</th><th>Resid Contact No</th><th>Sibling_1 Stud Id</th><th>Sibling_1 Class</th><th>Sibling_1 Section</th><th>Sibling_1 Roll</th><th>Sibling_2 Stud Id</th><th>Sibling_2 Class</th><th>Sibling_2 Sec</th><th>Sibling_2 Roll</th><th>Father Name</th><th>Father Qual</th><th>Father Occup</th><th>Father Desig</th><th>Father Org Name</th><th>Father Org Add</th><th>Father City</th><th>Father State</th><th>Father Country</th><th>Father PinCode</th><th>Father Email</th><th>Father Contact</th><th>Father AnnualIncome</th><th>Father Aadhar</th><th>Father Alumni</th><th>Mother Name</th><th>Mother Qual</th><th>Mother Occup</th><th>Mother Desig</th><th>Mother Org Name</th><th>Mother Org Add</th><th>Mother City</th><th>Mother State</th><th>Mother Country</th><th>Mother PinCode</th><th>Father Email</th><th>Mother ContactNo</th><th>Mother AnnualIncome</th><th>Mother Aadhar</th><th>Mother Alumni</th><th>Guardian Type</th><th>Guardian Add</th><th>Guardian Name</th><th>Guardian Relation</th><th>Guardian ContactNo</th><th>SMS ContactNo</th><th>WhatsApp ContactNo</th><th>Email ID</th></tr></thead> ';
   $htmlbody = $htmlbody . '<tbody>';

   while(($filesop = fgetcsv($fileHandle,10000,',')) !== false) {
      
      // if($counter == 0){
      //    continue;
      // }
         

      $htmlbody = $htmlbody . '<tr>';
      
      $schoolId = $filesop[0];
      $htmlbody = $htmlbody . '<td>' . $schoolId . '</td>';
      
      $session = $filesop[1];
      $htmlbody = $htmlbody . '<td>' . $session . '</td>';

      $firstName = $filesop[2];
      $htmlbody = $htmlbody . '<td>' . $firstName . '</td>';

      $middleName = $filesop[3];
      $htmlbody = $htmlbody . '<td>' . $middleName . '</td>';

      $lastName = $filesop[4];
      $htmlbody = $htmlbody . '<td>' . $lastName . '</td>';

      $classId = $filesop[5];
      $htmlbody = $htmlbody . '<td>' . $classId . '</td>';
      
      $gender = $filesop[6];
      $htmlbody = $htmlbody . '<td>' . $gender . '</td>';

      $dob = $filesop[7];
      $htmlbody = $htmlbody . '<td>' . $dob . '</td>';

      $age = $filesop[8];
      $htmlbody = $htmlbody . '<td>' . $age . '</td>';

      $socialCat = $filesop[9];
      $htmlbody = $htmlbody . '<td>' . $socialCat . '</td>';

      $discCat = $filesop[10];
      $htmlbody = $htmlbody . '<td>' . $discCat . '</td>';

      $locality = $filesop[11];
      $htmlbody = $htmlbody . '<td>' . $locality . '</td>';

      $academicSess = $filesop[12];
      $htmlbody = $htmlbody . '<td>' . $academicSess . '</td>';

      $motherTongue = $filesop[13];
      $htmlbody = $htmlbody . '<td>' . $motherTongue . '</td>';

      $religion = $filesop[14];
      $htmlbody = $htmlbody . '<td>' . $religion . '</td>';

      $nationality = $filesop[15];
      $htmlbody = $htmlbody . '<td>' . $nationality . '</td>';

      $bloodGroup = $filesop[16];
      $htmlbody = $htmlbody . '<td>' . $bloodGroup . '</td>';

      $aadharNo = $filesop[17];
      $htmlbody = $htmlbody . '<td>' . $aadharNo . '</td>';

      $prevSchool = $filesop[18];
      $htmlbody = $htmlbody . '<td>' . $prevSchool . '</td>';

      $prevSchoolMed = $filesop[19];
      $htmlbody = $htmlbody . '<td>' . $prevSchoolMed . '</td>';

      $prevSchoolBoard = $filesop[20];
      $htmlbody = $htmlbody . '<td>' . $prevSchoolBoard . '</td>';

      $prevSchoolClass = $filesop[21];
      $htmlbody = $htmlbody . '<td>' . $prevSchoolClass . '</td>';

      $commAdd = $filesop[22];
      $htmlbody = $htmlbody . '<td>' . $commAdd . '</td>';

      $commCity = $filesop[23];
      $htmlbody = $htmlbody . '<td>' . $commCity . '</td>';

      $commState = $filesop[24];
      $htmlbody = $htmlbody . '<td>' . $commState . '</td>';

      $commCountry = $filesop[25];
      $htmlbody = $htmlbody . '<td>' . $commCountry . '</td>';

      $commPinCode = $filesop[26];
      $htmlbody = $htmlbody . '<td>' . $commPinCode . '</td>';

      $commContact = $filesop[27];
      $htmlbody = $htmlbody . '<td>' . $commContact . '</td>';

      $residAdd = $filesop[28];
      $htmlbody = $htmlbody . '<td>' . $residAdd . '</td>';

      $residCity = $filesop[29];
      $htmlbody = $htmlbody . '<td>' . $residCity . '</td>';

      $residState = $filesop[30];
      $htmlbody = $htmlbody . '<td>' . $residState . '</td>';

      $residCountry = $filesop[31];
      $htmlbody = $htmlbody . '<td>' . $residCountry . '</td>';

      $residPinCode = $filesop[32];
      $htmlbody = $htmlbody . '<td>' . $residPinCode . '</td>';

      $residContact = $filesop[33];
      $htmlbody = $htmlbody . '<td>' . $residContact . '</td>';

      $sibling1StudId = $filesop[34];
      $htmlbody = $htmlbody . '<td>' . $sibling1StudId . '</td>';

      $sibling1Class = $filesop[35];
      $htmlbody = $htmlbody . '<td>' . $sibling1Class . '</td>';

      $sibling1Sec = $filesop[36];
      $htmlbody = $htmlbody . '<td>' . $sibling1Sec . '</td>';

      $sibling1Roll = $filesop[37];
      $htmlbody = $htmlbody . '<td>' . $sibling1Roll . '</td>';

      $sibling2StudId = $filesop[38];
      $htmlbody = $htmlbody . '<td>' . $sibling2StudId . '</td>';

      $sibling2Class = $filesop[39];
      $htmlbody = $htmlbody . '<td>' . $sibling2Class . '</td>';

      $sibling2Sec = $filesop[40];
      $htmlbody = $htmlbody . '<td>' . $sibling2Sec . '</td>';

      $sibling2Roll = $filesop[41];
      $htmlbody = $htmlbody . '<td>' . $sibling2Roll . '</td>';

      $fatherName = $filesop[42];
      $htmlbody = $htmlbody . '<td>' . $fatherName . '</td>';

      $fatherQual = $filesop[43];
      $htmlbody = $htmlbody . '<td>' . $fatherQual . '</td>';

      $fatherOccup = $filesop[44];
      $htmlbody = $htmlbody . '<td>' . $fatherOccup . '</td>';

      $fatherDesig = $filesop[45];
      $htmlbody = $htmlbody . '<td>' . $fatherDesig . '</td>';

      $fatherOrgName = $filesop[46];
      $htmlbody = $htmlbody . '<td>' . $fatherOrgName . '</td>';

      $fatherOrgAdd = $filesop[47];
      $htmlbody = $htmlbody . '<td>' . $fatherOrgAdd . '</td>';

      $fatherCity = $filesop[48];
      $htmlbody = $htmlbody . '<td>' . $fatherCity . '</td>';

      $fatherState = $filesop[49];
      $htmlbody = $htmlbody . '<td>' . $fatherState . '</td>';

      $fatherCountry = $filesop[50];
      $htmlbody = $htmlbody . '<td>' . $fatherCountry . '</td>';

      $fatherPincode =  $filesop[51];
      $htmlbody = $htmlbody . '<td>' . $fatherPincode . '</td>';

      $fatherEmail = $filesop[52];
      $htmlbody = $htmlbody . '<td>' . $fatherEmail . '</td>';

      $fatherContact = $filesop[53];
      $htmlbody = $htmlbody . '<td>' . $fatherContact . '</td>';

      $fatherAnnualIncome = $filesop[54];
      $htmlbody = $htmlbody . '<td>' . $fatherAnnualIncome . '</td>';

      $fatherAadhar = $filesop[55];
      $htmlbody = $htmlbody . '<td>' . $fatherAadhar . '</td>';

      $fatherAlumni = $filesop[56];
      $htmlbody = $htmlbody . '<td>' . $fatherAlumni . '</td>';

      $motherName = $filesop[57];
      $htmlbody = $htmlbody . '<td>' . $motherName . '</td>';

      $motherQual = $filesop[58];
      $htmlbody = $htmlbody . '<td>' . $motherQual . '</td>';

      $motherOccup = $filesop[59];
      $htmlbody = $htmlbody . '<td>' . $motherOccup . '</td>';

      $motherDesig = $filesop[60];
      $htmlbody = $htmlbody . '<td>' . $motherDesig . '</td>';

      $motherOrgName = $filesop[61];
      $htmlbody = $htmlbody . '<td>' . $motherOrgName . '</td>';

      $motherOrgAdd = $filesop[62];
      $htmlbody = $htmlbody . '<td>' . $motherOrgAdd . '</td>';

      $motherCity = $filesop[63];
      $htmlbody = $htmlbody . '<td>' . $motherCity . '</td>';

      $motherState = $filesop[64];
      $htmlbody = $htmlbody . '<td>' . $motherState . '</td>';

      $motherCountry = $filesop[65];
      $htmlbody = $htmlbody . '<td>' . $motherCountry . '</td>';

      $motherPinCode = $filesop[66];
      $htmlbody = $htmlbody . '<td>' . $motherPinCode . '</td>';

      $motherEmail = $filesop[67];
      $htmlbody = $htmlbody . '<td>' . $motherEmail . '</td>';

      $motherContact = $filesop[68];
      $htmlbody = $htmlbody . '<td>' . $motherContact . '</td>';

      $motherAnnual = $filesop[69];
      $htmlbody = $htmlbody . '<td>' . $motherAnnual . '</td>';

      $motherAadhar = $filesop[70];
      $htmlbody = $htmlbody . '<td>' . $motherAadhar . '</td>';

      $motherAlumni = $filesop[71];
      $htmlbody = $htmlbody . '<td>' . $motherAlumni . '</td>';

      $guardianType = $filesop[72];
      $htmlbody = $htmlbody . '<td>' . $guardianType . '</td>';

      $guardianAdd = $filesop[73];
      $htmlbody = $htmlbody . '<td>' . $guardianAdd . '</td>';

      $guardianName = $filesop[74];
      $htmlbody = $htmlbody . '<td>' . $guardianName . '</td>';

      $guardianRel = $filesop[75];
      $htmlbody = $htmlbody . '<td>' . $guardianRel . '</td>';

      $guardianContact = $filesop[76];
      $htmlbody = $htmlbody . '<td>' . $guardianContact . '</td>';

      $SMSContact = $filesop[77];
      $htmlbody = $htmlbody . '<td>' . $SMSContact . '</td>';

      $whatsAppContact = $filesop[78];
      $htmlbody = $htmlbody . '<td>' . $whatsAppContact . '</td>';

      $email = $filesop[79];
      $htmlbody = $htmlbody . '<td>' . $email . '</td>';
      
      $htmlbody = $htmlbody . '</tr>';

		$counter++;
   }
   $htmlbody = $htmlbody . '</tbody></table></div>';
   echo $htmlbody;   

?>