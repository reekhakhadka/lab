<?php
function compareLength($str1, $str2) {
    /**
     * Returns true if the total number of characters in the first string 
     * equals the total number of characters in the second string, false otherwise.
     */
    return strlen($str1) === strlen($str2);
}

// Examples:
var_dump(compareLength("hello", "world"));    // bool(true) - both have 5 characters
var_dump(compareLength("cat", "kitten"));     // bool(false) - 3 vs 6 characters
var_dump(compareLength("", ""));              // bool(true) - both empty
var_dump(compareLength("test", "exam"));      // bool(true) - both have 4 characters
?>