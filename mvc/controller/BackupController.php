<?php
class BackupController
{
    private $con;
    function __construct()
    {
        $this->con = new DBase();
    }

    function insert(Backup $backup){
        $query = "INSERT INTO `backup`(`backup_name`, `backup_description`) VALUES ('".$backup->getBackupName()."','".$backup->getBackupDescription()."')";
        $this->con->openConnection();
        $this->con->executeRawQuery($query);
        $this->con->closeConnection();
    }

    function selectAll(){
        $query="SELECT * FROM `backup`";

        $backups = array();

        $this->con->openConnection();
        if($result = $this->con->executeRawQuery($query)){
            while($row = $result->fetch_array()){
                $read = new Backup($row['backup_name'], $row['backup_description']);
                $backups[] = $read;
            }
        }

        $this->con->closeConnection();
        return $backups;
    }
}