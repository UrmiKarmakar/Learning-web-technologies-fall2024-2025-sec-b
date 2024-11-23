<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 5: Degrees Handler</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['degrees']) && !empty($_POST['degrees'])) {
                echo "<p><strong>Degrees:</strong> " . implode(', ', $_POST['degrees']) . "</p>";
            } else {
                echo "<p><strong>Degrees:</strong> Not selected</p>";
            }
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>