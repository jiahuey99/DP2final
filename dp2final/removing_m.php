<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num_d'];
	$abc = mysqli_query($conn,"SELECT * FROM memberdb WHERE idmember='$table_num'");
	if($abc->num_rows!=0){
		mysqli_query($conn,"DELETE FROM memberdb WHERE idmember='$table_num'");
	}else{
		die("The member does not exist");
	}

	
	header("Location: member.php?delete=success");
?>