<?php
   session_start();
   include 'dbobj.php';
   include 'AdmissionModel.php';
   include 'security.php';
   include 'errorLog.php';   
   require_once 'sequenceGenerator.php';

   mysqli_autocommit($dbhandle,FALSE);


   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   $isFieldMissing[] = true; //dummy data
   $htmlbody = '<div class="table-responsive"><table class="table table-bordered"><th>Student Id</th><th>School ID</th><th>Session</th><th>Session Start Year</th><th>Session End Year</th><th>First Name</th><th>Middle Name</th><th>Last Name </th><th>Class Id</th><th>Class Sec</th><th>Roll No.</th><th>Gender</th><th>DOB</th><th>Discount Category</th><th>Father Name</th><th>Mother Name</th><th>Guardian Name</th><th>SMS ContactNo</th><th>Student Type</th><th>Stream</th><th>Enabled</th><th>Communication</th><th>State</th><th>Nationality</th><th>Mother Tongue</th></tr></thead>';
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

      $dataArray[$counter][18] = $filesop[18];
      $studentType = $filesop[18];
      $isMandatory = array_search("STUDENT_TYPE",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($studentType)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $studentType . '</td>';
      $isFieldMissing []= ($isMandatory && empty($studentType)) ? false : true ; 


      $dataArray[$counter][19] = $filesop[19];
      $stream = $filesop[19];
      $isMandatory = array_search("STREAM",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($stream)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $stream . '</td>';
      $isFieldMissing []= ($isMandatory && empty($stream)) ? false : true ; 


      $dataArray[$counter][20] = $filesop[20];
      $enabled = $filesop[20];
      $isMandatory = array_search("ENABLED",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 


      $dataArray[$counter][21] = $filesop[21];
      $enabled = $filesop[21];
      $isMandatory = array_search("COMMUNICATION",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 

      $dataArray[$counter][22] = $filesop[22];
      $enabled = $filesop[22];
      $isMandatory = array_search("STATE",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 

      $dataArray[$counter][23] = $filesop[23];
      $enabled = $filesop[23];
      $isMandatory = array_search("NATIONALITY",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 

      $dataArray[$counter][24] = $filesop[24];
      $enabled = $filesop[24];
      $isMandatory = array_search("MOTHER_TONGUE",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 
      $htmlbody = $htmlbody . '</tr>';
	   
	  $dataArray[$counter][25] = $filesop[25];
      $enabled = $filesop[25];
      $isMandatory = array_search("SCHOOL_ADM_NO",$GLOBAL_ADMISSION_FIELD_IS_MANDATORY);
      $htmlbody = ($isMandatory && empty($enabled)) ? $htmlbody . '<td style="background-color: red">' . " " . '</td>'
                     : $htmlbody . '<td>' . $enabled . '</td>';
      $isFieldMissing []= ($isMandatory && empty($enabled)) ? false : true ; 
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
      $updatedBy = $_SESSION["LOGINID"];
      $IsTransSuccess = true;
      $errorAreaMessage = "";

      $insertStudentClassTableSql = "insert into student_class_details (Student_Details_Id, Student_Id, Class_Id, Class_No, Class_Sec_Id, Roll_No, Session,
      Session_Start_Year, Session_End_Year, School_Id, Student_Type, Stream, Enabled, Concession_Id, Updated_By) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      
      $insertStudentTableSql = "insert into student_master_table
      (Student_Id, School_Adm_No, School_Id, Session, Session_Start_Year, Session_End_Year, First_Name, Middle_Name, Last_Name, Class_Id, Class_Sec_Id, Gender, DOB, Father_Name,
      Mother_Name, Guardian_Name, SMS_Contact_No, Date_Of_Enroll,Student_Login_Id, Parent_Login_Id, Enabled, Comm_Address, Comm_Add_State, Nationality, Mother_Tongue, Updated_By) 
      values(?,?,?,?,?,?,?,?,?,?,?,?,str_to_date(?,'%d-%m-%Y'),?,?,?,?,str_to_date(?,'%d/%m/%Y'),?,?,?,?,?,?,?,?)";
      
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
          //Change for CISDHN
          $student_id = $tempArray[1];
          $IsTransSuccess = true;
          $enabled = $tempArray[21];

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

          $student_cl_gen = max_sequence_number('student_class_details',"Student_Details_Id", $dbhandle);
          $today_date = date("d/m/Y");
          //$student_id = generate_student_id('student_master_table', $dbhandle);
          $stmt = $dbhandle -> prepare($insertStudentClassTableSql);
          $stmt->bind_param("isiiiisiiissiis",
          $student_cl_gen,   
          $student_id,
          $studClassId,
          $studClassNo,
          $studSecsId,
          $rollNo,
          $tempArray[3],
          $tempArray[4],
          $tempArray[5],
          $schoolId,
          $studentType,
          $stream,
          $enabled,
          $discCat,
          $updatedBy          
         );
            
          $execResult = $stmt->execute();
          echo $dbhandle->error;

          if(!$execResult){
            $IsTransSuccess = false;
            $errorAreaMessage = "Unable to insert data in Student_Class_Details Table student_id =" . $student_id ;
            mysqli_rollback($dbhandle);
            $error_msg= $errorAreaMessage;
            $sql='';
            $el = new LogMessage();
            $el->write_log_message('Unable to Import Student Data', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
            break;
         }

         //############################    End of Student_Class_Details update.   #####################################

         //######################   Populate Parent login detail to the Login Table ##################################

         $parent_login_id = $tempArray[18];
         // checking login table for parent login
         $parent_check = "SELECT * FROM login_table WHERE LOGIN_ID = ?";
         $parent_check_prep = $dbhandle->prepare($parent_check);
         $parent_check_prep->bind_param("s",$parent_login_id);
         $parent_check_prep->execute();
         $result_p_login = $parent_check_prep->get_result();
         $parent_login_data = $result_p_login->fetch_assoc();
         //$password = rand(); // For temporary basis Password is kept as DDMMYYYY format.
         $password = str_replace('-', '', $tempArray[13]);
         $enc_pwd = sha1($password);
         if (empty($parent_login_data['LOGIN_ID'])) {
           $parent_login_id = $tempArray[18];
           // insert into login table for parent
           //$login_id = sequence_number('login_table',$dbhandle);
			$login_id=max_sequence_number('login_table','LID',$dbhandle);
           $parent_login = "insert into login_table (LID, LOGIN_ID, PASSWORD, LOGIN_TYPE, MOBILE_NO, Role_Id, Role_Approved, SCHOOL_ID) VALUES (?,?,?,?,?,?,?,?)";
           $l_type = 'PARENT';
           $role_Id = "2";
           $role_Approved = "1";
           $parent_login_prep = $dbhandle->prepare($parent_login);
           $parent_login_prep->bind_param("issssiii",$login_id,$parent_login_id,$enc_pwd,$l_type,$parent_login_id,$role_Id,$role_Approved,$schoolId);
           $execResult = $parent_login_prep->execute();
           echo $dbhandle->error;
           if(!$execResult){
            $IsTransSuccess = false;
            $errorAreaMessage = "$login_id Unable to insert Parent Login Data in Login_Table LOGIN_ID = " . $parent_login_id ;
            mysqli_rollback($dbhandle);
            $error_msg= $errorAreaMessage;
            $sql='';
            $el = new LogMessage();
            $el->write_log_message('Unable to Import Student Data', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
            break;
          }
         }else{
           $parent_login_id = $parent_login_data['LOGIN_ID'];//$tempArray[18];
         }
         //########################  End of getting Parent Login Id  ######################################################
         
         //########################   Below Block of SQL updates Student_Master_Table   ###################################
          $stmt2 = $dbhandle -> prepare($insertStudentTableSql);
          $stmt2->bind_param("ssisiisssiisssssssssisssss",   
          $student_id,
          $tempArray[26],
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
          $tempArray[15],
          $tempArray[16],
          $tempArray[17],
          $tempArray[18],
          $today_date,
          $student_id,
          $parent_login_id, //parent id  = sms_contact_no
          $enabled,
          $tempArray[22],
          $tempArray[23],
          $tempArray[24],
          $tempArray[25],
          $updatedBy          
         );
            
          $execResult = $stmt2->execute();
          echo $dbhandle->error;
          if(!$execResult){
            $IsTransSuccess = false;
            $errorAreaMessage = "Unable to insert data in Student_Master_Table student_id =" . $student_id ;
            mysqli_rollback($dbhandle);
            break;
          }
         // // insert into login table
          //$login_id = sequence_number('login_table',$dbhandle);
		  $login_id=max_sequence_number('login_table','LID',$dbhandle);
          $ins_st_login = "INSERT INTO login_table (LID, LOGIN_ID, PASSWORD, LOGIN_TYPE, MOBILE_NO, Role_Id, Role_Approved, SCHOOL_ID) VALUES (?,?,?,?,?,?,?,?)";
          $l_type = 'STUDENT';
          $role_Id = "2";
          $role_Approve = "1";
          $ins_st_login_prep = $dbhandle->prepare($ins_st_login);
          $ins_st_login_prep->bind_param("issssiii",$login_id,$student_id,$enc_pwd,$l_type,$tempArray[18],$role_Id,$role_Approve,$schoolId);
          $execResult = $ins_st_login_prep->execute();
         if(!$execResult){
            $IsTransSuccess = false;
            $errorAreaMessage = "Unable to Insert Data in Login_Table while inserting Student Login Info Login_ID =" . $student_id ;
            mysqli_rollback($dbhandle);
            $error_msg= $errorAreaMessage;
            $sql='';
            $el = new LogMessage();
            $el->write_log_message('Unable to Import Student Data', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
            break;
         } 

      }//end of for
     if($IsTransSuccess){
         mysqli_commit($dbhandle);
         //$dbhandle->query('UNLOCK TABLES');
         echo "<B>Successfully Data Imported into Login Table, Student Master, Student Class Details tables.</B>";
       } 
      else{
          mysqli_rollback($dbhandle);
          $error_msg= $errorAreaMessage;
          $sql='';
          $el = new LogMessage();
          $el->write_log_message('Unable to Import Student Data', $error_msg, $sql,__FILE__, $_SESSION['LOGINID']);
          die;
         //$dbhandle->query('UNLOCK TABLES');
         echo "Sorry! Unable to import  |  Error Area :- " . "<br>". $errorAreaMessage;
      }   
   }//end of else