<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['gender'])) {
        echo "Please select at least one option.";
    } else {
        echo "Gender selected: " . htmlspecialchars($_POST['gender']);
    }
}
?>
