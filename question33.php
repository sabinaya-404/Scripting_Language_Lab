<!DOCTYPE html>
<html>
<head>
    <title>Email Notification</title>
</head>
<body>
<h2>Send Email Notification</h2>
<form method="post">
    To: <input type="email" name="to" required><br><br>
    Subject: <input type="text" name="subject" required><br><br>
    Message: <textarea name="message" required></textarea><br><br>
    <input type="submit" value="Send">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: noreply@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h3>Email sent successfully to $to</h3>";
    } else {
        echo "<h3>Failed to send email</h3>";
    }
}
?>
</body>
</html>