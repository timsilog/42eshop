<?php
if ($_POST[submit] == "Save" && $_POST[login])
{
	if (file_exists('../private/passwd'))
	{
		$all = file_get_contents('../private/passwd');
		if ($all)
		{
			$all = unserialize($all);
			foreach ($all as &$user)
			{
				if ($user[login] == $_POST[login])
					$user[admin] = 0;
			}
		}
	}
	file_put_contents('../private/passwd', serialize($all));
	header('location: admin.html');
	return ;
}
?>
