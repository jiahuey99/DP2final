<!DOCTYPE html>
<html>
<head>
<title>Add Menu</title>
<link rel="stylesheet" href="addmenu.css?tcca={random number/string}">
</head>
<header>
	<?php include'navigation_admin.php'?>
	</header>
<body>
<div id=title>Add Menu</div>

<div id=form>
<form  action="additem.php" method="POST"  enctype="multipart/form-data">

<fieldset>

<legend>

New Item:
</legend>
<br>
Name:	
<input type = "text" name="itemname"  required></br></br>
Price:
<input type = "text" name="itemprice" placeholder="0.00" size="4" required></br></br>
Discount:
<input type = "text" name="itemdiscount" placeholder="0.00" size="4"></br></br>
Category:
  <select name="itemcategory">
    <option value="Food">Food</option>
    <option value="Beverage">Beverage</option>
  </select>
</br></br>
Image:
	<input type="file" name="image">

</br>
<br>
<input id=btn type="submit" value="Add"></br>
</fieldset>
</form>
</div>
</br>

</body>
</html>