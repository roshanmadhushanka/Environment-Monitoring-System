<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
echo '<response>';
$value = $_GET['randvalue'];
echo $value;
include "LoadClass.php";
$readingController = new ReadingController();
$reading = new Reading(0,8,date("Y-m-d"), date("h:i:sa"), $value);
$readingController->insert($reading);
echo '</response>';
?>


