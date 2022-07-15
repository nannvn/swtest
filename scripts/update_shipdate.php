<?php
require('../src/data_driver.php');


function updateShipdate() {

    $db =  DataDriver::getConnection();
    $result = mysqli_query($db, "SELECT orderid, comments FROM sweetwater_test");    

    while ($row = $result->fetch_assoc()) {
     
        $comment = $row['comments'];            
        $matches = [];
        preg_match('/Expected Ship Date: ([0-9]+)\/([0-9]+)\/([0-9]+)/', $comment, $matches);

        if (!empty($matches)) {       
            $date = '20' . $matches[3] . '-' . $matches[1] . '-' . $matches[2] . ' 00:00:00';
            $query =   "UPDATE sweetwater_test SET shipdate_expected='" . $date . " WHERE orderid=" . $row['orderid']; 
            echo($query . "\n");         
            mysqli_query(
                $db, 
                $query
            );            
        }
    }
}

updateShipDate();


?>


