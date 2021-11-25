// const express = require('express');
// var app = require('express')();
// var http = require('http').Server(app);
// // var https = require('https').createServer(options, app);
// var server = http;
// var io = require('socket.io')(server);
// var port = process.env.PORT || 1000;


// const server = require('http').createServer();
// const io = require('socket.io')(server);
// io.on('connection', client => {
//   client.on('event', data => { /* … */ });
//   client.on('disconnect', () => { /* … */ });
// });
// server.listen(1000);

// server.listen(port, function () {
//     console.log('listening on *:' + port);
// });

// const express = require('express');
// const app = express();

// const server = require('http').createServer(app);

const app = require('express')();
const http = require('http').Server(app);
var cors = require('cors')
const io = require('socket.io')(http, {
    cors: {
        origin: "*",
    }
});
//require('dotenv').config()
var mysql = require('mysql');
// const fetch = require('node-fetch')
//const config = require('config');
const { emit } = require('process');
const port = process.env.PORT || 2000;
//  var url = "http://localhost:1000";

app.use(cors())

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
  });
// const io = require('socket.io')(server, {
//     cors: { origin: "*"}
// });

io.on('connection', (socket) => {
    console.log('abc');

    socket.on('JobChatRoom', function (data) {
        console.log(data);
        socket.join("JobChatRoom"+data)
       socket.emit('JobChatRoom', { 'data': 'Joined successfully','data':data })
     });

     socket.on('disconnectJobRoom', function (data) {
        socket.leave(data)
        socket.emit('disconnectJobRoom', { 'data': 'Left successfully' })
      });

      socket.on('refresh', function (data) {
        console.log(data);
        socket.broadcast.emit('refresh', data)
      });

    socket.on('sendmessage', (message) => {
        console.log(message+'-------');
        // io.socket.emit('sendChatToClient', message);
    })

    socket.on('disconnectJobChatRoom', function (data) {
        console.log('Chat left successfully');
      socket.leave("JobChatRoom"+data.chat_relation_id)
      socket.emit('disconnectJobChatRoom', { status:200 , 'message':'Chat left successfully' ,'data':{} })
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

http.listen(port, () => {
    console.log('connected');
});
