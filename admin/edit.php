<?php
$items = file_get_contents('../inventory/items');
$items = unserialize($items);
if ($_POST[submit] == 'edit')
{
	$item = $items[$_GET[cat]][$_GET[name]];
	echo '<form method="post" action="edit_item.php?cat='.$_GET[cat].'">Name: <input type="text" name="name" value="'.$_GET[name].'"><br>Price: $<input type="number" name="price" value="'.$item[price].'"><br>Quantity: <input type="number" name="qty" value="'.$item[qty].'"><br>Image Source: <input type="text" name="img" value="'.$item[img].'"><br>
	<input type="submit" name="submit" value="Save"></form><br>';
}
else if ($_POST[submit] == 'delete')
{
	$offset = array_search($_GET[name], array_keys($items[$_GET[cat]]));
	array_splice($items[$_GET[cat]], $offset, 1);
	file_put_contents('../inventory/items', serialize($items));
	header('location: display_cat.php?cat='.urlencode($_GET[cat]));
}
?>
