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
include $model.'Location.php';

include $controller.'LoginController.php';
include $model.'Session.php';

include $controller.'UserController.php';
include $model.'User.php';

include $controller.'UserLoginController.php';
include $model.'UserLogin.php';

include $controller.'UserTypeController.php';
include $model.'UserType.php';

include $controller.'SensorTypeController.php';
include $model.'SensorType.php';

include $controller.'SensorStatusController.php';
include $model.'SensorStatus.php';