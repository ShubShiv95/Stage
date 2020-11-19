<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Upload Assignment Content";
$bodyHeader = "Assignments List";
require_once './includes/header.php';
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';

$subjectDropdownValue = "";
$sqlSub = 'SELECT * FROM `subject_master_table` WHERE `School_Id` = ' . $_SESSION['SCHOOLID'] . ' AND `Enabled` = 1 ORDER BY `Subject_Name`';
$resultSub = mysqli_query($dbhandle, $sqlSub);
while ($rowSub = mysqli_fetch_assoc($resultSub)) {
  $subjectDropdownValue = '<option value="' . $rowSub["Subject_Id"] . '">' . $rowSub["Subject_Name"] . ' </option>' . $subjectDropdownValue;
}
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3 col-12">
              <form action="./StudentAssignmentSubmit_1.php" class="new-added-form aj-new-added-form" id="assignment_documents" enctype="multipart/form-data">
                <input type="text" autofill="none" style="display: none;" name="student_assignment_submitter">
                <input type="text" autofill="none" style="display: none;" id="assignmentId" value="<?php echo $_REQUEST['assignmentId']; ?>" readonly name="assignmentId" class="form-control mb-3">
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Select Document (Only png,jpg,jpeg)</label>
                    <input type="file" name="document_name" id="document_name" class="form-control" accept="application/pdf,image/jpeg,image/jpg" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3">
                  <div class="form-group aj-form-group">
                    <label>Task Remarks</label>
                    <textarea class="aj-form-control" rows="4" id="" name="task_remarks"></textarea>
                  </div>
                </div>
                <div class="text-right mt-3">
                  <button class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Upload Assignment</button>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mt-3 formoutput">
                 
                </div>
              </form>
            </div>

            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2">
                  <div class="row assignment-list">
                      
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-wrap-layout1">
      <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
  </div>
</div>

<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('submit','#assignment_documents',function(event){
      event.preventDefault();
      $.ajax({
        url : $(this).attr('action'),
        type : 'post',
        data : new FormData(this),
        dataType : 'json',
        processData : false,
        contentType : false,
        success : function(data){
          $('#assignment_documents')[0].reset();
          uploadData = JSON.parse(JSON.stringify(data));
          var htmlD='';
          if(uploadData.status = "success"){
           htmlD += '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> '+uploadData.message+'.</div>';
          show_student_assignments();
          }
          else{
            htmlD += '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> '+uploadData.message+'.</div>';
          }
          $('.formoutput').html(htmlD);
          window.setTimeout(function(){
              $('.formoutput').fadeOut('slow');
          },1500);
        }
      });
    });

    show_student_assignments();
    function show_student_assignments(){
      const assignment_id =  "<?php echo $_GET['assignmentId'] ?>";
      $.ajax({
        url : './StudentAssignmentSubmit_1.php',
        type : 'get',
        data : {'getStudentAssignment':1,'assignment_id':assignment_id},
        dataType : 'json',
        success : function(response){
          var filehtml = '';
          assignmentFiles = JSON.parse(JSON.stringify(response));
          for (let index = 0; index < assignmentFiles.length; index++) {
            const fileData = assignmentFiles[index];
            filehtml += '<div class="card text-white shadow col-md-6"><img class="card-img-top w-100" src="./'+fileData.File_Path+fileData.File_Name+'" alt=""><div class="card-body"><p class="card-text">'+fileData.Task_Note+'</p></div></div>';
          }
          $('.assignment-list').html(filehtml);
        }
      });
    }
  });
</script>
<?php
require_once './includes/closebody.php';
?>
