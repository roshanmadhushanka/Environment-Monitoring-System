<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
echo '<response>';
$loc = $_GET['loc'];
$date = $_GET['date'];
include "LoadClass.php";
$readingController = new ReadingController();
$val1 = $readingController->getOxygenPercentageByLocationDate($loc, $date);
$val2 = $readingController->getNitrogenPercentageByLocationDate($loc, $date);
echo $val1.':'.$val2;
echo '</response>';

