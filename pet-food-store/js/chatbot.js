 // Implement draggable and resizable chat window

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
// Mouse move event
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
// Mouse release event
 chatWindow.addEventListener('mouseup', function (e) {
     isDragging = false;
     isResizing = false;
 });

 // Send button click event
 var sendBtn = document.getElementById('send-btn');
 var chatBody = document.querySelector('.chat-body');

 sendBtn.addEventListener('click', sendMessage);

 // Listen for keyboard keydown event in the input field
 var inputBox = document.querySelector('input[type="text"]');
 inputBox.addEventListener('keydown', function (event) {
     if (event.keyCode === 13) { // If the pressed key is the Enter key
         event.preventDefault(); // Prevent default behavior
         sendMessage(); // Send message
     }
 });

// Send message
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
     // Call chatbot
     getChatbotResponse(inputText);
 }

   // Chatbot sends a message 
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
     // Get chatbot response from the API
     function getChatbotResponse(message) {
        $apiKey = $_SERVER['API_KEY']?? getenv('API_KEY');// Replace with your actual OpenAI API key
         var endpoint = 'https://api.openai.com/v1/chat/completions';
         var model = 'gpt-3.5-turbo';

         // Prepare the data payload
         var data = {
             'messages': [
                 { 'role': 'system', 'content': 'You are a helpful assistant.' },
                 { 'role': 'user', 'content': message }
             ],
             'model': model
         };

         // Prepare the headers
         var headers = {
             'Content-Type': 'application/json',
             'Authorization': 'Bearer ' + apiKey
         };

         // Make a POST request to the API
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
   // Show and hide the chat window
     const toggleButton = document.querySelector('#toggle-chat');
     const chatWindows = document.querySelector('#chat-window');
     toggleButton.addEventListener('click', () => {
             if (chatWindows.style.display === 'none') {
                     chatWindows.style.display = 'block';
                     } else {
                         chatWindows.style.display = 'none';
                 }});