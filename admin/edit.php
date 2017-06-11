<?php
$items = file_get_contents('../inventory/items')
$items = unserialize($items);
foreach ($items[$_GET[cat]] as $name => $item)
{
	
}
?>
