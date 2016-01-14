<?php
session_start();

include "../LoadClass.php";
$user_name = $_POST['user_name'];
$password = $_POST['password'];

$userLoginController = new UserLoginController();
$user = $userLoginController->getUserLogin($user_name, $password);
if($user != null){
    $_SESSION['current_user_id'] = $user->getUserIduser();
    $_SESSION['login_id'] = $user->getIduserLogin();
    header('Location: ../index.php');
}

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 10:51 PM
 */
?>

