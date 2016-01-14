<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:41 PM
 */

$location = $_POST['location'];
$manufacturer = $_POST['manufacturer'];

$sensorBoard = new SensorBoard('','',$manufacturer, $location);
$sensorBoardController = new SensorBoardController();
$sensorBoardController->insert($sensorBoard);

header('Location: ../board_add.php');


