<?php
try{
    $id= $_GET['id'];
    $connect = new mysqli('localhost','root','','web_db');
    $sql = "select * from students where id=$id";
    //execute query and retrive result object
    $result = $connect->query($sql);
    if ($result->num_rows != 1) {
        die('Invalid student Id');
    }
    $student = $result->fetch_assoc();
   //extract array key value into variable with value
    extract($student);
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
//check form submission event
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $err = [];
    //check empty data for name field
    if (isset($_POST['Name']) && !empty($_POST['Name'])
     && trim($_POST['Name'])){
        $Name = $_POST['Name'];
    } else  {
        $err['Name'] =   "Enter your name";
    }
    if (isset($_POST['Email']) && !empty($_POST['Email']) 
    && trim($_POST['Email'])){
        $Email =  $_POST['Email'];
    } else  {
        $err['Email'] = "Enter your email";
    }

    if (isset($_POST['dob']) && !empty($_POST['dob']) 
    && trim($_POST['dob'])){
        $dob =  $_POST['dob'];
    } else  {
        $err['dob'] = "Choose your dob";
    }

    if (isset($_POST['phone']) && !empty($_POST['phone']) 
    && trim($_POST['phone'])){
        $phone =  $_POST['phone'];
    } else  {
        $err['phone'] = "Choose your phone";
    }

    if (isset($_POST['course']) && !empty($_POST['course']) && trim($_POST['course'])){
        $course =  $_POST['course'];
    } else  {
        $err['course'] = "Choose your course";
    }

    if (count($err) == 0) {
       //process your data
      // $connect = new mysqli(host,db username,db password,dbname);
      try {
        //database connection
        $connect = new mysqli('localhost','root','','web_db');
        //integrate user entered data into sql query
        $sql = "update students set name='$Name',email='$Email',dob='$dob',course='$course',phone='$phone' where id=$id";
        //execute query
        $connect->query($sql);
        //check update state
        if ($connect->affected_rows == 1) {
            echo 'Student updated Successfully';
        }
      } catch (Exception $ex) {
        die('Error' . $ex->getMessage());
      }
       
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students</title>
</head>
<body>
    <h1>Edit Students</h1>
    <form action="" method="post">
        <label for="Name">Name</label>
        <input type="text" name="Name" 
        value="<?php echo isset($Name)?$Name:'' ?>">
        <?php echo isset($err['Name'])?$err['Name']:'' ?>
        <br />
        <label for="Email">Email</label>
        <input type="text" name="Email" 
        value="<?php echo isset($Email)?$Email:'' ?>">
        <?php echo isset($err['Email'])?$err['Email']:'' ?>
        <br />
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" 
        value="<?php echo isset($dob)?$dob:'' ?>">
        <?php echo isset($err['dob'])?$err['dob']:'' ?>
        <br />
        <label for="phone">Phone</label>
        <input type="text" name="phone" 
        value="<?php echo isset($phone)?$phone:'' ?>">
        <?php echo isset($err['phone'])?$err['phone']:'' ?>
        <br />
        <label for="course">Course</label>
        <input type="text" name="course" value="<?php echo isset($course)?$course:'' ?>">
        <?php echo isset($err['course'])?$err['course']:'' ?>
        <br />
         <br />
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>