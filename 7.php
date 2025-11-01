<?php
function calculatePower($voltage, $current) {
    return $voltage * $current;
}

// Example usage:
echo calculatePower(230, 10);   // Output: 2300
echo calculatePower(110, 5);    // Output: 550
echo calculatePower(12, 0.5);   // Output: 6
echo calculatePower(0, 15);     // Output: 0
?>