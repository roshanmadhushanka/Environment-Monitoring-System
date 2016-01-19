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

    function selectByIdDate($id, $date){
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

    function selectByIdTime($id, $time){
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

    function selectByIdDateTime($id, $date, $time){
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

    function selectByIdDateDiff($id, $date_start, $date_end){
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

    function selectByIdDateTimeDiff($id, $date, $time_start, $time_end){
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

    function getOxygenPercentageByLocationDate($location, $date){
        //Convert date into the required format
        $formatted_date = date("Y-m-d", strtotime($date));

        //Daabase query
        $query="SELECT * FROM `reading` AS R, `location` AS L, `sensor` AS S, `sensor_board` AS B, `sensor_type` AS T WHERE R.sensor_idsensor = S.idsensor AND S.sensor_board_id = B.idsensor_board AND B.location_id = L.idlocation AND S.sensor_type = T.idsensor_type AND L.idlocation='".$location."' AND T.type_name='Oxygen' AND R.date='".$formatted_date."'";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $readings = array();
        $tot = 0;
        $count = 0;

        //Calculation part
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $tot += $read->getValue();
                $count += 1;
                $readings[] = $read;
            }
        }

        //Close connection
        $this->con->closeConnection();

        //Return result
        if($count != 0){
            return $tot/$count;
        }else{
            return 'Not detected';
        }

    }

    function getNitrogenPercentageByLocationDate($location, $date){
        //Convert date into the required format
        $formatted_date = date("Y-m-d", strtotime($date));

        //Daabase query
        $query="SELECT * FROM `reading` AS R, `location` AS L, `sensor` AS S, `sensor_board` AS B, `sensor_type` AS T WHERE R.sensor_idsensor = S.idsensor AND S.sensor_board_id = B.idsensor_board AND B.location_id = L.idlocation AND S.sensor_type = T.idsensor_type AND L.idlocation='".$location."' AND T.type_name='Nitrogen' AND R.date='".$formatted_date."'";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $readings = array();
        $tot = 0;
        $count = 0;

        //Calculation part
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $tot += $read->getValue();
                $count += 1;
                $readings[] = $read;
            }
        }

        //Close connection
        $this->con->closeConnection();

        //Return result
        if($count != 0){
            return $tot/$count;
        }else{
            return 'Not detected';
        }

    }

    function getTemperatureByLocationDate($location, $date){
        //Convert date into the required format
        $formatted_date = date("Y-m-d", strtotime($date));

        //Daabase query
        $query="SELECT * FROM `reading` AS R, `location` AS L, `sensor` AS S, `sensor_board` AS B, `sensor_type` AS T WHERE R.sensor_idsensor = S.idsensor AND S.sensor_board_id = B.idsensor_board AND B.location_id = L.idlocation AND S.sensor_type = T.idsensor_type AND L.idlocation='".$location."' AND T.type_name='Temperature' AND R.date='".$formatted_date."'";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $readings = array();
        $tot = 0;
        $count = 0;

        //Calculation part
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $tot += $read->getValue();
                $count += 1;
                $readings[] = $read;
            }
        }

        //Close connection
        $this->con->closeConnection();

        //Return result
        if($count != 0){
            return $tot/$count;
        }else{
            return 'Not detected';
        }
    }

    function getTemperatureByLocationDateToArray($location, $date){
        //Convert date into the required format
        $formatted_date = date("Y-m-d", strtotime($date));

        //Daabase query
        $query="SELECT * FROM `reading` AS R, `location` AS L, `sensor` AS S, `sensor_board` AS B, `sensor_type` AS T WHERE R.sensor_idsensor = S.idsensor AND S.sensor_board_id = B.idsensor_board AND B.location_id = L.idlocation AND S.sensor_type = T.idsensor_type AND L.idlocation='".$location."' AND T.type_name='Temperature' AND R.date='".$formatted_date."' ORDER BY R.idreading DESC LIMIT 50";

        //Open Connection
        $this->con->openConnection();

        //Variable Declaration
        $readings = array();
        $str = '';
        $count = 0;

        //Calculation part
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Reading($row['idreading'], $row['sensor_idsensor'], $row['date'], $row['time'], $row['value']);
                $readings[] = $read;
                $str .= $read->getValue().':';
                $count += 1;
            }
        }

        //Close connection
        $this->con->closeConnection();

        //Return result
        if($count != 0){
            return $str;
        }else{
            return 'Not detected';
        }
    }
}