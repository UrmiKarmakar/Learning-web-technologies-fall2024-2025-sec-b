<?php
session_start();

// Initialize the session users array if not already done
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = []; // Initialize users session array
}

// Collect registration form data
if (isset($_POST['name'], $_POST['email'], $_POST['dob'], $_POST['gender'], $_POST['pwd'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['pwd'];

    // Store user data in the session users array
    $new_user = [
        'name' => $name,
        'email' => $email,
        'dob' => $dob,
        'gender' => $gender,
        'pwd' => $password
    ];

    $_SESSION['users'][] = $new_user; // Add the new user to the session array

    // Redirect to the home page after successful registration
    header("Location: Home.php");
    exit();
} else {
    // Redirect back to the registration page if the form data is missing
    header("Location: Reg.html");
    exit();
}
?>