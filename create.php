<?php
if (($_POST[submit] == "Submit" || $_POST[submit] == "Save") && $_POST[login] && $_POST[passwd])
{
	$pw = hash('whirlpool', $_POST[passwd]);
	$account = array('login' => $_POST[login], 'passwd' => $pw, 'admin' => '0');
	if (!file_exists('./private'))
		mkdir("./private");
	if (file_exists('./private/passwd'))
	{
		$all = file_get_contents('./private/passwd');
		if ($all)
		{
			$all = unserialize($all);
			foreach ($all as $user)
			{
				if ($user[login] == $_POST[login])
				{
					if ($_POST[submit] == "Submit")
					{
						header('location: new_account.php?err=usertaken');
						return ;
					}
					else
					{
						header('location: admin/admin.php?user_exists='.$_POST[login]);
						return ;
					}
				}
			}
		}
	}
	$all[] = $account;
	file_put_contents('./private/passwd', serialize($all));
	if ($_POST[submit] == "Submit")
		header('location: new_account.php?create=1&user='.$_POST[login]);
	else
		header('location: admin/admin.php?create=1&user='.$_POST[login]);
	return ;
}
else if (($_POST[submit] == "Submit" || $_POST[submit] == "Save") && (!$_POST[login] || !$_POST[passwd]))
{
	if ($_POST[submit] == "Save")
		header('location: admin/admin.php');
	else
		header('location: new_account.php');
	return ;
}
?>
