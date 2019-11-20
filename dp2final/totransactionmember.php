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
			
			$food = "";
	$xx = mysqli_query($conn,"SELECT itemno,qty FROM orderdb WHERE orderid = '$orderid'");
	$roww = $xx->fetch_assoc();
	$float_total = 0;
		do{
			$yy = mysqli_query($conn,"SELECT price,name,discount FROM menuitems WHERE itemno = '$roww[itemno]'");
			while($rowww = $yy->fetch_assoc()){
			
				$float_a = (floatval($rowww['price'])-floatval($rowww['price']*floatval($rowww['discount']/100)))*floatval($roww['qty']);
				$food = $food.','.strval($rowww['name']).strval($roww['qty']).' '.strval($float_a);
			$float_total = $float_total + $float_a ;
		}
	} while($roww = $xx->fetch_assoc());
	

	$sqql = "INSERT INTO transaction (orderid,food,amount) VALUES ('$orderid','$food','$float_total');";
	mysqli_query($conn,$sqql);
	echo '<script language="javascript">';
	echo "alert('Transaction record saved')";
	echo '</script>';
			
			if ($conn->query($sql) === FALSE) {
				echo "Error updating record: " . $conn->error;
			}else{
				mysqli_query($conn,"DELETE FROM orderdb WHERE orderid='$orderid'");
			}
		}else{
			echo '<script language="javascript">';
			echo "alert('Points not enought')";
			echo '</script>';
		}
	}
	
	header( "refresh:0;url=order_page.php" );
?>