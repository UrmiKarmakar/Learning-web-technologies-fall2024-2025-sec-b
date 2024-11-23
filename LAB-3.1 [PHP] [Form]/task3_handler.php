<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 3: DOB Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Date Of Birth:</strong> " . htmlspecialchars($_POST['dob']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>