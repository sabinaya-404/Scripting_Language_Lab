<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Registration</h2>

<form id="registerForm">
    <input type="text" id="name" placeholder="Name"><br><br>
    <input type="email" id="email" placeholder="Email"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>
    <button type="submit">Register</button>
</form>

<p id="message"></p>

<script>
$("#registerForm").submit(function(event) {
    event.preventDefault();

    let name = $("#name").val().trim();
    let email = $("#email").val().trim();
    let password = $("#password").val();

    if (name === "" || email === "" || password === "") {
        $("#message").text("All fields are required.");
        return;
    }

    if (password.length < 6) {
        $("#message").text("Password must be at least 6 characters.");
        return;
    }

    $("#message").text("Registration successful.");
});
</script>

</body>
</html>