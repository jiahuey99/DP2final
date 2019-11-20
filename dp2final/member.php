<?php
	include_once 'connection.php';
?>

<?php
session_start();
	if($_SESSION['is_login'])
	{
		
		$user=$_SESSION['username'];
	}
	else 
	{
		
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Member</title>
<link rel="stylesheet" href="table.css?e={random number/string}">
</head>
<header>
	<?php include'navigation_admin.php'?>
	</header>
<body>

<div id=title>Manage Member</div>

<br>
<br>
<div id=formm>
<fieldset>
<legend>Add Member:</legend>
<br>
<form action="insertingm.php" method="POST">
Member ID:
<input type = "text" name="table_num">
<br>
<input type="submit" value="Submit">
</form>
</fieldset>

<br><br>
<fieldset>
<legend>Remove Member:</legend>
<br>
<form action="removing_m.php" method="POST">
Member ID:
<input type = "text" name="table_num_d">
<br>
<input type="submit" value="Submit">
</form>
</fieldset>
</div>
<div id=tablelist>
<table border="1">
<tr>
	<th>Member ID</th>
	<th>MemberPoint</th>
</tr>
<?php
	$tablefortable = mysqli_query($conn,"SELECT * FROM memberdb");
	if($tablefortable->num_rows>0){
		while($rowww = $tablefortable-> fetch_assoc()){
			echo "<tr><td>".$rowww['idmember']."</td><td>".$rowww['memberpoint']."</td></tr>";
	}
	}
	echo "</table>";
	
?>
</div>

</body>
</html>