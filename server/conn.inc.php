<?php
    $servername= "localhost";
    $username= "root";
    $password= "";

    try {
        $conn= new PDO("mysql:host=$servername;dbname=webhotels", $username, $password);

        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
    } catch (PDOException $e) {
        echo "Πρόβλημα με τον server";
        echo $e-> getMessage();
    }
    
?>