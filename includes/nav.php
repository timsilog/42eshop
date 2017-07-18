<?php
session_start();
foreach ($navItems as $item) 
{
	echo "<li><a href=\"$item[slug]\">$item[title]</a></li>";
}
if ($_SESSION[logged_in])
{
	echo "<li><a href=history.php>Order History</a></li>";
}

?>
