<?php
include "../LoadClass.php";
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2016
 * Time: 5:13 AM
 */

$id = $_POST['manufacturer'];

$manufacturerController = new ManufacturerController();
$manufacturerController->removeManufacturerById($id);

header('Location: ../edit_manufacturer.php');