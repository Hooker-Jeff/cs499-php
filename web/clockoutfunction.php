<?php

$emp_id = $_POST['emp_id'];
$clock_in = $_POST['clock_in'];

require("dbConnect.php");
$db = get_db();

try
{
	$query = 'INSERT INTO timeclock (emp_id, clock_in) VALUES(:emp_id, :clock_in)';

	$statement = $db->prepare($query);
	
	
	$statement->bindValue(':emp_id', $emp_id);
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