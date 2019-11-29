<?php
 include_once 'connection.php';
    
 $name = $_POST['name'];
 $idtable = $_POST['tableid'];
 $idtime = $_POST['idtime'];
 $iddate = $_POST['dateee'];
 $idres = $_POST['resid'];




 $sql = '';


 $sql .= "UPDATE reservation SET idtable = ".$idtable.", name = '".$name."' , time = '".$idtime."', 
 
 date = '".$iddate."' WHERE reservationid = ".$idres.";";


 if ($conn->multi_query($sql) === TRUE) {
 header("Location: tablestatus.php");
 }   else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }

?>
