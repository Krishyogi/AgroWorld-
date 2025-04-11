<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost"; // MySQL Host
$user = "root"; // MySQL Username
$password = ""; // MySQL Password (default is empty)
$database = "Ai_Agriculture"; // Your database name

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// OpenRouter API Key (Replace with your key)
$openrouter_api_key = "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"; // Replace with your OpenRouter API Key
?>
