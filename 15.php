<?php
function getValueAtIndex($index, $arr) {
    /**
     * Given an index and an array, return the value at the given index.
     *
     * @param int $index Integer index position
     * @param array $arr Array of elements
     * @return mixed The value at the specified index, or null if index is out of range
     */
    if ($index >= 0 && $index < count($arr)) {
        return $arr[$index];
    } else {
        return null;
    }
}

// Example usage:
$colors = ["red", "green", "blue", "yellow"];
echo getValueAtIndex(1, $colors) . "\n";  // Output: green
echo getValueAtIndex(5, $colors) . "\n";  // Output: (null) - no output

// To see the null case:
var_dump(getValueAtIndex(5, $colors));    // Output: NULL
?>