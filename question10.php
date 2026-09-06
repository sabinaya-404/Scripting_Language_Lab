<!DOCTYPE html>
<html>

<body>

<h2>Find String Length</h2>

<form method="post">

    Enter a String:
    <input type="text" name="text" required>
    <input type="submit" value="Find Length">

</form>

<?php

function stringLength($str) {

    if ($str == "") {
        return 0;
    }

    return 1 + stringLength(substr($str, 1));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $length = stringLength($text);

    echo "<h3>Result</h3>";
    echo "String: " . $text . "<br>";
    echo "Length: " . $length;
}

?>

</body>
</html>