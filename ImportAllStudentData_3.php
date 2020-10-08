<?php
   session_start();
   include 'dbobj.php';
   include 'security.php';
   include 'errorLog.php';   

if(isset($_REQUEST["submit"]))
{

   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   $IsTransSuccess = true;

   mysqli_autocommit($dbhandle,FALSE);
   $dbhandle->query('LOCK TABLES admission_master_table WRITE');

   while(($filesop = fgetcsv($fileHandle,100,',')) !== false) {
          
      $schoolId = $filesop[0];
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
      


      $sql = "insert into excel(fname,lname) values (?,?)";
      $stmt4=$dbhandle->prepare($sql);
      $stmt4->bind_param("ss",$fname,$lname);	
      if($counter>0){
            if(!$stmt4->execute()){
               $IsTransSuccess = false;
               mysqli_rollback($dbhandle);
               break;
            }
      }
			$counter++;
   }

   if($IsTransSuccess){
      mysqli_commit($dbhandle);
      $dbhandle->query('UNLOCK TABLES');
      echo "Success";
   } 
	else{
      mysqli_rollback($dbhandle);
      $dbhandle->query('UNLOCK TABLES');
      echo "Sorry! Unable to import";
   }

}
?>