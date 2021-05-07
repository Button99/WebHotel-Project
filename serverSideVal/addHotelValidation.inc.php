<?php
    include("../server/conn.inc.php");
    

    if(isset($_POST["addHotel"])) {

        $hotelName= $_POST["hotel-name"];
        $district= $_POST["district"];
        $address= $_POST["address"];
        $rooms= $_POST["rooms"];
        $longititude= $_POST["longititude"];
        $latitude= $_POST["latitude"];
        $stars= $_POST["stars"];
        $hasGym= $_POST["has-gym"];
        $hasPool= $_POST["has-pool"];
        $hasCinema= $_POST["has-cinema"];
        $pictures= $_POST["pictures"];


        // Make float the values longitude, latitude
        $longititude= (float) $longititude;
        $latitude= (float) $latitude;

        // Form Validation (Backend)...

        if(empty($hotelName) || empty($district) || empty($address) || empty($rooms) || empty($longtitude) ||
           empty($stars) || empty($hasGym) || empty($hasCinema) || empty($hasPool)) 
           {
               echo "Παρακαλώ συμπληρώστε τα υποχρεωτικά πεδία!\n";
               exit();
           }

        if(preg_match("^[a-zA-Z0-9]*$", $hotelName)) {
            echo "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες\n";
            exit();
        }

        if($district== null || filter_var($district, FILTER_VALIDATE_INT)) {
            echo "Παρακαλώ συμπληρώστε σωστά τον νομό!\n";
            exit();
        }

        if(preg_match("^[a-zA-Z0-9]*$", $address) || strlen($address) < 3) {
            echo "Λάθος στοιχεία διεύθυνσης!\n";
            exit();
        }

        if(preg_match("^[1-9]{0, 3}", $rooms) || rooms== NULL) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!\n";
            exit();
        }

        if(preg_match('[0-9]+("."[0-9]+)?', $longitude) || $longititude < 3)
    }