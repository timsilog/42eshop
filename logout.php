<?php
session_start();
$_SESSION[logged_in] = NULL;
$_SESSION[admin] = 0;
header('location: index.php');
?>
