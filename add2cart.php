<?php
session_start();
if ($_SESSION[cart])
{
	foreach ($_SESSION[cart] as &$item)
	{
		if ($item[name] == $_GET[name])
		{
			$item[qty]++;
			unset($item);
			header('location: show_cat.php?cat='.urlencode($_GET[cat]));
			return ;
		}
	}
	unset($item);
}
$array = array("name" => $_GET[name], "price" => $_GET[price], "qty" => 1);
$_SESSION[cart][] = $array;
header('location: show_cat.php?cat='.urlencode($_GET[cat]));
?>
