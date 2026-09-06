<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course & Student Management</title>
</head>
<body>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab_db2", "root", "");
$tab = $_GET['tab'] ?? 'courses';
?>

<nav>
    <a href="?tab=courses">Courses</a> | <a href="?tab=students">Students</a>
</nav>
<hr>

<?php if ($tab == 'courses'): ?>

    <h2>Manage Courses</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_submit'])) {
        if (isset($_POST['delete_id'])) {
            $stmt = $pdo->prepare("DELETE FROM courses WHERE id=?");
            $stmt->execute([$_POST['delete_id']]);
        } else {
            $title = $_POST["title"];
            $duration = $_POST["duration"];
            $status = $_POST["status"];

            if (isset($_POST['id']) && $_POST['id'] != '') {
                $stmt = $pdo->prepare("UPDATE courses SET title=?, duration=?, status=?, updated_at=NOW() WHERE id=?");
                $stmt->execute([$title, $duration, $status, $_POST['id']]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO courses (title, duration, status, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->execute([$title, $duration, $status]);
            }
        }
    }

    $edit = null;
    if (isset($_GET['edit_id'])) {
        $stmt = $pdo->prepare("SELECT * FROM courses WHERE id=?");
        $stmt->execute([$_GET['edit_id']]);
        $edit = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <form method="post">
        <input type="hidden" name="course_submit" value="1">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        
        Title: <input type="text" name="title" value="<?= $edit['title'] ?? '' ?>" required><br><br>
        Duration: <input type="text" name="duration" value="<?= $edit['duration'] ?? '' ?>" required><br><br>
        Status: <input type="text" name="status" value="<?= $edit['status'] ?? '' ?>" required><br><br>
        
        <input type="submit" value="<?= $edit ? 'Update' : 'Add' ?> Course">
    </form>

    <h3>Courses List</h3>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM courses");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['duration']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='?tab=courses&edit_id={$row['id']}'>Edit</a>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='course_submit' value='1'>
                            <input type='hidden' name='delete_id' value='{$row['id']}'>
                            <input type='submit' value='Delete'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

<?php else: ?>

    <h2>Manage Students</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_submit'])) {
        if (isset($_POST['delete_id'])) {
            $stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
            $stmt->execute([$_POST['delete_id']]);
        } else {
            $name = $_POST["name"];
            $course_id = $_POST["course_id"];
            $fee = $_POST["fee"];
            $rollno = $_POST["rollno"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $dob = $_POST["dob"];
            $status = $_POST["status"];

            if (isset($_POST['id']) && $_POST['id'] != '') {
                $stmt = $pdo->prepare("UPDATE students SET name=?, course_id=?, fee=?, rollno=?, phone=?, address=?, dob=?, status=?, updated_at=NOW() WHERE id=?");
                $stmt->execute([$name, $course_id, $fee, $rollno, $phone, $address, $dob, $status, $_POST['id']]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO students (name, course_id, fee, rollno, phone, address, dob, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$name, $course_id, $fee, $rollno, $phone, $address, $dob, $status]);
            }
        }
    }

    $edit = null;
    if (isset($_GET['edit_id'])) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
        $stmt->execute([$_GET['edit_id']]);
        $edit = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $courses = $pdo->query("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form method="post">
        <input type="hidden" name="student_submit" value="1">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        
        Name: <input type="text" name="name" value="<?= $edit['name'] ?? '' ?>" required><br><br>
        
        Course:
        <select name="course_id" required>
            <?php foreach ($courses as $c): ?>
                <option value="<?= $c['id'] ?>" <?= (isset($edit['course_id']) && $edit['course_id'] == $c['id']) ? 'selected' : '' ?>>
                    <?= $c['title'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        Fee: <input type="number" name="fee" value="<?= $edit['fee'] ?? '' ?>" required><br><br>
        Roll No: <input type="text" name="rollno" value="<?= $edit['rollno'] ?? '' ?>" required><br><br>
        Phone: <input type="text" name="phone" value="<?= $edit['phone'] ?? '' ?>" required><br><br>
        Address: <input type="text" name="address" value="<?= $edit['address'] ?? '' ?>" required><br><br>
        DOB: <input type="date" name="dob" value="<?= $edit['dob'] ?? '' ?>" required><br><br>
        Status: <input type="text" name="status" value="<?= $edit['status'] ?? '' ?>" required><br><br>
        
        <input type="submit" value="<?= $edit ? 'Update' : 'Add' ?> Student">
    </form>

    <h3>Students List</h3>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Fee</th>
                <th>Roll No</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT s.*, c.title AS course_title FROM students s JOIN courses c ON s.course_id = c.id");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['course_title']}</td>
                    <td>{$row['fee']}</td>
                    <td>{$row['rollno']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='?tab=students&edit_id={$row['id']}'>Edit</a>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='student_submit' value='1'>
                            <input type='hidden' name='delete_id' value='{$row['id']}'>
                            <input type='submit' value='Delete'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

<?php endif; ?>

</body>
</html>