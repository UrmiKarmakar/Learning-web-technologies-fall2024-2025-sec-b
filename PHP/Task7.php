<?php

// Pattern 1: *
echo "Pattern 1:<br>";
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";

// Pattern 2: 1 2 3
echo "Pattern 2:<br>";
$count = 1;
for ($i = 3; $i > 0; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $count . " ";
        $count++;
    }
    echo "<br>";
}

echo "<br>";

// Pattern 3: A B C
echo "Pattern 3:<br>";
$char = 'A';
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
        $char++;
    }
    echo "<br>";
}
?>
