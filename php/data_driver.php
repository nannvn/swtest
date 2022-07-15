<?php

class DataDriver {


    private static $_connection;

    private static function getConnection() {

        if (empty(DataDriver::$_connection)) {
            DataDriver::$_connection = mysqli_connect('localhost', 'root', 'pass', 'sales');
        }   
        return "Connected!";
    }

    public static function getComments() {

        return DataDriver::getConnection();
    }
}

