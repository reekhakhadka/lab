<?php
function frontFour($str) {
    if (strlen($str) < 2) {
        return $str;
    }
    
    $front = substr($str, 0, 2);
    return $front . $front . $front . $front;
}

// Sample inputs
$inputs = ["C Sharp", "JS", "a"];

echo "Sample Output:\n";
foreach ($inputs as $input) {
    echo frontFour($input) . "\n";
}
?>