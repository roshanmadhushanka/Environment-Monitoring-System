<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 3:49 PM
 */
class ReadingController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    function insert(Reading $read){
        $query="INSERT INTO `reading`(`sensor_idsensor`, `date`, `time`, `value`) VALUES ('".$read->getSensorIdsensor()."', '".$read->getDate()."', '".$read->getTime()."', '".$read->getValue()."')";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function selectAll(){
        $query="SELECT * FROM `reading`";

        $readings = array();

        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }

        $this->con->closeConnection();
        return $readings;
    }

    function selectBySensorID($id){
        $query="SELECT * FROM `reading` WHERE `sensor_idsensor`='".$id."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function selectByDate($id, $date){
        $query="SELECT * FROM `reading` WHERE `date`='".$date."' AND `sensor_idsensor`='".$id."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function selectByTime($id, $time){
        $query="SELECT * FROM `reading` WHERE `time`='".$time."' AND `sensor_idsensor`='".$id."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function selectByDateTime($id, $date, $time){
        $query="SELECT * FROM `reading` WHERE `time`='".$time."' AND `date`='".$date."' AND `sensor_idsensor`='".$id."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function selectByDateDiff($id, $date_start, $date_end){
        $query="SELECT * FROM `reading` WHERE `sensor_idsensor`='".$id."' AND `date` BETWEEN '".$date_start."' AND '".$date_end."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function selectByDateTimeDiff($id, $date, $time_start, $time_end){
        $query="SELECT * FROM `reading` WHERE `sensor_idsensor`='".$id."' AND `date`='".$date."' AND `time` BETWEEN '".$time_start."' AND '".$time_end."'";

        $readings = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
            }
        }
        $this->con->closeConnection();
        return $readings;
    }

    function delete($id){

    }


}