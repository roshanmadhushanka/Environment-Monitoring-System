<?php
    include "../LoadClass.php";
    $id = $_GET['q'];
    $loginController = new UserLoginController();
    $user = $loginController->selectByID($id);
    $user->setStatus(1);
    $loginController->updateUserStatus($user);
    header('Location: ../user_add.php');

