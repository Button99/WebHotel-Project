<?php
    include("../server/conn.inc.php");

    if(isset($_POST["addHotel"]) && !empty($_SESSION["userId"])) {

        $hotelName= $_POST["hotelName"];
        $district= $_POST["district"];
        $address= $_POST["address"];
        $phone= $_POST["phone"];
        $rooms= $_POST["rooms"];
        $longitude= $_POST["longitude"];
        $latitude= $_POST["latitude"];
        $stars= $_POST["stars"];
        $hasGym= $_POST["hasGym"];
        $hasPool= $_POST["hasPool"];
        $hasCinema= $_POST["hasCinema"];
        $pictures= $_POST["pictures"];

        $flag= FALSE;

        echo $hotelName;
        echo $district;
        echo $address;
        echo $phone;
        echo $rooms;
        echo $longititude;
        echo $latitude;
        echo $stars;
        echo $hasGym;
        echo $hasPool;
        echo $hasCinema;

        if(isset($hotelName) || isset($district) || isset($address) || isset($phone) || isset($rooms) || isset($longitude) || isset($latitude) || isset($stars) || isset($hasGym) || isset($hasCinema) || isset($hasPool)) 
        {
               echo "Παρακαλώ συμπληρώστε τα υποχρεωτικά πεδία!<br>";
               $flag= TRUE;
        }

        if(preg_match("^[a-zA-Z0-9]*$", $hotelName) || $hotelName== "") {
            echo "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες<br>";
            $flag= TRUE;
        }

        if($district== NULL || filter_var($district, FILTER_VALIDATE_INT)) {
            echo "Παρακαλώ συμπληρώστε σωστά τον νομό!<br>";
            $flag= TRUE;
        }

        if(preg_match("^[a-zA-Z0-9]*$", $address) || strlen($address) < 3) {
            echo "Λάθος στοιχεία διεύθυνσης!<br>";
            $flag= TRUE;
        }

        if(preg_match("[0-9]*", $phone) || strlen(phone) < 3) {
            echo "Μη επιτρεπτός αριθμός τηλεφώνου!<br>";
            $flag= TRUE;
        }

        if(preg_match("^[1-9]{0, 3}", $rooms) || rooms== NULL) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!<br>";
            $flag= TRUE;
        }

        if(preg_match("-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}", $longitude) || $longititude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών<br>";
            $flag= TRUE;
        }

        if(preg_match("-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}", $latitude) || $latitude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών<br>";
            $flag= TRUE;
        }

        if(preg_match("[1-5]{1}", $stars)) {
            echo "Μη επιτρεπτός αριθμός αστεριών!<br>";
            $flag= TRUE;
        }

        if($hasGym!= 0 && $hasGym!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει γυμναστήριο!<br>";
            $flag= TRUE;
        }
    
        if($hasPool!= 0 && $hasPool!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει πισίνα!<br>";
            $flag= TRUE;
        }
    
        if($hasCinema!= 0 && $hasCinema!= 1) {
            echo "Επέλεξε αν το ξενοδοχείο εχει σινεμά!<br>";
            $flag= TRUE;
        }
    
        if($pictures== NULL) {
            echo "Παρακαλώ προσθέστε φωτογραφίες!<br>";
            $flag= TRUE;
        }

        if($flag == TRUE) {
            exit();
        }

        ## TODO: Insert sql need more work!
        try {
            $sql= "INSERT INTO Hotels WHERE (`hotelName`, `district`, `address`, `numberOfRooms`,
             `longitude`, `latitude`, `rate`, `pool`, `gym`, `cinema`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
             
             $stmt= $conn->prepare($sql);
             $stmt->execute([$hotelName, $district, $address, $rooms, $longititude, $latitude, 
                             $stars, $pool, $gym, $cinema]);
                    
            
        }
        catch(PDOException $e) {
            echo "Error! ". $e->getMessage();
        }

    }

    else {
        echo "Πρέπει να συνδεθείς πρώτα!<br>";
        echo '<a href="../screens/logIn.php">Σύνδεση</a>';
        exit();
    }
?>