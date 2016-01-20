<?php
    include "LoadClass.php";

    $readingController = new ReadingController();
    $readings = $readingController->getNitrogenPercentageByLocationDate("4","04-01-2015");
    echo $readings;
?>