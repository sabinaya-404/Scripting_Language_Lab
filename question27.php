<!DOCTYPE html>
<html>
<head>
    <title>CV Upload</title>
</head>
<body>

    <h2>Upload CV</h2>

    <form method="post" enctype="multipart/form-data">
        Select CV:
        <input type="file" name="cv" required>
        <br><br>
        <input type="submit" value="Upload CV">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fileName = $_FILES["cv"]["name"];
        $fileSize = $_FILES["cv"]["size"];
        $fileTmp  = $_FILES["cv"]["tmp_name"];

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed   = ["pdf", "doc", "docx"];

        if (!in_array($extension, $allowed)) {
            echo "Only PDF, DOC, and DOCX files are allowed.";
        } elseif ($fileSize >= 1024 * 1024) {
            echo "File size must be less than 1 MB.";
        } else {
            if (!is_dir("uploads")) {
                mkdir("uploads");
            }

            $destination = "uploads/" . basename($fileName);

            if (move_uploaded_file($fileTmp, $destination)) {
                echo "CV uploaded successfully.";
            } else {
                echo "Failed to upload CV.";
            }
        }
    }
    ?>

</body>
</html>