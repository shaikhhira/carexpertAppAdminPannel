<?php

class Database{

    function connect(){
        $host = 'localhost';
        $dbname = 'carsystem';
        $username = 'root';
        $password = '';
    
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // echo "Connected to $dbname at $host successfully.";
            return $conn;
        } catch (PDOException $pe) {
            die("Could not connect to the database $dbname :" . $pe->getMessage());
        }
    
    }
}