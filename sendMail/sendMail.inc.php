<?php

    function sendMail($email, $vkey) {
        $subject= "Επιβεβαίωση email";
        $message= "Πατήστε στον παρακάτω σύνδεσμο για την επιβεβαίωση του email http://localhost:81/WebHotel-Project/screens/verifyEmail.php?vkey=$vkey" ;
        
        $res=mail($email, $subject, $message);

        if($res == 1) {
            return TRUE;
        }

        return FALSE;
    }
?>