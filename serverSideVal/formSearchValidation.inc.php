<?php

    include("../server/conn.inc.php");

    $district= $_POST["dsc"];
    $rooms= $_POST["room"];
    $date= $_POST["date"];

    $flag= FALSE;
    echo $district;
    if(isset($_POST["searchHotel"])) {

        if(!isset($district) && !isset($people) && !isset($date)) {
            echo "Συμπληρώστε όλα τα κενά!<br>";
            $flag= TRUE;
            exit();
        }

        if(preg_match("^[a-zA-Z]+$", $district) || !isset($district)) {
            echo "Συμπληρώστε την περιοχή!<br>";
            $flag= TRUE;

        }

        if(($rooms < 0 || $rooms > 999) || !isset($rooms)) {
            echo "Συμπληρώστε τα άτομα!<br>";
            $flag= TRUE;

        }

        if(preg_match("/^\d{2}[./-]\d{2}[./-]\d{4}$/", $date) || !isset($date)) {
            echo "Συμπληρώστε σωστά την ημερομηνία!<br>";
            $flag= TRUE;
        }

        if($flag == TRUE) {
            exit();
        }

        $recordsPerPage = 5;
        if(isset($_GET["page"])) 
            $curPage= $_GET["page"];
        else 
            $curPage= 1;

        $startIndex= ($curPage - 1) * $recordsPerPage = 5;

        try {
            $sql= "SELECT COUNT(hotelID) as recCount FROM `Hotels`;";
            $stmt= $conn -> query($sql);
            $record= $stmt-> fetch(PDO::FETCH_ASSOC);
            $pages= ceil($record["recCount"]/ $recordsPerPage);
            $stmt-> closeCursor();
            $record= null;

            $sql= "SELECT * FROM `Hotels` WHERE `district`=:district AND `numberOfRooms`>=:rooms;";
            $stmt= $conn->prepare($sql);

            $stmt-> bindParam("district", $district, PDO::PARAM_STR);
            $stmt-> bindParam("rooms", $rooms, PDO::PARAM_STR);
            $stmt-> execute();

            while($record= $stmt-> fetch(PDO::FETCH_ASSOC) ) {
                $record= $stmt-> fetch(PDO::FETCH_ASSOC);
                echo "works ";
            }

            if($record) {
                header("Location: ../screens/searchHotel.php");
            }

            echo "Error! cant find place";

        } catch(PDOException $e) {
            echo "Error <br>" . $e -> getMessage();
        }
    }