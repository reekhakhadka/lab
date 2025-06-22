<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>

    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>

    <?php
    if (isset($_POST['login'])) {
        // Connect to database
        $conn = new mysqli("localhost", "root", "", "web_db");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get inputs
        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        // Fetch user by email
        $sql = "SELECT * FROM registrations WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['password'])) {
                echo "<p style='color:green;'>Login successful. Welcome, " . htmlspecialchars($row['name']) . "!</p>";
            } else {
                echo "<p style='color:red;'>Incorrect password.</p>";
            }
        } else {
            echo "<p style='color:red;'>User not found.</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>