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

<form id="signUpForm" action="createAccount.php" method="POST">

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