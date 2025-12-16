 <?php
class Bicycle {

    // Public properties
    public $brand;
    public $model;
    public $year;
    public $description = "Used bicycle"; // default value
    public $weight; // stored in grams

    // Setter for weight
    public function setWeight($weight) {
        $this->weight = $weight;
    }

    // Getter: get bike information
    public function getInfo() {
        return "$this->brand $this->model ($this->year)";
    }

    // Getter: get weight
    // false = grams (default), true = kilograms
    public function getWeight($kg = false) {
        if ($kg) {
            return $this->weight / 1000 . " kg";
        } else {
            return $this->weight . " g";
        }
    }
}

// Create first object
$bike1 = new Bicycle();
$bike1->brand = "Giant";
$bike1->model = "Escape 3";
$bike1->year = 2021;
$bike1->description = "Road bicycle";
$bike1->setWeight(12000);

// Create second object
$bike2 = new Bicycle();
$bike2->brand = "Trek";
$bike2->model = "Marlin 5";
$bike2->year = 2023;
$bike2->setWeight(14500);

// Print information
echo $bike1->getInfo() . "<br>";
echo "Weight (kg): " . $bike1->getWeight(true) . "<br>";
echo "Weight (g): " . $bike1->getWeight() . "<br><br>";

echo $bike2->getInfo() . "<br>";
echo "Weight (kg): " . $bike2->getWeight(true) . "<br>";
echo "Weight (g): " . $bike2->getWeight() . "<br>";
?>