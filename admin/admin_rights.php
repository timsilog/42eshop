<?php
if (($_POST[give] || $_POST[remove]) && $_POST[login])
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
				{
					if ($_POST[give])
					{
						$user[admin] = 1;
						$gave = 1;
					}
					else if ($_POST[remove])
					{
						$user[admin] = 0;
						$gave = -1;
					}
				}
			}
		}
	}
	file_put_contents('../private/passwd', serialize($all));
	header('location: admin.php?admin='.$gave.'&user='.$_POST[login]);
	return ;
}
header('location: admin.php');
?>
