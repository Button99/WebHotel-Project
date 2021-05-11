<?php 
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    include("../serverSideVal/formSearchValidation.inc.php");
?>
<section>
    <?php
        if($_SESSION["record"]) {
            echo $_SESSION["record"];
        }
    ?>
</section>

<?php
    include("../imports/pageFooter.php");
?>