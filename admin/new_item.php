<?php
if (!$_POST[name])
	header('location: display_cat.php?cat='.$_GET[cat].'&err=noname');
$item = array('price'=>$_POST[price],
'qty'=>$_POST[qty], 'img'=>$_POST[img]);
$item[price] = $_POST[price] ? $_POST[price] : 0;
$item[qty] = $_POST[qty] ? $_POST[qty] : 0;
$item[img] = $_POST[img] ? $_POST[img] : '../img/missing.jpg';///////// GO GET IMG
if (!$_POST[qty])
if (file_exists('../inventory/items')
{
	$all = file_get_contents('../inventory/items');
	$all = unserialize($all);
}
$all[$_GET[cat]][$_POST[name]] = $item;
file_put_contents('../inventory/items', serialize($all));
header('location: admin.php?cat='.$_GET[cat]);
?>
