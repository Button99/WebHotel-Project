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

            $sql= "SELECT `username`, `email` FROM `Users` WHERE `username`=:username OR `email`=:email;";
            $stmt= $conn->prepare($sql);
            $stmt-> bindParam("username", $usr, PDO::PARAM_STR);
            $stmt-> bindParam("email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $count= $stmt->rowCount();
            $data= $stmt->fetch(PDO::FETCH_OBJ);
            
            if($data->username == $usr || $data->email == $email) {
                echo "Υπάρχει ήδη λογαριασμός!";
                echo '<button onclick="history.go(-1);"">Επιστροφή</button>';
                exit();
            }
            
            $sql= "INSERT INTO `Users` (`username`, `password`, `email`, `vkey`) VALUES
                (:usr, :hashedPsw, :email, :vkey);";
            
            $stmt= $conn-> prepare($sql);
            $stmt-> bindParam("usr", $usr, PDO::PARAM_STR);
            $stmt-> bindParam("hashedPsw", $hashedPsw, PDO::PARAM_STR);
            $stmt-> bindParam("email", $email, PDO::PARAM_STR);
            $stmt-> bindParam("vkey", $vkey, PDO::PARAM_STR);

            $stmt-> execute();

            $res= sendMail($email, $vkey);
            if($res) {
                header("Location: ../screens/logIn.php");
            }
            else {
                echo "Πρόβλημα με τον σέρβερ<br>Προσπαθήστε ξανά";
                $sql= "DELETE FROM `Users` WHERE `username`=:usr";
                $stmt-> prepare($sql);
                $stmt-> bindParam("usr", $usr, PDO::PARAM_STR);
                $stmt->execute();
            }
        } catch(PDOException $e) {
            echo $e-> getMessage();
            echo "<br> Πρόβλημα κατά την εξυπηρέτηση του server παρακαλώ προσπαθήστε ξανά!";
        }
    }
?>