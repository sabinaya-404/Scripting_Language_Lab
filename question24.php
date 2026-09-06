<!DOCTYPE html>
<html>
<head>
    <title>Mark Ledger</title>
</head>
<body>
    <h2>Mark Ledger</h2>
    <?php
    $students = [
        ["name" => "Rajesh", "roll" => 25, "web" => 56, "dbms" => 89, "eco" => 57, "dsa" => 64, "acc" => 98],
        ["name" => "hari",   "roll" => 5,  "web" => 56, "dbms" => 89, "eco" => 57, "dsa" => 64, "acc" => 98],
        ["name" => "Shyam",  "roll" => 6,  "web" => 54, "dbms" => 79, "eco" => 57, "dsa" => 69, "acc" => 98],

        ["name" => "Rita",   "roll" => 10, "web" => 16, "dbms" => 89, "eco" => 56, "dsa" => 64, "acc" => 98],

        ["name" => "Gita",   "roll" => 4,  "web" => 56, "dbms" => 89, "eco" => 57, "dsa" => 69, "acc" => 98],
        
        ["name" => "Sita",   "roll" => 24, "web" => 56, "dbms" => 99, "eco" => 57, "dsa" => 24, "acc" => 98],
    ];

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
    </tr>";

    $sn = 1;
    foreach ($students as $s) {
        $total = $s['web'] + $s['dbms'] + $s['eco'] + $s['dsa'] + $s['acc'];
        $result = ($s['web'] >= 40 && $s['dbms'] >= 40 && $s['eco'] >= 40 && $s['dsa'] >= 40 && $s['acc'] >= 40) ? "pass" : "fail";
        $color = $result == "pass" ? "#3ddc84" : "#ff4d4d";

        echo "<tr style='background:$color'>
            <td>$sn</td>
            <td>{$s['name']}</td>
            <td>{$s['roll']}</td>
            <td>{$s['web']}</td>
            <td>{$s['dbms']}</td>
            <td>{$s['eco']}</td>
            <td>{$s['dsa']}</td>
            <td>{$s['acc']}</td>
            <td>$total</td>
            <td>$result</td>
        </tr>";
        $sn++;
    }

    echo "</table>";
    ?>
</body>
</html>