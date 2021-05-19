<?php 
    include("../server/conn.inc.php");

   if(isset($_POST["logIn"])) {
    $usr= $_POST["username"];
    $psw= $_POST["password"];
    
    $flag= FALSE;
    if(empty($usr) || empty($psw) || strlen($usr) < 8 || strlen($psw) < 8){
        echo "Πρόβλήμα με τα στοιχεία σου!";
        $flag= TRUE;
    }

    if(preg_match("#^[A-Za-z]\\w{5, 29}$#", $usr)) {
        echo "Πρόβλημα με τα στοιχεία σου!";
        $flag= TRUE;
    }

    if($flag == TRUE) {
        exit();
    }


    // if connection with the server is established then access to the sql query...
    try {
        $hashedPsw= openssl_digest($psw,"sha512");
        $sql= "SELECT * FROM Users WHERE `username`=:usr AND `password`=:hashedPsw;";
        $stmt= $conn->prepare($sql);
        
        $stmt->bindParam("usr", $usr, PDO::PARAM_STR);
        $stmt->bindParam("hashedPsw", $hashedPsw, PDO::PARAM_STR);
        $stmt->execute();

        $count= $stmt->rowCount();
        $data= $stmt->fetch(PDO::FETCH_OBJ);

        if($data->isValid== 0) {
            $errormsg= "Πρέπει πρώτα να γίνει επιβεβαίωση!";
            header("Location: ../screens/error.php");

            exit();
        }

        if($count) {
            $_SESSION["userId"]= $data->userID;
            $_SESSION["username"]= $data->username;
            $_SESSION["email"]= $data->email;
            header("Location: ../screens/index.php");
        }
        else {
            return false;
        }
    } catch(PDOException $e) {
        echo "Error!";
        echo "<br>" . $e->getMessage();
    }
}
?>