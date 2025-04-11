<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "config.php"; // Load OpenRouter API key

$data = [
    "model" => "openai/gpt-3.5-turbo", 
    "messages" => [["role" => "user", "content" => "Hello, how are you?"]],
    "temperature" => 0.7
];

$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $openrouter_api_key",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$result = curl_exec($ch);
if (!$result) {
    die("cURL Error: " . curl_error($ch));
}
curl_close($ch);

echo "<pre>";
print_r(json_decode($result, true));
echo "</pre>";
?>
