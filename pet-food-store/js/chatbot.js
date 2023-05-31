$(document).ready(function () {
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

    // Get chatbot response from the server
    function getChatbotResponse(message) {
        // Make a POST request to the server
        $.post("chatbot.php", { message: message }, function (response) {
            addMessage("chatbot", response);
        });
    }

    // Bind send button click event
    $("#send-button").click(handleSendMessage);

    // Bind Enter key press event
    $("#chat-input").keypress(function (event) {
        if (event.which === 13) {
            handleSendMessage();
        }
    });

    // Pop-out functionality
    var chatbotContainer = $(".chatbot-container");
    var popOutButton = $('<button class="pop-out-button">Chat</button>');

    popOutButton.click(function () {
        chatbotContainer.toggleClass("pop-out");
    });

    chatbotContainer.prepend(popOutButton);
});
