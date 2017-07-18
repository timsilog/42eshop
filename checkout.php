<?php
session_start();
if ($_SESSION[logged_in])
{
	$all = file_get_contents('private/passwd');
	$all = unserialize($all);
	foreach ($all as &$user)
	{
		if ($user[login] == $_SESSION[logged_in])
		{
			$user[history][] = $_SESSION[cart];
			unset($user);
			unset($_SESSION[cart]);
			file_put_contents('private/passwd', serialize($all));
		}
	}
}
header('location: index.php');
?>
