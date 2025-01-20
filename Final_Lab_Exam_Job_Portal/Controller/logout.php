<?php

    session_start();
    unset($_SESSION['']);
    session_destroy();
    setcookie('status', 'true', time()-10, '/');
    header('location: ../index.php');

?>    
