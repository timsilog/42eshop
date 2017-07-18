<?php
session_start();
$_SESSION[logged_in] = NULL;
$_SESSION[admin] = 0;
session_destroy();
header('location: index.php');
?>
