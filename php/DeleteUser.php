<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/20/2016
 * Time: 12:18 AM
 */

// Get user id
$id = $_POST['user'];

// Delete user
$userController = new UserController();
$userController->removeUserById($id);

header('Location: ../edit_user.php');