<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 7:36 PM
 */
class SensorBoardController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    function insert(SensorBoard $sen){
        $query="INSERT INTO `sensor_board`(`no_of_sensors`, `manufacturer_id`, `location_id`) VALUES ('0','".$sen->getManufacturerId()."','".$sen->getLocationId()."')";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function selectAll(){
        $query = "SELECT * FROM `sensor_board`";

        $sensorBoards = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $sb = new SensorBoard($row['idsensor_board'], $row['no_of_sensors'], $row['manufacturer_id'], $row['location_id']);
                $sensorBoards[] = $sb;
            }
        }
        $this->con->closeConnection();
        return $sensorBoards;
    }

    function selectByID($id){
        $query="SELECT * FROM `sensor_board` WHERE `idsensor_board`='".$id."'";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $sb = new SensorBoard($row['idsensor_board'], $row['no_of_sensors'], $row['manufacturer_id'], $row['location_id']);
        $this->con->closeConnection();
        return $sb;
    }

    function update(SensorBoard $sb){
        $query="UPDATE `sensor_board` SET `no_of_sensors`='".$sb->getNoOfSensors()."',`manufacturer_id`='".$sb->getManufacturerId()."',`location_id`='".$sb->getLocationId()."' WHERE `idsensor_board`='".$sb->getIdsensorBoard()."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function removeSensorBoardByiId($id){

        $this->con->openConnection();
        $query1 = "DELETE FROM `reading` WHERE `sensor_idsensor` IN (SELECT `idsensor` FROM `sensor` WHERE `sensor_board_id`='".$id."')";
        $result = $this->con->executeRawQuery($query1);

        $query2 = "DELETE FROM `sensor` WHERE `sensor_board_id`='".$id."'";
        $this->con->executeRawQuery($query2);

        $query2 = "DELETE FROM `sensor_board` WHERE `idsensor_board`='".$id."'";
        $this->con->executeRawQuery($query2);

        $this->con->closeConnection();


    }

}