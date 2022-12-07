$(document).ready(function(){
    $('.chat-content').keyup( () => {
        let requestData = {
            'Username': $('#username').val(),
            'Password': $('#password').val(),
            'ChatContent': $('#chat-content').val()
        }
        $.ajax({
            type: "POST",
            url: "push.php",
            data: requestData.seralize(),
            success: response => {
                var jsonData = JSON.parse(response);

                //if the user is authenticated
                if(jsonData.success === "1"){
                    $('#retrieved-content').html(response);
                }
                else{
                    alert('Warning: User not found');
                }
            }
        });
    });
});