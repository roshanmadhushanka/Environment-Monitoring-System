<?php
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/17/2015
 * Time: 7:20 AM
 */
session_start();
session_destroy();
header('Location: ../login.php');