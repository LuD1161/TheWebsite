var colors = ['white','red','green','blue','black'];

for(var i=0,n=colors.length; i<n; i++){
  var swatch = document.createElement('div');
  swatch.className = 'swatch';
  swatch.style.backgroundColor = colors[i];
  swatch.addEventListener('click',setSwatch);
  document.getElementById('colors').appendChild(swatch);
}

socket.on('color', function(data){
  var event = data.event;
  var swatch = event[0];
  var color = event[1];
  setColor(color);
  console.log(swatch.length);
  swatch = document.getElementsByClassName('swatch');
  for (var i = 0; i < swatch.length; i++) {
    if(swatch[i].style.backgroundColor == color)
      {
        swatch.className += ' active';                 // give class name
        console.log(Object.keys(swatch[i]));
        swatch[i].className += ' active';                 // give class name
      }
      else {
        swatch[i].className = 'swatch';                 // give class name
      }
  }
});

function setColor(color){
    context.fillStyle = color;
    context.strokeStyle = color;
  }

function setSwatch(e){
    var swatch = e.target;                          //identify swatch
    socket.emit('color', { event: [ e.target ,swatch.style.backgroundColor] });
    swatch.className += ' active';                 // give class name
}

setSwatch({target: document.getElementsByClassName('swatch')[4]});
