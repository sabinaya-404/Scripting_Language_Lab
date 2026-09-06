<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Register</h2>
    
    <form method="post">
        Username: <input type="text" name="username" required><br><br>
        Email: <input type="text" name="email" required><br><br>
        Date of Birth: <input type="date" name="dob" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        <input type="submit" value="Register">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $phone = $_POST["phone"];
        $errors = [];

        if (strlen($username) < 8) {
            $errors[] = "Username must be at least 8 characters.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        }
        if (!DateTime::createFromFormat('Y-m-d', $dob)) {
            $errors[] = "Invalid date of birth.";
        }
        if (!preg_match('/^\d{10}$/', $phone)) {
            $errors[] = "Phone number must be 10 digits.";
        }

        if (empty($errors)) {
            echo "<h3>Registration Successful</h3>";
            echo "Username: $username<br>";
            echo "Email: $email<br>";
            echo "DOB: $dob<br>";
            echo "Phone: $phone";
        } else {
            echo "<h3>Registration Failed</h3>";
            foreach ($errors as $e) {
                echo "$e<br>";
            }
        }
    }
    ?>
</body>
</html>