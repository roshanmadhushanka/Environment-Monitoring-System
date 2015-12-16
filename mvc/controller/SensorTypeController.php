<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 7:36 PM
 */
class SensorTypeController
{

    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }

    public function addSensorType(SensorType $st){
        echo $st->getTypeName();
        $query = "INSERT INTO `sensor_type`(`type_name`, `unit`) VALUES ('".$st->getTypeName()."', '".$st->getUnit()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function getAllSensorTypes(){
        $sensor_types = array();
        $query = "SELECT * FROM `sensor_type`";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $st = new SensorType($row['idsensor_type'], $row['type_name'], $row['unit']);
                $sensor_types[] = $st;
            }
        }
        $this->con->closeConnection();
        return $sensor_types;
    }


    public function getSensorTypeByName($name){
        $query = "SELECT * FROM `sensor_type` WHERE type_name LIKE '%".$name."%' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $st = new SensorType($row['idsensor_type'], $row['type_name'], $row['unit']);
        $this->con->closeConnection();
        return $st;
    }


    public function getSensorTypeById($id){
        $query = "SELECT * FROM `sensor_type` WHERE idsensor_type='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $st = new SensorType($row['idsensor_type'], $row['type_name'], $row['unit']);
        $this->con->closeConnection();
        return $st;
    }

    public function updateSensorType(SensorType $st){
        $query = "UPDATE `sensor_type` SET type_name='".$st->getTypeName()."', unit='".$st->getUnit()."' WHERE idsensor_type='".$st->getIdsensorType()."'";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);

    }


}