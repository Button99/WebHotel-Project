<?php 
    include("../imports/pageHeader.php");
?>
<script>
    var districts=["", "", "", "", "", "", ""]
</script>
<section>
    <form class="add-hotel">
        <label for="hotel-name">Όνομα ξενοδοχείου:</label><br>
        <input type="text" name="hotel-name"/><br><br>
        <?php
                $lists= ("Έβρου", "Ροδόπης", "Ξάνθης", "Δράμας", "Καβάλας", "Θεσσαλονίκης", "Χαλκιδικής", "Ημαθίας", "Κιλκίς", "Πέλλας", "Πιερίας", "Σερρών",
                "Κοζάνης", "Φλώρινας", "Γρεβενών", "Καστοριάς", "Ιωαννίνων", "Άρτας", "Πρέβεζας", "Θεσπρωτίας", "Λάρισας", "Καρδίτσας", "Μαγνησίας", "Τρικάλων", "Βοιωτίας", "Ευβοίας", "Ευρυτανίας",
                "Φωκίδας", "Φθιώτιδας", "Κεφαλληνίας", "Κέρκυρας", "Λευκάδας", "Ζακύνθου", "Αχαΐας", "Ηλείας", "Αιτωλοακαρνανίας", "Αρκαδίας", "Αργολίδας", "Κορινθίας", "Λακωνίας", "Μεσσηνίας", "Αθηνών", "Ανατολικής Αττικής",
                "Πειραιώς", "Δυτικής Αττικής", "Χίου", "Λέσβου", "Σάμου", "Κυκλάδων", "Δωδεκανήσου", "Ηρακλείου", "Χανίων", "Λασιθίου", "Ρεθύμνης");
                echo '<label for="district">Νομός:</label><br>';
                echo '<select name="district">';
                foreach($lists as $var => $list):
                    echo '<option value="$var">$var</option>';
        ?>


        <label for="address">Διεύθυνση:</label><br>
        <input type="text" name="address"/><br><br>
        <label for="rooms">Δωμάτια:</label><br>
        <input type="text" name="rooms"/><br><br>
        <label for="latittude">Γεωγραφικό μήκος:</label><br>
        <input type="text" name="latittude"/><br><br>
        <label for="longtittude">Γεωγραφικό πλάτος:</label><br>
        <input type="text" name="longtittude"/><br><br>
        <label for="stars">Αστέρια:</label><br>
        <input type="text" name="stars"/><br><br>
        <label for="has-pool">Πισίνα:</label><br>
        <input type="text" name="has-pool"/><br><br>
        <label for="has-gym">Γυμναστήριο:</label><br>
        <input type="text" name="has-gym"/><br><br>
        <label for="has-cinema">Σινεμά:</label><br>
        <input type="text" name="has-cinema"/><br><br>
        <label for="pictures">Φωτογραφίες:</label><br>
        <input type="text" name="pictures"/><br><br>
        <button type="submit">Προσθήκη</button>
    </form>
</section>

<?php
    include("../imports/pageFooter.php");
?>