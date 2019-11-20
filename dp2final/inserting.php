<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num'];
	$abc = mysqli_query($conn,"SELECT * FROM tabledb WHERE idtable='$table_num'");
	if($abc->num_rows==0){
		$sql = "INSERT INTO tabledb (idtable) VALUES ('$table_num');";
		mysqli_query($conn,$sql);
		echo '<script language="javascript">';
		echo 'alert("Table Added")';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
		echo 'alert("Table exist.")';
		echo '</script>';
	}
	

	header( "refresh:0;url=table.php" );

?>