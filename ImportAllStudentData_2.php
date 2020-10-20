<?php
   session_start();
   include 'dbobj.php';
   include 'AdmissionModel.php';
   include 'security.php';
   include 'errorLog.php';   



   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   
   $htmlbody = '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>School ID</th><th>Session</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Class Sec</th><th>Gender</th><th>DOB</th><th>Age</th><th>Social Category</th><th>Discount Category</th><th>Locality</th><th>Academic Session</th><th>Mother Tongue</th><th>Religion</th><th>Nationality</th><th>Blood Group</th><th>Aadhar No</th><th>Prev School Name</th><th>Prev School Medium</th><th>Prev School Board</th><th>Prev School Class</th><th>Comm Address</th><th>Comm City</th><th>Comm State</th><th>Comm Country </th><th>Comm PinCode</th><th>Comm ContactNo</th><th>Resid Add</th><th>Resid City</th><th>Resid State</th><th>Resid Country</th><th>Resid PinCode</th><th>Resid Contact No</th><th>Sibling_1 Stud Id</th><th>Sibling_1 Class</th><th>Sibling_1 Section</th><th>Sibling_1 Roll</th><th>Sibling_2 Stud Id</th><th>Sibling_2 Class</th><th>Sibling_2 Sec</th><th>Sibling_2 Roll</th><th>Father Name</th><th>Father Qual</th><th>Father Occup</th><th>Father Desig</th><th>Father Org Name</th><th>Father Org Add</th><th>Father City</th><th>Father State</th><th>Father Country</th><th>Father PinCode</th><th>Father Email</th><th>Father Contact</th><th>Father AnnualIncome</th><th>Father Aadhar</th><th>Father Alumni</th><th>Mother Name</th><th>Mother Qual</th><th>Mother Occup</th><th>Mother Desig</th><th>Mother Org Name</th><th>Mother Org Add</th><th>Mother City</th><th>Mother State</th><th>Mother Country</th><th>Mother PinCode</th><th>Father Email</th><th>Mother ContactNo</th><th>Mother AnnualIncome</th><th>Mother Aadhar</th><th>Mother Alumni</th><th>Guardian Type</th><th>Guardian Add</th><th>Guardian Name</th><th>Guardian Relation</th><th>Guardian ContactNo</th><th>SMS ContactNo</th><th>WhatsApp ContactNo</th><th>Email</th></tr></thead>';
   $htmlbody = $htmlbody . '<tbody>';

   
   $dataArray = array(array());

   while(($filesop = fgetcsv($fileHandle,10000,',')) !== false) {
      
      if($counter == 0){
         $counter++;
         continue;
      }
      $sec_counter = 0;
      $isFieldMissing[] = true; //dummy data

      $htmlbody = $htmlbody . '<tr>';
      
      $dataArray[$counter][0] = $filesop[0];
      $schoolId = $filesop[0];
      $isMandatory = array_search("School_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($schoolId)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $schoolId . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($schoolId)) ? false : true ; 

      $dataArray[$counter][1] = $filesop[1];
      $session = $filesop[1];
      $isMandatory = array_search("Session",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($session)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $session . '</td>';
      $isFieldMissing[]  = ($isMandatory && empty($session)) ? false : true ; 


      $dataArray[$counter][2] = $filesop[2];
      $firstName = $filesop[2];
      $isMandatory = array_search("First_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($firstName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $firstName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($firstName)) ? false : true ; 


      
      $dataArray[$counter][3] = $filesop[3];
      $middleName = $filesop[3];
      $isMandatory = array_search("Middle_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($middleName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $middleName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($academicSess)) ? false : true ; 

      $dataArray[$counter][14] = $filesop[14];
      $motherTongue = $filesop[14];
      $isMandatory = array_search("Mother_Tongue",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherTongue)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherTongue . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherTongue)) ? false : true ; 

      $dataArray[$counter][15] = $filesop[15];
      $religion = $filesop[15];
      $isMandatory = array_search("Religion",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($religion)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $religion . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($religion)) ? false : true ; 


      $dataArray[$counter][16] = $filesop[16];
      $nationality = $filesop[16];
      $isMandatory = array_search("Nationality",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($nationality)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $nationality . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($nationality)) ? false : true ; 

      $dataArray[$counter][17] = $filesop[17];
      $bloodGroup = $filesop[17];
      $isMandatory = array_search("Blood_Group",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($bloodGroup)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $bloodGroup . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($bloodGroup)) ? false : true ; 

      $dataArray[$counter][18] = $filesop[18];
      $aadharNo = $filesop[18];
      $isMandatory = array_search("Aadhar_No",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($aadharNo)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $aadharNo . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($aadharNo)) ? false : true ; 


      $dataArray[$counter][19] = $filesop[19];
      $prevSchool = $filesop[19];
      $isMandatory = array_search("Previous_School",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($prevSchool)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $prevSchool . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($prevSchool)) ? false : true ; 


      $dataArray[$counter][20] = $filesop[20];
      $prevSchoolMed = $filesop[20];
      $isMandatory = array_search("Previous_School_Medium",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($prevSchoolMed)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $prevSchoolMed . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($prevSchoolMed)) ? false : true ; 


      $dataArray[$counter][21] = $filesop[21];
      $prevSchoolBoard = $filesop[21];
      $isMandatory = array_search("Previous_School_Board",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($prevSchoolBoard)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $prevSchoolBoard . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($prevSchoolBoard)) ? false : true ; 
  
      $dataArray[$counter][22] = $filesop[22];
      $prevSchoolClass = $filesop[22];
      $isMandatory = array_search("Previous_School_Board",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($prevSchoolClass)) ? $prevSchoolClass . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $prevSchoolClass . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($prevSchoolClass)) ? false : true ; 
      

      $dataArray[$counter][23] = $filesop[23];
      $commAdd = $filesop[23];
      $isMandatory = array_search("Comm_Address",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commAdd)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commAdd . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($commAdd)) ? false : true ; 

      $dataArray[$counter][24] = $filesop[24];
      $commCity = $filesop[24];
      $isMandatory = array_search("Comm_Add_City_Dist",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commCity)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commCity . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($commCity)) ? false : true ; 

      $dataArray[$counter][25] = $filesop[25];
      $commState = $filesop[25];
      $isMandatory = array_search("Comm_Add_State",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commState)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commState . '</td>';
      $isFieldMissing []= ($isMandatory && empty($commState)) ? false : true ; 

      $dataArray[$counter][26] = $filesop[26];
      $commCountry = $filesop[26];
      $isMandatory = array_search("Comm_Add_Country",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commCountry)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commCountry . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($commCountry)) ? false : true ; 


      $dataArray[$counter][27] = $filesop[27];
      $commPinCode = $filesop[27];
      $isMandatory = array_search("Comm_Add_Pincode",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commPinCode)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commPinCode . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($commPinCode)) ? false : true ; 

      $dataArray[$counter][28] = $filesop[28];
      $commContact = $filesop[28];
      $isMandatory = array_search("Comm_Add_ContactNo",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($commContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $commContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($commContact)) ? false : true ; 

      $dataArray[$counter][29] = $filesop[29];
      $residAdd = $filesop[29];
      $isMandatory = array_search("Resid_Address",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residAdd)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residAdd . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residAdd)) ? false : true ; 

      $dataArray[$counter][30] = $filesop[30];
      $residCity = $filesop[30];
      $isMandatory = array_search("Resid_Add_City_Dist",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residCity)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residCity . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residCity)) ? false : true ; 

      $dataArray[$counter][31] = $filesop[31];
      $residState = $filesop[31];
      $isMandatory = array_search("Resid_Add_State",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residState)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residState . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residState)) ? false : true ; 

      $dataArray[$counter][32] = $filesop[32];
      $residCountry = $filesop[32];
      $isMandatory = array_search("Resid_Add_Country",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residCountry)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residCountry . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residCountry)) ? false : true ; 

      $dataArray[$counter][33] = $filesop[33];
      $residPinCode = $filesop[33];
      $isMandatory = array_search("Resid_Add_Pincode",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residPinCode)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residPinCode . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residPinCode)) ? false : true ; 

      $dataArray[$counter][34] = $filesop[34];
      $residContact = $filesop[34];
      $isMandatory = array_search("Resid_Add_ContactNo",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($residContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $residContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($residContact)) ? false : true ; 

      $dataArray[$counter][35] = $filesop[35];
      $sibling1StudId = $filesop[35];
      $isMandatory = array_search("Sibling1_Stud_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling1StudId)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling1StudId . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling1StudId)) ? false : true ; 

      $dataArray[$counter][36] = $filesop[36];
      $sibling1Class = $filesop[36];
      $isMandatory = array_search("Sibling1_Class",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling1Class)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling1Class . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling1Class)) ? false : true ; 

      $dataArray[$counter][37] = $filesop[37];
      $sibling1Sec = $filesop[37];
      $isMandatory = array_search("Sibling1_Sec",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling1Sec)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling1Sec . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling1Sec)) ? false : true ; 

      $dataArray[$counter][38] = $filesop[38];
      $sibling1Roll = $filesop[38];
      $isMandatory = array_search("Sibling1_Roll",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling1Roll)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling1Roll . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling1Roll)) ? false : true ; 

      $dataArray[$counter][39] = $filesop[39];
      $sibling2StudId = $filesop[39];
      $isMandatory = array_search("Sibling2_Stud_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling2StudId)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling2StudId . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling2StudId)) ? false : true ; 


      $dataArray[$counter][40] = $filesop[40];
      $sibling2Class = $filesop[40];
      $isMandatory = array_search("Sibling2_Class",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling2Class)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling2Class . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling2Class)) ? false : true ; 

      $dataArray[$counter][41] = $filesop[41];
      $sibling2Sec = $filesop[41];
      $isMandatory = array_search("Sibling2_Sec",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling2Sec)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling2Sec . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling2Sec)) ? false : true ; 

      $dataArray[$counter][42] = $filesop[42];
      $sibling2Roll = $filesop[42];
      $isMandatory = array_search("Sibling2_Roll",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sibling2Roll)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sibling2Roll . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sibling2Roll)) ? false : true ;


      $dataArray[$counter][43] = $filesop[43];
      $isMandatory = array_search("Sibling2_Roll",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($dataArray[$counter][43])) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $dataArray[$counter][43] . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($dataArray[$counter][43])) ? false : true ;


      $dataArray[$counter][44] = $filesop[44];
      $fatherQual = $filesop[44];
      $isMandatory = array_search("Father_Qualifaction",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherQual)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherQual . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherQual)) ? false : true ;


      $dataArray[$counter][45] = $filesop[45];
      $fatherOccup = $filesop[45];
      $isMandatory = array_search("Father_Occupation",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherOccup)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherOccup . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherOccup)) ? false : true ;


      $dataArray[$counter][46] = $filesop[46];
      $fatherDesig = $filesop[46];
      $isMandatory = array_search("Father_Desig",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherDesig)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherDesig . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherDesig)) ? false : true ;


      $dataArray[$counter][47] = $filesop[47];
      $fatherOrgName = $filesop[47];
      $isMandatory = array_search("Father_Org_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherOrgName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherOrgName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherOrgName)) ? false : true ;


      $dataArray[$counter][48] = $filesop[48];
      $fatherOrgAdd = $filesop[48];
      $isMandatory = array_search("Father_Org_Add",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherOrgAdd)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherOrgAdd . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherOrgAdd)) ? false : true ;


      $dataArray[$counter][49] = $filesop[49];
      $fatherCity = $filesop[49];
      $isMandatory = array_search("Father_City",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherCity)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherCity . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherCity)) ? false : true ;


      $dataArray[$counter][50] = $filesop[50];
      $fatherState = $filesop[50];
      $isMandatory = array_search("Father_State",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherState)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherState . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherState)) ? false : true ;


      $dataArray[$counter][51] = $filesop[51];
      $fatherCountry = $filesop[51];
      $isMandatory = array_search("Father_Country",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherCountry)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherCountry . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherCountry)) ? false : true ;

      $dataArray[$counter][52] =  $filesop[52];
      $fatherPincode =  $filesop[52];
      $isMandatory = array_search("Father_PinCode",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherPincode)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherPincode . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherPincode)) ? false : true ;

      $dataArray[$counter][53] = $filesop[53];
      $fatherEmail = $filesop[53];
      $isMandatory = array_search("Father_Email",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherEmail)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherEmail . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherEmail)) ? false : true ;


      $dataArray[$counter][54] = $filesop[54];
      $fatherContact = $filesop[54];
      $isMandatory = array_search("Father_Contact",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherContact)) ? false : true ;


      $dataArray[$counter][55] = $filesop[55];
      $fatherAnnualIncome = $filesop[55];
      $isMandatory = array_search("Father_Annual_Income",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherAnnualIncome)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherAnnualIncome . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherAnnualIncome)) ? false : true ;


      $dataArray[$counter][56] = $filesop[56];
      $fatherAadhar = $filesop[56];
      $isMandatory = array_search("Father_Aadhar",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherAadhar)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherAadhar . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherAadhar)) ? false : true ;

      $dataArray[$counter][57] = $filesop[57];
      $fatherAlumni = $filesop[57];
      $isMandatory = array_search("Father_Alumni", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherAlumni)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherAlumni . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherAlumni)) ? false : true ; 

      $dataArray[$counter][58] = $filesop[58];
      $motherName = $filesop[58];
      $htmlbody = $htmlbody . '<td>' . $motherName . '</td>';
      $isMandatory = array_search("Mother_Name", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherName)) ? false : true ; 


      $dataArray[$counter][59] = $filesop[59];
      $motherName = $filesop[58];
      $htmlbody = $htmlbody . '<td>' . $motherName . '</td>';
      $isMandatory = array_search("Mother_Name", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherName)) ? false : true ; 


      $dataArray[$counter][60] = $filesop[60];
      $motherOccup = $filesop[60];
      $isMandatory = array_search("Mother_Occupation", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherOccup)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherOccup . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherOccup)) ? false : true ; 


      $dataArray[$counter][61] = $filesop[61];
      $motherDesig = $filesop[61];
      $isMandatory = array_search("Mother_Desig", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherDesig)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherDesig . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherDesig)) ? false : true ; 

      $dataArray[$counter][62] = $filesop[62];
      $motherOrgName = $filesop[62];
      $isMandatory = array_search("Mother_Org_Name", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($motherOrgName && empty($motherOrgName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherOrgName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherOrgName)) ? false : true ; 


      $dataArray[$counter][63] = $filesop[63];
      $motherOrgAdd = $filesop[63];
      $isMandatory = array_search("Mother_Org_Add", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($motherOrgAdd && empty($motherOrgAdd)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherOrgAdd . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherOrgAdd)) ? false : true ; 

      $dataArray[$counter][64] = $filesop[64];
      $motherCity = $filesop[64];
      $isMandatory = array_search("Mother_City", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherCity)) ? $motherCity . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherCity . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherCity)) ? false : true ; 


      $dataArray[$counter][65] = $filesop[65];
      $motherState = $filesop[65];
      $isMandatory = array_search("Mother_State", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherState)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherState . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherState)) ? false : true ; 

      $dataArray[$counter][66] = $filesop[66];
      $motherCountry = $filesop[66];
      $isMandatory = array_search("Mother_Country", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherCountry)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherCountry . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherCountry)) ? false : true ; 


      $dataArray[$counter][67] = $filesop[67];
      $motherPinCode = $filesop[67];
      $isMandatory = array_search("Mother_Pin_Code", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherPinCode)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherPinCode . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherPinCode)) ? false : true ; 



      $dataArray[$counter][68] = $filesop[68];
      $motherEmail = $filesop[68];
      $isMandatory = array_search("Mother_Email", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherEmail)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherEmail . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherEmail)) ? false : true ; 


      $dataArray[$counter][69] = $filesop[69];
      $motherContact = $filesop[69];
      $isMandatory = array_search("Mother_Contact", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherContact)) ? false : true ; 


      $dataArray[$counter][70] = $filesop[70];
      $motherAnnual = $filesop[70];
      $isMandatory = array_search("Mother_Annual_Income", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherAnnual)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherAnnual . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherAnnual)) ? false : true ; 

      $dataArray[$counter][71] = $filesop[71];
      $motherAadhar = $filesop[71];
      $isMandatory = array_search("Mother_Aadhar", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherAadhar)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherAadhar . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherAadhar)) ? false : true ; 

      
      $dataArray[$counter][72] = $filesop[72];
      $motherAlumni = $filesop[72];
      $isMandatory = array_search("Mother_Alumni", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherAlumni)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherAlumni . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherAlumni)) ? false : true ; 


      $dataArray[$counter][73] = $filesop[73];
      $guardianType = $filesop[73];
      $isMandatory = array_search("	Guardian_Type", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianType)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianType . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianType)) ? false : true ; 

      $dataArray[$counter][74] = $filesop[74];
      $guardianAdd = $filesop[74];
      $isMandatory = array_search("	Guardian_Add", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianAdd)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianAdd . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianAdd)) ? false : true ; 


      $dataArray[$counter][75] = $filesop[75];
      $guardianName = $filesop[75];
      $isMandatory = array_search("	Guardian_Name", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianName)) ? false : true ; 


      $dataArray[$counter][76] = $filesop[76];
      $guardianRel = $filesop[76];
      $isMandatory = array_search("	Guardian_Relation", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianRel)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianRel . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianRel)) ? false : true ; 

      $dataArray[$counter][77] = $filesop[77];
      $guardianContact = $filesop[77];
      $isMandatory = array_search("Guardian_Contact_No", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianContact)) ? false : true ; 


      $dataArray[$counter][78] = $filesop[78];
      $SMSContact = $filesop[78];
      $isMandatory = array_search("SMS_Contact_No", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($SMSContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $SMSContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($SMSContact)) ? false : true ; 

      $dataArray[$counter][79] = $filesop[79];
      $whatsAppContact = $filesop[79];
      $isMandatory = array_search("Whatsapp_Contact_No", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($whatsAppContact)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $whatsAppContact . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($whatsAppContact)) ? false : true ; 

      $dataArray[$counter][80]= $filesop[80];
      $email = $filesop[80];
      $isMandatory = array_search("Email_Id", $GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($email)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $email . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($email)) ? false : true ; 
      


      $htmlbody = $htmlbody . '</tr>';

		$counter++;
   }
   
   $htmlbody = $htmlbody . '</tbody></table></div>';

  
  

   if(array_search(false,$isFieldMissing)!=""){
      echo $htmlbody; 
   } 
   else{   
      $testelse ="";

      $schoolCode = "DPS";
      $schoolAdmissionId;
      $IsTransSuccess = true;
      $studentIdCountSql = "Select count(Student_Id) as studId from student_master_table where school_id='" . $schoolId. "'";
      $studentCountResult = $dbhandle->query($studentIdCountSql);

      $IsTransSuccess = true;
      mysqli_autocommit($dbhandle,FALSE);
      $dbhandle->query('LOCK TABLES student_master_table WRITE');
   
      if($studentCountResult)
      {
         $getStudCountRow = $studentCountResult -> fetch_assoc();
         $studId = ($getStudCountRow["studId"] + 1);
         $student_Id = $schoolCode . date("Y") .  $studId;
      }   
      
      $insertStudentTableSql = "insert into student_master_table
      (Student_Id, Admission_Id, School_Id, Session, Session_Start_Year, Session_End_Year, First_Name, Middle_Name, Last_Name, Class_Id, Class_Sec_Id, Gender , DOB, Age, Social_Category, Discount_Category, Locality,
      Academic_Session, Mother_Tongue, Religion, Nationality, Blood_Group, Aadhar_No, Student_Image, Prev_School_Name, Prev_School_Medium, Prev_School_Board, 
      Prev_School_Class, Comm_Address, Comm_Add_Country, Comm_Add_State, Comm_Add_City_Dist, Comm_Add_Pincode, Comm_Add_ContactNo, Resid_Address, Resid_Add_Country,
      Resid_Add_State, Resid_Add_City_Dist, Resid_Add_Pincode, Resid_Add_ContactNo, Sibling_1_Student_Id, Sibling_1_Class, Sibling_1_Section, Sibling_1_RollNo, 
      Sibling_2_Student_Id, Sibling_2_Class, Sibling_2_Section, Sibling_2_RollNo, Father_Name, Father_Qualification, Father_Occupation, Father_Designation,
      Father_Org_Name, Father_Org_Add, Father_City, Father_State, Father_Country, Father_Pincode, Father_Email, Father_Contact_No, Father_Annual_Income, Father_Aadhar_Card, Father_Alumni, Father_Image,
      Mother_Name, Mother_Qualification, Mother_Occupation, Mother_Designation, Mother_Org_Name, Mother_Org_Add, Mother_City, Mother_State, Mother_Country, Mother_Pincode, Mother_Email,
      Mother_Contact_No, Mother_Annual_Income, Mother_Aadhar_Card, Mother_Alumni,Mother_Image, 
      Gurdian_Type, Guardian_Address, Guardian_Name, Guardian_Relation, Guardian_Contact_No, Guardian_Image, 
      SMS_Contact_No, Whatsapp_Contact_No, Email_Id, Enabled,
      Doc_Upload_1, Doc_Upload_2, Doc_Upload_3, Doc_Upload_4, Doc_Upload_5, Doc_Upload_6, Doc_Upload_7, Doc_Upload_8, Updated_By, Updated_On) 
      values(?,?,?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      

      $datarow = "";
      $tempArray = array();
      $size = count($dataArray);
      $testVariable ="";
      $i = 0; $j = 0;

      for($i = 0; $i < $size; $i++)
      {
         $j = 0;
         foreach($dataArray[$i] as $key => $value) { // for($j=0; $j < 78; $j++ ) {//
              $datarow =  $datarow . "?" . $value ; //$datarow =  $datarow . "$$" . $dataArray[$i][$j]; //big string with delimited value 100$$2020-2021$$Ravi$$na$$Kishan$$5$$A$$MALE$$
             //echo "i=$i" . "j=$j" ;
          }
         echo $datarow;
          $tempArray = explode("?", $datarow);  
          $x = 1;
          $testVariable =  $tempArray[$x];
          /*
          $stmt = $dbhandle -> prepare($insertStudentTableSql);

          echo $dbhandle->error;	
          $a ='STUD_2342';
          $b = "2020";
          $c = "2021";
          $h = 1;
          $blank = "";
          $sess = "2020-2021";

          
          $stmt->bind_param("siisiisssiissisiisiisssssssisssssssssssssisisisissssssssssssisssssssssssssssissssssssssssissssssssss",   
          $student_Id,
          $a,
          $tempArray[0],
          $sess,
          $b, //session start year
          $c, //session end year
          $tempArray[2],
          $tempArray[3],
          $tempArray[4],
          $tempArray[5],
          $tempArray[6],
          $tempArray[7],
          $tempArray[8],
          $tempArray[9],
          $tempArray[10],
          $tempArray[12],
          $tempArray[13],
          $tempArray[14],
          $tempArray[15],
          $tempArray[16],
          $tempArray[17],
          $tempArray[18],
          $tempArray[19],
          $blank, //student image
          $tempArray[20],
          $tempArray[21],
          $tempArray[22],
          $tempArray[23],
          $tempArray[24],
          $tempArray[25],
          $tempArray[26],
          $tempArray[27],
          $tempArray[28],
          $tempArray[29],
          $tempArray[30],
          $tempArray[31],
          $tempArray[32],
          $tempArray[33],
          $tempArray[34],
          $tempArray[35],
          $tempArray[36],
          $tempArray[37],
          $tempArray[38],
          $tempArray[39],
          $tempArray[40],
          $tempArray[41],
          $tempArray[42],
          $tempArray[43],
          $tempArray[44],
          $tempArray[45],
          $tempArray[46],
          $tempArray[47],
          $tempArray[48],
          $tempArray[49],
          $tempArray[50],
          $tempArray[51],
          $tempArray[52],
          $tempArray[53],
          $tempArray[54],
          $tempArray[55],
          $tempArray[55],
          $tempArray[56],
          $tempArray[57],
          $blank, //father image
          $tempArray[58],
          $tempArray[59],
          $tempArray[60],
          $tempArray[61],
          $tempArray[62],
          $tempArray[63],
          $tempArray[64],
          $tempArray[65],
          $tempArray[66],
          $tempArray[67],
          $tempArray[68],
          $tempArray[69],
          $tempArray[70],
          $tempArray[71],
          $tempArray[72],
          $blank, //mother Image
          $tempArray[73],
          $tempArray[74],
          $tempArray[75],
          $tempArray[76],
          $tempArray[77],
          $blank, //Guardian Image.
          $tempArray[78],
          $tempArray[79],
          $tempArray[80],
          $h,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank,
          $blank
          );
      
      
          $execResult = $stmt->execute();
          echo $dbhandle->error;
         
          if(!$stmt->execute()){
            $IsTransSuccess = false;
            mysqli_rollback($dbhandle);
            break;
         } */

      }//end of for
   
      if($IsTransSuccess){
         //mysqli_commit($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         //echo "Success";
         //echo print_r($tempArray);
         //echo print_r($tempArray);
         echo $testVariable;
      } 
      else{
        // mysqli_rollback($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "Sorry! Unable to import";
      }
   

   }//end of else
   

?>