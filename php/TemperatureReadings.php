<?php
    include "../LoadClass.php";
    $loc = $_GET['loc'];
    $date = $_GET['date'];
    $readingController = new ReadingController();
    //$val = $readingController->getTemperatureByLocationDate($loc ,$date);
    //echo round($val ,2);
    $val = $readingController->getTemperatureByLocationDateToArray($loc, $date);
    echo $val;
