<?php

require("dbConnect.php");
$db = get_db();


//$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT employee_name,employee_id FROM naf_employee';
$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html>

	<head>
	<title>Select Employee</title> 
	<style>
	    * {
		  text-align: center;
		}
	</style>
	</head>

	<body>

	  <h1> Select Employee </h1><br/><br/>
	  
	  
	  
	  <ul style="list-style-type:none;">
	  
	  <?php
	  
	  foreach($rows as $employee)
	  {
		  $employee_id = $employee['employee_id'];
		  $employee_name = $employee['employee_name'];
		  echo "<li><p><a href='employeetime.php?employee_id=$employee_id'>$employee_name</a></p></li>";
	  }
	  
	  ?>
	  
	  </ul>
	  
	  <br/><br/>
	  <form method="post" action="homepage.php">
			<input type="submit" value="Return to Homepage">
		</form>
	  
	  
	  
	  
	</body>
</html> 
