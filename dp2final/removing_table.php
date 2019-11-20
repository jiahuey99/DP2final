<?php

	include_once 'connection.php';
	
	$table_num = $_POST['table_num_d'];
	$abc = mysqli_query($conn,"SELECT * FROM tabledb WHERE idtable='$table_num'");
	if($abc->num_rows!=0){
		mysqli_query($conn,"DELETE FROM tabledb WHERE idtable='$table_num'");
		echo '<script language="javascript">';
		echo 'alert("Table Deleted.")';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
		echo 'alert("Table Does not Exist.")';
		echo '</script>';
	}

	
	header( "refresh:0;url=table.php" );
?>