<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/17/2015
 * Time: 12:22 AM
 */

$sensor_board = $_POST['sensor_board'];
$sensor_type = $_POST['sensor_type'];
$manufactured_date = $_POST['manufactured_date'];
$formatted_date = date("Y-m-d", strtotime($manufactured_date));

$sensorController = new SensorController();
$sensor = new Sensor('', $sensor_board, $formatted_date, $sensor_type, '1');
$sensorController->insert($sensor);

$sensorBoardController = new SensorBoardController();
$sensorBoard = $sensorBoardController->selectByID($sensor_board);
$sensorBoard->getNoOfSensors($sensorBoard->getNoOfSensors()+1);
$sensorBoardController->update($sensorBoard);

header('Location: ../device_add.php');

