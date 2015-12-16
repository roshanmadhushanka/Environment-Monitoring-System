<?php
/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 7:58 AM
 */
class LocationController
{
    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }

    public function insert(Location $loc){
        $query = "INSERT INTO `location`(`location_name`, `location_city`, `longitude`, `latitude`, `altitude`) VALUES ('".$loc->getLocationName()."', '".$loc->getLocationCity()."', '".$loc->getLongitude()."', '".$loc->getLatitude()."','".$loc->getAltitude()."')";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    public function getLocationByID($id){
        $query = "SELECT * FROM `location` WHERE idlocation='".$id."' LIMIT 1";

        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $loc = new Location($row['idlocation'], $row['location_name'], $row['location_city'], $row['longitude'], $row['latitude'], $row['altitude']);
        $this->con->closeConnection();
        return $loc;
    }

    public function getLocationByName($name){
        $query = "SELECT * FROM `location` WHERE location_name='".$name."'";

        $locations = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $loc = new Location($row['idlocation'], $row['location_name'], $row['location_city'], $row['longitude'], $row['latitude'], $row['altitude']);
                $locations[] = $loc;
            }
        }
        $this->con->closeConnection();
        return $locations;
    }

    public function getLocationByCity($city){
        $query = "SELECT * FROM `location` WHERE location_city='".$city."'";

        $locations = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $loc = new Location($row['idlocation'], $row['location_name'], $row['location_city'], $row['longitude'], $row['latitude'], $row['altitude']);
                $locations[] = $loc;
            }
        }
        $this->con->closeConnection();
        return $locations;
    }

    public function getLocationByCoordinate($longitude, $latitude, $altitude){
        $query = "SELECT * FROM `location` WHERE longitude='".$longitude."' AND latitude='".$latitude."' AND altitude='".$altitude."'";

        $locations = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $loc = new Location($row['idlocation'], $row['location_name'], $row['location_city'], $row['longitude'], $row['latitude'], $row['altitude']);
                $locations[] = $loc;
            }
        }
        $this->con->closeConnection();
        return $locations;
    }

    public function selectAll(){
        $query = "SELECT * FROM `location`";

        $locations = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $loc = new Location($row['idlocation'], $row['location_name'], $row['location_city'], $row['longitude'], $row['latitude'], $row['altitude']);
                $locations[] = $loc;
            }
        }
        $this->con->closeConnection();
        return $locations;
    }

    public function update(Location $loc){
        $query = "UPDATE `location` SET `location_name`='".$loc->getLocationName()."',`location_city`='".$loc->getLocationCity()."',`longitude`='".$loc->getLongitude()."',`latitude`='".$loc->getLatitude()."',`altitude`='".$loc->getAltitude()."' WHERE `idlocation`='".$loc->getLocationId()."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }



}