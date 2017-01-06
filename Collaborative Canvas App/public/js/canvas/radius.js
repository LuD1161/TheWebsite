
socket.on('radius',function(data){
  var radius = data.radius;
  setRadius(radius);
});

var setRadius = function(newRadius){
  if(newRadius<minRad)  newRadius = minRad;
  else if (newRadius>maxRad) newRadius = maxRad;
  radius = newRadius;
  context.lineWidth = radius*2;
  radSpan.innerHTML = radius;
}

var minRad = 0.5,
    maxRad = 100,
    defaultRad = 10,
    interval = 5,
    radSpan = document.getElementById('radval'),
    decRad = document.getElementById('decrad'),
    incRad = document.getElementById('incrad');

incRad.addEventListener('click',function(){
  if(radius == 0.5) socket.emit('radius', {radius: 5});
  else socket.emit('radius', {radius: radius+interval});
});

decRad.addEventListener('click',function(){
  socket.emit('radius', {radius: radius-interval});
});

//setRadius(defaultRad);
//No Default radius should set , radius to be set as line_history
