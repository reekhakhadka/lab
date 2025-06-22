<?php
try{
    $connect = new mysqli('localhost','root','','web_db');
    $sql = "select * from students";
    //execute queryand retrive result object
    $result = $connect->query($sql);
    $students = [];
    //fetch data and assign into $student variable
    while($student = $result->fetch_assoc()) {
        array_push($students,$student);
    }
}catch(Exception $ex) {
    die('Error: ' .$sex->getMessage());
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
    <h1>Table of student</h1>
    <table border="3" cellpadding="10" cellspacing="10"  width= 100%>
        <tr>
            <th>S.N</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>phone</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
        <?php foreach($students as $student){ ?>
        
        <tr>
            <td>SN</td>
            <td><?php echo $student['id']?></td>
             <td><?php echo $student['Name']?></td>
              <td><?php echo $student['Email']?></td>
               <td><?php echo $student['dob']?></td>
                <td><?php echo $student['phone']?></td>
                 <td><?php echo $student['course']?></td>
                 <td>
                 <a href="edit_student.php?id=<?php echo $student['id'] ?>">Edit</a>
                    <a href="delete_student.php?id=<?php echo $student['id'] ?>">Delete</a>
        </td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>