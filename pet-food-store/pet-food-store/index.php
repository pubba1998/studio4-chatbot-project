<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/chatbot.css">

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

    <div class="chatbot-container">
        <div class="chatbot-header">
            <h3>Chatbot</h3>
        </div>
        <div class="chatbot-body">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-input-container">
            <input type="text" id="chat-input" class="chat-input" placeholder="Type your message..." />
            <button id="send-button" class="send-button">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to add a new message to the chat
            function addMessage(sender, content) {
                var chatContainer = $(".chatbot-body");
                var senderClass = sender === "user" ? "user-message" : "chatbot-message";

                chatContainer.append('<div class="message ' + senderClass + '">' + content + '</div>');

                // Scroll to the bottom of the chat container
                chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
            }

            // Handle send button click or Enter key press
            function handleSendMessage() {
                var messageInput = $("#chat-input");
                var message = messageInput.val().trim();

                if (message !== "") {
                    addMessage("user", message);
                    messageInput.val("");
                    getChatbotResponse(message);
                }
            }

            // Get chatbot response from the API
            function getChatbotResponse(message) {
                // Make a POST request to the PHP file
                $.post("chatbot.php", {message: message}, function(response) {
                    addMessage("chatbot", response);
                });
            }

            // Bind send button click event
            $("#send-button").click(handleSendMessage);

            // Bind Enter key press event
            $("#chat-input").keypress(function(event) {
                if (event.which === 13) {
                    handleSendMessage();
                }
            });
        });
    </script>

</body>
</html>
