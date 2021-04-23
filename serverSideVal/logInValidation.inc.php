<?php 
    include("../server/conn.inc.php");

   if(isset($_POST["logIn"])) {
    $usr= $_POST["username"];
    $psw= $_POST["password"];
    
    if(empty($usr) || empty($psw) || strlen($usr) < 8 || strlen($psw) < 8){
        echo "Πρόβλήμα με τα στοιχεία σου!";
        exit();
    }

    if(!preg_match("/^[a-zA-Z-' ]*$/", $usr)) {
        echo "Πρόβλημα με τα στοιχεία σου!";
        exit();
    }


    // if connection with the server is established then access to the sql query...
}
?>