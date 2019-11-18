<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="paymentsy.css?tta={random number/string}">
</head>
<header>
	<?php include'navigation.php'?>
	</header>
<body onload="renderTime();">

   <div id=title>Payment</div>

	<br>
<div id="clockDisplay" class="container">
<?php
echo "Date : " . date("Y/m/d") . date(" (l)"). "<br>";
		
		date_default_timezone_set("Asia/Kuala_Lumpur");
		echo "Time : " . date("h:i:sa"). "<br><br>";
?>
</div>
<script>
	function renderTime()
		{
			var mydate = newDate();
			var year = mydate.getYear();
			if(year <1000)
				{
					year+=1900
				
				}
			var day=mydate.getDay();
			var month=mydate.getMonth();
			var daym=mydate.getDate();
			var dayarray=new Array("Sunday","Monday","Tuseday","Wednesday","Thursday","Friday","Saturday);
			var montharray=	new Array("January","february","March","April","May","June","July","August","September","October","November","December");
			
			var currentTime = new Date();
			var h = currentTime.getHours();
			var m = currentTime.getMinutes();
			var s = currentTime.getSeconds();
			if(h==24)
			{
				h=0;
				
			}
			else if(h>12)
			{
				h=h-0;
			}
			
			if(h<10)
				{
					h="0"+h;
			
				}
			if(m<10)
				{
					m="0"+m;
				}
			if(s<10)
				{
					s="0"+s;
				}
			var myclock =document.getElementById("clockDisplay");
			myclock.textContent="" +dayarray[day]+ "" +daym+ "" +montharray[month]+ "" +year+ "|" +h+ ":" +m+ ":" +s;
			myclock.innerText ="" +dayarray[day]+ "" +daym+ "" +montharray[month]+ "" +year+ "|" +h+ ":" +m+ ":" +s;
			
			setTimeout("renderTime()",1000);
		}
	renderTime();
	
	
</script>
<?php
	require('connection.php');
	if(isset($_GET['orderid']))
	{
		$orderid = mysqli_real_escape_string($conn,$_GET['orderid']);	
	}else{
		echo"No Order ID";
	}
?>
</body>
<table>
<tr>
<th id=smallth>Order ID</th>
<th id=smallth>Table </th>
<th id=bigth>Food Item</th>
<th id=smallth>Quantity</th>

<th id=smallth>Subtotal</th>
</tr>
<?php
echo "<tr><td class='top'>".$orderid."</td>";
	//get data for orderdb
				$xx = mysqli_query($conn,"SELECT itemno, idtable, qty,discount FROM orderdb WHERE orderid = $orderid");
				$roww = $xx->fetch_assoc();
				$float_total = 0;
	//dicount set = 0
				$discount_num = 0;
				echo "<td class='top'>".$roww['idtable']."</td>";
				do{
					$yy = mysqli_query($conn,"SELECT * FROM menuitems WHERE itemno = $roww[itemno]");
					
					while($rowww = $yy->fetch_assoc()){
						//discount
						$discount_num=0;
						$discount_num = $rowww['price']*$rowww['discount']/100;
						
						$float_a = number_format(($rowww['price']-$discount_num)*floatval($roww['qty']),2);
						$float_total = $float_total + $float_a ;
						
						echo "<td>".$rowww['name']."</td>
						<td>".$roww['qty']."</td>
						
						<td>RM ".$float_a."</td></tr><td></td><td></td>";
					}

				} while($roww = $xx->fetch_assoc());
				
				echo "
				<td class='total'></td>
				<td class='total' id='total2'>TOTAL:</td>
				<td class='total' id='total3'>".number_format($float_total,2)."</td>";
		
		
		echo "</table>";
?>
<br>
<fieldset>
<legend>Pay by Cash</legend>
<br>
Amount Receive:  <input type="text" name="amount" id = "amountt">
<button id=btn type="button" onclick="calculate()">Calculate Balance</button><br>
<p id ="balancee">Balance:</p><br>
<?php echo"<form action = 'totransaction.php?'>  <input type='hidden' name='orderid' value='$orderid'><br><br>Member Name: <input type = 'text' name ='membername'><br><br><input id=btn type='submit' value='Submit Payment'></form>"?>
<br>
</fieldset>
<fieldset>
<legend>Pay by Membership Points</legend>

<form action='totransactionmember.php' method='POST'>
<?php echo "<input type='hidden' name='orderid' value='$orderid'>"?>
<?php echo "<input type='hidden' name='amounttt' value='$float_total'>"; ?>
<br>
Member Name: <input type='text' name='mbbb'>
<br><br>
<input type='submit' id=btn value='Pay With MemberPoints'>
<br>
</form>
</fieldset>
<script>
function calculate(){
	var x = parseFloat(document.getElementById("amountt").value);
	var y = parseFloat(document.getElementById("total3").innerHTML);
	var z = Number(parseFloat(x-y)).toFixed(2);
	document.getElementById("balancee").innerHTML = "Balance: RM "+ z + "<br>";
	
	
}
</script>
</html>