<pre>
    <?php
    $student = ['name' => 'Ranju',
    'address' => 'KTM','course' => 'BCA','roll' => 20,'college' => 'PKMC'];
    print_r($student);
   // echo 'Name is ' . $student['name'];
    ?>
    <table border="1" width="50%">
        <?php foreach($student as $key =>$value){ ?>
         <tr>
            <th><?php echo ucfirst($key); ?></th>
            <td><?php echo $value; ?></td>
        </tr>
        <?php } ?>
    </table>
        