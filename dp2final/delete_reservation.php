<?php
    include_once 'connection.php';

    if(isset($_GET['reservationid']))
    {
        $resid = mysqli_real_escape_string($conn,$_GET['reservationid']);	
        echo $resid;
    }
    else
    {
        echo"No Order ID";
    }

    //$resid = mysqli_real_escape_string($conn,$_POST['orderID']);     

    // Remove Empty items from the menu
   
        $sql .= "DELETE from reservation WHERE reservationid = ".$resid.";";
    

    if ($conn->query($sql) === TRUE) { 
        header("Location: order_page.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>