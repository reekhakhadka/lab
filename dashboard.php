<?php
// dashboard.php - Protected page that requires login
session_start();

// Check if user is logged in via session
if (!isset($_SESSION['user_id'])) {
    // Check if remember me cookie exists
    if (isset($_COOKIE['remember_me'])) {
        include 'config.php';
        
        $cookie_data = explode(':', $_COOKIE['remember_me']);
        $user_id = $cookie_data[0];
        $token = $cookie_data[1];
        
        // Verify cookie token
        $sql = "SELECT id, username, password FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verify token matches hashed password
            if (hash('sha256', $user['password']) === $token) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['login_time'] = time();
            } else {
                // Invalid token, redirect to login
                header("Location: login.php");
                exit();
            }
        } else {
            // User not found, redirect to login
            header("Location: login.php");
            exit();
        }
        
        $stmt->close();
        $conn->close();
    } else {
        // No session or cookie, redirect to login
        header("Location: login.php");
        exit();
    }
}

// Calculate session duration
$login_time = $_SESSION['login_time'];
$current_time = time();
$session_duration = $current_time - $login_time;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .user-info {
            background: #e9f7fe;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to Dashboard</h1>
        
        <div class="user-info">
            <h3>User Information</h3>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>User ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
            <p><strong>Session Started:</strong> <?php echo date('Y-m-d H:i:s', $_SESSION['login_time']); ?></p>
            <p><strong>Session Duration:</strong> <?php echo floor($session_duration / 60); ?> minutes</p>
        </div>
        
        <p>This is a protected page. You can only see this content if you are logged in.</p>
        
        <form action="logout.php" method="POST">
            <button type="submit" class="btn">Logout</button>
        </form>
    </div>
</body>
</html>