<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login with Session and Cookie</title>
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
            $_SESSION['user'] = $username;
            setcookie("user", $username, time() + 3600);

            echo "<h3>Welcome, $username</h3>";
            echo "Session set: " . $_SESSION['user'] . "<br>";
            echo "Cookie set: " . $username;
        } else {
            echo "<h3>Invalid username or password</h3>";
        }
    }
    ?>
</body>
</html>