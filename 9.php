<!DOCTYPE html>
<html>
<head>
    <title>Registration Form Validation</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body { font-family: Arial; }
        input, select, textarea { margin-bottom: 8px; width: 250px; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>

<h2>Registration Form</h2>

<form id="regForm">

    Name:<br>
    <input type="text" id="name"><br>
    <span class="error" id="nameErr"></span><br>

    Address:<br>
    <textarea id="address"></textarea><br>
    <span class="error" id="addressErr"></span><br>

    Username:<br>
    <input type="text" id="username"><br>
    <span class="error" id="usernameErr"></span><br>

    Email:<br>
    <input type="text" id="email"><br>
    <span class="error" id="emailErr"></span><br>

    Password:<br>
    <input type="password" id="password"><br>
    <span class="error" id="passwordErr"></span><br>

    Website:<br>
    <input type="text" id="website"><br><br>

    Phone:<br>
    <input type="text" id="phone"><br>
    <span class="error" id="phoneErr"></span><br>

    Gender:<br>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female<br>
    <span class="error" id="genderErr"></span><br>

    Course:<br>
    <select id="course">
        <option value="">-- Select Course --</option>
        <option value="BCA">BCA</option>
        <option value="BIM">BIM</option>
        <option value="CSIT">CSIT</option>
    </select><br>
    <span class="error" id="courseErr"></span><br><br>

    <button type="submit">Register</button>
</form>

<script>
$(document).ready(function(){

    $("#regForm").submit(function(e){
        e.preventDefault();

        $(".error").text(""); // clear errors
        let valid = true;

        // Name validation
        let name = $("#name").val();
        if(name === "" || /\d/.test(name)){
            $("#nameErr").text("Name must not be empty and contain no numbers.");
            valid = false;
        }

        // Address validation
        if($("#address").val() === ""){
            $("#addressErr").text("Address is required.");
            valid = false;
        }

        // Username validation
        let username = $("#username").val();
        if(username === "" || !/^[a-zA-Z0-9_]+$/.test(username)){
            $("#usernameErr").text("Username must not contain spaces or special characters.");
            valid = false;
        }

        // Email validation
        let email = $("#email").val();
        if(email === "" || !email.includes("@")){
            $("#emailErr").text("Enter a valid email address.");
            valid = false;
        }

        // Password validation
        let password = $("#password").val();
        let passPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
        if(!passPattern.test(password)){
            $("#passwordErr").text("Password must be 8+ chars with upper, lower, digit & special char.");
            valid = false;
        }

        // Phone validation
        let phone = $("#phone").val();
        if(phone === "" || !/^(98|97|96)\d{8}$/.test(phone)){
            $("#phoneErr").text("Phone must start with 98/97/96 and contain only numbers.");
            valid = false;
        }

        // Gender validation
        if(!$("input[name='gender']:checked").val()){
            $("#genderErr").text("Please select gender.");
            valid = false;
        }

        // Course validation
        if($("#course").val() === ""){
            $("#courseErr").text("Please select a course.");
            valid = false;
        }

        if(valid){
            alert("Registration Successful!");
        }
    });

});
</script>

</body>
</html>