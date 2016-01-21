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

$id = 7;
// sql to delete a record
$query1 = "DELETE FROM `reading` WHERE `sensor_idsensor` IN (SELECT `idsensor` FROM `sensor` WHERE `sensor_board_id` IN (SELECT `idsensor_board` FROM `sensor_board` WHERE `location_id` = '".$id."'))";
$query2 = "DELETE FROM `sensor` WHERE `sensor_board_id` IN (SELECT `idsensor_board` FROM `sensor_board` WHERE `location_id` = '".$id."')";
$query3 = "DELETE FROM `sensor_board` WHERE `location_id` = '".$id."'";
$query4 = "DELETE FROM `location` WHERE `idlocation` = '".$id."'";

$q = $query1.";".$query2.";".$query3.";".$query4.";";

if (mysqli_query($conn, $query4)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>