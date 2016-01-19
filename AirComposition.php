<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
echo '<response>';
$loc = $_GET['loc'];
$date = $_GET['date'];
include "LoadClass.php";
$readingController = new ReadingController();
$val1 = $readingController->getOxygenPercentageByLocation($loc, $date);
$val2 = $readingController->getNitrogenPercentageByLocation($loc, $date);
echo $val1.':'.$val2;
echo '</response>';

