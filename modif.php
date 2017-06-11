<?php
if (($_POST[submit] == "OK" || $_POST[submit] == "Save") && $_POST[login] && $_POST[oldpw] && $_POST[newpw])
{
	$npw = hash('whirlpool', $_POST[newpw]);
	$opw = hash('whirlpool', $_POST[oldpw]);
	if (!file_exists('./private/passwd'))
	{
		header('location: index.php');
		return ;
	}
	if (!$all = file_get_contents('./private/passwd'))
	{
		if ($_POST[submit] == "OK")
			header('location: change_pw.php?err=no_accounts');
		else
			header('location: admin/admin.php?no_accounts=1');
		return ;
	}
	$all = unserialize($all);
	foreach ($all as &$user)
	{
		if ($user[login] == $_POST[login] && $user[passwd] != $opw)
		{
			if ($_POST[submit] == "OK")
				header('location: change_pw.php?err=wrongpw');
			else
				header('location: admin/admin.php?wrongpw='.$_POST[login]);
			return ;

		}
		if ($user[login] == $_POST[login] && $user[passwd] == $opw)
		{
			$user[passwd] = $npw;
			file_put_contents('./private/passwd', serialize($all));
			if ($_POST[submit] == "OK")
				header('location: index.php?change=1');
			else
				header('location: admin/admin.php?changedpw='.$_POST[login]);
			return ;
		}
	}
	file_put_contents('./private/passwd', serialize($all));
	if ($_POST[submit] == "OK")
		header('location: change_pw.php?no_user='.$_POST[login]);
	else
		header('location: admin/admin.php?no_user='.$_POST[login]);
	return ;
}
if ($_POST[submit] == "OK")
	header('location: change_pw.php?');
else
	header('location: admin/admin.php');
return ;
?>
