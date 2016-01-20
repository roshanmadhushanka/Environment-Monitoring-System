<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/19/2016
 * Time: 11:08 PM
 */
class SensorObjController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    function getSensorViewObjs(){
        //Database query
        $query = "SELECT * FROM `sensor_view`";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $sensors = array();
        $count = 0;

        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $sensor = new SensorViewObj($row['idsensor'], $row['manufacturer_name'], $row['type_name'], $row['status_name'], $row['location_name']);
                $sensors[] = $sensor;
                $count += 1;
            }
        }

        //Close connection

        $this->con->closeConnection();
        //Return result
        if($count != 0){
            return $sensors;
        }else{
            return 'Not detected';
        }
    }

    function getSensorViewObjsByStatus($stat){
        //Database query
        $query = "SELECT * FROM `sensor_view` WHERE status_name='".$stat."'";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $sensors = array();
        $count = 0;

        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $sensor = new SensorViewObj($row['idsensor'], $row['manufacturer_name'], $row['type_name'], $row['status_name'], $row['location_name']);
                $sensors[] = $sensor;
                $count += 1;
            }
        }

        //Close connection

        $this->con->closeConnection();
        //Return result
        if($count != 0){
            return $sensors;
        }else{
            return 'Not detected';
        }
    }


}