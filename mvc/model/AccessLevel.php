<?php

/**
 * Created by PhpStorm.
 * User: Roshan
 * Date: 12/16/2015
 * Time: 9:50 AM
 */
class AccessLevel
{
    private $access_level_id;
    private $description;

    function __construct($id, $desc)
    {
        $this->access_level_id = $id;
        $this->description = $desc;
    }

    /**
     * @return mixed
     */
    public function getAccessLevelId()
    {
        return $this->access_level_id;
    }

    /**
     * @param mixed $access_level_id
     */
    public function setAccessLevelId($access_level_id)
    {
        $this->access_level_id = $access_level_id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}