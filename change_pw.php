<html>
	<head><h1>Change My Password</h1></head>
	<body>
	<?php
	if ($_GET[err] == 'no_accounts')
		echo "No users currently exist!";
	if ($_GET[err] == 'wrongpw')
		echo "Wrong password!";
	if ($_GET[err] == 'nouser')
		echo "That username doesn't exist!";
	?>
	<form method="post" action="modif.php">
		Username: <input type="text" name="login" value="" />
		<br />
		Old Password: <input type="text" name="oldpw" value="" />
		<br />
		New Password: <input type="text" name="newpw" value="" />
		<br />
		<input type="submit" name="submit" value="OK"/>
	</form>
	<a href=index.php>Go back home</a>
	</body>
</html>
