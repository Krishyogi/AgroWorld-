<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

// 🔐 Load config
require "config.php";

if (!isset($conn)) {
    echo json_encode(["error" => "Database connection is not initialized."]);
    exit;
}
if (!isset($openrouter_api_key) || empty($openrouter_api_key)) {
    echo json_encode(["error" => "OpenRouter API Key is missing."]);
    exit;
}

// ✅ HISTORY FETCH
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["history"])) {
    $history = [];
    $result = $conn->query("SELECT message, response, language, created_at FROM chats ORDER BY created_at DESC LIMIT 10");

    while ($row = $result->fetch_assoc()) {
        $history[] = [
            "message" => $row["message"],
            "response" => $row["response"],
            "language" => $row["language"],
            "timestamp" => $row["created_at"]
        ];
    }

    echo json_encode(["chat_history" => $history]);
    exit;
}

// ✅ MAIN CHAT POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_message = trim($_POST["message"] ?? '');
    $selected_language = $_POST["language"] ?? "english";

    if (empty($user_message)) {
        echo json_encode(["error" => "Message cannot be empty"]);
        exit;
    }

    // 🔥 Get GPT Response
    $bot_response = getAgriBotResponse($user_message, $selected_language);

    if (!$bot_response) {
        echo json_encode(["error" => "Failed to get a response from AgriBot."]);
        exit;
    }

    // 💾 Save chat to DB
    $stmt = $conn->prepare("INSERT INTO chats (message, response, language) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo json_encode(["error" => "Database error: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("sss", $user_message, $bot_response, $selected_language);
    $stmt->execute();
    $stmt->close();

    echo json_encode(["response" => $bot_response, "language" => $selected_language]);
    exit;
}

// ✅ AGRIBOT INTELLIGENCE CORE
function getAgriBotResponse($user_input, $lang) {
    global $openrouter_api_key;

    $language_prompt = [
        "english" => "Respond only in English: ",
        "hindi" => "सिर्फ हिंदी में जवाब दें: ",
        "gujarati" => "ફક્ત ગુજરાતી ભાષામાં જવાબ આપો: ",
        "spanish" => "Responde solo en español: "
    ];

    $localized_intro = $language_prompt[$lang] ?? $language_prompt["english"];

    $agri_prompt = <<<EOT
{$localized_intro}
User Question: "{$user_input}"
EOT;

    $data = [
        "model" => "openai/gpt-3.5-turbo",
        "messages" => [
            [
                "role" => "system",
                "content" => "You are AgriBot, an AI farming assistant. Only answer questions about farming, agriculture, crops, soil, fertilizers, weather, and seasonal guidance. You are also allowed to respond politely to greetings such as 'hi', 'hello', 'how are you', and 'thank you'. If a user asks something unrelated to farming, politely reply: 'I'm here to assist with farming-related questions only.'"
            ],
            [
                "role" => "user",
                "content" => $agri_prompt
            ]
        ],
        "temperature" => 0.6
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
    if (!$result) return "⚠️ Error contacting OpenRouter API: " . curl_error($ch);

    curl_close($ch);
    $response_data = json_decode($result, true);

    return $response_data["choices"][0]["message"]["content"] ?? "⚠️ I couldn't understand the query.";
}

// ✅ Status ping
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode(["status" => "✅ AgriBot API is online"]);
}
?>
