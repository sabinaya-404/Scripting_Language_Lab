<!DOCTYPE html>
<html>
<head>
    <title>Find String Index</title>
</head>
<body>

<h2>Find Index of a String</h2>

<form method="post">

    Enter Array Elements:
    <input type="text" name="array" required>
    <br><br>

    Enter String to Search:
    <input type="text" name="search" required>
    <br><br>

    <input type="submit" value="Search">

</form>

<?php

function findIndex($array, $string) {
    return array_search($string, $array);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $array = explode(",", $_POST["array"]);
    $array = array_map("trim", $array);

    $search = trim($_POST["search"]);

    $index = findIndex($array, $search);

    echo "<h3>Result</h3>";

    if ($index !== false) {
        echo "Array: ";
        echo implode(", ", $array) . "<br>";

        echo "String: " . $search . "<br>";
        echo "Index: " . $index;
    } else {
        echo "String not found in the array.";
    }
}

?>

</body>
</html>