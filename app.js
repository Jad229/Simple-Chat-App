$(document).ready(function(){
    $('#chat-content').keyup(() =>{
        console.log('key pressed');

        $.ajax({
            type: "POST",
            url: "push.php",
            data: {
                Username: $('#username').val(),
                Password: $('#password').val(),
                ChatContent: $('#chat-content').val()
            },
            dataType: "json"
        })
        .done(response => {
            let messageLog = $('#message-log');
            //if the user is authenticated
            if(response === 1){
                messageLog.text("Message Sent!");
                messageLog.css("color","green");
            } else{
                messageLog.text("Invalid Credentials");
                messageLog.css("color" , "red");
            }
        });
    });

    setInterval( () => {
        console.log('listening');

        $.ajax({
            type: "GET",
            url: "pull.php",
            data: {
                ContactName: $('#contact-name').val(),
            },
            dataType: "json"
        })
        .done(response => {
            let chatBox = $("#retrieved-content");

            if(response !== ''){
                chatBox.text(response);
            }
        });
    }, 2000);
});