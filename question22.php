<!DOCTYPE html>
<html>
<head>
    <title>Uppercase Last 3 Characters</title>
</head>
<body>
<h2>Uppercase Last 3 Characters</h2>
<form method="post">
    Enter String: <input type="text" name="str" required><br><br>
    <input type="submit" value="Convert">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str = $_POST["str"];
    if (strlen($str) < 3) {
        $result = strtoupper($str);
    } else {
        $result = substr($str, 0, -3) . strtoupper(substr($str, -3));
    }
    echo "<h3>Result</h3>";
    echo "Input: $str<br>";
    echo "Output: $result";
}
?>
</body>
</html>