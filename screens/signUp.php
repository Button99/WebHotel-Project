<?php
    include("../imports/pageHeader.php");
?>
<?php 
    include("../imports/pageHeader.php");
?>
<script src="../clientSideVal/signUpValidation.js"></script>

<section class="signUp-form">
    <form method="post" action="../serverSideVal/signUpValidation.inc.php" onsubmit="return validateForm()">
        <label for="username">Όνομα Χρήστη:</label><br>
        <input type="text" name="username" id="username"/><br><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email"/><br><br>
        <label for="password">Κωδικός:</label><br>
        <input type="password" name="password" id="password" /><br><br>
        <button type="submit" name="logIn">Σύνδεση</button>
    </form>
</section>

<?php
    include("../imports/pageFooter.php");


    // PUT ON CAPTCHA AND DB WORK
?>