<?php
include "../LoadClass.php";

/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/14/2016
 * Time: 10:46 AM
 */

$sb_id = $_POST['sensor_board'];

$sensorBoardController = new SensorBoardController();
$sensorBoardController->removeSensorBoardByiId($sb_id);

header('Location: ../edit_sensor_board.php');