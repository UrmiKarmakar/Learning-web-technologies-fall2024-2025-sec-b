<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 3: Date Of Birth (Retain Input)</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
            <legend>DATE OF BIRTH</legend>
            <input type="date" name="dob" value="<?= htmlspecialchars($_POST['dob'] ?? '') ?>" required>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Date Of Birth:</strong> " . htmlspecialchars($_POST['dob']) . "</p>";
        }
    ?>
</body>
</html>