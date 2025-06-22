<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
<p>This is your dashboard.</p>
<a href="6.4.php">Logout</a>