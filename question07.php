<!DOCTYPE html>
<html>

<body>

<h2>Football Team Points Calculator</h2>

<form method="post">

    Wins:
    <input type="number" name="wins" min="0" required>
    <br><br>

    Draws:
    <input type="number" name="draws" min="0" required>
    <br><br>

    Losses:
    <input type="number" name="losses" min="0" required>
    <br><br>

    <input type="submit" value="Calculate">

</form>

<?php

function calculatePoints($wins, $draws, $losses) {
    return ($wins * 3) + ($draws * 1) + ($losses * 0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $wins = $_POST["wins"];
    $draws = $_POST["draws"];
    $losses = $_POST["losses"];

    if ($wins >= 0 && $draws >= 0 && $losses >= 0) {

        $games = $wins + $draws + $losses;
        $points = calculatePoints($wins, $draws, $losses);

        echo "<h3>Result</h3>";
        echo "Wins: " . $wins . "<br>";
        echo "Draws: " . $draws . "<br>";
        echo "Losses: " . $losses . "<br>";
        echo "Total Games Played: " . $games . "<br>";
        echo "Total Points: " . $points;

    } else {
        echo "Values cannot be negative.";
    }
}

?>

</body>
</html>