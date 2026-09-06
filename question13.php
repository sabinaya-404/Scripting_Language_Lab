<!DOCTYPE html>
<html>
<head>
    <title>Array Value Using Index</title>
</head>
<body>

<h2>Get Array Value Using Index</h2>

<form method="post">

    Enter Array Elements:
    <input type="text" name="array" required>
    <br><br>

    Enter Index:
    <input type="number" name="index" min="0" required>
    <br><br>

    <input type="submit" value="Find Value">

</form>

<?php

function getValue($array, $index) {
    return $array[$index];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $array = explode(",", $_POST["array"]);
    $array = array_map("trim", $array);

    $index = $_POST["index"];

    echo "<h3>Result</h3>";

    if (isset($array[$index])) {

        $value = getValue($array, $index);

        echo "Array: ";
        echo implode(", ", $array) . "<br>";

        echo "Index: " . $index . "<br>";
        echo "Value: " . $value;

    } else {
        echo "Invalid index.";
    }
}

?>

</body>
</html>