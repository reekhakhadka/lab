<?php
// Base class
class User {

    // Protected properties
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    // Constructor
    public function __construct($name, $surname, $username) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    // Check if admin
    public function isAdmin() {
        return $this->is_admin;
    }

    // Print full name
    public function printFullName() {
        if ($this->is_admin) {
            echo $this->name . " " . $this->surname . " (admin)<br>";
        } else {
            echo $this->name . " " . $this->surname . "<br>";
        }
    }
}

// AdminUser class
class AdminUser extends User {

    // Constructor
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }
}

// Customer class
class Customer extends User {

    // Private properties
    private $city;
    private $state;
    private $country;

    // Constructor (same as parent)
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
    }

    // Setters and getters
    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }

    // Location method
    public function location() {
        return $this->city . ", " . $this->state . ", " . $this->country;
    }
}

// Create objects
$user = new User("Reekha", "Khadka", "reekha01");
$admin = new AdminUser("Basanta", "Chapagain", "admin01");

$customer = new Customer("Sita", "Sharma", "sita123");
$customer->setCity("Kathmandu");
$customer->setState("Bagmati");
$customer->setCountry("Nepal");

// Output
$user->printFullName();
echo "Is Admin: " . ($user->isAdmin() ? "Yes" : "No") . "<br><br>";

$admin->printFullName();
echo "Is Admin: " . ($admin->isAdmin() ? "Yes" : "No") . "<br><br>";

$customer->printFullName();
echo "Is Admin: " . ($customer->isAdmin() ? "Yes" : "No") . "<br>";
echo "Location: " . $customer->location();
?>