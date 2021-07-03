<?php

$id = $_POST['employee_id'];
$password = $_POST['employee_password'];
$name = $_POST['employee_name'];
if (!isset($employee_id) || $employee_id == ""
	|| !isset($employee_password) || $employee_password == "")
		|| !isset($employee_name) || $employee_name == "")
{
	header("Location: homepage.php");
	die(); 
}


require("dbConnect.php");
$db = get_db();
$query = 'INSERT INTO naf_employee VALUES (:id, :password, :name)';
$statement = $db->prepare($query);
$statement->bindValue(':id', $employee_id);
$statement->bindValue(':name', $employee_name);
$statement->bindValue(':password', $employee_password);
$statement->execute();
header("Location: homepage.php");
die(); 
?>