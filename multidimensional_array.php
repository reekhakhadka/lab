<?php
 $student = [20,'rina','Ktm','BCA'];
 $students =[
    [20,'rina','Ktm','BCA'],
    [20,'mina','Ktm','BCA'],
    [20,'tina','Ktm','BCA'],
 ];
    print_r($students);
    echo $students[2][2];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h1>Table Example</h1>
    <table border="1" width="100%">
        <tr>
            <th>SN</th>
            <th>Roll</th>
            <th>Name</th>
            <th>Address</th>
            <th>Course</th>
        </tr>
        <?php for($i = 0; $i < count($students);$i++){ ?>
        <tr>
            <td><?php echo $i+1 ?></td>
            <td><?php echo $students[$i][0] ?></td>
            <td><?php echo $students[$i][1] ?></td>
            <td><?php echo $students[$i][2] ?></td>
            <td><?php echo $students[$i][3] ?></td>
        </tr>

        <?php } ?>
        </table>
 </body>
 </html>