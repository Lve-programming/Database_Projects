<?php
    
    $server  = "localhost";
    $username = "root";
    $pass    = "";
    $dbName  = "stationaryshop";
    try {
        $conn = new PDO("mysql:host = $server;dbname=$dbName",$username ,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {

            echo "Error Message:" . $e->getMessage();
    }
