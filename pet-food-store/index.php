<?php
$apiKey = $_SERVER['API_KEY']?? getenv('API_KEY'); // Assuming the environment variable is set in the server configuration
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/chatbot.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-6uRpkzL3jSP4zwtsu3V0EmBDTGXhqW5PT5SzVcEhPvdnwwMF8GWW2yC9iOhpC1h2HsRrXnZVyt/fqSyUYbqR4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="member.php">Login</a>
        <a href="cart.php">Shopping cart</a>
    </nav>
    <div>
        <h1>Pet Ruff</h1>
        <h2>Your pets' favourite place</h2>
    </div>
</header>

<section>
    <div class="container">
        <h3>Best place for all your pets needs</h3>
        <p>
            All your pet need from food to health care for every need we bring the best quality products and service to your fingertip.
        </p>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <h3>Cat Food</h3>
                <a href="catFood.php"><img src="images/cat_food.jpg" class="imgFood"></a>
                <p>10% all cat food items</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Dog Food</h3>
                <a href="dogFood.php"><img src="images/dog_food.jpg" class="imgFood"></a>
                <p>20% on selected items</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Bird Food</h3>
                <a href="birdFood.php"><img src="images/bird_food.jpg" class="imgFood"></a>
                <p>Buy one Pack and get one free</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Fish Food</h3>
                <a href="fishFood.php"><img src="images/fish_food.jpg" class="imgFood"></a>
                <p>Discounts over $20 purchases</p>
            </div>
        </div>
    </div>
</section>

<footer>
    <br>
    <p>Author: Pudubu Dasun<br>
        <a href="mailto:info@petruff.com">info@petruff.com</a></p>
</footer>



 <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .chat-window {
            position: absolute;
            top: 60%;
            left: 80%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 500px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            resize: both;
            min-width: 300px;
            min-height: 300px;
            max-width: 800px;
            max-height: 800px;
            display: none;
        }
        #toggle-chat{
            position: absolute;
            top: 10%;
            left: 90%;
            width: 100px;
            height: 40px;
        }

        .chat-header {
            background-color: #bdb9b9;
            color: #011627;
            padding: 15px;
            cursor: move;
        }

        .chat-body {
            height: calc(100% - 130px);
            padding: 15px;
            overflow-y: scroll;
        }

        .chat-footer {
            height: 70px;
            padding: 15px;
            background-color: #f7f7f7;
            border-top: 1px solid #ccc;
            display: flex;
            align-items: center;
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
        }

        .message.other {
            align-items: flex-start;
        }

        .message.other .text {
            background-color: #8f45de;
            color: while;
        }

        input[type="text"] {
            flex: 1;
            height: 40px;
            padding: 10px;
            border: none;
            border-radius: 20px;
            background-color: #eee;
            margin-right: 10px;
        }

        button {
            height: 40px;
            padding: 0 20px;
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>


<button id="toggle-chat">Chat</button>

 <div class="chat-window" id="chat-window">
        <div class="chat-header">chat window</div>
        <div class="chat-body">
         
        </div>
        <div class="chat-footer">
            <input type="text" placeholder="Enter information....">
            <button id="send-btn">send NOW</button>
        </div>
    </div>


    <script>
       
        var chatWindow = document.querySelector('.chat-window');
        var isDragging = false, isResizing = false;
        var lastX, lastY, startX, startY;

        chatWindow.addEventListener('mousedown', function (e) {
            if (e.target.classList.contains('chat-header')) {
                isDragging = true;
                lastX = e.clientX;
                lastY = e.clientY;
            } else if (e.target.classList.contains('chat-footer')) {
                isResizing = true;
                startX = e.clientX;
                startY = e.clientY;
            }
        });
        
        chatWindow.addEventListener('mousemove', function (e) {
            if (isDragging) {
                var deltaX = e.clientX - lastX;
                var deltaY = e.clientY - lastY;
                var currentX = parseInt(getComputedStyle(chatWindow).left);
                var currentY = parseInt(getComputedStyle(chatWindow).top);
                chatWindow.style.left = (currentX + deltaX) + 'px';
                chatWindow.style.top = (currentY + deltaY) + 'px';
                lastX = e.clientX;
                lastY = e.clientY;
            } else if (isResizing) {
                var deltaX = e.clientX - startX;
                var deltaY = e.clientY - startY;
                var newWidth = chatWindow.offsetWidth + deltaX;
                var newHeight = chatWindow.offsetHeight + deltaY;
                if (newWidth > parseInt(getComputedStyle(chatWindow).minWidth) && newWidth < parseInt(getComputedStyle(chatWindow).maxWidth)) {
                    chatWindow.style.width = newWidth + 'px';
                }
                if (newHeight > parseInt(getComputedStyle(chatWindow).minHeight) && newHeight < parseInt(getComputedStyle(chatWindow).maxHeight)) {
                    chatWindow.style.height = newHeight + 'px';
                }
                startX = e.clientX;
                startY = e.clientY;
            }
        });
       
        chatWindow.addEventListener('mouseup', function (e) {
            isDragging = false;
            isResizing = false;
        });

        var sendBtn = document.getElementById('send-btn');
        var chatBody = document.querySelector('.chat-body');

        sendBtn.addEventListener('click', sendMessage);

        
        var inputBox = document.querySelector('input[type="text"]');
        inputBox.addEventListener('keydown', function (event) {
            if (event.keyCode === 13) { 
                event.preventDefault(); 
                sendMessage(); 
            }
        });
        function sendMessage() {
    var inputText = inputBox.value.trim();
    if (inputText !== '') {
        var messageContainer = document.createElement('div');
        messageContainer.classList.add('message');
        messageContainer.innerHTML = `
			<div class="text">${inputText}</div>
		`;
        chatBody.appendChild(messageContainer);
        inputBox.value = '';
    }
   
    getChatbotResponse(inputText, getChatHistory());
}


            
            function botSendMessage(message) {
            if (message !== '') {
                var messageContainer = document.createElement('div');
                messageContainer.classList.add('message'+'other');
                messageContainer.innerHTML = `
				<div class="text">${message}</div>
			`;
                chatBody.appendChild(messageContainer);
            }
        }
        function getChatHistory() {
    var messages = Array.from(chatBody.getElementsByClassName('message'));
    var chatHistory = [];

    messages.forEach(function (message) {
        var role = message.classList.contains('message-other') ? 'assistant' : 'user';
        var content = message.querySelector('.text').textContent;
        chatHistory.push({ 'role': role, 'content': content });
    });

    return chatHistory;
}

function getChatbotResponse(message, chatHistory) {
    // var apiKey ='';
    var endpoint = 'https://api.openai.com/v1/chat/completions';
    var model = 'gpt-3.5-turbo';

    var data = {
        'messages': chatHistory.concat([{ 'role': 'user', 'content': message }]),
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
            botSendMessage(chatbotResponse);
        }
    });
}

       
            const toggleButton = document.querySelector('#toggle-chat');
            const chatWindows = document.querySelector('#chat-window');
            toggleButton.addEventListener('click', () => {
                    if (chatWindows.style.display === 'none') {
                            chatWindows.style.display = 'block';
                            } else {
                                chatWindows.style.display = 'none';
                        }});
</script>

<script>
    var apiKey = '<?php echo $apiKey; ?>';
    // Now you can use the apiKey variable in your JavaScript code
</script>
<script src="js/chatbot.js"></script>

</body>
</html>
