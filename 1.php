<?php
// Interface
interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

// Car class
class Car implements Vehicle {

    // Private properties (Encapsulation)
    private $make;
    private $model;
    private $year;

    // Constructor
    public function __construct($make, $model, $year) {
        $this->make  = $make;
        $this->model = $model;
        $this->year  = $year;
    }

    // Getters and Setters
    public function getMake() {
        return $this->make;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    // Methods
    public function start() {
        echo "Car started.<br>";
    }

    public function displayInfo() {
        echo "Make: $this->make, Model: $this->model, Year: $this->year<br>";
    }

    public function getDescription() {
        return "This is a car.";
    }

    // Interface methods
    public function startEngine() {
        echo "Engine started.<br>";
    }

    public function stopEngine() {
        echo "Engine stopped.<br>";
    }
}

// ElectricCar class
class ElectricCar extends Car {

    private $batteryCapacity;

    public function __construct($make, $model, $year, $batteryCapacity) {
        parent::__construct($make, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function charge() {
        echo "Electric car is charging.<br>";
    }

    // Overriding method
    public function getDescription() {
        return "This is an electric car with $this->batteryCapacity kWh battery.";
    }
}

// Object creation
$car = new Car("Toyota", "Corolla", 2022);
$car->start();
$car->displayInfo();
echo $car->getDescription() . "<br><br>";

$electricCar = new ElectricCar("Tesla", "Model 3", 2024, 75);
$electricCar->start();
$electricCar->displayInfo();
$electricCar->charge();
echo $electricCar->getDescription();
?>