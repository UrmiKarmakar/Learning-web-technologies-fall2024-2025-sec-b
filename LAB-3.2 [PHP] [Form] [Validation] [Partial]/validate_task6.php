<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bloodGroup = $_POST['blood_group'];

    if (empty($bloodGroup)) {
        echo "Please select a blood group.";
    } else {
        echo "Your selected blood group is: " . htmlspecialchars($bloodGroup);
    }
}
?>
