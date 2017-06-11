<?php
session_start();
function auth($login, $passwd)
{
	$pw = hash('whirlpool', $passwd);
	if (!$all = file_get_contents('./private/passwd'))
		return (0);
	$all_users = unserialize($all);
	foreach ($all_users as $user)
	{
		if ($user[login] == $login && $user[passwd] == $pw)
		{
			if ($user[admin])
				$_SESSION[admin] = 1;
			return (1);
		}
	}
	return (0);
}
?>
