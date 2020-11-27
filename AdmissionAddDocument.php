    <?php
    session_start();
    ?>
    <!doctype html>
    <html class="no-js" lang="">
    <?php
    include 'dbobj.php';
    include 'errorLog.php';
    include 'security.php';
    include 'AdmissionModel.php';
    ?>
    <!doctype html>
    <html class="no-js" lang="">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>SWIFTCAMPUS | Admission Add Document View</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <!-- Normalize CSS -->
      <link rel="stylesheet" href="css/normalize.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="css/main.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="css/all.min.css">
      <!-- Flaticon CSS -->
      <link rel="stylesheet" href="fonts/flaticon.css">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="css/animate.min.css">
      <!-- Select 2 CSS -->
      <link rel="stylesheet" href="css/select2.min.css">
      <!-- Date Picker CSS -->
      <link rel="stylesheet" href="css/datepicker.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="style.css">
      <!-- Modernize js -->
      <script src="js/modernizr-3.6.0.min.js"></script>
    </head>

    <body>
      <!-- Preloader Start Here -->
      <div id="preloader"></div>
      <!-- Preloader End Here -->
      <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <?php include('includes/navbar.php') ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
          <!-- Sidebar Area Start Here -->
          <?php
          include 'includes/sidebar.php';
          ?>
          <!-- Sidebar Area End Here -->
          <div class="dashboard-content-one">
            <!-- Breadcubs Area Start Here -->
            <div class="breadcrumbs-area">
              <h3>Admission</h3>
              <ul>
                <li>
                  <a href="dashboard.php">Home</a>
                </li>
                <li>Application Documents</li>
              </ul>
            </div>
            <!-- Breadcubs Area End Here -->
            <div class="card height-auto">
              <div class="card-body">
                <div class="heading-layout1">
                  <div class="item-title aj-item-title">
                    <h3 class="mb-4">Add Student Documents</h3>
                  </div>

                  <div class="col-md-4 offset-md-4 new-added-form aj-new-added-form">
                    <div class="form-group aj-form-group">
                      <label>Search Students By Their ApplicationIds <span>*</span></label>
                      <input type="text" name="studentIds" placeholder="Type Application Id Here" id="search_student_id" class="form-control border-success">
                    </div>
                    <div id="students_searched_data" style="display: none;"></div>
                  </div>

                    <!-- document Form Area Start Here -->
                
                  <div class="col-lg-8 col-md-6 offset-lg-2 offset-md-3 shadow p-3">
                      <div id="form_output"></div>
                    <form action="./AdmissionAddDocuments_2.php" class="new-added-form aj-new-added-form" id="admission_documents"  enctype="multipart/form-data">
                    <!--<div class="text-right"><button class="btn btn-success btn-sm" type="button" id="add_new_fields"><i class="fas fa-plus"></i> Add New Field</button></div>-->
                        <input type="text" autofill="none" style="display: none;" name="student_docs_submitter">
                        <div class="row" id="append_form">
                        <input type="text" autofill="none" style="display: none;" id="student_id" readonly name="student_id" class="form-control mb-3">
                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <label>Document Upload</label>
                                    <select class="select2" name="doc_type" id="doc_type" required>
                                        <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                                echo $string;
                                        ?>                                      
                                    </select>
                                </div>
                            </div>  

                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                    <div class="form-group aj-form-group">
                                        <label>Select Document (Only pdf,jpg,jpeg)</label>
                                        <input type="file" name="document_name" id="document_name" class="form-control" accept="application/pdf,image/jpeg,image/jpg" required>
                                    </div>
                                </div>
                            </div> 

                        <div class="text-right mt-3">
                            <button class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Save Document</button>
                        </div>                    
                    </form>
                  </div>
                  <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 pt-4 shadow" style="display: none;" id="displayDocuments"></div>
                  <!--<span id="element_no">0</span>-->
                </div>
              </div>
              <!-- document Form Area End Here -->
              <footer class="footer-wrap-layout1">
                <div class="copyright">© Copyrights <a href="#">SwipeTouch Technologies</a> 2020. All rights reserved.
              </footer>
            </div>
          </div>
          
          <!-- Page Area End Here -->

        </div>
        <!-- jquery-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

        <!-- Popper js -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Select 2 Js -->
        <script src="js/select2.min.js"></script>

        <!-- Scroll Up Js -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- Custom Js -->
        <script src="js/main.js"></script>
    
        <script type="text/javascript">
            $(document).ready(function(){
                $('#search_student_id').keyup(function(){
                    var student_id = $(this).val();
                    if(student_id!=''){
                        $.ajax({
                            url : './AdmissionAddDocuments_2.php',
                            method : 'post',
                            data : {'search_students':1,'student_id':student_id},
                            success : function(data){
                                $('#students_searched_data').fadeIn();
                                $('#students_searched_data').html(data);
                            }
                        });
                    }
                    else{
                        alert("Please Type Student Id");
                        $('#students_searched_data').fadeOut();
                    }
                });

                $(document).on('click','.student_id_grabber',function(event){
                    event.preventDefault();
                    var student_id = $(this).attr('id');
                    $('#search_student_id').val(student_id);
                    $('#student_id').val(student_id);
                    $('#students_searched_data').fadeOut();
                    load_documents(student_id);
                });

                function load_documents(student_id){
                  $('#displayDocuments').html('');
                  $.ajax({
                    url : './AdmissionAddDocuments_2.php',
                    method : 'get',
                    data : {'getAllDocuments':1,'student_id':student_id},
                    success : function(data){
                      $('#displayDocuments').fadeIn('slow');
                      $('#displayDocuments').html(data);
                    }
                  });                  
                }
                
                $(document).on('click','.deleteDocuments',function(e){
                  e.preventDefault();
                  if(confirm("Are You Sure To Delete?")){
                    const docId = $(this).attr('id');
                    const stidentId = $('#search_student_id').val();
                    $.ajax({
                      url : './AdmissionAddDocuments_2.php',
                      method : 'post',
                      data : {'deleteDocument':1,'docId':docId},
                      success : function(data){
                        alert("Data Deleted Successfully");
                        load_documents(stidentId);
                        $('#element_no').html(data);
                      }
                    });
                  }
                  else{
                    return false;
                  }
                });
                 
                /*$('#add_new_fields').click(function(event){
                    event.preventDefault();
                    var element_no = $('#element_no').text();
                    var next_no = parseInt(element_no)+1;
                    var html = '<div class="col-xl-5 col-lg-5 col-12 aj-mb-2 mt-3" id="select_'+next_no+'"><div class="form-group aj-form-group"><label>Document Upload</label><select class="form-control select2" name="doc_type" id="doc_type"><?php $string = "";foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {$string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;}echo $string;?></select></div></div><div class="col-xl-5 col-lg-5 col-12 aj-mb-2 mt-3" id="field_'+next_no+'"><div class="form-group aj-form-group"><label>Select Document (Only pdf,jpg,jpeg)</label><input type="file" name="document_name" id="document_name" class="form-control" accept="application/pdf,image/jpeg,image/jpg"></div></div><div class="col-xl-2 col-lg-2 col-12 aj-mb-2 mt-3"><input type="button" class="btn btn-danger delete_form_fields" value="x"><div>';
                    $('#append_form').append(html);
                    var element_no = $('#element_no').text(next_no);
                });*/

               /* $('.delete_form_fields').click(function(e){
                    e.preventDefault();
                    alert("Hi");  
                    var element_no = $('#element_no').text();
                    var prev_no = parseInt(element_no)+1;
                    const button_no = $(this).attr('id');
                    var element_no = $('#element_no').text(prev_no);
                });*/

                $(document).on('submit','#admission_documents',function(e){
                    event.preventDefault();
                    const student_id = $('#student_id').val();
                    if(student_id ==''){
                        alert("Please Fill Student Id");
                    }
                    else{
                        $.ajax({
                            url : $(this).attr('action'),
                            method : 'post',
                            data : new FormData(this),
                            contentType : false,
                            processData : false,
                            success : function(data){
                                $('#form_output').html(data);
                                $('#admission_documents')[0].reset();
                                load_documents(student_id);
                            }
                        });
                    }
                });
            });
        </script>
        <script></script>
    </body>

    </html>