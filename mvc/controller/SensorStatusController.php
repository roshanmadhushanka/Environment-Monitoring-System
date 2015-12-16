<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 8:12 PM
 */
class SensorStatusController
{
    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }

    public function addSensorSatus(SensorStatus $ss){
        echo $ss->getStatusName();
        $query = "INSERT INTO `sensor_status`(`status_name`) VALUES ('".$ss->getStatusName()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function getAllSensorStatuses(){
        $sensor_statuses = array();
        $query = "SELECT * FROM `sensor_status`";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ss = new SensorStatus($row['idsensor_status'], $row['status_name']);
                $sensor_statuses[] = $ss;
            }
        }
        $this->con->closeConnection();
        return $sensor_statuses;
    }


    public function getSensorStatusByName($name){
        $query = "SELECT * FROM `sensor_status` WHERE status_name LIKE '%".$name."%' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ss = new SensorStatus($row['idsensor_status'], $row['status_name']);
        $this->con->closeConnection();
        return $ss;
    }


    public function getSensorTypeById($id){
        $query = "SELECT * FROM `sensor_status` WHERE idsensor_status='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ss = new SensorStatus($row['idsensor_status'], $row['status_name']);
        $this->con->closeConnection();
        return $ss;
    }


    public function updateSensorStatus(SensorStatus $ss){
        $query = "UPDATE `sensor_status` SET status_name='".$ss->getStatusName()."' WHERE idsensor_status='".$ss->getIdsensorStatus()."'";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);

    }

}