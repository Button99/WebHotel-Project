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

        $flag= FALSE;

        $longititude= (float) $longititude;
        $latitude= (float) $latitude;

        if(empty($hotelName) || empty($district) || empty($address) || empty($rooms) || empty($longtitude) ||
           empty($stars) || empty($hasGym) || empty($hasCinema) || empty($hasPool)) 
           {
               echo "Παρακαλώ συμπληρώστε τα υποχρεωτικά πεδία!\n";
               $flag= TRUE;     
        }

        if(preg_match("^[a-zA-Z0-9]*$", $hotelName)) {
            echo "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες\n";
            $flag= TRUE;
        }

        if($district== null || filter_var($district, FILTER_VALIDATE_INT)) {
            echo "Παρακαλώ συμπληρώστε σωστά τον νομό!\n";
            $flag= TRUE;
        }

        if(preg_match("^[a-zA-Z0-9]*$", $address) || strlen($address) < 3) {
            echo "Λάθος στοιχεία διεύθυνσης!\n";
            $flag= TRUE;
        }

        if(preg_match("^[1-9]{0, 3}", $rooms) || rooms== NULL) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!\n";
            $flag= TRUE;
        }

        if(preg_match("-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}", $longitude) || $longititude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";
            $flag= TRUE;
        }

        if(preg_match("-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}", $latitude) || $latitude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών\n";
            $flag= TRUE;
        }

        if(preg_match("[1-5]{1}", $stars)) {
            echo "Μη επιτρεπτός αριθμός αστεριών!\n";
            $flag= TRUE;
        }

        if($hasGym!= 0 && $hasGym!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει γυμναστήριο!\n";
            $flag= TRUE;
        }
    
        if($hasPool!= 0 && $hasPool!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει πισίνα!\n";
            $flag= TRUE;
        }
    
        if($hasCinema!= 0 && $hasCinema!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει σινεμά!\n";
            $flag= TRUE;
        }
    
        if($pictures== null) {
            echo "Παρακαλώ προσθέστε φωτογραφίες!\n";
            $flag= TRUE;
        }

        if($flag == TRUE) {
            exit();
        }

        ## TODO: Insert sql, logout, manage session pages
        
    }