<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Student Registration</h2>

    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" pattern="[0-9]{10}" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female<br><br>

        <label>Faculty:</label>
        <select name="faculty" required>
            <option value="">Select Faculty</option>
            <option value="Science">Science</option>
            <option value="Management">Management</option>
            <option value="Humanities">Humanities</option>
        </select><br><br>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    // Handle form submission
    if (isset($_POST['submit'])) {
        // Database connection
        $conn = new mysqli("localhost", "root", "", "web_db");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch and sanitize inputs
        $name     = $conn->real_escape_string($_POST['name']);
        $email    = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // secure password
        $phone    = $conn->real_escape_string($_POST['phone']);
        $gender   = $conn->real_escape_string($_POST['gender']);
        $faculty  = $conn->real_escape_string($_POST['faculty']);

        // Insert data
        $sql = "INSERT INTO registrations (name, email, password, phone, gender, faculty)
                VALUES ('$name', '$email', '$password', '$phone', '$gender', '$faculty')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Registration successful!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>