<?php

	$id = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	$name = $_POST['employee_name'];

/*session_start();
//$badLogin = false;
if (isset($_POST['employee_id']) && isset($_POST['employee_password']) && isset($_POST['employee_name'])
{
	$id = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	$name = $_POST['employee_name'];*/
	
	require("dbConnect.php");
	$db = get_db();
	
try{
	$query = 'INSERT INTO naf_employee VALUES (:id, :password, :name)';
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':name', $name);
	$statement->execute();
	
}
/*catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}*/
header("Location: homepage.php");
die();



?>