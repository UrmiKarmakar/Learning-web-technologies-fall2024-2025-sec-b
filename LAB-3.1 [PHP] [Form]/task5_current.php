<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 5: Degrees (Retain Input)</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset style="display: inline-block;">
            <legend>DEGREE</legend>
            <input type="checkbox" name="degrees[]" value="SSC"> SSC
            <input type="checkbox" name="degrees[]" value="HSC"> HSC
            <input type="checkbox" name="degrees[]" value="BSc"> BSc
            <input type="checkbox" name="degrees[]" value="MSc"> MSc
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

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