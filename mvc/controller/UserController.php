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


    public function insert(User $u){
        $query = "INSERT INTO `user`(`first_name`, `last_name`, `initials`, `nic`) VALUES ('".$u->getFirstName()."', '".$u->getLastName()."', '".$u->getInitials()."', '".$u->getNic()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }


    public function selectByID($id){
        $query = "SELECT * FROM `user` WHERE `iduser`='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }


    public function selectByNic($nic){
        $query = "SELECT * FROM `user` WHERE `nic`='".$nic."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }


    public function selectFullName($first, $last){
        $query = "SELECT * FROM `user` WHERE `first_name` LIKE '%".$first."%' AND `last_name` LIKE '%".$last."%' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $u = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
        $this->con->closeConnection();
        return $u;
    }

    public function selectAll(){
        $query = "SELECT * FROM `user`";

        $users = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $user_object = new User($row['iduser'], $row['first_name'], $row['last_name'], $row['initials'], $row['nic']);
                $users[] = $user_object;
            }
        }
        $this->con->closeConnection();
        return $users;
    }

    public function removeUserById($id){
        $this->con->openConnection();

        $query1 = "DELETE FROM `session` WHERE `user_login_iduser_login` IN (SELECT `iduser_login` FROM `user_login` WHERE `user_iduser` = '".$id."')";
        $query2 = "DELETE FROM `user_login` WHERE `user_iduser` = '".$id."'";
        $query3 = "DELETE FROM `user` WHERE `iduser` = '".$id."'";

        $this->con->executeRawQuery($query1);
        $this->con->executeRawQuery($query2);
        $this->con->executeRawQuery($query3);

        $this->con->closeConnection();

    }
}