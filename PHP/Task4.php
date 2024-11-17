<?php
$num1 = 12;
$num2 = 25;
$num3 = 18;
echo "Number1: $num1\n<br>";
echo "Number2: $num2\n<br>";
echo "Number3: $num3\n<br>";
if ($num1 >= $num2 && $num1 >= $num3) {
    echo "Largest number is $num1<br>";
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    echo "Largest number is $num2<br>";
} else {
    echo "Largest number is $num3<br>";
}
?>
