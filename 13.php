<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bca_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Get username from AJAX request
$user = $_GET['username'] ?? '';

// Check in database
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "found"; // username exists
} else {
    echo "available"; // username not found
}

$stmt->close();
$conn->close();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'])) {
    // PHP logic
    echo "available"; // or found
    exit; // 🚨 MUST stop execution
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Username Check for Password Reset</title>
    <style>
        .available { color: green; }
        .not-available { color: red; }
    </style>
</head>
<body>

<h2>Password Reset</h2>

<form>
    Username:<br>
    <input type="text" id="username" onkeyup="checkUsername()"><br>
    <span id="status"></span>
</form>

<script>
function checkUsername() {
    var username = document.getElementById("username").value;
    if(username === "") {
        document.getElementById("status").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "13.php?username=" + username, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            var result = xhr.responseText;
            if(result === "available") {
                document.getElementById("status").innerHTML = "Username is available";
                document.getElementById("status").className = "available";
            } else {
                document.getElementById("status").innerHTML = "Username not found";
                document.getElementById("status").className = "not-available";
            }
        }
    };
    xhr.send();
}
</script>

</body>
</html>