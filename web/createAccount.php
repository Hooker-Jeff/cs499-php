<?php

if (isset($_POST['employee_id']) && isset($_POST['employee_password']) && isset($_POST['employee_name'])
{
	$id = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	$name = $_POST['employee_name'];
	
	require("dbConnect.php");
	$db = get_db();
	$query = 'INSERT INTO naf_employee VALUES (:id, :password, :name)';
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->bindValue(':name', $name);
	$statement->bindValue(':password', $password);
	$statement->execute();
	header("Location: homepage.php");
	die(); 
	
}
else
{
	header("Location: homepage.php");
	die(); 
}



?>