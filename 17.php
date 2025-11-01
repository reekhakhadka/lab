<?php
function computeSum($a, $b) {
    if ($a == $b) {
        return 3 * ($a + $b);
    } else {
        return $a + $b;
    }
}

// Test examples
echo computeSum(1, 2) . "\n";   // Output: 3
echo computeSum(3, 2) . "\n";   // Output: 5
echo computeSum(2, 2) . "\n";   // Output: 12
echo computeSum(5, 5) . "\n";   // Output: 30
?>