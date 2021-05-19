<?php
    include("../imports/pageHeader.php");
    include("../server/conn.inc.php");

    echo '<section class="hotel-detail">';
    echo '<img src="../media/Athens.jpg" tag="Athens" />';
    echo '<p> Hotel name<br> district<br> address<br> phone<br> ';
    echo '<br> Stars /5';
    echo '<br>Pool: ';
    echo '<br>Gym: ';
    echo '<br>Cinema: ';
    echo "</p></section>";

    include("../imports/pageFooter.php");
?>