<?php
    if(isset($_GET["btn"])) {
        if($_COOKIE["user"]== 1){
            $_COOKIE["user"]= 2;
            setcookie("user", 2, time() + (86400 * 10), "/"); // 10 day cookie
            header("Location: ../screens/index.php");
        }
        else {
            $_COOKIE["user"]=1;
            setcookie("user", 1, time() + (86400 * 10), "/"); // 10 day cookie
            header("Location: ../screens/index.php");
        }
    }
?>
