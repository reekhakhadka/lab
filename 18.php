<?php

function calculateDifference(int $n): int {
    $target = 51;
    
    if ($n > $target) {
        // If n is greater than 51, return triple the absolute difference
        return abs($n - $target) * 3;
    } else {
        // Otherwise, return the absolute difference
        return abs($n - $target);
    }
}

// Test cases
echo "Difference for n = 53: " . calculateDifference(53) . "\n"; // Expected: (53 - 51) * 3 = 6
echo "Difference for n = 30: " . calculateDifference(30) . "\n"; // Expected: 51 - 30 = 21
echo "Difference for n = 51: " . calculateDifference(51) . "\n"; // Expected: 51 - 51 = 0

?>