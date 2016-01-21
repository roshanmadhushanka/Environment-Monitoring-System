<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/17/2015
 * Time: 1:10 AM
 */

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$initials = $_POST['initials'];
$nic = $_POST['nic'];
$username = $_POST['user_name'];
$password = $_POST['password'];
$type = $_POST['user_type'];

echo $first_name.'<br>'.$last_name.'<br>'.$initials.'<br>'.$username.'<br>'.$password;

$userController = new UserController();
$user = new User('', $first_name, $last_name, $initials, $nic);
$userController->insert($user);
$user = $userController->selectByNic($nic);

$userTypeController = new UserTypeController();

$userType = $userTypeController->selectByName($type->getDescription());

$userLoginController = new UserLoginController();
$userLogin = new UserLogin('', $user->getIduser(), $username, $password, 1, $userType->getIduserType());
$userLoginController->insert($userLogin);

header('Location: ../user_add.php');

