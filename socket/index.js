
const app = require('express')();
const http = require('http').Server(app);
var cors = require('cors')
const io = require('socket.io')(http, {
    allowEIO3: true,
    cors: {
        origin: "*",
    }
});

var mysql = require('mysql');
const { emit } = require('process');
const port = process.env.PORT || 2000;

app.use(cors())

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
  });
io.on('connection', (socket) => {
    socket.on('connectChatRoom', async function (relation_id) {
        socket.join("ChatRoom" + relation_id);
        console.log('connectChatRoom', relation_id);
        socket.emit('connectChatRoom', { status:200 , 'message':'Room Joined successfully' })
    });

    socket.on('disconnectChatRoom', async function (relation_id) {
        socket.leave("ChatRoom" + relation_id);
        console.log('disconnectChatRoom', relation_id);
        socket.emit('disconnectChatRoom', { status:200 , 'message':'Room Disconnected successfully' })
    });

    socket.on('sendMessage', function (data) {
        console.log('sendMessage', data);
        io.to("ChatRoom" + data.relation_id);
    });
});

http.listen(port, () => {
    console.log('connected' + port);
});
