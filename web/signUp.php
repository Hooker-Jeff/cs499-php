<?php

session_start();
$badLogin = false;
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
		//$_SESSION['username'] = $username;
		//$_SESSION['employee_name'] = $name;
		header("Location: homepage.php");
		die(); 
	}
	else
	{
		$badLogin = true;
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
	<title>Sign Up</title>
	<style>
	    * {
		  text-align: center;
		}
	</style>
</head>

<body>
<div>

<h1>Sign up for new account</h1>

<form id="signUpForm" action="signUp.php" method="POST">

	<input type="text" id="employee_id" name="employee_id" placeholder="Employee ID">
	<label for="employee_id">Employee ID</label>
	<br /><br />

	<input type="password" id="employee_password" name="employee_password" placeholder="Password"></input>
	<label for="employee_password">Password</label>
	<br /><br />

	<input type="text" id="employee_name" name="employee_name" placeholder="Name"></input>
	<label for="employee_name">Name</label>
	<br /><br />

	<input type="submit" value="Create Account" />

</form>

	</br></br><a href="homepage.php">Return to homepage</a></br></br>

</div>

</body>
</html>