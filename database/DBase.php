<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/14/2015
 * Time: 9:39 PM
 */

class DBase
{
    private $conn;

    public function openConnection(){
        if(!isset(self::$conn)){
            //If not set
            //Load config.ini file
            $config = parse_ini_file('config.ini');
            $this->conn = new mysqli('localhost', $config['username'], $config['password'], $config['dbname']);

            //Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
        if($this->conn === false){
            return false;
        }
        return $this->conn;
    }

    function closeConnection() {
        mysqli_close($this->conn);
    }

    function executeRawQuery($query) {
        return mysqli_query($this->conn, $query);
    }


}