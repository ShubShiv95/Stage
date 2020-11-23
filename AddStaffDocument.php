<?php
session_start();
$pageTitle = "Add Staff Documents";
require_once './includes/header.php';
?>
<div class="container">
  <div class="col-md-12 col-ld-12 col-12 shadow">
    <div class="card height-auto">
      <div class="card-body">
        <div class="heading-layout1">
          <form class="new-added-form school-form aj-new-added-form" id="staff_document_form" action="./AddStaffDocument_1.php" enctype="multipart/form-data" method="post">
            <div class="row justify-content-center">
              <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
                <div class="box-sedow">
                  <div class="brouser-image ">
                    <h5 class="text-center staff_Name">Add Document of <?php echo $_REQUEST['staff_name']; ?></h5>
                  </div>
                  <div class="row justify-content-center">
                    <input type="text" class="form-control d-none" name="document_sender">
                    <input type="text" name="staff_id" id="staff_id" class="form-control d-none" value="<?php echo $_GET['staff_id']; ?>">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                      <div class="form-group aj-form-group">
                        <label>Document Name <span>*</span> </label>
                        <input type="text" name="document_name" placeholder="" class="form-control">
                      </div>
                      <div class="form-group aj-form-group">
                        <label>Document </label>
                        <input type="file" name="document_file_name" placeholder="" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 form_output"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 col-12 doc_viewer"></div>
  </div>
  <?php
  require_once './includes/scripts.php';
  ?>
  <script type="text/javascript">
    $(document).ready(function() {

      /* load staff document */
      function load_staff_documents(staff_id) {
        $.ajax({
          url: './AddStaffDocument_1.php',
          type: 'get',
          data: {
            'getStaffDocument': 1,
            'staff_id': staff_id
          },
          dataType: 'json',
          success: function(response) {
            var doc_data = JSON.parse(JSON.stringify(response));
            console.log(doc_data.length);
            html_datas = '<table class="table table-responsive"><tr><th>Document Name</th><th>Action</th></tr>';
            for (let i = 0; i < doc_data.length; i++) {
              const act_data = doc_data[i];
              console.log(act_data.Document_Name);
              html_datas += '<tr><td>' + act_data.Document_Name + '</td><td><a class="btn btn-link btn-success" href="' + act_data.File_Path + '/' + act_data.File_Name + '" target="_blank"><i class="fas fa-eye"></i></a> <a href="#" class="btn btn-link btn-danger delete_document" id="' + act_data.Document_Id + '"><i class="fas fa-trash"></i></td></tr>';
            }
            html_datas += '</table>';
            $('.doc_viewer').html(html_datas);
          }
        });
      }
      /* submit staff document form */
      $(document).on('submit', '#staff_document_form', function(event) {
        event.preventDefault();
        const staff_id = "<?php echo $_GET['staff_id'] ?>";
        $.ajax({
          url: $(this).attr('action'),
          type: $(this).attr('method'),
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(data) {
            $('.form_output').html(data);
            $('#staff_document_form')[0].reset();
            load_staff_documents(staff_id);
          }
        });
      });

      /* delete staff document */
      $(document).on('click', '.delete_document', function(event) {
          event.preventDefault();
          if (confirm("Are You Sure To Delete")) {
            var document_id = $(this).attr('id');
            const staff_id = "<?php echo $_GET['staff_id'] ?>";
            $.ajax({
              url: './AddStaffDocument_1.php',
              type: 'post',
              data: {
                'deleteStaffDocument': 1,
                'document_id': document_id
              },
              success: function(data) {
                $('.form_output').html(data);
                load_staff_documents(staff_id);
              }
            });
          }
        });

    });
  </script>
  <?php
  include_once './includes/closebody.php';
  ?>