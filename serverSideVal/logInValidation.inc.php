<?php 
    include("../server/conn.inc.php");

   if(isset($_POST["logIn"])) {
    $usr= $_POST["username"];
    $psw= $_POST["password"];
    
    if(empty($usr) || empty($psw) || strlen($usr) < 8 || strlen($psw) < 8){
        echo "Πρόβλήμα με τα στοιχεία σου!";
        exit();
    }

    if(!preg_match("^[A-Za-z]\\w{5, 29}$", $usr)) {
        echo "Πρόβλημα με τα στοιχεία σου!";
        exit();
    }


    // if connection with the server is established then access to the sql query...

  #  $sql= "SELECT * FROM User WHERE `username`=$usr AND `password`=$psw";
  #  $stmt= conn->exec($sql);
}
?>