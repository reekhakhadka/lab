<?php
function ageInDays($years) {
    return $years * 365;
}

// Example usage:
echo ageInDays(25);     // Output: 9125
echo ageInDays(10);     // Output: 3650
echo ageInDays(65);     // Output: 23725
echo ageInDays(0);      // Output: 0
?>