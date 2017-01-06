var saveButton = document.getElementById('save');

saveButton.addEventListener('click', saveImage);

function saveImage(){
  var data = canvas.toDataURL();
  var win = window.open(data,'_blank','location=0, menubar=0,top=200,left=600,width=400,height=400');
  win.document.title = "Preview";

}
