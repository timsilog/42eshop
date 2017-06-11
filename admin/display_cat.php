<html>
<head>
<title><?php echo "$_GET[cat]"?></title>
<link rel="stylesheet" href="../css/admin.css">
<h1><?php echo "$_GET[cat]"?></h1>
</head>
<body>
	<div class="box">
	<h3>Add New Item</h3>
<!--DISPLAY ERROR MSGS HERE
////
-->
	<form method="post" action="new_item.php">
		Name: <input type="text" name="login" value=""><br>
		Category: <input list="categories" name="category">
		<datalist id="categories">
		<?php
		foreach ($cats as $cat)
			echo '<option value="'.$cat.'">';
		?>
		</datalist><br>
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
		foreach ($all as $item)
		{
			if ($item[category] == $_GET[cat])
			{
				echo "<img src=".$_item[img];
				echo "$item[name]";
				echo "$item[price]";
			}
		}
	}
}
?>
</body>
</html>
