<?php
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    if(isset($_GET["vkey"])) {
        $vkey= $_GET['vkey'];
        $sql= "SELECT isValid, vkey FROM `Users` WHERE isValid=0 AND vkey= '$vkey';";
        $res= $conn->query($sql);
        
        if($res) {
            // validate
            $sql= "UPDATE `Users` SET isValid=1 WHERE vkey= '$vkey' ";
            $update=$conn->query($sql);
            if($update) {
                echo '<section>
                    <p>Το email σας επιβεβαιώθηκε επιτυχώς!</p>
                </section>';
            }
        } 
    } 
    else {
        die("Κάτι πήγε λάθος");
    }
?>

<?php
    include("../imports/pageFooter.php");
?>