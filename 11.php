<?php
function divisibleByFive($num) {
    /**
     * Returns true if an integer is evenly divisible by 5, false otherwise.
     */
    return $num % 5 === 0;
}

// Examples:
var_dump(divisibleByFive(10));   // bool(true)
var_dump(divisibleByFive(15));   // bool(true)
var_dump(divisibleByFive(7));    // bool(false)
var_dump(divisibleByFive(-20));  // bool(true)
var_dump(divisibleByFive(0));    // bool(true)
?>