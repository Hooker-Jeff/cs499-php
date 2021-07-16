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
		.show {display: block;}
	</style>
	</head>

	<body>

	  <h1> Select Employee </h1><br/><br/>
	  
	  
	  
	  <!--<ul style="list-style-type:none;">-->
	  
	  <div class="dropdown">
		<button onclick="select()">Select Employee</button>
		<div id="employees">
	  <?php
	  
	  foreach($rows as $employee)
	  {
		  $employee_id = $employee['employee_id'];
		  $employee_name = $employee['employee_name'];
		  echo "<a href='employeetime.php?employee_id=$employee_id'>$employee_name</a>";
		  //echo "<li><p><a href='employeetime.php?employee_id=$employee_id'>$employee_name</a></p></li>";
	  }
	  
	  ?>
		</div>
	  
	  <!--</ul>-->
	  </div>
	  
	  <script>
	  function select(){
		  document.getElementById("employees").classList.toggle("show");
	  }
	  </script>
	  
	  <br/><br/>
	  <form method="post" action="homepage.php">
			<input type="submit" value="Return to Homepage">
		</form>
	  
	  
	  
	  
	</body>
</html> 
