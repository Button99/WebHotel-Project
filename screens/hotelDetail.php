<?php
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    
    if($_GET["hotel"]) {
        try {
            $sql= "SELECT * FROM `Hotels` WHERE hotelName=:hotel;";
            $stmt= $conn-> prepare($sql);
            $stmt-> bindParam("hotel", $_GET['hotel'], PDO::PARAM_STR);
            $stmt-> execute();

            $count= $stmt->rowCount();
            $data= $stmt->fetch(PDO::FETCH_OBJ);

            // get the image

            $sql= "SELECT * FROM `Pictures` WHERE `Hotel_hotelID`=:hotID";
            $stmt= $conn-> prepare($sql);
            $stmt-> bindParam("hotID", $data["hotelID"], PDO::PARAM_STR);
            $stmt-> execute();

            $count= $stmt->rowCount();
            $picture= $stmt->fetch(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        if($data->pool ==0) {
            $data->pool= "ΝΑΙ";
        }

        if($data->gym ==0) {
            $data->gym= "ΝΑΙ";
        }

        if($data->cinema ==0) {
            $data->cinema= "ΝΑΙ";
        }

        if($data->pool ==1) {
            $data->pool= "ΟΧΙ";
        }

        if($data->gym ==1) {
            $data->gym= "ΟΧΙ";
        }

        if($data->cinema ==1) {
            $data->cinema= "ΟΧΙ";
        }
        if($count) {
            echo '<section class="hotel-detail">';
            echo "<img src='../media/{$picture["filename"]}' tag='{$picture{"descr"]}' />"; //ERROROR
            echo '<p>Όνομα Ξεν/χειου: <b>'. $data->hotelName. '</b><br>Νομός:΅'. $data->district. '<br>Οδός: '. $data->address. '<br>Τηλέφωνο: '. $data->phone. '<br> ';
            echo '<br>Αστέρια: <b>'. $data->rate. '/5 </b>';
            echo '<br>Πισίνα:'. $data->pool;
            echo '<br>Γυμναστήριο:'. $data->gym;
            echo '<br>Σινεμά:'. $data->cinema;
            echo '</p></section>';
            echo '</section>';

            echo '<section class="frame">
                <div id="myMap" style="position: absolute; height: 20%; width: 20%; bottom: 35%;"></div>

                <script>
                    function initMap() {
                    map = new google.maps.Map(document.getElementById("myMap"), {
                        center: { lat:'. $data->latitude. ', lng:'.  $data->longitude. '},
                        zoom: 5,
                    });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeK1k5ofeAquX1Enuvp5feXkQxF1XKsQI&callback=initMap"
                    async></script>
                </section>';
        }
    }
    include("../imports/pageFooter.php");
?>