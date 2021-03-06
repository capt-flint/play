var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(3000);
io.on('connection', function (socket) {
    console.log("client connected");
    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function(channel, data) {
        console.log("mew message add in queue "+ data['message'] + " channel");
        socket.emit(channel, data);
    });

    socket.on('disconnect', function() {
        console.log("client disconnect");
        redisClient.quit();
    });

});