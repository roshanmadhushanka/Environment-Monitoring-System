<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 10:58 AM
 */
class Reading
{
    private $idreading;
    private $sensor_idsensor;
    private $date;
    private $time;
    private $value;

    /**
     * Reading constructor.
     * @param $idreading
     * @param $sensor_idsensor
     * @param $date
     * @param $time
     * @param $value
     */
    public function __construct($idreading, $sensor_idsensor, $date, $time, $value)
    {
        $this->idreading = $idreading;
        $this->sensor_idsensor = $sensor_idsensor;
        $this->date = $date;
        $this->time = $time;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getIdreading()
    {
        return $this->idreading;
    }

    /**
     * @param mixed $idreading
     */
    public function setIdreading($idreading)
    {
        $this->idreading = $idreading;
    }

    /**
     * @return mixed
     */
    public function getSensorIdsensor()
    {
        return $this->sensor_idsensor;
    }

    /**
     * @param mixed $sensor_idsensor
     */
    public function setSensorIdsensor($sensor_idsensor)
    {
        $this->sensor_idsensor = $sensor_idsensor;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}