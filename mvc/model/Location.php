<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 7:30 AM
 */
class Location
{
    private $location_id;
    private $location_name;
    private $location_city;
    private $longitude;
    private $latitude;
    private $altitude;


    function __construct($id, $name, $city, $longitude, $latitude, $altitude){
        $this->location_id = $id;
        $this->location_name = $name;
        $this->location_city = $city;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->altitude = $altitude;
    }


    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * @param mixed $location_id
     */
    public function setLocationId($location_id)
    {
        $this->location_id = $location_id;
    }

    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->location_name;
    }

    /**
     * @param mixed $location_name
     */
    public function setLocationName($location_name)
    {
        $this->location_name = $location_name;
    }

    /**
     * @return mixed
     */
    public function getLocationCity()
    {
        return $this->location_city;
    }

    /**
     * @param mixed $location_city
     */
    public function setLocationCity($location_city)
    {
        $this->location_city = $location_city;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @param mixed $altitude
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
    }




}