<?php

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "1234";
    $db_name = "login";

    try{
        $pdo = new PDO("mysql:host=$db_servername;dbname=$db_name",$db_username,$db_password);
        $drivers  = PDO::getAvailableDrivers();
    }catch(PDOException $e){
        echo "Connection Failed :". $e->getMessage();
    }
?>