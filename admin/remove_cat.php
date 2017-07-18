<?php
if ($_POST[submit] == "Save" && $_POST[category])
{
	if (file_exists('../inventory/categories'))
	{
		$all = file_get_contents('../inventory/categories');
		if ($all)
		{
			$all = unserialize($all);
			foreach ($all as $key => $cat)
			{
				if ($cat == $_POST[category])
				{
					unset($all[$key]);
					file_put_contents('../inventory/categories', serialize($all));
					header('location: admin.php?removed_c='.urlencode($_POST[category]).'&val=1');
					return ;
				}
			}
			file_put_contents('../inventory/categories', serialize($all));
		}
	}
	header('location: admin.php?removed_c='.urlencode($_POST[category]).'&val=0');
	return ;
}
header('location: admin.php');
?>
