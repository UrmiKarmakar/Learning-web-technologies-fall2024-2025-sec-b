<?php
// index.php (Entry point - Routes to login page)
session_start();
if (isset($_SESSION['user_type'])) {

    if ($_SESSION['user_type'] === 'admin') {
        header('Location: view/admin/dashboard.php');
        exit();
    }else if ($_SESSION['user_type'] === 'employer') {
        header('Location: view/employer/dashboard.php');
        exit();
    }else {
        header('Location: view/login.php');
        exit();
    }
}
header('Location: view/login.php');
exit();
?>