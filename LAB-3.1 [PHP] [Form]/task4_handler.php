<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 4: Gender Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['gender'])) {
                echo "<p><strong>Gender:</strong> " . htmlspecialchars($_POST['gender']) . "</p>";
            } else {
                echo "<p><strong>Gender:</strong> Not selected</p>";
            }
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>