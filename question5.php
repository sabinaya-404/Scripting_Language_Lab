<!DOCTYPE html>
<html>

<body>

<h2>Calculate Area of Triangle</h2>

<form method="post">
    Enter Base:
    <input type="number" name="base" step="any" min="0" required>
    <br><br>

    Enter Height:
    <input type="number" name="height" step="any" min="0" required>
    <br><br>

    <input type="submit" value="Calculate">
</form>

<?php

function triangleArea($base, $height) {
    return 0.5 * $base * $height;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $base = $_POST["base"];
    $height = $_POST["height"];

    if ($base >= 0 && $height >= 0) {

        $area = triangleArea($base, $height);

        echo "<h3>Result</h3>";
        echo "Base: " . $base . "<br>";
        echo "Height: " . $height . "<br>";
        echo "Area of Triangle: " . $area;

    } else {
        echo "Base and height cannot be negative.";
    }
}

?>

</body>
</html>