<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "admin" && $password == "admin123") {
        $msg = "Login successful";
    } else {
        $msg = "Invalid username or password";
    }
    echo "<h3>$msg</h3>";
}
?>
</body>
</html>