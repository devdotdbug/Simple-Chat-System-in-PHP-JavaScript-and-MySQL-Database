$(document).ready(function(){
    $("#chat_message_submit").click(function(){
        let message = $("#message_textarea").val();
        let chat_id = "";
        $.post(
            "messenger.php",
            {},
            function(value, status, xhr){

            }
        );
    });
});