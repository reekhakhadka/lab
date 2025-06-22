<?php
//start session to store session data
session_start();
echo session_id();
//store session data with user information
$_SESSION['name'] = 'Reekha khadka';
print_r($_SESSION);
//access session data
$welcome='welcome'
// DESTROY SESSION
session_destroy();
//remove php variable
unset($_SESSION);
print_r($_SESSION);
echo session_id();
?>