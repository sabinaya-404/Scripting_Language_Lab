<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
<h2>Simple Interest Calculator</h2>
<form method="post">
    Principal: <input type="number" name="principal" required><br><br>
    Rate (%): <input type="number" step="0.01" name="rate" required><br><br>
    Time (years): <input type="number" step="0.01" name="time" required><br><br>
    <input type="submit" value="Calculate">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST["principal"];
    $rate = $_POST["rate"];
    $time = $_POST["time"];

    $si = ($principal * $rate * $time) / 100;
    $total = $principal + $si;

    echo "<h3>Result</h3>";
    echo "Principal: $principal<br>";
    echo "Rate: $rate%<br>";
    echo "Time: $time years<br>";
    echo "Simple Interest: $si<br>";
    echo "Total Amount: $total";
}
?>
</body>
</html>