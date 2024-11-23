<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 2: Email (Retain Input)</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
            <legend>EMAIL</legend>
            <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        }
    ?>
</body>
</html>