<!DOCTYPE html>
<html>

<body>

<h2>Compare Length of Two Strings</h2>

<form method="post">

    Enter First String:
    <input type="text" name="str1" required>
    <br><br>

    Enter Second String:
    <input type="text" name="str2" required>
    <br><br>

    <input type="submit" value="Compare">

</form>

<?php

function compareLength($str1, $str2) {
    return strlen($str1) == strlen($str2);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $str1 = $_POST["str1"];
    $str2 = $_POST["str2"];

    $result = compareLength($str1, $str2);

    echo "<h3>Result</h3>";
    echo "First String: " . $str1 . "<br>";
    echo "Second String: " . $str2 . "<br>";
    echo "Same Length: " . ($result ? "true" : "false");
}

?>

</body>
</html>