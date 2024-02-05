<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residence Support</title>
    <link rel="stylesheet" href="botstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

 
    <div class="wrapper">
        <div class="title">Residence Support Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <!--i class="fa fa-user"></i-->
                    <i class="fa fa-robot"></i>
                </div>
                <div class="msg-header">
                    <p>Hi there ! Residence Support here, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Enter your request here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // Scroll to the bottom to keep the latest message visible
                scrollChatToBottom();

                // Scroll to the "Typing..." indication
                scrollToResponseIndication();

                //added Simulate a delay before the bot's response
                var $loadingIndicator = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-robot"></i></div><div class="msg-header"><p>Res Supp.Typing...</p></div></div>';
                 $(".form").append($loadingIndicator);

                setTimeout(function(){
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        //added Remove the loading indicator
                        $(".form .bot-inbox:contains('Typing...')").remove();

                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
                // Scroll to the bottom again after adding the bot's message
                scrollChatToBottom();
                // Scroll to the "Typing..." indication
                scrollToResponseIndication();

            }, 1500); //added 1500 milliseconds(1.5second) delay
            });
        });
        // Function to scroll to the "Typing..." indication or the bot's response
        function scrollToResponseIndication() {
         $(".form").scrollTop($(".form")[0].scrollHeight);
        }
        // Function to scroll the chat container to the bottom
        function scrollChatToBottom() {
        var chatContainer = document.querySelector(".form");
        chatContainer.scrollTop = chatContainer.scrollHeight;
}
    </script>
    
</body>
</html>