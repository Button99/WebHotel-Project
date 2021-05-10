<!DOCTYPE html>
<html>
    <head>
        <title>Web Hotels</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css" type="text/css" />    </head>
        <script src="../clientSideVal/formSearchValidation.js"></script>
    <body>
        <section class="header">
            <header>
                <a href="index.php" style="text-decoration-line: none; color: black;">Web Hotels</a>
                <?php
                    session_start();
                    if(empty($_SESSION["userId"])) {
                        echo '<a class="btn" href="../screens/logIn.php" name="login-btn"><button>Σύνδεση</button></a>';
                        echo '<a class="btn" href="../screens/signUp.php"><button>Εγγραφή</button></a>';

                    }
                    else {
                        echo '<a class="btn" href="../screens/logout.php" name="login-btn"><button>Αποσύνδεση</button></a>';
                        echo '<a class="btn" href="../screens/addHotel.php"><button>Προσθήκη Ξενοδοχείου</button></a>';

                    }

                    
                ?>

            </header>
        </section>
        <section class="finder">
            <form method="post" action="../serverSideVal/formSearch.inc.php" onsubmit="return validateForm()">
                <label for="hotel-name">Προορισμός:</label>
                <?php
                    $arr= array("Έβρου", "Ροδόπης", "Ξάνθης", "Δράμας", "Καβάλας", "Θεσσαλονίκης", "Χαλκιδικής", "Ημαθίας", "Κιλκίς", "Πέλλας", "Πιερίας", "Σερρών",
                    "Κοζάνης", "Φλώρινας", "Γρεβενών", "Καστοριάς", "Ιωαννίνων", "Άρτας", "Πρέβεζας", "Θεσπρωτίας", "Λάρισας", "Καρδίτσας", "Μαγνησίας", "Τρικάλων", "Βοιωτίας", "Ευβοίας", "Ευρυτανίας",
                    "Φωκίδας", "Φθιώτιδας", "Κεφαλληνίας", "Κέρκυρας", "Λευκάδας", "Ζακύνθου", "Αχαΐας", "Ηλείας", "Αιτωλοακαρνανίας", "Αρκαδίας", "Αργολίδας", "Κορινθίας", "Λακωνίας", "Μεσσηνίας", "Αθηνών", "Ανατολικής Αττικής",
                    "Πειραιώς", "Δυτικής Αττικής", "Χίου", "Λέσβου", "Σάμου", "Κυκλάδων", "Δωδεκανήσου", "Ηρακλείου", "Χανίων", "Λασιθίου", "Ρεθύμνης");
                    
                    echo '<select name="hotel-name" id="hotel-name">';
                    for($index= 0; $index< sizeof($arr); $index++) {
                        echo "<option value=". $index .">".$arr[$index] ."</option>";
                    }
                    echo "</select>";
                ?>
                <label for="persons">Άτομα:</label>
                <input type="number" name="persons" id="persons" min="1" max="100" value="1"/>
                <label for="date">Ημερομηνία:</label>
                <input type="date" name="date" id="date"/>
                <button>Αναζήτηση</button>
            </form>
        </section>