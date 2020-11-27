<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <title>SWIFTCAMPUS | Verify Assignment</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

</head>

<body>
  <div class="container mt-1">
    <div class="row">
      <div class="cpl-md-12 col-12 form_output"></div>
      <div class="col-md-4 col-6">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-4 text-right"><label>Color</label></div>
          <div class="col-md-8"><input type="color" value="#E01010" class="form-control" id="colorPicker" data-toggle="tooltip" data-placement="top" title="Choose Color"></div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-6">
        <label>Brush Size </label>
        <input type="range" value="5" min="5" max="50" id="brushSize" data-toggle="tooltip" data-placement="top" title="Brush Size">
        <label for="">Type</label>
        <button class="btn btn-sm btn-primary marker" data-toggle="tooltip" data-placement="top" title="Marker"><i class="fas fa-marker"></i></button>
        <button class="btn btn-sm btn-warning highlighter"><i class="fas fa-highlighter" data-toggle="tooltip" data-placement="top" title="Highlighter"></i><input type="number" class="alphaValue" value="1" style="display: none;">
      </div>

      <div class="col-md-6 col-6"><label>Action</label>
        <button class="btn btn-danger btn-sm clear_canvas" data-toggle="tooltip" data-placement="top" title="Clear All Mark"><i class="fas fa-times"></i></button>
        <button class="btn btn-success btn-sm btnPrevious" id="btnPrevious"><i class="fas fa-fast-backward"></i></button>
        <button class="btn btn-success btn-sm btnNext" id="btnNext"><i class="fas fa-fast-forward "></i></button>
        <button class="btn btn-warning btn-sm message" data-toggle="tooltip" data-placement="top" title="Notes For Students"><i class="fas fa-list"></i></button>
        <button class="btn btn-primary btn-sm saveDatatoServer" id="" data-toggle="tooltip" data-placement="top" title="Save Image"><i class="fas fa-save"></i></button>
      </div>

      <div class="col-md-6 col-6" id="save_msg"><span id="currentPages">1</span> Of <span id="totalPages"><?php echo $_REQUEST['totalPages'] ?></span> Page</div>
    </div>
  </div>
  <!--<div id="load_student_assignments"></div>-->
  <canvas id="canvas" style="background-repeat: no-repeat; width:100%;"></canvas>
 
  <!-- Modal -->
  <div class="modal" id="notes_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Notes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <form action="" method="post" id="add_notes">
            <input type="text" class="form-control form-group d-none imageName" id="">
            <textarea name="" id="message_texts" cols="30" rows="5" class="form-control form-group" placeholder="Write Notes Here"></textarea>
            <span id="remraks_output"></span>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" id="save_notes_btn">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./js/canvasWorking.js"></script>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/htmlcanvas.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      /* load one page into */
      const currentPage = $('#currentPages').text();
      loadPages(currentPage);

      function loadPages(currentPage) {
        const studentId = "<?php echo $_GET['userId']; ?>";
        const assignmentId = "<?php echo $_GET['assignmentId']; ?>";
        $.ajax({
          url: './VerifyAssignments_1.php',
          type: 'get',
          dataType: 'json',
          data: {
            'getAssignmentPages': 1,
            'studentId': studentId,
            'assignmentId': assignmentId,
            'currentPage': currentPage
          },
          success: function(data) {
            document.getElementById('canvas').style.backgroundImage = 'url(' + data.File_Path + data.File_Name + ')';
            var saveBtn = document.getElementsByClassName('saveDatatoServer')[0].setAttribute("id", data.File_Name);
            var saveBtn = document.getElementsByClassName('imageName')[0].setAttribute("id", data.File_Name);
          }
        });
      }

      /* save current image on click */
      const btnSave = document.querySelector('.saveDatatoServer');
      btnSave.addEventListener('click', overWriteImage);

      function overWriteImage() {
        const studentId = "<?php echo $_GET['userId']; ?>";
        const assignmentId = "<?php echo $_GET['assignmentId']; ?>";
        const imageName = $(this).attr('id');
        const totalPages = "<?php echo $_GET['totalPages']; ?>";
        var currentPages = $('#currentPages').text();
        $('#totalPages').text(totalPages);
        html2canvas(document.getElementById('canvas')).then(function(canvasData) {
          const newImage = canvasData.toDataURL("image/jpeg", 0.9);
          $.ajax({
            url: './VerifyAssignments_1.php',
            type: 'post',
            data: {
              'overWriteImage': 1,
              'imageName': imageName,
              'studentId': studentId,
              'assignmentId': assignmentId,
              'newImage': newImage
            },
            success: function(data) {
              $('.form_output').html(data);
              const currentPage = $('#currentPages').text();
              loadPages(currentPage);
              window.setTimeout(function(){
                $('.form_output').html('');
              },2000);
              if(currentPage == totalPages){
                final_submit();
              }
            }
          });
        });
      }

      /* previous page */
      var previousPage = document.getElementById('btnPrevious');
      previousPage.addEventListener('click', gotopreviousPage);

      function gotopreviousPage() {
        var currentPages = $('#currentPages').text();
        if (currentPages > 1) {
          previousPage = parseInt(currentPages) - 1;
          $('#currentPages').text(previousPage);
          clearCanvas();
          loadPages(previousPage);
        } else {
          alert("You Are On First Page");
        }
      }

      /* Next page */
      var nextPagebtn = document.getElementById('btnNext');
      nextPagebtn.addEventListener('click', gotoNextPage);

      function gotoNextPage() {
        var currentPages = parseInt($('#currentPages').text());
        var totalPages = parseInt($('#totalPages').text());
        
        if (totalPages > currentPages) {
          nextPage = currentPages + 1;
          $('#currentPages').text(nextPage);
          clearCanvas();
          loadPages(nextPage);
        } else {
          alert("You Are On Last Page");
        }
      }

      $('.message').click(function(){
        $('#notes_modal').fadeIn();
      });

      $('.close').click(function(){
        $('#notes_modal').fadeOut();
      });

      $('#save_notes_btn').click(function(){
        const image_name = $('#').attr('id');
        const message = $('#message_texts').text();
        $.ajax({
          url : './VerifyAssignments_1.php',
          type : 'post',
          data : {'save_remarks':1,'image_name':image_name,'message':message},
          success : function(data){
            $('#remraks_output').html(data);
          }
        });
      });

      /* final submit */
      function final_submit(){
        const assignmentId = "<?php echo $_REQUEST['assignmentId'] ?>";
        $.ajax({
          url : './VerifyAssignments_1.php',
          type : 'post',
          data : {'finsal_submit_asignment':1,'assignmentId':assignmentId},
          success : function(data){
            $('.form_output').html(data);
            window.setTimeout(function(){
                $('.form_output').html('');
              },2000);
          }
        });
      }
    });
  </script>
</body>

</html>