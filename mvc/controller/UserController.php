<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 4:18 PM
 */
class UserController
{

    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }


    public function addUser(User $u){
        $query = "INSERT INTO `user`(`first_name`, `last_name`, `initials`, `nic`) VALUES ('".$u->getFirstName()."', '".$u->getLastName()."', '".$u->getInitials()."', '".$u->getNic()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function getUserByID($id){
        $query = "SELECT * FROM `user` WHERE `iduser`='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }


    public function getUserByNic($nic){
        $query = "SELECT * FROM `user` WHERE `nic`='".$nic."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }


    public function getUserByFullName($first, $last){
        $query = "SELECT * FROM `user` WHERE `first_name` LIKE '%".$first."%' AND `last_name` LIKE '%".$last."%' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }


}