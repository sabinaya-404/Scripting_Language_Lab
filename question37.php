<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
<h2>Registration Form</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="text" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Website: <input type="text" name="website" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    Gender:
    <select name="gender" required>
        <option value="">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>
    Course:
    <select name="course" required>
        <option value="">Select</option>
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="BIT">BIT</option>
    </select><br><br>
    <input type="submit" value="Register">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $website = $_POST["website"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $errors = [];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) $errors[] = "Name must contain only letters and spaces.";
    if (empty($address)) $errors[] = "Address is required.";
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) $errors[] = "Username can only contain letters, numbers, and underscores.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) $errors[] = "Password must be at least 8 characters with uppercase, lowercase, digit, and special character.";
    if (!filter_var($website, FILTER_VALIDATE_URL)) $errors[] = "Invalid website URL.";
    if (!preg_match("/^(96|97|98)\d{8}$/", $phone)) $errors[] = "Phone must start with 96, 97, or 98 and contain digits only.";
    if (empty($gender)) $errors[] = "Please select a gender.";
    if (empty($course)) $errors[] = "Please select a course.";

    if (empty($errors)) {
        echo "<h3>Registration Successful</h3>";
        echo "Name: $name<br>";
        echo "Address: $address<br>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        echo "Website: $website<br>";
        echo "Phone: $phone<br>";
        echo "Gender: $gender<br>";
        echo "Course: $course";
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