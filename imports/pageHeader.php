<!DOCTYPE html>
<?php
    if(!isset($_COOKIE["user"])) {
        $cookieName= "user";
        $cookieValue= 1;  
        setcookie($cookieName, $cookieValue, time() + (86400 * 10), "/"); // 10 day cookie
    }
?>

<html>
    <head>
        <title>Web Hotels</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include("../cookies/saveMode.php");
            if($_COOKIE["user"]== 1) {
                echo '<link rel="stylesheet" href="../style1.css" type="text/css" />';
            }
            else {
                echo '<link rel="stylesheet" href="../style2.css" type="text/css" />';
            }
        ?>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script type="text/javascript">

        function initAJAX() {
            if (window.XMLHttpRequest) {   // για σύγχρονους nrowsers
                return xmlhttp=new XMLHttpRequest();
            } else if (window.ActiveXObject) {   //μόνο για IE5, IE6
                return xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            } else {   //δεν υποστηρίζονται AJAX κλήσεις
                alert("Your browser does not support AJAX calls!");
                return false;
            }
        }
        function myAJAXCall(categoryID) {

            var ajaxObject=initAJAX();

            if (ajaxObject) {

                var url= '../screens/error.php';
                ajaxObject.open("GET",url,true);
                ajaxObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                ajaxObject.onreadystatechange=function() {

                    if(ajaxObject.readyState==4 && ajaxObject.status==200) {
                        document.getElementById("errorMsg").innerHTML= ajaxObject.responseText;       

                    } else { 
                        // κάτι δεν πήγε καλά με την απάντηση του server
                        document.getElementById("errorMsg").innerHTML= "Πρόβλημα στην AJAX κλίση!";
                    }  
                } // end of callback
            } //if
        } //function
        </script>
    </head>
        <script src="../clientSideVal/formSearchValidation.js"></script> 
    <body>
        <section class="header">
            <header>
                <a href="index.php" style="text-decoration-line: none; color: black;">Web Hotels</a>
                <?php
                    session_start();
                    if(empty($_SESSION["userId"])) {
                        echo '<form method="get" class="change-mode" action="../cookies/saveMode.php">
                                <input type="submit" name="btn" value="Αλλαγή Θέματος" />
                              </form>';
                        echo '<a class="btn" href="../screens/logIn.php" name="login-btn"><button>Σύνδεση</button></a>';
                        echo '<a class="btn" href="../screens/signUp.php"><button>Εγγραφή</button></a>';



                    }
                    else {
                        echo '<form method="get" class="change-mode" action="../cookies/saveMode.php">
                                <input type="submit" name="btn" value="Αλλαγή Θέματος" />
                              </form>';
                        echo '<a class="btn" href="../screens/logout.php" name="login-btn"><button>Αποσύνδεση</button></a>';
                        echo '<a class="btn" href="../screens/addHotel.php"><button>Προσθήκη Ξενοδοχείου/Επεξεργασία</button></a>';
                    }

                    //echo '<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">';
                    echo '<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet"> ';
                ?>

            </header>
        </section>
        <section class="finder">
            <form method="GET" action="../screens/searchHotel.php" onsubmit="return validateForm()">
                <label for="dsc">Προορισμός:</label>
                <?php
                    $arr= array("Έβρου", "Ροδόπης", "Ξάνθης", "Δράμας", "Καβάλας", "Θεσσαλονίκης", "Χαλκιδικής", "Ημαθίας", "Κιλκίς", "Πέλλας", "Πιερίας", "Σερρών",
                    "Κοζάνης", "Φλώρινας", "Γρεβενών", "Καστοριάς", "Ιωαννίνων", "Άρτας", "Πρέβεζας", "Θεσπρωτίας", "Λάρισας", "Καρδίτσας", "Μαγνησίας", "Τρικάλων", "Βοιωτίας", "Ευβοίας", "Ευρυτανίας",
                    "Φωκίδας", "Φθιώτιδας", "Κεφαλληνίας", "Κέρκυρας", "Λευκάδας", "Ζακύνθου", "Αχαΐας", "Ηλείας", "Αιτωλοακαρνανίας", "Αρκαδίας", "Αργολίδας", "Κορινθίας", "Λακωνίας", "Μεσσηνίας", "Αθηνών", "Ανατολικής Αττικής",
                    "Πειραιώς", "Δυτικής Αττικής", "Χίου", "Λέσβου", "Σάμου", "Κυκλάδων", "Δωδεκανήσου", "Ηρακλείου", "Χανίων", "Λασιθίου", "Ρεθύμνης");
                    
                    echo '<select name="dsc" id="dsc">';
                    for($index= 0; $index< sizeof($arr); $index++) {
                        echo "<option value=". $arr[$index] .">".$arr[$index] ."</option>";
                    }
                    echo "</select>";
                ?>
                <label for="room">Δωμάτια:</label>
                <input type="number" name="room" id="room" min="1" max="100" value="1"/>
                <label for="has-pool">Πισίνα:</label>
                <input type="checkbox" name="has-pool" id="has-pool" value="0"/>
                <label for="date">Ημερομηνία:</label>
                <input type="date" name="date" id="date"/>
                <button type="submit" name="searchHotel" id="searchHotel">Αναζήτηση</button>
            </form>
        </section>