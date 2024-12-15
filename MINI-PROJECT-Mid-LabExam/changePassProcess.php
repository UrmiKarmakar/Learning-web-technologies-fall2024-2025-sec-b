<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Path to the users.txt file
$file_path = "users.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = htmlspecialchars($_POST['current_password']);
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    // Read the users.txt file
    if (!file_exists($file_path)) {
        die("Error: Users file not found.");
    }
    $users = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Find the logged-in user's data
    $updated_users = [];
    $is_password_updated = false;
    foreach ($users as $user) {
        list($id, $stored_password, $name, $type) = explode(',', $user);

        if ($id === $_SESSION['id']) {
            // Verify the current password
            if (!password_verify($current_password, $stored_password)) {
                die("Error: Current password is incorrect. <a href='changePassword.php'>Go Back</a>");
            }

            // Validate new passwords match
            if ($new_password !== $confirm_password) {
                die("Error: New passwords do not match. <a href='changePassword.php'>Go Back</a>");
            }

            // Hash the new password and update the record
            $updated_users[] = "$id,$new_password,$name,$type";
            $is_password_updated = true;
        } else {
            $updated_users[] = $user; // Keep other users unchanged
        }
    }

    // Save the updated users data back to the file
    if ($is_password_updated) {
        file_put_contents($file_path, implode("\n", $updated_users));
        $_home =($type === 'Admin' ? 'admin_home.php' : 'user_home.php');
        echo "Password updated successfully. <a href='$_home'>Go to Profile</a>";
    } else {
        echo "Error: Unable to update password. <a href='changePassword.php'>Go Back</a>";
    }
}
?>