<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 4: Gender (Retain Input)</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
            <legend>GENDER</legend>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

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