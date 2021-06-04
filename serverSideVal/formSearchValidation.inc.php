<?php
    
    function formVal() {
        $district= $_GET["dsc"];
        $rooms= $_GET["room"];
        $hasPool= $_GET["has-pool"];
        $date= $_GET["date"];
        $flag= FALSE;

        if(!isset($district) && !isset($rooms) && !isset($date)) {
            echo "Συμπληρώστε όλα τα κενά!<br>";
            $flag= TRUE;
            exit();
        }

        if(preg_match("/^[a-zA-ZΑ-Ωα-ω]+$/", $district) || !isset($district)) {
            echo "Συμπληρώστε την περιοχή!<br>";
            $flag= TRUE;
        }

        if(($rooms < 0 || $rooms > 999) || !isset($rooms)) {
            echo "Συμπληρώστε τα άτομα!<br>";
            $flag= TRUE;
        }

        if(preg_match("#^\d{2}[./-]\d{2}[./-]\d{4}$#", $date) || !isset($date)) {
            echo "Συμπληρώστε σωστά την ημερομηνία!<br>";
            $flag= TRUE;
        }

        if($flag == TRUE) {
            return $flag;
        }

        $_SESSION["district"]= $district;
        $_SESSION["rooms"]= $rooms;
        $_SESSION["has-pool"]= $hasPool;
        $_SESSION["date"]= $date;
        return $flag;
    }
?>