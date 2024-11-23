<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 6: Blood Group Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Blood Group:</strong> " . htmlspecialchars($_POST['blood_group']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>