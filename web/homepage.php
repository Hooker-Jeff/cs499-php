<?php

session_start();
$badLogin = false;
if (isset($_POST['employee_id']) && isset($_POST['employee_password']))
{
	$username = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT password FROM naf_employee WHERE username=:username AND password=:password';
	$statement = $db->prepare($query);
	$statement->bindValue(':employee_id', $username);
	$statement->bindValue(':employee_password', $password);
	$result = $statement->execute();
	if ($result)
	{
		$_SESSION['username'] = $username;
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

Or <a href="signUp.php">Sign up</a> for a new account.

</div>

</body>
</html>