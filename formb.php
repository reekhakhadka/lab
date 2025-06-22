<pre>
    <?php
    // check form submission event
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //check empty data for name field
        if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        echo 'Name is ' . $_POST['name'];
    } else {
      echo "Enter your name";
    }
        if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POS['address'])) {
        echo 'address is ' . $_POST['name'];
    } else {
      echo "Enter your address";
    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
   Form validation:
   Client side validation:html5,javascript
   Server side validation: PHP

   Steps for PHP validation
     -action attribute inside opening form tag
     -method attribute inside opening form tag
     -name attibute inside input,select, button, textarea tag
-->
   <h1>Registration Form</h1>
   <form action="" method="post">
       <label for="name">Name</label>
        <input type="text" name="name" 
        value="<?php echo isset($name)?$name:'' ?>">
        <?php echo isset($err['name'])?$err['name']:'' ?>
        <br />
        <label for="address">Address</label>
        <input type="text" name="address"
        value="<?php echo isset($address)?$address:'' ?>">
        <?php echo isset($err['address'])?$err['address']:'' ?>
        <br />
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <?php echo isset($err['gender'])?$err['gender']:'' ?>
        <br />
        <input type="submit" name="register" value="Register">
</form>
</body>
</html>