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

        $query = "SELECT * FROM `user_login` WHERE `username`='".$ul->getUsername()."' AND `password`=MD5('".$ul->getPassword()."')";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);

        if(mysqli_num_rows($result)==0) {
            $query = "INSERT INTO `user_login`(`user_iduser`, `username`, `password`, `status`, `user_type_iduser_type`) VALUES ('" . $ul->getUserIduser() . "', '" . $ul->getUsername() . "', MD5('" . $ul->getPassword() . "'), '" . $ul->getStatus() . "', '" . $ul->getUserTypeIduserType() . "')";
            $this->con->executeRawQuery($query);
            $this->con->closeConnection();
            return true;
        }
        else{
            return false;
        }
    }


    public function getUserLogin($username, $password){
        echo 'inside controller';
        echo '<br>'.$username.'<br>'.$password;
        $query = "SELECT * FROM `user_login` WHERE `username`='".$username."' AND `password`=MD5('".$password."') LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);

        if(mysqli_num_rows($result)!=0){
            echo 'row';
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


    public function updatePassword(UserLogin $ul){
        $query = "UPDATE `user_login` SET password='".$ul->getPassword()."' WHERE iduser_login='".$ul->getIduserLogin()."'";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);

    }


    public function updateUsername(UserLogin $ul){
        $query = "UPDATE `user_login` SET username='".$ul->getUsername()."' WHERE iduser_login='".$ul->getIduserLogin()."'";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);

    }


    public function updateUserStatus(UserLogin $ul){
        $query = "UPDATE `user_login` SET status='".$ul->getStatus()."' WHERE iduser_login='".$ul->getIduserLogin()."'";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);

    }


}