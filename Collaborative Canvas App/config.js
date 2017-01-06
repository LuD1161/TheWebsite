var express = require('express');
module.exports = function(app, io){

  //set .html as the default template extension
  app.set('view engine', 'html');

  //Initialize the ejs template engine
  app.engine('html', require('ejs').renderFile);

  //The directory where views are saved
  app.set('views', __dirname + '/views');

  //Make the files in public directory available to the world
  app.use(express.static(__dirname + '/public'));

};
