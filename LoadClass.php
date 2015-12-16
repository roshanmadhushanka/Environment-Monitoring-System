<?php
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 8:10 AM
 */
$controller = 'mvc/controller/';
$model = 'mvc/model/';

//DB LOC
include 'database/DBase.php';

//ROUTE

//Controller
include $controller.'LocationController.php';
include $controller.'ManufacturerController.php';
include $controller.'ReadingController.php';
include $controller.'SensorController.php';
include $controller.'SensorBoardController.php';
include $controller.'UserLoginController.php';
include $controller.'SensorStatusController.php';
include $controller.'SensorTypeController.php';
include $controller.'UserController.php';
include $controller.'UserTypeController.php';

//Model
include $model.'Location.php';
include $model.'Manufacturer.php';
include $model.'Reading.php';
include $model.'Sensor.php';
include $model.'SensorBoard.php';
include $model.'UserLogin.php';
include $model.'AccessLevel.php';
include $model.'SensorStatus.php';
include $model.'SensorType.php';
include $model.'User.php';
include $model.'UserType.php';
?>

