<?php
session_start();
if (isset($_SESSION['username'])) //&& isset($_SESSION['name']))
{
	$username = $_SESSION['username'];
	//$name = $_SESSION['name'];
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

	Welcome employee number <?= $username ?> <br /><br /> Please either clock in or clock out with the buttons below<br /><br />
	
	<form id="ClockInForm" action="clockinfunction.php" method="POST">

	

	<input type="submit" value="Clock In" />

	</form> 
	
	<form id="ClockOutForm" action="clockoutfunction.php" method="POST">

	

	<input type="submit" value="Clock Out" />

	</form> 
	
	

	<br /><br /><a href="homepage.php">Sign Out</a>
</div>

</body>
</html>