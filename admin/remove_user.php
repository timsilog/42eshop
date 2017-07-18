<?php
if ($_POST[submit] == "Save" && $_POST[login])
{
	if (file_exists('../private/passwd'))
	{
		$all = file_get_contents('../private/passwd');
		if ($all)
		{
			$all = unserialize($all);
			foreach ($all as $key => $user)
			{
				if ($user[login] == $_POST[login])
				{
					unset($all[$key]);
					file_put_contents('../private/passwd', serialize($all));
					header('location: admin.php?removed_u='.urlencode($_POST[login]).'&val=1');
					return ;
				}
			}
		}
	}
	file_put_contents('../private/passwd', serialize($all));
	header('location: admin.php?no_user='.urlencode($_POST[login]));
	return ;
}
header('location: admin.php');
?>
