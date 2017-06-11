<html>
<head>
<title><?php echo "$_GET[cat]"?></title>
<link rel="stylesheet" href="../css/admin.css">
<h1><?php echo "$_GET[cat]"?></h1>
</head>
<body>
	<div class="box">
	<h3>Add New Item</h3>
<?php
if ($_GET[err] == 'noname')
	echo "Missing name!";
?>
	<form method="post" action=<?php echo '"new_item.php?cat='.$_GET[cat].'"'?>>
	Name: <input type="text" name="name" value=""><br>
	Price: $<input type="number" name="price" value=""><br>
	Quantity: <input type="number" name="qty" value=""><br>
	Image Source: <input type="text" name="img" value=""><br>
	<input type="submit" name="submit" value="Submit"><br>

<?php
if (file_exists('../inventory/categories'))
{
	$cats = file_get_contents('../inventory/categories');
	if ($cats)
		$cats = unserialize($cats);
}
if (file_exists('../inventory/items'))
{
	$all = file_get_contents('../inventory/items');
	if ($all)
	{
		$all = unserialize($all);
		foreach ($all[$_GET[cat]] as $name => $item)
		{
			echo "<img src=".$_item[img];
			echo "$name";
			echo "$item[price]";
			echo '<form method="post" action=edit.php?cat='.$_GET[cat].'>
				<input type="submit" name="edit" value="edit">
				<input type="submit" name="delete" value="delete"><br></form>';
		}
	}
}
?>
</body>
</html>
