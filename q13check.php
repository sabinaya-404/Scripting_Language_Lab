<?php

$conn = new mysqli("localhost", "root", "", "lab3test");

$username = $_POST["username"] ?? "";

$result = $conn->query(
    "SELECT * FROM users WHERE username='$username'"
);

if ($result->num_rows > 0)
    echo "Username already exists.";
else
    echo "Username is available.";

?>