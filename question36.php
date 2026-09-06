<!DOCTYPE html>
<html>
<head>
    <title>Income Tax Calculator</title>
</head>
<body>
<h2>Nepal Income Tax Calculator (FY 2083/84)</h2>
<form method="post">
    Annual Taxable Income: <input type="number" name="income" required><br><br>
    Gender:
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>
    <input type="submit" value="Calculate">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = $_POST["income"];
    $gender = $_POST["gender"];
    $original = $income;
    $slabs = [];

    $rate = 0.01; $limit = 1000000;
    $amt = min($income, $limit); $slabs[] = $amt * $rate; $income -= $amt;

    $rate = 0.10; $limit = 500000;
    $amt = min($income, $limit); $slabs[] = $amt * $rate; $income -= $amt;

    $rate = 0.20; $limit = 1000000;
    $amt = min($income, $limit); $slabs[] = $amt * $rate; $income -= $amt;

    $rate = 0.27; $limit = 1500000;
    $amt = min($income, $limit); $slabs[] = $amt * $rate; $income -= $amt;

    $rate = 0.29;
    $slabs[] = max($income, 0) * $rate;

    $tax = array_sum($slabs);
    if ($gender == "female") $tax *= 0.90;

    $net = $original - $tax;

    echo "<h3>Result</h3>";
    echo "Annual Taxable Income: $original<br>";
    echo "Slab 1 (1%): " . round($slabs[0], 2) . "<br>";
    echo "Slab 2 (10%): " . round($slabs[1], 2) . "<br>";
    echo "Slab 3 (20%): " . round($slabs[2], 2) . "<br>";
    echo "Slab 4 (27%): " . round($slabs[3], 2) . "<br>";
    echo "Slab 5 (29%): " . round($slabs[4], 2) . "<br>";
    echo "Total Tax Payable: " . round($tax, 2) . "<br>";
    echo "Net Income After Tax: " . round($net, 2);
}
?>
</body>
</html>