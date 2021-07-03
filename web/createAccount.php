<?php

$employee_id = $_POST['employee_id'];
$employee_password = $_POST['employee_password'];
$name = $_POST['employee_name'];
if (!isset($employee_id) || $employee_id == ""
	|| !isset($employee_password) || $employee_password == "")
		|| !isset($employee_name) || $employee_name == "")
{
	header("Location: homepage.php");
	die(); 
}

$employee_id = htmlspecialchars($employee_id);
//$hashedemployee_password = employee_password_hash($employee_password, employee_password_DEFAULT);
require("dbConnect.php");
$db = get_db();
$query = 'INSERT INTO naf_employee(employee_id, employee_password, employee_name) VALUES (:employee_id, :employee_password, :employee_name)';
$statement = $db->prepare($query);
$statement->bindValue(':employee_id', $employee_id);
$statement->bindValue(':employee_name', $employee_name);
$statement->bindValue(':employee_password', $employee_password);
$statement->execute();
header("Location: homepage.php");
die(); 
?>