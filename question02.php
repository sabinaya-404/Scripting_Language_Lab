<!DOCTYPE html>
<html>

<body>

<h2>Calculate Area of Circle</h2>

<form method="post">
    Enter Radius:
    <input type="number" name="radius" step="any" min="0" required>
    <input type="submit" value="Calculate">
</form>

<?php

define("PI", 3.14159);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $radius = $_POST["radius"];

    if ($radius >= 0) {
        $area = PI * $radius * $radius;

        echo "<h3>Result</h3>";
        echo "Radius: " . $radius . "<br>";
        echo "Area of Circle: " . $area;
    } else {
        echo "Radius cannot be negative.";
    }
}

?>

</body>
</html>