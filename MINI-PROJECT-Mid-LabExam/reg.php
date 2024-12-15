<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['id'])) {

    if($_SESSION['userType'] ==='Admin'){
        header("Location: admin_home.php");
        exit();
    }else{
        header("Location: user_home.php");
        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
</head>
<body>
    <form action="RegCheck.php" method="POST">
        <fieldset style="display: inline-block;">
            <legend><b>REGISTRATION</b></legend>
            <label for="id">Id</label><br>
            <input type="text" name="id" value="" required><br>
            <label for="pwd">Password</label><br>
            <input type="password" id="pwd" name="pwd" required> <br>
            <label for="pwd2">Confirm Password</label><br>
            <input type="password" id="pwd2" name="pwd2" required> <br>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="" required><br>
            <label for="userType" required>User Type</label>
            <hr>
            <input type="radio" name="userType" value="User"> User
            <input type="radio" name="userType" value="Admin"> Admin
            <hr>
            <input type="submit" value="Sign Up">
            <a href="login.php">Sign In</a>
        </fieldset>
    </form>
</body>
</html>