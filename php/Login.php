<?php
session_start();

include "../LoadClass.php";

$user_name = $_POST['user_name'];
$password = $_POST['password'];

$userLoginController = new UserLoginController();

$user = $userLoginController->getUserLogin($user_name, $password);
if($user != null){
    if($user->getStatus() <> 1){
        $_SESSION['login_status'] = 0;
        header('Location: ../login.php');
    }else{
        $_SESSION['current_user_id'] = $user->getUserIduser();
        $_SESSION['login_id'] = $user->getIduserLogin();
        $_SESSION['user_level_id'] = $user->getUserTypeIduserType();
        $_SESSION['login_status'] = 1;
        header('Location: ../index.php');
    }
}

?>

