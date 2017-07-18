<?php
if ($_POST[submit] == "Save" && $_POST[old_u] && $_POST[new_u])
{
	if (!$all = file_get_contents('../private/passwd'))
	{
		header('location: admin.php?no_accounts=1');
		return ;
	}
	$all = unserialize($all);
	foreach ($all as $user)
	{
		if ($user[login] == $_POST[new_u])
		{
			file_put_contents('../private/passwd', serialize($all));
			header('location: admin.php?user_exists='.urlencode($_POST[new_u]));
			return ;
		}
	}
	foreach ($all as &$user)
	{
		if ($user[login] == $_POST[old_u])
		{
			$user[login] = $_POST[new_u];
			$all[] = $account;
			file_put_contents('../private/passwd', serialize($all));
			header('location: admin.php?old_u='.urlencode($_POST[old_u]).'&new_u='.urlencode($_POST[new_u]));
			return ;
		}
	}
	header('location: admin.php?no_user='.urlencode($_POST[old_u]));
	return ;
}
header('location: admin.php');
?>
