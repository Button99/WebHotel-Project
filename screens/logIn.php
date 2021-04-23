<?php 
    include("../imports/pageHeader.php");
?>
<script src="../clientSideVal/logInValidation.js"></script>

<section class="logIn-form">
    <form method="post" action="../serverSideVal/logInValidation.inc.php" onsubmit="return validateForm()">
        <label for="username">Όνομα Χρήστη:</label><br>
        <input type="text" name="username" id="username"/><br><br>
        <label for="password">Κωδικός:</label><br>
        <input type="password" name="password" id="password" /><br><br>
        <button type="submit" name="logIn">Σύνδεση</button>
    </form>
</section>

<?php
    include("../imports/pageFooter.php");
?>