<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:20 AM
 */
class UserType
{
private $iduser_type;
private $description;

    /**
     * @return mixed
     */
    public function getIduserType()
    {
        return $this->iduser_type;
    }

    /**
     * @param mixed $iduser_type
     */
    public function setIduserType($iduser_type)
    {
        $this->iduser_type = $iduser_type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * UserType constructor.
     * @param $iduser_type
     * @param $description
     */
    public function __construct($iduser_type, $description)
    {
        $this->iduser_type = $iduser_type;
        $this->description = $description;
    }
}