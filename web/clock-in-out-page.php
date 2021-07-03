<?php
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	//header("Location: homepage.php");
	die(); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>

<body>
<div>

<br /><br /><br />
<p>
	<?php 
	echo 'Todays date and current time is ' . date("l, F jS Y h:i:s A");
    ?>
</p>

	Welcome  <?= $username ?><br /><br />
	
	

	<a href="team_activity07_signOut.php">Sign Out</a>
</div>

</body>
</html>