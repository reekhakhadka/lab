<?php
function addIfFront($str) {
    // Simple version that matches the sample output exactly
    if (substr($str, 0, 2) === 'if') {
        return $str;
    } else {
        return 'if ' . $str;
    }
}

// Test with the exact sample inputs
$sampleInputs = [
    "if else",
    "else",
    "if"
];

echo "Sample Output:\n";
foreach ($sampleInputs as $input) {
    echo addIfFront($input) . "\n";
}
?>