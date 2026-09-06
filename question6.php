<!DOCTYPE html>
<html>
<body>

<h2>Calculate Age in Days</h2>

<form method="post">
    Enter Age in Years:
    <input type="number" name="age" min="0" required>
    <input type="submit" value="Calculate">
</form>

<?php

function ageInDays($age) {
    return $age * 365;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $age = $_POST["age"];

    if ($age >= 0) {

        $days = ageInDays($age);

        echo "<h3>Result</h3>";
        echo "Age in Years: " . $age . "<br>";
        echo "Age in Days: " . $days;

    } else {
        echo "Age cannot be negative.";
    }
}

?>

</body>
</html>