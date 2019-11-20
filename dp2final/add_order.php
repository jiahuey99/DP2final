<?php
    include_once 'connection.php';

    if (!$_POST['order']){
        header("Location: order_page.php");
    }
    // Remove Empty items from the menu
    $orderItems = array_filter($_POST['order'], function($orderItem) {
        return $orderItem['quantity'] != null && $orderItem['quantity'] != 0 
			 
	
		
			;
		
	
		
	
    });
    $sql = 'Select max(orderid) as lastId from orderdb';
    $result = $conn->query($sql)->fetch_assoc();
    $sql = '';
    $tableid = $_POST['idtable'];
    $orderId = ++$result['lastId'];
    

    foreach ($orderItems as $itemno => $orderItem) {
		//discount
		
		$disamount = ($orderItem['price'] * $orderItem['quantity']);
        $subtotal = $orderItem['price'] * $orderItem['quantity'];
        $sql .= "INSERT INTO orderdb (orderid, itemno, qty, idtable, subtotal, comment) 
        VALUES ('$orderId','$orderItem[itemno]','$orderItem[quantity]','$tableid','$subtotal','$orderItem[comment]');";
    }

	

    if ($conn->multi_query($sql) === TRUE) {
        header("Location: order_page.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>