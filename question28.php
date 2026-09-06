<!DOCTYPE html>
<html>
<head>
    <title>Profile Image Upload</title>
</head>
<body>
    <h2>Upload Profile Image</h2>
    
    <form method="post" enctype="multipart/form-data">
        Select Image: <input type="file" name="image" required><br><br>
        <input type="submit" value="Upload">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['png', 'jpg', 'jpeg'];

        if (!in_array($ext, $allowed)) {
            echo "Only PNG and JPEG files are allowed.";
        } elseif ($_FILES['image']['size'] > 500000) {
            echo "File size must be less than 500 KB.";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name']);
            echo "Profile image uploaded successfully: " . $_FILES['image']['name'];
        }
    }
    ?>
</body>
</html>