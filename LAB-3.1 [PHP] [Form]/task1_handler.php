<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 1: Name Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>