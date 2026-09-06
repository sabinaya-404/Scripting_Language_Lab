<!DOCTYPE html>
<html>
<body>
    <h2>PHP Variables and Data Types</h2>
    <?php
        $str = "Hello, World!";
        $int = 42;
        $float = 3.14;
        $bool = true;
        $arr = ["Apple", "Banana", "Cherry"];
        $nullVar = NULL;

        echo "<h3>a. Printing Data using echo and print:</h3>";
        echo "String: " . $str . "<br>";
        echo "Integer: " . $int . "<br>";
        print "Float: " . $float . "<br>";
        print "Boolean: " . ($bool ? "True" : "False") . "<br>";

        echo "<h3>b. Array Content using print_r and var_dump:</h3>";
        echo "Using print_r:<br>";
        echo "<pre>";
        print_r($arr);
        echo "</pre>";

        echo "Using var_dump:<br>";
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";

        echo "<h3>c. Checking Data Types:</h3>";
        echo "Type of \$str: " . gettype($str) . "<br>";
        echo "Type of \$int: " . gettype($int) . "<br>";
        echo "Type of \$float: " . gettype($float) . "<br>";
        echo "Type of \$bool: " . gettype($bool) . "<br>";
        echo "Type of \$arr: " . gettype($arr) . "<br>";
        echo "Type of \$nullVar: " . gettype($nullVar) . "<br><br>";

        echo "Is \$int an integer? " . (is_int($int) ? "Yes" : "No") . "<br>";
        echo "Is \$float a float? " . (is_float($float) ? "Yes" : "No") . "<br>";
        echo "Is \$str a string? " . (is_string($str) ? "Yes" : "No") . "<br>";
    ?>
</body>
</html>