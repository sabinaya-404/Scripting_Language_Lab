<!DOCTYPE html>
<html>
<head>
    <title>Largest Among Three Numbers</title>
</head>
<body>

<h2>Largest Among Three Numbers</h2>

<form method="post">
    First Number: <input type="number" name="num1" required><br><br>
    Second Number: <input type="number" name="num2" required><br><br>
    Third Number: <input type="number" name="num3" required><br><br>
    <input type="submit" value="Find Largest">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["num1"];
    $b = $_POST["num2"];
    $c = $_POST["num3"];

    if ($a >= $b && $a >= $c) $largest = $a;
    elseif ($b >= $a && $b >= $c) $largest = $b;
    else $largest = $c;

    echo "<h3>Result</h3>";
    echo "First Number: $a,<br>Second Number: $b,<br>Third Number: $c<br>";
    echo "Largest Number: $largest";
      }
?>

</body>
</html>