var canvas = document.getElementById('can');
var context = canvas.getContext('2d');
var width   = window.innerWidth;
var height  = window.innerHeight;

canvas.width = width;
canvas.height = height;

var mouse = {
   click: false,
   move: false,
   pos: {x:0, y:0},
   pos_prev: false
};

var prevX,prevY,currY,currX;
var radius = 7;
var dragging = false;
var socket  = io.connect();

context.lineWidth=radius*2;

// draw line received from server
socket.on('draw_line', function (data) {
   var line = data.line;
  //  console.log(line);
   context.lineTo(line[0],line[1]);
   context.stroke();
   context.beginPath();
   context.arc(line[0],line[1],radius,0, Math.PI*2);
   context.fill();
   context.beginPath();
   context.moveTo(line[0],line[1]);

   context.closePath();
});

socket.on('clear',function(data){
  console.log(data);
  context.clearRect(0, 0, canvas.width, canvas.height);
});

socket.on('disengage', function(){
  dragging = false;
  context.beginPath();    //will get rid of previous point
});

socket.on('engage', function(){
  dragging = true;
  putPoint(e);
});


var putPoint = function(e){
  if(dragging){
    socket.emit('draw_line', { line : [e.clientX, e.clientY] });
  }
}

var engage = function(e){
  dragging = true;
  putPoint(e);
}
var disengage = function(){
  dragging = false;
  context.beginPath();    //will get rid of previous point
}

canvas.addEventListener('mousedown',function(){
  socket.emit('engage', { fn : 'engage' });
  engage();
  });
canvas.addEventListener('mouseup',function(){
  socket.emit('disengage', { fn : 'disengage' });
  disengage();
  });
canvas.addEventListener('mousemove',putPoint);
canvas.addEventListener('mouseleave',disengage);
