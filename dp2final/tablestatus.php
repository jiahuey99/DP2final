<?php
	include_once 'connection.php';
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Reservation</title>
<link rel="stylesheet" href="tablestatus.css?b={random number/string}">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php include'navigation.php'?>

<div id=title>Table Status</div>
<br>
<br>
<h1>Reserved Table :</h1>
<?php
		$conn=mysqli_connect("localhost","root","","tabletable");
			if($conn->connect_error){
				die("Connection failed:".$conn->connect_error);
            }

            $reserved = "Reserved";
            echo"<table> <tr> <th> Reservation ID</th> <th> Table ID <th>Name</th></th> <th> Date </th> <th> Time </th> <th> Status </th> </tr>";
            
           $sqlres = mysqli_query($conn,"SELECT reservationid,idtable,name,date,time FROM reservation"); 
            while($rowres = $sqlres->fetch_assoc())
            {
                echo "<tr> <td>".$rowres['reservationid']."<td>".$rowres['idtable']."</td> <td> ".$rowres['name']."</td> <td>".$rowres['date']."</td><td>".$rowres['time']."</td><td>".$reserved."</td> <td id=icon> <a href='edit_reservation.php?reservationid=$rowres[reservationid]'> <img src='edit.png' width='30' height='30'></td>
                </tr>";
            }
            echo"</table>";
			echo "<h1>All Table Status :</h1>";
            $occupied = "Occupied";
            echo"

            <table><tr> <th> Table ID </th> <th> Status </th> </tr>";
            
            $sqlocc = mysqli_query($conn,"SELECT DISTINCT idtable FROM orderdb");
            while($rowocc = $sqlocc->fetch_assoc())
            {
                echo "<tr> <td>".$rowocc['idtable']."</td> <td>".$occupied."</td></tr>";
            }

            $free = "Unoccupied";
            
            $sqlfree = mysqli_query($conn,"SELECt idtable FROM tabledb t WHERE idtable NOT IN (SELECT DISTINCT t.idtable FROM tabledb t
            INNER JOIN orderdb o ON o.idtable = t.idtable) && idtable NOT IN (SELECT DISTINCT t.idtable FROM tabledb t
            INNER JOIN reservation r ON r.idtable = t.idtable)");
            while($rowfree = $sqlfree->fetch_assoc())
            {
                echo "<tr> <td>".$rowfree['idtable']."</td><td>".$free."</td> </tr>";
            }
            echo"</table>";
?>
</table>
</body>
</html>