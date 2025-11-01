<?php
// 1. Variables with different data types

// String
$stringVar = "Hello, World!";

// Integer
$intVar = 42;

// Float/Double
$floatVar = 3.14159;

// Boolean
$boolVar = true;

// Array
$arrayVar = array("apple", "banana", "cherry", 123);

// Null
$nullVar = null;

// Object
class Person {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function displayInfo() {
        return "Name: " . $this->name . ", Age: " . $this->age;
    }
}

$objectVar = new Person("John Doe", 25);

// Resource (file handle example)
$resourceVar = fopen('temp.txt', 'w');
fwrite($resourceVar, "Test content");
rewind($resourceVar);

echo "<h2>PHP Data Types Demonstration</h2>";

// a. Print all data using echo and print
echo "<h3>a. Using echo and print:</h3>";
echo "<h4>Using echo:</h4>";
echo "String: " . $stringVar . "<br>";
echo "Integer: " . $intVar . "<br>";
echo "Float: " . $floatVar . "<br>";
echo "Boolean: " . ($boolVar ? 'true' : 'false') . "<br>";
echo "Null: " . (is_null($nullVar) ? 'null' : 'not null') . "<br>";

echo "<h4>Using print:</h4>";
print "String: " . $stringVar . "<br>";
print "Integer: " . $intVar . "<br>";
print "Float: " . $floatVar . "<br>";
print "Boolean: " . ($boolVar ? 'true' : 'false') . "<br>";

// b. Display content of array using print_r and var_dump
echo "<h3>b. Array content display:</h3>";

echo "<h4>Using print_r:</h4>";
echo "<pre>";
print_r($arrayVar);
echo "</pre>";

echo "<h4>Using var_dump:</h4>";
echo "<pre>";
var_dump($arrayVar);
echo "</pre>";

// Display object using print_r and var_dump
echo "<h4>Object display with print_r:</h4>";
echo "<pre>";
print_r($objectVar);
echo "</pre>";

echo "<h4>Object display with var_dump:</h4>";
echo "<pre>";
var_dump($objectVar);
echo "</pre>";

// c. Display result of checking data types
echo "<h3>c. Data Type Checking:</h3>";

echo "String variable type: " . gettype($stringVar) . "<br>";
echo "Integer variable type: " . gettype($intVar) . "<br>";
echo "Float variable type: " . gettype($floatVar) . "<br>";
echo "Boolean variable type: " . gettype($boolVar) . "<br>";
echo "Array variable type: " . gettype($arrayVar) . "<br>";
echo "Null variable type: " . gettype($nullVar) . "<br>";
echo "Object variable type: " . gettype($objectVar) . "<br>";
echo "Resource variable type: " . gettype($resourceVar) . "<br>";

echo "<h4>Detailed type checking:</h4>";

function checkDataType($variable, $variableName) {
    echo "$variableName: ";
    
    if (is_string($variable)) {
        echo "It's a string - Value: '$variable'";
    } elseif (is_int($variable)) {
        echo "It's an integer - Value: $variable";
    } elseif (is_float($variable)) {
        echo "It's a float - Value: $variable";
    } elseif (is_bool($variable)) {
        echo "It's a boolean - Value: " . ($variable ? 'true' : 'false');
    } elseif (is_array($variable)) {
        echo "It's an array - Count: " . count($variable) . " elements";
    } elseif (is_null($variable)) {
        echo "It's null";
    } elseif (is_object($variable)) {
        echo "It's an object - Class: " . get_class($variable);
    } elseif (is_resource($variable)) {
        echo "It's a resource - Type: " . get_resource_type($variable);
    } else {
        echo "Unknown data type";
    }
    echo "<br>";
}

// Check each variable type
checkDataType($stringVar, "stringVar");
checkDataType($intVar, "intVar");
checkDataType($floatVar, "floatVar");
checkDataType($boolVar, "boolVar");
checkDataType($arrayVar, "arrayVar");
checkDataType($nullVar, "nullVar");
checkDataType($objectVar, "objectVar");
checkDataType($resourceVar, "resourceVar");

// Additional type checking examples
echo "<h4>Using var_dump for detailed type information:</h4>";

echo "String: ";
var_dump($stringVar);
echo "<br>Integer: ";
var_dump($intVar);
echo "<br>Float: ";
var_dump($floatVar);
echo "<br>Boolean: ";
var_dump($boolVar);
echo "<br>Array: ";
var_dump($arrayVar);
echo "<br>Null: ";
var_dump($nullVar);

// Clean up - close the resource
fclose($resourceVar);
unlink('temp.txt'); // Remove temporary file

?>