<?php
// Interface
interface HasInfo {
    public function getInfo();
}

// Address class
class Address implements HasInfo {

    public $street;
    public $number;
    public $city;

    public function __construct($street, $number, $city) {
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    public function getInfo() {
        return "Address: street $this->street, number $this->number, city $this->city";
    }
}

// Phone class
class Phone implements HasInfo {

    public $prefix;
    public $number;

    public function __construct($prefix, $number) {
        $this->prefix = $prefix;
        $this->number = $number;
    }

    public function getInfo() {
        return "Number: $this->prefix/$this->number";
    }
}

// User class
class User implements HasInfo {

    public $name;
    public $surname;

    private $address;
    private $phone;

    public function __construct($name, $surname, Address $address, Phone $phone) {
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getInfo() {
        return "User: $this->name $this->surname " .
               $this->address->getInfo() . " " .
               $this->phone->getInfo();
    }
}

// Create objects
$address = new Address("Putalisadak", 12, "Kathmandu");
$phone   = new Phone("+977", "9812345678");
$user    = new User("Reekha", "Khadka", $address, $phone);

// Call getInfo method
echo $user->getInfo();
?>