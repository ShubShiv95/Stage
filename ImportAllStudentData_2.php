<?php
   session_start();
   include 'dbobj.php';
   include 'AdmissionModel.php';
   include 'security.php';
   include 'errorLog.php';   

   mysqli_autocommit($dbhandle,FALSE);


   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   $isFieldMissing[] = true; //dummy data
   $htmlbody = '<div class="table-responsive"><table class="table table-bordered"><th>Student Id</th><th>School ID</th><th>Session</th><th>Session Start Year</th><th>Session End Year</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Class Sec</th><th>Roll No.</th><th>Gender</th><th>DOB</th><th>Discount Category</th><th>Father Name</th><th>Mother Name</th><th>Guardian Name</th><th>SMS ContactNo</th></tr></thead>';
   $htmlbody = $htmlbody . '<tbody>';

   
   $dataArray = array(array());
   $studIdArray = array("");

   while(($filesop = fgetcsv($fileHandle,10000,',')) !== false) {
      
      if($counter == 0){
         $counter++;
         continue;
      }
      $sec_counter = 0;    

      $htmlbody = $htmlbody . '<tr>';

      $dataArray[$counter][0] = $filesop[0];
      $studentId = $filesop[0];
      $isDuplicate = array_search($studentId,$studIdArray);
      $studIdArray[$counter] = $studentId;
      $isMandatory = array_search("Student_Id",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);

      if($isDuplicate){
         $htmlbody = ($isDuplicate) ? $htmlbody . '<td style="background-color: Orange">' . $studentId . '</td>'
         : $htmlbody . '<td>' . $studentId . '</td>';
      } elseif ($isMandatory && empty($studentId)) {
         $htmlbody = $htmlbody . '<td style="background-color: red">' . " " . '</td>';
      }else {
         $htmlbody = $htmlbody . '<td>' . $studentId . '</td>';
      }

      $isFieldMissing[] = ($isMandatory && empty($studentId) || $isDuplicate > 0) ? false : true ; 

      
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
      $rollNo = $filesop[10];
      $isMandatory = array_search("Roll_No",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($rollNo)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $rollNo . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($rollNo)) ? false : true ; 

      $dataArray[$counter][11] = $filesop[11];
      $gender = $filesop[11];
      $isMandatory = array_search("Gender",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($gender)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $gender . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($gender)) ? false : true ; 


      $dataArray[$counter][12] = $filesop[12];
      $dob = $filesop[12];
      $isMandatory = array_search("DOB",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($dob)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $dob . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($dob)) ? false : true ; 


      $dataArray[$counter][13] = $filesop[13];
      $discCat = $filesop[13];
      $isMandatory = array_search("Discount_Category",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($discCat)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $discCat . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($discCat)) ? false : true ; 
  
      $dataArray[$counter][14] = $filesop[14];
      $fatherName = $filesop[14];
      $isMandatory = array_search("Father_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($fatherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $fatherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($fatherName)) ? false : true ; 
      

      $dataArray[$counter][15] = $filesop[15];
      $motherName = $filesop[15];
      $isMandatory = array_search("Mother_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($motherName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $motherName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($motherName)) ? false : true ; 

      $dataArray[$counter][16] = $filesop[16];
      $guardianName = $filesop[16];
      $isMandatory = array_search("Guardian_Name",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($guardianName)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $guardianName . '</td>';
      $isFieldMissing[] = ($isMandatory && empty($guardianName)) ? false : true ; 

      $dataArray[$counter][17] = $filesop[17];
      $smsContactNo = $filesop[17];
      $isMandatory = array_search("SMS_Contact_No",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($smsContactNo)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $smsContactNo . '</td>';
      $isFieldMissing []= ($isMandatory && empty($smsContactNo)) ? false : true ; 

      $htmlbody = $htmlbody . '</tr>';

		$counter++;
   }
   
   $htmlbody = $htmlbody . '</tbody></table></div>';
  
   //########################   If Block in case of validation fails for the CSV file and it will highlight them  ###################################
   if(array_search(false,$isFieldMissing)!=""){
      echo $htmlbody; 
   } 
   else{  
   //########################   Else Block in case of validation passes and now data insert will begin  ################################### 
      $testelse ="";
      $schoolCode = "DPS";
      $updatedBy = $_SESSION["LOGINID"];
      $IsTransSuccess = true;
      $errorAreaMessage = "";

      $insertStudentClassTableSql = "insert into student_class_details (Student_Details_Id, Student_Id, Class_Id, Class_No, Class_Sec_Id, Roll_No, Session,
      Session_Start_Year, Session_End_Year, School_Id, Updated_By) values(?,?,?,?,?,?,?,?,?,?,?)";
      
      $insertStudentTableSql = "insert into student_master_table
      (Student_Id, School_Id, Session, Session_Start_Year, Session_End_Year, First_Name, Middle_Name, Last_Name, Class_Id, Class_Sec_Id, Gender, DOB, Discount_Category, Father_Name,
      Mother_Name, Guardian_Name, SMS_Contact_No, Updated_By) 
      values(?,?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?)";
      

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

          $tempArray = explode("|", $datarow);  
          $studClassNo = $tempArray[9];
          $schoolId = $tempArray[2];
          $rollNo = $tempArray[11];
          $IsTransSuccess = true;

          //########################   Below Block of SQL Gets Class ID from Class_Master Table  ###################################
          $studentClassIdSql = "Select class_id as Class_Id from class_master_table where Class_Name='" . $studClassNo . "'" . "and School_Id = '" . $schoolId. "'" ;
          $studentClassIdSqlResult = $dbhandle->query($studentClassIdSql);
          $studClassIdResultSet = $studentClassIdSqlResult -> fetch_assoc();
          $studClassId = "";
                    
          if(isset($studClassIdResultSet["Class_Id"])){
            $studClassId = $studClassIdResultSet["Class_Id"];
          } else {
            $IsTransSuccess = false;
            $errorAreaMessage = "Unable to fetch Class_Id for corresponding data Student Class No =" . $studClassNo . " and  School ID = " . $schoolId;
            break;
          }
         


          //########################   Below Block of SQL Gets Sec ID from Class_Master Table  ###################################
          $studentSecIdSql = "Select Class_Sec_Id as SECTION_ID from class_section_table where Class_Id=" . $studClassId  . " and Section = '" . $tempArray[10] ."'" . "and School_Id = " . $schoolId ;
          $studentSecIdSqlResult = $dbhandle->query($studentSecIdSql);
          $studSecIdResultSet = $studentSecIdSqlResult -> fetch_assoc();
          $studSecsId = "";
          if(isset($studSecIdResultSet["SECTION_ID"])){
            $studSecsId = $studSecIdResultSet["SECTION_ID"];
          }else {
            $IsTransSuccess = false;
            $errorAreaMessage = "Unable to fetch Class_Sec_Id for corresponding data  Student Class No =" . $studClassNo . ", Class_Id = " . $studClassId . ", Section = " .$tempArray[10] . " , School ID = " . $schoolId;
            break;
          }

          //########################   Below Block of SQL updates Student_Class_Details Table  ###################################

         //Below Block of SQL calculates the Next value of Student_Class_detail index.

          $studentClassDetIdCountSql = "Select count(Student_Details_Id) as studDetailId from student_class_details where school_id='" . $schoolId. "'";
          $studentClassDetCountResult = $dbhandle->query($studentClassDetIdCountSql);
    
          if($studentClassDetCountResult)
          {
             $getStudCountRow = $studentClassDetCountResult -> fetch_assoc();
             $student_Detail_Id = ($getStudCountRow["studDetailId"] + 1);
          }  
                   
          $stmt = $dbhandle -> prepare($insertStudentClassTableSql);
    
          $stmt->bind_param("isiiiisiiis",   
          $student_Detail_Id,
          $tempArray[1],
          $studClassId,
          $studClassNo,
          $studSecsId,
          $rollNo,
          $tempArray[3],
          $tempArray[4],
          $tempArray[5],
          $schoolId,
          $updatedBy          
         );
            
          $execResult = $stmt->execute();
          echo $dbhandle->error;

         //############################    End of Student_Class_Details update.   #####################################


         //########################   Below Block of SQL updates Student_Master_Table   ###################################

          $stmt2 = $dbhandle -> prepare($insertStudentTableSql);
    
          $stmt2->bind_param("sisiisssiississsss",   
          $tempArray[1],
          $schoolId,
          $tempArray[3],
          $tempArray[4],
          $tempArray[5],
          $tempArray[6],
          $tempArray[7],
          $tempArray[8],
          $studClassId,
          $studSecsId,
          $tempArray[12],
          $tempArray[13],
          $tempArray[14],
          $tempArray[15],
          $tempArray[16],
          $tempArray[17],
          $tempArray[18],
          $updatedBy          
         );
            
          $execResult = $stmt2->execute();
          echo $dbhandle->error;
         
          if(!$execResult){
            $IsTransSuccess = false;
            mysqli_rollback($dbhandle);
            break;
         } 

      }//end of for
   
     if($IsTransSuccess){
         mysqli_commit($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "Successfully Data Imported into Student Master, Student Class Details tables.";
       } 
      else{
          mysqli_rollback($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "Sorry! Unable to import  |  Error Area :- " . "<br>". $errorAreaMessage;
      }
   

   }//end of else
   

?>