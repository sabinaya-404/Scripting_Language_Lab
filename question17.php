<!DOCTYPE html>
<html>
<head>
    <title>Add If</title>
</head>
<body>

<h2>Add "if" to String</h2>

<form method="post">

    Enter String:
    <input type="text" name="text" required>

    <input type="submit" value="Process">

</form>

<?php

function addIf($str) {

    if (substr($str, 0, 2) == "if") {
        return $str;
    }

    return "if " . $str;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $result = addIf($text);

    echo "<h3>Result</h3>";
    echo "Original String: " . $text . "<br>";
    echo "New String: " . $result;
}

?>

</body>
</html>