<!DOCTYPE html>
<html>
<head>
    <title>Repeat Characters</title>
</head>
<body>

<h2>Repeat First Two Characters</h2>

<form method="post">

    Enter String:
    <input type="text" name="text" required>

    <input type="submit" value="Process">

</form>

<?php

function repeatCharacters($str) {

    if (strlen($str) < 2) {
        return $str;
    }

    $firstTwo = substr($str, 0, 2);

    return str_repeat($firstTwo, 4);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $result = repeatCharacters($text);

    echo "<h3>Result</h3>";
    echo "Original String: " . $text . "<br>";
    echo "New String: " . $result;
}

?>

</body>
</html>