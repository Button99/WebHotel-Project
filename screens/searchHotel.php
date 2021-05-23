<?php 
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    include("../serverSideVal/formSearchValidation.inc.php");
?>
<section>
    <?php
        if(isset($_GET["searchHotel"]) || $_GET["dsc"]) {
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

            if($_SESSION["district"]== NULL || $_SESSION["rooms"]== NULL || $_SESSION["date"]== NULL) {
                $district= $_GET["dsc"];
                $district= 10;
                $date= date("d/m/Y");
            }
            else {
                $district= $_SESSION["district"];
                $rooms= $_SESSION["rooms"];
                $date= $_SESSION["date"];
            }
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

                echo "<section class='hotel-pictures'>";
                echo "<ul class='hotel-cards'>";

                while($record= $stmt-> fetch(PDO::FETCH_ASSOC)) {
                    echo "<li><a href='../screens/hotelDetail.php?hotel={$record["hotelName"]} '><img src='../media/Athens.jpg' tag='Athens' />";
                    echo "<h3> " .$record["hotelName"]. "</h3></a>";
                    echo "<p> Νομός: " .$record["district"]. "</p>";
                    echo "<p> Τηλέφωνο: " .$record["phone"]. "</p></li>"; 
                }
                
                echo "</ul></section>";
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