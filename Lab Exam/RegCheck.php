<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><strong>Date Of Birth:</strong> " . htmlspecialchars($_POST['dob']) . "</p>";
        } else {
            echo "<p>No data received.</p>";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['gender'])) {
                echo "<p><strong>Gender:</strong> " . htmlspecialchars($_POST['gender']) . "</p>";
            } else {
                echo "<p><strong>Gender:</strong> Not selected</p>";
            }
        } else {
            echo "<p>No data received.</p>";
        }
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if(isset($_POST['pwd'])){
                echo "<p><strong>Password:</strong> " . htmlspecialchars($_POST['pwd']) . "</p>";
            } else {
                echo "<p><strong>Password:</strong> Not selected</p>";
            }
        } else {
            echo "<p>No data received.</p>";
        }
    ?>