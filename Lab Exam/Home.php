<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['xyz']) || !$_SESSION['xyz']) {
    header("Location: Login.html");
    exit();
}

// Retrieve the logged-in user's details
$logged_in_email = $_SESSION['logged_in_user'];
$logged_in_user = null;

foreach ($_SESSION['users'] as $user) {
    if ($user['email'] === $logged_in_email) {
        $logged_in_user = $user;
        break;
    }
}

// Display the user's details
if ($logged_in_user) {
    echo "Welcome, " . htmlspecialchars($logged_in_user['name']) . "!<br>";
    echo "Email: " . htmlspecialchars($logged_in_user['email']) . "<br>";
    echo "Date of Birth: " . htmlspecialchars($logged_in_user['dob']) . "<br>";
    echo "Gender: " . htmlspecialchars($logged_in_user['gender']) . "<br>";
} else {
    echo "User not found.";
}

// Provide a logout link
echo "<a href='Logout.php'>Logout</a>";
?>
