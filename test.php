<?php
    include "LoadClass.php";
    $readingController = new ReadingController();
    $readings = $readingController->getTemperatureByLocationDateToArray("4", "2016-01-21");
    echo $readings;
?>