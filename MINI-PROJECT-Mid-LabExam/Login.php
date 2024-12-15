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
    <title>Login Form</title>
</head>
<body>
    <form action="loginCheck.php" method="POST">
        <fieldset style="display: inline-block;">
            <legend>LOGIN</legend>
            <label for="id">User Id</label><br>
            <input type="text" name="id" value="" required><br>
            <label for="pwd">Password</label><br>
            <input type="password" id="pwd" name="pwd" required> <br>
            <hr>
            <input type="submit" value="Login">
            <a href='reg.php'>Register</a>
        </fieldset>
    </form>
</body>
</html>
