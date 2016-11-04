var socket = io.connect( 'http://133.130.120.89:3000' );



$( "#messageForm" ).submit( function() {


    var nameVal = $( "#nameInput" ).val();
    var msg = $( "#messageInput" ).val();
    var receiver = $("#receiver").val();
    var passive = $( "#passive" ).val();
    var remessage = $( "#remessage" ).val();


    if(passive == receiver) {

        socket.emit('passive_message', {name: nameVal, message: msg, receive : remessage, open_check : open_check} );
    }
    else{

        var number = $("ul.messages > li").size();
        var open_check = true;

        if(number > 0){
            socket.emit('second_message', {name: nameVal, message: msg, receive : receiver, open_check : open_check});
        }
        else{
            //alert('name : ' + nameVal + 'receiver : ' + receiver);
            socket.emit('message', {name: nameVal, message: msg, receive : receiver, open_check : open_check} );
        }
    }



    return false;
});




