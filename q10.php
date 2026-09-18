<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userid = $_POST["userid"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($userid === "admin" && $password === "1234") {
        echo "Login successful.";
    } else {
        echo "Invalid userid or password.";
    }

    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>AJAX Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Login</h2>

<form id="loginForm">
    <input type="text" id="userid" placeholder="User ID"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

<p id="result"></p>

<script>
$("#loginForm").submit(function(event) {
    event.preventDefault();

    $.post("login.php", {
        userid: $("#userid").val(),
        password: $("#password").val()
    }, function(response) {
        $("#result").text(response);
    });
});
</script>

</body>
</html>