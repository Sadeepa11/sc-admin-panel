<?php

class Database {
    public static $connection;

    public static function setupConnection () {
        if(!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "Sata.Pata.123", "cs_platform","3306");
        }
    }

    public static function search($q) {
        Database::setupConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
    
    public static function iud($q)  {
        Database::setupConnection();
        Database::$connection->query($q);
    }
}

?>