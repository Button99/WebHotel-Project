<?php 
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    include("../serverSideVal/addHotelValidation.inc.php");
    
    if(empty($_SESSION["userId"])) {
        echo "Πρέπει να συνδεθείς πρώτα!<br>";
        echo '<a href="../screens/logIn.php">Σύνδεση</a>';
        exit();
    }

    $res= hasHotel();
    if($res) {
        echo "<b>Έχεις Προσθέσει ήδη ξενοδοχείο για οποιαδήποτε αλλαγή γίνει θα ενημερωθεί το παρόν ξενοδοχείο</b><br>";
    }
?>

<script src="../clientSideVal/addHotelValidation.js"></script>
<section>
    <form class="add-hotel" method="post" action="../serverSideVal/addHotelValidation.inc.php" onsubmit="return validateForm()" enctype="multipart/form-data">
        <label for="hotelName">Όνομα ξενοδοχείου:</label><br>
        <input type="text" name="hotelName" id="hotelName"/><br><br>
        <?php
                echo '<label for="district">Νομός:</label><br>';
                echo '<select name="district" id="district">';
                for($index= 0; $index< sizeof($arr); $index++) {
                    echo "<option value=". $arr[$index] .">".$arr[$index] ."</option>";
                }
                echo "</select>";
        ?>
        <br><br>
        <label for="address">Διεύθυνση:</label><br>
        <input type="text" name="address" id="address"/><br><br>
        <label for="phone">Τηλέφωνο:</label><br>
        <input type="text" name="phone" id="phone" /><br><br>
        <label for="rooms">Δωμάτια:</label><br>
        <input type="number" name="rooms" id="rooms" min="1" max="999" value="1" /><br><br>
        <label for="longtitude">Γεωγραφικό μήκος:</label><br>
        <input type="text" name="longitude"id="longitude"/><br><br>
        <label for="latitude">Γεωγραφικό πλάτος:</label><br>
        <input type="text" name="latitude" id="latitude"/><br><br>
        <label for="stars">Αστέρια:</label><br>
        <?php 
            echo '<select name="stars" id="stars" >';
            for($index=1; $index<=5; $index++) {
                echo "<option value=". $index . ">".$index . "</option>";
            }
            echo "</select>";
            echo "<br><br>";
            $boolArr= array("Ναι", "Οχι");
            echo '<label for="hasGym">Γυμναστήριο:</label><br>';
            echo '<select name="hasGym" id="hasGym">';
            for($index= 0; $index< sizeof($boolArr); $index++) {
                echo "<option value=". $index .">".$boolArr[$index] ."</option>";
            }
            echo "</select><br><br>";
        // Pool
                $boolArr= array("Ναι", "Οχι");
                
                echo '<label for="hasPool">Πισίνα:</label><br>';
                echo '<select name="hasPool" id="hasPool">';
                for($index= 0; $index< sizeof($boolArr); $index++) {
                    echo "<option value=". $index .">".$boolArr[$index] ."</option>";
                }
                echo "</select>";
                echo "<br><br>";
        // Cinema                
                echo '<label for="hasCinema">Σινεμά:</label><br>';
                echo '<select name="hasCinema" id="hasCinema">';
                for($index= 0; $index< sizeof($boolArr); $index++) {
                    echo "<option value=". $index .">".$boolArr[$index] ."</option>";
                }
                echo "</select>";
                echo "<br><br>";
        ?>

        <label for="upload">Φωτογραφίες:</label><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="1024" />
        <input type="file" name="upload" id="upload" multiple/> </label for="desc" >Περιγραφή:</label><input type="text" name="desc" id="desc" /><br><br>
        <button type="submit" name="addHotel" id="addHotel">Προσθήκη</button>
    </form>
</section>

<?php
    include("../imports/pageFooter.php");
?>