<pre>
  <?php
     //print_r($_server);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $err= [];
        if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $name=$_POST['name'];
    }else{
       $err['name']="Enter your name";
    }
    if(isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])){
        $address=$_POST['address'];
    }else{
        $err['address']="Enter your address";
    }
    if(isset($_POST['gender']) && !empty($_POST['gender']) && trim($_POST['gender'])){
        $address=$_POST['gender'];
    }else{
        $err['gender']="Choose your Gender";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        Form validation:
        Client side validation:html, javascript
        server side validation: PHP,NodeJS, Dotnet

        Steps for PHP validation
        -action attribute inside opening form tag
        -method attribute inside opening form tag
        -name attribute inside input, select, button, textarea tag

        method: kasari pathaune
        action: kata gayera submit hune
     --> 
    <h1> Registration Form</h1>
    <form action="" method="post"> 
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo isset($name)?$name: '' ?>">
        <?php echo isset($err['name'])?$err['name']:''?>
        <br />
        <label for="address">Address</label>
        <input type="text" name="address"
        value="<?php echo isset($address)?$address:'' ?>">
        <?php echo isset($err['address'])?$err['address']:''?>
        <br />
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <?php echo isset($err['gender'])?$err['gender']:''?>
        <br />
        <input type="submit" name="register" value="Register">
        
    </form>
</body>
</html>