<?php
    include '../LoadClass.php';

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass);

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }

    $table_name = "reading";
    $backup_file  = "reading_dump_".date("Y-m-d-H-i-s").".sql";
    $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

    mysql_select_db('ozious');
    $retval = mysql_query( $sql, $conn );

    if(! $retval ) {
        die('Could not take data backup: ' . mysql_error());
    }


    $readingController = new ReadingController();
    $readingController->delete();

    $backup = new Backup($backup_file, "Ozious");
    $backupController = new BackupController();
    $backupController->insert($backup);

    echo "Backedup  data successfully\n";

    mysql_close($conn);
?>