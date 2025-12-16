<?php
// Interface
interface Shape {
    public function calculateArea();
}

// Circle class
class Circle implements Shape {

    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}

// Square class
class Square implements Shape {

    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function calculateArea() {
        return $this->side * $this->side;
    }
}

// Create objects
$circle = new Circle(7);
$square = new Square(5);

// Print areas
echo "Circle Area: " . $circle->calculateArea() . "<br>";
echo "Square Area: " . $square->calculateArea();
?>