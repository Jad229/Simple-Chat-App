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
                $('#retrieved-content').text(response);
            } else if(response !== 1){
                messageLog.text("Invalid Credentials");
                messageLog.css("color" , "red");
            }
        });
    });
});