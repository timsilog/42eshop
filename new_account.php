<html>
	<head><h1>Create A New Account</h1></head>
	<body>
	<?php
	if ($_GET[err] == 'usertaken')
		echo "That username is already taken!";
	if ($_GET[create])
		echo 'Successfully created user: '.$_GET[user];
	?>
	<form method="post" action="create.php">
		Username: <input type="text" name="login" value="" />
		<br />
		Password: <input type="text" name="passwd" value="" />
		<input type="submit" name="submit" value="Submit"/>
	</form>
	<a href=index.php>Go back home</a>
	</body>
</html>
