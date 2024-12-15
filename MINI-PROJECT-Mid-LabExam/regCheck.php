<?php

// Path to the file for storing user data
$file_path = "users.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = htmlspecialchars($_POST['id']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $pwd2 = htmlspecialchars($_POST['pwd2']);
    $name = htmlspecialchars($_POST['name']);
    $userType = htmlspecialchars($_POST['userType']);

    // Validate passwords
    if ($pwd !== $pwd2) {
        die("Error: Passwords do not match. <a href='registration.php'>Go Back</a>");
    }

    //Validate ID

    $idPattern = '/^\d{2}-\d{5}-[123]$/';

    if (!preg_match($idPattern, $id)) {
        echo "Invalid ID format!";
        header("refresh: 2; url = reg.php");


    }

    // Prepare the user data
    $user_data = "$id,$pwd,$name,$userType\n";

    // Append user data to the TXT file
    if (file_put_contents($file_path, $user_data, FILE_APPEND)) {
        echo "Registration successful!";
        //Creating a session
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['type'] = $userType;

        if($_POST['userType']==='Admin'){
            header("refresh: 2; url = admin_home.php");
            exit();
            
        }else if($_POST['userType']==='User'){
            header("refresh: 2; url = user_home.php");
            exit();
        }else{
            echo "Error: Unable to register. Please try again.";
        }

    } else {
        echo "Error: Unable to register. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
