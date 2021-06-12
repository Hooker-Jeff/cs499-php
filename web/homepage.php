<?php

session_start();
$badLogin = false;
if (isset($_POST['employee_id']) && isset($_POST['employee_password']))
{
	$username = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT employee_password FROM employee WHERE employee_id=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':employee_id', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['employee_password'];
		if (password_verify($password, $hashedPasswordFromDB))
		{
			$_SESSION['employee_id'] = $username;
			header("Location: clock-in-out-page.php");
			die(); 
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>

<body>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>

<form id="mainForm" action="homepage.php" method="POST">

	<input type="text" id="employee_id" name="employee_id" placeholder="Employee ID">
	<label for="employee_id">Employee ID</label>
	<br /><br />

	<input type="password" id="employee_password" name="employee_password" placeholder="Password">
	<label for="employee_password">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>

<br /><br />
</div>

</body>
</html>