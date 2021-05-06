<?php 
    include("../imports/pageHeader.php");
?>

<section>
    <form class="add-hotel">
        <label for="hotel-name">Όνομα ξενοδοχείου:</label><br>
        <input type="text" name="hotel-name" id="hotel-name"/><br><br>
        <?php
                $arr= array("Έβρου", "Ροδόπης", "Ξάνθης", "Δράμας", "Καβάλας", "Θεσσαλονίκης", "Χαλκιδικής", "Ημαθίας", "Κιλκίς", "Πέλλας", "Πιερίας", "Σερρών",
                "Κοζάνης", "Φλώρινας", "Γρεβενών", "Καστοριάς", "Ιωαννίνων", "Άρτας", "Πρέβεζας", "Θεσπρωτίας", "Λάρισας", "Καρδίτσας", "Μαγνησίας", "Τρικάλων", "Βοιωτίας", "Ευβοίας", "Ευρυτανίας",
                "Φωκίδας", "Φθιώτιδας", "Κεφαλληνίας", "Κέρκυρας", "Λευκάδας", "Ζακύνθου", "Αχαΐας", "Ηλείας", "Αιτωλοακαρνανίας", "Αρκαδίας", "Αργολίδας", "Κορινθίας", "Λακωνίας", "Μεσσηνίας", "Αθηνών", "Ανατολικής Αττικής",
                "Πειραιώς", "Δυτικής Αττικής", "Χίου", "Λέσβου", "Σάμου", "Κυκλάδων", "Δωδεκανήσου", "Ηρακλείου", "Χανίων", "Λασιθίου", "Ρεθύμνης");
                
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
        <label for="rooms">Δωμάτια:</label><br>
        <input type="text" name="rooms" id="rooms"/><br><br>
        <label for="longtitude">Γεωγραφικό μήκος:</label><br>
        <input type="text" name="longitude"id="longitude"/><br><br>
        <label for="latitude">Γεωγραφικό πλάτος:</label><br>
        <input type="text" name="latitude"/><br><br>
        <label for="stars">Αστέρια:</label><br>
        <?php 
            echo '<select name="stars" id="stars" >';
            for($index=0; $index<=5; $index++) {
                echo "<option value=". $index . ">".$index . "</option>";
            }
            echo "</select>";
            echo "<br><br>";
            $boolArr= array("Ναι", "Οχι");
            echo '<label for="has-gym">Γυμναστήριο:</label><br>';
            echo '<select name="has-gym" id="has-gym">';
            for($index= 0; $index< sizeof($boolArr); $index++) {
                echo "<option value=". $boolArr[$index] .">".$boolArr[$index] ."</option>";
            }
            echo "</select><br><br>";
        // Pool
                $boolArr= array("Ναι", "Οχι");
                
                echo '<label for="has-pool">Πισίνα:</label><br>';
                echo '<select name="has-pool" id="has-pool">';
                for($index= 0; $index< sizeof($boolArr); $index++) {
                    echo "<option value=". $boolArr[$index] .">".$boolArr[$index] ."</option>";
                }
                echo "</select>";
                echo "<br><br>";
        // Cinema                
                echo '<label for="has-cinema">Σινεμά:</label><br>';
                echo '<select name="has-cinema" id="has-cinema">';
                for($index= 0; $index< sizeof($boolArr); $index++) {
                    echo "<option value=". $boolArr[$index] .">".$boolArr[$index] ."</option>";
                }
                echo "</select>";
                echo "<br><br>";
        ?>

        <label for="pictures">Φωτογραφίες:</label><br>
        <input type="file" name="pictures" id="pictures" multiple/><br><br>
        <button type="submit">Προσθήκη</button>
    </form>
</section>

<?php
    include("../imports/pageFooter.php");
?>