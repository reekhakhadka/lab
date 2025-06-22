<?php
session_start();
session_unset();
session_destroy();
header("Location: 6.2.php");
exit;