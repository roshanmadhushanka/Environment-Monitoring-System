<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:12 AM
 */
class SensorType
{
    private $idsensor_type;
    private $type_name;
    private $unit;

    /**
     * @return mixed
     */
    public function getIdsensorType()
    {
        return $this->idsensor_type;
    }

    /**
     * @param mixed $idsensor_type
     */
    public function setIdsensorType($idsensor_type)
    {
        $this->idsensor_type = $idsensor_type;
    }

    /**
     * @return mixed
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * @param mixed $type_name
     */
    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * SensorType constructor.
     * @param $idsensor_type
     * @param $type_name
     * @param $unit
     */
    public function __construct($idsensor_type, $type_name, $unit)
    {
        $this->idsensor_type = $idsensor_type;
        $this->type_name = $type_name;
        $this->unit = $unit;
    }
}