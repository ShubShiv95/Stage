    <?php
    $pageTitle  = "Admission Add Document";
    require_once './includes/header.php';
    require_once './includes/navbar.php';
    include 'AdmissionModel.php';
    ?>

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
            <form action="./AdmissionAddDocuments_2.php" class="new-added-form aj-new-added-form" id="admission_documents" enctype="multipart/form-data">
              <input type="text" autofill="none" style="display: none;" name="student_docs_submitter">
              <div class="row" id="append_form">

                <input type="text" autofill="none" style="display: none;" id="student_id" readonly name="student_id" class="form-control mb-3">

                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                  <div class="form-group aj-form-group">
                    <label>Document Upload</label>
                    <select class="select2 col-12" name="doc_type" id="doc_type" required>
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

        <?php require_once './includes/scripts.php'; ?>

        <script type="text/javascript">
          $(document).ready(function() {
            $('#search_student_id').keyup(function() {
              var student_id = $(this).val();
              if (student_id != '') {
                $.ajax({
                  url: './AdmissionAddDocuments_2.php',
                  method: 'post',
                  data: {
                    'search_students': 1,
                    'student_id': student_id
                  },
                  success: function(data) {
                    $('#students_searched_data').fadeIn();
                    $('#students_searched_data').html(data);
                  }
                });
              } else {
                alert("Please Type Student Id");
                $('#students_searched_data').fadeOut();
              }
            });

            $(document).on('click', '.student_id_grabber', function(event) {
              event.preventDefault();
              var student_id = $(this).attr('id');
              $('#search_student_id').val(student_id);
              $('#student_id').val(student_id);
              $('#students_searched_data').fadeOut();
              load_documents(student_id);
            });

            function load_documents(student_id) {
              $('#displayDocuments').html('');
              $.ajax({
                url: './AdmissionAddDocuments_2.php',
                method: 'get',
                data: {
                  'getAllDocuments': 1,
                  'student_id': student_id
                },
                success: function(data) {
                  $('#displayDocuments').fadeIn('slow');
                  $('#displayDocuments').html(data);
                }
              });
            }

            $(document).on('click', '.deleteDocuments', function(e) {
              e.preventDefault();
              if (confirm("Are You Sure To Delete?")) {
                const docId = $(this).attr('id');
                const stidentId = $('#search_student_id').val();
                $.ajax({
                  url: './AdmissionAddDocuments_2.php',
                  method: 'post',
                  data: {
                    'deleteDocument': 1,
                    'docId': docId
                  },
                  success: function(data) {
                    alert("Data Deleted Successfully");
                    load_documents(stidentId);
                    $('#element_no').html(data);
                  }
                });
              } else {
                return false;
              }
            });

            $(document).on('submit', '#admission_documents', function(e) {
              event.preventDefault();
              const student_id = $('#student_id').val();
              if (student_id == '') {
                alert("Please Fill Student Id");
              } else {
                $.ajax({
                  url: $(this).attr('action'),
                  method: 'post',
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  success: function(data) {
                    $('#form_output').html(data);

                    load_documents(student_id);
                  }
                });
              }
            });
          });
        </script>
        <?php require_once './includes/closebody.php'; ?>