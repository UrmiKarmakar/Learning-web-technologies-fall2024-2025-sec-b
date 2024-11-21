<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);

    if (!preg_match("/^[a-zA-Z][a-zA-Z.\-\s]*$/", $name)) {
        echo "Name must start with a letter and can only contain letters, periods, dashes, and spaces.";
    } elseif (str_word_count($name) < 2) {
        echo "Name must contain at least two words.";
    } else {
        echo "Hello, " . htmlspecialchars($name) . "! Your name is valid.";
    }
}
?>
