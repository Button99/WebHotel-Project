<?php 
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    include("../serverSideVal/formSearchValidation.inc.php");
?>
<section>
    <?php
        if(isset($_GET["searchHotel"])) {
            $res= formVal();
            if($res == TRUE) {
                echo "Error";
                exit();
            }
            $recordsPerPage = 5;
            if(isset($_GET["page"])) 
                $curPage= $_GET["page"];
            else 
                $curPage= 1;
    
            $startIndex= ($curPage - 1) * $recordsPerPage = 5;

            $district= $_SESSION["district"];
            $rooms= $_SESSION["rooms"];
            $date= $_SESSION["date"];

            try {

                $sql= "SELECT COUNT(hotelID) as recCount FROM `Hotels`;";
                $stmt= $conn -> query($sql);
                $record= $stmt-> fetch(PDO::FETCH_ASSOC);
                $pages= ceil($record["recCount"]/ $recordsPerPage);
                $stmt-> closeCursor();
                $record= null;

                $sql= "SELECT * FROM `Hotels` WHERE `district`=:district AND `numberOfRooms`>=:rooms  LIMIT :startIndex, :recordsPerPage; ";
                $stmt= $conn->prepare($sql);
    
                $stmt-> bindParam("district", $district, PDO::PARAM_STR);
                $stmt-> bindParam("rooms", $rooms, PDO::PARAM_STR);
                $stmt-> bindParam("startIndex", $startIndex, PDO::PARAM_INT);
                $stmt-> bindParam("recordsPerPage", $recordsPerPage, PDO::PARAM_INT);
                $stmt-> execute();

                while($record= $stmt-> fetch(PDO::FETCH_ASSOC)) {
                    echo $record["hotelName"]; 
                }

            } catch(PDOException $e) {
                echo "Error <br>" . $e -> getMessage();
            }
            $stmt-> closeCursor();
        }
?>
</section>

<?php
    include("../imports/pageFooter.php");
?>