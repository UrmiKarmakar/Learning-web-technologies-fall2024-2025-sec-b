<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form action="changePassProcess.php" method="POST">
        <fieldset style="display: inline-block;">
            <legend><b>>CHANGE PASSWORD</b></legend>
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password"><br><br>
    
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password"><br><br>
    
            <label for="confirm_password">Retype New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password"><br><br>
    
            <button type="submit">Change</button>
            <a href="Login.php">Login</a>
        </fieldset>
    </form>
</body>
</html>
