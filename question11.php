<!DOCTYPE html>
<html>
<body>

<h2>Calculate Area</h2>

<form method="post">

    Enter Base:
    <input type="number" name="base" step="any" min="0" required>
    <br><br>

    Enter Height:
    <input type="number" name="height" step="any" min="0" required>
    <br><br>

    Select Shape:
    <select name="shape" required>
        <option value="triangle">Triangle</option>
        <option value="parallelogram">Parallelogram</option>
    </select>
    <br><br>

    <input type="submit" value="Calculate">

</form>

<?php

function calculateArea($base, $height, $shape) {

    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape == "parallelogram") {
        return $base * $height;
    }

    return 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $base = $_POST["base"];
    $height = $_POST["height"];
    $shape = $_POST["shape"];

    if ($base >= 0 && $height >= 0) {

        $area = calculateArea($base, $height, $shape);

        echo "<h3>Result</h3>";
        echo "Shape: " . $shape . "<br>";
        echo "Base: " . $base . "<br>";
        echo "Height: " . $height . "<br>";
        echo "Area: " . $area;

    } else {
        echo "Base and height cannot be negative.";
    }
}

?>

</body>
</html>