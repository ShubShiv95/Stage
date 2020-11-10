<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
$classDropdownValue = "";
$sql='select cmt.Class_Id,cmt.class_name,cst.stream from class_master_table cmt,class_stream_table cst where enabled=1 and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 and cst.stream_id=cmt.stream order by class_no,stream";

$result=mysqli_query($dbhandle,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $classDropdownValue = '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . ' ' . $row["stream"] . '</option>' . $classDropdownValue;
}

$subjectDropdownValue = "";
$sqlSub='SELECT * FROM `subject_master_table` WHERE `School_Id` = '.$_SESSION['SCHOOLID'].' AND `Enabled` = 1 ORDER BY `Subject_Name`';

$resultSub=mysqli_query($dbhandle,$sqlSub);
while($rowSub=mysqli_fetch_assoc($resultSub))
{
    $subjectDropdownValue = '<option value="' . $rowSub["Subject_Id"] . '">' . $rowSub["Subject_Name"] . ' </option>' . $subjectDropdownValue;
}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Admission Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include ('includes/navbar.php') ?>
        <div class="dashboard-page-one">
             <?php
            include 'includes/sidebar.php';
            ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                    <h3>Attendance</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Attendance</li>
                    </ul>
                </div>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Create New Assignmane</h3>
                            </div>

                            <form class="new-added-form school-form aj-new-added-form" action="./CreateNewAssignments_1.php" id="create_assignment" method="post">
                              <input type="text" name="assignment_sender" value="" class="form-control d-none" autocomplete="off">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-9 col-lg-9 col-xl-9 ">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label> Assignments Type<span>*</span></label>
                                                    <select class="select2" required="" name="assignment_type">
                                                        <option value="">Select One </option>
                                                        <option value="">All </option>
                                                        <option value="Assignment">Assignment </option>
                                                        <option value="Project">Project </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Class <span>*</span></label>
                                                    <select class="select2" required="" name="assignment_class" id="assignment_class">
                                                        <option value="">All </option>
                                                        <?php
                                                            echo $classDropdownValue;
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Topic</label>
                                                    <input type="text" id="sname" name="sname" placeholder="" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group">
                                                    <label class="mb-1">Section Name</label>
                                                        <div class="box-scroll" >
                                                            <div class="radio secList" style="display: none;">
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" checked="" value="1"> A</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]"value="2"> B</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="3"> C</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="4"> D</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]"value="5"> E</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="6"> F</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="7"> G</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="8"> H</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="9"> I</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="10"> J</span>
                                                              <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="11"> K</span>
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Description </label>
                                                    <textarea style="height: 100%;" class="textarea form-control" name="description" id="description" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Subject Name</label>
                                                    <select class="select2" required="" name="assignment_subject">
                                                        <option value="">Select One </option>
                                                        <?php
                                                            echo $subjectDropdownValue;
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                <div class="form-group aj-form-group">
                                                    <label>Is Submissable</label>
                                                    <select class="select2" required="" name="submissible" id="depar_Category">
                                                      <option value="0">Select One </option>
                                                        <option value="Yes">Yes </option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2" >
                                              <div class="form-group aj-form-group submission_field" style="display:none">
                                                <label id="lab_sub">Date of Submission <span>*</span></label>
                                                <input type="text" name="date_of_submision" id="date_of_submision" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                                                <i class="far fa-calendar-alt"></i>
                                              </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 text-right">
                                                <a  href="javascript:void(0);"  class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a>
                                                <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create Assignments </button>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 form_output">
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                            href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/datepicker.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myscript.js"></script>
    <script type="text/javascript" src="js/ajax-function.js"></script>

<script language="JavaScript">

    $(document).on('click', '.hide-cl', function () {

          $(this).addClass('chang-togel');
          $(this).html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
          var add = $(this).attr('add')
          $('.content').removeClass('active')


           var par = $('.'+ add).addClass('active');
      });

    $(document).on('click', '.chang-togel', function () {
        $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        $('.content').removeClass('active')
        $('.chang-togel').removeClass('chang-togel')
    });

    $('#depar_Category').change(function(){
      const isSubmissible = $(this).val();
      if (isSubmissible == 'Yes') {
        $('.submission_field').fadeIn('slow');
      }
      else{
        $('.submission_field').fadeOut('slow');
      }
    });

    $('#create_assignment').submit(function(e){
      e.preventDefault();
      $.ajax({
        url : $(this).attr('action'),
        method : $(this).attr('method'),
        data : $(this).serialize(),
        success : function(data){
          $('.form_output').html(data);
        }
      });
    });

    $(document).on('change','#assignment_class',function(){
        let classId = $(this).val();
        if (classId !="") {
            $.ajax({
                url : './CreateNewAssignments_1.php',
                method : 'get',
                data : {'getSection':1,'classId':classId},
                success : function(data){
                    $('.secList').fadeIn('slow');
                    $('.secList').html(data);
                }
            });
        }
    });
</script>
</body>

</html>
