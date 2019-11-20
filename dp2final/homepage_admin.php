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
		<link rel="stylesheet" href="homepage.css?g={random number/string}">
		
		
		
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
			
			<ul id="parent">
			<li><button id=new onclick="window.location.href ='addmenu.php';">Add menu </button></li>
			<li><button id=detail onclick="window.location.href ='editmenu.php';">Edit / Remove Menu</button></li>
			<li><button id=logout onclick="window.location.href ='table.php';">Manage Table</button></li>
			<li><button id=logout onclick="window.location.href ='salesreportform.php';">Generate Sales Report</button></li>
			<li><button id=logout onclick="window.location.href ='logout.php';">Log Out</button></li>
			
			</ul>
			</div>
	</body>
	
</html>