<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num'];
	$abc = mysqli_query($conn,"SELECT * FROM memberdb WHERE idmember='$table_num'");
	if($abc->num_rows==0){
		$sql = "INSERT INTO memberdb (idmember) VALUES ('$table_num');";
		mysqli_query($conn,$sql);
		echo '<script language="javascript">';
		echo 'alert("Member Inserted.")';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
		echo 'alert("Member Already Exist.")';
		echo '</script>';
	}
	

	header( "refresh:0;url=member.php" );


?>