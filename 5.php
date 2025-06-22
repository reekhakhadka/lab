<?php
// Store cookie
if (isset($_POST['store'])) {
    $username = $_POST['username'];
    setcookie("username", $username, time() + (86400 * 7)); // 7 days
    echo "<p style='color:green;'>Cookie stored successfully.</p>";
}

// Retrieve cookie
if (isset($_POST['retrieve'])) {
    if (isset($_COOKIE['username'])) {
        echo "<p>Stored Cookie Value: <strong>" . htmlspecialchars($_COOKIE['username']) . "</strong></p>";
    } else {
        echo "<p style='color:red;'>No cookie found.</p>";
    }
}

// Destroy cookie
if (isset($_POST['destroy'])) {
    setcookie("username", "", time() - 3600); // Expire the cookie
    echo "<p style='color:orange;'>Cookie destroyed successfully.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Demo</title>
</head>
<body>
    <h2>PHP Cookie Management</h2>

    <form method="post" action="">
        <label>Enter Username:</label>
        <input type="text" name="username" required><br><br>

        <input type="submit" name="store" value="Store Cookie">
        <input type="submit" name="retrieve" value="Retrieve Cookie">
        <input type="submit" name="destroy" value="Destroy Cookie">
    </form>
</body>
</html>