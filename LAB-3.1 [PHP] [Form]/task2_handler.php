<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 2: Email Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>