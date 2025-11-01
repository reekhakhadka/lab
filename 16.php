<?php
function calculateCarsNeeded($numberOfPeople) {
    // Validate input
    if (!is_numeric($numberOfPeople) || $numberOfPeople < 0) {
        throw new InvalidArgumentException("Number of people must be a non-negative number");
    }
    
    $peoplePerCar = 5;
    
    // Handle edge case of 0 people
    if ($numberOfPeople == 0) {
        return 0;
    }
    
    // Calculate cars needed using ceiling function
    return (int) ceil($numberOfPeople / $peoplePerCar);
}

// Test the function
function testCarCalculation($people, $expected) {
    $result = calculateCarsNeeded($people);
    echo "People: $people | Cars needed: $result | Expected: $expected | " . 
         ($result == $expected ? "✓ PASS" : "✗ FAIL") . "\n";
}

// Test cases
testCarCalculation(7, 2);
testCarCalculation(10, 2);
testCarCalculation(11, 3);
testCarCalculation(0, 0);
?>