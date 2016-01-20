<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/19/2016
 * Time: 11:08 PM
 */
class SensorViewObj
{
    private $sensor_id;
    private $sensor_manufacturer_name;
    private $sensor_type;
    private $sensor_status;
    private $sensor_location_name;

    /**
     * SensorViewObj constructor.
     * @param $sensor_id
     * @param $sensor_location
     * @param $sensor_manufacturer_name
     * @param $sensor_type
     * @param $sensor_status
     * @param $sensor_location_name
     */
    public function __construct($sensor_id, $sensor_manufacturer_name, $sensor_type, $sensor_status, $sensor_location_name)
    {
        $this->sensor_id = $sensor_id;
        $this->sensor_manufacturer_name = $sensor_manufacturer_name;
        $this->sensor_type = $sensor_type;
        $this->sensor_status = $sensor_status;
        $this->sensor_location_name = $sensor_location_name;
    }

    /**
     * @return mixed
     */
    public function getSensorId()
    {
        return $this->sensor_id;
    }

    /**
     * @param mixed $sensor_id
     */
    public function setSensorId($sensor_id)
    {
        $this->sensor_id = $sensor_id;
    }

    /**
     * @return mixed
     */
    public function getSensorManufacturerName()
    {
        return $this->sensor_manufacturer_name;
    }

    /**
     * @param mixed $sensor_manufacturer_name
     */
    public function setSensorManufacturerName($sensor_manufacturer_name)
    {
        $this->sensor_manufacturer_name = $sensor_manufacturer_name;
    }

    /**
     * @return mixed
     */
    public function getSensorType()
    {
        return $this->sensor_type;
    }

    /**
     * @param mixed $sensor_type
     */
    public function setSensorType($sensor_type)
    {
        $this->sensor_type = $sensor_type;
    }

    /**
     * @return mixed
     */
    public function getSensorStatus()
    {
        return $this->sensor_status;
    }

    /**
     * @param mixed $sensor_status
     */
    public function setSensorStatus($sensor_status)
    {
        $this->sensor_status = $sensor_status;
    }

    /**
     * @return mixed
     */
    public function getSensorLocationName()
    {
        return $this->sensor_location_name;
    }

    /**
     * @param mixed $sensor_location_name
     */
    public function setSensorLocationName($sensor_location_name)
    {
        $this->sensor_location_name = $sensor_location_name;
    }


}