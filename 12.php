<?php
function recursiveStrlen($str) {
    /**
     * Returns the length of a string using recursion.
     */
    // Base case: if string is empty, return 0
    if ($str === '') {
        return 0;
    }
    
    // Recursive case: remove first character and add 1
    return 1 + recursiveStrlen(substr($str, 1));
}

// Examples:
echo recursiveStrlen("hello") . "\n";     // 5
echo recursiveStrlen("") . "\n";          // 0
echo recursiveStrlen("a") . "\n";         // 1
echo recursiveStrlen("Hello World!") . "\n"; // 12

// Compare with built-in strlen() to verify
$testString = "recursion";
echo "recursiveStrlen: " . recursiveStrlen($testString) . "\n";
echo "built-in strlen: " . strlen($testString) . "\n";
?>