var canvas = document.getElementById('can');
var context = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var prevX,prevY,currY,currX;
var radius = 7;
var dragging = false;
context.lineWidth=radius*2;
var putPoint = function(e){
  if(dragging){
    context.lineTo(e.clientX,e.clientY);
    context.stroke();
    context.beginPath();
    context.arc(e.clientX,e.clientY,radius,0, Math.PI*2);
    context.fill();
    context.beginPath();
    context.moveTo(e.clientX,e.clientY);

    context.closePath();
  }
}

var engage = function(e){
  dragging = true;
  putPoint(e);
}
var disengage = function(){
  dragging = false;
  context.beginPath();
}

var checkDown = function(){
  if(engage)  putPoint;
}

canvas.addEventListener('mousedown',engage);
canvas.addEventListener('mouseup',disengage);
canvas.addEventListener('mousemove',putPoint);
canvas.addEventListener('mouseleave',disengage);
canvas.addEventListener('mouseenter',checkDown);
