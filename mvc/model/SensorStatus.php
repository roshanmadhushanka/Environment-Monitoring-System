<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:09 AM
 */
class SensorStatus
{
    private $idsensor_status;
    private $status_name;

    /**
     * @return mixed
     */
    public function getIdsensorStatus()
    {
        return $this->idsensor_status;
    }

    /**
     * @param mixed $idsensor_status
     */
    public function setIdsensorStatus($idsensor_status)
    {
        $this->idsensor_status = $idsensor_status;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * @param mixed $status_name
     */
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
    }

    /**
     * SensorStatus constructor.
     * @param $idsensor_status
     * @param $status_name
     */
    public function __construct($idsensor_status, $status_name)
    {
        $this->idsensor_status = $idsensor_status;
        $this->status_name = $status_name;
    }
}