<?php
$validUser = "admin";
$validPass = "Admin@123";

$userid = $_POST['userid'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($userid === $validUser && $password === $validPass) {
        echo "success";
    } else {
        echo "error";
    }
    exit; // 🚨 VERY IMPORTANT
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AJAX Login Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial; }
        input { margin-bottom: 8px; width: 200px; }
        .error { color: red; }
        .welcome { color: green; font-weight: bold; }
    </style>
</head>
<body>

<h2>Login Form</h2>

<form id="loginForm">
    UserID:<br>
    <input type="text" id="userid" name="userid"><br>
    Password:<br>
    <input type="password" id="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<div id="message"></div>

<script>
$(document).ready(function(){

    $("#loginForm").submit(function(e){
        e.preventDefault(); // prevent default form submission

        var userid = $("#userid").val();
        var password = $("#password").val();

        $.ajax({
            url: "login.php",
            type: "POST",
            data: { userid: userid, password: password },
            success: function(response){
                if(response === "success"){
                    $("#loginForm").hide();
                    $("#message").html("<p class='welcome'>Welcome, " + userid + "!</p>");
                } else {
                    $("#message").html("<p class='error'>Invalid credentials. Try again.</p>");
                }
            }
        });

    });

});
</script>

</body>
</html>