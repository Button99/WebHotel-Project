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
                <a class="btn" href="../screens/signUp.php"><button>Εγγραφή</button></a>
                <a class="btn" href="../screens/logIn.php"><button>Σύνδεση</button></a>
            </header>
        </section>
        <section class="finder">
            <form method="post" action="../serverSideVal/formSearch.inc.php" onsubmit="return validateForm()">
                <label for="hotel-name">Προορισμός:</label>
                <input type="text" name="hotel-name" id="hotel-name"/>
                <label for="persons">Άτομα:</label>
                <input type="text" name="persons" id="persons"/>
                <label for="date">Ημερομηνία:</label>
                <input type="date" name="date" id="date"/>
                <button>Αναζήτηση</button>
            </form>
        </section>