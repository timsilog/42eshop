<?php
if ($_POST[submit] == "Save" && $_POST[category])
{
	if (!file_exists('../inventory'))
		mkdir("../inventory");
	if (file_exists('../inventory/categories'))
	{
		$all = file_get_contents('../inventory/categories');
		if ($all)
		{
			$all = unserialize($all);
			foreach ($all as $cat)
			{
				if ($cat == $_POST[category])
				{
					header('location: admin.php?added_c='.$_POST[category].'&val=0');
					return ;
				}
			}
		}
	}
	$all[] = $_POST[category];
	file_put_contents('../inventory/categories', serialize($all));
	header('location: admin.php?added_c='.$_POST[category].'&val=1');
	return ;
}
header('location: admin.php');
?>
