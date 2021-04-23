<?php
    $servername= "localhost";
    $username= "root";
    $password= "";

    try {
        $conn= new PDO("mysql:host=$servername;dbname=webhotels", $username, $password);

        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to db!";
    }
    
    catch (PDOException $p) {
        echo "Connection error";
        echo "Error message" . $p->getMessage(); 
    }
    
?>