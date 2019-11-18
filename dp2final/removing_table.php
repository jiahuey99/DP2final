<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num_d'];
	$abc = mysqli_query($conn,"SELECT * FROM tabledb WHERE idtable='$table_num'");
	if($abc->num_rows!=0){
		mysqli_query($conn,"DELETE FROM tabledb WHERE idtable='$table_num'");
	}else{
		die("The table does not exist");
	}

	
	header("Location: table.php?delete=success");
?>