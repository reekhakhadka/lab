<pre>
<?php
$students = [
    ['name' => 'Ranju',
    'address' => 'KTM','course' => 'BCA','roll' => 20,'college' => 'PKMC'],
    ['name' => 'Manju',
    'address' => 'PKR','course' => 'BSC','roll' => 23,'college' => 'PKMC'],
    ['name' => 'Anju',
    'address' => 'LPT','course' => 'BBA','roll' => 21,'college' => 'PKMC'],
];
print_r($students);
?>
 <table border="1" width="50%">
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Address</th>
        <th>Course</th>
        <th>Collage</th>
</tr>
        

        <?php foreach($students as $key =>$student){ ?>
         <tr>
            <td><?php echo ucfirst($key); ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['roll']; ?></td>
            <td><?php echo $student['address']; ?></td>
            <td><?php echo $student['course']; ?></td>
            <td><?php echo $student['college']; ?></td>
        </tr>
        <?php } ?>
    </table>