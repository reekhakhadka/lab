<?php
if (isset($_POST['submit'])) {
    // Collect form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
    $phone = trim($_POST['phone']);

    $errors = [];

    // Validate username (minimum 8 characters)
    if (strlen($username) < 8) {
        $errors[] = "❌ Username must be at least 8 characters long.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "❌ Invalid email address.";
    }

    // Validate date of birth (check valid date format)
    if (!DateTime::createFromFormat('Y-m-d', $dob)) {
        $errors[] = "❌ Invalid date of birth format. Use YYYY-MM-DD.";
    }

    // Validate phone (only digits and valid length)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "❌ Phone number must be 10 digits long.";
    }

    // If no errors, store data
    if (empty($errors)) {
        // (Optional) Save to file or database
        $data = "Username: $username | Email: $email | DOB: $dob | Phone: $phone\n";
        file_put_contents("users.txt", $data, FILE_APPEND);

        echo "✅ Registration successful!<br>";
        echo "User details saved to <b>users.txt</b>";
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Date of Birth: <input type="date" name="dob" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>