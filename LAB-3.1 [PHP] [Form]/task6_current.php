<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 6: Blood Group (Retain Input)</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
        <legend>BLOOD GROUP</legend>
            <select name="blood_group" required>
                <option value="">--Select Blood Group--</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Blood Group:</strong> " . htmlspecialchars($_POST['blood_group']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
</body>
</html>