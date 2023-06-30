var chatWindow = document.querySelector('.chat-window');
var isDragging = false, isResizing = false;
var lastX, lastY, startX, startY;
var apiKey = '<?php echo $apiKey; ?>';
    // Now you can use the apiKey variable in your JavaScript code
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