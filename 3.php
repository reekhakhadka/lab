<?php
class Student {

    // Public properties
    public $name;
    public $surname;
    public $country;

    // Private property
    private $tuition = 50000;

    // Protected property
    protected $indexNumber = "BCA-078";

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Getter for surname
    public function getSurname() {
        return $this->surname;
    }

    // Public method
    public function helloWorld() {
        return "Hello World";
    }

    // Protected method
    protected function helloFamily() {
        return "Hello Family";
    }

    // Private method
    private function helloMe() {
        return "Hello me!";
    }

    // Private getter for tuition
    private function getTuition() {
        echo "Tuition Fee: " . $this->tuition . "<br>";
    }

    // Public method to access private methods internally
    public function callPrivateMethods() {
        echo $this->helloMe() . "<br>";
        $this->getTuition();
    }
}

// Subclass
class PartTimeStudent extends Student {

    // Public method calling protected method
    public function helloParent() {
        return $this->helloFamily();
    }
}

// Create Student object
$student = new Student();
$student->name = "Reekha";
$student->surname = "Khadka";
$student->country = "Nepal";

// Call Student methods
echo $student->getName() . "<br>";
echo $student->getSurname() . "<br>";
echo $student->helloWorld() . "<br>";
$student->callPrivateMethods();

echo "<br>";

// Create PartTimeStudent object
$ptStudent = new PartTimeStudent();
$ptStudent->name = "Basanta";
$ptStudent->surname = "Chapagain";
$ptStudent->country = "Nepal";

// Call PartTimeStudent methods
echo $ptStudent->getName() . "<br>";
echo $ptStudent->getSurname() . "<br>";
echo $ptStudent->helloWorld() . "<br>";
echo $ptStudent->helloParent() . "<br>";
?>