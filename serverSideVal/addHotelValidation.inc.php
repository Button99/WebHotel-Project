<?php
    include("../server/conn.inc.php");

    function hasHotel() {
        include("../server/conn.inc.php");
        try {
            $sql= "SELECT * FROM `Hotels` WHERE `Users_userID`={$_SESSION['userId']};";
            $stmt= $conn->query($sql);
            $stmt-> execute();
            $data= $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                return TRUE;
            }

            return FALSE;
        } catch(PDOException $e) {
            echo $e->getMessage();
    }
    }

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
        $uploadFile= $_FILES['upload']['tmp_name'];
        $uploadName= $_FILES['upload']['name'];
        $uploadType= $_FILES['upload']['type'];
        $desc= $_POST["desc"];
        
        $ext= strtolower(substr($uploadName, -3));
        $maxSize= 300;

        $size= filesize($_FILES["upload"]["tmp_name"]);

        $flag= FALSE;

        if(!isset($hotelName) || !isset($district) || !isset($address) || !isset($phone) || !isset($rooms) || 
           !isset($longitude) || !isset($latitude) || !isset($stars) || !isset($hasGym) || !isset($hasCinema) || !isset($hasPool)) 
        {
               echo "Παρακαλώ συμπληρώστε τα υποχρεωτικά πεδία!<br>";
               $flag= TRUE;
        }

        if(preg_match("/^[a-zA-Z0-9]*$/", $hotelName) || $hotelName== "") {
            echo "Το όνομα του ξενοδοχείου πρέπει να μην περιέχει ειδικούς χαρακτήρες<br>";
            $flag= TRUE;
        }

        if($district== NULL) {
            echo "Παρακαλώ συμπληρώστε σωστά τον νομό!<br>";
            $flag= TRUE;
        }

        if(preg_match("/^[a-zA-Z0-9]*$/", $address) || strlen($address) < 3) {
            echo "Λάθος στοιχεία διεύθυνσης!<br>";
            $flag= TRUE;
        }

        if(preg_match("/[0-9]*", $phone) || strlen($phone) < 3) {
            echo "Μη επιτρεπτός αριθμός τηλεφώνου!<br>";
            $flag= TRUE;
        }

        if(preg_match("/^[1-9]{0, 3}/", $rooms) || $rooms== NULL) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία μεταξύ 1-999!<br>";
            $flag= TRUE;
        }

        if(preg_match("/-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}/", $longitude) || $longitude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών<br>";
            $flag= TRUE;
        }

        if(preg_match("/-?([1-8]?[1-9]|[1-9]0)\.{1}\d{7}/", $latitude) || $latitude < 3) {
            echo "Παρακαλώ εισάγεται αριθμητικά στοιχεία με ακρίβεια 7 δεκαδικών<br>";
            $flag= TRUE;
        }

        if($stars<1 && $stars >5) {
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
    
        if($ext!= "jpg" || $size>= $maxSize*1024) {
            echo "Παρακαλώ προσθέστε φωτογραφίες jpeg με όριο 300kb<br>";
            $flag= TRUE;
        }

        if($flag == TRUE) {
            exit();
        }
        $res= hasHotel();

        if($res) {
            try {
                $sql="UPDATE `Hotels` SET `hotelName`=:hotelName, `district`=:district, `address`=:addr, `phone`=:phone, `numberOfRooms`=:numberOfRooms,
                `longitude`:=longitude, `latitude`=:latitude, `rate`=:rate, `pool`=:hasPool, `gym`=:gym, `cinema`=:cinema, `Users_userID`=:usrId WHERE `Users_userID`=:usrId;";
                
                $stmt= $conn->prepare($sql);
                $stmt-> bindParam("hotelName", $hotelName, PDO::PARAM_STR);
                $stmt-> bindParam("district", $district, PDO::PARAM_STR);
                $stmt-> bindParam("addr", $address, PDO::PARAM_STR);
                $stmt-> bindParam("phone", $phone, PDO::PARAM_STR);
                $stmt-> bindParam("numberOfRooms", $rooms, PDO::PARAM_STR);
                $stmt-> bindParam("longitude", $longitude, PDO::PARAM_STR);
                $stmt-> bindParam("latitude", $latitude, PDO::PARAM_STR);
                $stmt-> bindParam("rate", $stars, PDO::PARAM_STR);
                $stmt-> bindParam("hasPool", $hasPool, PDO::PARAM_STR);
                $stmt-> bindParam("gym", $hasGym, PDO::PARAM_STR);
                $stmt-> bindParam("cinema", $hasCinema, PDO::PARAM_STR);
                $stmt-> bindParam("usrId", $_SESSION["userId"], PDO::PARAM_STR);
    
                $res= $stmt->execute();
                

                $sql= "SELECT `hotelID` FROM `Hotels` WHERE `Users_userID`=:usrId";
                $stmt= $conn->prepare($sql);
                $stmt-> bindParam("usrId", $_SESSION["userId"]);
                $stmt->execute();
                $data= $stmt->fetch(PDO::FETCH_ASSOC);

                $sql= "INSERT INTO `pictures` (filenames, mimetype, descr, Hotel_hotelID) VALUES (:uploadF, :uploadT, :descr, :dat);";
                $stmt= $conn->prepare($sql);
                $stmt-> bindParam("uploadF", $uploadName, PDO::PARAM_STR);
                $stmt-> bindParam("uploadT", $uploadType, PDO::PARAM_STR);
                $stmt-> bindParam("descr", $desc, PDO::PARAM_STR);
                $stmt-> bindValue("dat", $data['hotelID'], PDO::PARAM_STR);
                $stmt-> execute();

                header("Location: ../screens/index.php");

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        else {
            try {
                $sql= "INSERT INTO `Hotels` (`hotelName`, `district`, `address`, `phone`, `numberOfRooms`,
                `longitude`, `latitude`, `rate`, `pool`, `gym`, `cinema`, `Users_userID`, `Users_username`, `Users_email`) 
                VALUES (:hotelName, :district, :addr, :phone, :numberOfRooms, :longitude, :latitude, :rate, :hasPool,
                :gym, :cinema, :usrId, :usrname, :usremail);";
                
                $stmt= $conn->prepare($sql);

                $stmt-> bindParam("hotelName", $hotelName, PDO::PARAM_STR);
                $stmt-> bindParam("district", $district, PDO::PARAM_STR);
                $stmt-> bindParam("addr", $address, PDO::PARAM_STR);
                $stmt-> bindParam("phone", $phone, PDO::PARAM_STR);
                $stmt-> bindParam("numberOfRooms", $rooms, PDO::PARAM_STR);
                $stmt-> bindParam("longitude", $longitude, PDO::PARAM_STR);
                $stmt-> bindParam("latitude", $latitude, PDO::PARAM_STR);
                $stmt-> bindParam("rate", $stars, PDO::PARAM_STR);
                $stmt-> bindParam("hasPool", $hasPool, PDO::PARAM_STR);
                $stmt-> bindParam("gym", $hasGym, PDO::PARAM_STR);
                $stmt-> bindParam("cinema", $hasCinema, PDO::PARAM_STR);
                $stmt-> bindParam("usrId", $_SESSION["userId"], PDO::PARAM_STR);
                $stmt-> bindParam("usrname", $_SESSION["username"], PDO::PARAM_STR);
                $stmt-> bindParam("usremail", $_SESSION["email"], PDO::PARAM_STR);

                $stmt->execute();
                // Get the hotel id bef4 send

                $sql= "SELECT `hotelID` FROM `Hotels` WHERE `Users_userID`=:usrId";
                $stmt= $conn->prepare($sql);
                $stmt-> bindParam("usrId", $_SESSION["userId"]);
                $stmt->execute();
                $data= $stmt->fetch(PDO::FETCH_ASSOC);

                $sql= "INSERT INTO `pictures` (filenames, mimetype, descr, Hotel_hotelID) VALUES (:uploadF, :uploadT, :descr, :dat);";
                $stmt= $conn->prepare($sql);

                $stmt-> bindParam("uploadF", $uploadName, PDO::PARAM_STR);
                $stmt-> bindParam("uploadT", $uploadType, PDO::PARAM_STR);
                $stmt-> bindParam("descr", $desc, PDO::PARAM_STR);
                $stmt-> bindValue("dat", $data['hotelID'], PDO::PARAM_STR);
                $stmt-> execute();
                header("Location: ../screens/index.php");
            } catch(PDOException $e) {
                echo "Error! ". $e->getMessage();
            }

        }
    }
?>