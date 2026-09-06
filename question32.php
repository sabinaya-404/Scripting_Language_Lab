<!DOCTYPE html>
<html>
<head>
    <title>Mark Ledger</title>
</head>
<body>
    <h2>Mark Ledger</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Roll: <input type="number" name="roll" required><br><br>
        Web Tech II: <input type="number" name="web" required><br><br>
        DBMS: <input type="number" name="dbms" required><br><br>
        Economics: <input type="number" name="eco" required><br><br>
        DSA: <input type="number" name="dsa" required><br><br>
        Account: <input type="number" name="acc" required><br><br>
        <input type="submit" value="Add Student">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $web = $_POST["web"];
        $dbms = $_POST["dbms"];
        $eco = $_POST["eco"];
        $dsa = $_POST["dsa"];
        $acc = $_POST["acc"];

        $marks = [$web, $dbms, $eco, $dsa, $acc];
        $total = array_sum($marks);
        $result = (min($marks) >= 24) ? "pass" : "fail";
        $color = $result == "pass" ? "#3ddc84" : "#ff4d4d";

        echo "<table border='1' cellpadding='8'>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Web Tech II</th>
            <th>DBMS</th>
            <th>Economics</th>
            <th>DSA</th>
            <th>Account</th>
            <th>Total</th>
            <th>Result</th>
        </tr>
        <tr style='background:$color'>
            <td>1</td>
            <td>$name</td>
            <td>$roll</td>
            <td>$web</td>
            <td>$dbms</td>
            <td>$eco</td>
            <td>$dsa</td>
            <td>$acc</td>
            <td>$total</td>
            <td>$result</td>
        </tr>
        </table>";
    }
    ?>
</body>
</html>