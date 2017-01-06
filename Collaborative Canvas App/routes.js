
var gravatar = require('gravatar');

//Here we define the endpoints , url handler
// array of all lines drawn
var line_history = [];
module.exports = function(app,io){
  app.get('/home', function(req, res){

    //on the default page , host the views/home.htmls
    res.render('home');
  });

  app.get('/', function(req, res){
    res.render('index');
  });

  app.get('/canvas', function(req, res){
    res.render('canvas');
  });

  app.get('/create', function(req, res){

    //Generate roomID for the room, however I would like to take the user Input for room name
    var id = Math.round((Math.random() * 10000000));
    res.redirect('/chat/'+id);
  });

  app.get('/chat/:id', function(req, res){
    //the chat page
    res.render('chat');
  });

  // array of all lines drawn
  var line_history = [];
  var radius = 10;

  var chat = io.on('connection', function (socket){

    // first send the history to the new client
    for (var i in line_history) {
       socket.emit('draw_line', { line: line_history[i] } );
    }

    socket.emit('radius', {radius: radius});

    // add handler for message type "draw_line".
    socket.on('draw_line', function (data) {
       // add received line to history
       line_history.push(data.line);
       // send line to all clients
       io.emit('draw_line', { line: data.line });
    });

    socket.on('clear', function(data){
      console.log(data);
      line_history = [];
      io.emit('clear', data);
    });
    socket.on('color', function(data){
      console.log(data);
      io.emit('color', data);
    });
    socket.on('disengage', function(data){
      console.log(data);
      io.emit('disengage', data);
    });
    socket.on('radius', function(data){
      console.log(data);
      radius = data.radius;
      io.emit('radius', data);
    });

    socket.on('load', function(data){
      var room = findClientsSocket(io, data);
      if(room.length === 0){
        socket.emit('peopleinchat', {number: 0});
      }
      else if(room.length === 1){
        socket.emit('peopleinchat', {
          number: 1,
          user: room[0].username,
          avatar: room[0].avatar,
          id:data
        });
      }
      else if(room.length >= 2){
        chat.emit('tooMany', {boolean: true});
      }
    });

    socket.on('login', function(data){

      var room = findClientsSocket(io, data.id);
      //Right now only two people in a room
      if(room.length < 2){

        //Using the socket object to save data,
        //Each client gets a unique id
        //Later will switch over to MEAN stack , and save to MongoDB
        socket.username = data.user;
        socket.room = data.id;
        socket.avatar = gravatar.url(data.avatar, {s:'140', r: 'x', d:'mm'});

        //Tell the person what the user should use as an avatar
        socket.emit('img', socket.avatar);

        for (var i in line_history) {
          socket.emit('draw_line', { line: line_history[i] } );
        }

       // add handler for message type "draw_line".
       socket.on('draw_line', function (data) {
            // add received line to history
            line_history.push(data.line);
            // send line to all clients
            io.emit('draw_line', { line: data.line });
        });

        //Add the client to the room
        socket.join(data.id);
        if(room.length == 1){
          var usernames = [],
            avatars = [];

          usernames.push(room[0].username);
          usernames.push(socket.username);

          avatars.push(room[0].avatar);
          avatars.push(socket.avatar);

          //Send the startChat event to all the people in the
          //room and also the list of people in it , currently only two
          //but will add MongoDB support to it

          chat.in(data.id).emit('startChat',{
            boolean: true,
            id: data.id,
            users: usernames,
            avatars: avatars
          });
        }
      }
      else{
        socket.emit('tooMany', {boolean: true});
      }
    });

    //When someone leaves chat
    socket.on('disconnect', function(){
      //Notify other people that one of their
      //mates has left
      socket.broadcast.to(this.room).emit('leave',{
        boolean: true,
        room: this.room,
        user: this.username,
        avatar: this.avatar
      });

      //Handle the sending of messages
      socket.on('msg', function(data){
        socket.broadcast.to(socket.room).emit('receive', {msg: data.msg,
          user:data.user, img:data.img});
      });
    });
  });
};
  function findClientsSocket(io, roomId, namespace){
    var res = [],
    ns = io.of(namespace || "/");   //The default namespace is "/"

    if (ns){
      for(var id in ns.connected){
        if(roomId){
          var index = ns.connected[id].rooms.indexOf(roomId);
          if(index != -1){
            res.push(ns.connected[id]);
          }
        }
        else{
          res.push(ns.connected[id]);
        }
      }
    }
    return res;
  }
