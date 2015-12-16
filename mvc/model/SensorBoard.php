<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:07 AM
 */
class SensorBoard
{
    private $idsensor_board;
    private $no_of_sensors;
    private $manufacturer_id;
    private $location_id;

    /**
     * @return mixed
     */
    public function getIdsensorBoard()
    {
        return $this->idsensor_board;
    }

    /**
     * @param mixed $idsensor_board
     */
    public function setIdsensorBoard($idsensor_board)
    {
        $this->idsensor_board = $idsensor_board;
    }

    /**
     * @return mixed
     */
    public function getNoOfSensors()
    {
        return $this->no_of_sensors;
    }

    /**
     * @param mixed $no_of_sensors
     */
    public function setNoOfSensors($no_of_sensors)
    {
        $this->no_of_sensors = $no_of_sensors;
    }

    /**
     * @return mixed
     */
    public function getManufacturerId()
    {
        return $this->manufacturer_id;
    }

    /**
     * @param mixed $manufacturer_id
     */
    public function setManufacturerId($manufacturer_id)
    {
        $this->manufacturer_id = $manufacturer_id;
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
     * SensorBoard constructor.
     * @param $idsensor_board
     * @param $no_of_sensors
     * @param $manufacturer_id
     * @param $location_id
     */
    public function __construct($idsensor_board, $no_of_sensors, $manufacturer_id, $location_id)
    {
        $this->idsensor_board = $idsensor_board;
        $this->no_of_sensors = $no_of_sensors;
        $this->manufacturer_id = $manufacturer_id;
        $this->location_id = $location_id;
    }

}