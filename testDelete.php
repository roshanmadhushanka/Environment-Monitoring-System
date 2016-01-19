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

// sql to delete a record
$sql1 = "DELETE FROM `reading` WHERE `sensor_idsensor`=4";
$sql = "DELETE FROM `sensor` WHERE `idsensor`=4";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>