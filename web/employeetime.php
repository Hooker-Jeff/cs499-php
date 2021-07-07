<?php


if (!isset($_GET['employee_id'])) {
	die("Error, employee ID not specified");
}


$employee_id = htmlspecialchars($_GET['employee_id']);


require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM timeclock WHERE t_emp_id = :id';

$stmt = $db->prepare($query);
$stmt->bindValue(':id', $employee_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$employee_name = $employee['employee_name'];



?>

<!DOCTYPE html>

<html>

	<head>
	<title>D&D Database</title>
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
			echo '<table style="width:100%" ><tr><th>Character Name</th>';
			echo '<th>Player Name</th>';
			echo '<th>Race</th>';
			echo '<th>Class</th>';
			echo '<th>Alignment</th>';
			echo '<th>Level</th>';
			echo '<th>Experience points</th>';
			echo '<th>Maximum HP</th>';
			echo '<th>Current HP</th></tr>';
			echo '<tr><td>' . $row['character_name'] . '</td>';
			echo '<td>' . $row['player_name'] . '</td>';
			echo '<td>' . $row['race_name'] . '</td>';
			echo '<td>' . $row['class_name'] . '</td>';
			echo '<td>' . $row['alignment_name'] . '</td>';
			echo '<td>' . $row['char_level'] . '</td>';
			echo '<td>' . $row['xp'] . '</td>';
			echo '<td>' . $row['hp_max'] . '</td>';
			echo '<td>' . $row['hp_current'] . '</td></tr></table><br/><br/>';
			
			
			
			echo '<br/><br/><br/>';
		}
		
		?>
		<form method="post" action="homepage.php">
			<input type="submit" value="Return to Homepage">
		</form>
		
		<br/><br/>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		