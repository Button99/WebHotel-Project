<?php 
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
?>
<section>
    <?php
            while($record= $stmt-> fetch(PDO::FETCH_ASSOC) ) {
                // echo $record["hotelID"];
            }
    ?>
</section>

<?php
    include("../imports/pageFooter.php");
?>