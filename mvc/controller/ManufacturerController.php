<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 12:09 PM
 */
class ManufacturerController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    public function insert(Manufacturer $man){
        $query = "INSERT INTO `manufacturer`(`manufacturer_name`, `address_number`, `address_street`, `address_city`, `address_country`, `contact_number`) VALUES ('".$man->getManufacturerName()."','".$man->getAddressNumber()."','".$man->getAddressStreet()."','".$man->getAddressCity()."','".$man->getAddressCountry()."','".$man->getContactNumber()."')";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    public function selectAll(){
        $query = "SELECT * FROM `manufacturer`";

        $manufacturers = array();
        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $man = new Manufacturer($row['idmanufacturer'], $row['manufacturer_name'], $row['address_number'], $row['address_street'], $row['address_city'], $row['address_country'], $row['contact_number']);
                $manufacturers[] = $man;
            }
        }
        $this->con->closeConnection();
        return $manufacturers;
    }

    public function selectById($id){
        $query = "SELECT * FROM `manufacturer` WHERE `idmanufacturer`='".$id."' LIMIT 1";
        $this->con->openConnection();
        $result = $this->con->executeRawQuery($query);
        $row = $result->fetch_array();
        $man = new Manufacturer($row['idmanufacturer'], $row['manufacturer_name'], $row['address_number'], $row['address_street'], $row['address_city'], $row['address_country'], $row['contact_number']);
        $this->con->closeConnection();
        return $man;
    }

    function update(Manufacturer $man){
        $query="UPDATE `manufacturer` SET `idmanufacturer`='".$man->getIdmanufacturer()."',`manufacturer_name`='".$man->getManufacturerName()."',`address_number`='".$man->getAddressNumber()."',`address_street`='".$man->getAddressStreet()."',`address_city`='".$man->getAddressCity()."',`address_country`='".$man->getAddressCountry()."',`contact_number`='".$man->getContactNumber()."' WHERE `idmanufacturer`='".$man->getIdmanufacturer()."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function delete($id){
        $query="DELETE FROM `manufacturer` WHERE `idmanufacturer`='".$id."'";

        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function removeManufacturerById($id){
        $this->con->openConnection();

        $query1 = "DELETE FROM `reading` WHERE `sensor_idsensor` IN (SELECT `idsensor` FROM `sensor` WHERE `sensor_board_id` IN (SELECT `idsensor_board` FROM `sensor_board` WHERE `manufacturer_id` = '".$id."'))";
        $query2 = "DELETE FROM `sensor` WHERE `sensor_board_id` IN (SELECT `idsensor_board` FROM `sensor_board` WHERE `manufacturer_id` = '".$id."')";
        $query3 = "DELETE FROM `sensor_board` WHERE `manufacturer_id` = '".$id."'";
        $query4 = "DELETE FROM `manufacturer` WHERE `idmanufacturer` = '".$id."'";

        $this->con->executeRawQuery($query1);
        $this->con->executeRawQuery($query2);
        $this->con->executeRawQuery($query3);
        $this->con->executeRawQuery($query4);

        $this->con->closeConnection();
    }

}