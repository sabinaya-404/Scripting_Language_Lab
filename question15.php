<!DOCTYPE html>
<html>
<head>
    <title>Calculate Sum</title>
</head>
<body>

<h2>Calculate Sum of Two Numbers</h2>

<form method="post">

    Enter First Number:
    <input type="number" name="a" required>
    <br><br>

    Enter Second Number:
    <input type="number" name="b" required>
    <br><br>

    <input type="submit" value="Calculate">

</form>

<?php

function calculateSum($a, $b) {

    $sum = $a + $b;

    if ($a == $b) {
        return $sum * 3;
    }

    return $sum;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $a = $_POST["a"];
    $b = $_POST["b"];

    $result = calculateSum($a, $b);

    echo "<h3>Result</h3>";
    echo "First Number: " . $a . "<br>";
    echo "Second Number: " . $b . "<br>";
    echo "Result: " . $result;
}

?>

</body>
</html>