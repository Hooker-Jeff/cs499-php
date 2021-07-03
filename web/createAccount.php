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
	$statement->bindValue(':password', $password);
	$statement->bindValue(':name', $name);
	$result = $statement->execute();
	if ($result)
	{
		$_SESSION['username'] = $username;
		//$_SESSION['employee_name'] = $name;
		header("Location: clock-in-out-page.php");
		die(); 
	}
}
else
{
	header("Location: homepage.php");
	die(); 
}



?>