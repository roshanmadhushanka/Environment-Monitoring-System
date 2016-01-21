<?php
    session_start();
    include "../LoadClass.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $initials = $_POST['initials'];
    $nic = $_POST['nic'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $userController = new UserController();
    $user = new User('', $first_name, $last_name, $initials, $nic);
    $userController->insert($user);
    $user = $userController->selectByNic($nic);

    $userLoginController = new UserLoginController();
    $userLogin = new UserLogin('', $user->getIduser(), $user_name, $password, 0, 2);
    $userLoginController->insert($userLogin);

    $_SESSION['registration_status'] = 1;

    header('Location: ../register.php');
