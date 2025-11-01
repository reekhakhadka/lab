<?php
function minutesToSeconds($minutes) {
    // Validate input is numeric
    if (!is_numeric($minutes)) {
        throw new InvalidArgumentException("Input must be a number");
    }
    
    return $minutes * 60;
}

try {
    echo minutesToSeconds(10) . "\n";   
    echo minutesToSeconds(2.5) . "\n";  
    echo minutesToSeconds("3") . "\n";   
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
?>