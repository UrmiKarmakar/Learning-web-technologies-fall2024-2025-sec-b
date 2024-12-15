<?php

// Path to the file for storing user data
$file_path = "users.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $id = htmlspecialchars($_POST['id']);
    $pwd = htmlspecialchars($_POST['pwd']);

    // Validate input
    if (empty($id) || empty($pwd)) {
        die("Error: All fields are required. <a href='login.php'>Go Back</a>");
    }

    // Check if the users file exists
    if (!file_exists($file_path)) {
        die("Error: Users file not found. <a href='login.php'>Go Back</a>");
    }

    // Read the users file
    $users = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $is_authenticated = false;

    // Authenticate user
    foreach ($users as $user) {
        list($stored_id, $stored_pwd, $name, $userType) = explode(',', $user);

        // Check if the ID matches and the password is correct
        if ($id === $stored_id && $pwd === $stored_pwd) {
            // Start session and set session variables
            session_start();
            $_SESSION['id'] = $stored_id;
            $_SESSION['name'] = $name;
            $_SESSION['type'] = $userType;

            // Redirect based on user type
            if ($userType === 'Admin') {
                header("Location: admin_home.php");
            } else if ($userType === 'User') {
                header("Location: user_home.php");
            }
            $is_authenticated = true;
            exit();
        }
    }

    // If authentication fails
    if (!$is_authenticated) {
        die("Error: Invalid ID or password. <a href='login.php'>Go Back</a>");
    }
} else {
    echo "Invalid request method.";
}
?>
