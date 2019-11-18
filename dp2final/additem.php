<?php

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "tabletable";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	$itemname = $_POST['itemname'];
	$itemprice = $_POST['itemprice'];
	$itemdiscount = $_POST['itemdiscount'];
	$itemcategory = $_POST['itemcategory'];
	
		$image= $_FILES['image']['name'];
	
	$add = mysqli_query($conn,"SELECT * FROM menuitems WHERE name='$itemname'");
	if($add->num_rows==0){
		$sql = "INSERT INTO menuitems (ITEMNO,name,price,discount,category,img) VALUES (NULL,'$itemname','$itemprice','$itemdiscount','$itemcategory','$image')";
		mysqli_query($conn,$sql);
		 header("Location: addmenu.php?insert=success");
	}else{
		function_alert("The item already existed "); 
		
		#$message='The Item already exists';
		 #echo "<script>alert('$message');</script>";
		 #echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 


//Set Refresh header using PHP.
header( "refresh:2;url=addmenu.php" );

//Print out some content for example purposes.
echo 'Add item unsuccessful. Redirecting to previous page.';
		 }
		 
		 
// Function call 
function function_alert($message) { 
      
		// Display the alert box  
		echo "<script>alert('$message');</script>"; 
			 
			 }
	
	
	
	
?> 