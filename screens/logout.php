<?php
    
    include("../server/conn.inc.php");
    $_SESSION["userId"]= "";
    if(empty($_SESSION["userId"])) {
        session_unset();
        session_destroy();
        header("Location: ../screens/index.php");
        exit();
    }
?>