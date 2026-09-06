<!DOCTYPE html>
<html>
<head>
    <title>Absolute Difference</title>
</head>
<body>

<h2>Calculate Difference from 51</h2>

<form method="post">

    Enter Number:
    <input type="number" name="n" required>

    <input type="submit" value="Calculate">

</form>

<?php

function calculateDifference($n) {

    $difference = abs($n - 51);

    if ($n > 51) {
        return $difference * 3;
    }

    return $difference;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = $_POST["n"];

    $result = calculateDifference($n);

    echo "<h3>Result</h3>";
    echo "Number: " . $n . "<br>";
    echo "Result: " . $result;
}

?>

</body>
</html>