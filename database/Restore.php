<?php
    $backup_file = $_POST['backup_file'];
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
       die('Could not connect: ' . mysql_error());
   }

   $table_name = "reading";
   $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

   mysql_select_db('ozious');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
       die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";

   mysql_close($conn);
?>
