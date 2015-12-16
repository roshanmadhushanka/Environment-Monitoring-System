<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:15 AM
 */
class User
{
private $iduser;
private $first_name;
private $last_name;
private $initials;
private $nic;

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param mixed $initials
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * User constructor.
     * @param $iduser
     * @param $first_name
     * @param $last_name
     * @param $initials
     * @param $nic
     */
    public function __construct($iduser, $first_name, $last_name, $initials, $nic)
    {
        $this->iduser = $iduser;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->initials = $initials;
        $this->nic = $nic;
    }
}