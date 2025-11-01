<?php
// Define constants OUTSIDE the function
define('SHAPE_TRIANGLE', 'triangle');
define('SHAPE_PARALLELOGRAM', 'parallelogram');

function calculateAreaV2($base, $height, $shape) {
    /**
     * Alternative version using defined constants for shape types.
     */
    
    $shape = strtolower($shape);
    
    // Input validation with type casting
    if (!is_numeric($base) || !is_numeric($height) || $base <= 0 || $height <= 0) {
        return false; // Return false for invalid inputs
    }
    
    // Cast to float to ensure numeric operations
    $base = (float)$base;
    $height = (float)$height;
    
    // Calculate area
    if ($shape === SHAPE_TRIANGLE) {
        return 0.5 * $base * $height;
    } elseif ($shape === SHAPE_PARALLELOGRAM) {
        return $base * $height;
    } else {
        return false; // Return false for unsupported shapes
    }
}

// Usage examples:
$area1 = calculateAreaV2(10, 5, "triangle");
echo "Triangle area: " . ($area1 !== false ? $area1 : "Invalid input") . "\n";

$area2 = calculateAreaV2(8, 6, "parallelogram"); 
echo "Parallelogram area: " . ($area2 !== false ? $area2 : "Invalid input") . "\n";

// Test the problematic cases:
$area3 = calculateAreaV2(10, 5, "triangle");
echo "Second call - Triangle area: " . ($area3 !== false ? $area3 : "Invalid input") . "\n";
?>