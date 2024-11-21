<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format <br> Must be a valid email address (i.e anything@example.com)";
    } else {
        echo "Email is valid.";
    }
}
?>
