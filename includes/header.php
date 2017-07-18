<?php
session_start();
	include('includes/nav_arrays.php');
 ?>
<header>
	<!-- <h1> Logo <h1> -->
	<nav>
	<ul>
		<li>
		<div class="dropdown">
			<button class="dropbtn">All Departments</button>
			<div class="dropdown-content">
<?php if (file_exists('inventory/categories'))
{
	if ($all = file_get_contents('inventory/categories'))
	{
		$all = unserialize($all);
		foreach ($all as $cat)
			echo "<a href=show_cat.php?cat=$cat><b>$cat</b></a>";
	}
}?>
			</div>
		</div>
		<li>
		<li>
<?php 
	if(!$_SESSION[logged_in])
	{
		echo "<form method='post' action='login.php'>
				Username: <input type='text' name='login' value='' />
				<br />
				Password: <input type='text' name='passwd' value='' />
				<input type='submit' name='submit' value='OK'/>
				<br />
				</form>
				<a href='new_account.php'>Create a new account</a><br>";
	}
	else
	{
		echo "Hello, " . $_SESSION[logged_in] . "<br />";
		echo "<a href='logout.php'>Log Out</a><br>
			<a href='change_pw.php'>Change my password</a><br>
			<br>";
		if ($_SESSION[admin])
			echo "<a href='./admin/admin.php'>Go to admin page</a><br>";
	}
	if($_GET[err] == 'nouser')
		echo "That username doesn't exist!";
	if ($_GET[change])
		echo "Successfully changed password!";

?>
		<li>
		<?php include('includes/nav.php'); ?>
		<li>
		<!--	<a href="cart.php"><i class="fa fa-cart-arrow-down" style="font-size: 40px;"></i></a>-->
		<div class="cart">
			<button class="cartbtn"><i class="fa fa-cart-arrow-down" style="font-size: 40px;"></i>
			<div class="cartcontent">
<?php
	if ($_SESSION[cart])
	{
		echo "<br>";
		foreach ($_SESSION[cart] as $item)	
		{
			echo "$item[name] $$item[price] qty: $item[qty]<br>";
			$total += $item[price] * $item[qty];
		}
		echo "<b>SUBTOTAL: $$total</b>";
		echo '<form method=post action=checkout.php><input type="submit" name="submit" value="Checkout"></form>';
	}
?>
			</div>
		</div>
		</li>
</ul>
	</nav>
</header>
