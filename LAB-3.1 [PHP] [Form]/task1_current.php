<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 1: Name (Retain Input)</title>
</head>
<body>
    <h1>Task 1: Name (Retain Input)</h1>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
            <legend>NAME</legend>
            <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
        }
    ?>
</body>
</html>