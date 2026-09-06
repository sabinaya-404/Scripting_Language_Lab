<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Handling Operations</title>
</head>
<body>
    <h2>File Handling</h2>
    
    <form method="post">
        <label for="filename">Filename:</label>
        <input type="text" id="filename" name="filename" required><br><br>

        <label for="newname">New Filename (for rename):</label>
        <input type="text" id="newname" name="newname"><br><br>

        <label for="content">Content (for write):</label>
        <textarea id="content" name="content"></textarea><br><br>

        <label for="action">Action:</label>
        <select id="action" name="action" required>
            <option value="check">Check File</option>
            <option value="write">Write File</option>
            <option value="read">Read File</option>
            <option value="rename">Rename File</option>
            <option value="checkperm">Check Permissions</option>
            <option value="changeperm">Change Permissions</option>
        </select><br><br>

        <input type="submit" value="Execute">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filename = $_POST["filename"];
        $newname  = $_POST["newname"];
        $content  = $_POST["content"];
        $action   = $_POST["action"];

        $result = match ($action) {
            "check"      => file_exists($filename) ? "File exists" : "File does not exist",

            "write"      => file_put_contents($filename, $content) !== false ? "File written successfully" : "Failed to write file",

            "read"       => file_exists($filename) ? "File content: " . file_get_contents($filename) : "File does not exist",

            "rename"     => !empty($newname) && rename($filename, $newname) ? "File renamed to $newname" : "Rename failed",

            "checkperm"  => file_exists($filename) ? "Permissions: " . substr(sprintf('%o', fileperms($filename)), -4) : "File does not exist",
            
            "changeperm" => chmod($filename, 0755) ? "Permissions changed to 0755" : "Failed to change permissions",
            default      => "Invalid action",
        };

        echo "<h3>Result</h3>";
        echo $result;
    }
    ?>
</body>
</html>