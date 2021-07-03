<?php
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$name = $_POST['employee_name'];
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT :name FROM naf_employee WHERE employee_id=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':name', $name);
	$result = $statement->execute();
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
	echo 'Todays date and current time is ' . date("l, F jS Y h:i:s A");
    ?>
</p>

	Welcome  <?= $name ?><br /><br />
	
	

	<a href="homepage.php">Sign Out</a>
</div>

</body>
</html>