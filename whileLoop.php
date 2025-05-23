<?php 
$counter = 1;
$maxNumber = 7;

while ($counter <= $maxNumber) {
    echo ($counter % 3 == 0) ? "Fizz!\n" : "{$counter}\n";
    $counter++;
}