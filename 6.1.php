<?php
if (isset($_POST['register'])) {
    $conn = new mysqli("localhost", "root", "", "web_db");
    if ($conn->connect_error) die("Connection failed");

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql)) echo "<p style='color:green;'>Registered successfully.</p>";
    else echo "<p style='color:red;'>Error: " . $conn->error . "</p>";

    $conn->close();
}
?>

<h2>User Registration</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="register" value="Register">
</form>