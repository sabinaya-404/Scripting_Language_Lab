<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operation</title>
</head>
<body>
    <h2>Manage Records</h2>
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=lab2_db", "root", "");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete_id'])) {
            $stmt = $pdo->prepare("DELETE FROM records WHERE id=?");
            $stmt->execute([$_POST['delete_id']]);
        } else {
            $name = $_POST["name"];
            $rank = $_POST["rank"];
            $status = $_POST["status"];
            $image = $_FILES['image']['name'] ?? '';
            $errors = [];

            if (empty($name)) $errors[] = "Name is required.";
            if (empty($rank)) $errors[] = "Rank is required.";

            if (empty($errors)) {
                if ($image != '') {
                    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
                }
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $stmt = $pdo->prepare("UPDATE records SET name=?, rank_title=?, status=?, updated_by=?, updated_at=NOW() WHERE id=?");
                    $stmt->execute([$name, $rank, $status, "admin", $_POST['id']]);
                } else {
                    $stmt = $pdo->prepare("INSERT INTO records (name, rank_title, status, image, created_by, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
                    $stmt->execute([$name, $rank, $status, $image, "admin"]);
                }
            } else {
                foreach ($errors as $e) echo "$e<br>";
            }
        }
    }

    $edit = null;
    if (isset($_GET['edit_id'])) {
        $stmt = $pdo->prepare("SELECT * FROM records WHERE id=?");
        $stmt->execute([$_GET['edit_id']]);
        $edit = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        Name: <input type="text" name="name" value="<?= $edit['name'] ?? '' ?>" required><br><br>
        Rank: <input type="text" name="rank" value="<?= $edit['rank_title'] ?? '' ?>" required><br><br>
        Status: <input type="text" name="status" value="<?= $edit['status'] ?? '' ?>" required><br><br>
        Image: <input type="file" name="image"><br><br>
        <input type="submit" value="<?= $edit ? 'Update' : 'Add' ?> Record">
    </form>

    <h3>Records List</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM records");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['rank_title']}</td>
                <td>{$row['status']}</td>
                <td>{$row['created_at']}</td>
                <td>{$row['updated_at']}</td>
                <td>
                    <a href='?edit_id={$row['id']}'>Edit</a>
                    <form method='post' style='display:inline'>
                        <input type='hidden' name='delete_id' value='{$row['id']}'>
                        <input type='submit' value='Delete'>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>