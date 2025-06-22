<?php
//get student id from URL
$id = $_GET['id'];
try{
    $connect = new mysqli('localhost','root','','web_db');
    $sql = "delete from students where id=$id";
    $connect->query($sql);
    if($connect->affected_rows == 1) {
        echo "Delete success";
    }else {
        echo "Delete failed";

    }
}catch(Exception $ex) {
    die('Error:' .$ex->getMessage());
}
?>
