<?php
    session_start();
    include './dbobj.php';
    include './security.php';
    include './errorLog.php';
    // Turn on all error reporting
    // Report all PHP errors (see changelog)
    error_reporting(E_ALL);
    //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
    ini_set('display_errors', 1);
    
    
  if(isset($_POST['search_students'])){
    if(!(empty($_POST['student_id']))){
      $studentString = mysqli_real_escape_string($dbhandle,$_POST['student_id']);
      $studentString = "%".$studentString."%";
      $selectAdmissionSql = "Select Admission_Id, First_Name, Middle_Name, Last_Name, Gender, DOB, Father_Name, Mother_Name, Guardian_Name From admission_master_table Where Admission_id LIKE ?";
      $stmt=$dbhandle->prepare($selectAdmissionSql);
      $stmt->bind_param("s", $studentString);
      $execResult=$stmt->execute();
      $result = $stmt->get_result();
      if(empty($result->num_rows)){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>No Record Fount!</strong> Please Type Corrrect Student ID.
            </div>';
      }
      else{
        echo '<ul class="nav"><li class="nav-item">';
        while($row = $result->fetch_assoc()){
          echo '
          <a class="nav-link border-bottom active text-dark student_id_grabber" href="#" id="'.$row['Admission_Id'].'">'.$row['Admission_Id'].' || '.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].'</a>
        ';
        }
        echo '</li></ul>';
      }

    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>No Data Fount!</strong> Please Type Student ID.
    </div>';
    }

   $stmt->close();
  }


  if(isset($_POST['student_docs_submitter'])){
    if (empty($_POST['student_docs_submitter'])) {
      $clearStId = mysqli_real_escape_string($dbhandle,$_POST['student_id']);
      $documentType = mysqli_real_escape_string($dbhandle,$_POST['doc_type']);
      $documentName = mysqli_real_escape_string($dbhandle,$_FILES['document_name']['name']);

      if(empty($clearStId)){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Alert!</strong> Student Id Cannot Be Blank.
            </div>';
      }
      else if (empty($documentType)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Alert!</strong> Please Select Document Type.
            </div>';
      }
      else if (empty($documentName)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Alert!</strong> Please Select Document.
            </div>';
      }
      else {
        $allowedImageExtension = array("jpg","jpeg","pdf");
        $fileExtension = strtolower(pathinfo($_FILES['document_name']['name'],PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedImageExtension)) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Alert!</strong> Only Image(jpg,jpeg) or Pdf allowed.
            </div>';
        }
        else{
          $mainDirectory = "./AdmissionDocuments/";
          if (!file_exists($mainDirectory)) {
            mkdir('./AdmissionDocuments/', 0777, true);
          }
          $directory = $clearStId."_AdmissionDocs";
          
          $fillePath = "./AdmissionDocuments/".$directory;
          if (!file_exists($fillePath)) {
            mkdir('./AdmissionDocuments/'.$directory, 0777, true);
          } 
            $selectDocumentSql = "SELECT Doc_Id FROM admission_master_documents WHERE Student_Id = ? AND Document_Type = ?";
            $stmt=$dbhandle->prepare($selectDocumentSql);
            $stmt->bind_param("is", $clearStId,$documentType);
            $execResult=$stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows>0) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Document Already Submitted.
              </div>';
            }else {
              $fileName = md5($_SESSION["USERID"].date('YmdHis')).'.'.$fileExtension;
              $targetPath = $fillePath.'/'.$fileName; 
              $fileSave = move_uploaded_file($_FILES['document_name']['tmp_name'],$targetPath);
             
              $lasstId = "SELECT MAX(Doc_Id) FROM admission_master_documents";
              $stmtId=$dbhandle->prepare($lasstId);
              $execResult=$stmtId->execute();
              $resultId = $stmtId->get_result();
             
              $rowId = $resultId->fetch_assoc();
              $docId = $rowId['MAX(Doc_Id)']+1;
              $fileName = $directory.'/'.$fileName;
              $updateDocumentSql = "INSERT INTO `admission_master_documents`(`Doc_Id`, `Student_Id`, `Document_Name`, `Document_Type`) VALUES (?,?,?,?)";
              $stmtIns=$dbhandle->prepare($updateDocumentSql);
              
              $stmtIns->bind_param("isss", $docId,$clearStId,$fileName,$documentType);
              $resultSet = $stmtIns->execute();
              if (($resultSet == true)&&($fileSave==true)) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Message!</strong> Document Saved Successfully.
              </div>';
              }
              else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> Some Error Occured.
              </div>';
              }

            }
        }
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>DAnger!</strong> Bot Detected.
            </div>';
    }
    $stmt->close();
  }

  if (isset($_GET['getAllDocuments'])) {
    $studentId = $_GET['student_id'];
    $selectDocumentSql = "SELECT * FROM `admission_master_documents` WHERE `Student_Id` = ? ORDER BY Doc_Id DESC";
    $stmt=$dbhandle->prepare($selectDocumentSql);
    $stmt->bind_param("i", $studentId);
    $execResult=$stmt->execute();
    $result = $stmt->get_result();

    if(empty($result->num_rows)){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>No Documents Submitted Yet!</strong> Try Submit Documents.
          </div>';
    }  
    else{
      echo '<table class="table table-hover pt-3">
      <tr>
        <th>Document Type</th>
        <th>Preview</th>
        <th id="250">Action</th>
      </tr>';
      while ($docRows = $result->fetch_assoc()) {
        $fileExtension = pathinfo($docRows['Document_Name'],PATHINFO_EXTENSION);
        echo '<tr>
              <td>'.$docRows['Document_Type'].'</td>
              <td>'; 
              if ($fileExtension == "jpeg" || $fileExtension == "jpg") {
                echo '<img src="./AdmissionDocuments/'.$docRows['Document_Name'].'" style="width:200px;">';
              }
              else if($fileExtension == "pdf" )
              {
                echo '<embed src="./AdmissionDocuments/'.$docRows['Document_Name'].'" width="200px" height="200px" /><a href="./AdmissionDocuments/'.$docRows['Document_Name'].'" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';  
              }
              echo'</td>
              <td><button class="btn btn-danger btn-sm deleteDocuments" id="'.$docRows['Doc_Id'].'"><i class="fas fa-trash"></i></button></td>
            </tr>';
      }
      echo '</table>';
    }
    $stmt->close();
  }

  if (isset($_POST['deleteDocument'])) {
    $selectDocumentSql = "SELECT * FROM `admission_master_documents` WHERE `Doc_Id` = ?";
    $stmt=$dbhandle->prepare($selectDocumentSql);
    $stmt->bind_param("i", $_POST['docId']);
    $execResult=$stmt->execute();
    $result = $stmt->get_result();
    $docRow = $result->fetch_assoc();
    $delFile = unlink('./AdmissionDocuments/'.$docRow['Document_Name']); 
    
    $deleteDataSql ="DELETE FROM `admission_master_documents` WHERE `Doc_Id` = ?";
    $stmtDel=$dbhandle->prepare($deleteDataSql);
    $stmtDel->bind_param("i", $_POST['docId']);
    $execDel=$stmtDel->execute();
    if ($execDel==true) {
      echo "Data Deleted";
    }
  }
?>


