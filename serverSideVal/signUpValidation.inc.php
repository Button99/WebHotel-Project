<?php 
    include("../server/conn.inc.php");
    include("../sendMail/sendMail.inc.php");

    if(isset($_POST["signUp"])) {
        $usr= $_POST["username"];
        $psw= $_POST["password"];
        $email= $_POST["email"];
        $flag= FALSE;
        if(empty($usr) || empty($psw) || empty($email) ||  strlen($usr) < 8 || strlen($psw) < 8 || strlen($email) < 3){
            echo "Πρόβλήμα με τα στοιχεία σου!";
            $flag= TRUE;
        }
        
        if(preg_match("/^[A-Za-z]\\w{5, 29}$/", $usr)) {
            echo "Πρόβλημα με τα στοιχεία σου! usr";
            $flag= TRUE;
        }

        if(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8, 20}$/", $psw)) {
            echo "Πρόβλημα με τα στοιχεία σου! psw";
            $flag= TRUE;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Πρόβλημα με τα στοιχεία σου! email";
            $flag= TRUE;
        }

        try {
            $hashedPsw= openssl_digest($psw, "sha512");
            $vkey= md5(time().$usr);
            $sql= "INSERT INTO `Users` (`username`, `password`, `email`, `vkey`) VALUES
                ('$usr', '$hashedPsw', '$email', '$vkey');";

            $conn ->exec($sql);
            // Generate vkey
            $res= sendMail($email, $vkey);
            if($res) {
                header("Location: ../screens/logIn.php");
            }
            else {
                echo "Πρόβλημα με τον σέρβερ<br>Προσπαθήστε ξανά";
                $sql= "DELETE FROM `Users` WHERE `username`=$usr";
                $conn->exec($sql);
            }
        } catch(PDOException $e) {
            echo $e-> getMessage();
            echo "<br> Πρόβλημα κατά την εξυπηρέτηση του server παρακαλώ προσπαθήστε ξανά!";
        }
    }
?>