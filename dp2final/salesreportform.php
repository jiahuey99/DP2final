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
<title>Order Details</title>
<link rel="stylesheet" href="salesreportform.css?vn={random number/string}">
</head>
<header>
	<?php include'navigation_admin.php'?>
</header>
<body>
<div id =title>Enter Date for Sales Report</div>
<form action = 'salesreport.php' method="POST">
<fieldset>
<legend> Daily Report</legend>
Start Date: <input type="date" name="sdate" value="<?php echo date('Y-m-d'); ?>" />
 Finish Date: <input type="date" name="fdate" value="<?php echo date('Y-m-d'); ?>" />
 
<br><br>
<input type='submit' value='Generate'>
</fieldset>
</form>
<br>
<form action = 'salesreportm.php' method="POST">
<fieldset>
<legend> Monthly Report</legend>
Start Date: <input type="date" name="sdate" value="<?php echo date('Y-m-d'); ?>" />
 Finish Date: <input type="date" name="fdate" value="<?php echo date('Y-m-d'); ?>" />
 
<br><br>
<input type='submit' value='Generate'>
</fieldset>
</form>
<br>
</body>
</html>