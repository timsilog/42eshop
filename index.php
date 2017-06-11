<?php
session_start();
?>
<html>
	<head>
		<title>Welcome Page</title>
		<h1>RUSH00 ESHOP</h1>
	</head>
	<body>
	<hr>
	<?php 
		if(!$_SESSION[logged_in])
		{
			echo "<form method='post' action='login.php'>
					Username:<input type='text' name='login' value='' />
					<br />
					Password: <input type='text' name='passwd' value='' />
					<input type='submit' name='submit' value='OK'/>
					<br />
					</form>
					<a href='create.html'>Create a new account</a><br>";
		}
		else
		{
			echo "<a href='logout.php'>Log Out</a><br>
				<a href='modif.html'>Change my password</a><br>
				<br>";
			if ($_SESSION[admin])
				echo "<a href='./admin/admin.php'>Go to admin page</a><br>";
		}
	?>
</body></html>
