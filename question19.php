<!DOCTYPE html>
<html>
<head>
    <title>Add Last Character</title>
</head>
<body>

<h2>Add Last Character to Front and Back</h2>

<form method="post">

    Enter String:
    <input type="text" name="text" minlength="1" required>

    <input type="submit" value="Process">

</form>

<?php

function addLastChar($str) {

    $lastChar = substr($str, -1);

    return $lastChar . $str . $lastChar;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $result = addLastChar($text);

    echo "<h3>Result</h3>";
    echo "Original String: " . $text . "<br>";
    echo "New String: " . $result;
}

?>

</body>
</html>