<?php
session_start();
$all = file_get_contents('private/passwd');
$all = unserialize($all);
echo "<h1>ORDER HISTORY</h1>";
foreach ($all as $user)
{
	if ($user[login] == $_SESSION[logged_in])
	{
		foreach ($user[history] as $order)
		{
			foreach ($order as $item)
			{
				echo "$item[name] $$item[price] qty: $item[qty]<br>";
				$total += $item[price] * $item[qty];
			}
			echo "<b>TOTAL: $$total</b><br><br>";
			$total = 0;
		}
		break ;
	}
}
?>
<a href="index.php">Go Back</a>
