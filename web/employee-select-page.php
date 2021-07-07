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
	  
	  
	  
	  <ul>
	  
	  <?php
	  
	  foreach($rows as $employee)
	  {
		  $id = $employee['employee_id'];
		  $char_name = $employee['employee_name'];
		  echo "<li><p><a href='dndatabase.php?employee_id=$id'>$employee_name</a></p></li>";
	  }
	  
	  ?>
	  
	  </ul>
	  
	  
	  
	  
	</body>
</html> 
