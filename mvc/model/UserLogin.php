<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 11:16 AM
 */
class UserLogin
{
private $iduser_login;
private $user_iduser;
private $username;
private $password;
private $status;
private $access_level_idaccess_level;
private $user_type_iduser_type;

    /**
     * @return mixed
     */
    public function getIduserLogin()
    {
        return $this->iduser_login;
    }

    /**
     * @param mixed $iduser_login
     */
    public function setIduserLogin($iduser_login)
    {
        $this->iduser_login = $iduser_login;
    }

    /**
     * @return mixed
     */
    public function getUserIduser()
    {
        return $this->user_iduser;
    }

    /**
     * @param mixed $user_iduser
     */
    public function setUserIduser($user_iduser)
    {
        $this->user_iduser = $user_iduser;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAccessLevelIdaccessLevel()
    {
        return $this->access_level_idaccess_level;
    }

    /**
     * @param mixed $access_level_idaccess_level
     */
    public function setAccessLevelIdaccessLevel($access_level_idaccess_level)
    {
        $this->access_level_idaccess_level = $access_level_idaccess_level;
    }

    /**
     * @return mixed
     */
    public function getUserTypeIduserType()
    {
        return $this->user_type_iduser_type;
    }

    /**
     * @param mixed $user_type_iduser_type
     */
    public function setUserTypeIduserType($user_type_iduser_type)
    {
        $this->user_type_iduser_type = $user_type_iduser_type;
    }

    /**
     * UserLogin constructor.
     * @param $iduser_login
     * @param $user_iduser
     * @param $username
     * @param $password
     * @param $status
     * @param $access_level_idaccess_level
     * @param $user_type_iduser_type
     */
    public function __construct($iduser_login, $user_iduser, $username, $password, $status, $access_level_idaccess_level, $user_type_iduser_type)
    {
        $this->iduser_login = $iduser_login;
        $this->user_iduser = $user_iduser;
        $this->username = $username;
        $this->password = $password;
        $this->status = $status;
        $this->access_level_idaccess_level = $access_level_idaccess_level;
        $this->user_type_iduser_type = $user_type_iduser_type;
    }
}