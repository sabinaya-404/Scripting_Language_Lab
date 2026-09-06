<!DOCTYPE html>
<html>
<head>
    <title>Add First Three Characters</title>
</head>
<body>

<h2>Add First Three Characters</h2>

<form method="post">

    Enter String:
    <input type="text" name="text" required>

    <input type="submit" value="Process">

</form>

<?php

function addFirstThree($str) {

    $firstThree = substr($str, 0, 3);

    return $firstThree . $str . $firstThree;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $result = addFirstThree($text);

    echo "<h3>Result</h3>";
    echo "Original String: " . $text . "<br>";
    echo "New String: " . $result;
}

?>

</body>
</html>