<?php
    $servername= "localhost";
    $username= "webhoteluser";
    $password= "";

    try {
        $conn= new PDO("mysql:host=$servername;dbname=webhotels", $username, $password);

        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
    }
    
    catch (PDOException $p) {
        echo "Πρόβλημα με τον server";
        echo $p-> getMessage();
    }
    
?>