<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2016
 * Time: 6:07 AM
 */

$id = $_POST['location'];

$locationController = new LocationController();
$locationController->removeLocationById($id);

header('Location: ../edit_location.php');