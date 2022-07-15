<?php

class DataDriver {


    private static $_connection;

    private static function getConnection() {

        if (empty(DataDriver::$_connection)) {
            DataDriver::$_connection = mysqli_connect('localhost', 'root', 'pass', 'sales');
        }   
        return DataDriver::$_connection;
    }

    private static function getQueryRows($query, &$results=[]) {
    
        $db =  DataDriver::getConnection();
        $result = mysqli_query($db, $query);
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    }

    public static function getComments() {
 
        $results = [
            'candy' => [],
            'call' => [],
            'refer' => [],
            'signature' => [],
            'misc' => []
        ];
        
        // candy comments
        $query = "SELECT orderid, comments FROM sweetwater_test WHERE comments LIKE '%candy%';";
        DataDriver::getQueryRows($query, $results['candy']);

         // referral comments
        $query = "SELECT orderid, comments FROM sweetwater_test WHERE comments LIKE '%refer%';";
        DataDriver::getQueryRows($query, $results['refer']);

        // signature comments
        $query = "SELECT orderid, comments FROM sweetwater_test WHERE comments LIKE '%sign%';";
        DataDriver::getQueryRows($query, $results['signature']);
        
        return $results;
    }
}

