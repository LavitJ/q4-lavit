<?php
    $mango = $_GET["mango"];
    $orange = $_GET["orange"];
    $banana = $_GET["banana"];
    $sum = $mango * 30 + $orange * 70 + $banana * 30;
    echo "<h2>ยอดขาย ". $sum . " บาท</h2>";
?>