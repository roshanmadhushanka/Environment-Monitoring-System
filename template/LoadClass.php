<?php
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 8:10 AM
 */
$controller = './mvc/controller/';
$model = './mvc/model/';


//DB LOC
include './database/DBase.php';

//ROUTE
include $controller.'LocationController.php';
include $controller.'ManufacturerController.php';
include $controller.'ReadingController.php';

include $model.'Location.php';
include $model.'Manufacturer.php';
include $model.'Reading.php';