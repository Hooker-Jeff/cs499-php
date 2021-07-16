<?php

session_start();
$badLogin = false;
if (isset($_POST['manager_id']) && isset($_POST['manager_password']))
{
	$username = $_POST['manager_id'];
	$password = $_POST['manager_password'];
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT manager_password FROM manager WHERE manager_id = :username';
	$statement = $db->prepare($query);
	$statement->bindValue(':manager_id', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['manager_password'];
		if (password_verify($password, $hashedPasswordFromDB))
		{
			$_SESSION['manager_id'] = $username;
			header("Location: employee-select-page.php");
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
	<title>Manager Sign In</title>
	<style>
	    * {
		  text-align: center;
		}
	</style>
</head>

<body>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below with your manager credentials:</h1>

<form id="mainForm" action="managerhomepage.php" method="POST">

	<input type="text" id="manager_id" name="manager_id" placeholder="Manager ID">
	<label for="manager_id">Manager ID</label>
	<br /><br />

	<input type="password" id="manager_password" name="manager_password" placeholder="Password">
	<label for="manager_password">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />
	
	

</form>



	</br></br><a href="homepage.php">Return to homepage</a></br></br>

<br /><br />

</div>

</body>
</html>