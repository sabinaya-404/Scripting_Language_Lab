<!DOCTYPE html>
<html>

<body>

<h2>Convert Minutes to Seconds</h2>

<form method="post">
    Enter Minutes:
    <input type="number" name="minutes" min="0" required>
    <input type="submit" value="Convert">
</form>

<?php

function minutesToSeconds($minutes) {
    return $minutes * 60;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $minutes = $_POST["minutes"];

    if ($minutes >= 0) {
        $seconds = minutesToSeconds($minutes);

        echo "<h3>Result</h3>";
        echo "Minutes: " . $minutes . "<br>";
        echo "Seconds: " . $seconds;
    } else {
        echo "Minutes cannot be negative.";
    }
}

?>

</body>
</html>