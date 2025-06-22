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
    if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
        $email=$_POST['email'];
    }else{
        $err['email']="Enter your E-mail";
    }
    if(isset($_POST['dob']) && !empty($_POST['dob']) && trim($_POST['dob'])){
        $dob=$_POST['dob'];
    }else{
        $err['dob']="Enter your DOB";
    }
    if(isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone'])){
        $phone=$_POST['phone'];
    }else{
        $err['phone']="Enter your Phone";
    }
    if(isset($_POST['course']) && !empty($_POST['course']) && trim($_POST['course'])){
        $course=$_POST['course'];
    }else{
        $err['course']="Choose your Course";
    }
    if(count($err)==0){
        //process your data
        //$connect=new mysqli(host,db,username,dbpassword,dbname);
        try{
            //database connection
            $connect=new mysqli('localhost','root','','web_db');
            //integer user entered data into sql query
            $sql="insert into students(name,email,dob,phone,course) values('$name','$email',
            '$dob',$phone,'$course')";
            $connect->query($sql);
            if($connect->affected_rows == 1 && $connect->insert_id >0){
                echo 'student added successfully';
            }
        }
        catch(Exception $ex){
              die('Error' .$ex->getMessage());
        }
        
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
    <h1> Student ID</h1>
    <form action="" method="post"> 
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo isset($name)?$name: '' ?>">
        <?php echo isset($err['name'])?$err['name']:''?>
        <br />
        <label for="email">E-mail</label>
        <input type="text" name="email" value="email">
        <?php echo isset($err['email'])?$err['email']:''?>
        <br />
        <label for="dob">DOB</label>
        <input type="date" name="dob"
        value="<?php echo isset($dob)?$dob:'' ?>">
        <?php echo isset($err['dob'])?$err['dob']:''?>
        <br />
        <label for="phone">Phone</label>
        <input type="int" name="phone"
        value="<?php echo isset($phone)?$phone:'' ?>">
        <?php echo isset($err['phone'])?$err['phone']:''?>
        <br />
        <label for="course">Course</label>
        <input type="text" name="course"
        value="<?php echo isset($course)?$course:'' ?>">
        <?php echo isset($err['course'])?$err['course']:''?>
        <br />
        
        <input type="submit" name="register" value="Register">
        
    </form>
</body>
</html>