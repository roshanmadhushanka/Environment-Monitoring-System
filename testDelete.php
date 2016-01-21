<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/15/2016
 * Time: 1:46 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ozious";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = 6;
// sql to delete a record
$query1 = "DELETE FROM `session` WHERE `user_login_iduser_login` IN (SELECT `iduser_login` FROM `user_login` WHERE `user_iduser` = '".$id."')";
$query2 = "DELETE FROM `user_login` WHERE `user_iduser` = '".$id."'";
$query3 = "DELETE FROM `user` WHERE `iduser` = '".$id."'";


if (mysqli_query($conn, $query3)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>