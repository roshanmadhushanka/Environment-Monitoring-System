<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2015
 * Time: 5:38 PM
 */
class UserLoginController
{

    private $con;
    function  __construct()
    {
        $this->con = new DBase();
    }


    public function addUserLogin(UserLogin $ul){
        $query = "INSERT INTO `user_login`(`user_iduser`, `username`, `password`, `status`, `user_type_iduser_type`) VALUES ('".$ul->getUserIduser()."', '".$ul->getUsername()."', '".$ul->getPassword()."', '".$ul->getStatus()."', '".$ul->getUserTypeIduserType()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function getUserLogin($username, $password){
        $query = "SELECT * FROM `user_login` WHERE `username`='".$username."' AND `password`='".$password."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);

        if(mysqli_num_rows($result)!=0){
            $row = $result->fetch_array();
            $ul = new UserLogin($row['iduser_login'], $row['user_iduser'], $row['username'], $row['password'], $row['status'], $row['user_type_iduser_type']);
            $this->con->closeConnection();
            return $ul;
        }
        else{
            return null;
        }

    }


    public function getUserLoginById($id){
        $query = "SELECT * FROM `user_login` WHERE iduser_login='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $ul = new UserLogin($row['iduser_login'], $row['user_iduser'], $row['username'], $row['password'], $row['status'], $row['user_type_iduser_type']);
        $this->con->closeConnection();
        return $ul;
    }

}