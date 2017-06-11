<?php
include "auth.php";

session_start();
if (auth($_POST[login], $_POST[passwd]))
	$_SESSION[logged_in] = $_POST[login];
else
{
	$_SESSION[logged_in] = '';
	header('location: index.php?err=nouser');
	return ;
}
header('location: index.php');
?>
