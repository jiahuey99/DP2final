<?php
	include_once 'connection.php';
	if(isset($_POST['orderid']))
	{
		$orderid = mysqli_real_escape_string($conn,$_POST['orderid']);	
	}else{
		echo"No Order ID";
	}
	
	if(isset($_POST['mbbb'])){
		$member = mysqli_real_escape_string($conn,$_POST['mbbb']);
	}else{
		echo "Please Enter Member";
	}
	
	if(isset($_POST['amounttt'])){
		$amount = mysqli_real_escape_string($conn,$_POST['amounttt']);
	}else{
		echo "No Value";
	}
	
	$extract = mysqli_query($conn,"SELECT memberpoint  FROM memberdb WHERE idmember='$member'");
	while($row = $extract-> fetch_assoc()){
		if((floatval($row['memberpoint'])/10)>=$amount){
			$minusvalue = round($amount*10,0);
			$value = $row['memberpoint']- $minusvalue;
			$sql = "UPDATE memberdb SET memberpoint='$value' WHERE idmember='$member'";
			if ($conn->query($sql) === FALSE) {
				echo "Error updating record: " . $conn->error;
			}else{
				mysqli_query($conn,"DELETE FROM orderdb WHERE orderid='$orderid'");
			}
		}else{
			echo "Not enough member points.";
		}
	}
	header("Location: order_page.php?record=saved");
?>