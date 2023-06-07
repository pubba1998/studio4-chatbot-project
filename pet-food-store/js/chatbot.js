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

    // Make the chatbot resizable
    $(".chatbot-container").resizable({
        handles: "n, e, s, w, ne, se, sw, nw"
    });

    // Make the chatbot draggable
    $(".chatbot-container").draggable();

    // Pop-out functionality
    var chatbotContainer = $(".chatbot-container");
    var popOutButton = $('<div class="pop-out-button"><i style="font-size: 24px" class="fas">&#xf086;</i></div>');

    popOutButton.click(function () {
        chatbotContainer.toggleClass("pop-out");

        // Hide the form when the chatbot is popped out
        if (chatbotContainer.hasClass("pop-out")) {
            $(".chat-input-container").hide();
        } else {
            $(".chat-input-container").show();
        }
    });

    chatbotContainer.prepend(popOutButton);

    // Resize functionality
    var resizer = $('<div class="resizer"></div>');
    chatbotContainer.prepend(resizer);

    resizer.on("mousedown", function (e) {
        e.preventDefault();
        $(document).on("mousemove", resize);
        $(document).on("mouseup", stopResize);
    });

    function resize(e) {
        chatbotContainer.css({
            width: e.pageX - chatbotContainer.offset().left,
            height: chatbotContainer.offset().top + chatbotContainer.outerHeight() - e.pageY
        });
    }

    function stopResize() {
        $(document).off("mousemove", resize);
        $(document).off("mouseup", stopResize);
    }
});
