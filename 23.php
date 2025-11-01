<?php
function findLargestMax($a, $b, $c) {
    return max($a, $b, $c);
}

// Test the function
echo "Largest among 15, 27, 18 is: " . findLargestMax(15, 27, 18) . "\n";
echo "Largest among -5, -12, -3 is: " . findLargestMax(-5, -12, -3) . "\n";
echo "Largest among 100, 100, 50 is: " . findLargestMax(100, 100, 50) . "\n";
?>