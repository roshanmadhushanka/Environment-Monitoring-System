<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 6:26 PM
 */
class SensorController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    function insert(Sensor $sen){
        $query = "INSERT INTO `sensor`(`sensor_board_id`, `manufactured_date`, `sensor_type`, `sensor_status`) VALUES ('".$sen->getSensorBoardId()."','".$sen->getManufacturedDate()."','".$sen->getSensorType()."','".$sen->getSensorStatus()."')";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function selectAll(){
        $query="SELECT * FROM `sensor`";

        $sensors = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $sen = new Sensor($row['idsensor'], $row['sensor_board_id'],$row['manufactured_date'], $row['sensor_type'], $row['sensor_status']);
                $sensors[] = $sen;
            }
        }
        $this->con->closeConnection();
        return $sensors;
    }

    function selectByID($id){
        $query = "SELECT * FROM `sensor` WHERE `idsensor`='".$id."'";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $sen = new Sensor($row['idsensor'], $row['sensor_board_id'],$row['manufactured_date'], $row['sensor_type'], $row['sensor_status']);
        $this->con->closeConnection();
        return $sen;
    }

    function update(Sensor $sen){
        $query = "UPDATE `sensor` SET `sensor_board_id`='".$sen->getSensorBoardId()."',`manufactured_date`='".$sen->getManufacturedDate()."',`sensor_type`='".$sen->getSensorType()."',`sensor_status`='".$sen->getSensorStatus()."' WHERE `idsensor`='".$sen->getIdsensor()."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function delete($id){
        $query="DELETE FROM `sensor` WHERE `idsensor`='".$id."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


}