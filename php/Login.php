<?php
//include "../mvc/controller/UserLoginController.php";
//include "../mvc/model/UserLogin.php";
//include "../database/DBase.php";

include "../LoadClass.php";
$user_name = $_POST['user_name'];
$password = $_POST['password'];

echo $user_name;
echo $password;

$userLoginController = new UserLoginController();
$u = $userLoginController->getUserLogin($user_name, $password);
echo $u->getUsername();
if($userLoginController->getUserLogin($user_name, $password) != null){
    echo $user_name.'<br>'.$password;
}
//header('Location: ../index.php');
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 10:51 PM
 */
?>

