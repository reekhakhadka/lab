<?php
 $age = 30;
 echo gettype($age);
 echo 'br />';
 $weight = 60.5;
 echo gettype($weight);
 echo '<br />';
 //boolean
 $married = false;
 echo gettype($married);
 echo '<br />';
 //null
 $study = null;
 echo gettype($study);
 echo '<br />';
 //array
 $students = ['Reekha', 'Sandhya', 'Rita' ];
 echo gettype($students);
 echo '<br />';
 //object
 class student{

 }
 $ram = new Student();
 echo gettype($ram);
 echo '<br />';
 //string
 $Reekha = "Reekha Khadka";
 echo gettype($Reekha);
 echo '<br />';
?>
