<?php
session_start();

// Check if users are stored in the session
if (!isset($_SESSION['users']) || empty($_SESSION['users'])) {
    echo "No registered users found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['pwd']);

    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
        exit();
    }

    // Validate user credentials by checking against session data
    $is_valid_user = false;
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && $user['pwd'] === $password) {
            $_SESSION['logged_in_user'] = $email; // Save logged-in user's email
            $_SESSION['xyz'] = true; // Mark user as logged in
            $is_valid_user = true;
            break;
        }
    }

    if ($is_valid_user) {
        header("Location: Home.php"); // Redirect to the homepage
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    header("Location: Login.html"); // Redirect to the login page if accessed directly
    exit();
}
?>
