<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $apiKey = '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'; // Replace with your actual OpenAI API key
  $endpoint = 'https://api.openai.com/v1/chat/completions';
  $model = 'gpt-3.5-turbo';

  $message = $_POST['message'];

  // Prepare the data payload
  $data = array(
    'messages' => array(
      array('role' => 'system', 'content' => 'You are a helpful assistant.'),
      array('role' => 'user', 'content' => $message)
    ),
    'model' => $model
  );

  // Prepare the headers
  $headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
  );

  // Make a POST request to the ChatGPT API
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $endpoint);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  curl_close($ch);

  // Handle the API response
  if ($response === false) {
    echo 'Error occurred.';
  } else {
    $responseData = json_decode($response, true);
    
    if (isset($responseData['choices'][0]['message']['content'])) {
      $chatbotReply = $responseData['choices'][0]['message']['content'];
      echo $chatbotReply;
    } else {
      echo 'Invalid response from the API';
    }
  }
}
?>
