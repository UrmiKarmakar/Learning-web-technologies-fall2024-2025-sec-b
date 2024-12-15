<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
</head>
<body>
    <!-- Header -->
    <table width="100%" border="1" cellspacing="0" cellpadding="10" bgcolor="#6b8e23">
        <tr>
            <td align="center">
                <b>Admins’ home page</b>
            </td>
        </tr>
    </table>

    <!-- Main Content -->
    <br><br>
    <table align="center" border="1" cellspacing="0" cellpadding="20">
        <tr>
            <td align="center">
                <h1>Welcome <?php echo $_SESSION['name'];?>!</h1>
                <p>
                    <a href="viewProfile.php">Profile</a><br>
                    <a href="changePassword.php">Change Password</a><br>
                    <a href="viewUsers.php">View Users</a><br>
                    <a href="logout.php">Logout</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
