<?php
function addCharacters($str) {
    // Get the first 3 characters (or fewer if string is shorter)
    if (strlen($str) >= 3) {
        $firstThree = substr($str, 0, 3);
    } else {
        $firstThree = $str;
    }
    
    // Return the new string with characters added at front and back
    return $firstThree . $str . $firstThree;
}

// Test the function with sample inputs
$testStrings = ["Python", "JS", "Code"];

foreach ($testStrings as $testString) {
    echo addCharacters($testString) . "\n";
}
?>