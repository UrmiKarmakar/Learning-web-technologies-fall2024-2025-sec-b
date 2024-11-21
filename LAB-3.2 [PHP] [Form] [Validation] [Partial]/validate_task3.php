<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST['dob'];

    if (empty($dob)) {
        echo "Date of birth cannot be empty.";
    } else {
        $dobParts = explode("-", $dob);
        $year = (int)$dobParts[0];
        $month = (int)$dobParts[1];
        $day = (int)$dobParts[2];

        if ($year < 1953 || $year > 1998) {
            echo "Year must be between 1953 and 1998.";
        } elseif ($month < 1 || $month > 12) {
            echo "Month must be between 1 and 12.";
        } elseif ($day < 1 || $day > 31) {
            echo "Day must be between 1 and 31.";
        } else {
            echo "Date of birth is valid.";
        }
    }
}
?>