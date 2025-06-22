<?php
$students = ['Rojina', 'Ranjit', 'Sanjit'];
for ($i=0; $i < count($students); $i++) {
echo '<li>'. $students[$i] . '</li>';

}
echo '</o>';
$info = ['roll' => 20, 'name' => 'Rita', 'address' =>'PKR', 'temp_address' => 'KTM', 'Phone' => 9843749680];
echo 'My roll is '. $info['roll'];
echo '<br>My name is '. $info['name'];
echo '<br>My address is '. $info['address'];
echo '<br>My temp address is '. $info['temp_address'];
echo '<br>My phone is '. $info['phone'];

?>