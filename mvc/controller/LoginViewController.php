<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/20/2016
 * Time: 10:07 PM
 */
class LoginViewController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    public function getPendingUsers(){
        $query = "SELECT * FROM `user_view` WHERE status='0'";

        $this->con->openConnection();

        $loginViews = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $loginView = new LoginView($row['iduser'], $row['first_name'], $row['last_name'], $row['username'], 0);
                $loginViews[] = $loginView;
            }
        }
        $this->con->closeConnection();
        return $loginViews;
    }

}