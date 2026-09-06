<!DOCTYPE html>
<html>
<head>
    <title>Cars Needed</title>
</head>
<body>

<h2>Calculate Number of Cars</h2>

<form method="post">

    Enter Number of People:
    <input type="number" name="people" min="1" required>

    <input type="submit" value="Calculate">

</form>

<?php

function carsNeeded($people) {
    return ceil($people / 5);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $people = $_POST["people"];

    if ($people > 0) {

        $cars = carsNeeded($people);

        echo "<h3>Result</h3>";
        echo "Number of People: " . $people . "<br>";
        echo "Cars Needed: " . $cars;

    } else {
        echo "Number of people must be greater than zero.";
    }
}

?>

</body>
</html>