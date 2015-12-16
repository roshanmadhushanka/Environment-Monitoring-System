<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:13 AM
 */
class Session
{
private $idsession;
private $in_time;
private $out_time;
private $ip_address;
private $device;
private $browser;
private $user_login_iduser_login;

    /**
     * @return mixed
     */
    public function getIdsession()
    {
        return $this->idsession;
    }

    /**
     * @param mixed $idsession
     */
    public function setIdsession($idsession)
    {
        $this->idsession = $idsession;
    }

    /**
     * @return mixed
     */
    public function getInTime()
    {
        return $this->in_time;
    }

    /**
     * @param mixed $in_time
     */
    public function setInTime($in_time)
    {
        $this->in_time = $in_time;
    }

    /**
     * @return mixed
     */
    public function getOutTime()
    {
        return $this->out_time;
    }

    /**
     * @param mixed $out_time
     */
    public function setOutTime($out_time)
    {
        $this->out_time = $out_time;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param mixed $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * @return mixed
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param mixed $browser
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * @return mixed
     */
    public function getUserLoginIduserLogin()
    {
        return $this->user_login_iduser_login;
    }

    /**
     * @param mixed $user_login_iduser_login
     */
    public function setUserLoginIduserLogin($user_login_iduser_login)
    {
        $this->user_login_iduser_login = $user_login_iduser_login;
    }

    /**
     * Session constructor.
     * @param $idsession
     * @param $in_time
     * @param $out_time
     * @param $ip_address
     * @param $device
     * @param $browser
     * @param $user_login_iduser_login
     */
    public function __construct($idsession, $in_time, $out_time, $ip_address, $device, $browser, $user_login_iduser_login)
    {
        $this->idsession = $idsession;
        $this->in_time = $in_time;
        $this->out_time = $out_time;
        $this->ip_address = $ip_address;
        $this->device = $device;
        $this->browser = $browser;
        $this->user_login_iduser_login = $user_login_iduser_login;
    }
}