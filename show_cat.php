<?php session_start(); ?>
<html>
<head>
<title><?php echo "$_GET[cat]"?></title>
<?php
include 'includes/head.php';
include 'includes/header.php';?>
<h1><?php echo "$_GET[cat]"?></h1>
</head>
<body>
	<div class="box">
<?php
if (file_exists('inventory/categories'))
{
	$cats = file_get_contents('inventory/categories');
	if ($cats)
		$cats = unserialize($cats);
}
if (file_exists('inventory/items'))
{

	if ($all = file_get_contents('inventory/items'))
	{
		if (($all = unserialize($all)) && $all[$_GET[cat]])
		{
			foreach ($all[$_GET[cat]] as $name => $item)
			{
				echo '<div class="item"><img height=100px src='.$item[img].'>';
				echo $name;
				echo ' $'.$item[price];
				echo ' qty: '.$item[qty];
				echo ' <a href="add2cart.php?cat='.urlencode($_GET[cat]).'&name='.urlencode($name).'&price='.urlencode($item[price]).'">Add to cart</a><br>';
		//		echo ' <form method="post" action=add2cart.php?cat='.urlencode($_GET[cat]).'&name='.urlencode($name).'&price='.urlencode($item[price]).'><input type="submit" name="submit" value="Add to cart"><br>';

			}
		}
	}
}
?>
<a href=index.php>Go Back</a>
</body>
