<?php

class DataDriver {


    private static $_connection;

    public static function getConnection() {

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
    
        // call comments
        $query = "SELECT orderid, comments FROM sweetwater_test WHERE "
            . "comments LIKE '%please call%' OR "
            . "comments LIKE '%call me%' OR "
            . "comments LIKE '%not call%' OR "
            . "comments LIKE '%don\'t call%';";
        DataDriver::getQueryRows($query, $results['call']);
        
        // misc comments, exclude orderids in current results
        $ids = [];
        foreach ($results as $category) {
            foreach ($category as $row) {
                $ids []= $row['orderid'];
            }
        }
        $query = "SELECT orderid, comments FROM sweetwater_test WHERE orderid NOT IN (" . implode(',', $ids) . ")";
        DataDriver::getQueryRows($query, $results['misc']);
        
        return $results;
    }
}

