<html>
	<head>
		<link rel="stylesheet" href="../css/admin.css">
		<title>ADMIN PAGE</title>
		<h1>ADMIN PAGE</h1>
	</head>
	<body>
<?php
if ($_GET[create] == 1)
	echo "Successfully created user: <b>$_GET[user]</b>";
if ($_GET[user_exists])
	echo "User: <b>$_GET[user_exists]</b> already exists";
if ($_GET[removed_u] && $_GET[val])
	echo "Successfully removed user: <b>$_GET[removed_u]</b>";
if ($_GET[no_user])
	echo "User: <b>$_GET[no_user]</b> does not exist";
if ($_GET[old_u] && $_GET[new_u])
	echo "Successfully changed user: <b>$_GET[old_u]</b> to <b>$_GET[new_u]</b>";
if ($_GET[removed_c] && $_GET[val])
	echo "Successfully removed category: <b>$_GET[removed_c]</b>";
if ($_GET[removed_c] && !$_GET[val])
	echo "Category: <b>$_GET[removed_c]</b> does not exist";
if ($_GET[added_c] && $_GET[val])
	echo "Successfully added category: $_GET[added_c]";
if ($_GET[added_c] && !$_GET[val])
	echo "Category <b>$_GET[added_c]</b> already exists";
if ($_GET[admin] == 1)
	echo "Successfully gave admin rights to $_GET[user]";
if ($_GET[admin] == -1)
	echo "Successfully removed admin rights from $_GET[user]";
if ($_GET[no_accounts])
	echo "No account currrently exist";
if ($_GET[changedpw])
	echo "Successfully changed password for user: $_GET[changedpw]";
if ($_GET[wrongpw])
	echo "Wrong password for user: $_GET[wrongpw]";
?>
	<div class="box">
		<h2>Users</h2>
		<b>Add User:</b>
		<form method="post" action="../create.php">
			Username:<input type="text" name="login" value="" /><br>
			Password:<input type="text" name="passwd" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
		<b>Remove User:</b>
		<form method="post" action="remove_user.php">
			Username:<input type="text" name="login" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
		<b>Change Username:</b>
		<form method="post" action="modif_u.php">
			Old Username:<input type="text" name="old_u" value="" /><br>
			New Username:<input type="text" name="new_u" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
		<b>Change Password:</b>
		<form method="post" action="../modif.php">
			Username:<input type="text" name="login" value="" /><br>
			Old Password:<input type="text" name="oldpw" value="" /><br>
			New Password:<input type="text" name="newpw" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
		<b>Give Admin Rights:</b>
		<form method="post" action="admin_rights.php">
			Username:<input type="text" name="login" value="" />
			<input type="submit" name="give" value="Save"/><br>
		</form>
		<b>Remove Admin Rights:</b>
		<form method="post" action="admin_rights.php">
			Username:<input type="text" name="login" value="" />
			<input type="submit" name="remove" value="Save"/><br>
		</form>
	</div>
	<br>
	<div class="box">
		<h2>Categories</h2>
		<b>Add Category:</b><br>
		<form method="post" action="new_cat.php">
			Category Name:<input type="text" name="category" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
		<b>Remove Category:</b><br>
		<form method="post" action="remove_cat.php">
			Category Name:<input type="text" name="category" value="" />
			<input type="submit" name="submit" value="Save"/><br>
		</form>
	</div>
	</br>
	<div class="box">
		<h2>Inventory</h2>
		<h3>Categories:</h3>
<?php
	if (file_exists('../inventory/categories'))
	{
		if ($all = file_get_contents('../inventory/categories'))
		{
			$all = unserialize($all);
			foreach ($all as $cat)
			{
				echo "<a href=display_cat.php?cat=$cat><b>$cat</b></a><br>";
			}
		}
	}
?>
	<br>
	</div>

		<br>
		<a href="../index.php">Go back home</a><br>
	</body>
</html>
