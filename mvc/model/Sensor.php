<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:03 AM
 */
class Sensor
{
    private $idsensor;
    private $sensor_board_id;
    private $manufactured_date;
    private $sensor_type;
    private $sensor_status;
    /**
     * @return mixed
     */
    public function getIdsensor()
    {
        return $this->idsensor;
    }

    /**
     * @param mixed $idsensor
     */
    public function setIdsensor($idsensor)
    {
        $this->idsensor = $idsensor;
    }

    /**
     * @return mixed
     */
    public function getSensorBoardId()
    {
        return $this->sensor_board_id;
    }

    /**
     * @param mixed $sensor_board_id
     */
    public function setSensorBoardId($sensor_board_id)
    {
        $this->sensor_board_id = $sensor_board_id;
    }

    /**
     * @return mixed
     */
    public function getManufacturedDate()
    {
        return $this->manufactured_date;
    }

    /**
     * @param mixed $manufactured_date
     */
    public function setManufacturedDate($manufactured_date)
    {
        $this->manufactured_date = $manufactured_date;
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
     * Sensor constructor.
     * @param $idsensor
     * @param $sensor_board_id
     * @param $manufactured_date
     * @param $sensor_type
     * @param $sensor_status
     */
    public function __construct($idsensor, $sensor_board_id, $manufactured_date, $sensor_type, $sensor_status)
    {
        $this->idsensor = $idsensor;
        $this->sensor_board_id = $sensor_board_id;
        $this->manufactured_date = $manufactured_date;
        $this->sensor_type = $sensor_type;
        $this->sensor_status = $sensor_status;
    }
}