<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['name']))
{
	$username = $_SESSION['username'];
	$name = $_SESSION['name'];
}
else
{
	header("Location: homepage.php");
	die(); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Clock in or clock out</title>
	<style>
	    * {
		  text-align: center;
		}
	</style>
</head>

<body>
<div>

<br /><br /><br />
<p>
	<?php 
	date_default_timezone_set("America/Los_Angeles");
	echo 'Todays date and current time is ' . date("l, F jS Y h:i:s A");
    ?>
</p>

	Welcome  <?= $name ?><br /><br />
	
	

	<a href="homepage.php">Sign Out</a>
</div>

</body>
</html>