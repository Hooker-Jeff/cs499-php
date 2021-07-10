<?php


if (!isset($_GET['employee_id'])) {
	die("Error, employee ID not specified");
}


$employee_id = htmlspecialchars($_GET['employee_id']);


require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM naf_employee n
JOIN timeclock t ON n.employee_id = t.emp_id
WHERE n.employee_id = :employee_id';

$stmt = $db->prepare($query);
$stmt->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$employee_name = $naf_employee['employee_name'];



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
			echo '<h1> Employee Time info for ' . $row['employee_name'] . '</h1><br/>';
			echo '<table align="center" width="50%" ><tr><th>Employee Name</th>';
			echo '<th>Clock In</th>';
			echo '<th>Clock Out</th></tr>';
			
		foreach ($rows as $row)
		{
			/*echo '<h1> Employee Time info for ' . $row['employee_name'] . '</h1><br/>';
			echo '<table align="center" width="50%" ><tr><th>Employee Name</th>';
			echo '<th>Clock In</th>';
			echo '<th>Clock Out</th></tr>';*/
			echo '<tr><td>' . $row['employee_name'] . '</td>';
			echo '<td>' . $row['clock_in'] . '</td>';
			echo '<td>' . $row['clock_out'] . '</td></tr></table><br/><br/>';
			
			
			
			echo '<br/><br/><br/>';
		}
		
		?>
		<form method="post" action="employee-select-page.php">
			<input type="submit" value="Select another employee">
		</form>
		
		<br/><br/>
		<form method="post" action="homepage.php">
			<input type="submit" value="Return to Homepage">
		</form>
		
		<br/><br/>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		