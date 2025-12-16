<?php
class Product {

    // Properties
    private $description;
    private $quantity;
    private $price;

    // Constructor with validation
    public function __construct($description, $quantity, $price) {

        if (!is_string($description)) {
            echo "Error: Description must be a string.<br>";
        } else {
            $this->description = $description;
        }

        if (!is_numeric($quantity)) {
            echo "Error: Quantity must be a number.<br>";
        } else {
            $this->quantity = $quantity;
        }

        if (!is_numeric($price)) {
            echo "Error: Price must be a number.<br>";
        } else {
            $this->price = $price;
        }
    }

    // Setter & Getter for description
    public function setDescription($description) {
        if (is_string($description)) {
            $this->description = $description;
        }
    }

    public function getDescription() {
        return $this->description;
    }

    // Setter & Getter for quantity
    public function setQuantity($quantity) {
        if (is_numeric($quantity)) {
            $this->quantity = $quantity;
        }
    }

    public function getQuantity() {
        return $this->quantity;
    }

    // Setter & Getter for price
    public function setPrice($price) {
        if (is_numeric($price)) {
            $this->price = $price;
        }
    }

    public function getPrice() {
        return $this->price;
    }

    // Calculate total price
    public function calculatePrice() {
        return $this->quantity * $this->price;
    }
}

// Create object
$product = new Product("Laptop", 2, 85000);

// Print properties
echo "Description: " . $product->getDescription() . "<br>";
echo "Quantity: " . $product->getQuantity() . "<br>";
echo "Price: " . $product->getPrice() . "<br>";

// Print total price
echo "Total Price: " . $product->calculatePrice();
?>