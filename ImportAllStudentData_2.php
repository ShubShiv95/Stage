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
      $studentId = $filesop[0];
      $isMandatory = array_search("Student_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($studentId)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $studentId . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($studentId)) ? false : true ; 

      
      $dataArray[$counter][1] = $filesop[1];
      $schoolId = $filesop[1];
      $isMandatory = array_search("School_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($schoolId)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $schoolId . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($schoolId)) ? false : true ; 

      $dataArray[$counter][2] = $filesop[2];
      $session = $filesop[2];
      $isMandatory = array_search("Session",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($session)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $session . '</td>';
      $isFieldMissing[]  = ($isMandatory && empty($session)) ? false : true ; 


      $dataArray[$counter][3] = $filesop[3];
      $sessionStartYear = $filesop[3];
      $isMandatory = array_search("Session_Start_Year",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sessionStartYear)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sessionStartYear . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sessionStartYear)) ? false : true ; 


      $dataArray[$counter][4] = $filesop[4];
      $sessionEndYear = $filesop[4];
      $isMandatory = array_search("Session_End_Year",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($sessionEndYear)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $sessionEndYear . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($sessionEndYear)) ? false : true ; 

      $dataArray[$counter][5] = $filesop[5];
      $firstName = $filesop[5];
      $isMandatory = array_search("First_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($firstName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $firstName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($firstName)) ? false : true ; 

      $dataArray[$counter][6] = $filesop[6];
      $middleName = $filesop[6];
      $isMandatory = array_search("Middle_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($middleName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $middleName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($middleName)) ? false : true ; 


      $dataArray[$counter][7] = $filesop[7];
      $lastName = $filesop[7];
      $isMandatory = array_search("Last_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($lastName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $lastName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($lastName)) ? false : true ; 

      $dataArray[$counter][8] = $filesop[8];
      $class = $filesop[8];
      $isMandatory = array_search("Class",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($class)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $class . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($class)) ? false : true ; 

      $dataArray[$counter][9] = $filesop[9];
      $section = $filesop[9];
      $isMandatory = array_search("Section",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($section)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $section . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($section)) ? false : true ; 


      $dataArray[$counter][10] = $filesop[10];
      $gender = $filesop[10];
      $isMandatory = array_search("Gender",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($gender)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $gender . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($gender)) ? false : true ; 


      $dataArray[$counter][11] = $filesop[11];
      $dob = $filesop[11];
      $isMandatory = array_search("DOB",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($dob)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $dob . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($dob)) ? false : true ; 


      $dataArray[$counter][12] = $filesop[12];
      $discCat = $filesop[12];
      $isMandatory = array_search("Discount_Category",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($discCat)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $discCat . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($discCat)) ? false : true ; 
  
      $dataArray[$counter][13] = $filesop[13];
      $fatherName = $filesop[13];
      $isMandatory = array_search("Father_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherName)) ? false : true ; 
      

      $dataArray[$counter][14] = $filesop[14];
      $motherName = $filesop[14];
      $isMandatory = array_search("Mother_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherName)) ? false : true ; 

      $dataArray[$counter][15] = $filesop[15];
      $guardianName = $filesop[15];
      $isMandatory = array_search("Guardian_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianName)) ? false : true ; 

      $dataArray[$counter][16] = $filesop[16];
      $smsContactNo = $filesop[16];
      $isMandatory = array_search("SMS_Contact_No",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($smsContactNo)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $smsContactNo . '</td>';
      $isFieldMissing []= ($isMandatory && empty($smsContactNo)) ? false : true ; 

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
      $IsTransSuccess = true;
      $studentIdCountSql = "Select count(Student_Id) as studId from student_master_table where school_id='" . $schoolId. "'";
      $studentCountResult = $dbhandle->query($studentIdCountSql);
      $IsTransSuccess = true;
      mysqli_autocommit($dbhandle,FALSE);
      //$dbhandle->query('LOCK TABLES student_master_table WRITE');
   
      if($studentCountResult)
      {
         $getStudCountRow = $studentCountResult -> fetch_assoc();
         $studId = ($getStudCountRow["studId"] + 1);
         $student_Id = $schoolCode . date("Y") .  $studId;
      }   
      
      $insertStudentTableSql = "insert into student_master_table
      (Student_Id, School_Id, Session, Session_Start_Year, Session_End_Year, First_Name, Middle_Name, Last_Name, Class_Id, Class_Sec_Id, Gender, DOB, Discount_Category, Father_Name,
      Mother_Name, Guardian_Name, SMS_Contact_No, Updated_By, Updated_On) 
      values(?,?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?)";
      

      $tempArray = array();
      $size = count($dataArray);
      $testVariable ="";
      $i = 1;

      for($i = 1; $i < $size; $i++)
      {
         $datarow = "";
         foreach($dataArray[$i] as $key => $value) { 
              $datarow =  $datarow . "|" . $value ; 
          }
          echo $datarow . '<br>'; 

          $tempArray = explode("|", $datarow);  
         
          $stmt = $dbhandle -> prepare($insertStudentTableSql);

          $updatedBy = "Staff";
          $updatedOn = date("Y/m/d");
        
          $stmt->bind_param("sisiisssiississssss",   
          $tempArray[1],
          $tempArray[2],
          $tempArray[3],
          $tempArray[4],
          $tempArray[5],
          $tempArray[6],
          $tempArray[7],
          $tempArray[8],
          $tempArray[9],
          $tempArray[10],
          $tempArray[11],
          $tempArray[12],
          $tempArray[13],
          $tempArray[14],
          $tempArray[15],
          $tempArray[16],
          $tempArray[17],
          $updatedBy,
          $updatedOn
          );
            
          $execResult = $stmt->execute();
          //echo $dbhandle->error;
         
          if(!$execResult){
            $IsTransSuccess = false;
            mysqli_rollback($dbhandle);
            break;
         } 

      }//end of for
   
     if($IsTransSuccess){
         mysqli_commit($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "Successfully Data Imported";
       } 
      else{
          mysqli_rollback($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "Sorry! Unable to import";
      }
   

   }//end of else
   

?>