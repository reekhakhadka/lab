<?php
function findStringIndex($arr, $targetString) {
    /**
     * Takes an array and a string as arguments and returns the index of the string.
     *
     * @param array $arr Array of elements
     * @param string $targetString String to find in the array
     * @return int Index of the string, or -1 if not found
     */
    $index = array_search($targetString, $arr);
    return $index !== false ? $index : -1;
}

// Example usage:
$fruits = ["apple", "banana", "cherry", "date"];
echo findStringIndex($fruits, "cherry") . "\n";  // Output: 2
echo findStringIndex($fruits, "grape") . "\n";   // Output: -1
?>