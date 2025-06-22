<?php
// Start the session
session_start();

// Store data in session
if (isset($_POST['store'])) {
    $_SESSION['username'] = $_POST['username'];
    echo "<p style='color:green;'>Session data stored successfully.</p>";
}

// Retrieve session data
if (isset($_POST['retrieve'])) {
    if (isset($_SESSION['username'])) {
        echo "<p>Stored Username: <strong>" . htmlspecialchars($_SESSION['username']) . "</strong></p>";
    } else {
        echo "<p style='color:red;'>No session data found.</p>";
    }
}

// Destroy session
if (isset($_POST['destroy'])) {
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
    echo "<p style='color:orange;'>Session destroyed successfully.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Demo</title>
</head>
<body>
    <h2>PHP Session Management</h2>

    <form method="post" action="">
        <label>Enter Username:</label>
        <input type="text" name="username" required><br><br>

        <input type="submit" name="store" value="Store Session">
        <input type="submit" name="retrieve" value="Retrieve Session">
        <input type="submit" name="destroy" value="Destroy Session">
    </form>
</body>
</html>