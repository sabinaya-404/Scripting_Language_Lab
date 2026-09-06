<!DOCTYPE html>
<html>
<body>
<h2>Add Two Numbers</h2>

<form method="post">
    Enter First Number:
    <input type="number" name="num1" step="any" required>
    <br><br>

    Enter Second Number:
    <input type="number" name="num2" step="any" required>
    <br><br>

    <input type="submit" value="Calculate">
</form>

<?php

function addNumbers($num1, $num2) {
    return $num1 + $num2;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    $sum = addNumbers($num1, $num2);

    echo "<h3>Result</h3>";
    echo "First Number: " . $num1 . "<br>";
    echo "Second Number: " . $num2 . "<br>";
    echo "Sum: " . $sum;
}

?>

</body>
</html>