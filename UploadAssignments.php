<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
if (empty($_GET['Assignment_id'])) {
    echo '<script>alert("No Taks Found Create New Task");//window.location.href="./CreateNewAssignments.php"</script>';
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
                    <h3>Assignment</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Assignment</li>
                    </ul>
                </div>
                                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Upload File for Assignment</h3>
                            </div>
                        </div>

                        <form class="new-added-form school-form aj-new-added-form" action="./CreateNewAssignments_1.php" id="upload_assignment_file" method="post" enctype="multipart/form-data">
                          <input type="text" name="assignment_file_sender" value="" class="form-control d-none" autocomplete="off">
                          <input type="text" name="Assignment_id" value="<?php echo $_GET['Assignment_id'] ?>" class="form-control d-none" autocomplete="off">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-9 col-lg-9 col-xl-9 ">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                            <div class="form-group aj-form-group">
                                                <label> Upload Type<span>*</span></label>
                                                <select class="select2" required="" name="assignment_type" id="assignment_type">
                                                    <option value="">Select One </option>
                                                    <option value="Link">Link </option>
                                                    <option value="File">File </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                            <div class="form-group aj-form-group">
                                                <label>Attach Assignment</label>
                                                <input type="text" id="assignment" name="assignment" placeholder="" class="form-control aLink" style="display: block;" required >
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 text-right">
                                            <a  href="javascript:void(0);"  class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a>
                                            <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save File </button>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 form_output">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2 mb-4 mt-2 offset-xl-2 offset-lg-2">
                          <div class="Attendance-staff aj-scroll-Attendance-staff mt-5">
                              <div class="table-responsive getDatas">
                                  <table class="table table-bordered attendence-msg">
                                      <thead>
                                          <tr>
                                              <th style="width: 33.333%">Question List.pdf</th>
                                              <th style="width: 33.333%">Sample.jpg</th>
                                              <th style="width: 33.333%">Example.pdf</th>
                                          </tr>
                                      </thead>
                                      <tbody class="top-position-ss">
                                          <tr>
                                              <td><a href="javascript:void(0);">Question List.pdf</a></td>
                                              <td><a href="javascript:void(0);">Sample.jpg</a></td>
                                              <td><a href="javascript:void(0);">Example.pdf</a></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                        </div>
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

    $('#assignment_type').change(function(){
      const assignment_type = $(this).val();
      if (assignment_type == 'File') {
        $('.aLink').fadeIn('slow');
        $('.aLink').get(0).type = 'file';
      }
      else if(assignment_type == 'Link'){
        $('.aLink').fadeIn('slow');
        $('.aLink').get(0).type = 'text';
      }
    });

    $('#upload_assignment_file').submit(function(e){
      e.preventDefault();
      $.ajax({
        url : $(this).attr('action'),
        method : $(this).attr('method'),
        data : new FormData(this),
        contentType: false,
        processData : false,
        success : function(data){
          $('.form_output').html(data);loadAssignments();
          $('#upload_assignment_file')[0].reset();
        }
      });
    });

    loadAssignments();
    function loadAssignments(){
      $.ajax({
        url : './CreateNewAssignments_1.php',
        method : 'get',
        data : {'getAssigns':1},
        success : function(data){
          $('.getDatas').html(data);
        }
      });
    }
</script>
</body>

</html>
