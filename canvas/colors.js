var colors = ['red','green','blue','black']

for(var i=0,n=colors.length; i<n; i++){
  var swatch = document.createElement('div');
  swatch.className = 'swatch';
  swatch.style.backgroundColor = colors[i];
  swatch.addEventListener('click',setSwatch);
  document.getElementById('colors').appendChild(swatch);
}

function setColor(color){
  context.fillStyle = color;
  context.strokeStyle = color;
  var active = document.getElementsByClassName('active')[0];
  if(active){
    active.className = 'swatch';
  }
}

function setSwatch(e){
    var swatch = e.target;                          //identify swatch
    setColor(swatch.style.backgroundColor);        //set color and change the active element
    swatch.className += ' active';                 // give class name
}

setSwatch({target: document.getElementsByClassName('swatch')[4]});
