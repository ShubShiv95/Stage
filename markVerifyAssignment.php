<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
    <div class="col-md-2">
      <div class="row">
        <div class="col-md-4 text-right"><label>Color</label></div>
        <div class="col-md-8"><input type="color" value="#E01010" class="form-control" id="colorPicker"></div></div>
      </div>  
      
    <div class="col-md-4"><label>Brush Size </label><input type="range" value="5"  min="5" max="50" id="brushSize"> <label for="">Type</label> <button class="btn btn-sm btn-warning highlighter"><i class="fas fa-highlighter"></i></button> <input type="number" class="alphaValue" value="1" style="display: none;"> </div>
    <div class="col-md-4"><label>Action</label> 
    <button class="btn btn-danger btn-sm clear_canvas"><i class="fas fa-times"></i></button>
    <button class="btn btn-success btn-sm btnPrevious" id="btnPrevious"><i class="fas fa-fast-backward"></i></button> 
    <button class="btn btn-success btn-sm btnNext" id="btnNext"><i class="fas fa-fast-forward "></i></button>
    <button class="btn btn-primary btn-sm saveDatatoServer" id=""><i class="fas fa-save"></i></button>
    </div>
    <div class="col-md-2" id="save_msg"><span id="currentPages">1</span> Of <span id="totalPages"><?php echo $_REQUEST['totalPages'] ?></span> Page</div>
  </div>
</div>
<!--<div id="load_student_assignments"></div>-->
<canvas id="canvas" style=" height:auto; background-repeat: no-repeat; width:100%"></canvas>
<script src="./js/canvasWorking.js"></script>
<script src="./js/jquery-3.3.1.min.js"></script>  
<script src="./js/htmlcanvas.js"></script>  

<script type="text/javascript">
$(document).ready(function(){
/* load one page into */
const currentPage = $('#currentPages').text();
loadPages(currentPage);
function loadPages(currentPage){
  const studentId = "<?php echo $_GET['userId']; ?>";
  const assignmentId = "<?php echo $_GET['assignmentId']; ?>";
  $.ajax({
    url : './VerifyAssignments_1.php',
    type : 'get',
    dataType : 'json',
    data : {'getAssignmentPages':1,'studentId':studentId,'assignmentId':assignmentId,'currentPage':currentPage},
    success : function(data){
      document.getElementById('canvas').style.backgroundImage = 'url(' +data.File_Path +data.File_Name + ')';
      var saveBtn = document.getElementsByClassName('saveDatatoServer')[0].setAttribute("id",data.File_Name);

    }
  });
}

  /* save current image on click */
  const btnSave = document.querySelector('.saveDatatoServer');
  btnSave.addEventListener('click', overWriteImage);
  function overWriteImage(){
    const studentId = "<?php echo $_GET['userId']; ?>";
    const assignmentId = "<?php echo $_GET['assignmentId']; ?>";
    const imageName = $(this).attr('id');
    //window.scrollTo(0,0);
    html2canvas(document.getElementById('canvas')).then(function(canvasData){
      const newImage = canvasData.toDataURL("image/jpeg",0.9);
      $.ajax({
          url : './VerifyAssignments_1.php',
          type : 'post',
          data : {'overWriteImage':1,'imageName':imageName,'studentId':studentId,'assignmentId':assignmentId,'newImage':newImage},
           dataType : 'json',
          success : function(data){
            location.reload();
            const currentPage = $('#currentPages').text();
            loadPages(currentPage);
          }
      });
    });
  }

  /* previous page */
  var previousPage = document.getElementById('btnPrevious');
  previousPage.addEventListener('click',gotopreviousPage);
  function gotopreviousPage(){
    var currentPages = $('#currentPages').text();
    if(currentPages >1){
      previousPage = parseInt(currentPages)-1;
      $('#currentPages').text(previousPage);
      clearCanvas();
      loadPages(previousPage);
    }
    else{
      alert("You Are On First Page");
    }
  }

  /* Next page */
  var nextPagebtn = document.getElementById('btnNext');
  nextPagebtn.addEventListener('click', gotoNextPage);
  function gotoNextPage(){
    var currentPages = $('#currentPages').text();
    var totalPages = $('#totalPages').text();
    
    if(totalPages >currentPages){
      nextPage = parseInt(currentPages)+1;
      $('#currentPages').text(nextPage);
      clearCanvas();
      loadPages(nextPage);
    }
    else{
      alert("You Are On Last Page");
    }
  }


});

</script>
</body>
</html>