const clear_canvas = document.querySelector('.clear_canvas');
const strokeWeight = document.querySelector('#brushSize');
const strokeColor = document.querySelector('#colorPicker');
const highlighter = document.querySelector('.highlighter');
const alphaTrValue = document.querySelector('.alphaValue');
const canvas = document.getElementById('canvas')
let ctx = canvas.getContext('2d');
let isDrawing = false;

clear_canvas.addEventListener('click', clearCanvas);

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', drawing);
canvas.addEventListener('mouseup', stopDrawing);
window.addEventListener('resize', resizeCanvas);

highlighter.addEventListener('click', toggleValue);
function toggleValue(){
  var alphaValue = document.querySelector('.alphaValue').value;
  if (alphaValue == '1') {
    document.querySelector('.alphaValue').value = 0.1;
  }
  else{
    document.querySelector('.alphaValue').value = 1;
  }
}

function resizeCanvas(){
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

resizeCanvas();


function startDrawing(e){
  isDrawing = true;
  drawing(e);
}
function drawing({clientX: x, clientY: y}){
  if (!isDrawing) return;
  ctx.lineWidth = strokeWeight.value;
  ctx.lineCap = "round";
  ctx.strokeStyle = strokeColor.value;
  ctx.globalAlpha = alphaTrValue.value;
  ctx.lineTo(x,y);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(x,y);
}

function clearCanvas(){
 // ctx.save();
  //ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.clearRect(0, 0, canvas.width, canvas.height);
 // ctx.restore();
}

function stopDrawing(e){
  isDrawing = false;
  ctx.beginPath();
}