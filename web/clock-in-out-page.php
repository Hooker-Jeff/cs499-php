<?php
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT employee_name FROM naf_employee WHERE employee_id=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->bindValue('employee_name', $name);
	$result = $statement->execute();
	if ($result)
	{
		$_SESSION['employee_name'] = $name;
		die(); 
	}
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