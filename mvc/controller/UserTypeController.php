<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 6:51 PM
 */
class UserTypeController
{

    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }


    public function addUserType(UserType $ut){
        $query = "INSERT INTO `user_type`(`description`) VALUES ('".$ut->getDescription()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function getAllUserTypes(){
        $user_types = array();
        $query = "SELECT * FROM `user_type`";
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $ut = new UserType($row['iduser_type'], $row['description']);
                $user_types[] = $ut;
            }
        }
        $this->con->closeConnection();
        return $user_types;
    }


    public function getUserTypeByName($name){
        $query = "SELECT * FROM `user_type` WHERE description='".$name."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ut = new UserType($row['iduser_type'], $row['description']);
        $this->con->closeConnection();
        return $ut;
    }


    public function getUserTypeById($id){
        $query = "SELECT * FROM `user_type` WHERE iduser_type='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ut = new UserType($row['iduser_type'], $row['description']);
        $this->con->closeConnection();
        return $ut;
    }

}