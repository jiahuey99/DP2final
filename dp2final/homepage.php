<?php require "connection.php"; ?>
<?php
session_start();
	if($_SESSION['is_login'])
	{
		
		$user=$_SESSION['username'];
	}
	else 
	{
		
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
	<title>Home</title>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="homepage.css?dd={random number/string}">
		
		
		
	</head>
	<body>
		
	<div class="slideshow-container">

		<div class="mySlides fade">
	
		  <img src="ss1.jpg" width="800" height="400" alt="single room">
		  
		</div>

		<div class="mySlides fade">
		  
		  <img src="ss2.png" width="800" height="400" alt="double room">
		  
		</div>


		<div class="mySlides fade">
		  
		  <img src="ss3.jpg	" width="800" height="400" alt="apartment1">
		  
		</div>

		<div class="mySlides fade">
		  
		  <img src="ss4.jpg" width="800" height="400" alt="apartment2">
		  
		</div>

		<div class="mySlides fade">
		  
		  <img src="ss5.jpg" width="800" height="400" alt="apartment3">
		  
		</div>

	</div>

	<br/>
	<div class="dotttt">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
	</div>
	<script>
	var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++)
		{
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length)
		{slideIndex = 1;}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

	<!--<h1>HomePage</h1>-->
	<div id=btndiv>
			<button id=new onclick="window.location.href ='menu1.php';">Take Order</button>
			<button id=detail onclick="window.location.href ='order_page.php';" >Order Details</button>
			<button id=logout onclick="window.location.href ='reservation.php';">Table Reservation</button>
			<button id=logout onclick="window.location.href ='logout.php';">Log Out</button>
			
			</div>
	</body>
	
</html>