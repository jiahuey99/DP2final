<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num'];
	$abc = mysqli_query($conn,"SELECT * FROM memberdb WHERE idmember='$table_num'");
	if($abc->num_rows==0){
		$sql = "INSERT INTO memberdb (idmember) VALUES ('$table_num');";
		mysqli_query($conn,$sql);
	}else{
		die("The member has already exist");
	}
	

	header("Location: member.php?insert=success");

?>