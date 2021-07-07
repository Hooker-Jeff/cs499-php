<?php


if (!isset($_GET['employee_id'])) {
	die("Error, employee ID not specified");
}


$employee_id = htmlspecialchars($_GET['employee_id']);


require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM timeclock WHERE emp_id = :employee_id';

$stmt = $db->prepare($query);
$stmt->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$employee_name = $employee['employee_name'];



?>

<!DOCTYPE html>

<html>

	<head>
	<title>Employee Timeclock Database</title>
	<style>
	    * {
		  text-align: center;
		}
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
	</style>
	</head>

	<body>

	  <?php
				
		foreach ($rows as $row)
		{
			echo '<h1> Employee Time info for ' . $row['employee_name'] . '</h1><br/>';
			echo '<table style="width:50%" ><tr><th>Employee Name</th>';
			echo '<tr><th>Clock In</th>';
			echo '<th>Clock Out</th></tr>';
			echo '<tr><td>' . $row['employee_name'] . '</td>';
			echo '<td>' . $row['clock_in'] . '</td>';
			echo '<td>' . $row['clock_out'] . '</td></tr></table><br/><br/>';
			
			
			
			echo '<br/><br/><br/>';
		}
		
		?>
		<form method="post" action="homepage.php">
			<input type="submit" value="Return to Homepage">
		</form>
		
		<br/><br/>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		