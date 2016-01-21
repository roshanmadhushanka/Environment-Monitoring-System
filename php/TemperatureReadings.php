<?php
    include "../LoadClass.php";
    $loc = $_GET['loc'];
    $date = $_GET['date'];
    $readingController = new ReadingController();
    $readingController = new ReadingController();
    $read = $readingController->getHumidityPercentageByLocationDate($loc,"2016-01-01");
    $val = $readingController->getTemperatureByLocationDateToArray($loc, $date);
    echo $read->getValue().'-'.$val;
