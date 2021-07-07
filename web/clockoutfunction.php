<?php

$username = $_SESSION['username'];
$clock_in = $_POST['clock_in'];

require("dbConnect.php");
$db = get_db();

try
{
	$query = 'INSERT INTO timeclock (emp_id, clock_in) VALUES(:username, :clock_in)';

	$statement = $db->prepare($query);
	
	
	$statement->bindValue(':username', $username);
	$statement->bindValue(':clock_in', $clock_in);
	
	$statement->execute();
	
	$emp_id = $db->lastInsertId();
	
	
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: homepage.php");
die();
?>