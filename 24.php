<?php
function convertLastThreeToUpper($str) {
    $length = strlen($str);
    
    // If string length is less than 3, convert entire string to uppercase
    if ($length < 3) {
        return strtoupper($str);
    }
    
    // Extract parts of the string
    $firstPart = substr($str, 0, $length - 3);  // Everything except last 3 characters
    $lastThree = substr($str, -3);              // Last 3 characters
    
    // Convert last 3 characters to uppercase and combine
    return $firstPart . strtoupper($lastThree);
}

// Test with sample inputs
$testStrings = ["Nepal", "Npl", "Bca", "Bachelor"];

echo "Sample Input and Output:\n";
echo "===\n";

foreach ($testStrings as $string) {
    $result = convertLastThreeToUpper($string);
    echo "Input: {$string} → Output: {$result}\n";
}
?>