<?php
class Backup
{
    private $backup_name;
    private $backup_description;

    /**
     * Backup constructor.
     * @param $backup_name
     * @param $backup_description
     */
    public function __construct($backup_name, $backup_description)
    {
        $this->backup_name = $backup_name;
        $this->backup_description = $backup_description;
    }

    /**
     * @return mixed
     */
    public function getBackupName()
    {
        return $this->backup_name;
    }

    /**
     * @param mixed $backup_name
     */
    public function setBackupName($backup_name)
    {
        $this->backup_name = $backup_name;
    }

    /**
     * @return mixed
     */
    public function getBackupDescription()
    {
        return $this->backup_description;
    }

    /**
     * @param mixed $backup_description
     */
    public function setBackupDescription($backup_description)
    {
        $this->backup_description = $backup_description;
    }
}