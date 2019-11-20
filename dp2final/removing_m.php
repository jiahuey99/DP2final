<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num_d'];
	$abc = mysqli_query($conn,"SELECT * FROM memberdb WHERE idmember='$table_num'");
	if($abc->num_rows!=0){
		mysqli_query($conn,"DELETE FROM memberdb WHERE idmember='$table_num'");
		echo '<script language="javascript">';
		echo 'alert("Member Deleted.")';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
		echo 'alert("Member Does not Exist.")';
		echo '</script>';
	}

	
	header( "refresh:0;url=member.php" );

?>