<?php
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");
    if($_GET["hotel"]) {
        echo '<section class="hotel-detail">';
        echo '<img src="../media/Athens.jpg" tag="Athens" />';
        echo '<p> Hotel name<br> district<br> address<br> phone<br> ';
        echo '<br> Stars /5';
        echo '<br>Pool: ';
        echo '<br>Gym: ';
        echo '<br>Cinema: ';
        echo '</p></section>';
        echo '<section class="frame">';
        echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12597.206619302478!2d23.734958767890944!3d37.87662759529743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1be33fa732799%3A0xa0dd26a4ef660500!2sGlyfada%20Golf%20Club%20of%20Athens!5e0!3m2!1sel!2sgr!4v1621433641730!5m2!1sel!2sgr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        echo '</section>';
    }
    
    include("../imports/pageFooter.php");
?>