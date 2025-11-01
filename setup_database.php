<?php
// setup_database.php - Run this once to create database and table
include 'config.php';

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS login_system";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db('login_system');

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert sample user
$username = "admin";
$email = "admin@example.com";
$password = password_hash("password123", PASSWORD_DEFAULT);

$sql = "INSERT IGNORE INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Sample user created: admin / password123<br>";
    } else {
        echo "Sample user already exists<br>";
    }
} else {
    echo "Error creating user: " . $stmt->error . "<br>";
}

$stmt->close();
$conn->close();
?>