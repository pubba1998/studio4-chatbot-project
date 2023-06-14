<?php
$apiKey = $_SERVER['API_KEY']?? getenv('API_KEY'); // Assuming the environment variable is set in the server configuration
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chatbot Chatting Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        
        .chatbot-container {
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: 20px;
            transform: translate(-50%, -50%);
            width: 800px;
            max-width: 90%;
            height: 800px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .chatbot-header {
            padding: 20px;
            background-image: linear-gradient(to right, rgb(219, 96, 219), rgb(29, 29, 228));
            border-bottom: 1px solid #ccc;
            color: while;
            text-align: center;
        }
        
        .chatbot-header h3 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        
        .chat-body {
            margin-top: 50px;
            padding: 20px;
            overflow-y: scroll; /* Add scroll behavior */
            height: 550px; /* Set a fixed height */
        }
        
        .message {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .message .text {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            max-width: 70%;
            margin-left: 10px;
        }

        .message.other {
            align-items: flex-start;
        }

        .message.other .text {
            background-color: #8f45de;
            color: while;
        }
        
        .chat-input-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-top: 1px solid #ccc;
        }
        
        .chat-input {
            flex: 1;
            padding: 8px 12px;
            font-size: 16px;
            border: none;
            margin-top: 20px;;
            border-radius: 4px;
            outline: none;
        }
       
        button {
            font-size: 18px;
            display: inline-block;
            outline: 0;
            border: 0;
            cursor: pointer;
            will-change: box-shadow,transform;
            background: radial-gradient( 100% 100% at 100% 0%, #89E5FF 0%, #5468FF 100% );
            box-shadow: 0px 0.01em 0.01em rgb(45 35 66 / 40%), 0px 0.3em 0.7em -0.01em rgb(45 35 66 / 30%), inset 0px -0.01em 0px rgb(58 65 111 / 50%);
            padding: 0 2em;
            border-radius: 0.3em;
            color: #fff;
            height: 2.6em;
            text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
            transition: box-shadow 0.15s ease, transform 0.15s ease;
        }
        
        button:hover {
            box-shadow: 0px 0.1em 0.2em rgb(45 35 66 / 40%), 0px 0.4em 0.7em -0.1em rgb(45 35 66 / 30%), inset 0px -0.1em 0px #3c4fe0;
            transform: translateY(-0.1em);
        }
        
        button:active {
            box-shadow: inset 0px 0.1em 0.6em #3c4fe0;
            transform: translateY(0em);
        }
        
        .send-button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .send-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="chatbot-container">
        <div class="chatbot-header">
            <h3>Chatbot</h3>
        </div>
        <div class="chat-body">
        
        </div>

        <div class="chat-input-container">
            <input type="text" id="chat-input" class="chat-input" placeholder="Type your message..." />
            <button id="send-button" class="send-button">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var inputBox = document.querySelector('#chat-input');
            var chatBody = document.querySelector('.chat-body');
            var conversationHistory = [];

          
            function sendMessage() {
                var messageInput = $("#chat-input");
                var message = messageInput.val().trim();
                if (message !== '') {
                    var messageContainer = document.createElement('div');
                    messageContainer.classList.add('message');
                    messageContainer.innerHTML = `
                        <div class="text">${message}</div>
                    `;
                    chatBody.appendChild(messageContainer);
                    inputBox.value = '';
                }

                conversationHistory.push({ 'role': 'user', 'content': message });

             
                getChatbotResponse(message);
            }

            function botSendMessage(message) {
                if (message !== '') {
                    var messageContainer = document.createElement('div');
                    messageContainer.classList.add('message', 'other');
                    messageContainer.innerHTML = `
                        <div class="text">${message}</div>
                    `;
                    chatBody.appendChild(messageContainer);
                    chatBody.scrollTop = chatBody.scrollHeight; 
                }
            }

            
            function getChatbotResponse(message) {
                // var apiKey = ''; 
                var endpoint = 'https://api.openai.com/v1/chat/completions';
                var model = 'gpt-3.5-turbo';

            
                var data = {
                    'messages': conversationHistory,
                    'model': model
                };

        
                var headers = {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + apiKey
                };

         
                $.post({
                    url: endpoint,
                    headers: headers,
                    data: JSON.stringify(data),
                    success: function (response) {
                        var chatbotResponse = response.choices[0].message.content;

                        conversationHistory.push({ 'role': 'assistant', 'content': chatbotResponse });

                        botSendMessage(chatbotResponse);
                    }
                });
            }

            
            $("#send-button").click(sendMessage);


            $("#chat-input").keypress(function (event) {
                if (event.which === 13) {
                    sendMessage();
                }
            });
        });
    </script>
    <script>
    var apiKey = '<?php echo $apiKey; ?>';
    // Now you can use the apiKey variable in your JavaScript code
    </script>
</body>
</html>
