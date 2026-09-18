<!DOCTYPE html>
<html>
<head>
    <title>Username Check</title>
</head>
<body>

<h2>Check Username</h2>

<input type="text" id="username" placeholder="Username">
<button onclick="checkUsername()">Check</button>

<p id="result"></p>

<script>
function checkUsername() {
    let username = document.getElementById("username").value;
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "q13check.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        document.getElementById("result").innerText = xhr.responseText;
    };

    xhr.send("username=" + encodeURIComponent(username));
}
</script>

</body>
</html>