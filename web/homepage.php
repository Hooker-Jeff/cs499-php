<?php

session_start();
$badLogin = false;
if (isset($_POST['employee_id']) && isset($_POST['employee_password']) && isset($_POST['employee_name']))
{
	$username = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	$name = $_POST['employee_name'];
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT :password FROM naf_employee WHERE employee_id=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':name', $name);
	$result = $statement->execute();
	if ($result)
	{
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		header("Location: clock-in-out-page.php");
		die(); 
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

<h1>Please sign in below:</h1>

<form id="mainForm" action="homepage.php" method="POST">

	<input type="text" id="employee_id" name="employee_id" placeholder="Employee ID">
	<label for="employee_id">Employee ID</label>
	<br /><br />

	<input type="password" id="employee_password" name="employee_password" placeholder="Password">
	<label for="employee_password">Password</label>
	<br /><br />

	<input type="hidden" id="employee_name" name="employee_name" value="<?php echo htmlspecialchars($name);?>">

	<input type="submit" value="Sign In" />

</form>


<br /><br />

Or <a href="signUp.php">Sign up</a> for a new account.

</br></br><a href="managerhomepage.php">Manager login page</a></br></br>

</div>

</body>
</html>