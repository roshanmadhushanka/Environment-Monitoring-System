<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 10:50 AM
 */
class Manufacturer
{
    private $idmanufacturer;
    private $manufacturer_name;
    private $address_number;
    private $address_street;
    private $address_city;
    private $address_country;
    private $contact_number;

    /**
     * Manufacturer constructor.
     * @param $idmanufacturer
     * @param $manufacturer_name
     * @param $address_number
     * @param $address_street
     * @param $address_city
     * @param $address_country
     * @param $contact_number
     */
    public function __construct($idmanufacturer, $manufacturer_name, $address_number, $address_street, $address_city, $address_country, $contact_number)
    {
        $this->idmanufacturer = $idmanufacturer;
        $this->manufacturer_name = $manufacturer_name;
        $this->address_number = $address_number;
        $this->address_street = $address_street;
        $this->address_city = $address_city;
        $this->address_country = $address_country;
        $this->contact_number = $contact_number;
    }

    /**
     * @return mixed
     */
    public function getIdmanufacturer()
    {
        return $this->idmanufacturer;
    }

    /**
     * @param mixed $idmanufacturer
     */
    public function setIdmanufacturer($idmanufacturer)
    {
        $this->idmanufacturer = $idmanufacturer;
    }

    /**
     * @return mixed
     */
    public function getManufacturerName()
    {
        return $this->manufacturer_name;
    }

    /**
     * @param mixed $manufacturer_name
     */
    public function setManufacturerName($manufacturer_name)
    {
        $this->manufacturer_name = $manufacturer_name;
    }

    /**
     * @return mixed
     */
    public function getAddressNumber()
    {
        return $this->address_number;
    }

    /**
     * @param mixed $address_number
     */
    public function setAddressNumber($address_number)
    {
        $this->address_number = $address_number;
    }

    /**
     * @return mixed
     */
    public function getAddressStreet()
    {
        return $this->address_street;
    }

    /**
     * @param mixed $address_street
     */
    public function setAddressStreet($address_street)
    {
        $this->address_street = $address_street;
    }

    /**
     * @return mixed
     */
    public function getAddressCity()
    {
        return $this->address_city;
    }

    /**
     * @param mixed $address_city
     */
    public function setAddressCity($address_city)
    {
        $this->address_city = $address_city;
    }

    /**
     * @return mixed
     */
    public function getAddressCountry()
    {
        return $this->address_country;
    }

    /**
     * @param mixed $address_country
     */
    public function setAddressCountry($address_country)
    {
        $this->address_country = $address_country;
    }

    /**
     * @return mixed
     */
    public function getContactNumber()
    {
        return $this->contact_number;
    }

    /**
     * @param mixed $contact_number
     */
    public function setContactNumber($contact_number)
    {
        $this->contact_number = $contact_number;
    }

}