<?php
include "auth.php";

session_start();
if (auth($_POST[login], $_POST[passwd]))
{
	$_SESSION[logged_in] = $_POST[login];
}
else
{
	$_SESSION[logged_in] = '';
	echo "That username doesn't exist!\n";
	echo "<br><a href='index.html'>Go back</a>";
}
header('location: index.php');
?>
