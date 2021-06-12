<?php
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: team_activity07_signIn.php");
	die(); // we always include a die after redirects.
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>

<body>
<div>

	<h1>Welcome to the homepage!</h1>

	Your username is: <?= $username ?><br /><br />

	<a href="team_activity07_signOut.php">Sign Out</a>
</div>

</body>
</html>