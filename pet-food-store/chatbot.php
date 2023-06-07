<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiKey = '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'; // Replace with your actual OpenAI API key
    $endpoint = 'https://api.openai.com/v1/chat/completions';
    $model = 'gpt-3.5-turbo';

        $messages = json_decode($_POST['messages'], true);
    
        // Prepare the data payload
        $data = array(
            'messages' => $messages,
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
    
            $chatbotReply = '';
    
            foreach ($responseData['choices'] as $choice) {
                if (isset($choice['message']['content'])) {
                    $chatbotReply .= $choice['message']['content'];
                }
            }
    
            echo $chatbotReply;
            
        }
    }
    ?>
    