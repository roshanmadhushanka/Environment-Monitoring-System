<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 3:06 PM
 */
class LoginController
{
    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }

    public function insert(Session $ses){
        echo $ses->getInTime().' '.$ses->getOutTime().'</br>';
        $query = "INSERT INTO `session`(`in_time`, `out_time`, `ip_address`, `device`, `browser`, `user_login_iduser_login`) VALUES ('".$ses->getInTime()."', '".$ses->getOutTime()."', '".$ses->getIpAddress()."', '".$ses->getDevice()."','".$ses->getBrowser()."','".$ses->getUserLoginIduserLogin()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function selectAll(){
        $sessions = array();
        $query = "SELECT * FROM `session`";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function selectByID($id){
        $query = "SELECT * FROM `session` WHERE `idsession`='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
        $this->con->closeConnection();
        return $ses;
    }


    public function selectByUser($user_log_id){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `user_login_iduser_login`='".$user_log_id."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function selectByIpAddress($ip){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `ip_address`='".$ip."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function getSessionByInTime($in_time){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `in_time`='".$in_time."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function getSessionByOutTime($out_time){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `out_time`='".$out_time."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function getSessionByDevice($device){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `device`='".$device."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


    public function getSessionByBrowser($browser){
        $sessions = array();
        $query = "SELECT * FROM `session` WHERE `browser`='".$browser."'";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ses = new Session($row['idsession'], $row['in_time'], $row['out_time'], $row['ip_address'], $row['device'], $row['browser'], $row['user_login_iduser_login']);
                $sessions[] = $ses;
            }
        }
        $this->con->closeConnection();
        return $sessions;
    }


}