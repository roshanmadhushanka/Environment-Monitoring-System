<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/15/2016
 * Time: 2:04 PM
 */

// Get sensor id
$id = $_POST['sensor'];

// Remove sensor
$sensorController = new SensorController();
$sensorController->removeSensorById($id);

header('Location: ../edit_sensor.php');