<!DOCTYPE html>
<html>

<body>

<h2>Check Divisibility by 5</h2>

<form method="post">

    Enter an Integer:
    <input type="number" name="number" required>
    <input type="submit" value="Check">

</form>

<?php

function divisibleByFive($number) {
    return $number % 5 == 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $number = $_POST["number"];

    $result = divisibleByFive($number);

    echo "<h3>Result</h3>";
    echo "Number: " . $number . "<br>";
    echo "Divisible by 5: " . ($result ? "true" : "false");
}

?>

</body>
</html>