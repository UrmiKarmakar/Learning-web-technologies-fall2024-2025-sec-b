<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['degrees']) || count($_POST['degrees']) < 2) {
        echo "Please select at least two degrees.";
    } else {
        $degrees = $_POST['degrees'];
        echo "Degrees selected: " . implode(", ", $degrees);
    }
}
?>